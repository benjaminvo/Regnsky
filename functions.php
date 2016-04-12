<?php
/**
 * regnsky functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package regnsky
 */

if ( ! function_exists( 'regnsky_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function regnsky_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on regnsky, use a find and replace
	 * to change 'regnsky' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'regnsky', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu().
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'regnsky' ),
		'menu-pages' => esc_html__( 'Menu - Pages', 'regnsky' ),
		'menu-categories' => esc_html__( 'Menu - Categories', 'regnsky' ),
	) );

	// Add "Home" as a page in the menu generator
	function home_page_menu_args( $args ) {
		$args['show_home'] = true;
		return $args;
		}
	add_filter( 'wp_page_menu_args', 'home_page_menu_args' );

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
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'regnsky_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // regnsky_setup
add_action( 'after_setup_theme', 'regnsky_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function regnsky_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'regnsky_content_width', 640 );
}
add_action( 'after_setup_theme', 'regnsky_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function regnsky_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'regnsky' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'regnsky_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function regnsky_scripts() {
	
	// deregister default jQuery included with Wordpress
	wp_deregister_script( 'jquery' );
	$jquery_cdn = '//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js';
	wp_enqueue_script( 'jquery', $jquery_cdn, array(), '20130115', true );

	wp_enqueue_script( 'regnsky-script', get_template_directory_uri() . '/js/main.js', array(), '20160401', true );

	wp_enqueue_style( 'regnsky-style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'regnsky-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', false );

	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }
}
add_action( 'wp_enqueue_scripts', 'regnsky_scripts' );

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
 * Excerpt
 */

/* Indsæt "Read more" link */
function new_excerpt_more( $more ) {
	return '<span class="read-more h5 text-mute"> [...] ' . '<a class="read-more-link" href="' . get_permalink( get_the_ID() ) . '">' . __( 'Læs mere', 'your-text-domain' ) . '</a></span>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

/**
 * Add category class to body
 */
add_filter('body_class','add_category_to_single');
function add_category_to_single($classes, $class) {
	if (is_single() ) {
		global $post;
		foreach((get_the_category($post->ID)) as $category) {
			// add category slug to the $classes array
			$classes[] = 'category-' . $category->category_nicename;
		}
	}
	// return the $classes array
	return $classes;
}

add_filter('img_caption_shortcode', 'my_img_caption_shortcode_filter',10,3);

/**
 * Filter to replace the [caption] shortcode text with HTML5 compliant code
 *
 * @return text HTML content describing embedded figure
 *
 * From: http://wordpress.stackexchange.com/questions/107358/make-wordpress-image-captions-responsive
 **/
function my_img_caption_shortcode_filter($val, $attr, $content = null)
{
    extract(shortcode_atts(array(
        'id'    => '',
        'align' => '',
        'width' => '',
        'caption' => ''
    ), $attr));

    if ( 1 > (int) $width || empty($caption) )
        return $val;

    $capid = '';
    if ( $id ) {
        $id = esc_attr($id);
        $capid = 'id="figcaption_'. $id . '" ';
        $id = 'id="' . $id . '" aria-labelledby="figcaption_' . $id . '" ';
    }

    return '<figure ' . $id . 'class="wp-caption ' . esc_attr($align) . '" >'
    . do_shortcode( $content ) . '<figcaption ' . $capid 
    . 'class="wp-caption-text">' . $caption . '</figcaption></figure>';
}

/**
 * Wrap images in figure tags
 * http://wordpress.stackexchange.com/questions/174582/always-use-figure-for-post-images
 */    
function fb_unautop_4_img( $content )
{ 
    $content = preg_replace( 
        '/<p>\\s*?(<a rel=\"attachment.*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', 
        '<figure>$1</figure>', 
        $content 
    ); 
    return $content; 
} 
add_filter( 'the_content', 'fb_unautop_4_img', 99 );

/**
 * Remove empty lines from posts
 * http://wordpress.stackexchange.com/questions/137738/remove-empty-lines-nbsp-when-author-updates-their-post
 */
function remove_empty_lines( $content ){
  $content = preg_replace("/&nbsp;/", "", $content);

  return $content;
}
add_action('content_save_pre', 'remove_empty_lines');

/**
 * Custom comment display
 * https://codex.wordpress.org/Function_Reference/wp_list_comments#Comments_Only_With_A_Custom_Comment_Display
 */
function regnsky_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
	<div class="comment-meta">
	    <div class="comment-author vcard">
	        <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
	        <?php printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ); ?>
	    </div>
	    <?php if ( $comment->comment_approved == '0' ) : ?>
	         <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
	          <br />
	    <?php endif; ?>

	    <div class="comment-metadata"><span>
	        <?php
	        printf( __('%1$s'), get_comment_date() ); ?><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
	        ?>
	        </span>
	    </div>
	</div>

    <?php comment_text(); ?>

    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
<?php
}


/**
 * Remove "Category: " from category pages
 * http://wordpress.stackexchange.com/questions/179585/remove-category-tag-author-from-the-archive-title
 */
add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {
        $title = single_cat_title( '', false );
    }

    return $title;
});
