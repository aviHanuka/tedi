<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

if (!function_exists('enqueue_configurator')):
	function enqueue_configurator() {
		// css
		wp_enqueue_style('ich_hebrew', 'https://fonts.googleapis.com/earlyaccess/opensanshebrew.css');
		wp_enqueue_style('ich_hebrew2', 'https://fonts.googleapis.com/earlyaccess/opensanshebrewcondensed.css');
		wp_enqueue_style('init_avi_style', trailingslashit(get_stylesheet_directory_uri()) . 'style.css');
		wp_enqueue_style('bootstrap', trailingslashit(get_stylesheet_directory_uri()) . 'assets/css/bootstrap.min.css');
		wp_enqueue_style('bootstrap-theme', trailingslashit(get_stylesheet_directory_uri()) . 'assets/css/bootstrap-theme.min.css');
		wp_enqueue_style('bootstrap-rtl', trailingslashit(get_stylesheet_directory_uri()) . 'assets/css/bootstrap-rtl.min.css');
		wp_enqueue_style('font-awesome', trailingslashit(get_stylesheet_directory_uri()) . 'assets/css/font-awesome.min.css');
		// js
		wp_register_script( 'jquery3.2.1', 'https://code.jquery.com/jquery-3.2.1.min.js' );
		wp_add_inline_script( 'jquery3.2.1', 'var jQuery3_2_1 = $.noConflict(true);' );
		wp_enqueue_script( 'plugin-javascript', trailingslashit(get_stylesheet_directory_uri()). 'assets/js/jquery-3.2.1.min.js', array( 'jquery3.2.1' ) );
		wp_enqueue_script( 'script', trailingslashit(get_stylesheet_directory_uri()). 'assets/js/script.js', array( 'jquery3.2.1' ) );
	}
endif;
add_action('wp_enqueue_scripts', 'enqueue_configurator');
