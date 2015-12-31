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
</head>

<body <?php body_class(); ?>>

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
				<img class="header-regnsky" src="<?php echo get_stylesheet_directory_uri(); ?>/img/header-regnsky.png" alt="Header">
			</a>
			
			<!-- <img src="<?php //echo get_stylesheet_directory_uri(); ?>/img/kant-header.svg" alt="" class="header-border"> -->

			<!-- <svg class="header-border" viewBox="0 0 1440 138" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
			    <!-- Generator: Sketch 3.4.2 (15855) - http://www.bohemiancoding.com/sketch -->
			    <!-- <title>Hvid kant</title>
			    <desc>Created with Sketch.</desc>
			    <defs></defs>
			    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
			        <g id="sketch:type="MSArtboardGroup" transform="translate(-294.000000, 0.000000)" fill="#FFFFFF">
			            <g id="sketch:type="MSLayerGroup" transform="translate(214.000000, -13.000000)">
			                <g sketch:type="MSShapeGroup">
			                    <g>
			                        <path d="M1268,12.9999996 C1165.50361,12.9999997 1113.7922,129.826114 1072.6832,138.695159 C1062,141.000001 1057,144.000001 1012,144.000001 C939,144.000001 884.481308,137.039666 800,136 C741.969512,135.28585 656.980754,141 611,141 C579.279805,141 550,147 410,138.69516 C360.582574,135.763704 304.052811,132.675769 255,133.231689 C186.712203,134.005602 114,144 80,144 L80,151.000001 L1520,151 L1520,13 C1506,13 1370.49639,12.9999995 1268,12.9999996 Z" id="Hvid-kant"></path>
			                    </g>
			                </g>
			            </g>
			        </g>
			    </g>
			</svg> -->

			<svg class="header-border" width="1880px" height="138px" viewBox="0 0 1880 138" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
			    <defs></defs>
			    <g id="Desktop" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
			        <g id="Artboard-5" sketch:type="MSArtboardGroup" fill="#FFFFFF">
			            <path d="M1628,2.01027248e-08 C1525.50361,1.51522318e-07 1473.7922,116.826114 1432.6832,125.695159 C1422,128.000001 1417,131.000001 1372,131.000001 C1299,131.000001 1244.48131,124.039666 1160,123 C1101.96951,122.285851 1016.98075,128 971,128 C939.279805,128 910,134 770,125.69516 C720.582574,122.763704 664.052811,119.675769 615,120.23169 C574.063902,120.695623 513.569987,126.473006 464.353028,129.424532 C453.644431,130.066723 402.113132,132.457732 337.011577,132.693051 C290.826991,132.859991 237.812739,128.713861 187.69904,128.449569 C91.527128,127.942371 6.03750525,131 0,131 L0,138.000001 L1880,138 L1880,4.44627169e-07 C1866,4.44627169e-07 1730.49639,-1.11316865e-07 1628,2.01027248e-08 Z" id="Hvid-kant" sketch:type="MSShapeGroup"></path>
			        </g>
			    </g>
			</svg>

			<a id="menu-toggle" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<span class="bar-1"></span>
				<span class="bar-2"></span>
				<span class="bar-3"></span>
			</a>
		</div>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
		
		<div class="site-branding site-branding-header">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-regnsky_transparent.gif" alt="logo">
			</a>
			<span class="site-description">Danmarks sødeste<br>musikblog siden 2008</span>

			<!-- 
			<?php
			//$description = get_bloginfo( 'description', 'display' );
			//if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php //echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			//endif; ?>
			-->
		</div><!-- .site-branding -->

	</header><!-- #masthead -->

	<div id="content" class="site-content container">
		<div class="row">
