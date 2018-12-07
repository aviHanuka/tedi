<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

function widgets_start() {
	register_sidebar(array(
		'name' => __('Left sidebar', 'cj_clean'),
		'id' => 'sidebar-in-left',
		'description' => __('Add widgets here to appear in your footer.', 'cj_clean'),
		'before_widget' => '<figure id="%1$s" class="widget %2$s">',
		'after_widget' => '</figure>',
		'before_title' => '<header class="widget-title">',
		'after_title' => '</header>',
	));
	register_sidebar(array(
		'name' => __('Sidebar in footer', 'cj_clean'),
		'id' => 'sidebar-in-footer',
		'description' => __('Add widgets here to appear in your footer.', 'cj_clean'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
}
add_action('widgets_init', 'widgets_start');
