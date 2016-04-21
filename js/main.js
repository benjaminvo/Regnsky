/**
 * main.js
 *
 */

// $(document).ready(function() {

    var $window = $(window);
    var windowWidth = $window.width();
    var bp_md = 880; // Breakpoint: md
    var $header = $('.site-header');
    var headerPos = $header.offset();
    var $menuToggle = $('.menu-toggle');
    var $menuItems = $('.main-navigation_mobile li');
    var $content = $('#content');

    // Recalculate window width when window is resized
    $window.resize(function() {
        windowWidth = $window.width();
    });

    // Stick header
    $window.on('load scroll', function() {
        var windowPos = $window.scrollTop();

        if (windowPos >= 86 && windowWidth < bp_md) {             //  86 = banner height ((196 / 2) - header offset (-12)
            $header.addClass("stick");
            $content.css({'margin-top':'166px'});          // 166 = header (80) + banner height (196/2) - header offset (-12)
        } else if (windowPos >= 172 && windowWidth >= bp_md) {    // 172 = banner (196) - header offset (-12)
            $header.addClass("stick");
            $content.css({'margin-top':'272px'});          // 272 = header (120) + banner height (196) - header offset (-24)
        } else {
            $header.removeClass("stick");
            $content.css({'margin-top':'0px'});
        }
    });

    // Extend jQuery with animation function
    // NOT IN USE
    // $.fn.extend({
    //     animateCss: function (animationName) {
    //         var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
    //         $(this).addClass('animated ' + animationName).one(animationEnd, function() {
    //             $(this).removeClass('animated ' + animationName);
    //         });
    //     }
    // });

    // Navigation
    $menuToggle.on("click", function(e) {
        
        if (windowWidth < bp_md) {
            toggleMenu();
        }
        // e.preventDefault();
        // return false;
    });

    function toggleMenu() {

        if ($header.hasClass('active')) {
            
            $header.removeClass("active");
            $menuToggle.removeClass("active");
            
            $menuItems.addClass('animated fadeOutUp');
            $menuItems.removeClass('animated fadeOutUp');
        } else {
            $header.addClass("active");
            $menuToggle.addClass("active");
            
            // Add fade in classes one by one
            $menuItems.each(function(index, element) {
                addClassYeah($(this),(index*40) + 40);
            });

            // Remove classes again
            $menuItems.removeClass('animated fadeInDown');
        }

    }

    function addClassYeah(block,del) {
      setTimeout(function() {
        $(block).addClass("animated fadeInDown");
      }, del);
    }

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

// });
