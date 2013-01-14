<?php
/*
Plugin Name: Featured Posts Grid
Plugin URI: http://chasepettit.com
Description: A javascript based display of post titles and thumbnails in a grid layout.
Version: 1.7
Author: Chaser324
Author URI: http://chasepettit.com
License: GNU GPL2

/*  Copyright 2011  Chase Pettit  (email : chasepettit@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


// Register activate/deactivate hooks for the plugin
register_activation_hook( __FILE__, 'fpg_activate' );
register_deactivation_hook( __FILE__, 'fpg_deactivate' );

//Create menu for configure page
add_action('admin_menu', 'fpg_admin_actions');

//Add the necessary stylesheet & script
add_action('wp_print_styles', 'fpg_add_style');
add_action('init', 'fpg_add_script');

// Register new image thumbnail sizes
add_action('admin_init', 'fpg_define_image_sizes');

// Array of pairs of variable names and default values.
global $fpg_variables;
$fpg_variables = array (
    'fpg_rows' => '1',
    'fpg_columns' => '3',

    'fpg_excerpt_display' => '0',
    'fpg_author_display' => '0',
    'fpg_date_display' => '0',

    'fpg_padding_topbottom' => '15',
    'fpg_padding_leftright' => '15',
    'fpg_spacing_horizontal' => '15',

    'fpg_hover_x_offset' => '2',
    'fpg_hover_y_offset' => '2',

    'fpg_pages_max' => '1',
    'fpg_width' => '100%',

    'fpg_item_height' => '100',
    'fpg_item_width' => '100',

    'fpg_page_speed' => '150',

    'fpg_item_dropshadow_enable' => '1',
    'fpg_text_dropshadow_enable' => '1',
    'fpg_text_inset_dropshadow_enable' => '1',

    'fpg_item_dropshadow_color' => '000000',
    'fpg_item_dropshadow_alpha' => '0.5',
    'fpg_item_dropshadow_x' => '2',
    'fpg_item_dropshadow_y' => '2',
    'fpg_item_dropshadow_blur' => '2',
    'fpg_item_dropshadow_spread' => '2',

    'fpg_item_dropshadow_hover_color' => '000000',
    'fpg_item_dropshadow_hover_alpha' => '0.5',
    'fpg_item_dropshadow_hover_x' => '0',
    'fpg_item_dropshadow_hover_y' => '0',
    'fpg_item_dropshadow_hover_blur' => '0',
    'fpg_item_dropshadow_hover_spread' => '0',

    'fpg_text_dropshadow_color' => '000000',
    'fpg_text_dropshadow_alpha' => '0.5',
    'fpg_text_dropshadow_x' => '2',
    'fpg_text_dropshadow_y' => '2',
    'fpg_text_dropshadow_blur' => '2',
    'fpg_text_dropshadow_spread' => '2',

    'fpg_text_inset_dropshadow_color' => '000000',
    'fpg_text_inset_dropshadow_alpha' => '0.5',
    'fpg_text_inset_dropshadow_x' => '2',
    'fpg_text_inset_dropshadow_y' => '2',
    'fpg_text_inset_dropshadow_blur' => '2',
    'fpg_text_inset_dropshadow_spread' => '2',

    'fpg_item_border_top_style' => 'solid',
    'fpg_item_border_top_width' => '1',
    'fpg_item_border_top_color' => '525252',
    'fpg_item_border_bottom_style' => 'solid',
    'fpg_item_border_bottom_width' => '1',
    'fpg_item_border_bottom_color' => '000000',
    'fpg_item_border_left_style' => 'solid',
    'fpg_item_border_left_width' => '1',
    'fpg_item_border_left_color' => '525252',
    'fpg_item_border_right_style' => 'solid',
    'fpg_item_border_right_width' => '1',
    'fpg_item_border_right_color' => '000000',

    'fpg_inner_border_width' => '0',
    'fpg_inner_border_color' => 'FFFFFF',

    'fpg_item_text_bg_color' => '000000',
    'fpg_item_text_bg_alpha' => '0.5',

    'fpg_item_text_color' => 'FFFFFF',
    'fpg_item_text_fontfamily' => 'Arial, Veranda, sans-serif',
    'fpg_item_text_fontstyle' => 'normal',
    'fpg_item_text_fontvariant' => 'normal',
    'fpg_item_text_fontweight' => 'bold',
    'fpg_item_text_fontsize' => '12px',
    'fpg_item_text_lineheight' => '12px',

    'fpg_item_excerpt_color' => 'FFFFFF',
    'fpg_item_excerpt_fontfamily' => 'Arial, Veranda, sans-serif',
    'fpg_item_excerpt_fontstyle' => 'normal',
    'fpg_item_excerpt_fontvariant' => 'normal',
    'fpg_item_excerpt_fontweight' => 'normal',
    'fpg_item_excerpt_fontsize' => '10px',
    'fpg_item_excerpt_lineheight' => '10px',

    'fpg_item_author_color' => 'FFFFFF',
    'fpg_item_author_fontfamily' => 'Arial, Veranda, sans-serif',
    'fpg_item_author_fontstyle' => 'normal',
    'fpg_item_author_fontvariant' => 'normal',
    'fpg_item_author_fontweight' => 'normal',
    'fpg_item_author_fontsize' => '8px',
    'fpg_item_author_lineheight' => '8px',

    'fpg_item_date_color' => 'FFFFFF',
    'fpg_item_date_fontfamily' => 'Arial, Veranda, sans-serif',
    'fpg_item_date_fontstyle' => 'normal',
    'fpg_item_date_fontvariant' => 'normal',
    'fpg_item_date_fontweight' => 'normal',
    'fpg_item_date_fontsize' => '8px',
    'fpg_item_date_lineheight' => '8px',

    'fpg_text_border_top_style' => 'solid',
    'fpg_text_border_top_width' => '0',
    'fpg_text_border_top_color' => '000000',
    'fpg_text_border_bottom_style' => 'solid',
    'fpg_text_border_bottom_width' => '0',
    'fpg_text_border_bottom_color' => '000000',
    'fpg_text_border_left_style' => 'solid',
    'fpg_text_border_left_width' => '0',
    'fpg_text_border_left_color' => '',
    'fpg_text_border_right_style' => 'solid',
    'fpg_text_border_right_width' => '0',
    'fpg_text_border_right_color' => '000000',

    'fpg_arrow_position' => 'below',
    'fpg_arrow_image' => 'orange',
    'fpg_pages_pips_image' => 'orange',
    'fpg_pages_pips_spacing' => '30',
    'fpg_arrow_image_custom_url' => '',
    'fpg_pages_pips_custom_url' => '',

    'fpg_images_bg_color' => '000000',
    'fpg_images_crop' => '1',
    'fpg_images_height_noscale' => '0',
    'fpg_images_width_noscale' => '0',
    'fpg_images_height_fit' => '1',
    'fpg_images_width_fit' => '1',

    'fpg_autoscroll' => '0',
    'fpg_scroll_interval' => '7000',
    'fpg_rollover' => '0',

    'fpg_enable_static_caching' => '0'
);

/* Activate the plugin by creating/initializing all options */
function fpg_activate()
{
    global $fpg_variables;

    foreach ($fpg_variables as $var=>$default) {
        $current_value = get_option($var);
        if ( empty($current_value) ) {
            update_option($var, $default);
        }
    }

    // Try resolving possible issue introduced in 1.6
    $interval_val = get_option('fpg_scroll_interval');
    if (!is_numeric($interval_val))
    {
        update_option('fpg_scroll_interval', '7000');
    }

    if (get_option('fpg_enable_static_caching') == '1')
    {
        ob_start();

            include(WP_PLUGIN_DIR.'/featured-posts-grid/js/fpg.js.php');

            $file_contents = ob_get_contents();
            $file_path = WP_PLUGIN_DIR.'/featured-posts-grid/js/fpg.js';
            $ret_val = file_put_contents($file_path, $file_contents);
            
        ob_end_clean();

        ob_start();

            include(WP_PLUGIN_DIR.'/featured-posts-grid/css/fpg.css.php');

            $file_contents = ob_get_contents();
            $file_path = WP_PLUGIN_DIR.'/featured-posts-grid/css/fpg.css';
            $ret_val = file_put_contents($file_path, $file_contents);
            
        ob_end_clean();
    }
}

