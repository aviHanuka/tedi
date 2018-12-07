<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header(); ?>
	<style>
		#notfound {
			position: relative;
			height: 100vh;
		}
		#notfound .notfound {
			position: absolute;
			left: 50%;
			top: 50%;
			-webkit-transform: translate(-50%, -50%);
			-ms-transform: translate(-50%, -50%);
			transform: translate(-50%, -50%);
		}
		.notfound {
			max-width: 520px;
			width: 100%;
			text-align: center;
		}
		.notfound .notfound-bg {
			position: absolute;
			left: 0px;
			right: 0px;
			top: 50%;
			-webkit-transform: translateY(-50%);
			-ms-transform: translateY(-50%);
			transform: translateY(-50%);
			z-index: -1;
		}
		.notfound .notfound-bg > div {
			width: 100%;
			background: #fafbfd;
			border-radius: 90px;
			height: 125px;
		}
		.notfound .notfound-bg > div:nth-child(1) {
			position: relative;
			z-index: 10;
			border-radius: 100%;
			height: 50px;
			width: 50%;
			left: 0;
			right: 0;
			margin: 0 auto;
			bottom: -20px;
		}
		.notfound .notfound-bg > div:nth-child(2) {
			-webkit-box-shadow: 5px 5px 0px 0px #f3f3f3;
			box-shadow: 5px 5px 0px 0px #f3f3f3;
		}
		.notfound .notfound-bg > div:nth-child(3) {
			-webkit-transform: scale(1.3);
			-ms-transform: scale(1.3);
			transform: scale(1.3);
			-webkit-box-shadow: 5px 5px 0px 0px #f3f3f3;
			box-shadow: 5px 5px 0px 0px #f3f3f3;
			position: relative;
			z-index: 10;
		}
		.notfound .notfound-bg > div:nth-child(4) {
			-webkit-box-shadow: 5px 5px 0px 0px #f3f3f3;
			box-shadow: 5px 5px 0px 0px #f3f3f3;
			position: relative;
			z-index: 90;
		}
		.notfound .notfound-bg > div:nth-child(5) {
			-webkit-box-shadow: 5px 5px 0px 0px #f3f3f3;
			box-shadow: 5px 5px 0px 0px #f3f3f3;
			position: relative;
			z-index: 100;
			border-radius: 100%;
			height: 50px;
			width: 50%;
			left: 0;
			right: 0;
			top: -20px;
			margin: 0 auto;
		}
		.notfound h1 {
			font-size: 86px;
			font-weight: 700;
			margin-top: 0;
			margin-bottom: 8px;
			color: #000;
		}
		.notfound h2 {
			font-size: 26px;
			margin: 0;
			font-weight: 700;
			color: #000;
		}
		.notfound a {
			font-size: 14px;
			text-decoration: none;
			background: #50ceca;
			display: inline-block;
			padding: 15px 30px;
			border-radius: 5px;
			color: #fff;
			font-weight: 700;
			margin-top: 20px;
		}
		@media only screen and (max-width: 767px) {
			.notfound .notfound-bg {
				width: 287px;
				margin: auto;
			}
			.notfound .notfound-bg > div {
				height: 85px;
			}
			#notfound {
				height: 80vh;
			}
			.notfound h1 {
				font-size: 40px;
			}
			.notfound h2 {
				font-size: 24px;
			}
			.notfound a {
				font-size: 12px;
				padding: 10px 30px;
			}
		}
	</style>
	<div id="notfound">
		<div class="notfound">
			<div class="notfound-bg">
				<div></div>
				<div></div>
				<div></div>
				<div></div>
				<div></div>
			</div>
			<h1><?php _e('oops!','languages'); ?></h1>
			<h2><?php _e('Error 404 : Page Not Found','languages'); ?></h2>
			<a href="<?php echo get_home_url(); ?>"><?php _e('Home','languages'); ?></a>
		</div>
	</div>
<?php get_footer(); ?>