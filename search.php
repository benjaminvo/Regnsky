<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package regnsky
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			if ( have_posts() ) : ?>

				<header class="page-header search-header">
					<div class="container">
						<div class="flex">
							<h1 class="page-title search-title col col-xs-12">
								Søgeresultater for:<br>
								<span class="search-query"><?php echo '&#8220;' . get_search_query() . '&#8221;'; ?></span>
								<span class="search-total-results text-mute"><?php global $wp_query; $total_results = $wp_query->found_posts; echo '(' . $total_results . ' indlæg)' ?></span>
							</h1>

							<?php get_search_form(); ?>
						</div>
					</div>
				</header><!-- .page-header -->

				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );

				endwhile; ?>

				<section class="pagination-wrapper">
					<div class="container">
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
					</div>
				</section>

			<?php
			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>


		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
