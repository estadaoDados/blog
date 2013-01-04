<?php
/**
 * Functions - general template functions that are used throughout pureline
 *
 * @package pureline
 * @subpackage Functions
 */

 
 
function pureline_media() {
  $template_url = get_template_directory_uri();
  $options = get_option('pureline');
  $pureline_css_data = '';
  
  $pureline_pos_button = pureline_get_option('pureline_pos_button','disable');
  $pureline_css_content = pureline_get_option('pureline_css_content','');
  
	if( is_admin() ) return;
	wp_enqueue_script( 'hoverIntent' );
  wp_enqueue_script( 'jquery' );  
  wp_enqueue_script( 'tipsy', PURJS . '/tipsy.js' );
  wp_enqueue_script( 'fields', PURJS . '/fields.js' );
  if ($pureline_pos_button == "disable" || $pureline_pos_button == "") {} else { wp_enqueue_script( 'jquery_scroll', PURJS . '/jquery.scroll.pack.js' ); }      
	wp_enqueue_script( 'supersubs', PURJS . '/supersubs.js' );
	wp_enqueue_script( 'superfish', PURJS . '/superfish.js' );
  wp_enqueue_script( 'magicshow', PURJS . '/magic-show.js' );
  wp_enqueue_style('googlefont', "http://fonts.googleapis.com/css?family=PT+Sans:400,700|Vollkorn:400,700");    
  
  // Stylesheets
  
  wp_register_style('maincss', $template_url . '/style.css', false);
  wp_enqueue_style('maincss');
 
  // Custom Stylesheets
 
  require_once( get_template_directory() . '/custom-css.php' ); 
  
  // Custom CSS
  
  $pureline_css_data .= $pureline_css_content;
  
  wp_add_inline_style( 'maincss', $pureline_css_data );
  
   
}  

/**
 * remove_generator_link() Removes generator link
 *
 * @since 0.1
 * @credits http://www.plaintxt.org
 * @needsdoc
 */
function pureline_remove_generator_link() { return ''; }

/**
 * Remove inline styles printed when the gallery shortcode is used.
 * Galleries are styled by the theme in style.css.
 */
function pureline_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'pureline_remove_gallery_css' );

/**
 * pureline_menu - adds css class to the <ul> tag in wp_page_menu.
 *
 * @since 0.3
 * @filter pureline_menu_ulclass
 * @needsdoc
 */
function pureline_menu_ulclass( $ulclass ) {
	$classes = apply_filters( 'pureline_menu_ulclass', (string) 'nav' ); // Available filter: pureline_menu_ulclass
	return preg_replace( '/<ul>/', '<ul class="'. $classes .'">', $ulclass, 1 );
}

/**
 * pureline_nice_terms clever terms
 *
 * @since 0.2.3
 * @needsdoc
 */
function pureline_nice_terms( $term = '', $normal_separator = ', ', $penultimate_separator = ' and ', $end = '' ) {
	if ( !$term ) return;
	switch ( $term ):
		case 'cats':
			$terms = pureline_get_terms( 'cats', $normal_separator );
			break;
		case 'tags':
			$terms = pureline_get_terms( 'tags', $normal_separator );
			
			break;
	endswitch;
	if ( empty($term) ) return;
	$things = explode( $normal_separator, $terms );
	
	$thelist = '';
	$i = 1;
	$n = count( $things );
		
	foreach ( $things as $thing ) {
		
		$data = trim( $thing, ' ' );
		
		$links = preg_match( '/>(.*?)</', $thing, $link );
		$hrefs = preg_match( '/href="(.*?)"/', $thing, $href );
		$titles = preg_match( '/title="(.*?)"/', $thing, $title );
		$rels = preg_match( '/rel="(.*?)"/', $thing, $rel );
		
		if (1 < $i and $i != $n) {
			$thelist .= $normal_separator;
		}

		if (1 < $i and $i == $n) {
			$thelist .= $penultimate_separator;
		}
		$thelist .= '<a rel="'. $rel[1] .'" href="'. $href[1] .'"';
		if ( !$term = 'tags' )
			$thelist .= ' title="'. $title[1] .'"';
		$thelist .= '>'. $link[1] .'</a>';
		$i++;
	}
	$thelist .= $end;
	return apply_filters( 'pureline_nice_terms', (string) $thelist );
}

