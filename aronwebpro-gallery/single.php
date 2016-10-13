<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package AronWebpro-Gallery
 */
get_header();
?>

	<div id="primary" class="content-area container-fluid">

		<main id="main" class="site-main col-xs-12 col-sm-8" role="main">

			<section id="single-post-only" class="single-post-only">
				<div class="single-entry">
					<?php
					while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', get_post_format() );
					endwhile; // End of the loop.
					?>
				</div>
			</section><!--div single-post-->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
