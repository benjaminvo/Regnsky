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
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<script type="application/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/fastClick.js"></script>
<script>
	// Remove 300ms delay on touch screens
	if ('addEventListener' in document) {
	    document.addEventListener('DOMContentLoaded', function() {
	        FastClick.attach(document.body);
	    }, false);
	}
</script>

<?php wp_head(); ?>

<!-- Open Graph tags to customize link previews -->
<meta property="og:url"           content="<?php echo esc_url( home_url( '/' ) ); ?>" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="Regnsky" />
<meta property="og:description"   content="Danmarks sødeste musikblog siden 2008" />
<meta property="og:image"         content="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-regnsky_transparent.gif" />

</head>

<body <?php body_class(); ?>>

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=137149236384098";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'regnsky' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<div class="site-header-top">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img class="header-regnsky" src="<?php echo get_stylesheet_directory_uri(); ?>/img/header-regnsky.jpg" alt="Header">
			</a>

			<svg class="header-border" width="2200px" height="138px" viewBox="0 0 2200 138" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
			    <defs></defs>
			    <g id="Desktop" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
			        <g id="Artboard-5" sketch:type="MSArtboardGroup" fill="#FFFFFF">
			            <path d="M1628,2.01027248e-08 C1525.50361,1.51522318e-07 1473.7922,116.826114 1432.6832,125.695159 C1422,128.000001 1417,131.000001 1372,131.000001 C1299,131.000001 1244.48131,124.039666 1160,123 C1101.96951,122.285851 1016.98075,128 971,128 C939.279805,128 910,134 770,125.69516 C720.582574,122.763704 664.052811,119.675769 615,120.23169 C574.063902,120.695623 513.569987,126.473006 464.353028,129.424532 C453.644431,130.066723 402.113132,132.457732 337.011577,132.693051 C290.826991,132.859991 237.812739,128.713861 187.69904,128.449569 C91.527128,127.942371 6.03750525,131 0,131 L0,138.000001 L2200,138 L2200,4.44627176e-07 C2186,4.44627176e-07 1730.49639,-1.11316865e-07 1628,2.01027248e-08 Z" id="Hvid-kant" sketch:type="MSShapeGroup"></path>
			        </g>
			    </g>
			</svg>

			<a id="menu-toggle" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<span class="bar-1"></span>
				<span class="bar-2"></span>
				<span class="bar-3"></span>
			</a>
		</div>

		<!-- <nav id="site-navigation" class="main-navigation" role="navigation"> -->
			<?php //wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		<!-- </nav> -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<?php 
				wp_nav_menu( array( 'theme_location' => 'menu-pages', 'menu_id' => 'menu-pages' ) ); 
				wp_nav_menu( array( 'theme_location' => 'menu-categories', 'menu_id' => 'menu-categories' ) ); 
			?>
		</nav><!-- #site-navigation -->

		<div class="site-branding site-branding-header container-fluid">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-regnsky_transparent.gif" alt="logo">
			</a>
			<span class="site-description">Danmarks sødeste<br>musikblog siden 2008 </span>
		</div><!-- .site-branding -->

	</header><!-- #masthead -->

	<div id="content" class="site-content container-fluid">
		<div class="row row-main">
