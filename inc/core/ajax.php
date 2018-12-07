<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

add_action("wp_ajax_init_avi_filter", "init_avi_filter");
add_action("wp_ajax_nopriv_init_avi_filter", "init_avi_filter");

/*
 * init_avi_filter
 * this function get from ajax the params of (model taxonomy id && class taxonomy id )
 * @return json-decoded data
 */
function init_avi_filter() {
	if ( ! wp_verify_nonce( $_REQUEST['nonce'], "avi_filter_cars" ) ) {
		exit( "bad request" );
	}
	$model = $_GET['param_model'];
	$class = $_GET['param_class'];
	$tax_query = array();

	if ( $model && !$class ) {
		$tax_query = array(
			array(
				'taxonomy' => 'model',
				'field'    => 'term_id',
				'terms'    => $model
			)
		);
	}
	if ( $class && !$model ) {
		$tax_query = array(
			array(
				'taxonomy' => 'class',
				'field'    => 'term_id',
				'terms'    => $class
			)
		);
	}
	if ( $class && $model ) {
		$tax_query = array(
			'relation' => 'AND',
			array(
				'taxonomy' => 'model',
				'field'    => 'term_id',
				'terms'    => $model
			),
			array(
				'taxonomy' => 'class',
				'field'    => 'term_id',
				'terms'    => $class
			)
		);
	}

	$args = array(
		'post_type'      => 'vehicles',
		'post_status'    => 'publish',
		'posts_per_page' => - 1,
		'tax_query' => $tax_query
	);

	$cars = new WP_Query( $args );
	if ( $cars->have_posts() ) {
		$back_array = array();
		$i          = 0;
		while ( $cars->have_posts() ) {
			$cars->the_post();
			$back_array[$i]['ID']    = get_the_ID();
			$back_array[$i]['post_title']    = get_the_title(get_the_ID());
			$back_array[$i]['img']       = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID()), 'full', true)[0];
			$car_class = get_the_terms(get_the_ID(), 'class');
			$car_model = get_the_terms(get_the_ID(), 'model');
			$back_array[$i]['car_class'] = $car_class[0]->name;
			$back_array[$i]['car_model'] = $car_model[0]->name;
			$i ++;
		}
		echo json_encode($back_array);
	}
	die();
}
