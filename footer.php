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
        <div class="container">
            <div class="flex">
                <div class="col col-xs-12 col-md-4">
                    <h4>Overskrift</h4>
                </div>
                <div class="col col-xs-12 col-md-4">
                    <h4>Overskrift</h4>
                </div>
                <div class="col col-xs-12 col-md-4">
                    <h4>Overskrift</h4>
                </div>
            </div>
        </div>
        

	</footer><!-- #colophon -->

</div><!-- #page -->

<div class="site-info">  

    <h5>
        Copyright © Regnsky-skribenterne <?php echo date("Y"); ?><span class="hidden-md-up"><br></span><span class="hidden-sm-down"> · </span>Hjemmeside af <a href="ungtriumf.dk">Benjamin Vedel Ottensten</a><span class="hidden-md-up"><br></span><span class="hidden-sm-down"> · </span>Illustration af Nan Na Hvass
    </h5>

</div><!-- .site-info -->

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
    $window.resize(function() {
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
    $('.menu-toggle').on("click", function() {
        
        if (windowWidth < bp_md) {
        
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

        }

    });

    var btn_comment, comments_cta, comments;
    btn_comment = $('#btn-comment');
    comments_cta = $('#comments-cta');
    comments_form = $('#respond');

    btn_comment.on("click", function() {
        comments_cta.css("display", "none");
        comments_form.css("display", "block");
    });

</script>

</body>
</html>
