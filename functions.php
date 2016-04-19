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

    // Remove various actions from head
    // http://cubiq.org/clean-up-and-optimize-wordpress-for-your-next-theme
    remove_action('wp_head', 'wp_generator');                           //
    remove_action('wp_head', 'wlwmanifest_link');                       //
    remove_action('wp_head', 'rsd_link');                               //
    remove_action('wp_head', 'wp_shortlink_wp_head');                   //
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);    //
    remove_action('wp_head', 'print_emoji_detection_script', 7 );       //
    remove_action('wp_print_styles', 'print_emoji_styles' );            //
    remove_action('wp_head', 'feed_links', 2 );                         // Remove auto-generated feed links. Added manually
    add_filter('the_generator', '__return_false');                      //

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
    
    // Let Wordpress manage doc title
	add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu().
	register_nav_menus( array( 'primary' => esc_html__( 'Primary', 'regnsky' )	) );

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

}
endif;
add_action( 'after_setup_theme', 'regnsky_setup' );


/**
 * Enqueue scripts and styles.
 */

// Function to add #asyncload to scripts in wp_enqueue_script
function regnsky_async_scripts($url)
{
    if ( strpos( $url, '#asyncload') === false )
        return $url;
    else if ( is_admin() )
        return str_replace( '#asyncload', '', $url );
    else
    return str_replace( '#asyncload', '', $url )."' async='async"; 
    }
add_filter( 'clean_url', 'regnsky_async_scripts', 11, 1 );

