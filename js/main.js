/**
 * main.js
 *
 */

// $(document).ready(function() {

    var $window = $(window);
    var windowWidth = $window.width();
    var bp_md   = 750; // Breakpoint: md - her bliver headeren højere
    var bp_nav  = 880;  // Breakpoint: burger menu --> navigation for, hvornår menuen bliver til en navigation
    var $header = $('.site-header');
    var headerPos = $header.offset();
    var $menuToggle = $('.menu-toggle');
    var $menu = $('.main-navigation_mobile');
    var $menuItems = $('.main-navigation_mobile li');
    var $content = $('#content');

    // Recalculate window width when window is resized
    $window.resize(function() {
        windowWidth = $window.width();
    });

    // Stick header
    // $window.on('load scroll', function() {
    //     var windowPos = $window.scrollTop();

    //     if (windowPos >= 86 && windowWidth < bp_md) {             //  86 = banner height ((196 / 2) - header offset (-12)
    //         $header.addClass("stick");
    //         $content.css({'margin-top':'166px'});          // 166 = header (80) + banner height (196/2) - header offset (-12)
    //     } else if (windowPos >= 172 && windowWidth >= bp_md) {    // 172 = banner (196) - header offset (-12)
    //         $header.addClass("stick");
    //         $content.css({'margin-top':'272px'});          // 272 = header (120) + banner height (196) - header offset (-24)
    //     } else {
    //         $header.removeClass("stick");
    //         $content.css({'margin-top':'0px'});
    //     }
    // });

    // $(document).on('scroll', _.throttle(function(){
    //     var windowPos = $window.scrollTop();

    //     if (windowPos >= 86 && windowWidth < bp_md) {             //  86 = banner height ((196 / 2) - header offset (-12)
    //         $header.addClass("stick");
    //         $content.css({'margin-top':'166px'});          // 166 = header (80) + banner height (196/2) - header offset (-12)
    //     } else if (windowPos >= 172 && windowWidth >= bp_md) {    // 172 = banner (196) - header offset (-12)
    //         $header.addClass("stick");
    //         $content.css({'margin-top':'272px'});          // 272 = header (120) + banner height (196) - header offset (-24)
    //     } else {
    //         $header.removeClass("stick");
    //         $content.css({'margin-top':'0px'});
    //     }
    // }, 16));


    var latestKnownScrollY = 0,
        ticking = false;

    function update() {
        // reset the tick so we can
        // capture the next onScroll
        ticking = false;

        if (latestKnownScrollY >= 86 && windowWidth < bp_md) {             //  86 = banner height ((196 / 2) - header offset (-12)
            $header.addClass("stick");
            $content.css({'margin-top':'166px'});                          // 166 = header (80) + banner height (196/2) - header offset (-12)
        } else if (latestKnownScrollY >= 172 && windowWidth >= bp_md) {    // 172 = banner (196) - header offset (-12)
            $header.addClass("stick");
            $content.css({'margin-top':'272px'});                          // 272 = header (120) + banner height (196) - header offset (-24)
        } else {
            $header.removeClass("stick");
            $content.css({'margin-top':'0px'});
        }
    }

    function onScroll() {
        latestKnownScrollY = window.scrollY;
        requestTick();
    }

    function requestTick() {
        if(!ticking) {
            requestAnimationFrame(update);
        }
        ticking = true;
    }

    window.addEventListener('scroll', onScroll, false);

    // Navigation
    $menuToggle.on("click", function(e) {

        if (windowWidth < bp_nav) {
            toggleMenu();
        }
        // e.preventDefault();
        // return false;
    });

    function toggleMenu() {

        if ($header.hasClass('active')) {
            $header.removeClass("active");
            $menuToggle.removeClass("active");

            $menu.hide();
            $menuItems.addClass('animated fadeOutUp');
            $menuItems.removeClass('animated fadeOutUp');
        } else {
            $header.addClass("active");
            $menuToggle.addClass("active");

            $menu.show();

            // Add fade in classes one by one
            setTimeout(function () {
                $menuItems.each(function(index, element) {
                    addClassYeah($(this),(index*40) + 40);
                });
            }, 150);

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
