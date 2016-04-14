<?php
/**
 * Template name: Archive page template
 * The template used for displaying the home page.
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <section id="post-<?php the_ID(); ?>" <?php post_class('entry-wrapper'); ?>>

                <div class="container">
            
                    <div class="flex">

                        <header class="entry-header col col-xs-12 col-sm-10 offset-sm-1">
                            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                        </header><!-- .entry-header -->

                        <div class="entry-content col col-xs-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-xl-6 offset-xl-3">
                            <p>Vestibulum aliquet, nunc nec venenatis sodales, orci risus venenatis risus, eget dignissim diam turpis at nibh. Curabitur venenatis nisi sed libero mollis mollis. Integer sit amet vestibulum sapien. Pellentesque eget sodales ipsum, vel lobortis nulla. Sed tempor elementum posuere. Proin ac tortor tristique, congue quam at, mollis quam. Donec ultricies eleifend volutpat. Pellentesque dui elit, gravida ut efficitur sit amet, rutrum a magna. Vivamus eu enim lacus. Suspendisse facilisis sit amet mi a mattis.</p>

                            <?php
                                the_content();

                                wp_link_pages( array(
                                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'regnsky' ),
                                    'after'  => '</div>',
                                ) );
                            ?>
                            
                            <?php
                                // Edit link
                                edit_post_link(
                                    sprintf(
                                        /* translators: %s: Name of current post */
                                        esc_html__( 'Edit %s', 'regnsky' ),
                                        the_title( '<span class="screen-reader-text">"', '"</span>', false )
                                    ),
                                    '<span class="edit-link">',
                                    '</span>'
                                );
                            ?>
                        </div><!-- .entry-content -->

                    </div>

                </div> <!-- /.container -->

            </section>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
