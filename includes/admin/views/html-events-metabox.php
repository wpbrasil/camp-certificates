<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<table class="form-table">
	<tr valign="top">
		<th>
			<label for="cc_country"><?php _e( 'Country', 'camp-certificates' ); ?></label>
		</th>
		<td>
			<input type="text" name="cc_country" id="cc_country" value="<?php echo esc_attr( get_post_meta( $post->ID, '_cc_country', true ) ); ?>" />
		</td>
	</tr>
	<tr valign="top">
		<th>
			<label for="cc_city"><?php _e( 'City', 'camp-certificates' ); ?></label>
		</th>
		<td>
			<input type="text" name="cc_city" id="cc_city" value="<?php echo esc_attr( get_post_meta( $post->ID, '_cc_city', true ) ); ?>" />
		</td>
	</tr>
	<tr valign="top">
		<th>
			<label for="cc_date"><?php _e( 'Date', 'camp-certificates' ); ?></label>
		</th>
		<td>
			<input type="text" name="cc_date" id="cc_date" value="<?php echo esc_attr( get_post_meta( $post->ID, '_cc_date', true ) ); ?>" placeholder="<?php _e( 'yyyy-mm-dd', 'camp-certificates' ); ?>" />
		</td>
	</tr>
	<tr valign="top">
		<th>
			<label for="cc_font"><?php _e( 'Font', 'camp-certificates' ); ?></label>
		</th>
		<td>
			<input type="text" name="cc_font" id="cc_font" value="<?php echo esc_attr( get_post_meta( $post->ID, '_cc_font', true ) ); ?>" />
		</td>
	</tr>
	<tr valign="top">
		<th>
			<label for="cc_font_size"><?php _e( 'Font Size', 'camp-certificates' ); ?></label>
		</th>
		<td>
			<input type="text" name="cc_font_size" id="cc_font_size" value="<?php echo esc_attr( get_post_meta( $post->ID, '_cc_font_size', true ) ); ?>" />
		</td>
	</tr>
	<tr valign="top">
		<th>
			<label for="cc_image"><?php _e( 'Background Image', 'camp-certificates' ); ?></label>
		</th>
		<td>
			<input type="text" name="cc_image" id="cc_image" value="<?php echo esc_attr( get_post_meta( $post->ID, '_cc_image', true ) ); ?>" />
		</td>
	</tr>
</table>
