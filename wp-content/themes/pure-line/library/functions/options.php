<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function pureline_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = wp_get_theme();
	$themename = $themename['Name'];
	$themename = preg_replace("/\W/", "", strtolower($themename) );
	
	$pureline_settings = get_option('pureline');
	$pureline_settings['id'] = $themename;
	update_option('pureline', $pureline_settings);
	
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function pureline_options() {


	// Pull all the categories into an array
	$options_categories = array();  
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}
		
// If using image radio buttons, define a directory path
  $imagepath = get_template_directory_uri() . '/library/functions/images/';
  $imagepathfolder = get_template_directory_uri() . '/library/media/images/';
  $purelineshortname = "pureline";
  $template_url = get_template_directory_uri();
		
	$options = array();
  
  
// Layout

	$options[] = array( "name" => $purelineshortname."-tab-1", "id" => $purelineshortname."-tab-1",
	"type" => "open-tab");

 
	
	$options[] = array(
		"name" => __( 'Select a layout', 'pure-line'  ),
		"desc" => __( 'Select main content and sidebar alignment.', 'pure-line'  ),
		"id" => $purelineshortname."_layout",
		"std" => "2cr",
		"type" => "images",
		"options" => array(
			'1c' => $imagepath . '1c.png',
			'2cl' => $imagepath . '2cl.png',
			'2cr' => $imagepath . '2cr.png',
			'3cm' => $imagepath . '3cm.png',
			'3cr' => $imagepath . '3cr.png',
      '3cl' => $imagepath . '3cl.png'
			)
		);
    
 $options[] = array(
		"name" => __( 'Width', 'pure-line'  ),
		"desc" => __( '<strong>Fixed</strong> = 960px / <strong>Fluid</strong> = 99% width of browser window', 'pure-line'  ),
		"id" => $purelineshortname."_width_layout",
		"std" => "fixed",
		"type" => "select",
		"options" => array(
			'fixed' => __( 'Fixed &nbsp;&nbsp;&nbsp;(default)', 'pure-line'  ),
			'fluid' => __( 'Fluid', 'pure-line'  )
			)
		); 
    
    
$options[] = array(  "name" => __( 'Number of widget cols in header', 'pure-line'  ),
        "desc" => __( 'Select how many header widget areas you want to display.', 'pure-line'  ),
        "id" => $purelineshortname."_widgets_header",
        "type" => "images",
        "std" => "disable",
        "options" => array(
			  'disable' => $imagepath . '1c.png',
			  'one' => $imagepath . 'header-widgets-1.png',
        'two' => $imagepath . 'header-widgets-2.png',
        'three' => $imagepath . 'header-widgets-3.png',         
        'four' => $imagepath . 'header-widgets-4.png',
        ));      
    
    
    
$options[] = array(  "name" => __( 'Number of widget cols in footer', 'pure-line'  ),
        "desc" => __( 'Select how many footer widget areas you want to display.', 'pure-line'  ),
        "id" => $purelineshortname."_widgets_num",
        "type" => "images",
        "std" => "disable",
        "options" => array(
			  'disable' => $imagepath . '1c.png',
			  'one' => $imagepath . 'footer-widgets-1.png',
        'two' => $imagepath . 'footer-widgets-2.png',
        'three' => $imagepath . 'footer-widgets-3.png',         
        'four' => $imagepath . 'footer-widgets-4.png',
        ));      
    
  $options[] = array( "name" => $purelineshortname."-tab-1", "id" => $purelineshortname."-tab-1",
	"type" => "close-tab" );    
  
  
  
// Posts

$options[] = array( "name" => $purelineshortname."-tab-2", "id" => $purelineshortname."-tab-2",
	"type" => "open-tab"); 
 


$options[] = array(  "name" => __( 'Number of articles per row on home and archive pages - \'post boxes\'', 'pure-line'  ),
        "desc" => __( 'Option <strong>2</strong> or <strong>3</strong> is recommended to use with disabled <strong>Sidebar(s)</strong> or enabled <strong>Fluid</strong> width', 'pure-line'  ),
        "id" => $purelineshortname."_post_layout",
        "type" => "images",
        "std" => "two",
	      "options" => array(
			   'one' => $imagepath . 'one-post.png',
			   'two' => $imagepath . 'two-posts.png',
         'three' => $imagepath . 'three-posts.png',
		   	));
        
