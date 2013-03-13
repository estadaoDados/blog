=== Featured Posts Grid ===
Contributors: Chaser324
Donate link: http://bit.ly/ouu3IA
Author URI: http://chasepettit.com/
Plugin URI: http://chasepettit.com/2011/08/featured-posts-grid/
Tags: posts, grid, featured, featured post, featured posts, recent post, recent posts
Requires at least: 2.9.1
Tested up to: 3.3
Stable tag: 1.7

A javascript based display of post titles and thumbnails in a grid layout.

== Description ==

[Live Demo](http://chasepettit.com/)
[More Info](http://chasepettit.com/2011/08/featured-posts-grid/)
[Comments/Suggestions](http://chasepettit.com/2011/08/featured-posts-grid/)
[About Author](http://chasepettit.com/about/)

This plugin will display a grid of posts in any desired location within a template or post.
The appearance is highly customizable via the admin options menu (colors, drop shadows, & more).

If there are any additional features or bug fixes you would like to see in future versions, feel free to contact me.

If you find this plugin useful please remember to rate it and comment.      

== Installation ==

= Installation =

* Use the built-in WordPress plugin installer.

   OR

* Download the zip file and extract the contents.
   Upload the 'featured-posts-grid' folder to your plugins directory (wp-content/plugins/).
* Activate the plugin through the WordPress 'Plugins' menu.
* Recommendation: Refer to "How to Use" and "FAQ" for useful info.

= How to Use =

To use this plugin to display the most recent posts in any category and with any tag:

* Copy and paste the code below to your desired template location:
<code><?php if (function_exists('fpg_show')) { echo fpg_show(NULL); } ?></code>

If you would like to customize what posts are displayed:

* Copy and paste the code below to your desired template location:
<code><?php if (function_exists('fpg_show')) {
            $args = array(
                'cat'     => '',/* comma separated list of category ids to include (put '-' in front of ids to exclude) */
                'tag'     => '' /* comma separated list tag slugs to include */);
            echo fpg_show($args);
        }?></code>
* Modify the '$args' array to filter out only the posts that you would like displayed. Delete any entries in the array you don't want to use (be careful with the commas. See [here](http://codex.wordpress.org/Function_Reference/WP_Query#Parameters) for more details on all valid query parameters. Contact me if you have any questions about getting just the posts that you want.
* Recommendation: Create a new 'featured' tag and put it on the posts that you want to displayed and add that category's slug to the array in the code above.

If you would like to display the featured posts scroll inside of a post:

* Insert the following shortcode in your post:
<code>[fpg]</code>
* Arguments can also be used with the shortcode to specify posts to display:
<code>[fpg cat="-3" tag="featured"]</code>



== Frequently Asked Questions ==

= FAQ =

= Where do the images displayed come from? =
Images are based on the "Featured Image" selected on the Edit Post screen. If the option is not displayed, click Screen Options in the top right of the Edit Post screen and check the "Featured Image" checkbox.

= I changed the size of the grid items, but my images didn't change size. What do I need to do? =
Any new image added to your site should have a thumbnail created in the correct new size. However, the old thumbnails will need to be regenerated. This can be done for all images on your site with the excellent ["Regenerate Thumbnails" plugin](http://wordpress.org/extend/plugins/regenerate-thumbnails/).

= I'm getting an error: "Call to undefined function has_post_thumbnail()", and I can't add a "Featured Image" to my posts. =
This issue is typically caused by templates that don't enable post thumbnails. If your template's functions.php file does not contain this, you must add it:
 
<code>add_theme_support( 'post-thumbnails' );</code>

= I have the "Display Excerpts" option selected, but I'm not seeing anything =
The plugin will currently only display manually entered excerpts. Automatically generated excerpts will not be displayed.

= When I save my settings, I get an error that says statics JS and/or CSS files can't be saved. What can I do to fix this? =
If you get this error, it means that the permissions on your server aren't setup to let Wordpress write directly to a file. To resolve this you'll need to temporarily change the permissions on this plugin's css and js directories, click "Save Settings" on the admin page, and then change the permissions back.

You can change the permissions on your server either by using SSH or a config menu on your hosting service's site (if they allow you to directly change permissions). With SSH access, navigate into the featured-posts-grid directory and enter "chmod 777 css js", click "Save Settings" on the admin page, and then change permissions back with "chmod 755 css js".

== Screenshots ==

1. Appearance Customization

== Changelog ==

= 1.7 =
* Corrected issue with plugin appearing on post/page templates.
* Made caching to static CSS and JS files optional. Some users have reported issues with this feature.

= 1.6 =
* Corrected issue with activation that was causing new variables to not be initialized to default values.

= 1.5 =
* Refactored activate/deactivate functions.
* Reorganized/renamed some CSS and JS files. Removed files that are no longer used.
* Corrected issue where plugin could interfere with post/page templates causing the wrong post data to be displayed.
* Added auto-scroll options.
* Added roll-over option (user can scroll past last page back to first and vice-versa)
* Performance update. CSS and JS that were generated from PHP on every page view are now saved to static files every time an admin option is changed.

= 1.4 =
* Refactored JavaScript to prevent causing issues with plugins that assume "$" references jQuery.

= 1.3 =
* Fixed issue where only last row appeared when scrolling left.
* Added option to display post author and date
* Removed max_width from some fields on admin page.

= 1.2 =
* Don't display empty cells if there are not enough entries.
* Round down the width of the cells in the last column to avoid IE6/7 rounding issue.

= 1.1 =
* Added option to display post excerpt.

= 1.0 =
* Initial release.

== Upgrade Notice ==

= 1.7 =
* Corrected issue with plugin appearing on post/page templates.
* Made caching to static CSS and JS files optional. Some users have reported issues with this feature.
