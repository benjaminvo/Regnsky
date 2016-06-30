<?php
/**
 * The home template file.
 */

get_header(); ?>

    <div id="primary" class="content-area"> <!-- slettede: col col-xs-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3-->
        <main id="main" class="site-main" role="main">

        <?php
        if ( have_posts() ) :

            if ( is_home() && ! is_front_page() ) : ?>
                <header>
                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                </header>

            <?php
            endif;

            // Set up counter to determine current post
            $current_post = 0;

            /* Start the Loop */
            while ( have_posts() ) : the_post();
                
                // "Hack" to display comments on home
                $withcomments = "1";

                /*
                 * Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                get_template_part( 'template-parts/content', get_post_format() );

                /* Post list */

                // Add to current post counter
                $current_post++;
                
                // Get current page. If not set we can assume we are on page 1
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                
                // If first post on first page
                if ($current_post == 1 && $paged == 1) :

                    // Get 1 post from the 'recentposts' post type
                    $postlist_args = array(
                        'numberposts'   => 1,
                        'post_type'        => 'postlist',
                        'post_status'      => 'publish'
                    );
                    $postlist = get_posts( $postlist_args );

                    // Add custom section with list of posts from custom post type "postlist" if one exists
                    if ($postlist) : ?>
                        
                        <section class="postlist-wrapper">
                            <div class="container">
                                <div class="flex">
                                    <div class="col col-xs-12">
                                        <?php print_r($postlist); ?>
                                    </div>
                                </div>
                            </div>
                        </section>
                        
                    <?php
                    endif ?>

                <?php
                endif;

            endwhile; // End of loop ?>

            <?php
            // Pagination
            $posts_per_page = get_option('posts_per_page');
            if ($wp_query -> found_posts > $posts_per_page) : ?>
                <section class="pagination-wrapper">
                    <div class="container">
                        <div class="pagination flex">
                            <div class="col col-xs-12">
                                <?php
                                $paginate_args = array(
                                    'show_all'           => false,
                                    'end_size'           => 1,
                                    'mid_size'           => 1,
                                    'prev_next'          => false,
                                    'prev_text'          => __('« Tilbage'),
                                    'next_text'          => __('Videre »')
                                );

                                echo paginate_links($paginate_args);
                                ?>                  
                            </div>
                        </div>
                    </div>
                </section>
            <?php 
            endif; ?>
        
        <?php
        else :

            get_template_part( 'template-parts/content', 'none' );

        endif; ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
