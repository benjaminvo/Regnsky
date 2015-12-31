<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package regnsky
 */

?>

	   </div> <!-- .row -->
    </div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<img class="bumpy-top_on-top" src="<?php echo get_stylesheet_directory_uri(); ?>/img/kant-footer.svg" alt="Footer kant">

        <div class="site-info container">

            <nav class="footer-navigation" role="navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
            </nav>
    
            <p class="text-sub text-mute">
                Copyright © Regnsky-skribenterne 2016<br>
                Hjemmeside af <a href="ungtriumf.dk">Benjamin Vedel Ottensten</a><br>
                Illustration af Nan Na Hvass
            </p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
