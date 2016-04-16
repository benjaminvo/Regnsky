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

						<?php 
						$tags = wp_get_post_tags($post->ID);
						$related_by_tags = $tags;
						$related_by_author = get_field('related_posts');

						// Set $related_posts to posts chosen by author's
						if ($related_by_author) :
							
							$related_posts = $related_by_author;

							// print_r($related_posts);
						
						// Set $related_posts to posts based on tags
						elseif($tags) :
							
							$tag_ids = array();
                        
	                        foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
	                        
	                        $tag_args=array(
	                            'tag__in' => $tag_ids,
	                            'post__not_in' => array($post->ID),
	                            'posts_per_page'=>5, // Number of related posts to display.
	                            'caller_get_posts'=>1
	                        );
	                         
	                        $related_by_tags = get_posts($tag_args);

							$related_posts = $related_by_tags;

							// print_r($related_by_tags);
						endif;

						// If there are any related posts ($related_by_author || $related_by_tags)
						if ( $related_posts ): ?>

							<h4 class="col col-xs-12">Nu kunne du læse...</h4>

						    <ul class="col col-xs-12">
						    
						    <?php foreach( $related_posts as $post): ?>
						        <?php setup_postdata($post); ?>

								<?php 
                                $category_array = get_the_category($post->post_ID);
                                $category       = $category_array[0];
                                $category_name  = $category->cat_name;                            
                                ?>

						        <li class="related-post <?php echo 'post-' . strtoLower($category_name) ?>">
						            <h2 class="related-post_title col col-xs-12 col-sm-10 offset-sm-1 col-lg-8 offset-lg-2">
						            	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						            </h2>
									
									<div class="related-post_meta entry-meta col col-xs-12">
										<?php echo regnsky_posted_on(); ?>
									</div>

									<div class="related-post_content col col-xs-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-xl-6 offset-xl-3">
										<span class="related-post_category">
											<?php 
											if ($category_name == 'Opdagelser') :
												$category_name = 'Opdagelse';
                            				endif;
                            				echo $category_name; ?>
                            			</span>
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
