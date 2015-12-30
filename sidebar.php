<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package regnsky
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="sidebar widget-area" role="complementary">

    <!-- <img class="kant-sidebar-top" src="<?php //echo get_stylesheet_directory_uri(); ?>/img/kant-sidebar-top.svg" alt=""> -->

    <svg class="kant-sidebar-top" viewBox="0 0 370 10" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
        <!-- Generator: Sketch 3.4.2 (15855) - http://www.bohemiancoding.com/sketch -->
        <title>Kanter</title>
        <desc>Created with Sketch.</desc>
        <defs></defs>
        <g id="Artikel" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
            <g id="Artboard-9" sketch:type="MSArtboardGroup" transform="translate(-100.000000, -96.000000)" fill="#FFFFFF">
                <g id="Kanter" sketch:type="MSLayerGroup" transform="translate(100.000000, 96.000000)">
                    <path d="M370,-5.32907052e-15 L370,6.56456184 C356.314684,4.96367653 338.791855,3.95997642 326.294764,2.88782694 C301.606147,0.769743096 276.741767,0.359718872 251.935328,0.253964259 C221.77461,0.125383321 189.866622,0.89375537 159.564385,2.88782608 C98.8932151,6.88035648 83.6610638,0.0670584562 39.7840317,1.83388787 C23.2349775,2.50028107 11.4015364,3.4693467 -2.27373675e-13,3.71467813 L-1.24731631e-13,-3.88578059e-15 L370,-3.77475828e-15 L370,-5.32907052e-15 Z" id="Sidebar-kant-top" sketch:type="MSShapeGroup"></path>
                </g>
            </g>
        </g>
    </svg>

    <div class="site-branding">
        <div>
            <img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-regnsky_transparent.gif" alt="logo">
            <span class="site-description text-sub">Danmarks sødeste<br>musikblog siden 2008</span>
        </div>
    </div>

    <p class="sidebar-site-description">Regnsky er en lille, dansk musikblog, der har eksisteret siden 2008. Her skriver unge skribenter om nyt musik gennem nyheder, anmeldelser og livereportager. <a class="h4" href="<?php echo esc_url( home_url( '/om-regnsky/' ) ); ?>">Læs mere</a></p>

    <div class="sidebar-fb">
        <span class="fb-follow-text text-sub">Følg Regnsky på Facebook:</span>
        <div class="fb-like" data-href="https://www.facebook.com/regnsky.dk/" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
    </div>

	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
