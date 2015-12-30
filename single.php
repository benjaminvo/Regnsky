<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package regnsky
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() ); ?>

			<hr>

			<h4>Del og kommentér</h4>

			<div class="share-post">
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
			
			<?php 
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) : ?>
				
				<div class="no-comments-yet">
					<p class="text-sub">Ingen kommentarer til dette indlæg endnu.<br>Men måske du vil være den første?</p>

					<button class="btn-neutral">Skriv kommentar</button>
				</div>

				<?php //comments_template();
			endif; ?>

			<hr>

			<h4>Relaterede artikler</h4>

			<div class="empty"></div>

		<?php
		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
