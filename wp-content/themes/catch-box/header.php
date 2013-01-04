<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Catch Themes
 * @subpackage Catch_Box
 * @since Catch Box 1.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_uri(); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed">
	<header id="branding" role="banner">
			<hgroup>
               	<?php
				// Check to see if the header image has been removed
				$header_image = get_header_image();
				if ( ! empty( $header_image ) ) :
				?>
				<h1 id="site-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<img src="<?php header_image(); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
				</a></h1>
				<?php endif; // end check for removed header image ?>
                            
				<h1 id="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h1>
				<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
			</hgroup>

			<?php 
			// Check to see if header search has been disable
			$options = catchbox_get_theme_options();
			if ( $options ['disable_header_search'] == 0 ) :
				get_search_form();
            endif;  ?>

			<nav id="access" role="navigation">
				<h3 class="assistive-text"><?php _e( 'Primary menu', 'catchbox' ); ?></h3>
				<?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
				<div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content', 'catchbox' ); ?>"><?php _e( 'Skip to primary content', 'catchbox' ); ?></a></div>
				<div class="skip-link"><a class="assistive-text" href="#secondary" title="<?php esc_attr_e( 'Skip to secondary content', 'catchbox' ); ?>"><?php _e( 'Skip to secondary content', 'catchbox' ); ?></a></div>
				<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assiged to the primary position is the one used. If none is assigned, the menu with the lowest ID is used. */ ?>
                <?php if ( has_nav_menu( 'primary', 'catchbox' ) ) { 
					wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'menu-header-container' ) );
				} else { ?>
                	<div class="menu-header-container">
						<?php wp_page_menu( array( 'menu_class'  => 'menu' ) ); ?>
                    </div>
				<?php
                } ?>   
			</nav><!-- #access -->
            
			<?php if ( has_nav_menu( 'secondary', 'catchbox' ) ) { ?>
                <nav id="access-secondary" role="navigation">
                	<h3 class="assistive-text"><?php _e( 'Secondary menu', 'catchbox' ); ?></h3>
						<?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
						<div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content', 'catchbox' ); ?>"><?php _e( 'Skip to primary content', 'catchbox' ); ?></a></div>
						<div class="skip-link"><a class="assistive-text" href="#secondary" title="<?php esc_attr_e( 'Skip to secondary content', 'catchbox' ); ?>"><?php _e( 'Skip to secondary content', 'catchbox' ); ?></a></div>
                    <?php wp_nav_menu( array( 'theme_location'  => 'secondary' ) );  ?>
                </nav>
            <?php } ?>
	</header><!-- #branding -->
    
	<div id="main" class="clearfix">

		<div id="primary">
			<div id="content" role="main">
    			<?php 
				// Passing The Slider Value and Running the slider in the Homepage or Front Page only
				if ( is_home() || is_front_page() )  {
					if ( function_exists( 'catchbox_pass_slider_value' ) ) { catchbox_pass_slider_value(); }
            		if ( function_exists( 'catchbox_sliders' ) ) { catchbox_sliders(); } 
				} ?>