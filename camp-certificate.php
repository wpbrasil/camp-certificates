<?php
/**
 * Plugin Name: CampCertificate
 * Plugin URI: http://github.com/wpbrasil/camp-certificate
 * Description: Generate certificates for WordCamp attendees.
 * Author: Claudio Sanches
 * Author URI: http://claudiosmweb.com/
 * Version: 1.0.0
 * License: GPLv2 or later
 * Text Domain: camp-certificate
 * Domain Path: languages/
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'Camp_Certificate' ) ) :

/**
 * CampCertificate main class.
 */
class Camp_Certificate {

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
		$locale = apply_filters( 'plugin_locale', get_locale(), 'camp-certificate' );

		load_textdomain( 'camp-certificate', trailingslashit( WP_LANG_DIR ) . 'camp-certificate/camp-certificate-' . $locale . '.mo' );
		load_plugin_textdomain( 'camp-certificate', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}
}

add_action( 'plugins_loaded', array( 'Camp_Certificate', 'get_instance' ), 0 );

endif;