$options[] = array(  "name" => __( 'Enable post excerpts with thumbnails', 'pure-line'  ),
        "desc" => __( 'Check this box if you want to display post excerpts with post thumbnails on one column posts', 'pure-line'  ),
        "id" => $purelineshortname."_excerpt_thumbnail",
        "type" => "checkbox",
        "std" => "0");         

$options[] = array(  "name" => __( 'Post meta header placement', 'pure-line'  ),
        "desc" => __( 'Choose placement of the post meta header - Date, Author, Comments', 'pure-line'  ),
        "id" => $purelineshortname."_header_meta",
        "type" => "select",
        "std" => "single_archive",
        "options" => array(
			   'single_archive' => __( 'Single posts + Archive pages &nbsp;&nbsp;&nbsp;(default)', 'pure-line'  ),
			   'single' => __( 'Single posts', 'pure-line'  ),
         'disable' => __( 'Disable', 'pure-line'  )
		   	));  
        
$options[] = array(  "name" => __( '\'Share This\' buttons placement', 'pure-line'  ),
        "desc" => __( 'Choose placement of the \'Share This\' buttons', 'pure-line'  ),
        "id" => $purelineshortname."_share_this",
        "type" => "select",
        "std" => "single",
        "options" => array(
			   'single' => __( 'Single posts &nbsp;&nbsp;&nbsp;(default)', 'pure-line'  ),
			   'single_archive' => __( 'Single posts + Archive pages', 'pure-line'  ),
         'all' => __( 'All pages', 'pure-line'  ),
         'disable' => __( 'Disable', 'pure-line'  )
		   	));   
        
$options[] = array(  "name" => __( 'Position of previous/next posts links', 'pure-line'  ),
        "desc" => __( 'Choose the position of the <strong>Previous/Next Post</strong> links', 'pure-line'  ),
        "id" => $purelineshortname."_post_links",
        "type" => "select",
        "std" => "after",
        "options" => array(
			  'after' => __( 'After posts &nbsp;&nbsp;&nbsp;(default)', 'pure-line'  ),
			  'before' => __( 'Before posts', 'pure-line'  ),
        'both' => __( 'Both', 'pure-line'  )
        )); 
        
$options[] = array(  "name" => __( 'Display Similar posts', 'pure-line'  ),
        "desc" => __( 'Choose if you want to display <strong>Similar posts</strong> in articles', 'pure-line'  ),
        "id" => $purelineshortname."_similar_posts",
        "type" => "select",
        "std" => "disable",
        "options" => array(
			  'disable' => __( 'Disable &nbsp;&nbsp;&nbsp;(default)', 'pure-line'  ),
			  'category' => __( 'Match by categories', 'pure-line'  ),
        'tag' => __( 'Match by tags', 'pure-line'  )
        ));                              
 
$options[] = array( "name" => $purelineshortname."-tab-2", "id" => $purelineshortname."-tab-2",
	"type" => "close-tab" );   


// Subscribe buttons

$options[] = array( "name" => $purelineshortname."-tab-3", "id" => $purelineshortname."-tab-3",
	"type" => "open-tab");


// RSS Feed
  
$options[] = array(  "name" => __( 'RSS Feed', 'pure-line'  ),
        "desc" => __( 'Insert custom RSS Feed URL, e.g. <strong>http://feeds.feedburner.com/Example</strong>', 'pure-line'  ),
        "id" => $purelineshortname."_rss_feed",
        "type" => "text",
        "std" => ""); 

// Facebook

$options[] = array(  "name" => __( 'Facebook', 'pure-line'  ),
        "desc" => __( 'Insert your Facebook ID. If your Facebook page is <strong>http://facebook.com/Example</strong>, insert only <strong>Example</strong>', 'pure-line'  ),
        "id" => $purelineshortname."_facebook",
        "type" => "text",
        "std" => "");  

// Twitter
 
$options[] =  array(  "name" => __( 'Twitter', 'pure-line'  ),
        "desc" => __( 'Insert your Twitter ID. If your Twitter page is <strong>http://twitter.com/username</strong>, insert only <strong>username</strong>', 'pure-line'  ),
        "id" => $purelineshortname."_twitter_id",
        "type" => "text",
        "std" => "");  


// Skype

$options[] = array(  "name" => __( 'Skype', 'pure-line'  ),
        "desc" => __( 'Insert your Skype ID, e.g. <strong>username</strong>', 'pure-line'  ),
        "id" => $purelineshortname."_skype",
        "type" => "text",
        "std" => "");  

// YouTube

