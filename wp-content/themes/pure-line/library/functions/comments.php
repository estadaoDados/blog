<?php
/**
 * Comments - functions that deal with comments
 *
 * @package pureline
 * @subpackage Core
 */

/**
 * pureline_discussion_title()
 *
 * @since 0.3
 * @needsdoc
 * @filter pureline_many_comments, pureline_no_comments, pureline_one_comment, pureline_comments_number
 */
function pureline_discussion_title( $type = NULL, $echo = true ) {
	if ( !$type ) return;
  
  $discussion_title = '';

	$comment_count = pureline_count( 'comment', false );
	$ping_count = pureline_count( 'pings', false );

	switch( $type ) {
		case 'comment' :
			$count = $comment_count;
			$many  = apply_filters( 'pureline_many_comments', __('% Comments', 'pure-line' )); // Available filter: pureline_many_comments
			$none  = apply_filters( 'pureline_no_comments', __('No Comments Yet', 'pure-line' )); // Available filter: pureline_no_comments
			$one   = apply_filters( 'pureline_one_comment', __('1 Comment', 'pure-line' )); // Available filter: pureline_one_comment
			break;
		case 'pings' :
			$count = $ping_count;
			$many  = apply_filters( 'pureline_many_pings', __('% Trackbacks', 'pure-line' )); // Available filter: pureline_many_pings
			$none  = apply_filters( 'pureline_no_pings', __('', 'pure-line' )); // Available filter: pureline_no_pings
			$one   = apply_filters( 'pureline_one_ping', __('1 Trackback', 'pure-line' )); // Available filter: pureline_one_comment
			break;
	}
	
	if ( $count > 1 ) {
		$number = str_replace( '%', number_format_i18n( $count ), $many );
	} elseif ( $count == 1 ) {
		$number = $one;
	} else { // it must be one
		$number = $none;
	}
	
	// Now let's format this badboy.
	$tag = apply_filters( 'pureline_discussion_title_tag', (string) 'h3' ); // Available filter: pureline_discussion_title_tag
	
	if ( $number ) {
		$discussion_title  = '<'. $tag .' class="'. $type .'-title">';
		$discussion_title .= '<span class="'. $type .'-title-meta">' . $number . '</span>';
		$discussion_title .= '</'. $tag .'>';
	}
	$pureline_discussion_title = apply_filters( 'pureline_discussion_title', (string) $discussion_title ); // Available filter: pureline_discussion_title
	return ( $echo ) ? print( $pureline_discussion_title ) : $pureline_discussion_title;
}

/**
 * pureline_discussion_rss()
 *
 * @since 0.3
 * @needsdoc
 */
function pureline_discussion_rss() {
	global $id;
	$uri = get_post_comments_feed_link( $id );
  $text = "<span class=\"comment-feed-link\"><a title=\"".__('Follow replies', 'pure-line' )."\" class=\"tipsytext follow-replies\" href=\"{$uri}\"></a></span>";
	echo $text;
}

/**
 * pureline_count()
 *
 * @since 0.3
 * @needsdoc
 */
function pureline_count( $type = NULL, $echo = true ) {
	if ( !$type ) return;
	global $wp_query;

	$comment_count = count( $wp_query->comments_by_type['comment'] );
	$ping_count = count( $wp_query->comments_by_type['trackback'] );
	
	switch ( $type ):
		case 'comment':
			return ( $echo ) ? print( $comment_count ) : $comment_count;
			break;
		case 'pings':
			return ( $echo ) ? print( $ping_count ) : $ping_count;
			break;
	endswitch;
}

/**
 * pureline_comment_author() short description
 *
 * @since 0.3
 * @todo needs filter
 */
function pureline_comment_author( $meta_format = '%avatar% %name%' ) {
	$meta_format = apply_filters( 'pureline_comment_author_meta_format', $meta_format ); // Available filter: pureline_comment_author_meta_format
	if ( ! $meta_format ) return;
	
	// No keywords to replace
	if ( strpos( $meta_format, '%' ) === false ) {
		echo $meta_format;
	} else {
		$open  = '<!--BEGIN .comment-author-->' . "\n";
		$open .= '<div class="comment-author vcard">' . "\n";
		$close  = "\n" . '<!--END .comment-author-->' . "\n";
		$close .= '</div>' . "\n";
		
		// separate the %keywords%
		$meta_array = preg_split( '/(%.+?%)/', $meta_format, -1, PREG_SPLIT_DELIM_CAPTURE );

		// parse through the keywords
		foreach ( $meta_array as $key => $str ) {
			switch ( $str ) {
				case '%avatar%':
					$meta_array[$key] = pureline_comment_avatar();
					break;

				case '%name%':
					$meta_array[$key] = pureline_comment_name();
					break;
			}
		}
		$output = join( '', $meta_array );
		if ( $output ) echo $open . $output . $close; // output the result
	}
}

/**
 * pureline_comment_meta() short description
 *
 * @since 0.3.1
 * @todo needs filter
 */
