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
    
    var windowWidth = $(window).width();
    var header = $('.site-header');
    var headerPos = header.offset();

    // Recalculate window width when window is resized
    $(window).on('resize', function() {
        windowWidth = $(window).width();
    });

    // Stick header
    $(window).scroll(function() {
        var windowPos = $(window).scrollTop();

        if (windowPos >= 86 && windowWidth < 750) {             //  86 = banner height ((196 / 2) - header offset (-12)
            header.addClass("stick");
            $('#content').css({'margin-top':'166px'});          // 166 = header (80) + banner height (196/2) - header offset (-12)
        } else if (windowPos >= 172 && windowWidth >= 750) {    // 172 = banner (196) - header offset (-12)
            header.addClass("stick");
            $('#content').css({'margin-top':'292px'});          // 292 = header (120) + banner height (196) - header offset (-24)
        } else {
            header.removeClass("stick");
            $('#content').css({'margin-top':'0px'});
        }
    });

    // Navigation - toggle body class when menu is active
    $('.menu-toggle').on("click", function() {
        $('body').toggleClass("nav-toggled");

        // $('.main-navigation li').fadeIn();
    });

</script>

</body>
</html>
