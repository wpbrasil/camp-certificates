<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Camp Certificates Post Types.
 */
class Camp_Certificate_Post_Types {

	/**
	 * Initialize the taxonomies.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'register_post_types' ), 5 );
	}

	/**
	 * Register Post Types.
	 *
	 * @return void
	 */
	public function register_post_types() {
		if ( post_type_exists( 'cc_attendees' ) ) {
			return;
		}

		register_post_type( 'cc_attendees', array(
			'labels'          => array(
				'name'               => _x( 'Attendees', 'post type general name', 'camp-certificate' ),
				'singular_name'      => _x( 'Attendee', 'post type singular name', 'camp-certificate' ),
				'menu_name'          => _x( 'Attendees', 'admin menu', 'camp-certificate' ),
				'name_admin_bar'     => _x( 'Attendee', 'add new on admin bar', 'camp-certificate' ),
				'add_new'            => _x( 'Add New', 'book', 'camp-certificate' ),
				'add_new_item'       => __( 'Add New Attendee', 'camp-certificate' ),
				'new_item'           => __( 'New Attendee', 'camp-certificate' ),
				'edit_item'          => __( 'Edit Attendee', 'camp-certificate' ),
				'view_item'          => __( 'View Attendee', 'camp-certificate' ),
				'all_items'          => __( 'All Attendees', 'camp-certificate' ),
				'search_items'       => __( 'Search Attendees', 'camp-certificate' ),
				'parent_item_colon'  => __( 'Parent Attendees:', 'camp-certificate' ),
				'not_found'          => __( 'No attendees found.', 'camp-certificate' ),
				'not_found_in_trash' => __( 'No attendees found in Trash.', 'camp-certificate' )
			),
			'public'          => false,
			'show_ui'         => true,
			'capability_type' => 'post',
			'hierarchical'    => false,
			'supports'        => array( 'title', 'editor', 'author' ),
			'menu_position'   => null,
			'menu_icon'       => 'dashicons-groups'
		) );
	}

}

new Camp_Certificate_Post_Types();
