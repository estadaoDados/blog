<?php
/**
 * Catch Box functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, catchbox_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We are providing our own filter for excerpt_length (or using the unfiltered value)
 *     remove_filter( 'excerpt_length', 'catchbox_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package Catch Themes
 * @subpackage Catch_Box
 * @since Catch Box 1.0
 */


/**
 * Tell WordPress to run catchbox_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'catchbox_setup' );

if ( ! function_exists( 'catchbox_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override catchbox_setup() in a child theme, add your own catchbox_setup to your child theme's
 * functions.php file.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To style the visual editor.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,custom headers and backgrounds.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Catch Box 1.0
 */
function catchbox_setup() {

	/**
	 * Global content width.
	 *
	 * Set the content width based on the theme's design and stylesheet.
	 * making it large as we have template without sidebar which is large
	 */
	if ( ! isset( $content_width ) )
	$content_width = 818;
	
	/* Catch Box is now available for translation.
	 * Add your files into /languages/ directory.
	 * @see http://codex.wordpress.org/Function_Reference/load_theme_textdomain
	 */
	load_theme_textdomain( 'catchbox', get_template_directory() . '/languages' );
	
	$locale = get_locale();
    $locale_file = get_template_directory().'/languages/$locale.php';
    if (is_readable( $locale_file))
		require_once( $locale_file);

	/**
     * Add callback for custom TinyMCE editor stylesheets. (editor-style.css)
     * @see http://codex.wordpress.org/Function_Reference/add_editor_style
     */
	add_editor_style();

	// Load up our theme options page and related code.
	require( get_template_directory() . '/inc/theme-options.php' );
	
	// Grab Catch Box's Adspace Widget.
	require( get_template_directory() . '/inc/widgets.php' );

	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

	/**
     * This feature enables custom-menus support for a theme.
     * @see http://codex.wordpress.org/Function_Reference/register_nav_menus
     */		
	register_nav_menus(array(
		'primary' 	=> __( 'Primary Menu', 'catchbox' ),
	   	'secondary'	=> __( 'Secondary Menu', 'catchbox' ),
		'footer'	=> __( 'Footer Menu', 'catchbox' )
	) );

	// Add support for custom backgrounds	
	// WordPress 3.4+
	if ( function_exists( 'get_custom_header') ) {
		add_theme_support( 'custom-background' );
	} else {
		// Backward Compatibility for WordPress Version 3.3
		add_custom_background();
	}

	/**
     * This feature enables post-thumbnail support for a theme.
     * @see http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
	add_theme_support( 'post-thumbnails' );

	// The next four constants set how Catch Boxsupports custom headers.

	// The default header text color
	define( 'HEADER_TEXTCOLOR', '000' );

	// By leaving empty, we allow for random image rotation.
	define( 'HEADER_IMAGE', '' );

	// The height and width of your custom header used for site logo.
	// Add a filter to catchbox_header_image_width and catchbox_header_image_height to change these values.
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'catchbox_header_image_width', 300 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'catchbox_header_image_height', 125 ) );

	// We'll be using post thumbnails for custom header images for logos.
	// We want them to be the size of the header image that we just defined
	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

	// Add Catch Box's custom image sizes
	add_image_size( 'featured-header', HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true ); // Used for logo (header) images
	
	//disable old image size for featued posts add_image_size( 'featured-slider', 560, 270, true );
	add_image_size( 'featured-slider', 644, 320, true ); // Used for featured posts if a large-feature doesn't exist


	// Add support for custom backgrounds	
	// WordPress 3.4+
	if ( function_exists( 'get_custom_header') ) {
		add_theme_support( 'custom-header', array( 
			// Header image random rotation default
			'random-default'			=> false,
			// Header image flex width
		 	'flex-width'             	=> true,
			// Header image flex height
			'flex-height'            => true,
			// Template header style callback
			'wp-head-callback'			=> 'catchbox_header_style',
			// Admin header style callback
			'admin-head-callback'		=> 'catchbox_admin_header_style',
			// Admin preview style callback
			'admin-preview-callback'	=> 'catchbox_admin_header_image'
		) );
	} else {
		// Backward Compatibility for WordPress Version 3.3

		// Add a way for the custom header to be styled in the admin panel that controls
		// custom headers. See catchbox_admin_header_style(), below.
		
		add_custom_image_header( 'catchbox_header_style', 'catchbox_admin_header_style', 'catchbox_admin_header_image' );
	}

	// ... and thus ends the changeable header business.

	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
	register_default_headers( array(
		'wheel' => array(
			'url' => '%s/images/headers/garden.jpg',
			'thumbnail_url' => '%s/images/headers/garden-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Garden', 'catchbox' )
		),
		'shore' => array(
			'url' => '%s/images/headers/flower.jpg',
			'thumbnail_url' => '%s/images/headers/flower-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Flower', 'catchbox' )
		),
		'trolley' => array(
			'url' => '%s/images/headers/mountain.jpg',
			'thumbnail_url' => '%s/images/headers/mountain-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Mountain', 'catchbox' )
		),
	) );
}
endif; // catchbox_setup

if ( ! function_exists( 'catchbox_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @since Catch Box 1.0
 */
function catchbox_header_style() {

	$text_color = get_header_textcolor();
	
	// If no custom options for text are set, let's bail.
	if ( $text_color == HEADER_TEXTCOLOR )
		return;

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $text_color ) :
	?>
		#site-title,
		#site-description {
			position: absolute !important;
			clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php 
	
		// If the user has set a custom color for the text use that
		else :
	?>
		#site-title a,
		#site-description {
			color: #<?php echo get_header_textcolor(); ?> !important;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // catchbox_header_style

if ( ! function_exists( 'catchbox_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @since Catch Box 1.0
 */
function catchbox_admin_header_style() {
?>
	<style type="text/css">
	.appearance_page_custom-header #headimg {
		border: none;
	}
	#headimg h1,
	#desc {
		font-family: "Helvetica Neue", Arial, Helvetica, "Nimbus Sans L", sans-serif;
	}
	#headimg h1 {
		margin: 0;
	}
	#headimg h1 a {
		font-size: 32px;
		line-height: 36px;
		text-decoration: none;
	}
	#desc {
		font-size: 14px;
		line-height: 23px;
		padding: 0 0 3em;
	}
	<?php
		// If the user has set a custom color for the text use that
		if ( get_header_textcolor() != HEADER_TEXTCOLOR ) :
	?>
		#site-title a,
		#site-description {
			color: #<?php echo get_header_textcolor(); ?>;
		}
	<?php endif; ?>

	#headimg img {
		height: auto;
		max-width: 100%;
	}
	</style>