/* Deactivate plugin by deleting all option data */
function fpg_deactivate()
{
    global $fpg_variables;

    foreach ($fpg_variables as $var) {
        delete_option($var);
    }
}

/* Setup menu page creation */
function fpg_admin_actions()
{
    $page = add_menu_page('Featured Posts Grid', 'Featured Posts Grid', 'manage_options', 'featured-posts-grid', 'fpg_admin');
    
    add_action( 'admin_print_styles-' . $page, 'fpg_menu_styles' );
}

/* Display the admin page if user has permissions */
function fpg_admin() {
    if ( !current_user_can('manage_options') )
        wp_die( __('You do not have sufficient permissions to access this page.') );
    include('featured-posts-grid-admin.php');
}

/* Enqueue stylesheets needed on the admin page */
function fpg_menu_styles()
{
    wp_enqueue_style( 'jcolorpicker-style', WP_PLUGIN_URL.'/featured-posts-grid/css/colorpicker.css' );
    wp_enqueue_style( 'jquery-ui-tabs-css','http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/cupertino/jquery-ui.css' );
}

/* Enqueue styles necessary for the plugin */
function fpg_add_style()
{
    wp_enqueue_style('fpg-style', WP_PLUGIN_URL.'/featured-posts-grid/css/featured-posts-grid.css');

    if (get_option('fpg_enable_static_caching') == '1' && file_exists(WP_PLUGIN_DIR.'/featured-posts-grid/css/fpg.css'))
    {
        wp_enqueue_style('fpg-style-dynamic', WP_PLUGIN_URL.'/featured-posts-grid/css/fpg.css');
    }
    else
    {
        wp_enqueue_style('fpg-style-dynamic', WP_PLUGIN_URL.'/featured-posts-grid/css/fpg.css.php');
    }
}

