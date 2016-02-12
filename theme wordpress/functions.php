<?php
/**
 * xpertos functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package xpertos
 */

require_once get_template_directory() . '/titan-framework/titan-framework-embedder.php';
require_once get_template_directory() . '/inc/tgmpa/tgmpa.php';
//require_once get_template_directory() . '/titan-framework-checker.php';

if ( ! function_exists( 'xpertos_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function xpertos_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on xpertos, use a find and replace
	 * to change 'xpertos' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'xpertos', get_template_directory() . '/languages' );
	load_theme_textdomain( TF_I18NDOMAIN, get_template_directory() . '/titan-framework/languages' );
	load_theme_textdomain( 'tgmpa', get_template_directory() . '/inc/tgmpa/languages' );

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
	// Add Post Thumbnail Support
	add_theme_support( 'post-thumbnails', array( 'post', 'page', 'how-to-buy', 'xpertos-values', 'services', 'frequent-questions', 'slider' ) );
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'xpertos' ),
		'second' => esc_html__( 'Second Menu', 'xpertos' ),
		'footer' => esc_html__( 'Footer Menu', 'xpertos' ),
	) );

	// Add Post Type Support
	add_post_type_support( 'post', 'excerpt' );

	// Image Sizes
	add_image_size('image-how-to-buy', 90, 90, true);
	add_image_size('image-logo', 168, 38, true);
	add_image_size('image-logo-contact', 317, 72, true);
	add_image_size('image-logo-footer', 219, 163, true);
	add_image_size('image-values', 286, 325, true);
	add_image_size('image-gallery', 1349, 667, true);
	add_image_size('image-entry', 865, 300, true);

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
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'gallery',
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	/*add_theme_support( 'custom-background', apply_filters( 'xpertos_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );*/
}
endif; // xpertos_setup
add_action( 'after_setup_theme', 'xpertos_setup' );

add_action( 'after_setup_theme', 'load_options' );

function load_options() {
	if(class_exists(TitanFramework)) :
	$titan = TitanFramework::getInstance( 'xpertos' );
	$xpertos_options = new stdClass();
	$xpertos_options->phone1_option = $titan->getOption('phone1_option');
	$xpertos_options->phone2_option = $titan->getOption('phone2_option');
	$xpertos_options->phone3_option = $titan->getOption('phone3_option');
	$xpertos_options->addres_option = $titan->getOption('addres_option');
	$xpertos_options->email1_option = $titan->getOption('email1_option');
	$xpertos_options->email2_option = $titan->getOption('email2_option');
	$xpertos_options->xpertos_logo_menu_option = $titan->getOption('xpertos_logo_menu_option');
	$xpertos_options->xpertos_logo_contact_option = $titan->getOption('xpertos_logo_contact_option');
	$xpertos_options->xpertos_logo_footer_option = $titan->getOption('xpertos_logo_footer_option');
	$xpertos_options->xpertos_background_option = $titan->getOption('xpertos_background_option');
	$xpertos_options->frequent_questions_background_option = $titan->getOption('frequent_questions_background_option');
	$xpertos_options->facebook_option = $titan->getOption('facebook_option');
	$xpertos_options->twitter_option = $titan->getOption('twitter_option');
	$xpertos_options->xpertos_evaluate_message = $titan->getOption('xpertos_evaluate_message');
	$xpertos_options->xpertos_register_message = $titan->getOption('xpertos_register_message');
	endif;
	return $xpertos_options;
}