<?php
}
endif; // catchbox_admin_header_style

if ( ! function_exists( 'catchbox_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @since Catch Box 1.0
 */
function catchbox_admin_header_image() { ?>
	<div id="headimg">
		<?php
		$color = get_header_textcolor();
		$image = get_header_image();
		if ( $color && $color != 'blank' )
			$style = ' style="color:#' . $color . '"';
		else
			$style = ' style="display:none"';
		?>
		
		<h1><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
		<?php if ( $image ) : ?>
			<img src="<?php echo esc_url( $image ); ?>" alt="" />
		<?php endif; ?>
	</div>
<?php }
endif; // catchbox_admin_header_image


/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function catchbox_filter_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'catchbox' ), max( $paged, $page ) );

	return $title;	

}
add_filter( 'wp_title', 'catchbox_filter_wp_title', 10, 2 );


/**
 * Sets the post excerpt length.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 */
function catchbox_excerpt_length( $length ) {
	$options = catchbox_get_theme_options();
	if( empty( $options['excerpt_length'] ) )
		$options = catchbox_get_default_theme_options();
		
	$length = $options['excerpt_length'];
	return $length;
}
add_filter( 'excerpt_length', 'catchbox_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 */
function catchbox_continue_reading_link() {
	return ' <a class="more-link" href="'. esc_url( get_permalink() ) . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'catchbox' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and catchbox_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 */
function catchbox_auto_excerpt_more( $more ) {
	return catchbox_continue_reading_link();
}
add_filter( 'excerpt_more', 'catchbox_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 */
function catchbox_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= catchbox_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'catchbox_custom_excerpt_more' );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function catchbox_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'catchbox_page_menu_args' );

/**
 * Register our sidebars and widgetized areas. Also register the default Epherma widget.
 *
 * @since Catch Box 1.0
 */
function catchbox_widgets_init() {
	
	register_widget( 'catchbox_adwidget' );

	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'catchbox' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area One', 'catchbox' ),
		'id' => 'sidebar-2',
		'description' => __( 'An optional widget area for your site footer', 'catchbox' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area Two', 'catchbox' ),
		'id' => 'sidebar-3',
		'description' => __( 'An optional widget area for your site footer', 'catchbox' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area Three', 'catchbox' ),
		'id' => 'sidebar-4',
		'description' => __( 'An optional widget area for your site footer', 'catchbox' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'catchbox_widgets_init' );

if ( ! function_exists( 'catchbox_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function catchbox_content_nav( $nav_id ) {
	global $wp_query;
		
	if ( $wp_query->max_num_pages > 1 ) { ?>
		<nav id="<?php echo $nav_id; ?>">
        	<h3 class="assistive-text"><?php _e( 'Post navigation', 'catchbox' ); ?></h3>
			<?php if ( function_exists('wp_pagenavi' ) )  { 
                wp_pagenavi();
            }
            elseif ( function_exists('wp_page_numbers' ) ) { 
                wp_page_numbers();
            }
            else { ?>	
            	<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'catchbox' ) ); ?></div>
                <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'catchbox' ) ); ?></div>
            <?php 
            } ?>
		</nav><!-- #nav -->
	<?php 
	}
}
endif; // catchbox_content_nav

/**
 * Return the URL for the first link found in the post content.
 *
 * @since Catch Box 1.0
 * @return string|bool URL or false when no link is present.
 */
function catchbox_url_grabber() {
	if ( ! preg_match( '/<a\s[^>]*?href=[\'"](.+?)[\'"]/is', get_the_content(), $matches ) )
		return false;

	return esc_url_raw( $matches[1] );
}

/**
 * Count the number of footer sidebars to enable dynamic classes for the footer
 */
function catchbox_footer_sidebar_class() {
	$count = 0;

	if ( is_active_sidebar( 'sidebar-2' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-3' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-4' ) )
		$count++;

	$class = '';

	switch ( $count ) {
		case '1':
			$class = 'one';
			break;
		case '2':
			$class = 'two';
			break;
		case '3':
			$class = 'three';
			break;
	}

	if ( $class )
		echo 'class="' . $class . '"';
}

if ( ! function_exists( 'catchbox_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own catchbox_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Catch Box 1.0
 */
function catchbox_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'catchbox' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'catchbox' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 68;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 39;

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s on %2$s <span class="says">said:</span>', 'catchbox' ),
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'catchbox' ), get_comment_date(), get_comment_time() )
							)
						);
					?>

					<?php edit_comment_link( __( 'Edit', 'catchbox' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'catchbox' ); ?></em>
					<br />
				<?php endif; ?>

			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'catchbox' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for catchbox_comment()


if ( ! function_exists( 'catchbox_posted_on' ) ) : 
/**
 * Prints HTML with meta information for the current post-date/time and author.
 * Create your own catchbox_posted_on to override in a child theme
 *
 * @since Catch Box 1.0
 */
function catchbox_posted_on() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date updated" datetime="%3$s" pubdate>%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'catchbox' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'catchbox' ), get_the_author() ) ),
		get_the_author()
	);
}
endif;


