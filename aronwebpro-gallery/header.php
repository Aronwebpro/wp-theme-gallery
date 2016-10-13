<?php
/**
 * The Front page header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Aronwebpro
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
	<noscript>
		<style rel="stylesheet" type="text/css">body {display: none;} html:after {font-size:20px; content: 'If you want to see website you have to turn on JavaScrip in your browser.'}</style>
	</noscript>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site container-fluid">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'aronwebpro' ); ?></a>

	<!--Page header-->

	<!--Header image set -->
	<?php if ( get_header_image() ) { ?>
	<header id="masthead" class="page-header-main col-xs-12 col-sm-2" style="background-image: url(<?php header_image(); ?>); " role="banner">
		<?php } else { ?>
		<header id="masthead" class="page-header-main col-xs-12 col-sm-2" role="banner">
			<?php } ?>

			<!--Top Head-->
			<div class="head">
				<div class="c">
					<!--Display site logo or first letter as logo-->
					<div class="site-logo">
						<a href="<?php echo esc_url( home_url('/') ); ?>" rel="home">
                            <?php
                            if (has_site_icon()):
                            $site_icon = esc_url(get_site_icon_url( 270 )); ?>

                            <img class="site-icon" src="<?php echo $site_icon; ?>" alt="">

                    <?php endif; ?>

						</a>
					</div><!-- .site logo -->

				</div><!-- row -->
				<!--Site Brand-->
				<div class="site-branding">
					<?php
					if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' );?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
						<?php
					endif; ?>
				</div><!-- .site-branding -->
			</div> <!-- head -->

			<!--Site Manu Bar-->
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button id ="small-menu-button" class="menu-toggle " aria-controls="primary-menu" aria-expanded="false"></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'nav-menu', ) ); ?>
			</nav><!-- #site-navigation -->

			<!--Social Buttons-->
			<?php if ( is_active_sidebar( 'under_menu_widget' ) ) {?>
            <div class="social-buttons medium-screen">
                <h3>Fallow Us</h3>
                <?php dynamic_sidebar( 'social_buttons_widget' ); ?>
            </div>
            <?php } ?>

		</header><!-- #masthead -->

		<div id="content" class="site-content ">








