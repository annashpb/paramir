<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Beetroot
 */

?>

</main><!-- #content -->

<footer id="footer-container" class="site-footer" role="contentinfo">
	<div class="container site-footer__container">
		<div class="site-footer__block">
			<h3 class="site-footer__headline"><?php _e('Информация'); ?></h3>
			<nav class="nav-footer site-footer__navigation">
				<?php
				if (has_nav_menu('footer_menu')) :
					wp_nav_menu(
						[
							'theme_location' => 'footer_menu',
							'menu_id'        => 'footer-menu',
							// 'walker'         => new beetroot_navwalker(),
						]
					);
				endif;
				?>
			</nav><!-- .nav-primary -->
		</div>
		<div class="site-footer__block">
			<h3 class="site-footer__headline"><?php _e('Контакты'); ?></h3>
			<?php if (have_rows('telephone_number', 'option')) : ?>
				<?php while (have_rows('telephone_number', 'option')) : the_row(); ?>
					<p class="site-footer__text"><?php the_sub_field('phone_number'); ?></p>
				<?php endwhile; ?>
			<?php endif; ?>
			<p class="site-footer__text">email:</p>
			<p class="site-footer__text"><?php the_field('email', 'option'); ?></p>
		</div>
		<div class="site-footer__block">
			<h3 class="site-footer__headline"><?php _e('Личный кабинет'); ?></h3>
			<p class="site-footer__text"><a href="#" class="site-footer__link"><?php _e('Вход'); ?></a></p>
			<p class="site-footer__text"><a href="#" class="site-footer__link"><?php _e('Регистрация'); ?></a></p>
		</div>
		<div class="site-footer__block">
			<h3 class="site-footer__headline"><?php _e('Мы в социальных сетях'); ?></h3>
			<?php if (have_rows('social_links', 'option')) : ?>
				<?php while (have_rows('social_links', 'option')) : the_row(); ?>
					<a href="<?php echo get_sub_field('social_link_address')['url']; ?>" class="site-footer__socials" target="<?php echo get_sub_field('social_link_address')['target']; ?>" title="<?php echo get_sub_field('social_link_address')['title']; ?>" style="background: url('<?php the_sub_field('social_link_icon'); ?>') center no-repeat;"></a>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>
</body>

</html>