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

			<div class="entry-wrapper">

				<div class="container">
			
					<div class="flex">

						<?php
						if ( have_posts() ) : ?>

							<header class="page-header col col-xs-12 col-sm-10 offset-sm-1">
								<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'regnsky' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
							</header><!-- .page-header -->

							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/**
								 * Run the loop for the search to output the results.
								 * If you want to overload this in a child theme then include a file
								 * called content-search.php and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'search' );

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

					</div>
				</div>
			<!-- </div> -->
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
//get_sidebar();
get_footer();
