<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

function init_avi_add_new_post_types() {
	$vehicle_labels = array(
		'name'               => __('Vehicles'),
		'singular_name'      => __('Vehicle'),
		'menu_name'          => __('Vehicles'),
		'parent_item_colon'  => __('Parent Vehicle'),
		'all_items'          => __('all Vehicle'),
		'view_item'          => __('view Vehicle'),
		'add_new_item'       => __('add new Vehicle'),
		'add_new'            => __('add new'),
		'edit_item'          => __('edit Vehicle'),
		'update_item'        => __('update Vehicle'),
		'search_items'       => __('search Vehicle'),
		'not_found'          => __('Vehicle not found'),
		'not_found_in_trash' => __('Vehicle not found in trash')
	);

	$args = array(
		'label'               => __( 'Vehicles', 'init_avi' ),
		'description'         => __( 'Vehicles Post type for test', 'init_avi' ),
		'labels'              => $vehicle_labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		'taxonomies'          => array( 'model', 'class' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'menu_icon'           => 'dashicons-sos',
	);

	register_post_type( 'Vehicles', $args );
}
add_action( 'init', 'init_avi_add_new_post_types' );
