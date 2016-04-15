<?php
/**
 * Template name: Archive page template
 * The template used for displaying the home page.
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <section id="post-<?php the_ID(); ?>" <?php post_class('archive-page entry-wrapper'); ?>>

                <div class="container">

                    <div class="archive-top flex">

                        <header class="entry-header col col-xs-12 col-sm-10 offset-sm-1">
                            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                        </header><!-- .entry-header -->

                        <div class="entry-content col col-xs-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-xl-6 offset-xl-3">

                            <?php
                            while ( have_posts() ) : the_post();
                                the_content();
                            endwhile;
                            
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
                        </div> <!-- .entry-content -->

                    </div> <!-- .flex -->

                    <div class="archive-categories flex">
                        <?php $recent_posts = 10; ?>

                        <h2 class="col col-xs-12">Seneste indlæg</h2>

                        <div class="archive-category module col col-xs-12 col-sm-6 col-lg-3">
                            <h4 class="text-brand-1">Opdagelser</h4>
                            <ul>
                                <?php 
                                $post_args = array(
                                    'category_name'    => 'opdagelser',
                                    'posts_per_page'   => $recent_posts,
                                    'offset'           => 0
                                );

                                $posts = get_posts($post_args);

                                foreach($posts as $post) : ?>
                                    
                                    <li class="archive-post">
                                        <span class="date">
                                            <?php echo(mysql2date('j. F Y', $post->post_date)); ?>
                                        </span>
                                        <a class="link" href="<?php echo get_post_permalink( $post->post_ID); ?>">
                                            <?php echo($post->post_title); ?>
                                        </a>
                                    </li>
                                    
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        
                        <div class="archive-category module col col-xs-12 col-sm-6 col-lg-3">
                            <h4 class="text-brand-2">Livestemning</h4>
                            <ul>
                                <?php 
                                $post_args = array(
                                    'category_name'    => 'livestemning',
                                    'posts_per_page'   => $recent_posts,
                                    'offset'           => 0
                                );

                                $posts = get_posts($post_args);

                                foreach($posts as $post) : ?>
                                    
                                    <li class="archive-post">
                                        <span class="date">
                                            <?php echo(mysql2date('j. F Y', $post->post_date)); ?>
                                        </span>
                                        <a class="link" href="<?php echo get_post_permalink( $post->post_ID); ?>">
                                            <?php echo($post->post_title); ?>
                                        </a>
                                    </li>
                                    
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        
                        <div class="archive-category module col col-xs-12 col-sm-6 col-lg-3">
                            <h4 class="text-brand-3">Features</h4>
                            <ul>
                                <?php 
                                $post_args = array(
                                    'category_name'    => 'feature',
                                    'posts_per_page'   => $recent_posts,
                                    'offset'           => 0
                                );

                                $posts = get_posts($post_args);

                                foreach($posts as $post) : ?>
                                    
                                    <li class="archive-post">
                                        <span class="date">
                                            <?php echo(mysql2date('j. F Y', $post->post_date)); ?>
                                        </span>
                                        <a class="link" href="<?php echo get_post_permalink( $post->post_ID); ?>">
                                            <?php echo($post->post_title); ?>
                                        </a>
                                    </li>
                                    
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        
                        <div class="archive-category module col col-xs-12 col-sm-6 col-lg-3">
                            <h4 class="text-brand-4">Generelt</h4>
                            <ul>
                                <?php 
                                $post_args = array(
                                    'category_name'    => 'generelt',
                                    'posts_per_page'   => $recent_posts,
                                    'offset'           => 0
                                );

                                $posts = get_posts($post_args);

                                foreach($posts as $post) : ?>
                                    
                                    <li class="archive-post">
                                        <span class="date">
                                            <?php echo(mysql2date('j. F Y', $post->post_date)); ?>
                                        </span>
                                        <a class="link" href="<?php echo get_post_permalink( $post->post_ID); ?>">
                                            <?php echo($post->post_title); ?>
                                        </a>
                                    </li>
                                    
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>

                    <div class="archive-years flex">
                        
                        <?php
                        // get years that have posts
                        $years = $wpdb->get_results( "SELECT YEAR(post_date) AS year FROM wp_posts WHERE post_type = 'post' AND post_status = 'publish' GROUP BY year DESC" );

                        foreach ( $years as $year ) {
                            // get posts for each year
                            $posts_this_year = $wpdb->get_results( "SELECT ID, post_title FROM wp_posts WHERE post_type = 'post' AND post_status = 'publish' AND YEAR(post_date) = '" . $year->year . "' " );

                            // reverse array of posts
                            krsort($posts_this_year);

                            echo '<h2 class="year-title year-' . $year->year . ' col col-xs-12">' . $year->year . '</h2>';
                            echo '<span class="year-amount">' . count($posts_this_year) . ' indlæg' . '</span>';
                            echo '<div class="col col-xs-12 col"><ul>';
                            
                            foreach ( $posts_this_year as $post ) {

                                $category_array = get_the_category($post->post_ID);
                                $category       = $category_array[0];
                                $category_name  = $category->cat_name;
                                
                                echo '<li><a class="link link-' . strtoLower($category_name) . '" href="' . get_post_permalink($post->post_ID) . '">' . $post->post_title . '</a></li>';
                                // echo '<span class="divider"> · </span>'; 
                            }

                            echo '</div></ul>';
                        }
                        ?>

                    </div>

                </div> <!-- /.container -->

            </section>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
