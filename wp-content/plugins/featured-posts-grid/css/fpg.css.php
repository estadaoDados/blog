<?php 
    header('content-type: text/css'); 
    define('WP_USE_THEMES', false);
    require_once((dirname(dirname( dirname( dirname ( dirname ( __FILE__ ) ) ) ))).'/wp-config.php');
?>

<?php 
    // Retrieve all admin options
    $fpg_rows = get_option('fpg_rows');
    $fpg_columns = get_option('fpg_columns');

    $fpg_author_display = get_option('fpg_author_display');
    $fpg_date_display = get_option('fpg_date_display');

    $fpg_hover_x_offset = get_option('fpg_hover_x_offset');
    $fpg_hover_y_offset = get_option('fpg_hover_y_offset');

    $fpg_padding_topbottom = get_option('fpg_padding_topbottom');
    $fpg_padding_leftright = get_option('fpg_padding_leftright');
    $fpg_spacing_horizontal = get_option('fpg_spacing_horizontal');

    $fpg_pages_max = get_option('fpg_pages_max');
    $fpg_width = get_option('fpg_width');

    $fpg_item_height = get_option('fpg_item_height');
    $fpg_item_width = get_option('fpg_item_width');

    $fpg_inner_border_width = get_option('fpg_inner_border_width');
    $fpg_inner_border_color = get_option('fpg_inner_border_color');

    $fpg_item_dropshadow_enable = get_option('fpg_item_dropshadow_enable');
    $fpg_text_dropshadow_enable = get_option('fpg_text_dropshadow_enable');
    $fpg_text_inset_dropshadow_enable = get_option('fpg_text_inset_dropshadow_enable');

    $fpg_item_dropshadow_color = get_option('fpg_item_dropshadow_color');
    $fpg_item_dropshadow_alpha = get_option('fpg_item_dropshadow_alpha');
    $fpg_item_dropshadow_x = get_option('fpg_item_dropshadow_x');
    $fpg_item_dropshadow_y = get_option('fpg_item_dropshadow_y');
    $fpg_item_dropshadow_blur = get_option('fpg_item_dropshadow_blur');
    $fpg_item_dropshadow_spread = get_option('fpg_item_dropshadow_spread');

    $fpg_item_dropshadow_hover_color = get_option('fpg_item_dropshadow_hover_color');
    $fpg_item_dropshadow_hover_alpha = get_option('fpg_item_dropshadow_hover_alpha');
    $fpg_item_dropshadow_hover_x = get_option('fpg_item_dropshadow_hover_x');
    $fpg_item_dropshadow_hover_y = get_option('fpg_item_dropshadow_hover_y');
    $fpg_item_dropshadow_hover_blur = get_option('fpg_item_dropshadow_hover_blur');
    $fpg_item_dropshadow_hover_spread = get_option('fpg_item_dropshadow_hover_spread');

    $fpg_text_dropshadow_color = get_option('fpg_text_dropshadow_color');
    $fpg_text_dropshadow_alpha = get_option('fpg_text_dropshadow_alpha');
    $fpg_text_dropshadow_x = get_option('fpg_text_dropshadow_x');
    $fpg_text_dropshadow_y = get_option('fpg_text_dropshadow_y');
    $fpg_text_dropshadow_blur = get_option('fpg_text_dropshadow_blur');
    $fpg_text_dropshadow_spread = get_option('fpg_text_dropshadow_spread');

    $fpg_text_inset_dropshadow_color = get_option('fpg_text_inset_dropshadow_color');
    $fpg_text_inset_dropshadow_alpha = get_option('fpg_text_inset_dropshadow_alpha');
    $fpg_text_inset_dropshadow_x = get_option('fpg_text_inset_dropshadow_x');
    $fpg_text_inset_dropshadow_y = get_option('fpg_text_inset_dropshadow_y');
    $fpg_text_inset_dropshadow_blur = get_option('fpg_text_inset_dropshadow_blur');
    $fpg_text_inset_dropshadow_spread = get_option('fpg_text_inset_dropshadow_spread');

    $fpg_item_border_top_style = get_option('fpg_item_border_top_style');
    $fpg_item_border_top_width = get_option('fpg_item_border_top_width');
    $fpg_item_border_top_color = get_option('fpg_item_border_top_color');

    $fpg_item_border_bottom_style = get_option('fpg_item_border_bottom_style');
    $fpg_item_border_bottom_width = get_option('fpg_item_border_bottom_width');
    $fpg_item_border_bottom_color = get_option('fpg_item_border_bottom_color');
    
    $fpg_item_border_left_style = get_option('fpg_item_border_left_style');
    $fpg_item_border_left_width = get_option('fpg_item_border_left_width');
    $fpg_item_border_left_color = get_option('fpg_item_border_left_color');

    $fpg_item_border_right_style = get_option('fpg_item_border_right_style');
    $fpg_item_border_right_width = get_option('fpg_item_border_right_width');
    $fpg_item_border_right_color = get_option('fpg_item_border_right_color');

    $fpg_item_text_bg_color = get_option('fpg_item_text_bg_color');
    $fpg_item_text_bg_alpha = get_option('fpg_item_text_bg_alpha');

    $fpg_item_text_color = get_option('fpg_item_text_color');
    $fpg_item_text_fontfamily = get_option('fpg_item_text_fontfamily');
    $fpg_item_text_fontstyle = get_option('fpg_item_text_fontstyle');
    $fpg_item_text_fontvariant = get_option('fpg_item_text_fontvariant');
    $fpg_item_text_fontweight = get_option('fpg_item_text_fontweight');
    $fpg_item_text_fontsize = get_option('fpg_item_text_fontsize');
    $fpg_item_text_lineheight = get_option('fpg_item_text_lineheight');

    $fpg_item_excerpt_color = get_option('fpg_item_excerpt_color');
    $fpg_item_excerpt_fontfamily = get_option('fpg_item_excerpt_fontfamily');
    $fpg_item_excerpt_fontstyle = get_option('fpg_item_excerpt_fontstyle');
    $fpg_item_excerpt_fontvariant = get_option('fpg_item_excerpt_fontvariant');
    $fpg_item_excerpt_fontweight = get_option('fpg_item_excerpt_fontweight');
    $fpg_item_excerpt_fontsize = get_option('fpg_item_excerpt_fontsize');
    $fpg_item_excerpt_lineheight = get_option('fpg_item_excerpt_lineheight');

    $fpg_item_author_color = get_option('fpg_item_author_color');
    $fpg_item_author_fontfamily = get_option('fpg_item_author_fontfamily');
    $fpg_item_author_fontstyle = get_option('fpg_item_author_fontstyle');
    $fpg_item_author_fontvariant = get_option('fpg_item_author_fontvariant');
    $fpg_item_author_fontweight = get_option('fpg_item_author_fontweight');
    $fpg_item_author_fontsize = get_option('fpg_item_author_fontsize');
    $fpg_item_author_lineheight = get_option('fpg_item_author_lineheight');

    $fpg_item_date_color = get_option('fpg_item_date_color');
    $fpg_item_date_fontfamily = get_option('fpg_item_date_fontfamily');
    $fpg_item_date_fontstyle = get_option('fpg_item_date_fontstyle');
    $fpg_item_date_fontvariant = get_option('fpg_item_date_fontvariant');
    $fpg_item_date_fontweight = get_option('fpg_item_date_fontweight');
    $fpg_item_date_fontsize = get_option('fpg_item_date_fontsize');
    $fpg_item_date_lineheight = get_option('fpg_item_date_lineheight');

    $fpg_text_border_top_style = get_option('fpg_text_border_top_style');
    $fpg_text_border_top_width = get_option('fpg_text_border_top_width');
    $fpg_text_border_top_color = get_option('fpg_text_border_top_color');

    $fpg_text_border_bottom_style = get_option('fpg_text_border_bottom_style');
    $fpg_text_border_bottom_width = get_option('fpg_text_border_bottom_width');
    $fpg_text_border_bottom_color = get_option('fpg_text_border_bottom_color');

    $fpg_text_border_left_style = get_option('fpg_text_border_left_style');
    $fpg_text_border_left_width = get_option('fpg_text_border_left_width');
    $fpg_text_border_left_color = get_option('fpg_text_border_left_color');

    $fpg_text_border_right_style = get_option('fpg_text_border_right_style');
    $fpg_text_border_right_width = get_option('fpg_text_border_right_width');
    $fpg_text_border_right_color = get_option('fpg_text_border_right_color');

    $fpg_arrow_position = get_option('fpg_arrow_position');
    $fpg_arrow_image = get_option('fpg_arrow_image');
    $fpg_pages_pips_image = get_option('fpg_pages_pips_image');
    $fpg_pages_pips_spacing = get_option('fpg_pages_pips_spacing');
    $fpg_arrow_image_custom_url = get_option('fpg_arrow_image_custom_url');
    $fpg_pages_pips_custom_url = get_option('fpg_pages_pips_custom_url');

    $fpg_images_bg_color = get_option('fpg_images_bg_color');
    $fpg_images_crop = get_option('fpg_images_crop');
    $fpg_images_height_noscale = get_option('fpg_images_height_noscale');
    $fpg_images_width_noscale = get_option('fpg_images_width_noscale');
    $fpg_images_height_fit = get_option('fpg_images_height_fit');
    $fpg_images_width_fit = get_option('fpg_images_width_fit');


    // Format all color hex value strings
    $fpg_item_dropshadow_color = 'rgba('.hex2RGB($fpg_item_dropshadow_color, true).','.$fpg_item_dropshadow_alpha.')';
    $fpg_item_dropshadow_hover_color = 'rgba('.hex2RGB($fpg_item_dropshadow_hover_color, true).','.$fpg_item_dropshadow_hover_alpha.')';
    $fpg_text_dropshadow_color = 'rgba('.hex2RGB($fpg_text_dropshadow_color, true).','.$fpg_text_dropshadow_alpha.')';
    $fpg_text_inset_dropshadow_color = 'rgba('.hex2RGB($fpg_text_inset_dropshadow_color, true).','.$fpg_text_inset_dropshadow_alpha.')';
    $fpg_item_text_color = "#".$fpg_item_text_color;
    $fpg_item_excerpt_color = "#".$fpg_item_excerpt_color;
    $fpg_images_bg_color = "#".$fpg_images_bg_color;
    $fpg_inner_border_color = "#".$fpg_inner_border_color;
    $fpg_item_author_color = "#".$fpg_item_author_color;
    $fpg_item_date_color = "#".$fpg_item_date_color;

    $fpg_text_border_top_color = "#".$fpg_text_border_top_color;
    $fpg_text_border_bottom_color = "#".$fpg_text_border_bottom_color;
    $fpg_text_border_left_color = "#".$fpg_text_border_left_color;
    $fpg_text_border_right_color = "#".$fpg_text_border_right_color;

    $fpg_item_border_top_color = "#".$fpg_item_border_top_color;
    $fpg_item_border_bottom_color = "#".$fpg_item_border_bottom_color;
    $fpg_item_border_left_color = "#".$fpg_item_border_left_color;
    $fpg_item_border_right_color = "#".$fpg_item_border_right_color;

    $fpg_item_text_bg_color_rgba = 'rgba('.hex2RGB($fpg_item_text_bg_color, true).','.$fpg_item_text_bg_alpha.')';
    $fpg_item_text_bg_color_hex = "#".$fpg_item_text_bg_color;

    // Define box shadow
    if ($fpg_item_dropshadow_enable == '1')
    {
        $cell_shadow = $fpg_item_dropshadow_x.'px '.
            $fpg_item_dropshadow_y.'px '.
            $fpg_item_dropshadow_blur.'px '.
            $fpg_item_dropshadow_spread.'px '.
            $fpg_item_dropshadow_color;

        $cell_shadow_hover = $fpg_item_dropshadow_hover_x.'px '.
            $fpg_item_dropshadow_hover_y.'px '.
            $fpg_item_dropshadow_hover_blur.'px '.
            $fpg_item_dropshadow_hover_spread.'px '.
            $fpg_item_dropshadow_hover_color;
    }

    if ($fpg_text_dropshadow_enable == '1')
    {
        $text_shadow .= $fpg_text_dropshadow_x.'px '.
            $fpg_text_dropshadow_y.'px '.
            $fpg_text_dropshadow_blur.'px '.
            $fpg_text_dropshadow_spread.'px '.
            $fpg_text_dropshadow_color;
        
        if ($fpg_text_inset_dropshadow_enable == '1')
        {
            $text_shadow .= ', ';
        }
    }

    if ($fpg_text_inset_dropshadow_enable == '1')
    {
        $text_shadow .= $fpg_text_inset_dropshadow_x.'px '.
            $fpg_text_inset_dropshadow_y.'px '.
            $fpg_text_inset_dropshadow_blur.'px '.
            $fpg_text_inset_dropshadow_spread.'px '.
            $fpg_text_inset_dropshadow_color.' inset';
    }

    if ($fpg_arrow_image == 'custom')
    {
        $arrow_url = $fpg_arrow_image_custom_url;
    }
    else
    {
        $arrow_url = WP_PLUGIN_URL.'/featured-posts-grid/images/arrow-'.$fpg_arrow_image.'.png';
    }

    if ($fpg_pages_pips_image == 'custom')
    {
        $pip_url = $fpg_pages_pips_custom_url;
    }
    else
    {
        $pip_url = WP_PLUGIN_URL.'/featured-posts-grid/images/pip-'.$fpg_pages_pips_image.'.png';
    }
    

    
