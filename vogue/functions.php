<?php
/**
 * Vogue functions and definitions
 *
 * @package Vogue
 */
define( 'VOGUE_THEME_VERSION' , '1.4.76' );

// Get help / Premium Page
require get_template_directory() . '/upgrade/upgrade.php';

// Load WP included scripts
require get_template_directory() . '/includes/inc/template-tags.php';
require get_template_directory() . '/includes/inc/extras.php';
require get_template_directory() . '/includes/inc/jetpack.php';
require get_template_directory() . '/includes/inc/customizer.php';

// Load Customizer Library scripts
require get_template_directory() . '/customizer/customizer-options.php';
require get_template_directory() . '/customizer/customizer-library/customizer-library.php';
require get_template_directory() . '/customizer/styles.php';
require get_template_directory() . '/customizer/mods.php';

// Load TGM plugin class
require_once get_template_directory() . '/includes/inc/class-tgm-plugin-activation.php';
// Add customizer Upgrade class
require_once( get_template_directory() . '/includes/vogue-pro/class-customize.php' );

if ( ! function_exists( 'vogue_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function vogue_setup() {

	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 900; /* pixels */
	}

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on vogue, use a find and replace
	 * to change 'vogue' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'vogue', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'vogue_blog_img_side', 500, 380, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'vogue' ),
        'top-bar-menu' => __( 'Top Bar Menu', 'vogue' ),
        'footer-bar' => __( 'Footer Bar Menu', 'vogue' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	// Gutenberg Support
	add_theme_support( 'align-wide' );

	// The custom header is used for the logo
	add_theme_support( 'custom-header', array(
        'default-image' => '',
		'width'         => 280,
		'height'        => 145,
		'flex-width'    => true,
		'flex-height'   => true,
		'header-text'   => false,
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'vogue_custom_background_args', array(
		'default-color' => 'F9F9F9',
		'default-image' => '',
	) ) );

	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
endif; // vogue_setup
add_action( 'after_setup_theme', 'vogue_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function vogue_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'vogue' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar(array(
		'name' => __( 'Vogue Footer Standard', 'vogue' ),
		'id' => 'vogue-site-footer-standard',
        'description' => __( 'The footer will divide into however many widgets are placed here.', 'vogue' )
	));
}
add_action( 'widgets_init', 'vogue_widgets_init' );

/*
 * Change Widgets Title Tags for SEO
 */
function kaira_change_widget_titles( array $params ) {
	$widget_title_tag = get_theme_mod( 'vogue-seo-widget-title-tag', customizer_library_get_default( 'vogue-seo-widget-title-tag' ) );
    $widget =& $params[0];
    $widget['before_title'] = '<h'.esc_attr( $widget_title_tag ).' class="widget-title">';
    $widget['after_title'] = '</h'.esc_attr( $widget_title_tag ).'>';
    return $params;
}
add_filter( 'dynamic_sidebar_params', 'kaira_change_widget_titles', 20 );

/**
 * Enqueue scripts and styles.
 */