/**
 * pureline_get_terms() Returns other terms except the current one (redundant)
 *
 * @since 0.2.3
 * @usedby pureline_entry_footer()
 */
function pureline_get_terms( $term = NULL, $glue = ', ' ) {
	if ( !$term ) return;
	
	$separator = "\n";
	switch ( $term ):
		case 'cats':
			$current = single_cat_title( '', false );
			$terms = get_the_category_list( $separator );
			break;
		case 'tags':
			$current = single_tag_title( '', '',  false );
			$terms = get_the_tag_list( '', "$separator", '' );
			break;
	endswitch;
	if ( empty($terms) ) return;
	
	$thing = explode( $separator, $terms );
	foreach ( $thing as $i => $str ) {
		if ( strstr( $str, ">$current<" ) ) {
			unset( $thing[$i] );
			break;
		}
	}
	if ( empty( $thing ) )
		return false;

	return trim( join( $glue, $thing ) );
}

/**
 * pureline_get Gets template files
 *
 * @since 0.2.3
 * @needsdoc
 * @action pureline_get
 * @todo test this on child themes
 */
function pureline_get( $file = NULL ) {
	do_action( 'pureline_get' ); // Available action: pureline_get
	$error = "Sorry, but <code>{$file}</code> does <em>not</em> seem to exist. Please make sure this file exist in <strong>" . get_stylesheet_directory() . "</strong>\n";
	$error = apply_filters( 'pureline_get_error', (string) $error ); // Available filter: pureline_get_error
	if ( isset( $file ) && file_exists( get_stylesheet_directory() . "/{$file}.php" ) )
		locate_template( get_stylesheet_directory() . "/{$file}.php" );
	else
        echo $error;
}

/**
 * purinclude_all() A function to include all files from a directory path
 *
 * @since 0.2.3
 * @credits k2
 */
function pureline_include_all( $path, $ignore = false ) {

	/* Open the directory */
	$dir = @dir( $path ) or die( 'Could not open required directory ' . $path );
	
	/* Get all the files from the directory */
	while ( ( $file = $dir->read() ) !== false ) {
		/* Check the file is a file, and is a PHP file */
		if ( is_file( $path . $file ) and ( !$ignore or !in_array( $file, $ignore ) ) and preg_match( '/\.php$/i', $file ) ) {
			require_once( $path . $file );
		}
	}		
	$dir->close(); // Close the directory, we're done.
}


/**
 * Gets the profile URI for the document being displayed.
 * @link http://microformats.org/wiki/profile-uris Profile URIs
 *
 * @since 0.2.4
 * @param integer $echo 0|1
 * @return string profile uris seperatd by spaces
 **/
function pureline_get_profile_uri( $echo = 1 ) {
	// hAtom profile
	$profile[] = 'http://purl.org/uF/hAtom/0.1/';
	
	// hCard, hCalendar, rel-tag, rel-license, rel-nofollow, VoteLinks, XFN, XOXO profile
	$profile[] = 'http://purl.org/uF/2008/03/';
	
	$profile = join( ' ', apply_filters( 'profile_uri',  $profile ) ); // Available filter: profile_uri
	
	if ( $echo ) echo $profile;
	else return $profile;
}

function pureline_copy() {

  $options = get_option('pureline');

  if (!empty($options['pureline_affiliate_id'])) { $ad_affiliate_id = '?ap_id='.$options['pureline_affiliate_id']; } else { $ad_affiliate_id = ''; } 

	$credits = '<p id="copyright"><span class="credits fl-r"><a href="http://theme4press.com/pure-line/'.$ad_affiliate_id.'">Pure Line</a> theme by Theme4Press&nbsp;&nbsp;&bull;&nbsp;&nbsp;Powered by <a href="http://wordpress.org">WordPress</a></span> <a href="'. home_url() .'">'. get_bloginfo( 'name' ) .'</a>&nbsp;&nbsp;<small>'. get_bloginfo( 'description' ) .'</small></p>';
	echo apply_filters( 'pureline_copy', (string) $credits );
}

?>