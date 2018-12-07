<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * The main page template file.
 */
get_header();?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
			if ( have_posts() ) : while ( have_posts() ) : the_post();?>
				<h1 class="regular-page-title"><?php the_title(); ?></h1>
				<div class="entry-content-page">
					<?php the_content(); ?>
				</div>
			<?php endwhile; wp_reset_postdata();
			endif;
			?>
		</main>
	</div>
<?php get_footer(); ?>