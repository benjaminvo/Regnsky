<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package regnsky
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( ); ?>>
	
	<div class="entry-wrapper">

		<div class="container">
	
			<div class="flex">

				<!-- Entry header -->
				<header class="entry-header col col-xs-12 col-sm-10 offset-sm-1">
					<?php

						$category_array = get_the_category();
						$category 		= $category_array[0];
						$category_name 	= $category->cat_name;
						$category_id 	= $category->cat_ID;
						$category_link 	= get_category_link( $category_id );

						if ($category_name == 'Opdagelser') {
							$category_name = 'Opdagelse';
						}
						?>
						
						<h4 class="entry-category">
							<!-- <a href="<?php //echo esc_url( $category_link ); ?>" title="<?php //echo $category_name; ?>"><?php //echo $category_name; ?></a> -->
							<?php echo $category_name; ?>
						</h4>

						
						<?php if ( is_single() ) { ?>				
							<?php 
							the_title( '<h1 class="entry-title">', '</h1>' );
						} else {
							the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
						}

					if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php regnsky_posted_on(); ?>
					</div><!-- .entry-meta -->
					<?php
					endif; ?>
				</header>

				<!-- Entry content -->
				<div class="entry-content col col-xs-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-xl-6 offset-xl-3">
					<?php
						
						if ( is_single() ) {
							the_content( sprintf(
								/* translators: %s: Name of current post. */
								wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'regnsky' ), array( 'span' => array( 'class' => array() ) ) ),
								the_title( '<span class="screen-reader-text">"', '"</span>', false )
							) );
						} else {
							//the_excerpt(); // Excerpts breaker figure captions (fx følgende på en index-side: http://localhost:3000/2016/03/jaerv-et-hav-af-vellyd/)
							the_content('Læs videre &raquo;'); ?>
							
							<!-- <div class="show-post-wrapper">
								<button class="show-post read-more">Vis hele indlæg</button>								
							</div> -->
						<?php	
						}

						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'regnsky' ),
							'after'  => '</div>',
						) );
					?>

					<!-- Tags -->
					<?php
						
						if ( 'post' === get_post_type() ) {
							$tags_list = get_the_tag_list( '', esc_html__( '', 'regnsky' ) );
							if ( $tags_list ) {
								printf( '<div class="tags-links h6">' . esc_html__( '%1$s', 'regnsky' ) . '</div>', $tags_list );
							}
						}

					?>
				</div>		

			</div>

		</div> <!-- /.container -->

	</div>

	<!-- Entry footer -->
	<?php
	if ( is_single() || is_home() || is_archive() || is_search() ) { ?>

		<footer class="entry-footer">
			<div class="container">
				<?php include('entry-footer.php') ?>
			</div>
		</footer>

	<?php
	}
	?>

</article><!-- #post-## -->