/**
 * Adds two classes to the array of body classes.
 * The first is if the site has only had one author with published posts.
 * The second is if a singular post being displayed
 *
 * @since Catch Box 1.0
 */
function catchbox_body_classes( $classes ) {
	$options = catchbox_get_theme_options();
	$layout = $options['theme_layout'];
	if ( function_exists( 'is_multi_author' ) && !is_multi_author() ) {
		$classes[] = 'single-author';
	}
	if ( $layout == 'content-sidebar' && !is_page_template( 'page-disable-sidebar.php' ) && !is_page_template( 'page-fullwidth.php' )  && !is_page_template( 'page-onecolumn.php' ) ) {
		$classes[] = 'content-sidebar';
	}
	elseif ( $layout == 'sidebar-content' && !is_page_template( 'page-disable-sidebar.php' ) && !is_page_template( 'page-fullwidth.php' )  && !is_page_template( 'page-onecolumn.php' ) ) {
		$classes[] = 'sidebar-content';
	}
	elseif ( $layout == 'content-onecolumn' || is_page_template( 'page-onecolumn.php' ) && !is_page_template( 'page-disable-sidebar.php' ) && !is_page_template( 'page-fullwidth.php' ) ) {
		$classes[] = 'content-onecolumn';
	}	
	elseif ( is_page_template( 'page-disable-sidebar.php' ) || is_attachment() ) {
		$classes[] = 'singular';
	}
	elseif ( is_page_template( 'page-fullwidth.php' ) || is_attachment() ) {
		$classes[] = 'fullwidth';	
	}	
	return $classes;
}
add_filter( 'body_class', 'catchbox_body_classes' );


/**
 * Adds in post ID when viewing lists of posts 
 * This will help the admin to add the post ID in featured slider
 * 
 * @param mixed $post_columns
 * @return post columns
 */
