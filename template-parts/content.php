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
				<header class="entry-header col col-xs-12 col-md-8 offset-md-2">
					<?php

						$category_array = get_the_category();
						$category 		= $category_array[0];
						$category_name 	= $category->cat_name;
						$category_id 	= $category->cat_ID;
						$category_link 	= get_category_link( $category_id );

						if ($category_name == 'Nyheder') {
							$category_name = 'Nyhed';
						}
						if ($category_name == 'Anmeldelser') {
							$category_name = 'Anmeldelse';
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
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						}

					if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta text-sub text-mute">
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
							the_content();
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
		if ( is_single() || is_home() ) { ?>

			<footer class="entry-footer">
				<div class="container">
					<?php include('entry-footer.php') ?>
				</div>
			</footer>

		<?php
		}
	?>

</article><!-- #post-## -->