/* Enqueue scripts necessary for the plugin */
function fpg_add_script()
{
    if (!is_admin()) {
        wp_enqueue_script('jquery');

        if(get_option('fpg_enable_static_caching') == '1' && file_exists(WP_PLUGIN_DIR.'/featured-posts-grid/js/fpg.js'))
        {
            wp_enqueue_script('fpg-js-dynamic', WP_PLUGIN_URL.'/featured-posts-grid/js/fpg.js');
        }
        else
        {
            wp_enqueue_script('fpg-js-dynamic', WP_PLUGIN_URL.'/featured-posts-grid/js/fpg.js.php');
        }
    }
    else {
        wp_enqueue_script('jquery');
        wp_enqueue_script('jquery-ui-core');
        wp_enqueue_script('jquery-ui-tabs');
        wp_enqueue_script('featuredpostsgrid-admin', WP_PLUGIN_URL.'/featured-posts-grid/js/fpg-admin.js');
        wp_enqueue_script('jcolorpicker', WP_PLUGIN_URL.'/featured-posts-grid/js/colorpicker.js');
        wp_enqueue_script('admincolors', WP_PLUGIN_URL.'/featured-posts-grid/js/admincolors.js');
    }
}

/* Define image sizes used by the plugin */
function fpg_define_image_sizes()
{
    //add_theme_support( 'post-thumbnails' ); // Add support for posts
    $item_height = get_option('fpg_item_height');
    $item_width = get_option('fpg_item_width');
    $item_image_crop = get_option('fpg_images_crop');
    $item_image_height_noscale = get_option('fpg_images_height_noscale');
    $item_image_width_noscale = get_option('fpg_images_width_noscale');

    $item_image_crop_bool = true;
    if ($item_image_crop == '0')
    {
        $item_image_crop_bool = false;
    }

    if ($item_image_height_noscale == '1' && $item_image_crop_bool == false)
    {
        $item_height = 9999;
    }

    if ($item_image_width_noscale == '1' && $item_image_crop_bool == false)
    {
        $item_width = 9999;
    }

    add_image_size( 'fpg-item', ($item_width), ($item_height), $item_image_crop_bool );
}

