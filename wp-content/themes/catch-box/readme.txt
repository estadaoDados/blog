= Catch Box=
* by the Catch Themes team, http://catchthemes.com/

== ABOUT Catch Box==
Catch Box is simple, lightweight, box shaped, and adaptable WordPress Theme for bloggers and professionals. It is based on HTML5, CSS3 and Responsive Web Design to view in various devices. 10 Best Reasons to use Catch Box Theme. 1. Responsive Web Design, 2. Custom Menus (Primary, Secondary and Footer menus), 3. Theme Options for light or dark or blue color scheme, custom link colors, three layout choices, two content choices between excerpt and content option in homepage, feed redirection, custom css styles, 4. Featured Sliders where you can define number of slides and post IDs, 5. Social Links (Facebook, Twitter, RSS, Linkedin, Pinterest, etc), 6. Webmaster Tools (Google, Yahoo and Bing site verification ID, Header and Footer codes), 7. Custom Backgrounds, 8. Custom Header, 9. Catchbox Adspace widget to add any type of Advertisements, and 10. Support popular plugins. Multilingual Ready (WPML) and also currently translated in Brazilian Portuguese, Spanish, Danish and Germany. 

== Translation ==
Catch Box theme is translation ready. 
Added Translation for Brazilian Portuguese by Valdir Trombini ( Email: valdir.trombini@gmail.com )
Added Translation for Spanish by César Gómez ( Email: cesar@temperatio.com )
Added Translation for Danish by Kris Thomsen ( Email: mail@kristhomsen.dk )
Added Translation for Germany by Heinz Peter Brinkmann

== Menus ===
There are 3 Menus registered in this theme. Primary, Secondary and Footer menu. 
Primary and Secondary menu is dull drop down menu while the Footer menu displays only parent menu and no drop down.
Only Primary Menu is visible in responsive (mobile devices with max-width: 650px)

== Tags ==
dark, light, blue, white, black, gray, one-column, two-columns, left-sidebar, right-sidebar, fixed-width, flexible-width, custom-background, custom-colors, custom-header, custom-menu, editor-style, featured-image-header, featured-images, full-width-template, microformats, post-formats, rtl-language-support, sticky-post, theme-options, translation-ready

== Installation ==

1. Primary: Login to your wp-admin area and go to Appearance -> Themes. Select Install tab and click on Upload link. Select theme .zip and ckick on Install now button. If you have any errors, use alternate method.
2. Alternate: Unzip the template file (catchbox.zip) that you have downloaded. Via FTP, upload the whole folder (catchresponsive) to your server and place it in the /wp-content/themes/ folder. Do not change directory name. The template files should thus be here now: /wp-content/themes/catchbox/index.php (for example).
3. Log into your WP admin panel and click on the Design tab. Now click on the Catch Box theme to activate it.
4. Complete all of the required inputs on the Catch Box Options page (in the WP admin panel) and click "Save Changes".

== Changelog ==
Version 1.0.1
* Added text domain $beginning[ 'postid' ] = __( 'ID' ); in function catchbox_post_id_column()
* Fixed undefined index for feed_url and moved the function catchbox_rss_redirect() from function.php to theme-options.php
* Fixed undefined index for custom_css in theme-options.php
* Added margin left for sub level list in widget lists. 
* Added function catchbox_filter_wp_title() to filter the wp_title() 

Version 1.0.2
* Removed extra register_nav_menu( 'primary', __( 'Primary Menu', 'catchbox' ) );
* Removed Extra add_custom_background();

Version 1.0.3
* Fixed DEBUG ERROR 
  ** theme-options.php Undefined index: feed_url on line 410
* Fixed UNIT TEST
  ** Footer menu: Now only display parent menu in footer menu. I have describe it in readme.txt
  ** Fixed css for menu widget
  ** Fixed the css for Layout Test h1, h2, h3, h4, h5, h6
  ** Fixed css for Gallery Post: Remove extra space and center it.
  ** Fixed css for Image Test: Wide Image, resize in editor
  ** Fixed 404 Error Page and search box in it
* Added CSS to support plugin WP-PageNavi and WP Page Numbers Plugins

