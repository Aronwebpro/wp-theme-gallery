<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AronWebpro-Gallery
 */

/*Page header templates*/
if ( is_front_page() ) :
    get_header('home');
else :
    get_header();
endif; ?>


	<div id="primary" class="content-area container-fluid">

		<main id="main" class="site-main col-xs-12 col-sm-8 col-lg-9" role="main">
            <div class="greeting small-screen">
               <h3>Welcome to Floral Glory Designs..</h3>

            </div>
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			$myPosts = new WP_Query('category_name=HomepagePosts');
			while ( have_posts() ) : the_post();

				if (is_home()):
					get_template_part('template-parts/content-home', get_post_format());
				else :
					get_template_part( 'template-parts/content', get_post_format() );
				endif;
			endwhile;



		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main .site-main -->
	<div><?php get_sidebar(); ?></div>
	</div><!-- #primary .content-area-->
<div class="clearings"></div>
<?php

get_footer();
