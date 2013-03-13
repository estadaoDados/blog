<?php $options = get_option('pureline');
$template_url = get_template_directory_uri();  

$pureline_layout = pureline_get_option('pureline_layout','2cl');
$pureline_width_layout = pureline_get_option('pureline_width_layout','fixed');
$pureline_post_layout = pureline_get_option('pureline_post_layout','two');
$pureline_widgets_header = pureline_get_option('pureline_widgets_header','disable');
$pureline_widgets_footer = pureline_get_option('pureline_widgets_num','disable');
$pureline_pos_logo = pureline_get_option('pureline_pos_logo','left');
$pureline_pos_button = pureline_get_option('pureline_pos_button','disable');
$pureline_custom_background = pureline_get_option('pureline_custom_background','0');
$pureline_tagline_pos = pureline_get_option('pureline_tagline_pos','next');
$pureline_excerpt_thumbnail = pureline_get_option('pureline_excerpt_thumbnail','0');
$pureline_custom_thumbnail = pureline_get_option('pureline_custom_thumbnail','220');
$pureline_custom_width = pureline_get_option('pureline_custom_width','');


   if ($pureline_layout == "2cl") { 
  
} if ($pureline_layout == "2cr") { 
  
  $pureline_css_data .= '/**
 * Basic 2 column (aside)(content) fixed layout
 * 
 * @package WPpureline
 * @subpackage Layouts
 * @beta
 */

.container { width: 960px; margin: 20px auto; }
#wrapper {width:990px;}
.hfeed { width: 620px; float: right; }
.aside { width: 320px; float: left; }
.footer { clear: both; }';
   
  } if ($pureline_layout == "3cr") { 
  
 $pureline_css_data .= '/**
 * Basic 3 column (aside)(aside)(content) fixed layout
 * 
 * @package WPpureline
 * @subpackage Layouts
 * @beta
 */

.container { width: 960px; margin: 20px auto; }
.hfeed { width: 506px; float: right; }
.aside { width: 210px; float: left;margin-right:15px; }
.footer { clear: both; }
.entry-content img {max-width: 492px;}
.widget:after {content: url('.$template_url.'/library/media/images/divider-widget-mini.png);margin-left:-105px;}';
  
  
 } if ($pureline_layout == "3cl") { 
 
 $pureline_css_data .= '/**
 * Basic 3 column (aside)(aside)(content) fixed layout
 * 
 * @package WPpureline
 * @subpackage Layouts
 * @beta
 */

.container { width: 960px; margin: 20px auto; }
.hfeed { width: 506px; float: left; }
.aside { width: 210px; float: right;margin-left:15px; }
.footer { clear: both; }
.entry-content img {max-width: 492px;}
.widget:after {content: url('.$template_url.'/library/media/images/divider-widget-mini.png);margin-left:-105px;} '; 
  
  
} if ($pureline_layout == "3cm") { 

 $pureline_css_data .= '/**
 *  3 columns (aside)(content)(aside) fixed layout
 * 
 */

.container { width: 960px; margin: 20px auto; }
.hfeed { width: 506px; float: right; }
#wrapper {width:990px;}
#secondary { width: 210px; float: left;margin-right:15px; }
#secondary-2 { width: 210px; float: right;margin-left:15px; }
.footer { clear: both; }
.entry-content img {max-width: 492px;}
.widget:after {content: url('.$template_url.'/library/media/images/divider-widget-mini.png);margin-left:-105px;}';
  
  
} if ($pureline_width_layout == "fluid") { 

 $pureline_css_data .= '/**
 * Basic 1 column (content)(aside) fluid layout
 * 
 * @package WPpureline
 * @subpackage Layouts
 * @beta
 */

.container { min-width:960px;max-width:2400px;width:95%;margin:20px 3%;}
#wrapper {margin:0;width:100%;}
.hfeed { min-width:620px; width: 65%; }
.aside { min-width:320px; width: 34%; }

#slide_holder {min-width:620px;width: 65%;}
.slide-container {min-width:620px;width: 100%;}

.widgets-back {margin:10px 0 0 0 !important;}
.widgets-back-inside {min-width:960px;max-width:2400px;width:95%;margin:20px 3%;}



#righttopcolumn {min-width:320px; width: 34%;}

#search-text-box {min-width:220px; width: 69%;}
#search-button-box {min-width:90px; width: 30%;}

.space-2 {width:90%;}';
 
  
} if (($pureline_width_layout == "fluid" && $pureline_layout == "3cr") || ($pureline_width_layout == "fluid" && $pureline_layout == "3cl")) {

 $pureline_css_data .= '/**
 * Basic 2 columns (content)(aside) fluid layout
 * 
 * @package WPpureline
 * @subpackage Layouts
 * @beta
 */

.container { min-width:960px;max-width:2400px;width:95%;margin:20px 3%;}
#wrapper {min-width:990px;max-width:2400px;width:95%;}
.hfeed { width: 57%;min-width:506px; }
.aside { width: 20%;min-width:210px;  }

#slide_holder {min-width:526px;width: 57%;}
.slide-container {min-width:526px;width: 100%;}



#righttopcolumn {min-width:315px; width: 41%;}

#search-text-box {min-width:50px; width: 69%;}
#search-button-box {min-width:35px; width: 30%;}';

} if ($pureline_width_layout == "fluid" && $pureline_layout == "3cm") { 

 $pureline_css_data .= '/**
 * 3 columns (aside)(content)(aside) fluid layout
 * 
 */

.container { min-width:960px;max-width:2400px;width:95%;margin:20px 3%;}
.hfeed { width: 57%;min-width:506px; }
.home .hfeed, .archive .hfeed, .single .hfeed, .page .hfeed {margin-right:10px;}
#secondary, #secondary-2 { width: 20%;min-width:210px; }

#slide_holder {min-width:526px;width: 57%;}
.slide-container {min-width:526px;width: 100%;}

#righttopcolumn {min-width:315px; width: 41%;}

#search-text-box {min-width:50px; width: 69%;}
#search-button-box {min-width:35px; width: 30%;}';


 } if ($pureline_layout == "1c") { 
 
 $pureline_css_data .= '/**
 * 1 column (content) fixed layout
 * 
 * @package WPpureline
 * @subpackage Layouts
 * @beta
 */

.container { width: 960px; margin: 20px auto; }
.hfeed { width: 960px; }
.footer { clear: both; }'; 

} if ($pureline_layout == "1c" && $pureline_width_layout == "fluid") { 

 $pureline_css_data .= '/**
 * 1 column (content) fluid layout
 * 
 */

.container { min-width:960px;max-width:2400px;width:95%;margin:20px 3%;}
.hfeed { width: 100%;min-width:960px; }';


} if ($pureline_post_layout == "two") { 
  
  $pureline_css_data .= '/**
 * Posts Layout
 * 
 */
 
 
.home .hentry, .archive .hentry, .search .hentry {width:48%;float:left;margin-right:19px;padding-bottom:12px;}
.home .hentry .entry-content, .archive .hentry .entry-content, .search .hentry .entry-content {font-size:13px;}
.entry-content {margin-top:25px;}
.home .odd0, .archive .odd0, .search .odd0{clear:both;}
.home .odd1, .archive .odd1, .search .odd1{margin-right:0px;}
.home .entry-title, .entry-title a, .archive .entry-title, .search .entry-title {font-size:24px;letter-spacing:-1px;line-height:23px;}
.home .hentry img, .archive .hentry img, .search .hentry img{float:left;margin:0 10px 15px 0;max-width:220px;padding:6px;width:expression(document.body.clientWidth < 742? \'220px\' : document.body.clientWidth > 1000? \'220px\' : \'auto\');}
.home .entry-header, .archive .entry-header, .search .entry-header{font-size:12px;}
.home .published strong, .archive .published strong,  .search .published strong{font-size:15px;line-height:15px;}
.home .hfeed, .archive .hfeed, .single .hfeed, .page .hfeed {margin-right:0px;}
.home .hentry .entry-footer, .archive .hentry .entry-footer, .search .hentry .entry-footer {float:left;width:100%}
.home .hentry .comment-count, .archive .hentry .comment-count, .search .hentry .comment-count {background:none!important;padding-right:0;}';
  
  
 } if ($pureline_post_layout == "three") {
  
$pureline_css_data .= '/**
 * Posts Layout
 * 
 */
 
 
.home .hentry, .archive .hentry, .search .hentry {width:31%;float:left;margin-right:19px;padding-bottom:12px;}
.home .hentry .entry-content, .archive .hentry .entry-content, .search .hentry .entry-content {font-size:13px;}
.entry-content {margin-top:25px;}
.home .odd0, .archive .odd0, .search .odd0 {clear:both;}
.home .odd2, .archive .odd2, .search .odd2 {margin-right:0px;}
.home .entry-title, .entry-title a, .archive .entry-title, .search .entry-title {font-size:24px;letter-spacing:-1px;line-height:23px;}
.home .hentry img, .archive .hentry img, .search .hentry img {float:left;margin:0 10px 15px 0;max-width:220px;padding:6px;width:expression(document.body.clientWidth < 742? \'220px\' : document.body.clientWidth > 1000? \'220px\' : \'auto\');}
.home .entry-header, .archive .entry-header, .search .entry-header {font-size:12px;}
.home .published strong, .archive .published strong, .search .published strong {font-size:15px;line-height:15px;}
.home .hentry .comment-count, .archive .hentry .comment-count, .search .hentry .comment-count {background:none!important;padding-right:0;}
';

} 

$blog_title = pureline_get_option('pureline_title_font');
if ($blog_title) {
 $pureline_css_data .= '#logo, #logo a {font:' . $blog_title['style'] . ' '.$blog_title['size'] . ' ' . $blog_title['face']. ';line-height:'. $blog_title['size'] .'; color:'.$blog_title['color'].';letter-spacing:-.01em;}';
}

$blog_tagline = pureline_get_option('pureline_tagline_font');
if ($blog_tagline) {
 $pureline_css_data .= '#tagline {font:' . $blog_tagline['style'] . ' '.$blog_tagline['size'] . ' ' . $blog_tagline['face']. '; color:'.$blog_tagline['color'].';}';
}

$content_font = pureline_get_option('pureline_content_font');
if ($content_font) {
 $pureline_css_data .= 'body, input, textarea, .entry-content {font:' . $content_font['style'] . ' '.$content_font['size'] . ' ' . $content_font['face']. '; color:'.$content_font['color'].';line-height:1.5em;}';
 }    
 
if ($pureline_pos_logo == "right") { 
 $pureline_css_data .= '#logo-image {float:right;margin:0 0 0 20px;}';
 } if ($pureline_pos_button == "left") { 
 $pureline_css_data .= '#backtotop {left:3%;margin-left:0;}';
 } if ($pureline_pos_button == "right") { 
 $pureline_css_data .= '#backtotop {right:3%;}';
 } if ($pureline_pos_button == "middle" || $pureline_pos_button == "") {
 $pureline_css_data .= '#backtotop {left:50%;}';
   
 } if ($pureline_widgets_header == "two") {   

$pureline_css_data .= '.widgets-holder .header-1, .widgets-holder .header-2 {float:left;width:473px;margin-right:10px;}
.widgets-holder .header-2 {margin-right:0;}';
  
 } if ($pureline_widgets_header == "three") { 
 
 $pureline_css_data .= '.widgets-holder .header-1, .widgets-holder .header-2, .widgets-holder .header-3 {float:left;width:313px;margin-right:10px;}
.widgets-holder .header-3 {margin-right:0;}';  

 } if ($pureline_widgets_header == "four") { 
 
 $pureline_css_data .= '.widgets-holder .header-1, .widgets-holder .header-2, .widgets-holder .header-3, .widgets-holder .header-4 {float:left;width:232px;margin-right:10px;}
.widgets-holder .header-4 {margin-right:0;}';  

 } if ($pureline_widgets_header == "two" && $pureline_width_layout == "fluid") { 
 
 $pureline_css_data .= '.widgets-holder .header-1, .widgets-holder .header-2 {float:left;width:49%;margin-right:10px;}
.widgets-holder .header-2 {margin-right:0;}';

} if ($pureline_widgets_header == "three" && $pureline_width_layout == "fluid") { 

$pureline_css_data .= '.widgets-holder .header-1, .widgets-holder .header-2, .widgets-holder .header-3 {float:left;width:32%;margin-right:10px;}
.widgets-holder .header-3 {margin-right:0;}';

} if ($pureline_widgets_header == "four" && $pureline_width_layout == "fluid") {

$pureline_css_data .= '.widgets-holder .header-1, .widgets-holder .header-2, .widgets-holder .header-3, .widgets-holder .header-4 {float:left;width:24%;margin-right:10px;}
.widgets-holder .header-4 {margin-right:0;}';


 } if ($pureline_widgets_footer == "two") {
 
 $pureline_css_data .= '.widgets-holder .footer-1, .widgets-holder .footer-2 {float:left;width:473px;margin-right:10px;}
.widgets-holder .footer-2 {margin-right:0;}';  


 } if ($pureline_widgets_footer == "three") { 
 
 $pureline_css_data .= '.widgets-holder .footer-1, .widgets-holder .footer-2, .widgets-holder .footer-3 {float:left;width:313px;margin-right:10px;}
.widgets-holder .footer-3 {margin-right:0;}';

 } if ($pureline_widgets_footer == "four") {   

 $pureline_css_data .= '.widgets-holder .footer-1, .widgets-holder .footer-2, .widgets-holder .footer-3, .widgets-holder .footer-4 {float:left;width:232px;margin-right:10px;}
.widgets-holder .footer-4 {margin-right:0;}';


} if ($pureline_widgets_footer == "two" && $pureline_width_layout == "fluid") {


$pureline_css_data .= '.widgets-holder .footer-1, .widgets-holder .footer-2 {float:left;width:49%;margin-right:10px;}
.widgets-holder .footer-2 {margin-right:0;}';


} if ($pureline_widgets_footer == "three" && $pureline_width_layout == "fluid") {



$pureline_css_data .= '.widgets-holder .footer-1, .widgets-holder .footer-2, .widgets-holder .footer-3 {float:left;width:32%;margin-right:10px;}
.widgets-holder .footer-3 {margin-right:0;}';


} if ($pureline_widgets_footer == "four" && $pureline_width_layout == "fluid") {

$pureline_css_data .= '.widgets-holder .footer-1, .widgets-holder .footer-2, .widgets-holder .footer-3, .widgets-holder .footer-4 {float:left;width:24%;margin-right:10px;}
.widgets-holder .footer-4 {margin-right:0;}';

} if ($pureline_custom_background == "1") { 

$pureline_css_data .= '#wrapper {margin:0 auto 30px auto !important;background:#fff;box-shadow:0 0 15px rgba(0,0,0,.2);}';

   $color = get_background_color();
    if ( $color )  {  
    $style = $color ? "background-image:none;" : '';   
    $pureline_css_data .= 'body {'.trim( $style ).'}'; }

} 

if( get_header_image() ) {  

$pureline_css_data .= '.header {padding:10px 20px 35px 20px;width: 940px;background:url('.get_header_image().');}'; 

}  

  if (($pureline_tagline_pos !== "disable") && ($pureline_tagline_pos == "under")) {
     $pureline_css_data .= '#tagline {clear:left;padding-top:10px;}';
     } 
     
     if (($pureline_tagline_pos !== "disable") && ($pureline_tagline_pos == "above")) { 
     $pureline_css_data .= '#tagline {padding-top:0px;}';
     }
     
if ((!empty($pureline_custom_thumbnail)) && ($pureline_excerpt_thumbnail == '1')
 || (!empty($pureline_custom_thumbnail)) && ($pureline_post_layout == "two" )
  || (!empty($pureline_custom_thumbnail)) && ($pureline_post_layout == "three" )) { 
  $pureline_css_data .= '.home .hentry img, .archive .hentry img, .search .hentry img {max-height:100%;max-width:'.$pureline_custom_thumbnail.'px;}';
}  



if (!empty($pureline_custom_width)) { 
  $pureline_css_data .= '#wrapper, .nacked-menu, .footer-container  {margin:0 auto;min-width:'.$pureline_custom_width.'px !important;width:'.$pureline_custom_width.'px !important;}
  .menu {margin:0 10px!important;width:97%;}
  #righttopcolumn {margin-right:15px;}';
if ((!empty($pureline_custom_width) && get_header_image()) || (!empty($pureline_custom_width))) { $headerwidth = $pureline_custom_width - 40;
} 

$currentwidth = $pureline_custom_width; $newwidth = $currentwidth - 40;
$pureline_css_data .= '.container {min-width:'.$newwidth.'px !important;width:95%;}
  .content {padding-left:10px;padding-right:10px;}
  #slide_holder, .subscribe-container {min-width: 58%;width: 58% !important;} 
  .slide-container {min-width: 97%;width: 97%;}';
}

if (($pureline_layout == "2cr" && (!empty($pureline_custom_width))) ||
     ($pureline_layout == "2cl" && (!empty($pureline_custom_width))))
 { 
  $pureline_css_data .= '.hfeed {min-width: 60%;width: 60%; }
  .aside {min-width: 34%;width: 34%; }
  #search-button-box {width: 60px;}'; 
} elseif (($pureline_layout == "3cr" && (!empty($pureline_custom_width))) ||
     ($pureline_layout == "3cl" && (!empty($pureline_custom_width))) ||
     ($pureline_layout == "3cm" && (!empty($pureline_custom_width))))
 { 
  $pureline_css_data .= '.hfeed {min-width: 60% !important;width: 60% !important; }
  .aside {min-width: 18% !important;width: 18% !important; }
  #search-button-box {min-width: 90px;width:29%;}';    
} elseif (!empty($pureline_custom_width)) {
 $pureline_css_data .= '.hfeed {min-width: 98%;width: 98%; }
 #search-button-box {min-width: 50px;width:10%;}';   
} else { }    


?>