function load_option_theme( $option = '' ) {
	if(class_exists(TitanFramework)) :
		$titan = TitanFramework::getInstance( 'xpertos' );
	endif;
	return $titan->getOption( $option );
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function xpertos_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'xpertos_content_width', 640 );
}
add_action( 'after_setup_theme', 'xpertos_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function xpertos_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'xpertos' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'xpertos_widgets_init' );

/**
 * Enqueue the Google fonts.
 */
function xpertos_fonts() {
    $protocol = is_ssl() ? 'https' : 'http';
    wp_enqueue_style( 'xpertos-opensans', "$protocol://fonts.googleapis.com/css?family=Open+Sans:400,700" );
    wp_enqueue_style( 'xpertos-pinyon', "$protocol://fonts.googleapis.com/css?family=Pinyon+Script" );
    wp_enqueue_style( 'xpertos-lato', "$protocol://fonts.googleapis.com/css?family=Lato:300,400,700" );
}
add_action( 'wp_enqueue_scripts', 'xpertos_fonts' );

/**
 * Enqueue scripts and styles.
 */
function xpertos_scripts() {

	wp_enqueue_script( 'xpertos-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'xpertos-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// tell WordPress to load the Smoothness theme from Google CDN
	// get registered script object for jquery-ui
	wp_enqueue_style('xpertos-animate', get_template_directory_uri().'/css/animate.css', array(), '1.0', 'all' );
	wp_enqueue_style('xpertos-bootstrap', get_template_directory_uri().'/css/bootstrap.css', array(), '1.0', 'all' );
	wp_enqueue_style('xpertos-fontawesome', get_template_directory_uri().'/css/font-awesome.min.css', array(), '1.0', 'all' );
	wp_enqueue_style('xpertos-flexslider', get_template_directory_uri().'/css/flexslider.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'xpertos-style', get_stylesheet_uri() );
	// Javascripts
	wp_enqueue_script('jquery', true);
	global $wp_scripts;
  $ui = $wp_scripts->query('jquery-ui-core');
  $protocol = is_ssl() ? 'https' : 'http';
  $url = "$protocol://ajax.googleapis.com/ajax/libs/jqueryui/{$ui->ver}/themes/smoothness/jquery-ui.min.css";
  wp_enqueue_style('jquery-ui-smoothness', $url, false, null);
	//wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script('jquery-ui-datepicker');
	wp_enqueue_script( 'xpertos-daterange-moment', get_template_directory_uri() . '/js/bootstrap-daterangepicker-master/moment.js', array('jquery'), '1.1.3', true );
	//wp_enqueue_script( 'xpertos-daterange', get_template_directory_uri() . '/js/bootstrap-daterangepicker-master/daterangepicker.js', array('jquery'), '1.1.3', true );
	wp_enqueue_script( 'xpertos-parallax', get_template_directory_uri() . '/js/jquery.parallax-1.1.3.js', array('jquery'), '1.1.3', true );
	wp_enqueue_script( 'xpertos-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'xpertos-validation-mockjax', get_template_directory_uri() . '/js/jquery-validation/lib/jquery.mockjax.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'xpertos-validation-form', get_template_directory_uri() . '/js/jquery-validation/lib/jquery.form.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'xpertos-validation', get_template_directory_uri() . '/js/jquery-validation/dist/jquery.validate.min.js', array('jquery'), '1.0', true );
	$locale = get_locale();
	if($locale == "es_CO") $locale = "es";
	wp_enqueue_script( 'xpertos-validation-local', get_template_directory_uri() . '/js/jquery-validation/dist/localization/messages_'.$locale.'.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'xpertos-sticky', get_template_directory_uri() . '/js/jquery.sticky.js', array('jquery'), '1.0.2', true );
	wp_enqueue_script( 'xpertos-wow', get_template_directory_uri() . '/js/wow.min.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'xpertos-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery'), '1.3', true );
	wp_enqueue_script( 'xpertos-flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'xpertos-script', get_template_directory_uri() . '/js/xpertos.js', array('jquery'), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'xpertos_scripts' );

//Xpertos nav menu for bootstrap
function xpertos_nav_menu($menu = 'primary-menu') {
	$args = array(
        'order'                  => 'ASC',
        'orderby'                => 'menu_order',
        'post_type'              => 'nav_menu_item',
        'post_status'            => 'publish',
        'output'                 => ARRAY_A,
        'output_key'             => 'menu_order',
        'nopaging'               => true,
        'update_post_term_cache' => false );
	$menu_items = wp_get_nav_menu_items($menu, $args);
	foreach ( (array) $menu_items as $key => $menu_item ) {
	    $title = $menu_item->title;
			$pos = preg_match('/^\/\#/', $menu_item->url);
	    $url = ( $menu == "second-menu" and $pos == true ) ? home_url($menu_item->url) : $menu_item->url;
	    $menu_list .= '<li><a href="' . $url . '">' . $title . '</a></li>';
	}
	return $menu_list;
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
 * Load post-types compatibility file.
 */
require get_template_directory() . '/inc/post-types.php';

/**
 * Load template options compatibility file.
 */
require get_template_directory() . '/inc/theme-options.php';

/**
 * Load forms compatibility file.
 */
require get_template_directory() . '/inc/forms-cart.php';

/**
 * Load admin tables compatibility file.
 */
require get_template_directory() . '/inc/admin-tables.php';


if (class_exists('MultiPostThumbnails')) {
    new MultiPostThumbnails(
        array(
            'label' => __('Secondary Image', 'xpertos'),
            'id' => 'secondary-image',
            'post_type' => 'post'
        )
    );
    new MultiPostThumbnails(
        array(
            'label' => __('Secondary Image', 'xpertos'),
            'id' => 'secondary-image',
            'post_type' => 'how-to-buy'
        )
    );
    new MultiPostThumbnails(
        array(
            'label' => __('Secondary Image', 'xpertos'),
            'id' => 'secondary-image',
            'post_type' => 'values'
        )
    );
    new MultiPostThumbnails(
        array(
            'label' => __('Secondary Image', 'xpertos'),
            'id' => 'secondary-image',
            'post_type' => 'services'
        )
    );
}

/* Shortcodes for home page */
//[Section xpertos]
function xpertos_section_func( $atts ){
	ob_start();
	require get_template_directory() . '/template-parts/section-xpertos.php';
	$html = ob_get_contents();
	ob_end_clean();
	return $html;
}
add_shortcode( 'xpertos_section', 'xpertos_section_func' );

//[Section services]
function services_section_func( $atts ){
	ob_start();
	require get_template_directory() . '/template-parts/section-services.php';
	$html = ob_get_contents();
	ob_end_clean();
	return $html;
}
add_shortcode( 'services_section', 'services_section_func' );

//[Section frequent questions]
function frequent_section_func( $atts ){
	ob_start();
	require get_template_directory() . '/template-parts/section-frequent-questions.php';
	$html = ob_get_contents();
	ob_end_clean();
	return $html;
}
add_shortcode( 'section_frequent_questions', 'frequent_section_func' );

//[Section xpertos]
function how_to_buy_section_func( $atts ){
	ob_start();
	require get_template_directory() . '/template-parts/section-how-to-buy.php';
	$html = ob_get_contents();
	ob_end_clean();
	return $html;
}
add_shortcode( 'section_how_to_buy', 'how_to_buy_section_func' );

//[Section xpertos]
function div_image_shortcode( $atts ){
	extract(
		shortcode_atts(
			array(
				'id' => '',
				'imageurl' => '',
				'class' => 'section',
				'title' => '',
				'image_class' => 'img-responsive',
				'img_width' => '',
				'img_height' => '',
				'img_title' => ''
			), $atts
		)
	);

	$html = '<section class="' . $class . '"';
	if(!empty($id)) $html .= ' id="' . $id . '"';
	$html .= '>';
	if(!empty($title)) $html .= '<h2>' . $title . '</h2>';
	$html .= '<img src="' . $imageurl . '"';
	if(!empty($img_title)) $html .= ' alt="' . $img_title . '"';
	if(!empty($img_width)) $html .= ' width="' . $img_width . '"';
	if(!empty($img_height)) $html .= ' height="' . $img_height . '"';
	$html .= ' class="' . $image_class . '"';
	$html .= ' />';
	return $html .= "</section>";
}
add_shortcode( 'div_image', 'div_image_shortcode' );

add_action('init', 'myStartSession', 1);
function myStartSession() {
    if(!session_id()) {
        session_start();
    }
}

remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

remove_filter('the_content', 'wpautop');