$options[] = array(  "name" => __( 'YouTube', 'pure-line'  ),
        "desc" => __( 'Insert your YouTube ID. If your YouTube page is <strong><strong>http://youtube.com/user/Username</strong></strong>, insert only <strong>Username</strong>', 'pure-line'  ),
        "id" => $purelineshortname."_youtube",
        "type" => "text",
        "std" => "");  

// Flickr

$options[] = array(  "name" => __( 'Flickr', 'pure-line'  ),
        "desc" => __( 'Insert your Flickr ID. If your Flickr page is <strong>http://flickr.com/photos/example</strong>, insert only <strong>example</strong>', 'pure-line'  ),
        "id" => $purelineshortname."_flickr",
        "type" => "text",
        "std" => "");  

// LinkedIn

$options[] = array(  "name" => __( 'LinkedIn', 'pure-line'  ),
        "desc" => __( 'Insert your LinkedIn profile URI, e.g. <strong>http://ca.linkedin.com/pub/your-name/3/859/23b</strong>', 'pure-line'  ),
        "id" => $purelineshortname."_linkedin",
        "type" => "text",
        "std" => "");
        
// Google Plus

$options[] = array(  "name" => __( 'Google Plus', 'pure-line'  ),
        "desc" => __( 'Insert your Google Plus profile ID, e.g. <strong>114573636521805298702</strong>', 'pure-line'  ),
        "id" => $purelineshortname."_googleplus",
        "type" => "text",
        "std" => "");  

$options[] = array( "name" => $purelineshortname."-tab-3", "id" => $purelineshortname."-tab-3",
	"type" => "close-tab" );  


// Header content

$options[] = array( "name" => $purelineshortname."-tab-4", "id" => $purelineshortname."-tab-4",
	"type" => "open-tab");


$options[] = array( "name" => __( 'Custom logo', 'pure-line'  ),
        "desc" => __( 'Upload a logo for your theme, or specify an image URL directly.', 'pure-line'  ),
        "id" => $purelineshortname."_header_logo",
        "type" => "upload",
        "std" => "");         
        
$options[] = array(  "name" => __( 'Logo position', 'pure-line'  ),
        "desc" => __( 'Choose the position of your custom logo', 'pure-line'  ),
        "id" => $purelineshortname."_pos_logo",
        "type" => "select",
        "std" => "left",
        "options" => array(
			  'left' => __( 'Left &nbsp;&nbsp;&nbsp;(default)', 'pure-line'  ),
			  'right' => __( 'Right', 'pure-line'  ),
        'disable' => __( 'Disable', 'pure-line'  )
        )); 
        
$options[] = array(  "name" => __( 'Disable Blog Title', 'pure-line'  ),
        "desc" => __( 'Check this box if you don\'t want to display title of your blog', 'pure-line'  ),
        "id" => $purelineshortname."_blog_title",
        "type" => "checkbox",
        "std" => "0");    
        
$options[] = array(  "name" => __( 'Blog Tagline position', 'pure-line'  ),
        "desc" => __( 'Choose the position of blog tagline', 'pure-line'  ),
        "id" => $purelineshortname."_tagline_pos",
        "type" => "select",
        "std" => "next",
        "options" => array(
			  'next' => __( 'Next to blog title &nbsp;&nbsp;&nbsp;(default)', 'pure-line'  ),
			  'above' => __( 'Above blog title', 'pure-line'  ),
        'under' => __( 'Under blog title', 'pure-line'  ),
        'disable' => __( 'Disable', 'pure-line'  )         
        ));     

$options[] = array( "name" => $purelineshortname."-tab-4", "id" => $purelineshortname."-tab-4",
	"type" => "close-tab" ); 


// Footer content

$options[] = array( "name" => $purelineshortname."-tab-5", "id" => $purelineshortname."-tab-5",
	"type" => "open-tab");


$options[] = array(  "name" => __( 'Custom footer', 'pure-line'  ),
        "desc" => __( 'Available <strong>HTML</strong> tags and attributes:<br /><br /> <code> &lt;b&gt; &lt;i&gt; &lt;a href="" title=""&gt; &lt;blockquote&gt; &lt;del datetime=""&gt; <br /> &lt;ins datetime=""&gt; &lt;img src="" alt="" /&gt; &lt;ul&gt; &lt;ol&gt; &lt;li&gt; <br /> &lt;code&gt; &lt;em&gt;  &lt;strong&gt; &lt;div&gt; &lt;span&gt; &lt;h1&gt; &lt;h2&gt; &lt;h3&gt; &lt;h4&gt; &lt;h5&gt; &lt;h6&gt; <br /> &lt;table&gt; &lt;tbody&gt; &lt;tr&gt; &lt;td&gt; &lt;br /&gt; &lt;hr /&gt;</code>', 'pure-line'  ),
        "id" => $purelineshortname."_footer_content",
        "type" => "textarea",
        "std" => "");

