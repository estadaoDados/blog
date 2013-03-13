<?php
/**
 *
 * @package WPpureline
 * @subpackage Functions
 */

/**
 * class WPpureline Main class loads all includes, adds/removes filters.
 * 
 * @since 0.1
 */
class WPpureline {
	
	/**
	 * purinit() Initialisation method which calls all other methods in turn.
	 *
	 * @since 0.1
	 */
	function pureline_init() {		
		$theme = new WPpureline;
		
		$theme->pureline_enviroment();
		$theme->pureline();
		$theme->pureline_extentions();
		$theme->pureline_defaults();
		$theme->pureline_ready();
		
		do_action( 'pureline_init' );
	}
	
	/**
	 * enviroment() defines WP pureline directory constants
	 *
	 * @since 0.2.3
	 */
	function pureline_enviroment() {	
		define( 'PURTHEMELIB', get_template_directory() . '/library' ); // Shortcut to point to the /library/ dir
		define( 'PURTHEMECORE', PURTHEMELIB . '/functions/' ); // Shortcut to point to the /functions/ dir
		define( 'PURTHEMEMORE', PURTHEMELIB . '/extensions/' ); // Shortcut to point to the /extensions/ dir
		define( 'PURTHEMEMEDIA', PURTHEMELIB . '/media' ); // Shortcut to point to the /media/ URI
		define( 'PURTHEMECSS', PURTHEMEMEDIA . '/css' );
		define( 'PURTHEMEIMAGES', PURTHEMEMEDIA . '/images' );
		define( 'PURTHEMEJS', PURTHEMEMEDIA . '/js' );
		
		// URI shortcuts
		define( 'PURTHEME', get_template_directory_uri(), true );
		define( 'PURLIBRARY', PURTHEME . '/library', true ); // Shortcut to point to the /library/ URI
		
		if ( get_stylesheet_directory() !== get_template_directory() ) define( 'PURMEDIA', get_stylesheet_directory_uri(), true ); // Shortcut to point to the /media/ URI
		else define( 'PURMEDIA', PURLIBRARY . '/media', true ); // Shortcut to point to the /media/ URI
		
		define( 'PURCSS', PURMEDIA . '/css', true );
		define( 'PURIMAGES', PURMEDIA . '/images', true );
		define( 'PURJS', PURMEDIA . '/js', true );

		do_action( 'pureline_enviroment' ); // Available action: load_purenviroment
	}
	
	/**
	 * pureline() includes all the core functions for WP pureline
	 *
	 * @since 0.2.3
	 */
	function pureline() {    
		require_once( PURTHEMECORE . '/hooks.php' ); // load the WP pureline Hook System
		require_once( PURTHEMECORE . '/functions.php' ); // load pureline functions
		require_once( PURTHEMECORE . '/comments.php' ); // load comment functions
		require_once( PURTHEMECORE . '/widgets.php' ); // load Widget functions
	}
	
	/**
	 * extentions() includes all extentions if they exist
	 *
	 * @since 0.2.3
	 */
	function pureline_extentions() {
		pureline_include_all( PURTHEMEMORE );
	}
	
	/**
	 * defaults() connects WP pureline default behavior to their respective action
	 *
	 * @since 0.2.3
	 */
	function pureline_defaults() {
		add_filter( 'the_generator', 'pureline_remove_generator_link', 1 ); // remove_generator_link() Removes generator link - Credits: (http://www.plaintxt.org)
		add_filter( 'wp_page_menu', 'pureline_menu_ulclass' ); // adds a .nav class to the ul wp_page_menu generates
		add_action( 'init', 'pureline_media' ); // pureline_media() loads scripts and styles
	}
	
	/**
	 * ready() includes user's theme.php if it exists, calls the pureline_init action, includes all pluggable functions and registers widgets
	 *
	 * @since 0.2.3
	 */
	function pureline_ready() {
		if ( file_exists( PURTHEMEMEDIA . '/custom-functions.php' ) ) include_once( PURTHEMEMEDIA . '/custom-functions.php' ); // include custom-functions.php if that file exist
		require_once( PURTHEMECORE . '/pluggable.php' ); // load pluggable functions
		do_action( 'pureline_init' ); // Available action: pureline_init
	}
} // end of WPpureline;
?>