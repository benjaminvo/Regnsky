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
				<div class="entry-share col-sm-3">
					<!-- Display first header on extra small screens, second header on larger -->
					<h4 class="entry-actions-header visible-xs">Del og kommentér</h4>
					<h4 class="entry-actions-header hidden-xs">Del</h4>

					<div class="share-buttons">
						<div class="fb">
							
							<div class="fb-share-button" 
								data-href="<?php echo the_permalink(); ?>" 
								data-layout="button">
							</div>

							<!-- <a href="#" onclick="return false;">
								<img class="icon-fb" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon-fb.svg" alt="Facebook share"><span class="h6">Del (12) <?php echo get_permalink(); ?></span>
							</a> -->
						</div>
						
						<div class="twitter">
							
							<a href="https://twitter.com/share" class="twitter-share-button"{count}>Tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
							<!-- <a href="#" onclick="return false;">
								<img class="icon-twitter" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon-twitter.svg" alt="Twitter share"><span class="h6">Tweet (1)</span>
							</a> -->
						</div>
					</div>
				</div>

				<!-- Comment -->
				<div class="entry-comment col-sm-9">
					<!-- Do not display this header on extra small screens -->
					<h4 class="entry-actions-header hidden-xs">Kommentér</h4>
					
					<?php 
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() && get_comments_number()==0 ) : ?>
						
						<div id="no-comments" class="no-comments-yet">
							<p class="text-sub text-mute">Ingen kommentarer til dette indlæg endnu.<br>Men måske du vil være den første?</p>

							<button id="btn-comment" class="btn-neutral">Skriv kommentar</button>
						</div>

						<div id="comments-area_no-comments">
							<?php comments_template(); ?>
						</div>
					<?php endif; ?>

					<?php 
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() && get_comments_number() > 0 ) : ?>

						<div id="comments-area_comments">
							<?php comments_template(); ?>
						</div>
					<?php endif; ?>

				</div>
			</div>

			<div class="entry-actions entry-related small-post-wrapper">
			
				<h4 class="entry-actions-header">Relateret</h4>

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
get_sidebar();
get_footer();
