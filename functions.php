<?php
/**
 * NerdMachina functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package NerdMachina
 */

if ( ! defined( 'NERDMACHINA_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'NERDMACHINA_VERSION', '1.0.1' );
}

if ( ! function_exists( 'nerdmachina_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function nerdmachina_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on NerdMachina, use a find and replace
		 * to change 'nerdmachina' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'nerdmachina', get_template_directory() . '/languages' );

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

		// For the archive pages
		add_image_size( 'nerdmachina_archive_100x100', 100, 100, true );
		add_image_size( 'nerdmachina_archive_300x300', 300, 300, true );

		// For the single pages
		add_image_size( 'nerdmachina_single_400x225', 400, 225, true );
		add_image_size( 'nerdmachina_single_800x450', 800, 450, true );
		add_image_size( 'nerdmachina_single_1024x576', 1024, 576, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'main' => esc_html__( 'Primary', 'nerdmachina' ),
				'social' => esc_html__( 'Social', 'nerdmachina' ),
				'footer' => esc_html__( 'Footer', 'nerdmachina' ),
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
				'nerdmachina_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif;
add_action( 'after_setup_theme', 'nerdmachina_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nerdmachina_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nerdmachina_content_width', 680 );
}
add_action( 'after_setup_theme', 'nerdmachina_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nerdmachina_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'nerdmachina' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'nerdmachina' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'nerdmachina_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function nerdmachina_scripts() {
	wp_enqueue_style( 'nerdmachina-style', get_stylesheet_uri(), array(), NERDMACHINA_VERSION );

	wp_enqueue_style( 'nerdmachina-style-min', get_template_directory_uri() . '/assets/css/style.min.css', NERDMACHINA_VERSION );

	wp_enqueue_script( 'nerdmachina-index', get_template_directory_uri() . '/assets/js/index.js', array(), NERDMACHINA_VERSION, true );

	if ( ! is_singular() ) {
		wp_enqueue_script( 'nerdmachina-infinite-scroll', get_template_directory_uri() . '/assets/js/infinite-scroll.min.js', array(), '3.0.6', true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nerdmachina_scripts' );

/**
 * Change archive headers
 */
function nerdmachina_prefix_category_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'nerdmachina_prefix_category_title' );

/**
 * Configurando o Infinite-scroll.min.js.
 * 
 * Este javascript deverá ser carregado inline, na própria página, após o carregamento da mesma.
 */
function nerdmachina_infinite_scroll_ctrl() {
	if ( ! is_singular() ) { ?>
		<script>
			( function() {
				
				/**
				 * Infinite Scroll
				 */
				var elem = document.querySelector('.site-main__inner');
				if ( document.querySelector('.next') ) {
					var infScroll = new InfiniteScroll( elem, {
						// options
						path: '.next',
						append: 'article',
						hideNav: '.pagination',
						button: '.load-more',
						scrollThreshold: false,
					});
				}

			}());
		</script>
	<?php
	}
}
add_action( 'wp_footer', 'nerdmachina_infinite_scroll_ctrl', 100 );

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
 * SVG support
 */
require get_template_directory() . '/inc/classes/class-svg-icons.php';
require get_template_directory() . '/inc/svg-icons.php';