<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Camp Certificates Admin.
 */
class Camp_Certificates_Admin_Metaboxes {

	/**
	 * Initialize the admin actions.
	 */
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'register_meta_boxes' ) );
	}

	/**
	 * Register meta boxes.
	 *
	 * @return void
	 */
	public function register_meta_boxes() {

	}
}

new Camp_Certificates_Admin_Metaboxes();