?>





.fpg-wrapper {
padding: <?php echo $fpg_padding_topbottom ?>px <?php echo $fpg_padding_leftright ?>px;
width: <?php echo $fpg_width ?>;
}



.fpg-page {
}



ul.fpg-row {
height: <?php echo ($fpg_item_height + ($fpg_inner_border_width * 2) + $fpg_item_border_bottom_width + $fpg_item_border_top_width) ?>px;
padding-left: <?php echo ($fpg_item_width + ($fpg_inner_border_width * 2) + $fpg_item_border_left_width + $fpg_item_border_right_width) ?>px;
padding-bottom: <?php echo $fpg_spacing_horizontal ?>px;
}

ul.fpg-row.fpg-last-row {
padding-bottom: 0px;
}



li.fpg-item {
height: <?php echo $fpg_item_height ?>px;
width: <?php echo (100.0 / ($fpg_columns - 1)) ?>%
}



li.fpg-item.fpg-first-col {
width: <?php echo ($fpg_item_width) ?>px;
margin-left: <?php echo (-1 * ( $fpg_item_width ) ) ?>px;
}

li.fpg-item.fpg-last-col {
width: <?php echo floor(100.0 / ($fpg_columns - 1)) ?>%
}



.fpg-item-wrapper {
height: <?php echo $fpg_item_height ?>px;
width: <?php echo $fpg_item_width ?>px;

border-top: <?php echo $fpg_item_border_top_style ?> <?php echo $fpg_item_border_top_width ?>px <?php echo $fpg_item_border_top_color ?>;
border-bottom: <?php echo $fpg_item_border_bottom_style ?> <?php echo $fpg_item_border_bottom_width ?>px <?php echo $fpg_item_border_bottom_color ?>;
border-right: <?php echo $fpg_item_border_right_style ?> <?php echo $fpg_item_border_right_width ?>px <?php echo $fpg_item_border_right_color ?>;
border-left: <?php echo $fpg_item_border_left_style ?> <?php echo $fpg_item_border_left_width ?>px <?php echo $fpg_item_border_left_color ?>;

-moz-box-shadow: <?php echo $cell_shadow ?>; 
-webkit-box-shadow: <?php echo $cell_shadow ?>; 
box-shadow: <?php echo $cell_shadow ?>;

background: <?php echo $fpg_inner_border_color ?>;
padding: <?php echo $fpg_inner_border_width ?>px;
}

