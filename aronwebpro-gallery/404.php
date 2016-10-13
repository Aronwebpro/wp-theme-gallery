<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package AronWebpro-Gallery
 */

get_header(); ?>

	<div id="primary" class="content-area ">
		<main id="main" class="site-main col-xs-12 col-sm-8" role="main">

			<section class="error-404 not-found">
				<header class="header-404">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'aronwebpro-gallery' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'aronwebpro-gallery' ); ?></p>



				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
