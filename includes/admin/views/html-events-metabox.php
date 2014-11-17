<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<table class="form-table">
	<tr valign="top">
		<th>
			<label for="cc_events_country"><?php _e( 'Country', 'camp-certificates' ); ?></label>
		</th>
		<td>
			<input type="text" name="cc_events_country" id="cc_events_country" value="<?php echo esc_attr( get_post_meta( $post->ID, '_cc_events_country', true ) ); ?>" />
		</td>
	</tr>
	<tr valign="top">
		<th>
			<label for="cc_events_city"><?php _e( 'City', 'camp-certificates' ); ?></label>
		</th>
		<td>
			<input type="text" name="cc_events_city" id="cc_events_city" value="<?php echo esc_attr( get_post_meta( $post->ID, '_cc_events_city', true ) ); ?>" />
		</td>
	</tr>
	<tr valign="top">
		<th>
			<label for="cc_events_date"><?php _e( 'Date', 'camp-certificates' ); ?></label>
		</th>
		<td>
			<input type="text" name="cc_events_date" id="cc_events_date" value="<?php echo esc_attr( get_post_meta( $post->ID, '_cc_events_date', true ) ); ?>" placeholder="<?php _e( 'yyyy-mm-dd', 'camp-certificates' ); ?>" />
		</td>
	</tr>
	<tr valign="top">
		<th>
			<label for="cc_events_font"><?php _e( 'Font', 'camp-certificates' ); ?></label>
		</th>
		<td>
			<input type="text" name="cc_events_font" id="cc_events_font" value="<?php echo esc_attr( get_post_meta( $post->ID, '_cc_events_font', true ) ); ?>" />
		</td>
	</tr>
	<tr valign="top">
		<th>
			<label for="cc_events_font_size"><?php _e( 'Font Size', 'camp-certificates' ); ?></label>
		</th>
		<td>
			<input type="text" name="cc_events_font_size" id="cc_events_font_size" value="<?php echo esc_attr( get_post_meta( $post->ID, '_cc_events_font_size', true ) ); ?>" />
		</td>
	</tr>
	<tr valign="top">
		<th>
			<label for="cc_events_image"><?php _e( 'Background Image', 'camp-certificates' ); ?></label>
		</th>
		<td>
			<input type="text" name="cc_events_image" id="cc_events_image" value="<?php echo esc_attr( get_post_meta( $post->ID, '_cc_events_image', true ) ); ?>" />
		</td>
	</tr>
</table>