Version 1.0.4
* Fixed footer Navigation widget
* Added Style for Single Page Navigation

Version 1.0.5
* Fixed 'wp-head-callback', 'admin-head-callback', 'admin-preview-callback'

Version 1.0.6
* Fixed CSS for Navigation
* Fixed CSS for widget heading link
* Changed Screenshot to showcase the Responsive design and Sample Ads Widget

Version 1.0.7
* Fixed cycle_setup.js file.
* Cleaned header.php file.
* Fixed functions.php file.
* Fixed theme_options.php file

Version 1.0.8
* Added option to exclude featured slider post from Home page posts.
* Fixed issue with inline CSS option
* Cleaned theme-options.php

Version 1.0.9
* Added catchbox.pot file to make theme translation ready

Version 1.1.0
* Fixed the Dual title issue in feed
* Backward compatibility for wp_get_theme, using get_current_theme for WordPress Version below 3.4

Version 1.1.1
* Updated catchbox.pot file
* Added language translation file pt_BR.po and pt_BR.mo files

Version 1.1.2
* Added slider effect options in slider options.
* Added toggle effects on Options

Version 1.1.3
* Added option to change excerpt length in Theme Options
* Minified js files jquery.cycle.all.min.js and pngfix.min.js

Version 1.1.3.1
* Fixed Slider loading issue and display overlap 
* Added un-minified version of JS as per GPL

Version 1.1.3.2
* Fixed site title and heading font issue
* Fixed dark.css for dark color scheme

Version 1.2
* Added language translation file es_ES.po and es_ES.mo files
* Replaced get_stylesheet_directory_uri to get_template_directory_uri
* Added flexibility to height and width of Header Image (Logo)
* Replaced the default menu to responsive inout menu for mobile devices.

Version 1.2.1
* Fixed the Featured Image size to match with iPad display
* Fixed css for responsive design
* Fixed tag.php closing primary div

Version 1.2.2
* Fixed Responsive Design CSS and Image Size
* Note if you are upgrading the theme then please use the regenerate thumbnail plugin (http://wordpress.org/extend/plugins/regenerate-thumbnails/) to regenerate the new image size for featured image. It's size is 644px width and 320px height.

Version 1.2.3
* Removed extra file style.css.backsov.css
* Added Full Width Page (no sidebar) Template
* Added clear class for clearing floats in css

Version 1.3.0
* Added Danish translation da_DK.po and da_DK.mo

Version 1.3.1
* Fixed responsive css for iPhone
* Fixed Full Width Disable Sidebar and Content on Right Layout CSS
* Fixed widget title link text
* Fixed Page nav wp_link_pages design

Version 1.4
* Fixed Slider Initialization 
* Added Option to Disable Header Search in Theme Option Panel
* Added Info bar in Theme Option Panel
* Change the license to GPL 2

Version 1.4.1
* Fixed css for Threaded Comment Image Issue

Version 1.5
* Added Germany translation de_DE.po and de_DE.mo
* Fixed site title though changes in wp_title and catchbox_filter_wp_title function

Version 1.5.1
* Fixed css for Content on Right Layout

Version 1.5.2
* Fixed the linked widget title color in dark color scheme
* Fixed css for menu hover for older browser and IE

Version 1.5.3
* Added Blue Color Scheme

Version 1.5.4
* Fixed Default Layout and Page Template Issue with body_class filter

Version 1.5.5
* Fixed body_class filter loop for layout issue found in version 1.5.4
* Fixed CSS for Content on Right Layout 

Version 1.5.5.1
* Fixed the sidebar option

Version 1.5.6
* Added One-column, no sidebar page template and sidebar option

Version 1.5.6.1
* Added Word Wrap for commentlist in style.css

Version 1.6
* Added favicon url option in Theme Options

Version 1.6.1
* Updated screenshot to match with WordPress 3.5 version update
* Added comment form fields alteration function to match with WordPress 3.5 version update
* Fixed Spanish translation issue with the closing of span tag

Version 1.6.2
* Fixed Spanish translation issue in es_ES.mo

Version 1.6.3
* Fixed Google's Structured Data Testing Tool reports the error 'Warning: Missing required field "updated"'