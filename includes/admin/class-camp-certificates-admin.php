<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Camp Certificates Admin.
 */
class Camp_Certificates_Admin {

	/**
	 * Initialize the admin actions.
	 */
	public function __construct() {

		$this->includes();
	}

	public function includes() {
		include_once 'class-camp-certificates-admin-metaboxes.php';
	}
}

new Camp_Certificates_Admin();
