<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AronWebpro-Gallery
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header">
         <div class="row">

             <?php if (get_the_post_thumbnail( $post_id, 'large' ) ) { ?>
             <div class="col-xs-6 col-sm-2 post-image"><?php echo get_the_post_thumbnail( $post_id, 'large' ); ?>
             </div>
             <div class="col-xs-12 col-sm-9">
                <?php } else {?>
                 <div class="col-xs-12">
                <?php } ?>


                 <?php
                if ( is_single() ) :
                    the_title( '<h1 class="entry-title ">', '</h1>' );
                else :
                    the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                endif;?>
             </div>
         </div>
        </header><!-- .entry-header -->


		<div class="entry-content">
			<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'aronwebpro-gallery' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aronwebpro-gallery' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">

		</footer><!-- .entry-footer -->
</article><!-- #post-## -->
