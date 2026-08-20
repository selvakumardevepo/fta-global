<?php

/**
 * fta-global functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fta-global
 */

if (! defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fta_global_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on fta-global, use a find and replace
		* to change 'fta-global' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('fta-global', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'fta-global'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'fta_global_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'fta_global_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fta_global_content_width()
{
	$GLOBALS['content_width'] = apply_filters('fta_global_content_width', 640);
}
add_action('after_setup_theme', 'fta_global_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fta_global_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'fta-global'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'fta-global'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'fta_global_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function fta_global_scripts()
{
	$theme_uri = get_template_directory_uri();

	// Self-hosted Inter font (replaces Google Fonts CDN)
	wp_enqueue_style('fta-global-fonts', $theme_uri . '/assets/css/inter-fonts.css', array(), _S_VERSION);

	// Webflow Shared & Page Styles (self-hosted)
	wp_enqueue_style('fta-global-webflow-shared', $theme_uri . '/assets/css/webflow-shared.css', array(), _S_VERSION);
	wp_enqueue_style('fta-global-webflow-page', $theme_uri . '/assets/css/webflow-page.css', array('fta-global-webflow-shared'), _S_VERSION);

	// Swiper CSS (self-hosted)
	wp_enqueue_style('fta-global-swiper', $theme_uri . '/assets/css/swiper-bundle.min.css', array(), '11.0.0');

	// Main Theme Style
	wp_enqueue_style('fta-global-style', get_stylesheet_uri(), array('fta-global-webflow-page'), _S_VERSION);
	wp_style_add_data('fta-global-style', 'rtl', 'replace');

	// jQuery
	wp_enqueue_script('jquery');
	wp_add_inline_script('jquery', 'window.$ = window.jQuery || jQuery;');

	// wp_enqueue_script('fta-global-webflow', $theme_uri . '/assets/js/webflow.js', array('jquery'), _S_VERSION, true);
	// Webflow Main JS — kept on Webflow's CDN (dynamic chunk loader, not safe to self-host)
	wp_enqueue_script('fta-global-webflow', 'https://cdn.prod.website-files.com/68c04edf494a06a2d8bdab34/js/webflow.c5d2fe93.a49a90f8a2c89c9d.js', array('jquery'), _S_VERSION, true);

	wp_enqueue_script('fta-global-swiper', $theme_uri . '/assets/js/swiper-bundle.min.js', array(), '11.0.0', true);

	wp_enqueue_script('fta-global-countup', $theme_uri . '/assets/js/countUp.umd.min.js', array(), '2.3.2', true);

	wp_enqueue_script('fta-global-interactive', $theme_uri . '/js/fta-interactive.js', array('jquery', 'fta-global-webflow', 'fta-global-swiper'), _S_VERSION, true);

	wp_enqueue_script('fta-global-navigation', $theme_uri . '/js/navigation.js', array(), _S_VERSION, true);

	wp_enqueue_script('fta-global-navbar-toggle', $theme_uri . '/js/navbar-toggle.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'fta_global_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}
