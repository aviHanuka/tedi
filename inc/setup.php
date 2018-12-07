<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

if (!function_exists('init_avi_setup')):
	function init_avi_setup() {
		load_theme_textdomain('init_avi', get_template_directory() . '/languages');

		add_theme_support('title-tag');
		add_theme_support('custom-logo', array(
			'width' => 220,
			'height' => 165,
			'flex-width' => true,
		));
		add_theme_support( 'custom-header', array(
			'video' => true
		));
		add_theme_support('post-thumbnails');

		add_image_size('codja-image', 2000, 1200, true);
		add_image_size('codja-thumbnail', 100, 100, true);

		register_nav_menus(array(
			'top' => __('Top Menu', 'init_avi'),
			'social' => __('Social Menu', 'init_avi'),
			'bottom' => __('Bottom Menu', 'init_avi'),
			'login' => __('Login Menu', 'init_avi'),
			'client' => __('Client Menu', 'init_avi'),
		));


		add_filter('get_the_archive_title', function ($title) {

			if (is_category()) {
				$title = single_cat_title('', false);
			} elseif (is_tag()) {
				$title = single_tag_title('', false);
			}

			return $title;
		});

		add_filter('wpcf7_is_tel', function ($result, $tel) {
			return preg_match('/^\(?\+?([0-9]{1,4})?\)?[-\.]?(\d{6,})$/', $tel);
		});
	}
endif;
add_action('after_setup_theme', 'init_avi_setup');