function vogue_scripts() {
	if ( !get_theme_mod( 'vogue-disable-google-fonts', customizer_library_get_default( 'vogue-disable-google-fonts' ) ) ) {
		wp_enqueue_style( 'vogue-body-font-default', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic', array(), VOGUE_THEME_VERSION );
		wp_enqueue_style( 'vogue-heading-font-default', '//fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic', array(), VOGUE_THEME_VERSION );
	}
	
	wp_enqueue_style( 'vogue-font-awesome', get_template_directory_uri().'/includes/font-awesome/css/all.min.css', array(), '6.0.0' );
	wp_enqueue_style( 'vogue-style', get_stylesheet_uri(), array(), VOGUE_THEME_VERSION );

	if ( get_theme_mod( 'vogue-header-layout' ) == 'vogue-header-layout-four' ) :
		wp_enqueue_style( 'vogue-header-style', get_template_directory_uri().'/templates/css/header-four.css', array(), VOGUE_THEME_VERSION );
	elseif ( get_theme_mod( 'vogue-header-layout' ) == 'vogue-header-layout-three' ) :
		wp_enqueue_style( 'vogue-header-style', get_template_directory_uri().'/templates/css/header-three.css', array(), VOGUE_THEME_VERSION );
	elseif ( get_theme_mod( 'vogue-header-layout' ) == 'vogue-header-layout-two' ) :
		wp_enqueue_style( 'vogue-header-style', get_template_directory_uri().'/templates/css/header-two.css', array(), VOGUE_THEME_VERSION );
	else :
		wp_enqueue_style( 'vogue-header-style', get_template_directory_uri().'/templates/css/header-one.css', array(), VOGUE_THEME_VERSION );
	endif;

	if ( vogue_is_woocommerce_activated() ) :
		wp_enqueue_style( 'vogue-standard-woocommerce-style', get_template_directory_uri().'/templates/css/woocommerce-standard-style.css', array(), VOGUE_THEME_VERSION );
	endif;

	if ( get_theme_mod( 'vogue-footer-layout' ) == 'vogue-footer-layout-standard' ) :
	    wp_enqueue_style( 'vogue-footer-style', get_template_directory_uri().'/templates/css/footer-standard.css', array(), VOGUE_THEME_VERSION );
	else :
		wp_enqueue_style( 'vogue-footer-style', get_template_directory_uri().'/templates/css/footer-social.css', array(), VOGUE_THEME_VERSION );
	endif;
	
	wp_enqueue_script( 'caroufredsel', get_template_directory_uri() . '/js/jquery.carouFredSel-6.2.1-packed.js', array('jquery'), VOGUE_THEME_VERSION, true );

	wp_enqueue_script( 'vogue-customjs', get_template_directory_uri() . '/js/custom.js', array('jquery'), VOGUE_THEME_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'vogue_scripts' );

/**
 * Fix skip link focus in IE11. Too small to load as own script
 */
function vogue_custom_footer_scripts() {
	// The following is minified via 'terser --compress --mangle -- js/skip-link-focus-fix.js' ?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script><?php
}
add_action( 'wp_print_footer_scripts', 'vogue_custom_footer_scripts' );

/**
 * Add theme stying to the theme content editor
 */
function vogue_add_editor_styles() {
    add_editor_style( 'style-theme-editor.css' );
}
add_action( 'admin_init', 'vogue_add_editor_styles' );

/**
 * Add pingback to header
 */
function vogue_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'vogue_pingback_header' );

/**
 * Enqueue admin styling.
 */
function vogue_load_admin_script( $hook ) {
	wp_enqueue_style( 'vogue-admin-css', get_template_directory_uri() . '/upgrade/css/admin-css.css', array(), VOGUE_THEME_VERSION );
}
add_action( 'admin_enqueue_scripts', 'vogue_load_admin_script' );

/**
 * Enqueue vogue custom customizer styling.
 */
function vogue_load_customizer_script() {
	wp_enqueue_script( 'vogue-customizer-js', get_template_directory_uri() . '/customizer/customizer-library/js/customizer-custom.js', array('jquery'), VOGUE_THEME_VERSION, true );
    wp_enqueue_style( 'vogue-customizer-css', get_template_directory_uri() . '/customizer/customizer-library/css/customizer.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'vogue_load_customizer_script' );

/**
 * Check if WooCommerce exists.
 */
if ( ! function_exists( 'vogue_is_woocommerce_activated' ) ) :
	function vogue_is_woocommerce_activated() {
	    if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
endif; // vogue_is_woocommerce_activated

// If WooCommerce exists include ajax cart
if ( vogue_is_woocommerce_activated() ) {
	require get_template_directory() . '/includes/inc/woocommerce-header-inc.php';
}

/**
 * Adjust is_home query if vogue-blog-cats is set
 */
function vogue_set_blog_queries( $query ) {
    $blog_query_set = '';
    if ( get_theme_mod( 'vogue-blog-cats', false ) ) {
        $blog_query_set = get_theme_mod( 'vogue-blog-cats' );
    }

    if ( $blog_query_set ) {
        // do not alter the query on wp-admin pages and only alter it if it's the main query
        if ( !is_admin() && $query->is_main_query() ){
            if ( is_home() ){
                $query->set( 'cat', $blog_query_set );
            }
        }
    }
}
add_action( 'pre_get_posts', 'vogue_set_blog_queries' );

if ( ! function_exists( 'vogue_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function vogue_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	} ?>
	<nav class="navigation post-navigation" role="navigation">
		<span class="screen-reader-text"><?php _e( 'Post navigation', 'vogue' ); ?></span>
		<div class="nav-links">
			<?php
			$slider_categories 	= get_theme_mod( 'vogue-blog-cats' );
			$slider_type 		= get_theme_mod( 'vogue-slider-type', customizer_library_get_default( 'vogue-slider-type' ) );
			$exclude_categories = '';

			if ( $slider_type == 'vogue-slider-default' && $slider_categories ) {
				$exclude_categories = ( '-' == $slider_categories[0] ) ? substr( get_theme_mod( 'vogue-blog-cats' ), 1 ) : get_theme_mod( 'vogue-blog-cats' );;
			}

			previous_post_link( '<div class="nav-previous">%link</div>', _x( '%title', 'Previous post link', 'vogue' ), false, $exclude_categories );
			next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title', 'Next post link',     'vogue' ), false, $exclude_categories );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

/**
 * Exclude slider category from sidebar widgets
 */
function vogue_exclude_slider_categories_widget( $args ) {
	$exclude = ''; // ID's of the categories to exclude
	if ( get_theme_mod( 'vogue-blog-cats', false ) ) {
        $exclude = esc_attr( get_theme_mod( 'vogue-blog-cats' ) );
    }
	$args['exclude'] = $exclude;
	return $args;
}
add_filter( 'widget_categories_args', 'vogue_exclude_slider_categories_widget' );

/**
 * Adjust the Recent Posts widget query if vogue-blog-cats is set
 */
function vogue_filter_recent_posts_widget_parameters( $params ) {
	$slider_categories = get_theme_mod( 'vogue-blog-cats' );
    $slider_type 	   = get_theme_mod( 'vogue-slider-type', customizer_library_get_default( 'vogue-slider-type' ) );
	
	if ( $slider_categories && $slider_type == 'vogue-slider-default' ) {
		if ( count( $slider_categories ) > 0 ) {
			// do not alter the query on wp-admin pages and only alter it if it's the main query
			$params['category__not_in'] = $slider_categories;
		}
	}
	
	return $params;
}
add_filter( 'widget_posts_args', 'vogue_filter_recent_posts_widget_parameters' );

/**
 * Add classes to the blog list for styling.
 */
function vogue_add_blog_post_classes ( $classes ) {
	global $current_class;

	if ( is_home() || is_archive() || is_search() ) :
		$vogue_blog_layout = sanitize_html_class( 'blog-left-layout' );
		if ( get_theme_mod( 'vogue-blog-layout' ) ) {
		    $vogue_blog_layout = sanitize_html_class( get_theme_mod( 'vogue-blog-layout' ) );
		}
		$classes[] = $vogue_blog_layout;

		$classes[] = $current_class;
		$current_class = ( $current_class == 'blog-alt-odd' ) ? sanitize_html_class( 'blog-alt-even' ) : sanitize_html_class( 'blog-alt-odd' );
	endif;

	return $classes;
}
global $current_class;
$current_class = 'blog-alt-odd';
add_filter ( 'post_class' , 'vogue_add_blog_post_classes' );

/**
 * Add classes to the admin body class
 */
function vogue_add_admin_body_class( $admin_classes ) {
	global $pagenow;
	if ( $pagenow != 'widgets.php' )
		return $admin_classes;

	if ( get_theme_mod( 'vogue-footer-layout' ) ) {
		$admin_classes .= ' ' . sanitize_html_class( get_theme_mod( 'vogue-footer-layout' ) );
	} else {
		$admin_classes .= ' ' . sanitize_html_class( 'vogue-footer-layout-social' );
	}

	return $admin_classes;
}
add_filter( 'admin_body_class', 'vogue_add_admin_body_class' );

/**
 * Display recommended plugins with the TGM class
 */
function vogue_register_required_plugins() {
	$plugins = array(
		// The recommended WordPress.org plugins.
		array(
			'name'      => __( 'Elementor Page Builder', 'vogue' ),
			'slug'      => 'elementor',
			'required'  => false,
		),
		array(
			'name'      => __( 'WooCommerce', 'vogue' ),
			'slug'      => 'woocommerce',
			'required'  => false,
		),
		array(
			'name'      => __( 'StoreCustomizer', 'vogue' ),
			'slug'      => 'woocustomizer',
			'required'  => false,
		),
		array(
			'name'      => __( 'Blockons - Editor blocks', 'vogue' ),
			'slug'      => 'blockons',
			'required'  => false,
		),
		array(
			'name'      => __( 'Theme Site Kit - Toolkit', 'vogue' ),
			'slug'      => 'theme-site-kit',
			'required'  => false,
		),
	);
	$config = array(
		'id'           => 'vogue',
		'menu'         => 'tgmpa-install-plugins',
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'vogue_register_required_plugins' );

/**
 * Register a custom Post Categories ID column
 */
function vogue_edit_cat_columns( $vogue_cat_columns ) {
    $vogue_cat_in = array( 'cat_id' => 'Category ID <span class="cat_id_note">For the Default Slider</span>' );
    $vogue_cat_columns = vogue_cat_columns_array_push_after( $vogue_cat_columns, $vogue_cat_in, 0 );
    return $vogue_cat_columns;
}
add_filter( 'manage_edit-category_columns', 'vogue_edit_cat_columns' );

/**
 * Print the ID column
 */
function vogue_cat_custom_columns( $value, $name, $cat_id ) {
    if( 'cat_id' == $name )
        echo $cat_id;
}
add_filter( 'manage_category_custom_column', 'vogue_cat_custom_columns', 10, 3 );

/**
 * Insert an element at the beggining of the array
 */
function vogue_cat_columns_array_push_after( $src, $vogue_cat_in, $pos ) {
    if ( is_int( $pos ) ) {
        $R = array_merge( array_slice( $src, 0, $pos + 1 ), $vogue_cat_in, array_slice( $src, $pos + 1 ) );
    } else {
        foreach ( $src as $k => $v ) {
            $R[$k] = $v;
            if ( $k == $pos )
                $R = array_merge( $R, $vogue_cat_in );
        }
    }
    return $R;
}

/**
 * Dismissable Admin notice with Vogue setup/general help
 */
function vogue_add_license_notice() {
	global $pagenow;
	global $current_user;
	$vogue_user_id = $current_user->ID;
	$voguepage = isset( $_GET['page'] ) ? $pagenow . '?page=' . $_GET['page'] : $pagenow;

	if ( !get_user_meta( $vogue_user_id, 'vogue_admin_notice_ignore' ) ) : ?>
		<div class="notice notice-info vogue-admin-notice vogue-notice-add">
			<h3>
				<?php esc_html_e( 'Thank you for using Vogue! :)', 'vogue' ); ?>
			</h3>
			<p>
			<?php
			/* translators: 1: 'good products and 5 star support', 2: 'Please Read More Here', 3: 'Get In Contact'. */
			printf( esc_html__( 'We pride ourselves on %1$s... For more help on getting started or using the Vogue theme, %2$s or for theme support - %3$s', 'vogue' ), wp_kses( '<a href="' . esc_url( 'https://wordpress.org/support/theme/vogue/reviews/?filter=5' ) . '" target="_blank">' . __( 'good products and 5 star support', 'vogue' ) . '</a>', array( 'a' => array( 'href' => array(), 'target' => array() ) ) ), wp_kses( '<a href="' . admin_url( 'themes.php?page=theme_info' ) . '">' . __( 'Please Read More Here', 'vogue' ) . '</a>', array( 'a' => array( 'href' => array(), 'class' => array() ) ) ), wp_kses( '<a href="' . esc_url( 'https://kairaweb.com/contact/' ) . '" target="_blank">' . __( 'Get In Contact', 'vogue' ) . '</a>', array( 'a' => array( 'href' => array(), 'target' => array(), 'class' => array() ) ) ) ); ?>
			</p>
			<b>
			<?php
			/* translators: 1: 'Read More here'. */
			printf( esc_html__( '%1$s on the Shortcode slider included FREE with Vogue Premium!', 'vogue' ), wp_kses( '<a href="' . admin_url( 'themes.php?page=theme_info' ) . '">' . __( 'Read More here', 'vogue' ) . '</a>', array( 'a' => array( 'href' => array(), 'target' => array() ) ) ) ); ?>
			</b>
			<?php if ( $voguepage == 'themes.php?page=theme_info' ) : ?>
				<div class="vogue-admin-notice-blocks">
					<div class="vogue-admin-notice-block">
						<h5><?php esc_html_e( 'Help links to get you started', 'vogue' ); ?></h5>
						</p>
						<ul>
						<p>
							<?php esc_html_e( 'See our popular help links on using Vogue', 'vogue' ); ?>
							<li><a href="<?php echo esc_url( 'https://kairaweb.com/wordpress-theme/vogue/#premium-features' ) ?>" target="_blank"><?php esc_html_e( 'What does Vogue Premium offer', 'vogue' ); ?></a></li>
							<li><a href="<?php echo esc_url( 'https://kairaweb.com/documentation/setting-up-the-default-slider/' ) ?>" target="_blank"><?php esc_html_e( 'Setting up the Vogue slider', 'vogue' ); ?></a></li>
							<li><a href="<?php echo esc_url( 'https://kairaweb.com/documentation/vogue-child-theme/' ) ?>" target="_blank"><?php esc_html_e( 'Download a working Child Theme for Vogue', 'vogue' ); ?></a></li>
							<li><a href="<?php echo esc_url( 'https://kairaweb.com/documentation/adding-custom-css-to-wordpress/' ) ?>" target="_blank"><?php esc_html_e( 'Adding Custom CSS to Vogue', 'vogue' ); ?></a></li>
						</ul>
                    </div>
					<div class="vogue-admin-notice-block">
						<h5><?php esc_html_e( 'Start customizing your site:', 'vogue' ); ?></h5>
						<p>
							<?php esc_html_e( 'All Vogue Settings are built into the WordPress Customizer for easy, visual website editing.', 'vogue' ); ?>
						</p>
						<a href="<?php echo esc_url( admin_url( 'customize.php' ) ) ?>" class="vogue-admin-notice-btn">
							<?php esc_html_e( 'Start Customizing Vogue', 'vogue' ); ?>
						</a>
					</div>
					<div class="vogue-admin-notice-block vogue-nomargin">
						<h5><?php esc_html_e( 'Need Help with Vogue?', 'vogue' ); ?></h5>
						<p>
							<?php esc_html_e( 'Need help upgrading? Have a question about using the Vogue theme? We\'re here to help... Contact us.', 'vogue' ); ?>
						</p>
						<a href="<?php echo esc_url( 'https://kairaweb.com/contact/' ) ?>" class="vogue-admin-notice-btn" target="_blank">
							<?php esc_html_e( 'Get in contact', 'vogue' ); ?>
						</a>
                    </div>
                    <div class="vogue-admin-notice-block">
						<h5><?php esc_html_e( 'FREE Shortcode Slider included in Vogue Pro:', 'vogue' ); ?></h5>
						<p>
							<?php esc_html_e( 'We\'ve built a new shortcode slider which is now included FREE with Vogue Premium.', 'vogue' ); ?>
                        </p>
                        <p>
							<?php esc_html_e( 'Upgrade for only $25 to get Vogue Pro and your new shortcode slider which can create custom sliders and include them on any pages.', 'vogue' ); ?>
						</p>
						<a href="<?php echo esc_url( 'https://kaira.lemonsqueezy.com/checkout/buy/c4fc1ef7-3c89-4a5e-88d8-544123d56b4f' ) ?>" class="vogue-admin-notice-btn" style="background-color: #eafbe4;" target="_blank">
							<?php esc_html_e( 'Purchase Vogue Premium', 'vogue' ); ?>
						</a>
					</div>
				</div>
				<h5>
					<?php
					/* translators: %s: 'Recommended Resources' */
					printf( esc_html__( 'Vogue Premium is %1$s for all the extra %2$s', 'vogue' ), wp_kses( __( '<a href="https://kairaweb.com/wordpress-theme/vogue/#purchase-premium" target="_blank">currently selling for only $25</a>', 'vogue' ), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ), wp_kses( __( '<a href="https://kairaweb.com/wordpress-theme/vogue/#premium-features" target="_blank">Vogue Premium features</a>', 'vogue' ), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ) );
					?>
				</h5>
			<?php endif; ?>
			<a href="?vogue_add_license_notice_ignore=" class="vogue-notice-close"><?php esc_html_e( 'Dismiss Notice', 'vogue' ); ?></a>
		</div><?php
	endif;
}
add_action( 'admin_notices', 'vogue_add_license_notice' );
/**
 * Admin notice save dismiss to wp transient
 */
function vogue_add_license_notice_ignore() {
    global $current_user;
	$vogue_user_id = $current_user->ID;

    if ( isset( $_GET['vogue_add_license_notice_ignore'] ) ) {
		update_user_meta( $vogue_user_id, 'vogue_admin_notice_ignore', true );
    }
}
add_action( 'admin_init', 'vogue_add_license_notice_ignore' );

/**
 * Admin notice for Blockons
 */
function vogue_blockons_notice() {
	global $current_user;
	$vogue_user_id = $current_user->ID;

	if ( !get_user_meta( $vogue_user_id, 'vogue_plugins_dismiss' ) ) : ?>
		<div class="notice notice-info vogue-admin-notice vogue-notice-blockons">
			<div>
				<h4><?php esc_html_e( 'Try out our new Plugins, the only two you need to build your entire website with ease and flexibility!', 'vogue' ); ?></h4>
				<p><?php esc_html_e( 'We’ve just launched our powerful toolkit plugins — the only plugins you’ll need to build a complete website, packed with advanced blocks like contact forms, maps, sliders, image galleries, SVG uploads, maintenance mode, comment controls, and so much more!', 'vogue' ); ?></p>
				<a href="<?php echo esc_url(admin_url('/plugin-install.php?s=blockons&tab=search&type=term')); ?>"><?php esc_html_e( 'View the plugins', 'vogue' ); ?></a>
			</div>
			<a href="?vogue_plugins_notice_ignore=" class="vogue-notice-close"><?php esc_html_e( 'Dismiss Notice', 'vogue' ); ?></a>
		</div><?php
	endif;
}
add_action( 'admin_notices', 'vogue_blockons_notice' );
/**
 * Admin notice dismiss for Blockons
 */
function vogue_blockons_notice_ignore() {
    global $current_user;
	$vogue_user_id = $current_user->ID;

    if ( isset( $_GET['vogue_plugins_notice_ignore'] ) ) {
		update_user_meta( $vogue_user_id, 'vogue_plugins_dismiss', true );
    }
}
add_action( 'admin_init', 'vogue_blockons_notice_ignore' );