.fpg-item-wrapper:hover {
margin-top: <?php echo $fpg_hover_x_offset ?>px;
margin-right: <?php echo ($fpg_hover_y_offset * -1) ?>px;

-moz-box-shadow: <?php echo $cell_shadow_hover ?>; 
-webkit-box-shadow: <?php echo $cell_shadow_hover ?>;
box-shadow: <?php echo $cell_shadow_hover ?>;
}



img.fpg-image {
<?php if ($fpg_images_height_fit == '1') : ?>
height: <?php echo ($fpg_item_height) ?>px;
<?php endif; ?>
<?php if ($fpg_images_width_fit == '1') : ?>
width: <?php echo ($fpg_item_width) ?>px;
<?php endif; ?>

}



.fpg-text {
width: <?php echo ($fpg_item_width-10) ?>px;
background: <?php echo $fpg_item_text_bg_color_hex ?>; 
background: <?php echo $fpg_item_text_bg_color_rgba ?>;

border-top: <?php echo $fpg_text_border_top_style ?> <?php echo $fpg_text_border_top_width ?>px <?php echo $fpg_text_border_top_color ?>;
border-bottom: <?php echo $fpg_text_border_bottom_style ?> <?php echo $fpg_text_border_bottom_width ?>px <?php echo $fpg_text_border_bottom_color ?>;
border-right: <?php echo $fpg_text_border_right_style ?> <?php echo $fpg_text_border_right_width ?>px <?php echo $fpg_text_border_right_color ?>;
border-left: <?php echo $fpg_text_border_left_style ?> <?php echo $fpg_text_border_left_width ?>px <?php echo $fpg_text_border_left_color ?>;

-moz-box-shadow: <?php echo $text_shadow ?>; 
-webkit-box-shadow: <?php echo $text_shadow ?>; 
box-shadow: <?php echo $text_shadow ?>;

margin: 0px <?php echo $fpg_inner_border_width ?>px <?php echo $fpg_inner_border_width ?>px <?php echo $fpg_inner_border_width ?>px;
}



