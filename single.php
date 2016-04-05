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

			<?php //include('template-parts/entry-actions.php') ?>

			<!-- Related articles -->
			<div class="entry-actions entry-related small-post-wrapper container">
			
				<h4 class="entry-actions-header">Nu kunne du læse...</h4>

				<div class="related-post small-post row">
					<div class="small-post-meta col-sm-3">
						<p><span class="small-post-category h4 text-brand-4">Livestemning</span> <span class="small-post-date text-sub text-mute">8. juli 2015</span></p>
					</div>
					<div class="small-post-title col-sm-9">
						<h3><a href="<?php echo esc_url( home_url( '2015/07/susanne-sundfoer-den-norske-sejrsgang-fortsaetter/' ) ); ?>">Susanne Sundfør - Den norske sejrsgang fortsætter</a></h3>
					</div>
				</div>	

				<div class="related-post small-post row">
					<div class="small-post-meta col-sm-3">
						<p><span class="small-post-category h4 text-brand-2">Nyhed</span> <span class="small-post-date text-sub text-mute">15. december 2015</span></p>
					</div>
					<div class="small-post-title col-sm-9">
						<h3><a href="<?php echo esc_url( home_url( '/2015/12/bliv-en-del-af-regnsky/' ) ); ?>">Bliv en del af Regnsky</a></h3>
					</div>
				</div>

				<div class="related-post small-post row">
					<div class="small-post-meta col-sm-3">
						<p><span class="small-post-category h4 text-brand-1">Musik</span> <span class="small-post-date text-sub text-mute">25. december 2015</span></p>
					</div>
					<div class="small-post-title col-sm-9">
						<h3><a href="<?php echo esc_url( home_url( '/2015/12/aaret-der-gik-del-1-aarets-bedste-koncerter/' ) ); ?>">Året der gik – del 1: Årets bedste koncerter</a></h3>
					</div>
				</div>
			
				<div class="related-post small-post row">
					<div class="small-post-meta col-sm-3">
						<p><span class="small-post-category h4 text-brand-3">Anmeldelse</span> <span class="small-post-date text-sub text-mute">15. maj 2015</span></p>
					</div>
					<div class="small-post-title col-sm-9">
						<h3><a href="<?php echo esc_url( home_url( '2015/05/chienne-lucas/' ) ); ?>">Chienne Lucas - et frikvarter i Zoo</a></h3>
					</div>
				</div>
				
			</div> <!-- /.small-post-wrapper -->


		<?php
		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
