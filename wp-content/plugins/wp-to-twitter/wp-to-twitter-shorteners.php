<?php
//jd_shorten_link
//jd_expand_url
//jd_expand_yourl

add_filter( 'wptt_shorten_link','jd_shorten_link', 10, 4 );

function jd_shorten_link( $thispostlink, $thisposttitle, $post_ID, $testmode=false ) {
	if ( WPT_DEBUG && function_exists( 'wpt_pro_exists' ) ) {
		wp_mail( 'debug@joedolson.com','Initial Link Data',"$thispostlink, $thisposttitle, $post_ID, $testmode" ); // DEBUG
	}
		// filter link before sending to shortener or adding analytics
		$thispostlink = apply_filters('wpt_shorten_link',$thispostlink,$post_ID );
		$suprapi =  trim ( get_option( 'suprapi' ) );
		$suprlogin = trim ( get_option( 'suprlogin' ) );
		$bitlyapi =  trim ( get_option( 'bitlyapi' ) );
		$bitlylogin =  trim ( strtolower( get_option( 'bitlylogin' ) ) );
		$yourlslogin =  trim ( get_option( 'yourlslogin') );
		$yourlsapi = stripcslashes( get_option( 'yourlsapi' ) );
		if ($testmode == false ) {
			if ( get_option('use-twitter-analytics') == 1 || get_option('use_dynamic_analytics') == 1 ) {
				if ( get_option('use_dynamic_analytics') == '1' ) {
					$campaign_type = get_option('jd_dynamic_analytics');
					if ( $campaign_type == "post_category" && $testmode != 'link' ) {
						$category = get_the_category( $post_ID );
						$campaign = sanitize_title( $category[0]->cat_name );
					} else if ( $campaign_type == "post_ID") {
						$campaign = $post_ID;
					} else if ( $campaign_type == "post_title" && $testmode != 'link' ) {
						$post = get_post( $post_ID );
						$campaign = sanitize_title( $post->post_title ); 
					} else {
						if ( $testmode != 'link' ) {
							$post = get_post( $post_ID );
							$post_author = $post->post_author;
							$campaign = get_the_author_meta( 'user_login',$post_author );
						} else {
							$post_author = '';
							$campaign = '';
						}
					}
				} else {
					$campaign = get_option('twitter-analytics-campaign');
				}
				if ( strpos( $thispostlink,"%3F" ) === FALSE && strpos( $thispostlink,"?" ) === FALSE ) {
					$ct = "?";
				} else {
					$ct = "&";
				}
				$ga = "utm_campaign=$campaign&utm_medium=twitter&utm_source=twitter";
				$thispostlink .= $ct .= $ga;
			}
		}
		$thispostlink = urlencode(urldecode(trim($thispostlink))); // prevent double-encoding

		// custom word setting
		$keyword_format = ( get_option( 'jd_keyword_format' ) == '1' )?$post_ID:'';
		$keyword_format = ( get_option( 'jd_keyword_format' ) == '2' )?get_post_meta( $post_ID,'_yourls_keyword',true ):$keyword_format;
		// Generate and grab the short url
		switch ( get_option( 'jd_shortener' ) ) {
			case 0:
			case 1:
				$shrink = urldecode($thispostlink);
			case 4:
				$shrink = urldecode($thispostlink);				
				if ( function_exists('wp_get_shortlink') ) { // use wp_get_shortlink if available
					$shrink = ( $post_ID != false )?wp_get_shortlink( $post_ID ):$thispostlink;
				} 
			break;
			case 2: // updated to v3 3/31/2010
			$decoded = jd_remote_json( "http://api.bitly.com/v3/shorten?longUrl=".$thispostlink."&login=".$bitlylogin."&apiKey=".$bitlyapi."&format=json" );
			$error = '';
				if ($decoded) {
					if ($decoded['status_code'] != 200) {
						$shrink = $decoded;
						$error = $decoded['status_txt'];
					} else {
						$shrink = $decoded['data']['url'];		
					}
				} else {
				$shrink = false;
				update_option( 'wp_bitly_error',"JSON result could not be decoded");
				}	
				if ( !is_valid_url($shrink) ) { $shrink = false; update_option( 'wp_bitly_error',$error ); }
			break;
			case 3:
			$shrink = urldecode($thispostlink);
			break;
			case 5:
			// local YOURLS installation
			$thispostlink = urldecode($thispostlink);
			global $yourls_reserved_URL;
			define('YOURLS_INSTALLING', true); // Pretend we're installing YOURLS to bypass test for install or upgrade
			define('YOURLS_FLOOD_DELAY_SECONDS', 0); // Disable flood check
			$opath = get_option( 'yourlspath' );
			$ypath = str_replace( 'user','includes', $opath );
			if ( file_exists( dirname( $ypath ).'/load-yourls.php' ) ) { // YOURLS 1.4+
				global $ydb;
				require_once( dirname( $ypath ).'/load-yourls.php' );
				if ( function_exists( 'yourls_add_new_link' ) ) {
					$yourls_result = yourls_add_new_link( $thispostlink, $keyword_format );
				} else {
					$yourls_result = $thispostlink;
				}
			} else { // YOURLS 1.3
				require_once( get_option( 'yourlspath' ) ); 
				$yourls_db = new wpdb( YOURLS_DB_USER, YOURLS_DB_PASS, YOURLS_DB_NAME, YOURLS_DB_HOST );
				$yourls_result = yourls_add_new_link( $thispostlink, $keyword_format, $yourls_db );
			}
			if ($yourls_result) {
				$shrink = $yourls_result['shorturl'];			
			} else {
				$shrink = false;
			}
			break;
			case 6:
			// remote YOURLS installation
			$api_url = sprintf( get_option('yourlsurl') . '?username=%s&password=%s&url=%s&format=json&action=shorturl&keyword=%s',
				$yourlslogin, $yourlsapi, $thispostlink, $keyword_format );
			$json = jd_remote_json( $api_url, false );			
			if ($json) {
				$shrink = $json->shorturl;
			} else {
				$shrink = false;
			}
			break;
			case 7:
				if ( $suprapi != '') {
					$decoded = jd_remote_json( "http://su.pr/api/shorten?longUrl=".$thispostlink."&login=".$suprlogin."&apiKey=".$suprapi );
				} else {
					$decoded = jd_remote_json( "http://su.pr/api/shorten?longUrl=".$thispostlink );
				}
				update_option( 'wp_supr_error',"Su.pr API result: $decoded" );
				if ($decoded['statusCode'] == 'OK') {
					$page = str_replace("&","&#38;", urldecode($thispostlink));
					$shrink = $decoded['results'][$page]['shortUrl'];
					$error = $decoded['errorMessage'];
				} else {
					$shrink = false;
					$error = $decoded['errorMessage'];
					update_option( 'wp_supr_error',"JSON result could not be decoded");
				}	
				if ( !is_valid_url($shrink) ) { $shrink = false; update_option( 'wp_supr_error',$error ); }
			break;
			case 8:
			// Goo.gl
				$url = "https://www.googleapis.com/urlshortener/v1/url?key=AIzaSyBSnqQOg3vX1gwR7y2l-40yEG9SZiaYPUQ";
				$link = urldecode($thispostlink);
				$body = "{'longUrl':'$link'}";
				//$body = json_encode($data);
				$json = jd_fetch_url( $url, 'POST', $body, 'Content-Type: application/json' );
				$decoded = json_decode($json);
				//$url = $decoded['id'];
				$shrink = $decoded->id;
				if ( !is_valid_url($shrink) ) { $shrink = false; }
			break;
			case 9:
			// Twitter Friendly Links
				$shrink = urldecode($thispostlink);
				if ( function_exists( 'twitter_link' ) ) { // use twitter_link if available
					$shrink = twitter_link( $post_ID );
				}
			break;
		}
		if ($testmode != 'true') {
			if ( $shrink === false || ( stristr( $shrink, "http://" ) === FALSE )) {
				update_option( 'wp_url_failure','1' );
				$shrink = urldecode( $thispostlink );
			} else {
				update_option( 'wp_url_failure','0' );
			}
		}
	return $shrink;
}

