<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

$args = array(
    'post_type'         => 'vehicles',
    'post_status'       => 'Published',
    'posts_per_page'    => -1
);
$cars = new WP_Query($args);
$classes = get_terms( 'class', array(
    'hide_empty' => true,
) );
$models = get_terms( 'model', array(
    'hide_empty' => true,
) );
?>
<script src="<?php echo get_stylesheet_directory_uri() ?>/assets/js/bootstrap.min.js" type="application/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() ?>/assets/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() ?>/assets/css/admin/main.css" />

<meta charset="utf-8">
<div class="container avi_container text-center">
	<header class="row">
		<h2>Our Vehicles</h2>
		<div>
			<select class="avi_classes" name="avi_classes">
                <option value="0">none</option>
				<?php foreach ($classes as $class) : ?>
					<option data-count="<?php echo $class->count; ?>" value="<?php echo $class->term_id;?>"><?php echo $class->name;?></option>
				<?php endforeach; ?>
			</select>
			<select class="avi_models" name="avi_models">
                <option value="0">none</option>
				<?php foreach ($models as $model) : ?>
					<option data-count="<?php echo $model->count; ?>" value="<?php echo $model->term_id;?>"><?php echo $model->name;?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</header>
    <hr/>
	<div class="row cj_cars_container">
		<?php // post_title //
		if ( $cars->have_posts() ) :
		while ( $cars->have_posts() ) : $cars->the_post();
			$car_id = get_the_ID();
			$img = get_the_post_thumbnail($car_id, 'full');
			$car_class = get_the_terms($car_id, 'class');
			$car_model = get_the_terms($car_id, 'model');
			?>
				<div class="col-xs-12 col-sm-6 col-md-4">
					<div class="text-center" data-id="<?php echo $car_id; ?>">
						<picture>
							<a href="<?php echo get_edit_post_link($car_id);?>" target="_blank" title="edit <?php echo get_the_title($car_id); ?>"><?php echo $img;?></a>
						</picture>
						<h3><?php echo get_the_title($car_id); ?></h3>
						<div><strong>Model</strong> <?php echo $car_model[0]->name;?></div>
						<div><strong>Class</strong> <?php echo $car_class[0]->name;?></div>
					</div>
				</div>
		<?php endwhile; endif; ?>
	</div>
	<footer>
        <script>
            (function ($) {
                $(document).ready(function () {
                    const url = '<?php echo admin_url('admin-ajax.php'); ?>';
                    const avi_classes = $(".avi_classes");
                    const avi_models = $(".avi_models");
                    const cj_cars_container = $(".cj_cars_container");
                    let params = [];

                    avi_classes.on("change", function () {
                        fn_send.test_the_change("class", $(this).val());
                    });
                    avi_models.on("change", function () {
                        fn_send.test_the_change("model", $(this).val());
                    });

                    const fn_send = {
                        'test_the_change': function (type, val) {
                            if ( val == 0 ) {
                                delete params[type];
                            } else {
                                params[type] = val;
                            }
                            fn_send.send_ajax(params);
                        },
                        'send_ajax': function (params) {
                            fn_send.show_loader(1);
                            let data_object = {
                                action: 'init_avi_filter',
                                nonce: '<?php echo wp_create_nonce("avi_filter_cars"); ?>'
                            };
                            if ( params.class ) {
                                data_object.param_class = params.class;
                            }
                            if ( params.model ) {
                                data_object.param_model = params.model;
                            }
                            $.ajax({
                                url: url,
                                data: data_object,
                                method: 'GET',
                                crossDomain: true,
                            }).then(function (response) {
                                fn_send.show_loader(2);
                                fn_send.place_html(response)
                            })
                        },
                        'show_loader': function (param) {
                            if ( param == 1 ) {
                                console.log('start');
                            } else {
                                console.log('end');
                            }
                        },
                        'place_html' : function (response) {
                            console.log(response);
                            cj_cars_container.html("");
                            if ( response ) {
                                response = JSON.parse(response);
                                $.each(response, function (index, value) {
                                    console.log(value);
                                    let link_edit_post = '<?php echo get_home_url();?>/wp-admin/post.php?post=' + value.ID + '&action=edit';
                                    cj_cars_container.append('' +
                                        '<div class="col-xs-12 col-sm-6 col-md-4"><div class="text-center" data-id="'+ value.ID + '">' +
                                        '<picture><a href="'+ link_edit_post + '" target="_blank" title="edit ' + value.post_title + '"><img src="'+ value.img + '" alt="'+ value.post_title + '"/></a></picture>' +
                                        '<h3>' + value.post_title + '</h3>' +
                                        '<div><strong>Model </strong>' + value.car_model + '</div>' +
                                        '<div><strong>Class </strong>' + value.car_class + '</div>' +
                                        '</div></div>')
                                });
                            } else {
                                cj_cars_container.append('<div><h4>there is no vehicles that matches your search!</h4></div>');
                            }
                        }
                    };
                });
            })(jQuery);
        </script>
	</footer>
</div>
