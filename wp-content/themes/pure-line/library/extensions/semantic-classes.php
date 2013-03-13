<?php
/**
 * Semantic Classes is made up of class-generating functions
 * that dynamically generate context sensitive classes and ids
 * to give unprecedented control over your layout options via CSS.
 * 
 * @package pureline
 * @subpackage Semantic_Markup
 */

/**
 * Functions:
 * semantic_title();
 * semantic_body();
 * semantic_entries();
 * semantic_comments();
 * pureline_semantic_last_class();
 */

/* Define the num val for 'alt' classes (in post DIV and comment LI) */
$semantic_comment_alt = 1;

/**
 * semantic_title() - Generates semantic classes for the <title> tag with extra SEO love.
 *
 * @todo refactor code
 * @since - 0.2
 * @filter semantic_title
 */
function pureline_semantic_title( $sep = '&mdash;' ) {
	if ( is_single() ) : wp_title( '&raquo;', true, 'right' ); bloginfo( 'name' );
	echo ( ' - ' );
	echo bloginfo( 'description' );
	
	elseif ( is_page() || is_paged() ) : wp_title( '&raquo;', true, 'right' ); 
	bloginfo( 'name' ); echo ( ' - ' );
	echo bloginfo( 'description' );
	
	elseif ( is_author() ) : wp_title( 'Archives for ', true, 'left' );
	echo ( ' &raquo; ' ); bloginfo( 'name' );
	echo ( ' - ' );
	echo bloginfo( 'description' );
	  
	elseif ( is_archive() ) : wp_title( 'Archives for ', true, 'left' );
	echo ( ' &raquo; ' ); bloginfo( 'name' );
	echo ( ' - ' );
	echo bloginfo( 'description' );
	
	elseif ( is_search() ) : wp_title('Search Results ', true, 'left' );
	echo ( ' &raquo; ' ); bloginfo( 'name' );
	echo ( ' - ' );
	echo bloginfo( 'description' );
	
	elseif ( is_404() ) : wp_title( '404 Error Page Not Found ', true, 'left' );
	echo ( ' &raquo; ' ); bloginfo( 'name' );
	echo ( ' - ');
	echo bloginfo( 'description' );
	
	else : wp_title( '&raquo', true, 'left' ); bloginfo( 'name' );
	echo ( ' - ' );
	echo bloginfo( 'description' );         
	endif;
}

/**
 * semantic_comments() - Generates semantic classes for each comment <li> element
 *
 * @since - 0.2
 * @filter semantic_comments
 * @uses semantic_time()
 */
function pureline_semantic_comments( $classes = array() ) {
	global $comment, $post, $wpdb, $current_user, $comment_first_class, $semantic_comment_alt;
	
	// Collects the comment type (comment, trackback)
	$classes[] = get_comment_type();
	
	// add css class to first comment
	if( $comment_first_class == 0 )
		$classes[] = 'first-comment';
		$comment_first_class = 1;	
	
	// add css class to last comment
	if( $comment->comment_ID == pureline_semantic_last_class( 'comment' ) and !$comment_first_class ) $classes[] = 'last-comment';
			
	// Show commenter's capabilities
	if ( $comment->user_id > 0 && $user = get_userdata( $comment->user_id ) ) {
		$capabilities = $user->{$wpdb->prefix . 'capabilities'}; // hat tip to Justin Tadlock http://www.themehybrid.com
		
		if ( array_key_exists( 'administrator', $capabilities ) ) $classes[] = 'administrator administrator-' . $user->user_login;
		elseif ( array_key_exists( 'editor', $capabilities ) ) $classes[] = 'editor editor-' . $user->user_login;
		elseif ( array_key_exists( 'author', $capabilities ) ) $classes[] = 'author author-' . $user->user_login;
		elseif ( array_key_exists( 'contributor', $capabilities ) ) $classes[] = 'contributor contributor-' . $user->user_login;
		elseif ( array_key_exists( 'subscriber', $capabilities ) ) $classes[] = 'subscriber subscriber-' . $user->user_login;
		
		// For comment authors who are the author of the post
		if ( $post = get_post( $post_id ) )
			if ( $comment->user_id === $post->post_author ) $classes[] = 'entry-author entry-author-' . $user->user_login;
			
	} else $classes[] = 'reader reader-' . str_replace( ' ', '-', strtolower( $comment->comment_author ) );
	
	// http://microid.org
	$email = get_comment_author_email();
	$uri = get_comment_author_url();
	if ( !empty( $email ) && !empty( $uri ) ) {
		if ( preg_match( '/https:\/\//i', $uri ) ) $protocal = 'https';
		elseif ( preg_match( '/http:\/\//i', $uri ) ) $protocal = 'http';
		$microid = "microid-mailto+{$protocal}:sha1:" . sha1( sha1( 'mailto:' . $email ) . sha1( $uri ) );
		$classes[] = $microid;
	}
			
	// If it's the other to the every, then add 'alt' class; collects time- and date-based classes

	
	$classes = join( ' ', apply_filters( 'pureline_semantic_comments',  $classes ) ); // Available filter: pureline_semantic_comments
	$print = apply_filters( 'pureline_semantic_comments_print', false ); // Available filter: pureline_semantic_comments_print
	
	// And tada!
	if ( !$print ) echo $classes;
	else return $classes;
}

/**
 * pureline_semantic_last_class() - returns the ID for the last class.
 *
 * @since - 0.3
 */
function pureline_semantic_last_class( $type = NULL ){
	global $comment, $post, $wpdb;
	if ( !$type == 'comment' || !$type == 'post' )
		return;

	$post_id = $post->ID;
	
	// type can be post/comment (W.I.P.)
	if ( $type == 'comment' )
		$query = "SELECT * FROM $wpdb->comments WHERE comment_post_ID = $post_id";
	
	if ($type) $get_id = $wpdb->get_results( $query, ARRAY_N );
	
	$last = end( $get_id );
	return $last[0];
}


/* Remember: Semantic Classes, like the Sandbox, is for play. (-_^) */
?>