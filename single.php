<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package regnsky
 */

get_header(); ?>

	<div id="primary" class="content-area col-lg-8">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() ); ?>

			<!-- Bottom of entry - Share, comment and read more -->
			<div class="entry-actions row">
				
				<!-- Share -->
				<div class="entry-share col-md-3">
					<!-- Display first header on extra small screens, second header on larger -->
					<h4 class="entry-actions-header visible-xs visible-sm">Del og kommentér</h4>
					<h4 class="entry-actions-header hidden-xs hidden-sm">Del</h4>

					<div class="share-buttons">
						<div class="fb">
							<a href="#" onclick="return false;">
								<img class="icon-fb" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon-fb.svg" alt="Facebook share"><span class="h6">Del (12)</span>
							</a>
						</div>
						
						<div class="twitter">
							<a href="#" onclick="return false;">
								<img class="icon-twitter" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon-twitter.svg" alt="Twitter share"><span class="h6">Tweet (1)</span>
							</a>
						</div>
					</div>
				</div>

				<!-- Comment -->
				<div class="entry-comment col-md-9">
					<!-- Do not display this header on extra small screens -->
					<h4 class="entry-actions-header hidden-xs hidden-sm">Kommentér</h4>
					
					<?php 
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) : ?>
						
						<div id="no-comments" class="no-comments-yet">
							<p class="text-sub text-mute">Ingen kommentarer til dette indlæg endnu.<br>Men måske du vil være den første?</p>

							<button id="btn-comment" class="btn-neutral">Skriv kommentar</button>
						</div>

						<?php comments_template();
					endif; ?>
				</div>
			</div>

			<div class="entry-actions entry-related row">
				<div class="col-sm-12">
					<h4 class="entry-actions-header">Læs relateret indlæg</h4>

					<div class="row">
						<div class="col-sm-6">Relateret indlæg</div>
						<div class="col-sm-6">Relateret indlæg</div>
						<div class="col-sm-6">Relateret indlæg</div>
						<div class="col-sm-6">Relateret indlæg</div>
					</div>			
				</div>
			</div>


		<?php
		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
