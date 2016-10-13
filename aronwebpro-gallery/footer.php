<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AronWebpro-Gallery
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
        <div class="container-fluid">
            <div id="footer-widget">
                <?php dynamic_sidebar( 'footer_widget_area' ); ?>
            </div>

        </div>
        <div class="site-info">
            <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'aronwebpro-theme' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'aronwebpro-theme' ), 'WordPress' ); ?></a>
            <span class="sep"> | </span>
            <?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'aronwebpro-theme' ), 'aronwebpro-theme', '<a href="http://www.aronwebsite.com" rel="designer">AronWebpro</a>' ); ?>
        </div><!-- .site-info -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<!--To top button-->
<div id="to-top">
	<a id="back-top1" href="#masthead" role="button"></a>
</div>
</body>
</html>
