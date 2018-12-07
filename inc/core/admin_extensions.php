<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

function init_avi_custom_menu_page() {

	add_menu_page(
		__( 'Catalog', 'init_avi' ),
		'cars catalog',
		'manage_options',
		'admin-template/template-catalog.php',
		'init_avi_render_page_for_admin_catalog',
		'',
		6 );
}

add_action( 'admin_menu', 'init_avi_custom_menu_page' );

function init_avi_render_page_for_admin_catalog() {
	include_once 'admin-template/template-catalog.php';
}