h3.fpg-title, h3.fpg-title a:link, h3.fpg-title a:visited, h3.fpg-title a:active {
color: <?php echo $fpg_item_text_color ?>;
font-family: <?php echo $fpg_item_text_fontfamily ?>;
font-style: <?php echo $fpg_item_text_fontstyle ?>;
font-variant: <?php echo $fpg_item_text_fontvariant ?>;
font-weight: <?php echo $fpg_item_text_fontweight ?>;
font-size: <?php echo $fpg_item_text_fontsize ?>;
line-height: <?php echo $fpg_item_text_lineheight ?>;
}


p.fpg-excerpt, p.fpg-excerpt a:link, p.fpg-excerpt a:visited, p.fpg-excerpt a:active {
color: <?php echo $fpg_item_excerpt_color ?>;
font-family: <?php echo $fpg_item_excerpt_fontfamily ?>;
font-style: <?php echo $fpg_item_excerpt_fontstyle ?>;
font-variant: <?php echo $fpg_item_excerpt_fontvariant ?>;
font-weight: <?php echo $fpg_item_excerpt_fontweight ?>;
font-size: <?php echo $fpg_item_excerpt_fontsize ?>;
line-height: <?php echo $fpg_item_excerpt_lineheight ?>;
}


p.fpg-author, p.fpg-author a:link, p.fpg-author a:visited, p.fpg-author a:active {
color: <?php echo $fpg_item_author_color ?>;
font-family: <?php echo $fpg_item_author_fontfamily ?>;
font-style: <?php echo $fpg_item_author_fontstyle ?>;
font-variant: <?php echo $fpg_item_author_fontvariant ?>;
font-weight: <?php echo $fpg_item_author_fontweight ?>;
font-size: <?php echo $fpg_item_author_fontsize ?>;
line-height: <?php echo $fpg_item_author_lineheight ?>;
}


