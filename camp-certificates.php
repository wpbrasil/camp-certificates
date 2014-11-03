<?php
/**
 * Plugin Name: CampCertificates
 * Plugin URI: http://github.com/wpbrasil/camp-certificates
 * Description: Generate certificates for WordCamp attendees.
 * Author: Claudio Sanches
 * Author URI: http://claudiosmweb.com/
 * Version: 1.0.0
 * License: GPLv2 or later
 * Text Domain: camp-certificates
 * Domain Path: languages/
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'Camp_Certificates' ) ) :

/**
 * Camp Certificates main class.
 */
class Camp_Certificates {

	/**
	 * Plugin version.
	 *
	 * @var string
	 */
	const VERSION = '1.0.0';

	/**
	 * Instance of this class.
	 *
	 * @var object
	 */
	protected static $instance = null;

	/**
	 * Initialize the plugin public actions.
	 */
	private function __construct() {
		// Load plugin text domain.
		add_action( 'init', array( $this, 'load_plugin_textdomain' ) );

		if ( is_admin() ) {
			$this->admin_includes();
		}

		$this->includes();
	}

	/**
	 * Return an instance of this class.
	 *
	 * @return object A single instance of this class.
	 */
	public static function get_instance() {
		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @return void
	 */
	public function load_plugin_textdomain() {
		$locale = apply_filters( 'plugin_locale', get_locale(), 'camp-certificates' );

		load_textdomain( 'camp-certificates', trailingslashit( WP_LANG_DIR ) . 'camp-certificates/camp-certificates-' . $locale . '.mo' );
		load_plugin_textdomain( 'camp-certificates', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}

	/**
	 * Includes.
	 *
	 * @return void
	 */
	private function includes() {
		include_once 'includes/class-camp-certificates-post-types.php';
	}

	/**
	 * Admin includes.
	 *
	 * @return void
	 */
	private function admin_includes() {
		include_once 'includes/admin/class-camp-certificates-admin.php';
	}
}

add_action( 'plugins_loaded', array( 'Camp_Certificates', 'get_instance' ), 0 );

endif;
