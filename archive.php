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
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
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
				
			<section class="pagination-wrapper container">
				<div class="pagination flex">
					<div class="col col-xs-12">
						<?php
						$paginate_args = array(
							'show_all'           => false,
							'end_size'           => 2,
							'mid_size'           => 1,
							'prev_next'          => false,
							'prev_text'          => __('« Tilbage'),
							'next_text'          => __('Videre »')
						);

						echo paginate_links($paginate_args);
						?>					
					</div>
				</div>
			</section>

		<?php
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
