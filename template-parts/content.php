<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package regnsky
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'row' ); ?>>
	<header class="entry-header col-md-12">
		<?php
			if ( is_single() ) { ?>

				<?php
				$category_array = get_the_category();
				$category 		= $category_array[0];
				$category_name 	= $category->cat_name;
				$category_id 	= $category->cat_ID;
				$category_link 	= get_category_link( $category_id );
				?>
				
				<h4 class="entry-category">
					<a href="<?php echo esc_url( $category_link ); ?>" title="<?php echo $category_name; ?>"><?php echo $category_name; ?></a>
				</h4>
				
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
	</header><!-- .entry-header -->

	<div class="entry-content col-md-12">
		<?php
			
			if ( is_single() ) {
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'regnsky' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			} else {
				the_excerpt();
			}

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'regnsky' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php
	if ( is_single() ) { ?>
	
	<footer class="entry-footer col-md-12">
		<?php regnsky_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	
	<?php 
	} ?>

</article><!-- #post-## -->
