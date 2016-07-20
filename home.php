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


                /* LIST OF POSTS SECTION */

                // Add to current post counter
                $current_post++;

                // Get current page. If not set we can assume we are on page 1
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                // If first post on first page
                if ($current_post == 1 && $paged == 1) :

                    // Get 1 post from the 'postlist' post type
                    $postlist_args = array(
                        'numberposts'   => 1,
                        'post_type'        => 'postlist',
                        'post_status'      => 'publish'
                    );
                    $postlist = get_posts( $postlist_args );

                    if ($postlist) :

                        // Loop through postlist array and store fields in variables for later use
                        foreach( $postlist as $post ):

                            setup_postdata( $post );

                            $postlist_title  = get_the_title();
                            $postlist_intro  = get_field('postlist_intro');
                            $postlist_tag    = get_field('postlist_tag');
                            $postlist_scroll = get_field('postlist_scroll');

                        endforeach; wp_reset_postdata();

                        // Get posts with the custom tag
                        $posts_by_tag_args = array(
                            'tag_id' => $postlist_tag->term_id,
                            'numberposts' => -1,
                            'post_status' => 'publish'
                        );
                        $posts_by_tag = get_posts($posts_by_tag_args);

                        // If posts with tag exist
                        if ($posts_by_tag): ?>

                            <section class="postlist-wrapper">
                                <div class="container">
                                    <div class="flex">

                                        <h2 class="col col-xs-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-xl-6 offset-xl-3"><?php echo $postlist_title; ?></h2>

                                        <p class="col col-xs-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-xl-6 offset-xl-3"><?php echo $postlist_intro; ?></p>

                                        <div class="archive-list <?php if($postlist_scroll == 'yes'): echo 'is-scrollable-wrapper'; endif; // Make list scrollable ?> col col-xs-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-xl-6 offset-xl-3">

                                            <ul>
                                                <?php
                                                // Loop through posts
                                                foreach( $posts_by_tag as $post ):

                                                    setup_postdata( $post );

                                                    $category_array = get_the_category();
                                                    $category       = $category_array[0];
                                                    $category_name  = $category->cat_name;

                                                    if ($category_name == 'Opdagelser') :
                                                        $category_name = 'Opdagelse';
                                                    endif; ?>

                                                    <li class="h6">
                                                        <div class="meta">
                                                            <span class="h4 <?php echo 'cat-' . strtoLower($category_name); ?>">
                                                                <?php echo $category_name; ?>
                                                            </span>
                                                            <span class="h5 text-left date">
                                                                <?php echo(mysql2date('j. F Y', $post->post_date)); ?>
                                                            </span>
                                                        </div>

                                                        <a class="link" href="<?php echo get_post_permalink( $post->post_ID); ?>">
                                                            <?php echo($post->post_title); ?>
                                                        </a>
                                                    </li>

                                                <?php
                                                endforeach; wp_reset_postdata(); ?>

                                            </ul>

                                        </div>

                                    </div> <!-- /.flex -->
                                </div>
                            </section>

                        <?php
                        endif; // End of $posts_by_tag

                    endif; // End of $postlist

                endif; // End of first post on first page

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
