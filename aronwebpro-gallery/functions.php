<?php
/**
 * AronWebpro-Gallery functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AronWebpro-Gallery
 */

if ( ! function_exists( 'aronwebpro_gallery_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function aronwebpro_gallery_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on AronWebpro-Gallery, use a find and replace
	 * to change 'aronwebpro-gallery' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'aronwebpro-gallery', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'aronwebpro-gallery' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'aronwebpro_gallery_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'aronwebpro_gallery_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function aronwebpro_gallery_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'aronwebpro_gallery_content_width', 640 );
}
add_action( 'after_setup_theme', 'aronwebpro_gallery_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function aronwebpro_gallery_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'aronwebpro-gallery' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'aronwebpro-gallery' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'aronwebpro_gallery_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function aronwebpro_gallery_scripts() {

    //Hook Google Fonts localy: Raleway and Montserrat
    wp_enqueue_style('aronwebpro-gallery-local-fonts', get_template_directory_uri() . '/fonts/custom-fonts.css');

    //Hook Font Awesome framework
    wp_enqueue_style('aronwebpro-gallery-local-icons', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css');

    //Themes Script
    wp_enqueue_script( 'aronwebpro-theme-navigation', get_template_directory_uri() . '/js/navigation.js');


    //Add Boostrap framework
    wp_register_script( 'bootstrap-js','https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa', array( 'jquery' ), '3.0.1', true );
    wp_register_style( 'bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u', array(), '3.0.1', 'all' );
    wp_enqueue_script( 'bootstrap-js' );
    wp_enqueue_style( 'bootstrap-css' );
    wp_enqueue_script( 'aronwebpro-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    //Themes styles
    wp_enqueue_style( 'aronwebpro-gallery-style', get_stylesheet_uri() );

    //Themes Main Script
	wp_enqueue_script( 'aronwebpro-gallery-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'aronwebpro-gallery-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );

	}
}
add_action( 'wp_enqueue_scripts', 'aronwebpro_gallery_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Register NEW widgets areas.
 *
 */
function aronwebpro_widgets_init() {

    register_sidebar( array(
        'name'          => 'Footer Widget Area',
        'id'            => 'footer_widget_area',
        'before_widget' => '<div class="footer-widget-area">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="rounded">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => 'Social Buttons',
        'id'            => 'social_buttons_widget',
        'before_widget' => '<div class="social-buttons medium-screen">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="rounded">',
        'after_title'   => '</h2>',
    ) );

}

add_action( 'widgets_init', 'aronwebpro_widgets_init' );

/**
 * Register Front Page Banner Widget.
 *
 */

// Block direct requests
if ( !defined('ABSPATH') )
    die('-1');


add_action( 'widgets_init', function(){
    register_widget( 'aronwebpro_social_button_widget' );
});




//Widgets

/**
 * Feature Banner Full.
 */
class aronwebpro_social_button_widget extends WP_Widget {
    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'aronwebpro_social_button_widget', // Base ID
            __('Social Buttons', 'text_domain'), // Name
            array( 'description' => __( 'You can add social buttons links', 'text_domain' ), ) // Args
        );
    }
    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        $facebook_link = $instance[ 'facebook_link' ];
        $google_link = $instance[ 'google_link' ];
        $instagram_link = $instance[ 'instagram_link' ]; ?>

                <ul>
                    <?php if (!$instance[ 'facebook_link' ] == null  ) { ?>
                        <li><a class="facebook-button icon" href="<?php echo (  $facebook_link ); ?> "></a></li>
                    <?php } ?>
                    <?php if (!$instance[ 'google_link' ] == null  ) { ?>
                        <li><a class="google-button" href="<?php echo esc_attr(  $google_link ); ?> "></a></li>
                    <?php } ?>
                    <?php if (!$instance[ 'instagram_link' ] == null  ) { ?>
                        <li><a class="instagram-button" href="<?php echo esc_attr(  $instagram_link ); ?>"></a></li>
                    <?php } ?>
                </ul>
   <?php }
    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */


    public function form( $instance ) {
        if ( isset( $instance[ 'google_link' ] ) || isset( $instance[ 'instagram_link' ] ) ||  isset( $instance[ 'facebook_link' ] )  ) {
            $facebook_link = $instance[ 'facebook_link' ];
            $google_link = $instance[ 'google_link' ];
            $instagram_link = $instance[ 'instagram_link' ];
        }
        else {
            $facebook_link = __( '#', 'text_domain' );
            $google_link = __( '#', 'text_domain' );
            $instagram_link = __( '#', 'text_domain' );
        }


        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'facebook_link' ); ?>"><?php _e( 'Facebook Link:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'facebook_link' ); ?>" name="<?php echo $this->get_field_name( 'facebook_link' ); ?>" type="text" value="<?php echo esc_attr(  $facebook_link ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'google_link' ); ?>"><?php _e( 'Google Link:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'google_link' ); ?>" name="<?php echo $this->get_field_name( 'google_link' ); ?>" type="text" value="<?php echo esc_attr(  $google_link ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'instagram_link' ); ?>"><?php _e( 'Instagram Link:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'instagram_link' ); ?>" name="<?php echo $this->get_field_name( 'instagram_link' ); ?>" type="text" value="<?php echo esc_attr( $instagram_link ); ?>">
        </p>
        <?php
    }
    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
//    public function update( $new_instance, $old_instance ) {
//        $instance = array();
//        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
//        return $instance;
//    }
} // class My_Widget