$options[] = array( "name" => $purelineshortname."-tab-5", "id" => $purelineshortname."-tab-5",
	"type" => "close-tab" ); 


// Typography

$options[] = array( "id" => $purelineshortname."-tab-6",
	"type" => "open-tab");

$options[] = array(  "name" => __( 'Blog Title font', 'pure-line'  ),
        "desc" => __( 'Select the typography you want for your blog title. * non web-safe font.', 'pure-line'  ),
        "id" => $purelineshortname."_title_font",
        "type" => "typography",
        "std" => array('size' => '55px', 'face' => 'vollkorn','style' => 'normal','color' => '')
        );
        
$options[] = array(  "name" => __( 'Blog tagline font', 'pure-line'  ),
        "desc" => __( 'Select the typography you want for your blog tagline. * non web-safe font.', 'pure-line'  ),
        "id" => $purelineshortname."_tagline_font",
        "type" => "typography",
        "std" => array('size' => '13px', 'face' => 'georgia','style' => 'italic','color' => '')
        );          
        
$options[] = array(  "name" => __( 'Content font', 'pure-line'  ),
        "desc" => __( 'Select the typography you want for your blog content. * non web-safe font.', 'pure-line'  ),
        "id" => $purelineshortname."_content_font",
        "type" => "typography",
        "std" => array('size' => '13px', 'face' => 'pt sans','style' => 'normal','color' => '')
        );       

$options[] = array( "name" => $purelineshortname."-tab-6", "id" => $purelineshortname."-tab-6",
	"type" => "close-tab" ); 


// Navigation

$options[] = array( "id" => $purelineshortname."-tab-7",
	"type" => "open-tab");

$options[] = array(  "name" => __( 'Disable main menu', 'pure-line'  ),
        "desc" => __( 'Check this box if you don\'t want to display main menu', 'pure-line'  ),
        "id" => $purelineshortname."_main_menu",
        "type" => "checkbox",
        "std" => "0");

$options[] = array(  "name" => __( 'Position of navigation links', 'pure-line'  ),
        "desc" => __( 'Choose the position of the <strong>Older/Newer Posts</strong> links', 'pure-line'  ),
        "id" => $purelineshortname."_nav_links",
        "type" => "select",
        "std" => "after",
        "options" => array(
			  'after' => __( 'After posts &nbsp;&nbsp;&nbsp;(default)', 'pure-line'  ),
			  'before' => __( 'Before posts', 'pure-line'  ),
        'both' => __( 'Both', 'pure-line'  )
        ));   
        
$options[] = array(  "name" => __( 'Position of \'Back to Top\' button', 'pure-line'  ),
        "desc" => "",
        "id" => $purelineshortname."_pos_button",
        "type" => "select",
        "std" => "disable",
        "options" => array(
			  'disable' => __( 'Disable &nbsp;&nbsp;&nbsp;(default)', 'pure-line'  ),
			  'left' => __( 'Left', 'pure-line'  ),
        'right' => __( 'Right', 'pure-line'  ),
        'middle' => __( 'Middle', 'pure-line'  )
        ));                
        
$options[] = array( "name" => $purelineshortname."-tab-7", "id" => $purelineshortname."-tab-7",
	"type" => "close-tab" ); 


// General Styling


$options[] = array( "name" => $purelineshortname."-tab-10", "id" => $purelineshortname."-tab-10",
	"type" => "open-tab");     


$options[] = array(  "name" => "Enable Boxed Layout & Custom Background",
        "desc" => "Check this box if you want to enable boxed layout with a custom background",
        "id" => $purelineshortname."_custom_background",
        "type" => "checkbox",
        "std" => "0");
        
        
$options[] = array(  "name" => "Custom CSS",
        "desc" => '<strong>For advanced users only</strong>: insert custom CSS, default <a href="'.$template_url.'/style.css" target="_blank">style.css</a> file',
        "id" => $purelineshortname."_css_content",
        "type" => "textarea",
        "std" => "");   
        

$options[] = array( "name" => $purelineshortname."-tab-10", "id" => $purelineshortname."-tab-10",
	"type" => "close-tab" );  



return $options;
}