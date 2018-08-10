<?php
/**
 * What A Great Website functions and definitions
 *
 * @package What A Great Website
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1100; /* pixels */
}

if ( ! function_exists( 'wagw_setup' ) ) :
	/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
	function wagw_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on What A Great Website, use a find and replace
		 * to change 'wagw' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'wagw', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		/* disable automatic feeds */
		// add_theme_support( 'automatic-feed-links' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'wagw' ),
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

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'status',
			'aside',
			'image',
			'video',
			'quote',
			'link',
		) );

		// Setup the WordPress core custom background feature.
		/*--------------------------
		 add_theme_support( 'custom-background', apply_filters( 'wagw_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
		) ) );
		-----------------------------*/
	}
endif; // wagw_setup
add_action( 'after_setup_theme', 'wagw_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function wagw_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'wagw' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
		register_sidebar( array(
				'name'          => __( 'header', 'wagw' ),
				'id'            => 'header',
				'description'   => '',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h1 class="widget-title">',
				'after_title'   => '</h1>',
		) );
		register_sidebar( array(
				'name'          => __( 'footer', 'wagw' ),
				'id'            => 'footer',
				'description'   => '',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h1 class="widget-title">',
				'after_title'   => '</h1>',
		) );

}
add_action( 'widgets_init', 'wagw_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wagw_scripts() {
		$theme = wp_get_theme();
		$ver = $theme->get( 'Version' );
	$themecsspath = get_stylesheet_directory() . '/style.css';
	$style_ver = filemtime( $themecsspath );
	wp_enqueue_style( 'wagw-style', get_stylesheet_uri(),array(),$style_ver );

	wp_enqueue_script( 'wagw-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'wagw-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'thickbox', true );
	wp_enqueue_style( 'thickbox' );

	if ( is_page_template( 'slider-page.php' ) ) {
		wp_enqueue_style( 'flexslider-css', get_stylesheet_directory_uri() . '/flexslider/flexslider.css' );
	}

}
add_action( 'wp_enqueue_scripts', 'wagw_scripts' );


if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page( array(
					 'page_title' => 'WAGW Theme Options',
					 'page_slug'  => 'wagw_options',
					 'autoload'   => true,
					  )
	);
}
// if using the slider-page template, enqueue flexsider
function wagw_flexslider_gallery_scripts() {
	if ( is_page_template( 'slider-page.php' ) ) {
		wp_enqueue_script( 'jquery' );
		wp_register_script( 'flexslider', get_stylesheet_directory_uri() . '/flexslider/jquery.flexslider-min.js', array( 'jquery' ), false, false );
		wp_register_script( 'load_flex', get_stylesheet_directory_uri() . '/js/load-flex.js', array( 'jquery', 'flexslider' ), false, false );

		$speed = get_field( 'slideshow_speed' );
		$animation = get_field( 'animation_speed' );
		$animation_type = get_field( 'animation_type' );
		$easing = get_field( 'easing_method' );
		$controlNav = $directionNav = false;
		if ( get_field( 'nextprev_arrows' ) ) { $directionNav = true;
		}
		if ( get_field( 'navigation_dots' ) ) { $controlNav = true;
		}
		if ( get_field( 'slider_carousel' ) ) { $controlNav = 'thumbnails';
		}

		// get the settings for this post

		$args = array(
		'animation'       => $animation_type,
		'animationSpeed'  => $animation,
		'slideshowSpeed'  => $speed,
		'controlNav'      => $controlNav,
		'directionNav'    => $directionNav,
		'easing'          => $easing,

		 );
		wp_enqueue_script( 'flexslider' );
		wp_localize_script( 'load_flex', 'wagw', $args );
		wp_enqueue_script( 'load_flex' );
	}
}
add_action( 'wp_enqueue_scripts', 'wagw_flexslider_gallery_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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
 * Enqueue extra fonts
**/
function wagw_load_fonts() {
	wp_register_style( 'googleFonts', 'https://fonts.googleapis.com/css?family=Raleway' );
	wp_enqueue_style( 'googleFonts' );
}
add_action( 'wp_print_styles', 'wagw_load_fonts' );

include_once( 'shortcodes.php' );

// Allow photon on secure url.
add_filter( 'jetpack_photon_reject_https', '__return_false' );

// Move Yoast to bottom
function yoasttobottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom' );

function wagw_clear () {
  return '<div style="clear: both;"></div>';
}
add_shortcode( 'clear', 'wagw_clear');
