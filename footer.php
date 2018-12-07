<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * The template for displaying the footer
 */
?>
</div>
</main>
<footer class="site-footer" role="contentinfo">
	<div class="flex-container site-footer-menus">
		<?php if (has_nav_menu('bottom')) : ?>
			<?php wp_nav_menu(array(
				'theme_location' => 'bottom',
				'menu_id' => 'bottom-menu',
			)); ?>
		<?php endif; ?>
		<?php if (has_nav_menu('social')) : ?>
			<?php wp_nav_menu(array(
				'theme_location' => 'social',
				'menu_id' => 'social-menu',
			)); ?>
		<?php endif; ?>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