p.fpg-date, p.fpg-date a:link, p.fpg-date a:visited, p.fpg-date a:active {
color: <?php echo $fpg_item_date_color ?>;
font-family: <?php echo $fpg_item_date_fontfamily ?>;
font-style: <?php echo $fpg_item_date_fontstyle ?>;
font-variant: <?php echo $fpg_item_date_fontvariant ?>;
font-weight: <?php echo $fpg_item_date_fontweight ?>;
font-size: <?php echo $fpg_item_date_fontsize ?>;
line-height: <?php echo $fpg_item_date_lineheight ?>;
float: <?php if ($fpg_author_display == '1') { echo 'right'; } else { echo 'left'; } ?>;
}


.fpg-arrow-left, 
.fpg-arrow-right {
background-image: url(<?php echo $arrow_url ?>);
}

.fpg-arrow-pip {
width: <?php echo $fpg_pages_pips_spacing ?>px;
background-image: url(<?php echo $pip_url ?>);
}

ul.fpg-row li.fpg-item .fpg-item-wrapper a {
background: <?php echo $fpg_images_bg_color ?>;
}



<?php

/* Convert a hex RGB string into individual RGB decimal values */
function hex2RGB($hexStr, $returnAsString = false, $seperator = ',') {
    $hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); // Gets a proper hex string
    $rgbArray = array();
    if (strlen($hexStr) == 6) { //If a proper hex code, convert using bitwise operation. No overhead... faster
        $colorVal = hexdec($hexStr);
        $rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
        $rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
        $rgbArray['blue'] = 0xFF & $colorVal;
    } elseif (strlen($hexStr) == 3) { //if shorthand notation, need some string manipulations
        $rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
        $rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
        $rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
    } else {
        return false; //Invalid hex color code
    }
    return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray; // returns the rgb string or the associative array
}

?>