<?php
/**
 * Prato functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Prato
 */

if ( ! function_exists( 'prato_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function prato_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Prato, use a find and replace
		 * to change 'prato' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'prato', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'prato' ),
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
		add_theme_support( 'custom-background', apply_filters( 'prato_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'prato_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function prato_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'prato_content_width', 640 );
}
add_action( 'after_setup_theme', 'prato_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function prato_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'prato' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'prato' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'prato_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function prato_scripts() {
	wp_register_style( 'index', get_template_directory_uri() . '/css/index.css' );
	wp_register_style( 'about', get_template_directory_uri() . '/css/about.css' );
	wp_register_style( 'cart', get_template_directory_uri() . '/css/cart.css' );
	wp_register_style( 'checkout', get_template_directory_uri(). '/css/checkout.css');
	wp_register_style('checkout_payment', get_template_directory_uri(). '/css/checkout_payment.css');
	wp_register_style( 'contacts', get_template_directory_uri() . '/css/contacts.css' );
	wp_register_style( 'payment_shipping', get_template_directory_uri() . '/css/payment_shipping.css' );
	wp_register_style( 'product', get_template_directory_uri() . '/css/product.css' );
	wp_register_style( 'store', get_template_directory_uri(). '/css/store.css');
	wp_register_style('404', get_template_directory_uri(). '/css/404.css');

	if(is_page('home')) {
		wp_enqueue_style('index');
		wp_enqueue_script( 'prato_index', get_template_directory_uri() . '/js/index.js', array(), '20151215', true );
	}
	if(is_page('about')) {
		wp_enqueue_style('about');
		wp_enqueue_script( 'prato_about', get_template_directory_uri() . '/js/about.js', array(), '20151215', true);
	}
	if(is_page('cart')) {
		wp_enqueue_style('cart');
		wp_enqueue_script( 'prato_cart', get_template_directory_uri() . '/js/cart.js', array(), '20151215', true);
	}
	if(is_page('checkout')) {
		wp_enqueue_style('checkout');
		wp_enqueue_script( 'prato_checkout', get_template_directory_uri() . '/js/checkout.js', array(), '20151215', true);
	}
	if(is_page('checkout_payment') ) {
		wp_enqueue_style('checkout_payment');
		wp_enqueue_script( 'prato_checkout_payment', get_template_directory_uri() . '/js/checkout_payment.js', array(), '20151215', true);
	}

	if(is_page('contacts')) {
		wp_enqueue_style('contacts');
		wp_enqueue_script( 'prato_contacts', get_template_directory_uri() . '/js/contacts.js', array(), '20151215', true );
	}
	if(is_page('payment_shipping')) {
		wp_enqueue_style('payment_shipping');
		wp_enqueue_script( 'prato_payment_shipping', get_template_directory_uri() . '/js/portfolio.js', array(), '20151215', true);
	}
	if(is_page('product')) {
		wp_enqueue_style('product');
		wp_enqueue_script( 'prato_product', get_template_directory_uri() . '/js/product.js', array(), '20151215', true);
	}
	if(is_page('store') ) {
		wp_enqueue_style('store');
		wp_enqueue_script( 'prato_store', get_template_directory_uri() . '/js/store.js', array(), '20151215', true);
	}
	if(is_404() ) {
		wp_enqueue_style('404');
		wp_enqueue_script( 'prato_404', get_template_directory_uri() . '/js/404.js', array(), '20151215', true);
	}

	wp_enqueue_script( 'prato-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'prato_scripts' );

function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// Remove WP Version From Styles
add_filter( 'style_loader_src', 'sdt_remove_ver_css_js', 9999 );
// Remove WP Version From Scripts
add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999 );

// Function to remove version numbers
function sdt_remove_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}


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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
