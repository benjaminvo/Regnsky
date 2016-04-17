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
								<span class="total-results text-mute"><?php global $wp_query; $total_results = $wp_query->found_posts; echo '(' . $total_results . ' indlæg)' ?></span>
							</h1>

							<?php get_search_form(); ?>
						</div>
					</div>
				</header><!-- .page-header -->

				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					$withcomments = "1"; // "Hack" to display comments on home

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
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
				endif; ?>


			<?php
			else : ?>

				<header class="page-header search-header">
					<div class="container">
						<div class="flex">
							<h1 class="page-title search-title col col-xs-12">
								Intet matcher:<br>
								<span class="search-query"><?php echo '&#8220;' . get_search_query() . '&#8221;'; ?></span>
							</h1>

							<p class="col col-xs-12 text-center">Vil du ikke prøve en anden søgning?</p>

							<?php get_search_form(); ?>
						</div>
					</div>
				</header><!-- .page-header -->

				<?php //get_template_part( 'template-parts/content', 'none' ); ?>

			<?php 
			endif; ?>


		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
