<?php 
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' ); 
set_post_thumbnail_size( 220, 100, true );
add_editor_style('editor-style.css');

define( 'HEADER_TEXTCOLOR', '' );


define( 'NO_HEADER_TEXT', true );
  

if ( pureline_is_wp_version( '3.4' ) ) {  
	      add_theme_support( 'custom-header' ); 
 	} else { 
        add_custom_image_header( '', 'pureline_admin_header_style' ); } 
  
function pureline_admin_header_style() {}
  
define( 'HEADER_IMAGE_WIDTH', apply_filters( 'pureline_header_image_width', 990 ) );
define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'pureline_header_image_height', 170 ) );

// checks is WP is at least a certain version (makes sure it has sufficient comparison decimals 
	function pureline_is_wp_version( $is_ver ) {  
 		$wp_ver = explode( '.', get_bloginfo( 'version' ) ); 
 		$is_ver = explode( '.', $is_ver ); 
 		for( $i = 0; $i; )  if ( !isset( $wp_ver[$i] ) ) array_push( $wp_ver, 0 );  
 		  
	foreach( $is_ver as $i => $is_val ) 
 	if( $wp_ver[$i] < $is_val ) return false; 
 	return true;   
 		} 

$purelineoptions = get_option('pureline');

$pureline_layout = pureline_get_option('pureline_layout','2cl');
$pureline_width_layout = pureline_get_option('pureline_width_layout','fixed');


if ( ($pureline_layout == "2cl" || $pureline_layout == "2cr" ) && $pureline_width_layout == "fixed") { 
if ( ! isset( $content_width ) )
	$content_width = 620;
}
if ( ( ($pureline_layout == "3cl" || $pureline_layout == "3cr" ) && $pureline_width_layout == "fixed") ||
( ($pureline_layout == "3cm" ) && $pureline_width_layout == "fixed")
) {
if ( ! isset( $content_width ) )
	$content_width = 506;
}
if ( $pureline_width_layout == "fixed" && $pureline_layout == "1c" ) {
if ( ! isset( $content_width ) )
	$content_width = 960;
}
if ( $pureline_width_layout == "fluid" ) {
if ( ! isset( $content_width ) )
	$content_width = 700;
}
else {
if ( ! isset( $content_width ) )
	$content_width = 620;
}

	load_theme_textdomain( 'pure-line', get_template_directory() . '/languages' );
	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file ); 
    
    
/**
 * Functions - pureline gatekeeper
 *
 * This file defines a few constants variables, loads up the core pureline file, 
 * and finally initialises the main WP pureline Class.
 *
 * @package pureline
 * @subpackage Functions
 */

define( 'WP_pureline', '0.2.4' ); // Defines current version for WP pureline
	
	/* Blast you red baron! Initialise WP pureline */
	require_once( get_template_directory() . '/library/pureline.php' );
	WPpureline::pureline_init();



/* pureline_truncate */

function pureline_truncate ($str, $length=10, $trailing='..')
{
 $length-=mb_strlen($trailing);
 if (mb_strlen($str)> $length)
	  {
 return mb_substr($str,0,$length).$trailing;
  }
 else
  {
 $res = $str;
  }
 return $res;
} 


/* Get first image */

function pureline_get_first_image() {
 global $post, $posts;
 $first_img = '';
 $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
 if(isset($matches[1][0])){
 $first_img = $matches [1][0];
 return $first_img;
 }  
}  

 
/* Custom Menu */   
  
add_action( 'after_setup_theme', 'pureline_register_my_menu' );

function pureline_register_my_menu() {
	register_nav_menu( 'primary-menu', __( 'Primary Menu', 'pure-line' ) );
}    



// Tiny URL

function pureline_tinyurl($url) {
    $response = esc_url(wp_remote_retrieve_body(wp_remote_get('http://tinyurl.com/api-create.php?url='.$url)));
    return $response;
}


// Similar Posts 