function catchbox_post_id_column( $post_columns ) {
	$beginning = array_slice( $post_columns, 0 ,1 );
	$beginning[ 'postid' ] = __( 'ID', 'catchbox'  );
	$ending = array_slice( $post_columns, 1 );
	$post_columns = array_merge( $beginning, $ending );
	return $post_columns;
}
add_filter( 'manage_posts_columns', 'catchbox_post_id_column' );

function catchbox_posts_id_column( $col, $val ) {
	if( $col == 'postid' ) echo $val;
}
add_action( 'manage_posts_custom_column', 'catchbox_posts_id_column', 10, 2 );

function catchbox_posts_id_column_css() {
	echo '<style type="text/css">#postid { width: 50px; }</style>';
}
add_action( 'admin_head-edit.php', 'catchbox_posts_id_column_css' );

/**
 * Allows post queries to sort the results by the order specified in the <em>post__in</em> parameter. Just set the <em>orderby</em> parameter to <em>post__in</em>! 
 * uses filter posts_orderby
 */
if ( !function_exists('catchbox_sort_query_by_post_in') ) : 

	add_filter('posts_orderby', 'catchbox_sort_query_by_post_in', 10, 2);
	
	function catchbox_sort_query_by_post_in($sortby, $thequery) {
		if ( isset($thequery->query['post__in']) && !empty($thequery->query['post__in']) && isset($thequery->query['orderby']) && $thequery->query['orderby'] == 'post__in' )
			$sortby = "find_in_set(ID, '" . implode( ',', $thequery->query['post__in'] ) . "')";
		return $sortby;
	}

endif;


/**
 * Function to pass the variables for php to js file.
 * This funcition passes the slider effect variables.
 */

function catchbox_pass_slider_value() {
	$options = get_option( 'catchbox_options_slider' );
	if( !isset( $options[ 'transition_effect' ] ) ) {
		$options[ 'transition_effect' ] = "fade";
	}
	if( !isset( $options[ 'transition_delay' ] ) ) {
		$options[ 'transition_delay' ] = 4;
	}
	if( !isset( $options[ 'transition_duration' ] ) ) {
		$options[ 'transition_duration' ] = 1;
	}
	$transition_effect = $options[ 'transition_effect' ];
	$transition_delay = $options[ 'transition_delay' ] * 1000;
	$transition_duration = $options[ 'transition_duration' ] * 1000;
	wp_localize_script( 
		'catchbox_slider',
		'js_value',
		array(
			'transition_effect' => $transition_effect,
			'transition_delay' => $transition_delay,
			'transition_duration' => $transition_duration
		)
	);
}//catchbox_pass_slider_value

/**
 * This function to display featured posts on index.php
 *
 * @get the data value from theme options
 * @displays on the index
 *
 * @useage Featured Image, Title and Content of Post
 *
 * @uses set_transient and delete_transient
 */
function catchbox_sliders() {	
	global $post;
	
	//delete_transient( 'catchbox_sliders' );
		
	// get data value from catchbox_options_slider through theme options
	$options = get_option( 'catchbox_options_slider' );
	// get slider_qty from theme options
	$postperpage = $options[ 'slider_qty' ];
		
	if( ( !$catchbox_sliders = get_transient( 'catchbox_sliders' ) ) && !empty( $options[ 'featured_slider' ] ) ) {
		echo '<!-- refreshing cache -->';
	
		$catchbox_sliders = '
		<div id="slider">
			<section id="slider-wrap">';
			$get_featured_posts = new WP_Query( array(
				'posts_per_page' => $postperpage,
				'post__in'		 => $options[ 'featured_slider' ],
				'orderby' 		 => 'post__in',
				'ignore_sticky_posts' => 1 // ignore sticky posts
			));
				
			$i=0; while ( $get_featured_posts->have_posts()) : $get_featured_posts->the_post(); $i++;
				$title_attribute = esc_attr( apply_filters( 'the_title', get_the_title( $post->ID ) ) );
				
				if ( $i == 1 ) { $classes = "slides displayblock"; } else { $classes = "slides displaynone"; }
				$catchbox_sliders .= '
				<div class="'.$classes.'">
					<a href="'.get_permalink().'" title="'.sprintf( esc_attr__( 'Permalink to %s', 'catchbox' ), the_title_attribute( 'echo=0' ) ).'" rel="bookmark">
							'.get_the_post_thumbnail( $post->ID, 'featured-slider', array( 'title' => $title_attribute, 'alt' => $title_attribute, 'class'	=> 'pngfix' ) ).'
					</a>
					<div class="featured-text">'
						.the_title( '<span>','</span>', false ).' :
						'.get_the_excerpt().'
					</div><!-- .featured-text -->
				</div> <!-- .slides -->';
			endwhile; wp_reset_query();
		$catchbox_sliders .= '
			</section> <!-- .slider-wrap -->
			<nav id="nav-slider">
				<div class="nav-previous"><img class="pngfix" src="'.get_template_directory_uri().'/images/previous.png" alt="next slide"></div>
				<div class="nav-next"><img class="pngfix" src="'.get_template_directory_uri().'/images/next.png" alt="next slide"></div>
			</nav>
		</div> <!-- #featured-slider -->';
		set_transient( 'catchbox_sliders', $catchbox_sliders, 86940 );
	}
	echo $catchbox_sliders;	
} // catchbox_sliders		

