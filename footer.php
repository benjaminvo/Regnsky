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
		<img class="bumpy-top_on-top" src="<?php echo get_stylesheet_directory_uri(); ?>/img/kant-footer.png" alt="Footer kant">

        <div class="site-info container">

            <nav class="footer-navigation" role="navigation">
                <?php 
                    wp_nav_menu( array( 'theme_location' => 'menu-pages', 'menu_id' => 'menu-pages' ) ); 
                    wp_nav_menu( array( 'theme_location' => 'menu-categories', 'menu_id' => 'menu-categories' ) ); 
                ?>
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

<script>
    
    var headerPosition = $('.site-header').offset();

    $(window).scroll(function(){
        if($(window).scrollTop() >= headerPosition.top){
            // $('.site-header').css({'position':'fixed','top':'0'});
            $('.site-header').addClass("stick");
            $('#content').css({'margin-top':'165px'});
        } else {
            // $('.site-header').css({'position':'static'});
            $('.site-header').removeClass("stick");
            $('#content').css({'margin-top':'0px'});
        }
    });

    // var headerPos = header.offset();
            
    // $(window).scroll(function() {
    //     var windowpos = $(window).scrollTop();
        
    //     if (windowpos >= header.pos) {
    //         header.addClass("stick");
    //     } else {
    //         header.removeClass("stick"); 
    //     }
    // });

    // Navigation - toggle body class when menu is active
    $('.menu-toggle').on("click", function() {
        $('body').toggleClass("menu-toggled");
    });

</script>

</body>
</html>