function pureline_comment_meta( $meta_format = '%date% at %time% | %link% %edit%' ) {	
	$meta_format = apply_filters( 'pureline_comment_meta_format', $meta_format ); // Available filter: pureline_comment_meta_format
	if ( ! $meta_format ) return;
	
	// No keywords to replace
	if ( strpos( $meta_format, '%' ) === false ) {
		echo $meta_format;
	} else {
		$open  = '<!--BEGIN .comment-meta-->' . "\n";
		$open .= '<div class="comment-meta">' . "\n";
		$close  = "\n" . '<!--END .comment-meta-->' . "\n";
		$close .= '</div>' . "\n";
		
		// separate the %keywords%
		$meta_array = preg_split( '/(%.+?%)/', $meta_format, -1, PREG_SPLIT_DELIM_CAPTURE );

		// parse through the keywords
		foreach ( $meta_array as $key => $str ) {
			switch ( $str ) {
				case '%date%':
					$meta_array[$key] = pureline_comment_date();
					break;

				case '%time%':
					$meta_array[$key] = pureline_comment_time();
					break;

				case '%link%':
					$meta_array[$key] = pureline_comment_link();
					break;
				
				case '%reply%':
					$meta_array[$key] = pureline_comment_reply( true );
					break;
					
				case '%edit%':
					$meta_array[$key] = pureline_comment_edit();
					break;
			}
		}
		$output = join( '', $meta_array );
		if ( $output ) echo $open . $output . $close; // output the result
	}
}

/**
 * pureline_comment_text() short description
 *
 * @since 0.3.1
 */
function pureline_comment_text() {
	echo "\n<!--BEGIN .comment-content-->\n";
	echo "<div class=\"comment-content\">\n";
	comment_text();
	echo "\n<!--END .comment-content-->\n";
	echo "</div>\n";
}

/**
 * pureline_comment_moderation() short description
 *
 * @since - 0.3.1
 */
function pureline_comment_moderation() {
	global $comment;
	if ( $comment->comment_approved == '0' ) echo '<p class="comment-unapproved moderation alert">Your comment is awaiting moderation</p>';
}

/**
 * pureline_comment_navigation() paged comments
 *
 * @since 0.3
 * @needsdoc
 * @todo add html comments?
 */
function pureline_comment_navigation() {
	$num = get_comments_number() + 1;
	
	$tag = apply_filters( 'pureline_comment_navigation_tag', (string) 'div' ); // Available filter: pureline_comment_navigation_tag
	$open = "<!--BEGIN .navigation-links-->\n";
	$open .= "<". $tag ." class=\"navigation-links comment-navigation\">\n";
	$close = "<!--END .navigation-links-->\n";
	$close .= "</". $tag .">\n";
	
	if ( $num > get_option( 'comments_per_page' ) ) {		
		$paged_links = paginate_comments_links( array(
			'type' => 'array',
			'echo' => false,
			'prev_text' => '&laquo; Previous Page',
			'next_text' => 'Next Page &raquo;' ) );
		
		if ( $paged_links ) $comment_navigation = $open . join( ' ', $paged_links ) . $close;
	}
	else {
		$comment_navigation = NULL;
	}
	echo apply_filters( 'pureline_comment_navigation', (string) $comment_navigation ); // Available filter: pureline_comment_navigation
}

/**
 * pureline_comments_callback() recreate the comment list
 *
 * @since 0.3
 * @needsdoc
 */
function pureline_comments_callback( $comment, $args, $depth ) {	
	$GLOBALS['comment'] = $comment;
	$GLOBALS['comment_depth'] = $depth;
	$tag = apply_filters( 'pureline_comments_list_tag', (string) 'li' ); // Available filter: pureline_comments_list_tag
	?>
    
    <!--BEING .comment-->
	<<?php echo $tag; ?> class="<?php pureline_semantic_comments(); ?>" id="comment-<?php echo comment_ID(); ?>">
    	<?php pureline_hook_comments(); ?>
	<?php
}

/**
 * pureline_comments_endcallback() close the comment list
 *
 * @since 0.3
 * @needsdoc
 * @todo needs filter
 */
function pureline_comments_endcallback(){
	$tag = apply_filters( 'pureline_comments_list_tag', (string) 'li' ); // Available filter: pureline_comments_list_tag
	echo "<!--END .comment-->\n";
	echo "</". $tag .">\n";
	do_action( 'pureline_hook_inside_comments_loop' ); // Available action: pureline_hook_inside_comments_loop
}

/**
 * pureline_pings_callback() recreate the comment list
 *
 * @since 0.3
 * @needsdoc
 */
function pureline_pings_callback( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	$tag = apply_filters( 'pureline_pings_callback_tag', (string) 'li' ); // Available filter: pureline_pings_callback_tag
	$time = apply_filters( 'pureline_pings_callback_time', (string) ' on ' ); // Available filter: pureline_pings_callback_time
	$when = apply_filters( 'pureline_pings_callback_when', (string) ' at ' ); // Available filter: pureline_pings_callback_time
	?>
    <?php if ( $comment->comment_approved == '0' ) echo __('<p class="ping-unapproved moderation alert">Your trackback is awaiting moderation.</p>\n', 'pure-line'); ?>
    <!--BEING .pings-->
	<<?php echo $tag; ?> class="<?php echo pureline_semantic_comments(); ?>" id="ping-<?php echo $comment->comment_ID; ?>">
		<?php comment_author_link(); echo $time; ?><a class="trackback-time" href="<?php comment_link(); ?>"><?php comment_date(); echo $when; comment_time(); ?></a>
	<?php
}

/**
 * pureline_pings_endcallback() close the comment list
 *
 * @since 0.3
 * @needsdoc
 */
function pureline_pings_endcallback(){
	$tag = apply_filters( 'pureline_pings_callback_tag', (string) 'li' ); // Available filter: pureline_pings_callback_tag
	echo "<!--END .pings-list-->\n";
	echo "</". $tag .">\n";
	do_action( 'pureline_hook_inside_pings_list' ); // Available action: pureline_hook_inside_pings_list
}
?>