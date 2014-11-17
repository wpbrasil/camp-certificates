<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Camp Certificates Certificate Generator.
 */
class Camp_Certificates_Certificate_Generator {

	/**
	 * Initialize the certificate generator.
	 *
	 * @param string $attendee_name
	 * @param string $font
	 * @param string $font_size
	 * @param string $color
	 * @param string $template
	 */
	public function __construct( $attendee_name, $font, $font_size, $color, $template ) {
		$this->attendee_name = $attendee_name;
		$this->font          = $font;
		$this->font_size     = $font_size;
		$this->color         = $color;
		$this->template      = $template;

		// Template.
		$this->name_width    = 1536;

		// Customer.
		$this->text_size     = 100;
	}

	/**
	 * Create the image path and url.
	 *
	 * @return array
	 */
	protected function image_dir() {
		$upload_info = wp_upload_dir();
		$upload_path = $upload_info['path'];
		$upload_url  = $upload_info['url'];
		$image_name  = sha1( $this->attendee_name . time() );

		return array(
			'path' => $upload_path . '/' . $image_name . '.png',
			'url'  => $upload_url . '/' . $image_name . '.png'
		);
	}

	/**
	 * Draw a simple text.
	 *
	 * @param  resource $image
	 * @param  float $size
	 * @param  int $x
	 * @param  int $y
	 * @param  int $color
	 * @param  string $font
	 * @param  string $text
	 * @param  string $alignment
	 *
	 * @return null
	 */
	protected function simple_text( $image, $size, $x, $y, $color, $font, $text, $alignment = 'left' ) {
		$dimensions = imagettfbbox( $size, 0, $font, $text );
		$text_width = $dimensions[2] - $dimensions[0];

		switch ( $alignment ) {
			case 'right' :
				$x -= $text_width;
				break;
			case 'center' :
				$x -= $text_width / 2;
				break;
			default :
				break;
		}

		imagettftext( $image, $size, 0, $x, $y, $color, $font, $text );
	}

	/**
	 * Draw a multiline text.
	 *
	 * @param  resource $image
	 * @param  float $size
	 * @param  int $top
	 * @param  int $left
	 * @param  int $right
	 * @param  int $color
	 * @param  string $font
	 * @param  string $text
	 * @param  string $alignment
	 * @param  float  $line_height
	 *
	 * @return null
	 */
	protected function multiline_text( $image, $size, $top, $left, $right, $color, $font, $text, $alignment = 'left', $line_height = 1.5 ) {
		$max_width = $right - $left ;
		$words = explode( ' ', strip_tags( $text ) );
		$line = '';

		while ( 0 < count( $words ) ) {
			$dimensions = imagettfbbox( $size, 0, $font, $line . ' ' . $words[0] );
			$line_width = $dimensions[2] - $dimensions[0];

			if ( $line_width > $max_width ) {
				$lines[] = $line;
				$line = '';
			}

			$line .= ' ' . $words[0];
			$words = array_slice( $words, 1 );
		}

		if ( '' != $line ) {
			$lines[] = $line;
		}

		$height = ( $size * $line_height );
		$i = 0;

		foreach ( $lines as $line ) {
			if ( 'center' == $alignment ) {
				$dimensions = imagettfbbox( $size, 0, $font, $line );
				$line_width = $dimensions[2] - $dimensions[0];
				$center = floor( $max_width / 2 + $left );
				$left_start = $center - $line_width / 2;
			} else if ( 'right' == $alignment ) {
				$dimensions = imagettfbbox( $size, 0, $font, $line );
				$line_width = $dimensions[2] - $dimensions[0];
				$left_start = $left + $max_width - $line_width;
			} else {
				$left_start = $left;
			}

			imagettftext( $image, $size, 0, $left_start, $top + $height * $i, $color, $font, $line );

			$i++;
		}
	}

	/**
	 * Get available font size.
	 *
	 * @param  float  $size
	 * @param  string $font
	 * @param  string $text
	 * @param  float  $limit
	 *
	 * @return float
	 */
	protected function get_avaialbe_font_size( $size, $font, $text, $limit ) {
		$bbox = imagettfbbox( $size, 0, $font, $text );
		$size = ( $limit < $bbox[2] ) ? ( $size / ( $bbox[2] / $limit ) ) : $size;

		return $size;
	}

	/**
	 * Generate the image.
	 *
	 * @return string Image URL.
	 */
	public function generate() {
		$image_dir = $this->image_dir();

		// Initialize.
		$template = imagecreatefrompng( $this->template );
		$center   = ( imagesx( $template ) / 2 );

		// Colors.
		$black = imagecolorallocate( $template, 20, 20, 20 );
		$dark  = imagecolorallocate( $template, 50, 50, 50 );
		$gray  = imagecolorallocate( $template, 153, 153, 153 );

		// Attendee name.
		$text_size = $this->get_avaialbe_font_size( $this->text_size, $this->font, $this->attendee_name, $this->name_width );
		$this->simple_text( $template, $text_size, $center, 1200, $black, $this->font, $this->attendee_name, 'center' );

		imagepng( $template, $image_dir['path'] );
		imagedestroy( $template );

		return $image_dir['url'];
	}
}
