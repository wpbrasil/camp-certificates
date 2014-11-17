<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<table class="form-table">
	<tr valign="top">
		<th>
			<label for="cc_attendees_email"><?php _e( 'Email', 'camp-certificates' ); ?></label>
		</th>
		<td>
			<input type="text" name="cc_attendees_email" id="cc_attendees_email" value="<?php echo esc_attr( get_post_meta( $post->ID, '_cc_attendees_email', true ) ); ?>" />
		</td>
	</tr>
	<tr valign="top">
		<th>
			<label for="cc_attendees_event"><?php _e( 'Event', 'camp-certificates' ); ?></label>
		</th>
		<td>
			<input type="text" name="cc_attendees_event" id="cc_attendees_event" value="<?php echo esc_attr( get_post_meta( $post->ID, '_cc_attendees_event', true ) ); ?>" />
		</td>
	</tr>
</table>
