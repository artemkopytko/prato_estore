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
	wp_register_style( 'aboutUs', get_template_directory_uri() . '/css/aboutUs.css' );
	wp_register_style( 'store', get_template_directory_uri(). '/css/store.css' );
	wp_register_style( 'payment_shipping', get_template_directory_uri() . '/css/payment_shipping.css' );
	wp_register_style( 'contacts', get_template_directory_uri() . '/css/contacts.css' );
	wp_register_style( 'cart', get_template_directory_uri() . '/css/cart.css' );
	wp_register_style( 'checkout', get_template_directory_uri(). '/css/checkout.css' );
	wp_register_style( 'checkout_payment', get_template_directory_uri(). '/css/checkout_payment.css' );
	wp_register_style( 'product', get_template_directory_uri() . '/css/product.css' );
	wp_register_style( '404', get_template_directory_uri(). '/css/404.css' );

	if(is_page('home')) {
		wp_enqueue_style('index');
	}
	if(is_page('about')) {
		wp_enqueue_style('aboutUs');
	}
	if(is_page('cart')) {
		wp_enqueue_style('cart');
	}
	if(is_page('checkout')) {
		wp_enqueue_style('checkout');
	}
	if(is_page('checkout_payment') ) {
		wp_enqueue_style('checkout_payment');
	}
	if(is_page('contacts')) {
		wp_enqueue_style('contacts');
	}
	if(is_page('info')) {
		wp_enqueue_style('payment_shipping');
	}
	if(is_page('product')) {
		wp_enqueue_style('product');
	}
	if(is_page('store') ) {
		wp_enqueue_style('store');
	}
	if(is_404() ) {
		wp_enqueue_style('404');
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

add_filter('upload_mimes', 'add_custom_upload_mimes');
function add_custom_upload_mimes($existing_mimes) {
	$existing_mimes['otf'] = 'application/x-font-otf';
	$existing_mimes['woff'] = 'application/x-font-woff';
	$existing_mimes['ttf'] = 'application/x-font-ttf';
	$existing_mimes['svg'] = 'image/svg+xml';
	$existing_mimes['eot'] = 'application/vnd.ms-fontobject';
	return $existing_mimes;
}

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

add_action( 'wp_footer', 'cart_update_qty_script' );
function cart_update_qty_script() {
	if (is_cart()) :
		?>
		<script type="text/javascript">
            (function($){
                $(function(){
                    $('div.woocommerce').on( 'change', '.qty', function(){
                        $("[name='update_cart']").trigger('click');
                    });
                });
            })(jQuery);
		</script>
		<?php
	endif;
}






add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

function custom_override_checkout_fields( $fields ) {
	unset($fields['billing']['billing_last_name']);
	unset($fields['billing']['billing_company']);
	unset($fields['billing']['billing_address_2']);
	unset($fields['billing']['billing_city']);
	unset($fields['billing']['billing_postcode']);
//	unset($fields['billing']['billing_country']);
	unset($fields['billing']['billing_state']);
	unset($fields['order']['order_comments']);
	unset($fields['billing']['billing_address_2']);
	unset($fields['billing']['billing_postcode']);
	unset($fields['billing']['billing_company']);
	unset($fields['billing']['billing_last_name']);
	unset($fields['billing']['billing_city']);
	return $fields;
}


add_filter( 'woocommerce_default_address_fields' , 'filter_default_address_fields', 20, 1 );
function filter_default_address_fields( $address_fields ) {
	// Only on checkout page
	if( ! is_checkout() ) return $address_fields;

	// All field keys in this array
	$key_fields = array('country','first_name','last_name','company','address_1','address_2','city','state','postcode');

	// Loop through each address fields (billing and shipping)
	foreach( $key_fields as $key_field )
		$address_fields[$key_field]['required'] = false;

	return $address_fields;
}

// For billing email and phone - Make them not required
add_filter( 'woocommerce_billing_fields', 'filter_billing_fields', 20, 1 );
function filter_billing_fields( $billing_fields ) {
	// Only on checkout page
	if( ! is_checkout() ) return $billing_fields;

	$billing_fields['billing_phone']['required'] = true;
	$billing_fields['billing_first_name']['required'] = true;
	$billing_fields['billing_email']['required'] = false;
	return $billing_fields;
}

function SearchFilter($query) {
	if ( $query->is_search && !is_woocommerce()) {
		$query->set( 'post_type', 'post' );
	}
	if ( function_exists( 'is_woocommerce' ) ) :
		if ( $query->is_search && is_woocommerce() ) {
			$query->set( 'post_type', 'product' );
		}
	endif;
	return $query;
}
add_filter('pre_get_posts','SearchFilter');

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
