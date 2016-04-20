<?php
/**
 * The home template file.
 *
 * For now it is just a copy of the index file
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

            /* Start the Loop */
            while ( have_posts() ) : the_post();
                
                $withcomments = "1"; // "Hack" to display comments on home

                /*
                 * Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                get_template_part( 'template-parts/content', get_post_format() );

            endwhile; ?>

            <?php
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
