<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package regnsky
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-wrapper">

		<div class="container">
	
			<div class="flex">

				<header class="entry-header col col-xs-12 col-sm-10 offset-sm-1">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->

				<div class="entry-content col col-xs-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-xl-6 offset-xl-3">
					<?php
						the_content();

						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'regnsky' ),
							'after'  => '</div>',
						) );
					?>

					
					<?php
						// Edit link
						edit_post_link(
							sprintf(
								/* translators: %s: Name of current post */
								esc_html__( 'Edit %s', 'regnsky' ),
								the_title( '<span class="screen-reader-text">"', '"</span>', false )
							),
							'<span class="edit-link">',
							'</span>'
						);
					?>
				</div><!-- .entry-content -->

			</div>

		</div> <!-- /.container -->

	</div>

</article><!-- #post-## -->
