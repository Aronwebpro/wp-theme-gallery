<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AronWebpro-Gallery
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
            <div id = "widget-open-button-toggle" class="widget-open-button">
                <a class="btn" role="button" data-toggle="collapse" href="#sidebar-column" aria-expanded="false" aria-controls="sidebar-column">
                    More information
                </a>
            </div>
            <div id="sidebar-column" class="collapse">
                    <?php dynamic_sidebar( 'sidebar-1' ); ?>
            </div>

</aside><!-- #secondary -->

