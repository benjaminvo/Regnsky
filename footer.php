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
    
    var $window = $(window);
    var windowWidth = $window.width();
    var bp_md = 750; // Breakpoint: md
    var $header = $('.site-header');
    var headerPos = $header.offset();
    var $menuItems = $('.main-navigation li');
    var $content = $('#content');


    // Recalculate window width when window is resized
    $window.on('resize', function() {
        windowWidth = $window.width();
    });

    // Stick header
    $window.on('scroll', function() {
        var windowPos = $window.scrollTop();

        if (windowPos >= 86 && windowWidth < bp_md) {             //  86 = banner height ((196 / 2) - header offset (-12)
            $header.addClass("stick");
            $content.css({'margin-top':'166px'});          // 166 = header (80) + banner height (196/2) - header offset (-12)
        } else if (windowPos >= 172 && windowWidth >= bp_md) {    // 172 = banner (196) - header offset (-12)
            $header.addClass("stick");
            $content.css({'margin-top':'292px'});          // 292 = header (120) + banner height (196) - header offset (-24)
        } else {
            $header.removeClass("stick");
            $content.css({'margin-top':'0px'});
        }
    });

    // Extend jQuery with animation function
    // NOT IN USE
    $.fn.extend({
        animateCss: function (animationName) {
            var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
            $(this).addClass('animated ' + animationName).one(animationEnd, function() {
                $(this).removeClass('animated ' + animationName);
            });
        }
    });

    // Navigation: On small screen sizes, toggle body class when menu is active
    if (windowWidth < bp_md) {

        $('.menu-toggle').on("click", function() {
            $('body').toggleClass("nav-toggled");

            // Show/hide list elements
            if (!$('body').hasClass('nav-toggled')) {
                $menuItems.addClass('animated fadeOutUp');
                $menuItems.removeClass('animated fadeOutUp');
                // $(el).animateCss('fadeOut');
            } else {
                $.each($menuItems, function(i, el) { // Link: cl.ly/fajZ

                    // Add animate class one element at a time
                    setTimeout(function(){
                       $(el).addClass('animated fadeInDown');
                    }, 60 + ( i * 30 ));

                    // Remove animate class again
                    $(el).removeClass('animated fadeInDown')

                });
            }
        });
    }

</script>

</body>
</html>