function jd_expand_url( $short_url ) {
	$short_url = urlencode( $short_url );
	$decoded = jd_remote_json("http://api.longurl.org/v2/expand?format=json&url=" . $short_url );
	$url = $decoded['long-url'];
	return $url;
	//return $short_url;
}
function jd_expand_yourl( $short_url, $remote ) {
	if ( $remote == 6 ) {
		$short_url = urlencode( $short_url );
		$yourl_api = get_option( 'yourlsurl' );
		$user = get_option( 'yourlslogin' );
		$pass = stripcslashes( get_option( 'yourlsapi' ) );
		$decoded = jd_remote_json( $yourl_api . "?action=expand&shorturl=$short_url&format=json&username=$user&password=$pass" );
		$url = $decoded['longurl'];
		return $url;
	} else {
		global $yourls_reserved_URL;
		define('YOURLS_INSTALLING', true); // Pretend we're installing YOURLS to bypass test for install or upgrade
		define('YOURLS_FLOOD_DELAY_SECONDS', 0); // Disable flood check
		if ( file_exists( dirname( get_option( 'yourlspath' ) ).'/load-yourls.php' ) ) { // YOURLS 1.4
			global $ydb;
			require_once( dirname( get_option( 'yourlspath' ) ).'/load-yourls.php' ); 
			$yourls_result = yourls_api_expand( $short_url );
		} else { // YOURLS 1.3
			require_once( get_option( 'yourlspath' ) ); 
			$yourls_db = new wpdb( YOURLS_DB_USER, YOURLS_DB_PASS, YOURLS_DB_NAME, YOURLS_DB_HOST );
			$yourls_result = yourls_api_expand( $short_url );
		}	
		$url = $yourls_result['longurl'];
		return $url;
	}
}