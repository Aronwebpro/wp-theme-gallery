<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AronWebpro_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="entry-column">
                <header class="entry-header-home">
                   <div class="img-respond"><a href="<?php echo get_permalink() ?>"> <?php echo get_the_post_thumbnail( $post_id, 'large' ); ?> </a></div>
                    <?php
                    if ( is_single() ) :
                        the_title( '<h1 class="entry-title-home">', '</h1>' );
                    else :
                        the_title( '<h2 class="entry-title-home"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                    endif;?>
                   
                </header><!-- .entry-header -->
            </div>
        </div>
</article><!-- #post-## -->

