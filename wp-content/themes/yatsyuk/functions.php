<?php
/**
 * yatsyuk functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package yatsyuk
 */

if ( ! function_exists( 'yatsyuk_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function yatsyuk_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on yatsyuk, use a find and replace
	 * to change 'yatsyuk' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'yatsyuk', get_template_directory() . '/languages' );

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


    /**
     *  Adding active class
     */

    add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

    function special_nav_class ($classes, $item) {
        if (in_array('current-menu-item', $classes) ){
            $classes[] = 'active ';
        }
        return $classes;
    }


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'yatsyuk' ),
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


    // Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'yatsyuk_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function yatsyuk_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'yatsyuk_content_width', 640 );
}
add_action( 'after_setup_theme', 'yatsyuk_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function yatsyuk_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'yatsyuk' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'yatsyuk' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'yatsyuk_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function yatsyuk_scripts() {
	wp_enqueue_style( 'yatsyuk-style', get_stylesheet_uri() );

    wp_enqueue_script( 'yatsyuk-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'yatsyuk-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );


    // my scripts

    wp_enqueue_script('jq-js', get_template_directory_uri().'/libs/jquery/dist/jquery.min.js');

//    wp_enqueue_style('tether-css', get_template_directory_uri().'/libs/tether/dist/css/tether.min.css');
//    wp_enqueue_style('tether-theme-arrows', get_template_directory_uri().'/libs/tether/dist/css/tether-theme-arrows.min.css');
//    wp_enqueue_style('tether-theme-arrows-dark', get_template_directory_uri().'/libs/tether/dist/css/tether-theme-arrows-dark.min.css');
//    wp_enqueue_style('tether-theme-basic', get_template_directory_uri().'/libs/tether/dist/css/tether-theme-basic.min.css');
    wp_enqueue_script('tether-js', get_template_directory_uri().'/libs/tether/dist/js/tether.min.js');

    wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/libs/bootstrap/dist/js/bootstrap.min.js');
//    wp_enqueue_style('bootstrap-css', get_template_directory_uri().'/libs/bootstrap/dist/css/bootstrap.min.css');
//    wp_enqueue_style('bootstrap-grid-css', get_template_directory_uri().'/libs/bootstrap/dist/css/bootstrap-grid.min.css');
//    wp_enqueue_style('bootstrap-reboot-css', get_template_directory_uri().'/libs/bootstrap/dist/css/bootstrap-reboot.min.css');
//
//    wp_enqueue_style('fancy-css', get_template_directory_uri().'/libs/fancybox/dist/jquery.fancybox.min.css');
    wp_enqueue_script('fancy-js', get_template_directory_uri().'/libs/fancybox/dist/jquery.fancybox.min.js');


    wp_enqueue_style('my-style', get_template_directory_uri().'/stylesheets/style.css', 'true');
    wp_enqueue_style('my-libs', get_template_directory_uri().'/stylesheets/libs.min.css');
    wp_enqueue_script('main', get_template_directory_uri().'/js/main.js');

    // .my scripts


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'yatsyuk_scripts' );

/**
 * my scripts
 */
// Disable jQuery WordPress
function jquery_another_version() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_stylesheet_directory_uri() .'/libs/jquery/dist/jquery.min.js', array(), '');
}
add_action( 'wp_enqueue_scripts', 'jquery_another_version' );

/**
*  Adding font awesome
*/
function font_awesome() {
    if (!is_admin()) {
        wp_register_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css');
        wp_enqueue_style('font-awesome');
    }
}
add_action('wp_enqueue_scripts', 'font_awesome');



/**
 *
 * Deleting [...] in excerpts.
 */
add_filter('excerpt_more', function($more) {
    return '...';
});


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
 * Load METABoxes file.
 */
require get_template_directory() . '/inc/meta-boxes.php';

/**
 * Load Settings file.
 */
require get_template_directory() . '/inc/settings.php';

/**
 * Load Post-types file.
 */
require get_template_directory() . '/inc/post-types.php';

/**
 * Load Nav-Walker
 */
require_once('wp-bootstrap-navwalker.php');


/**
 * Load Tax_List_Widget
 */
require get_template_directory() . '/inc/tax-list-widget.php';


/**
 * Google api AIzaSyCRcTSTfrcHYpiKEComWMqtskBtD4FJRFs
 */

function my_acf_google_map_api ($api){
    $api['key'] = 'AIzaSyCRcTSTfrcHYpiKEComWMqtskBtD4FJRFs';
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');