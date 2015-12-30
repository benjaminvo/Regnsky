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

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<img class="bumpy-top_on-top" src="<?php echo get_stylesheet_directory_uri(); ?>/img/kant-footer.svg" alt="Footer kant">

        <div class="site-info container">
			<!-- 
            <a href="<?php //echo esc_url( __( 'https://wordpress.org/', 'regnsky' ) ); ?>"><?php //printf( esc_html__( 'Proudly powered by %s', 'regnsky' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php //printf( esc_html__( 'Theme: %1$s by %2$s.', 'regnsky' ), 'regnsky', '<a href="http://underscores.me/" rel="designer">Benjamin Ottensten</a>' ); ?>
             -->
    
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
