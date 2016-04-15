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

			<!-- Related articles -->
			<div class="related-posts">

				<div class="container">

					<div class="flex">
				
						<h4 class="col col-xs-12">Nu kunne du læse...</h4>

						<?php 

						$related_posts = get_field('related_posts'); // Sæt $posts lig med tags, hvis der ikke er nogle posts

						if ( $related_posts ): ?>

						    <ul class="col col-xs-12">
						    
						    <?php foreach( $related_posts as $post): ?>
						        <?php setup_postdata($post); ?>

								<?php 
                                $category_array = get_the_category($post->post_ID);
                                $category       = $category_array[0];
                                $category_name  = $category->cat_name;
                                ?>

						        <li class="related-post <?php echo 'post-' . strtoLower($category_name) ?>">
						            <h2 class="related-post_title col col-xs-12">
						            	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						            </h2>
									
									<div class="related-post_meta entry-meta col col-xs-12">
										<?php echo regnsky_posted_on(); ?>
									</div>

									<div class="related-post_content col col-xs-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-xl-6 offset-xl-3">
										<span class="related-post_category"><?php echo $category_name; ?></span>
										<p><?php echo get_excerpt(120); ?></p>   
									</div>
						        </li>
						    <?php endforeach; ?>

						    </ul>
						    <?php wp_reset_postdata(); ?>
						
						<?php endif; ?>

					</div> <!-- /.flex -->

				</div> <!-- /.container -->
		
			</div> <!-- /.related-posts -->

		<?php
		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