/* Generate the plugin display */
function fpg_show($atts)
{
    $fpg_rows = get_option('fpg_rows');
    $fpg_columns = get_option('fpg_columns');
    $fpg_pages_max = get_option('fpg_pages_max');
    $fpg_arrow_position = get_option('fpg_arrow_position');
    $fpg_pages_pips_spacing = get_option('fpg_pages_pips_spacing');

    $items_per_page = ($fpg_rows * $fpg_columns);

    $fpg_excerpt_display = get_option('fpg_excerpt_display');
    $fpg_author_display = get_option('fpg_author_display');
    $fpg_date_display = get_option('fpg_date_display');

    // Make sure max pages is a valid number
    if ($fpg_pages_max <= 0)
    {
        $fpg_pages_max = 1;
    }

    // Calculate max number of posts to retrieve in query
    $max_posts = ($fpg_rows * $fpg_columns * $fpg_pages_max);  

    // Generate arguments for query
    $post_details = NULL;
    if ($atts == NULL)
    {
        $args = array(
            'numberposts'     => $max_posts,
            'offset'          => 0,
            'category'        => '',
            'orderby'         => 'post_date',
            'order'           => 'DESC',
            'include'         => '',
            'exclude'         => '',
            'post_type'       => 'post',
            'tag'             => '',
            'post_status'     => 'publish' );
    }
    else
    {
        $args = $atts;
        $args['numberposts'] = $max_posts;
        $args['post_status'] = 'publish';
    }
    $recent_posts = get_posts( $args );

    if ( count($recent_posts)< $max_posts )
    {
        $max_posts = count($recent_posts);
    }

    if ($fpg_pages_max > 1 &&
        $max_posts > $items_per_page &&
        $fpg_arrow_position == 'above')
    {
        $output .= '<div class="fpg-arrow-wrapper">'."\n";
            $output .= '<div class="fpg-arrow-left"></div>'."\n";
                for ($i=0; $i < ($max_posts / $items_per_page); $i++)
                {
                    $output .= '<div class="fpg-arrow-pip"></div>';
                }
            $output .= '<div class="fpg-arrow-right"></div>'."\n";
        $output .= '</div>'."\n";
    }

    // Save currently selected post if one exists
    global $post;
    $temp_post = $post;

    // Get details for each article retrieved in query
    foreach ( $recent_posts as $key=>$val ) 
    {
        setup_postdata($val);
        $post_details[$key]['post_title'] = $val->post_title;
        $post_details[$key]['post_excerpt'] = $val->post_excerpt;
        $post_details[$key]['post_author'] = get_userdata($val->post_author);
        $post_details[$key]['post_date'] = $val->post_date;
        $post_details[$key]['post_permalink'] = get_permalink($val->ID);
        if (has_post_thumbnail($val->ID))
        {
            $post_details[$key]['post_img_src'] = wp_get_attachment_image_src( get_post_thumbnail_id($val->ID), 'fpg-item');
        }
        else
        {
            $post_details[$key]['post_img_src'][0] = '';
        }
    }

    // Restore previous post data if there was any.
    if ($temp_post != NULL)
    {
        $post = $temp_post;
        setup_postdata($post);
    }
    
    $entry_number = 0;

    // Generate the main output.
    $output .= '<!--Featured Posts Grid-->'."\n";
    $output .= '<div class="fpg-wrapper">'."\n";
    
    for ( $i = 0; ($i * $items_per_page) < $max_posts; $i++ ) // loop over pages / post total
    {
        // Start of Page
        if ($i == 0)
        {
            $output .= '<div class="fpg-page">'."\n";
        }
        else
        {
            $output .= '<div class="fpg-page" style="display: none;">'."\n";
        }

        for( $j = 0; $j < $fpg_rows; $j++ ) // loop - rows
        {
            // Start of Row
            if ( ($j == ($fpg_rows - 1)) && ($j == 0) )
            {
                $output .= '<ul class="fpg-row fpg-first-row fpg-last-row">'."\n";    
            }
            else if ($j == ($fpg_rows - 1))
            {
                $output .= '<ul class="fpg-row fpg-last-row">'."\n";    
            }
            else if ($j == 0)
            {
                $output .= '<ul class="fpg-row fpg-first-row">'."\n";
            }
            else 
            {
                $output .= '<ul class="fpg-row">'."\n";    
            }

            for( $k = 0; $k < $fpg_columns; $k++ ) // loop - columns
            {
                if ($entry_number < $max_posts)
                {
                    $post_permalink = $post_details[$entry_number]['post_permalink'];
                    $post_title = $post_details[$entry_number]['post_title'];
                    $post_excerpt = $post_details[$entry_number]['post_excerpt'];
                    $post_author = $post_details[$entry_number]['post_author'];
                    $post_date = $post_details[$entry_number]['post_date'];
                    $post_img = $post_details[$entry_number]['post_img_src'][0];

                    if ( ($k == 0) && ($k == ($fpg_columns - 1)) )
                    {
                        $output .= '<li class="fpg-item fpg-first-col fpg-last-col">'."\n";
                    }
                    else if ($k == 0)
                    {
                        $output .= '<li class="fpg-item fpg-first-col">'."\n";
                    }
                    else if ($k == ($fpg_columns - 1))
                    {
                        $output .= '<li class="fpg-item fpg-last-col">'."\n";    
                    }
                    else 
                    {
                        $output .= '<li class="fpg-item">'."\n";    
                    }
                    
                        $output .= '<div class="fpg-item-wrapper">'."\n";
                            $output .= '<a href="'.$post_permalink.'">'."\n";

                                $output .= '<img class="fpg-image" src="'.$post_img.'" />'."\n";
                                $output .= '<div class="fpg-text">'."\n";
                                    $output .= '<h3 class="fpg-title">'.$post_title.'</h3>'."\n";

                                    if ($fpg_excerpt_display == '1')
                                    {
                                        $output .= '<p class="fpg-excerpt">'.$post_excerpt.'</p>'."\n";
                                    }

                                    if ($fpg_author_display == '1' || $fpg_date_display == '1')
                                    {
                                        $output .= '<div class="fpg-byline-wrapper">';

                                        if ($fpg_author_display == '1')
                                        {
                                            $output .= '<p class="fpg-author">'.$post_author->display_name.'</p>'."\n";
                                        }

                                        if ($fpg_date_display == '1')
                                        {
                                            $output .= '<p class="fpg-date">'.mysql2date('M j Y', $post_date).'</p>'."\n";
                                        }

                                        $output .= '</div>';
                                    }                                    

                                $output .= '</div>'."\n";

                            $output .= '</a>'."\n";
                        $output .= '</div>'."\n";
                    $output .= '</li>'."\n";

                    $entry_number++;
                }            
            }

            // End of Row
            $output .= '</ul>'."\n\n";
        }

        // End of Page
        $output .= '</div>'."\n\n\n";
    }

    if ($fpg_pages_max > 1 &&
        $max_posts > $items_per_page &&
        $fpg_arrow_position == 'below')
    {
        $output .= '<div class="fpg-arrow-wrapper" style="width: '.(72 + ceil($max_posts / $items_per_page) * $fpg_pages_pips_spacing).'px">'."\n";
            $output .= '<div class="fpg-arrow-left"></div>'."\n";                
            $output .= '<div class="fpg-arrow-right"></div>'."\n";
            for ($i=0; $i < ($max_posts / $items_per_page); $i++)
            {
                if ($i != 0)
                {
                    $output .= '<div class="fpg-arrow-pip">'.($i + 1).'</div>';
                }
                else
                {
                    $output .= '<div class="fpg-selected-pip fpg-arrow-pip">'.($i + 1).'</div>';
                }
            }
        $output .= '</div>'."\n";
    }

    $output .= '</div>'."\n";

    return $output;
}

// Handle short code
function fpg_shortcode_handler($atts)
{
    return fpg_show($atts);
}

// Add the short code [fpg]
add_shortcode('fpg', 'fpg_shortcode_handler');

?>