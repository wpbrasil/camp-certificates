<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Camp Certificates Admin.
 */
class Camp_Certificates_Admin_Metaboxes {

	/**
	 * Meta boxes nonce.
	 *
	 * @var string
	 */
	public $nonce = 'camp_certificates';

	/**
	 * Initialize the admin actions.
	 */
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'register_meta_boxes' ) );
		add_action( 'save_post', array( $this, 'save_meta_boxes' ) );
	}

	/**
	 * Register meta boxes.
	 *
	 * @return void
	 */
	public function register_meta_boxes() {
		add_meta_box(
			'cc_events_metabox',
			__( 'Event Data', 'camp-certificates' ),
			array( $this, 'metabox_events' ),
			'cc_events',
			'normal',
			'high'
		);

		add_meta_box(
			'cc_attendees_metabox',
			__( 'Attendee Data', 'camp-certificates' ),
			array( $this, 'metabox_attendees' ),
			'cc_attendees',
			'normal',
			'high'
		);
	}

	/**
	 * Metabox Events.
	 *
	 * @param  WP_Post $post
	 *
	 * @return string
	 */
	public function metabox_events( $post ) {
		$this->_get_nonce_field();

		include_once 'views/html-events-metabox.php';
	}

	/**
	 * Metabox Attendees.
	 *
	 * @param  WP_Post $post
	 *
	 * @return string
	 */
	public function metabox_attendees( $post ) {
		$this->_get_nonce_field();

		include_once 'views/html-attendees-metabox.php';
	}

	/**
	 * Get WP nonce field.
	 *
	 * @return string
	 */
	private function _get_nonce_field() {
		wp_nonce_field( basename( __FILE__ ), $this->nonce );
	}

	/**
	 * Save meta boxes.
	 *
	 * @param  int $post_id
	 *
	 * @return void
	 */
	public function save_meta_boxes( $post_id ) {
		// Verify nonce.
		if ( ! isset( $_POST[ $this->nonce ] ) || ! wp_verify_nonce( $_POST[ $this->nonce ], basename( __FILE__ ) ) ) {
			return;
		}

		// Verify if this is an auto save routine.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		// Check permissions.
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

		if ( isset( $_POST['post_type'] ) && 'cc_events' == $_POST['post_type'] ) {
			$this->_save_events_data( $post_id, $_POST );
		}

		if ( isset( $_POST['post_type'] ) && 'cc_attendees' == $_POST['post_type'] ) {
			$this->_save_attendees_data( $post_id, $_POST );
		}
	}

	/**
	 * Save events data.
	 *
	 * @param  int $post_id
	 * @param  array $posted
	 *
	 * @return void
	 */
	private function _save_events_data( $post_id, $posted ) {
		$fields = array(
			'cc_events_country',
			'cc_events_city',
			'cc_events_date',
			'cc_events_font',
			'cc_events_font_size',
			'cc_events_image'
		);

		foreach ( $fields as $field ) {
			if ( isset( $posted[ $field ] ) ) {
				update_post_meta( $post_id, '_' . $field, sanitize_text_field( $posted[ $field ] ) );
			}
		}
	}

	/**
	 * Save events data.
	 *
	 * @param  int $post_id
	 * @param  array $posted
	 *
	 * @return void
	 */
	private function _save_attendees_data( $post_id, $posted ) {
		$fields = array(
			'cc_attendees_email',
			'cc_attendees_event'
		);

		foreach ( $fields as $field ) {
			if ( isset( $posted[ $field ] ) ) {
				update_post_meta( $post_id, '_' . $field, sanitize_text_field( $posted[ $field ] ) );
			}
		}
	}
}

new Camp_Certificates_Admin_Metaboxes();
