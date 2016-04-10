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
                <div class="col col-xs-12 col-sm-6 col-lg-3 footer-module follow-regnsky">
                    <h4>Følg Regnsky</h4>
                    <!-- <p class="hidden-sm-down">Subscribe til vores RSS-feed og find os på følgende sider:</p> -->

                    <div class="social-buttons">
                        <a href="<?php echo bloginfo('rss2_url'); ?>" target="_blank"><img class="social-btn social-btn-rss" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon-rss_black.png" alt="RSS Feed"></a>
                        <a href="http://www.facebook.com/regnsky.dk" target="_blank"><img class="social-btn social-btn-fb" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon-fb_black.png" alt="Regnsky on Facebook"></a>
                        <a href="http://twitter.com/regnskyblog" target="_blank"><img class="social-btn social-btn-twitter" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon-twitter_black.png" alt="Regnsky on twitter"></a>
                        <a href="http://hypem.com/blog/regnsky/6579" target="_blank"><img class="social-btn social-btn-hypem" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon-hypem_black.png" alt="Regnsky on Hype Machine"></a>
                    </div>

                    <div class="footer-fb">
                        <span class="fb-follow-text">Følg os på Facebook:</span>
                        <div class="fb-like" data-href="https://www.facebook.com/regnsky.dk/" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
                    </div>
                </div>
                <div class="col col-xs-12 col-sm-6 col-lg-3 footer-module about-regnsky">
                    <h4>Om Regnsky</h4>
                    <p>Regnsky er en lille, dansk musikblog, der har eksisteret siden 2008. Her skriver unge skribenter om nyt dansk og international musik med nyheder, anmeldelser og livereportager. <a href="<?php echo esc_url( home_url( '/om-regnsky/' ) ); ?>">Læs mere</a>.</p>
                </div>
                <div class="col col-xs-12 col-sm-6 col-lg-3 footer-module recent-comments">
                    <h4>Seneste kommentarer</h4>
                    
                    <ul>
                        
                        <?php 
                        $comment_args = array(
                            'number' => 3,
                            'type'   => 'comment'
                        );

                        $comments = get_comments($comment_args);

                        foreach($comments as $comment) : ?>
                                
                            <li class="recent-comment">
                                <span class="comment-author-link">
                                    <a href="<?php echo($comment->comment_author_url); ?>" rel="external nofollow" class="url">
                                        <?php echo($comment->comment_author); ?>
                                    </a>
                                </span>
                                til
                                <a href="<?php echo get_post_permalink( $comment->comment_post_ID); ?>">
                                    <?php echo get_the_title( $comment->comment_post_ID ); ?>
                                </a>
                            </li>
                            
                        <?php endforeach; ?>
                    </ul>  
                </div>
                <div class="col col-xs-12 col-sm-6 col-lg-3 footer-module recent-posts">
                    <h4>Seneste indlæg</h4>

                    <ul>
                        <?php
                        $post_args = array(
                            'numberposts' => 3
                        );
                        $recent_posts = wp_get_recent_posts($post_args);
                        
                        foreach( $recent_posts as $recent ) {
                            echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
                        }
                        
                        ?>
                    </ul>
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

    // Comments - Show hide comment form
    // Function is called when user clicks btn in entry-footer
    var postId, $comments_cta, $comments_form;

    function displayComments(postId) {        
        
        // Get post ID, use it to only target comment content relevant to that specific post
        $comments_cta  = $(postId + ' .comments-cta');
        $comments_form = $(postId + ' .comment-respond');

        // Hide call to action text, show comment form
        $comments_cta.hide();
        $comments_form.show();

    }

</script>

</body>
</html>
