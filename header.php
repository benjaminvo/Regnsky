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
<!-- <meta property="og:url"           content="<?php //echo esc_url( home_url( '/' ) ); ?>" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="Regnsky" />
<meta property="og:description"   content="Danmarks sødeste musikblog siden 2008" />
<meta property="og:image"         content="<?php //echo get_stylesheet_directory_uri(); ?>/img/logo-regnsky_transparent.gif" />
 -->
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
				<span class="bar-1"></span>
				<span class="bar-2"></span>
				<span class="bar-3"></span>
			</a>

		</div>

	</header>

	<div id="content" class="site-content">