function pureline_similar_posts() {

$post = '';
$orig_post = $post;
global $post;

$pureline_options = get_option('pureline'); if ($pureline_options['pureline_similar_posts'] == "category") { 
$matchby = get_the_category($post->ID);
$matchin = 'category';
} else {
$matchby = wp_get_post_tags($post->ID);
$matchin = 'tag'; }


if ($matchby) {
	$matchby_ids = array();
	foreach($matchby as $individual_matchby) $matchby_ids[] = $individual_matchby->term_id;

	$args=array(
		$matchin.'__in' => $matchby_ids,
		'post__not_in' => array($post->ID),
		'showposts'=>5, // Number of related posts that will be shown.
		'ignore_sticky_posts'=>1
	);  

	$my_query = new wp_query($args);
	if( $my_query->have_posts() ) {
_e( '<div class="similar-posts"><h5>Similar posts</h5><ul>', 'pure-line' );
		while ($my_query->have_posts()) {
			$my_query->the_post();
		?>
			<li>
      
     <a class="similar-title" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
<?php

if ( get_the_title() ){ $title = the_title('', '', false);
echo pureline_truncate($title, 40, '...'); } else { echo __('Untitled', 'pure-line' ); }


 ?></a>


      
      </li>
		<?php
		}
		echo '</ul></div>';
	}
}
$post = $orig_post;
wp_reset_query();   

}


function pureline_footer_hooks() { ?>

 <script type="text/javascript" charset="utf-8">      
      var $zoom = jQuery.noConflict();
    $zoom(function() {
// OPACITY OF BUTTON SET TO 0%
$zoom(".roll").css("opacity","0");

// ON MOUSE OVER
$zoom(".roll").hover(function () {

// SET OPACITY TO 70%
$zoom(this).stop().animate({
opacity: 1
}, "fast");
},

// ON MOUSE OUT
function () {

// SET OPACITY BACK TO 50%
$zoom(this).stop().animate({
opacity: 0
}, "fast");
});
});
      $zoom ('.post-thumbnail').append('<span class="roll"></span>');
</script>


<script type="text/javascript" charset="utf-8">
var $jx = jQuery.noConflict();
  $jx("div.post").mouseover(function() {
    $jx(this).find("span.edit-post").css('visibility', 'visible');
  }).mouseout(function(){
    $jx(this).find("span.edit-post").css('visibility', 'hidden');
  });
  
    $jx("div.type-page").mouseover(function() {
    $jx(this).find("span.edit-page").css('visibility', 'visible');
  }).mouseout(function(){
    $jx(this).find("span.edit-page").css('visibility', 'hidden');
  });
  
      $jx("div.type-attachment").mouseover(function() {
    $jx(this).find("span.edit-post").css('visibility', 'visible');
  }).mouseout(function(){
    $jx(this).find("span.edit-post").css('visibility', 'hidden');
  });
  
  $jx("li.comment").mouseover(function() {
    $jx(this).find("span.edit-comment").css('visibility', 'visible');
  }).mouseout(function(){
    $jx(this).find("span.edit-comment").css('visibility', 'hidden');
  });
</script> 

<script type="text/javascript" charset="utf-8">
var $j = jQuery.noConflict();
  $j(document).ready(function(){  
    $j('.tipsytext').tipsy({gravity:'n',fade:true,offset:5,opacity:1});
   });
   </script> 

<?php echo pureline_copy(); }
	

/* Redirect after activation */

if ( is_admin() && isset($_GET['activated'] ) && $pagenow ==	"themes.php" )
	wp_redirect( 'themes.php?page=theme_options' );

$pureline_custom_background = pureline_get_option('pureline_custom_background','0');

if ($pureline_custom_background == "1") { 

// This theme allows users to set a custom background
add_theme_support('custom-background');

}  

