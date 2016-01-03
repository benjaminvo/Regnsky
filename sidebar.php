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

<aside id="secondary" class="sidebar widget-area col-lg-4 col-lg-offset-0" role="complementary">
    <div class="sidebar-content-wrapper">
        <img class="bumpy-top" src="<?php echo get_stylesheet_directory_uri(); ?>/img/kant-sidebar-top.png" alt="">
        <img class="bumpy-bottom" src="<?php echo get_stylesheet_directory_uri(); ?>/img/kant-sidebar-bottom.png" alt="">
        <img class="bumpy-left" src="<?php echo get_stylesheet_directory_uri(); ?>/img/kant-sidebar-left.png" alt="">
        <img class="bumpy-right" src="<?php echo get_stylesheet_directory_uri(); ?>/img/kant-sidebar-right.png" alt="">

        <div class="site-branding">
            <img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-regnsky_transparent.gif" alt="logo">
            <span class="site-description text-sub">Danmarks sødeste<br>musikblog siden 2008</span>
        </div>

        <p class="sidebar-site-description">Regnsky er en lille, dansk musikblog, der har eksisteret siden 2008. Her skriver unge skribenter om nyt musik gennem nyheder, anmeldelser og livereportager. <a href="<?php echo esc_url( home_url( '/om-regnsky/' ) ); ?>">Læs mere</a>.</p>

        <div class="social-buttons">
            <a href="#" onclick="return false;"><img class="social-btn social-btn-rss" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon-rss_black.png" alt="RSS Feed"></a>
            <a href="#" onclick="return false;"><img class="social-btn social-btn-fb" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon-fb_black.png" alt="Regnsky on Facebook"></a>
            <a href="#" onclick="return false;"><img class="social-btn social-btn-twitter" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon-twitter_black.png" alt="Regnsky on twitter"></a>
            <a href="#" onclick="return false;"><img class="social-btn social-btn-hypem" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon-hypem_black.png" alt="Regnsky on Hype Machine"></a>
        </div>

        <div class="sidebar-fb">
            <span class="fb-follow-text text-sub">Følg Regnsky på Facebook:</span>
            <div class="fb-like" data-href="https://www.facebook.com/regnsky.dk/" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
        </div>

    	<?php dynamic_sidebar( 'sidebar-1' ); ?>

        <div class="widget widget-spotify">
            <h4 class="widget-title">Ugens sang</h4>
            <p>2016's første uge byder på canadisk pop fra 29-årige Sean Nicholas Savage.</p>
            <iframe class="spotify-embed-track" src="https://embed.spotify.com/?uri=spotify%3Atrack%3A6fzATkBUwNDRNqKCGitAB2" width="100%" height="80" frameborder="0" allowtransparency="true"></iframe>
        </div>
    </div>

</aside><!-- #secondary -->
