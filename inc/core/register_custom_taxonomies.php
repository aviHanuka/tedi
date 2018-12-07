<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

function init_avi_custom_taxonomy() {
//	unregister_taxonomy_for_object_type( 'Model', 'vehicles' );
//	unregister_taxonomy_for_object_type( 'Class', 'vehicles' );
	// models taxonomy labels
	$labels_model = array(
		'name' => _x( 'Models', 'taxonomy general name' ),
		'singular_name' => _x( 'Model', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Models' ),
		'popular_items' => __( 'Popular Models' ),
		'all_items' => __( 'All Models' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit Model' ),
		'update_item' => __( 'Update Model' ),
		'add_new_item' => __( 'Add New Model' ),
		'new_item_name' => __( 'New Model Name' ),
		'separate_items_with_commas' => __( 'Separate Models with commas' ),
		'add_or_remove_items' => __( 'Add or remove Models' ),
		'choose_from_most_used' => __( 'Choose from the most used Models' ),
		'menu_name' => __( 'Models' ),
	);
	// class taxonomy labels
	$labels_class = array(
		'name' => _x( 'Classes', 'taxonomy general name' ),
		'singular_name' => _x( 'Class', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Classes' ),
		'popular_items' => __( 'Popular Classes' ),
		'all_items' => __( 'All Classes' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit Class' ),
		'update_item' => __( 'Update Class' ),
		'add_new_item' => __( 'Add New Class' ),
		'new_item_name' => __( 'New Class Name' ),
		'separate_items_with_commas' => __( 'Separate Classes with commas' ),
		'add_or_remove_items' => __( 'Add or remove Classes' ),
		'choose_from_most_used' => __( 'Choose from the most used Classes' ),
		'menu_name' => __( 'Classes' ),
	);

	// register `class` taxonomy
	register_taxonomy('class','vehicles',array(
		'hierarchical' => false,
		'labels'       => $labels_class,
		'show_ui'      => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		'rewrite'   => array( 'slug' => 'Class' ),
	));
	// register `model` taxonomy
	register_taxonomy('model','vehicles',array(
		'hierarchical' => false,
		'labels'       => $labels_model,
		'show_ui'      => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		'rewrite'   => array( 'slug' => 'Model' ),
	));
}

add_action( 'init', 'init_avi_custom_taxonomy', 0 );
