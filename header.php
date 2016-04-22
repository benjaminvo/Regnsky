<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package regnsky
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('sitename') ?> Feed" href="<?php echo get_bloginfo('rss2_url') ?>">

		<!-- start Google Analytics -->
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-56401674-1', 'auto');
		  ga('send', 'pageview');
		</script>
		<!-- end Google Analytics -->

		<?php wp_head(); ?>

		<!-- Open Graph tags to customize link previews -->
		<!-- <meta property="og:url"           content="<?php //echo esc_url( home_url( '/' ) ); ?>" />
		<meta property="og:type"          content="website" />
		<meta property="og:title"         content="Regnsky" />
		<meta property="og:description"   content="Danmarks sødeste musikblog siden 2008" />
		<meta property="og:image"         content="<?php //echo get_stylesheet_directory_uri(); ?>/img/logo-regnsky_transparent.gif" /> -->
		
	</head>

	<body <?php body_class(); ?>>

		<div class="page-wrap">

			<div class="topbanner">
				<!-- empty -->
			</div>

			<div id="page" class="site">
				<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'regnsky' ); ?></a>

				<header id="masthead" class="site-header" role="banner">

					<div class="container">

						<div class="site-branding">
							
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-regnsky_transparent.gif" alt="logo">
							</a>
							
							<span class="tagline">Danmarks sødeste<br>musikblog siden 2008</span>

						</div>

						<nav id="site-navigation" class="main-navigation" role="navigation">
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
						</nav>
						
						<a id="menu-toggle" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
							<div class="bar-wrap">
								<span class="bar bar-1"></span>
								<span class="bar bar-2"></span>
								<span class="bar bar-3"></span>
							</div>
						</a>

					</div>

					<nav id="site-navigation_mobile" class="main-navigation_mobile" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu_mobile' ) ); ?>
					</nav>

				</header>

				<div id="content" class="site-content">
