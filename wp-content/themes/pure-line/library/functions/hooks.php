<?php
/**
 * Hooks - WP pureline's hook system
 *
 * @package WPpureline
 * @subpackage WP_pureline
 */

/**
 * pureline_hook_before_html() short description.
 *
 * Long description.
 *
 * @since 0.3
 * @hook action pureline_hook_before_html
 */
function pureline_hook_before_html() {
	do_action( 'pureline_hook_before_html' );
}

/**
 * pureline_hook_after_html() short description.
 *
 * Long description.
 *
 * @since 0.3
 * @hook action pureline_hook_after_html
 */
function pureline_hook_after_html() {
	do_action( 'pureline_hook_after_html' );
}

/**
 * pureline_hook_comments() short description.
 *
 * Long description.
 *
 * @since 0.3
 * @hook action pureline_hook_loop
 */
function pureline_hook_comments( $callback = array('pureline_comment_author', 'pureline_comment_meta', 'pureline_comment_moderation', 'pureline_comment_text', 'pureline_comment_reply' ) ) {
	do_action( 'pureline_hook_comments_open' ); // Available action: pureline_comment_open
	do_action( 'pureline_hook_comments' );

	$callback = apply_filters( 'pureline_comments_callback', $callback ); // Available filter: pureline_comments_callback
	
	// If $callback is an array, loop through all callbacks and call those functions if they exist
	if ( is_array( $callback ) ) {
		foreach( $callback as $function ) {
			if ( $function ) {
				call_user_func( $function );
			}
		}
	}
	
	// If $callback is a string, just call that function if it exist
	elseif ( is_string( $callback ) ) {
		if ( $callback ) {
			call_user_func( $callback );
		}
	}
	do_action( 'pureline_hook_comments_close' ); // Available action: pureline_comment_close
}
?>