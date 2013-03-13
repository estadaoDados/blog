<?php

	/*
	Plugin Name: Thinglink Official Plugin
	Plugin URI: http://thinglink.com/
	Description: A simple way to add the Thinglink script to your whole website. Go to <a href="plugins.php?page=rjw-thinglink-config">settings</a>.
	Version: 1.4
	Author: Thinglink
	Author URI: http://thinglink.com/
	*/

	require_once 'thinglink_shortcode.php';

	class RJW_Thinglink {
		
		const PLUGIN_NAME = "Thinglink";
		const PLUGIN_VERSION = "1.4";
		const PLUGIN_CONFIG_HOOK = "rjw-thinglink-config";
		const PLUGIN_CONFIG_URL = "/thinglink/rjw-thinglink-config.php";

		/* --------------------------------------------------
		Template Functions
		-------------------------------------------------- */
		function add_thinklink_to_footer(){
		  $thinglink_id = get_option('thinglink_id');
		  echo "
<script type=\"text/javascript\">
__tlid = '{$thinglink_id}';
__tlconfig = {hOverflow: false, vOverflow: false};
setTimeout(function(){(function(d,t){var s=d.createElement(t),x=d.getElementsByTagName(t)[0];
s.type='text/javascript';s.async=true;s.src='//cdn.thinglink.me/jse/embed.js';
x.parentNode.insertBefore(s,x);})(document,'script');},0);
</script>";
		}
	
		/* --------------------------------------------------
		Settings & Config
		-------------------------------------------------- */
		function admin_init(){
		  register_setting('rjw-thinglink-group', 'thinglink_id');
		}
	
		function admin_menu(){
			add_submenu_page('plugins.php', self::PLUGIN_NAME, self::PLUGIN_NAME, 'manage_options', self::PLUGIN_CONFIG_HOOK, array(&$this, 'admin_menu_options'));
		}
	
		function admin_menu_options() {
			$plugin_name = self::PLUGIN_NAME;
			include(WP_PLUGIN_DIR . self::PLUGIN_CONFIG_URL);
		}
	
		function plugin_action_links($links, $file) {
			if ($file == "rjw-thinglink/rjw-thinglink.php") {
				$href = admin_url("plugins.php?page=" . self::PLUGIN_CONFIG_HOOK);
				$text = __('Settings');
				array_unshift($links, "<a href=\"{$href}\">{$text}</a>");
			}
			return $links;
		}
		
	}
	
	/* --------------------------------------------------
	Initialize
	-------------------------------------------------- */
	$rjw_thinglink = new RJW_Thinglink();
	
	/* --------------------------------------------------
	WordPress Hooks
	-------------------------------------------------- */
	add_action('wp_footer', array($rjw_thinglink, 'add_thinklink_to_footer'));
	add_action('admin_init', array($rjw_thinglink, 'admin_init'));
	add_action('admin_menu', array($rjw_thinglink, 'admin_menu'));
	add_filter('plugin_action_links', array($rjw_thinglink, 'plugin_action_links'), 10, 2);

?>