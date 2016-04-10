<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package regnsky
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<section class="error-404">
				<div class="entry-wrapper">

					<div class="container">
				
						<div class="flex">

							<header class="page-header col col-xs-12 col-sm-10 offset-sm-1">
								<h1 class="page-title"><?php esc_html_e( 'Ups! Den side kan vi vist ikke finde.', 'regnsky' ); ?></h1>
							</header><!-- .page-header -->

							<div class="page-content col col-xs-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-xl-6 offset-xl-3">
								<p>Hvor end fejlen ligger, så er der ingenting at læse eller finde her. Men klik dig gerne til forsiden eller en af kategorierne!</p>
							</div><!-- .page-content -->

						</div>
					</div>
				</div>				
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