function pureline_filter_wp_title( $title ) {
    
    global $page, $paged;
    
    // Get the Site Name
    $site_name = get_bloginfo( 'name' );
    // Prepend name
    $filtered_title = $site_name . $title;
    // Get the Site Description
        $site_description = get_bloginfo( 'description' );
    // If site front page, append description
    if ( $site_description && ( is_home() || is_front_page() ) ) {
        // Append Site Description to title
        $filtered_title .= ' - ' .$site_description;
        
    }
    if ( $paged >= 2 || $page >= 2 ) {
        $filtered_title .= ' - ' . sprintf( __( 'Page %s', 'pure-line' ), max( $paged, $page ) );
        }
    // Return the modified title
    return $filtered_title;
}
// Hook into 'wp_title'
add_filter( 'wp_title', 'pureline_filter_wp_title' );


function pureline_enqueue_comment_reply() {
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
                wp_enqueue_script( 'comment-reply' ); 
        }
    }
    add_action( 'wp_enqueue_scripts', 'pureline_enqueue_comment_reply' );


 // Share This Buttons

function pureline_sharethis() { ?>
    <div class="share-this tipsytext" original-title="<?php echo __('Share This','pure-line');?>">
          <img class="share-img" src="<?php echo get_template_directory_uri(); ?>/library/media/images/share.png" width="14" height="20" />
          <a rel="nofollow" target="_blank" class="share-twitter" href="http://twitter.com/intent/tweet?status=<?php the_title_attribute(); ?>+&raquo;+<?php echo esc_url(pureline_tinyurl(get_permalink())); ?>">Twitter</a>
          &bull; <a rel="nofollow" target="_blank" class="share-facebook" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title_attribute(); ?>">Facebook</a>
          &bull; <a rel="nofollow" target="_blank" class="share-delicious" href="http://del.icio.us/post?url=<?php the_permalink(); ?>&amp;title=<?php the_title_attribute(); ?>">Delicious</a>
          &bull; <a rel="nofollow" target="_blank" class="share-stumble" href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title_attribute(); ?>">StumbleUpon</a>
          &bull; <a rel="nofollow" target="_blank" class="share-email" href="http://www.addtoany.com/email?linkurl=<?php the_permalink(); ?>&linkname=<?php the_title_attribute(); ?>"><?php _e( 'E-mail', 'pure-line' ); ?></a>
          <a rel="nofollow" class="tipsytext more-options" title="<?php _e( 'More options', 'pure-line' ); ?>" target="_blank" href="http://www.addtoany.com/share_save#url=<?php the_permalink(); ?>&linkname=<?php the_title_attribute(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/library/media/images/share-more.png" /></a>
          </div>
<?php } 

function t4p_more_themes() { ?>
        <div class="wrap">
        <h2>Theme4Press Themes</h2>
  <?php include_once(ABSPATH . WPINC . '/feed.php' );
	        $rss = fetch_feed( 'http://www.theme4press.com/feed' );
          $output = '';
	        // If the RSS is failed somehow.
	        if ( is_wp_error($rss) ) {
	            $error = $rss->get_error_code();
	            echo "<div class='updated fade'><p>An error has occured with the RSS feed. (<code>". $error ."</code>)</p></div>";
	       
	            return;
	         }
	       $output .= '<div class="info"><a href="http://theme4press.com/tag/free/">FREE Themes</a><a href="http://theme4press.com/tag/premium/">Premium Themes</a></div>';

	        

	        $maxitems = $rss->get_item_quantity(10);
	        $items = $rss->get_items(0, 10);

	       
	        $output .= '<ul class="themes">';
	        if (empty($items)) $output .= '<li>No items</li>';
	        else
	        foreach ( $items as $item ) : 
	          $output .= '<li class="theme"><div><h2><a href="'.$item->get_permalink().'">'.$item->get_title().'</a></h2>';
              
             $output .= $item->get_description();
                 
              $output .= '<br /><a class="view-theme" href="'.$item->get_permalink().'">VIEW THEME</a>';   
                 
              $output .= '</div></li>';
              
	        
	        endforeach; 
	        $output .= '</ul>';  
          
          echo $output;

?></div><?php } ?>