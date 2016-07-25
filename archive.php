<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package regnsky
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">

                <div class="container">

                    <h1 class="page-title">

                        <?php the_archive_title(); ?>

                        <?php if ( !is_category() ) : // Show number of posts if it isn't a category page ?>
                            <span class="total-results text-mute"><?php global $wp_query; $total_results = $wp_query->found_posts; echo '(' . $total_results . ' indlæg)' ?></span>
                        <?php endif; ?>

                    </h1>

                    <!-- Author description – if there is one -->
                    <?php $authorDesc = get_the_author_meta('description'); ?>

                    <?php if ( is_author() && !empty($authorDesc) ) : ?>

                        <div class="flex">
                            <p class="archive-description col col-xs-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2">

                                <?php echo $authorDesc; ?>
                            </p>
                        </div>

                    <?php endif; ?>

                </div>

			</header><!-- .page-header -->

			<?php
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
// get_sidebar();
get_footer();
