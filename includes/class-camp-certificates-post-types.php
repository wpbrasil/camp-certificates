<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Camp Certificates Post Types.
 */
class Camp_Certificates_Post_Types {

	/**
	 * Initialize the taxonomies.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'register_post_types' ), 5 );
		add_action( 'init', array( $this, 'register_taxonomies' ), 5 );
	}

	/**
	 * Register Post Types.
	 *
	 * @return void
	 */
	public function register_post_types() {
		if ( post_type_exists( 'cc_events' ) ) {
			return;
		}

		register_post_type( 'cc_events', array(
			'labels'          => array(
				'name'               => _x( 'Events', 'post type general name', 'camp-certificates' ),
				'singular_name'      => _x( 'Event', 'post type singular name', 'camp-certificates' ),
				'menu_name'          => _x( 'Events', 'admin menu', 'camp-certificates' ),
				'name_admin_bar'     => _x( 'Event', 'add new on admin bar', 'camp-certificates' ),
				'add_new'            => _x( 'Add New', 'book', 'camp-certificates' ),
				'add_new_item'       => __( 'Add New Event', 'camp-certificates' ),
				'new_item'           => __( 'New Event', 'camp-certificates' ),
				'edit_item'          => __( 'Edit Event', 'camp-certificates' ),
				'view_item'          => __( 'View Event', 'camp-certificates' ),
				'all_items'          => __( 'All Events', 'camp-certificates' ),
				'search_items'       => __( 'Search Events', 'camp-certificates' ),
				'parent_item_colon'  => __( 'Parent Events:', 'camp-certificates' ),
				'not_found'          => __( 'No events found.', 'camp-certificates' ),
				'not_found_in_trash' => __( 'No events found in Trash.', 'camp-certificates' )
			),
			'public'          => false,
			'show_ui'         => true,
			'capability_type' => 'post',
			'hierarchical'    => false,
			'supports'        => array( 'title', 'author' ),
			'menu_position'   => null,
			'menu_icon'       => 'dashicons-clipboard'
		) );

		register_post_type( 'cc_attendees', array(
			'labels'          => array(
				'name'               => _x( 'Attendees', 'post type general name', 'camp-certificates' ),
				'singular_name'      => _x( 'Attendee', 'post type singular name', 'camp-certificates' ),
				'menu_name'          => _x( 'Attendees', 'admin menu', 'camp-certificates' ),
				'name_admin_bar'     => _x( 'Attendee', 'add new on admin bar', 'camp-certificates' ),
				'add_new'            => _x( 'Add New', 'book', 'camp-certificates' ),
				'add_new_item'       => __( 'Add New Attendee', 'camp-certificates' ),
				'new_item'           => __( 'New Attendee', 'camp-certificates' ),
				'edit_item'          => __( 'Edit Attendee', 'camp-certificates' ),
				'view_item'          => __( 'View Attendee', 'camp-certificates' ),
				'all_items'          => __( 'All Attendees', 'camp-certificates' ),
				'search_items'       => __( 'Search Attendees', 'camp-certificates' ),
				'parent_item_colon'  => __( 'Parent Attendees:', 'camp-certificates' ),
				'not_found'          => __( 'No attendees found.', 'camp-certificates' ),
				'not_found_in_trash' => __( 'No attendees found in Trash.', 'camp-certificates' )
			),
			'public'          => false,
			'show_ui'         => true,
			'capability_type' => 'post',
			'hierarchical'    => false,
			'supports'        => array( 'title', 'author' ),
			'menu_position'   => null,
			'menu_icon'       => 'dashicons-groups'
		) );
	}

	/**
	 * Register Taxonomies.
	 */
	public function register_taxonomies() {
		if ( taxonomy_exists( 'cc_attendee_type' ) ) {
			return;
		}

		register_taxonomy( 'cc_attendee_type', 'cc_attendees', array(
			'labels'       => array(
				'name'              => _x( 'Attendee Types', 'taxonomy general name', 'camp-certificates' ),
				'singular_name'     => _x( 'Attendee Type', 'taxonomy singular name', 'camp-certificates' ),
				'menu_name'         => _x( 'Attendee Types', 'admin menu', 'camp-certificates' ),
				'search_items'      => __( 'Search Attendee Types', 'camp-certificates' ),
				'all_items'         => __( 'All Attendee Types', 'camp-certificates' ),
				'parent_item'       => __( 'Parent Attendee Types', 'camp-certificates' ),
				'parent_item_colon' => __( 'Parent Attendee Types:', 'camp-certificates' ),
				'edit_item'         => __( 'Edit Attendee Type', 'camp-certificates' ),
				'update_item'       => __( 'Update Attendee Type', 'camp-certificates' ),
				'add_new_item'      => __( 'Add New Attendee Type', 'camp-certificates' ),
				'new_item_name'     => __( 'New Attendee Type', 'camp-certificates' )
			),
			'public'       => false,
			'show_ui'      => true,
			'hierarchical' => true
		) );
	}
}

new Camp_Certificates_Post_Types();