function regnsky_scripts() {
	
	// deregister default jQuery included with Wordpress
	wp_deregister_script( 'jquery' );
	$jquery_cdn = '//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js';
	wp_enqueue_script( 'jquery', $jquery_cdn, array(), null, true );

	wp_enqueue_script( 'regnsky-script', get_template_directory_uri() . '/js/main.js#asyncload', array(), null, true );

	wp_enqueue_style( 'regnsky-style', get_stylesheet_uri() );
	
}
add_action( 'wp_enqueue_scripts', 'regnsky_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


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

/**
 * Filter to replace the [caption] shortcode text with HTML5 compliant code
 *
 * @return text HTML content describing embedded figure
 *
 * From: http://wordpress.stackexchange.com/questions/107358/make-wordpress-image-captions-responsive
 **/
add_filter('img_caption_shortcode', 'regnsky_img_caption_shortcode_filter',10,3);
function regnsky_img_caption_shortcode_filter($val, $attr, $content = null) {
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
 * Denne rammer billeder, der allerede har et link omkring sig
 * http://wordpress.stackexchange.com/questions/174582/always-use-figure-for-post-images
 */    
function wrap_img_in_figure( $content ) { 
    $patternn = '/(<img[^>]*>|<img[^>]*class=\"([^>]*?)\"[^>]*>)/i';
    $pattern = '/(<img[^>]*>)/i'; // Umiddelbart behøves kun denne
    $replacement = '<figure><div class="img-border-wrapper"><div class="img-border">$1</div></div></figure>';
    $content = preg_replace($pattern, $replacement, $content);

    return $content;
} 
add_filter( 'the_content', 'wrap_img_in_figure', 99 );

/**
 * [1] Remove links around images
 * [2] Remove empty paragraphs containing same links. This was a problem on e.g. these posts: /category/opdagelser/page/109/
 */  
// function remove_link_around_img( $content ) { 
//     $pattern = '#<p>\s*(<a(.*?)(wp-att|wp-content\/uploads)[^>]*>)#';
//     $replacement = '';
//     $content = preg_replace($pattern, $replacement, $content);

//     return $content;
// } 
// add_filter( 'the_content', 'remove_link_around_img', 99 );

/**
 * Remove link around figure
 */
function remove_link_around_figure( $content ) {
    // Fx: http://localhost:3000/2015/07/paul-mccartney-charmerende-og-selvsikker-tur-ned-af-memory-lane/ 
    $pattern = '/<a[^>]*>s*(<figure[^>]*>)/i';
    $replacement = '$1';
    $content = preg_replace($pattern, $replacement, $content);

    return $content;
} 
add_filter( 'the_content', 'remove_link_around_figure', 99 );

function remove_empty_p_before_figure( $content ) {
    // Fx: http://localhost:3000/2016/01/tidlige-solopgange-som-dagens-godnat/
    // Der er stadig en tom paragraph EFTER figure 
    $pattern = '/<p[^>]*>s*(<figure[^>]*>)/i';
    $replacement = '$1';
    $content = preg_replace($pattern, $replacement, $content);

    return $content;
} 
add_filter( 'the_content', 'remove_empty_p_before_figure', 99 );

// Til at teste, hav disse fire indlæg åbne:
// http://localhost:3000/2015/07/paul-mccartney-charmerende-og-selvsikker-tur-ned-af-memory-lane/
// http://localhost:3000/2015/06/kort-tid-til-aabningen-mortens-fem-roskilde-anbefalinger/
// http://localhost:3000/2016/01/tidlige-solopgange-som-dagens-godnat/
// http://localhost:3000/2008/07/80er-funkdisco/


/**
 * Remove links around images
 * This function can maybe combined with the own before it
 * http://wordpress.stackexchange.com/questions/33724/remove-links-from-images-using-functions-php
 */  
// function attachment_image_link_remove_filter( $content ) {
//     $content =
//         preg_replace(
//             array('{<a(.*?)(wp-att|wp-content\/uploads)[^>]*><img}'),
//             array('<img','" />'),
//             $content
//         );
//     return $content;
// }
// add_filter( 'the_content', 'attachment_image_link_remove_filter' );


/**
 * Remove strong tags around images
 */  
function remove_strong( $content ) {
    $content =
        preg_replace(
            array('{<strong><img}',
                '{ wp-image-[0-9]*" /></strong>}'),
            array('<img','" />'),
            $content
        );
    return $content;
}
add_filter( 'the_content', 'remove_strong' );

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


/**
 * Make an excerpt function to control the character limit, when function is called: <?php echo get_excerpt(200); ?>
 */
function get_excerpt($count) {
    $permalink = get_permalink($post->ID);
    $excerpt = get_the_content();
    $excerpt = strip_tags($excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = mb_substr($excerpt, 0, $count,'UTF-8');
    $excerpt = $excerpt . '<span class="text-mute">&#8230; </span><a class="excerpt-read-more" href="' . $permalink . '">Læs indlæg</a>';
    return $excerpt;
}

/**
 * Disable Wordpress Embed plugin
 * https://wordpress.org/support/topic/how-to-disable-auto-wordpress-emmed-script
 */
function disable_embeds_init() {

    // Remove the REST API endpoint.
    remove_action('rest_api_init', 'wp_oembed_register_route');

    // Turn off oEmbed auto discovery.
    // Don't filter oEmbed results.
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);

    // Remove oEmbed discovery links.
    remove_action('wp_head', 'wp_oembed_add_discovery_links');

    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action('wp_head', 'wp_oembed_add_host_js');
}

add_action('init', 'disable_embeds_init', 9999);

/**
 * Exclude pages from search
 * http://www.wpbeginner.com/wp-tutorials/how-to-exclude-pages-from-wordpress-search-results/
 */
function SearchFilter($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }

    return $query;
}

add_filter('pre_get_posts','SearchFilter');


/**
 * Hide drafts from ACF Relationship field
 * https://support.advancedcustomfields.com/forums/topic/exclude-drafts-from-post-object-field/
 */

function relationship_options_filter($options, $field, $the_post) {
    
    $options['post_status'] = array('publish');
    
    return $options;
}

add_filter('acf/fields/relationship/query/name=related_posts', 'relationship_options_filter', 10, 3);