/**
 * Register jquery scripts
 *
 * @register jquery cycle and custom-script
 * hooks action wp_enqueue_scripts
 */
function catchbox_scripts_method() {	
	//Register JQuery circle all and JQuery set up as dependent on Jquery-cycle
	wp_register_script( 'jquery-cycle', get_template_directory_uri() . '/js/jquery.cycle.all.min.js', array( 'jquery' ), '2.9999.5', true );
	
	//Enqueue Slider Script only in Front Page
	if(is_home() || is_front_page()) {
		wp_enqueue_script( 'catchbox_slider', get_template_directory_uri() . '/js/catchbox_slider.js', array( 'jquery-cycle' ), '1.0', true );
	}
	
	wp_enqueue_script('catchbox-menu', get_template_directory_uri() . '/js/catchbox-menu.min.js', array('jquery'), '1.1.0', true);

	//Browser Specific Enqueue Script i.e. for IE 1-6
	$catchbox_ua = strtolower($_SERVER['HTTP_USER_AGENT']);
	if(preg_match('/(?i)msie [1-6]/',$catchbox_ua)) {
		wp_enqueue_script( 'catchbox-pngfix', get_template_directory_uri() . '/js/pngfix.min.js' );	  
	}
	//browser specific queuing i.e. for IE 1-8
	if(preg_match('/(?i)msie [1-8]/',$catchbox_ua)) {
	 	wp_enqueue_script( 'catchbox-html5', get_template_directory_uri() . '/js/html5.js' );
	}
	
} // catchbox_scripts_method
add_action( 'wp_enqueue_scripts', 'catchbox_scripts_method' );


/**
 * Enqueue Comment Reply Script
 *
 * @used wp_enqueue_script
 * hooks action comment_form_before
 */
function catchbox_enqueue_comment_reply_script() {
	if ( comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'comment_form_before', 'catchbox_enqueue_comment_reply_script' );


/**
 * Alter the query for the main loop in home page
 * @uses pre_get_posts hook
 */
function catchbox_alter_home( $query ) {
	$options = get_option( 'catchbox_options_slider' );
	if( !isset( $options[ 'exclude_slider_post' ] ) ) {
 		$options[ 'exclude_slider_post' ] = "0";
 	}
    if ( $options[ 'exclude_slider_post'] != "0" && !empty( $options[ 'featured_slider' ] ) ) {
		if( $query->is_main_query() && $query->is_home() ) {
			$query->query_vars['post__not_in'] = $options[ 'featured_slider' ];

		}
	}
}
add_action( 'pre_get_posts','catchbox_alter_home' );


/**
 * Remove div from wp_page_menu() and replace with ul.
 * @uses wp_page_menu filter
 */
function catchbox_wp_page_menu( $page_markup ) {
    preg_match('/^<div class=\"([a-z0-9-_]+)\">/i', $page_markup, $matches);
        $divclass = $matches[1];
        $replace = array('<div class="'.$divclass.'">', '</div>');
        $new_markup = str_replace($replace, '', $page_markup);
        $new_markup = preg_replace('/^<ul>/i', '<ul class="'.$divclass.'">', $new_markup);
        return $new_markup; }

add_filter( 'wp_page_menu', 'catchbox_wp_page_menu' );


/**
 * Altering Comment Form Fields
 * @uses comment_form_default_fields filter
 */
function catchbox_comment_form_fields( $fields ) {
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
    $fields['author'] = '<p class="comment-form-author"><label for="author">' . __( 'Name' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
        '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>';
    $fields['email'] = '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
        '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>'; 
    return $fields;
}
add_filter( 'comment_form_default_fields', 'catchbox_comment_form_fields' );