<?php

/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Beetroot
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header class="banner">
		<div class="container header-container">
			<a class="brand" href="<?php esc_url(home_url('/')); ?>">
				<img src="<?php echo get_field('site_logo', 'option')['url']; ?>" alt="<?php echo get_field('site_logo', 'option')['alt']; ?>" width="<?php echo get_field('site_logo', 'option')['width']; ?>" height="<?php echo get_field('site_logo', 'option')['height']; ?>">
			</a>
			<div class="navigation-content">
				<nav class="nav-primary">
					<?php
					if (has_nav_menu('primary')) :
						wp_nav_menu(
							[
								'theme_location' => 'primary',
								'menu_id'        => 'primary-menu',
								// 'walker'         => new beetroot_navwalker(), ----- what is that?
							]
						);
					endif;
					?>
				</nav><!-- .nav-primary -->
				<div class="search-form">
					<?php dynamic_sidebar('search-widget'); ?>
				</div>
			</div>
		</div><!-- .container -->
	</header><!-- .banner -->
	<div id="content" class="site-content">