<?php 
    include(WP_PLUGIN_DIR.'/featured-posts-grid/fpg-generate-output.php');

    $fpg_rows = get_option('fpg_rows');
    $fpg_columns = get_option('fpg_columns');

    $fpg_excerpt_display = get_option('fpg_excerpt_display');
    $fpg_author_display = get_option('fpg_author_display');
    $fpg_date_display = get_option('fpg_date_display');

    $fpg_hover_x_offset = get_option('fpg_hover_x_offset');
    $fpg_hover_y_offset = get_option('fpg_hover_y_offset');

    $fpg_padding_topbottom = get_option('fpg_padding_topbottom');
    $fpg_padding_leftright = get_option('fpg_padding_leftright');
    $fpg_spacing_horizontal = get_option('fpg_spacing_horizontal');

    $fpg_pages_max = get_option('fpg_pages_max');
    $fpg_width = get_option('fpg_width');

    $fpg_page_speed = get_option('fpg_page_speed');

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
    //$fpg_pages_pips_spacing = get_option('fpg_pages_pips_spacing');
    $fpg_arrow_image_custom_url = get_option('fpg_arrow_image_custom_url');
    $fpg_pages_pips_custom_url = get_option('fpg_pages_pips_custom_url');

    $fpg_images_bg_color = get_option('fpg_images_bg_color');
    $fpg_images_crop = get_option('fpg_images_crop');
    $fpg_images_height_noscale = get_option('fpg_images_height_noscale');
    $fpg_images_width_noscale = get_option('fpg_images_width_noscale');
    $fpg_images_height_fit = get_option('fpg_images_height_fit');
    $fpg_images_width_fit = get_option('fpg_images_width_fit');

    $fpg_autoscroll = get_option('fpg_autoscroll');
    $fpg_scroll_interval = get_option('fpg_scroll_interval');
    $fpg_rollover = get_option('fpg_rollover');

    $fpg_enable_static_caching = get_option('fpg_enable_static_caching');
?>

<div class="wrap">
<?php    echo "<h2>" . __( 'Featured Posts Grid Options', 'fpg_opt' ) . "</h2>"; ?>

<form name="fpg_form" method="post" action="">
    <input type="hidden" name="fpg_opt_hidden" value="Y">


    <div class="ui-tabs" id="tabs">
        <ul class="ui-tabs-nav">
            <li><a href="#tabs-1">Main Options</a></li>
            <li><a href="#tabs-2">Grid Cell Options</a></li>
            <li><a href="#tabs-3">Text</a></li>
            <li><a href="#tabs-4">Drop Shadows</a></li>
            <li><a href="#tabs-5">Corners and Borders</a></li>
            <li><a href="#tabs-6">Image</a></li>
        </ul>


        <div class="ui-tabs-panel" id="tabs-1">
            <h3>Main Options</h3>
            <table class="form-table">
                <tbody>
                    <tr valign="top">
                        <th scope="row">Grid Dimensions</th>
                        <td>
                        <fieldset>
                            <input type="text" name="fpg_rows" size="5" value="<?php echo $fpg_rows; ?>" />
                            <?php _e("Rows"); ?>
                            <br />

                            <input type="text" name="fpg_columns" size="5" value="<?php echo $fpg_columns; ?>" />
                            <?php _e("Columns"); ?>
                            <br />
                            
                            <input type="text" name="fpg_pages_max" size="5" value="<?php echo $fpg_pages_max; ?>" />
                            <?php _e("Max Pages"); ?>
                            <br />                 
                        </fieldset>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row">Display Elements</th>
                        <td>
                            <fieldset>

                                <?php if($fpg_excerpt_display == 1){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                                <input type="checkbox" name="fpg_excerpt_display" value="true" <?php echo $checked; ?>><?php _e(" Post Excerpt"); ?>
                                <br />

                                <?php if($fpg_author_display == 1){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                                <input type="checkbox" name="fpg_author_display" value="true" <?php echo $checked; ?>><?php _e(" Post Author"); ?>
                                <br />

                                <?php if($fpg_date_display == 1){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                                <input type="checkbox" name="fpg_date_display" value="true" <?php echo $checked; ?>><?php _e(" Post Date"); ?>
                                <br />

                            </fieldset>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row">Performance Options</th>
                        <td>
                            <fieldset>
                                <legend class="hidden">Performance</legend>

                                <?php if($fpg_enable_static_caching == 1){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                                <input type="checkbox" name="fpg_enable_static_caching" value="true" <?php echo $checked; ?>><?php _e(" Cache CSS and JS files (Experimental. Disable if plugin does not function correctly."); ?>
                                <br />

                            </fieldset>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row">Spacing</th>
                        <td>
                        <fieldset>
                            <input type="text" name="fpg_padding_topbottom" size="5" value="<?php echo $fpg_padding_topbottom; ?>" />
                            <?php _e("Grid Padding Top/Bottom (px)"); ?>
                            <br />

                            <input type="text" name="fpg_padding_leftright" size="5" value="<?php echo $fpg_padding_leftright; ?>" />
                            <?php _e("Grid Padding Left/Right (px)"); ?>
                            <br />

                            <input type="text" name="fpg_spacing_horizontal" size="5" value="<?php echo $fpg_spacing_horizontal; ?>" />
                            <?php _e("Space Between Rows (px)"); ?>
                            <br />

                            <!--<input type="text" name="fpg_pages_pips_spacing" maxlength="5" size="5" value="<?php echo $fpg_pages_pips_spacing; ?>" />
                            <?php _e("Page Pip Width (px)"); ?>
                            <br />-->
                        </fieldset>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row">Hover Animation</th>
                        <td>
                        <fieldset>
                            <input type="text" name="fpg_hover_x_offset" size="5" value="<?php echo $fpg_hover_x_offset; ?>" />
                            <?php _e("X Offset (px)"); ?>
                            <br />

                            <input type="text" name="fpg_hover_y_offset" size="5" value="<?php echo $fpg_hover_y_offset; ?>" />
                            <?php _e("Y Offset (px)"); ?>
                            <br />             
                        </fieldset>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row">Page Turn Animation</th>
                        <td>
                        <fieldset>
                            <input type="text" name="fpg_page_speed" size="5" value="<?php echo $fpg_page_speed; ?>" />
                            <?php _e("Animation Speed (Lower Number = Faster)"); ?>
                            <br />   
                        </fieldset>
                        </td>
                    </tr>






                    <tr valign="top">
                        <th scope="row">Scrolling</th>
                        <td>
                        <fieldset>
                            <legend class="hidden">Scrolling</legend>
                            <?php if($fpg_autoscroll == 1){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                            <input type="checkbox" name="fpg_autoscroll" value="true" <?php echo $checked; ?>><?php _e(" Automatically Scroll Posts"); ?>
                            <br />

                            <input type="text" name="fpg_scroll_interval" maxlength="5" size="5" value="<?php echo $fpg_scroll_interval; ?>" />
                            <?php _e("Autoscroll Interval (milliseconds)"); ?>
                            <br />

                            <?php if($fpg_rollover == 1){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                            <input type="checkbox" name="fpg_rollover" value="true" <?php echo $checked; ?>><?php _e(" Rollover Scrolling (scroll off one end back around to the other)"); ?>
                            <br />
                        </fieldset>
                        </td>
                    </tr>






                    <tr valign="top">
                        <th scope="row">Grid Width</th>
                        <td>
                        <fieldset>
                            <input type="text" name="fpg_width" size="5" value="<?php echo $fpg_width; ?>" />
                            <?php _e("(include units)"); ?>
                            <br />           
                        </fieldset>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row">Arrows/Pips Position</th>
                        <td>
                            <select name="fpg_arrow_position">
                                <option value="above" <?php if($fpg_arrow_position=="above"){echo 'selected';} ?>>Above</option>
                                <option value="below" <?php if($fpg_arrow_position=="below"){echo 'selected';} ?>>Below</option>
                            </select>                   
                        </td>
                    </tr>







                    <tr valign="top">
                        <th scope="row">Arrow Color</th>
                        <td>
                            <select name="fpg_arrow_image">
                                <option value="orange" <?php if($fpg_arrow_image=="orange"){echo 'selected';} ?>>Orange</option>
                                <option value="green" <?php if($fpg_arrow_image=="green"){echo 'selected';} ?>>Green</option>
                                <option value="black" <?php if($fpg_arrow_image=="black"){echo 'selected';} ?>>Black</option>                 
                                <option value="blue" <?php if($fpg_arrow_image=="blue"){echo 'selected';} ?>>Blue</option>
                                <option value="pink" <?php if($fpg_arrow_image=="pink"){echo 'selected';} ?>>Pink</option>
                                <option value="red" <?php if($fpg_arrow_image=="red"){echo 'selected';} ?>>Red</option>
                                <option value="yellow" <?php if($fpg_arrow_image=="yellow"){echo 'selected';} ?>>Yellow</option>
                                <option value="dark-blue" <?php if($fpg_arrow_image=="dark-blue"){echo 'selected';} ?>>Dark Blue</option>
                                <option value="dark-green" <?php if($fpg_arrow_image=="dark-green"){echo 'selected';} ?>>Dark Green</option>
                                <option value="dark-grey" <?php if($fpg_arrow_image=="dark-grey"){echo 'selected';} ?>>Dark Grey</option>
                                <option value="dark-red" <?php if($fpg_arrow_image=="dark-red"){echo 'selected';} ?>>Dark Red</option>
                                <option value="dark-yellow" <?php if($fpg_arrow_image=="dark-yellow"){echo 'selected';} ?>>Dark Yellow</option>
                                <option value="light-blue" <?php if($fpg_arrow_image=="light-blue"){echo 'selected';} ?>>Light Blue</option>
                                <option value="light-grey" <?php if($fpg_arrow_image=="light-grey"){echo 'selected';} ?>>Light Grey</option>
                                <option value="custom" <?php if($fpg_arrow_image=="custom"){echo 'selected';} ?>>Custom URL</option>
                            </select>
                            <br />
                                
                            <fieldset>
                                <input type="text" name="fpg_arrow_image_custom_url" size="100" value="<?php echo $fpg_arrow_image_custom_url; ?>" />
                                <?php _e("Custom Arrow Image URL"); ?>
                                <br />
                            </fieldset>
                                
                        </td>
                    </tr>


                    <tr valign="top">
                        <th scope="row">Pip Color</th>
                        <td>
                            <select name="fpg_pages_pips_image">
                                <option value="orange" <?php if($fpg_pages_pips_image=="orange"){echo 'selected';} ?>>Orange</option>
                                <option value="green" <?php if($fpg_pages_pips_image=="green"){echo 'selected';} ?>>Green</option>
                                <option value="black" <?php if($fpg_pages_pips_image=="black"){echo 'selected';} ?>>Black</option>                
                                <option value="blue" <?php if($fpg_pages_pips_image=="blue"){echo 'selected';} ?>>Blue</option>
                                <option value="pink" <?php if($fpg_pages_pips_image=="pink"){echo 'selected';} ?>>Pink</option>
                                <option value="red" <?php if($fpg_pages_pips_image=="red"){echo 'selected';} ?>>Red</option>
                                <option value="yellow" <?php if($fpg_pages_pips_image=="yellow"){echo 'selected';} ?>>Yellow</option>
                                <option value="dark-blue" <?php if($fpg_pages_pips_image=="dark-blue"){echo 'selected';} ?>>Dark Blue</option>
                                <option value="dark-green" <?php if($fpg_pages_pips_image=="dark-green"){echo 'selected';} ?>>Dark Green</option>
                                <option value="dark-grey" <?php if($fpg_pages_pips_image=="dark-grey"){echo 'selected';} ?>>Dark Grey</option>
                                <option value="dark-red" <?php if($fpg_pages_pips_image=="dark-red"){echo 'selected';} ?>>Dark Red</option>
                                <option value="dark-yellow" <?php if($fpg_pages_pips_image=="dark-yellow"){echo 'selected';} ?>>Dark Yellow</option>
                                <option value="light-blue" <?php if($fpg_pages_pips_image=="light-blue"){echo 'selected';} ?>>Light Blue</option>
                                <option value="light-grey" <?php if($fpg_pages_pips_image=="light-grey"){echo 'selected';} ?>>Light Grey</option>
                                <option value="custom" <?php if($fpg_pages_pips_image=="custom"){echo 'selected';} ?>>Custom URL</option>
                            </select>
                            <br />
                                
                            <fieldset>
                                <input type="text" name="fpg_pages_pips_custom_url" size="100" value="<?php echo $fpg_pages_pips_custom_url; ?>" />
                                <?php _e("Custom Pip Image URL"); ?>
                                <br />
                            </fieldset>
                                
                        </td>
                    </tr>








                </tbody>
            </table>

        </div>







        <div class="ui-tabs-panel" id="tabs-2">
            <h3>Grid Cell Options</h3>
            <table class="form-table">
                <tbody>
                    <tr valign="top">
                        <th scope="row">Grid Cell Dimensions</th>
                        <td>
                        <fieldset>
                            <input type="text" name="fpg_item_height" size="5" value="<?php echo $fpg_item_height; ?>" />
                            <?php _e("Height (px)"); ?>
                            <br />

                            <input type="text" name="fpg_item_width" size="5" value="<?php echo $fpg_item_width; ?>" />
                            <?php _e("Width (px)"); ?>
                            <br />       
                        </fieldset>
                        </td>
                    </tr>

                    

                </tbody>
            </table>

        </div>







        <div class="ui-tabs-panel" id="tabs-3">
            <h3>Text Options</h3>
            <table class="form-table">
                <tbody>

                    <tr valign="top">
                        <th scope="row">Colors</th>
                        <td>
                        <fieldset>
                            <input type="text" name="fpg_item_text_bg_color" maxlength="6" size="6" class="inp-heading" value="<?php echo $fpg_item_text_bg_color; ?>" />
                            <?php _e("Text BG"); ?>
                            <br />
                            <input type="text" name="fpg_item_text_color" maxlength="6" size="6" class="inp-heading" value="<?php echo $fpg_item_text_color; ?>" />
                            <?php _e("Title Color"); ?>
                            <br />
                            <input type="text" name="fpg_item_excerpt_color" maxlength="6" size="6" class="inp-heading" value="<?php echo $fpg_item_excerpt_color; ?>" />
                            <?php _e("Excerpt Color"); ?>
                            <br />
                            <input type="text" name="fpg_item_author_color" maxlength="6" size="6" class="inp-heading" value="<?php echo $fpg_item_author_color; ?>" />
                            <?php _e("Author Color"); ?>
                            <br />
                            <input type="text" name="fpg_item_date_color" maxlength="6" size="6" class="inp-heading" value="<?php echo $fpg_item_date_color; ?>" />
                            <?php _e("Date Color"); ?>
                            <br />
                        </fieldset>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row">Text BG Transparency</th>
                        <td>
                            <input type="text" name="fpg_item_text_bg_alpha" value="<?php echo $fpg_item_text_bg_alpha; ?>" size="6">
                            <?php _e("Title/Excerpt BG Alpha"); ?> 
                            <br />
                            <?php _e("Valid Range: 0.0(invisible) to 1.0(opaque)"); ?>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row">Title</th>
                        <td>
                        <fieldset>
                            <input type="text" name="fpg_item_text_fontfamily" size="25" value="<?php echo $fpg_item_text_fontfamily; ?>" />
                            <?php _e("Font-Family"); ?>
                            <br />
                            <input type="text" name="fpg_item_text_fontstyle" size="25" value="<?php echo $fpg_item_text_fontstyle; ?>" />
                            <?php _e("Font-Style"); ?>
                            <br />
                            <input type="text" name="fpg_item_text_fontvariant" size="25" value="<?php echo $fpg_item_text_fontvariant; ?>" />
                            <?php _e("Font-Variant"); ?>
                            <br />
                            <input type="text" name="fpg_item_text_fontweight" size="25" value="<?php echo $fpg_item_text_fontweight; ?>" />
                            <?php _e("Font-Weight"); ?>
                            <br />
                            <input type="text" name="fpg_item_text_fontsize" size="25" value="<?php echo $fpg_item_text_fontsize; ?>" />
                            <?php _e("Font-Size"); ?>
                            <br />
                            <input type="text" name="fpg_item_text_lineheight" size="25" value="<?php echo $fpg_item_text_lineheight; ?>" />
                            <?php _e("Line-Height"); ?>
                            <br />
                            <br />

                            <?php _e("Font entries can be used to override default settings"); ?>
                            <br />
                            <a href="http://www.w3schools.com/cssref/pr_font_font.asp">See this site for more details</a>
                            <br />
                        </fieldset>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row">Excerpt</th>
                        <td>
                        <fieldset>
                            <input type="text" name="fpg_item_excerpt_fontfamily" size="25" value="<?php echo $fpg_item_excerpt_fontfamily; ?>" />
                            <?php _e("Font-Family"); ?>
                            <br />
                            <input type="text" name="fpg_item_excerpt_fontstyle" size="25" value="<?php echo $fpg_item_excerpt_fontstyle; ?>" />
                            <?php _e("Font-Style"); ?>
                            <br />
                            <input type="text" name="fpg_item_excerpt_fontvariant" size="25" value="<?php echo $fpg_item_excerpt_fontvariant; ?>" />
                            <?php _e("Font-Variant"); ?>
                            <br />
                            <input type="text" name="fpg_item_excerpt_fontweight" size="25" value="<?php echo $fpg_item_excerpt_fontweight; ?>" />
                            <?php _e("Font-Weight"); ?>
                            <br />
                            <input type="text" name="fpg_item_excerpt_fontsize" size="25" value="<?php echo $fpg_item_excerpt_fontsize; ?>" />
                            <?php _e("Font-Size"); ?>
                            <br />
                            <input type="text" name="fpg_item_excerpt_lineheight" size="25" value="<?php echo $fpg_item_excerpt_lineheight; ?>" />
                            <?php _e("Line-Height"); ?>
                            <br />
                            <br />

                            <?php _e("Font entries can be used to override default settings"); ?>
                            <br />
                            <a href="http://www.w3schools.com/cssref/pr_font_font.asp">See this site for more details</a>
                            <br />
                        </fieldset>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row">Author</th>
                        <td>
                        <fieldset>
                            <input type="text" name="fpg_item_author_fontfamily" size="25" value="<?php echo $fpg_item_author_fontfamily; ?>" />
                            <?php _e("Font-Family"); ?>
                            <br />
                            <input type="text" name="fpg_item_author_fontstyle" size="25" value="<?php echo $fpg_item_author_fontstyle; ?>" />
                            <?php _e("Font-Style"); ?>
                            <br />
                            <input type="text" name="fpg_item_author_fontvariant" size="25" value="<?php echo $fpg_item_author_fontvariant; ?>" />
                            <?php _e("Font-Variant"); ?>
                            <br />
                            <input type="text" name="fpg_item_author_fontweight" size="25" value="<?php echo $fpg_item_author_fontweight; ?>" />
                            <?php _e("Font-Weight"); ?>
                            <br />
                            <input type="text" name="fpg_item_author_fontsize" size="25" value="<?php echo $fpg_item_author_fontsize; ?>" />
                            <?php _e("Font-Size"); ?>
                            <br />
                            <input type="text" name="fpg_item_author_lineheight" size="25" value="<?php echo $fpg_item_author_lineheight; ?>" />
                            <?php _e("Line-Height"); ?>
                            <br />
                            <br />

                            <?php _e("Font entries can be used to override default settings"); ?>
                            <br />
                            <a href="http://www.w3schools.com/cssref/pr_font_font.asp">See this site for more details</a>
                            <br />
                        </fieldset>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row">Date</th>
                        <td>
                        <fieldset>
                            <input type="text" name="fpg_item_date_fontfamily" size="25" value="<?php echo $fpg_item_date_fontfamily; ?>" />
                            <?php _e("Font-Family"); ?>
                            <br />
                            <input type="text" name="fpg_item_date_fontstyle" size="25" value="<?php echo $fpg_item_date_fontstyle; ?>" />
                            <?php _e("Font-Style"); ?>
                            <br />
                            <input type="text" name="fpg_item_date_fontvariant" size="25" value="<?php echo $fpg_item_date_fontvariant; ?>" />
                            <?php _e("Font-Variant"); ?>
                            <br />
                            <input type="text" name="fpg_item_date_fontweight" size="25" value="<?php echo $fpg_item_date_fontweight; ?>" />
                            <?php _e("Font-Weight"); ?>
                            <br />
                            <input type="text" name="fpg_item_date_fontsize" size="25" value="<?php echo $fpg_item_date_fontsize; ?>" />
                            <?php _e("Font-Size"); ?>
                            <br />
                            <input type="text" name="fpg_item_date_lineheight" size="25" value="<?php echo $fpg_item_date_lineheight; ?>" />
                            <?php _e("Line-Height"); ?>
                            <br />
                            <br />

                            <?php _e("Font entries can be used to override default settings"); ?>
                            <br />
                            <a href="http://www.w3schools.com/cssref/pr_font_font.asp">See this site for more details</a>
                            <br />
                        </fieldset>
                        </td>
                    </tr>
                    


                </tbody>
            </table>

        </div>







        <div class="ui-tabs-panel" id="tabs-4">
            <h3>Drop Shadow Options</h3>
            <table class="form-table">
                <tbody>

                    <tr valign="top">
                        <th scope="row">Enable Dropshadows</th>
                        <td>
                            <fieldset>

                                <?php if($fpg_item_dropshadow_enable == 1){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                                <input type="checkbox" name="fpg_item_dropshadow_enable" value="true" <?php echo $checked; ?>><?php _e(" Grid Cell Shadow"); ?>
                                <br />

                                <?php if($fpg_text_inset_dropshadow_enable == 1){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                                <input type="checkbox" name="fpg_text_inset_dropshadow_enable" value="true" <?php echo $checked; ?>><?php _e(" Text Inset Shadow"); ?>
                                <br />

                                <?php if($fpg_text_dropshadow_enable == 1){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                                <input type="checkbox" name="fpg_text_dropshadow_enable" value="true" <?php echo $checked; ?>><?php _e(" Text Shadow"); ?>
                                <br />

                            </fieldset>
                        </td>
                    </tr>


                    <tr valign="top">
                        <th scope="row">Item Drop Shadow <br />(Normal | Hover)</th>
                        <td>                    
                        <fieldset>

                            <input type="text" name="fpg_item_dropshadow_color" maxlength="6" size="6" class="inp-heading" value="<?php echo $fpg_item_dropshadow_color; ?>" />
                            <input type="text" name="fpg_item_dropshadow_hover_color" maxlength="6" size="6" class="inp-heading" value="<?php echo $fpg_item_dropshadow_hover_color; ?>" />
                            <?php _e("Color"); ?>
                            <br />

                            <input type="text" name="fpg_item_dropshadow_alpha" value="<?php echo $fpg_item_dropshadow_alpha; ?>" size="6">
                            <input type="text" name="fpg_item_dropshadow_hover_alpha" value="<?php echo $fpg_item_dropshadow_hover_alpha; ?>" size="6">
                            <?php _e("Alpha"); ?>
                            <br />

                            <input type="text" name="fpg_item_dropshadow_x" value="<?php echo $fpg_item_dropshadow_x; ?>" size="6">
                            <input type="text" name="fpg_item_dropshadow_hover_x" value="<?php echo $fpg_item_dropshadow_hover_x; ?>" size="6">
                            <?php _e("Horizontal Offset (px)"); ?>
                            <br />
                            
                            <input type="text" name="fpg_item_dropshadow_y" value="<?php echo $fpg_item_dropshadow_y; ?>" size="6">
                            <input type="text" name="fpg_item_dropshadow_hover_y" value="<?php echo $fpg_item_dropshadow_hover_y; ?>" size="6">
                            <?php _e("Vertical Offset (px)"); ?>
                            <br />
                            
                            <input type="text" name="fpg_item_dropshadow_blur" value="<?php echo $fpg_item_dropshadow_blur; ?>" size="6">
                            <input type="text" name="fpg_item_dropshadow_hover_blur" value="<?php echo $fpg_item_dropshadow_hover_blur; ?>" size="6">
                            <?php _e("Blur Distance (px)"); ?>
                            <br />

                            <input type="text" name="fpg_item_dropshadow_spread" value="<?php echo $fpg_item_dropshadow_spread; ?>" size="6">
                            <input type="text" name="fpg_item_dropshadow_hover_spread" value="<?php echo $fpg_item_dropshadow_hover_spread; ?>" size="6">
                            <?php _e("Spread Distance (px)"); ?>
                            <br />

                        </fieldset>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row">Text Inset Drop Shadow</th>
                        <td>                    
                        <fieldset>

                            <input type="text" name="fpg_text_inset_dropshadow_color" maxlength="6" size="6" class="inp-heading" value="<?php echo $fpg_text_inset_dropshadow_color; ?>" />
                            <?php _e("Color"); ?>
                            <br />

                            <input type="text" name="fpg_text_inset_dropshadow_alpha" value="<?php echo $fpg_text_inset_dropshadow_alpha; ?>" size="6">
                            <?php _e("Alpha"); ?>
                            <br />

                            <input type="text" name="fpg_text_inset_dropshadow_x" value="<?php echo $fpg_text_inset_dropshadow_x; ?>" size="6">
                            <?php _e("Horizontal Offset (px)"); ?>
                            <br />
                            
                            <input type="text" name="fpg_text_inset_dropshadow_y" value="<?php echo $fpg_text_inset_dropshadow_y; ?>" size="6">
                            <?php _e("Vertical Offset (px)"); ?>
                            <br />
                            
                            <input type="text" name="fpg_text_inset_dropshadow_blur" value="<?php echo $fpg_text_inset_dropshadow_blur; ?>" size="6">
                            <?php _e("Blur Distance (px)"); ?>
                            <br />

                            <input type="text" name="fpg_text_inset_dropshadow_spread" value="<?php echo $fpg_text_inset_dropshadow_spread; ?>" size="6">
                            <?php _e("Spread Distance (px)"); ?>
                            <br />

                        </fieldset>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row">Text Drop Shadow</th>
                        <td>                    
                        <fieldset>

                            <input type="text" name="fpg_text_dropshadow_color" maxlength="6" size="6" class="inp-heading" value="<?php echo $fpg_text_dropshadow_color; ?>" />
                            <?php _e("Color"); ?>
                            <br />

                            <input type="text" name="fpg_text_dropshadow_alpha" value="<?php echo $fpg_text_dropshadow_alpha; ?>" size="6">
                            <?php _e("Alpha"); ?>
                            <br />

                            <input type="text" name="fpg_text_dropshadow_x" value="<?php echo $fpg_text_dropshadow_x; ?>" size="6">
                            <?php _e("Horizontal Offset (px)"); ?>
                            <br />
                            
                            <input type="text" name="fpg_text_dropshadow_y" value="<?php echo $fpg_text_dropshadow_y; ?>" size="6">
                            <?php _e("Vertical Offset (px)"); ?>
                            <br />
                            
                            <input type="text" name="fpg_text_dropshadow_blur" value="<?php echo $fpg_text_dropshadow_blur; ?>" size="6">
                            <?php _e("Blur Distance (px)"); ?>
                            <br />

                            <input type="text" name="fpg_text_dropshadow_spread" value="<?php echo $fpg_text_dropshadow_spread; ?>" size="6">
                            <?php _e("Spread Distance (px)"); ?>
                            <br />

                        </fieldset>
                        </td>
                    </tr>

                </tbody>
            </table>

        </div>








        <div class="ui-tabs-panel" id="tabs-5">
            <h3>Borders</h3>
            <table class="form-table">
                <tbody>
                    <tr valign="top">
                        <th scope="row">Inner Border</th>
                        <td>
                        <fieldset>
                            <input type="text" name="fpg_inner_border_color" maxlength="6" size="6" class="inp-heading" value="<?php echo $fpg_inner_border_color; ?>" />
                            <?php _e("Color"); ?>
                            <br />

                            <input type="text" name="fpg_inner_border_width" value="<?php echo $fpg_inner_border_width; ?>" size="6">
                            <?php _e("Width (px)"); ?>
                            <br />
                        </fieldset>
                        </td>
                    </tr>


                    <tr valign="top">
                        <th scope="row">Item Border - Top</th>
                        <td>
                        <fieldset>
                            <select name="fpg_item_border_top_style">
                                <option value="dotted" <?php if($fpg_item_border_top_style=="dotted"){echo 'selected';} ?>>Dotted</option>
                                <option value="dashed" <?php if($fpg_item_border_top_style=="dashed"){echo 'selected';} ?>>Dashed</option>
                                <option value="solid" <?php if($fpg_item_border_top_style=="solid"){echo 'selected';} ?>>Solid</option>
                                <option value="double" <?php if($fpg_item_border_top_style=="double"){echo 'selected';} ?>>Double</option>
                                <option value="groove" <?php if($fpg_item_border_top_style=="groove"){echo 'selected';} ?>>Groove</option>
                                <option value="ridge" <?php if($fpg_item_border_top_style=="ridge"){echo 'selected';} ?>>Ridge</option>
                                <option value="outset" <?php if($fpg_item_border_top_style=="outset"){echo 'selected';} ?>>Outset</option>
                                <option value="inset" <?php if($fpg_item_border_top_style=="inset"){echo 'selected';} ?>>Inset</option>
                            </select>
                            <input type="text" name="fpg_item_border_top_width" size="6" value="<?php echo $fpg_item_border_top_width; ?>" />
                            <?php _e("Width (px)"); ?>
                            <input type="text" name="fpg_item_border_top_color" maxlength="6" size="6" class="inp-heading" value="<?php echo $fpg_item_border_top_color; ?>" />
                            <?php _e("Color"); ?>
                        </fieldset>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row">Item Border - Bottom</th>
                        <td>
                        <fieldset>
                            <select name="fpg_item_border_bottom_style">
                                <option value="dotted" <?php if($fpg_item_border_bottom_style=="dotted"){echo 'selected';} ?>>Dotted</option>
                                <option value="dashed" <?php if($fpg_item_border_bottom_style=="dashed"){echo 'selected';} ?>>Dashed</option>
                                <option value="solid" <?php if($fpg_item_border_bottom_style=="solid"){echo 'selected';} ?>>Solid</option>
                                <option value="double" <?php if($fpg_item_border_bottom_style=="double"){echo 'selected';} ?>>Double</option>
                                <option value="groove" <?php if($fpg_item_border_bottom_style=="groove"){echo 'selected';} ?>>Groove</option>
                                <option value="ridge" <?php if($fpg_item_border_bottom_style=="ridge"){echo 'selected';} ?>>Ridge</option>
                                <option value="outset" <?php if($fpg_item_border_bottom_style=="outset"){echo 'selected';} ?>>Outset</option>
                                <option value="inset" <?php if($fpg_item_border_bottom_style=="inset"){echo 'selected';} ?>>Inset</option>
                            </select>
                            <input type="text" name="fpg_item_border_bottom_width" size="6" value="<?php echo $fpg_item_border_bottom_width; ?>" />
                            <?php _e("Width (px)"); ?>
                            <input type="text" name="fpg_item_border_bottom_color" maxlength="6" size="6" class="inp-heading" value="<?php echo $fpg_item_border_bottom_color; ?>" />
                            <?php _e("Color"); ?>
                        </fieldset>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row">Item Border - Left</th>
                        <td>
                        <fieldset>
                            <select name="fpg_item_border_left_style">
                                <option value="dotted" <?php if($fpg_item_border_left_style=="dotted"){echo 'selected';} ?>>Dotted</option>
                                <option value="dashed" <?php if($fpg_item_border_left_style=="dashed"){echo 'selected';} ?>>Dashed</option>
                                <option value="solid" <?php if($fpg_item_border_left_style=="solid"){echo 'selected';} ?>>Solid</option>
                                <option value="double" <?php if($fpg_item_border_left_style=="double"){echo 'selected';} ?>>Double</option>
                                <option value="groove" <?php if($fpg_item_border_left_style=="groove"){echo 'selected';} ?>>Groove</option>
                                <option value="ridge" <?php if($fpg_item_border_left_style=="ridge"){echo 'selected';} ?>>Ridge</option>
                                <option value="outset" <?php if($fpg_item_border_left_style=="outset"){echo 'selected';} ?>>Outset</option>
                                <option value="inset" <?php if($fpg_item_border_left_style=="inset"){echo 'selected';} ?>>Inset</option>
                            </select>
                            <input type="text" name="fpg_item_border_left_width" size="6" value="<?php echo $fpg_item_border_left_width; ?>" />
                            <?php _e("Width (px)"); ?>
                            <input type="text" name="fpg_item_border_left_color" maxlength="6" size="6" class="inp-heading" value="<?php echo $fpg_item_border_left_color; ?>" />
                            <?php _e("Color"); ?>
                        </fieldset>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row">Item Border - Right</th>
                        <td>
                        <fieldset>
                            <select name="fpg_item_border_right_style">
                                <option value="dotted" <?php if($fpg_item_border_right_style=="dotted"){echo 'selected';} ?>>Dotted</option>
                                <option value="dashed" <?php if($fpg_item_border_right_style=="dashed"){echo 'selected';} ?>>Dashed</option>
                                <option value="solid" <?php if($fpg_item_border_right_style=="solid"){echo 'selected';} ?>>Solid</option>
                                <option value="double" <?php if($fpg_item_border_right_style=="double"){echo 'selected';} ?>>Double</option>
                                <option value="groove" <?php if($fpg_item_border_right_style=="groove"){echo 'selected';} ?>>Groove</option>
                                <option value="ridge" <?php if($fpg_item_border_right_style=="ridge"){echo 'selected';} ?>>Ridge</option>
                                <option value="outset" <?php if($fpg_item_border_right_style=="outset"){echo 'selected';} ?>>Outset</option>
                                <option value="inset" <?php if($fpg_item_border_right_style=="inset"){echo 'selected';} ?>>Inset</option>
                            </select>
                            <input type="text" name="fpg_item_border_right_width" size="6" value="<?php echo $fpg_item_border_right_width; ?>" />
                            <?php _e("Width (px)"); ?>
                            <input type="text" name="fpg_item_border_right_color" maxlength="6" size="6" class="inp-heading" value="<?php echo $fpg_item_border_right_color; ?>" />
                            <?php _e("Color"); ?>
                            <br />
                            <br />
                            <br />
                        </fieldset>
                        </td>
                    </tr>



                    <tr valign="top">
                        <th scope="row">Text Border - Top</th>
                        <td>
                        <fieldset>
                            <select name="fpg_text_border_top_style">
                                <option value="dotted" <?php if($fpg_text_border_top_style=="dotted"){echo 'selected';} ?>>Dotted</option>
                                <option value="dashed" <?php if($fpg_text_border_top_style=="dashed"){echo 'selected';} ?>>Dashed</option>
                                <option value="solid" <?php if($fpg_text_border_top_style=="solid"){echo 'selected';} ?>>Solid</option>
                                <option value="double" <?php if($fpg_text_border_top_style=="double"){echo 'selected';} ?>>Double</option>
                                <option value="groove" <?php if($fpg_text_border_top_style=="groove"){echo 'selected';} ?>>Groove</option>
                                <option value="ridge" <?php if($fpg_text_border_top_style=="ridge"){echo 'selected';} ?>>Ridge</option>
                                <option value="outset" <?php if($fpg_text_border_top_style=="outset"){echo 'selected';} ?>>Outset</option>
                                <option value="inset" <?php if($fpg_text_border_top_style=="inset"){echo 'selected';} ?>>Inset</option>
                            </select>
                            <input type="text" name="fpg_text_border_top_width" size="6" value="<?php echo $fpg_text_border_top_width; ?>" />
                            <?php _e("Width (px)"); ?>
                            <input type="text" name="fpg_text_border_top_color" maxlength="6" size="6" class="inp-heading" value="<?php echo $fpg_text_border_top_color; ?>" />
                            <?php _e("Color"); ?>
                        </fieldset>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row">Text Border - Bottom</th>
                        <td>
                        <fieldset>
                            <select name="fpg_text_border_bottom_style">
                                <option value="dotted" <?php if($fpg_text_border_bottom_style=="dotted"){echo 'selected';} ?>>Dotted</option>
                                <option value="dashed" <?php if($fpg_text_border_bottom_style=="dashed"){echo 'selected';} ?>>Dashed</option>
                                <option value="solid" <?php if($fpg_text_border_bottom_style=="solid"){echo 'selected';} ?>>Solid</option>
                                <option value="double" <?php if($fpg_text_border_bottom_style=="double"){echo 'selected';} ?>>Double</option>
                                <option value="groove" <?php if($fpg_text_border_bottom_style=="groove"){echo 'selected';} ?>>Groove</option>
                                <option value="ridge" <?php if($fpg_text_border_bottom_style=="ridge"){echo 'selected';} ?>>Ridge</option>
                                <option value="outset" <?php if($fpg_text_border_bottom_style=="outset"){echo 'selected';} ?>>Outset</option>
                                <option value="inset" <?php if($fpg_text_border_bottom_style=="inset"){echo 'selected';} ?>>Inset</option>
                            </select>
                            <input type="text" name="fpg_text_border_bottom_width" size="6" value="<?php echo $fpg_text_border_bottom_width; ?>" />
                            <?php _e("Width (px)"); ?>
                            <input type="text" name="fpg_text_border_bottom_color" maxlength="6" size="6" class="inp-heading" value="<?php echo $fpg_text_border_bottom_color; ?>" />
                            <?php _e("Color"); ?>
                        </fieldset>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row">Text Border - Left</th>
                        <td>
                        <fieldset>
                            <select name="fpg_text_border_left_style">
                                <option value="dotted" <?php if($fpg_text_border_left_style=="dotted"){echo 'selected';} ?>>Dotted</option>
                                <option value="dashed" <?php if($fpg_text_border_left_style=="dashed"){echo 'selected';} ?>>Dashed</option>
                                <option value="solid" <?php if($fpg_text_border_left_style=="solid"){echo 'selected';} ?>>Solid</option>
                                <option value="double" <?php if($fpg_text_border_left_style=="double"){echo 'selected';} ?>>Double</option>
                                <option value="groove" <?php if($fpg_text_border_left_style=="groove"){echo 'selected';} ?>>Groove</option>
                                <option value="ridge" <?php if($fpg_text_border_left_style=="ridge"){echo 'selected';} ?>>Ridge</option>
                                <option value="outset" <?php if($fpg_text_border_left_style=="outset"){echo 'selected';} ?>>Outset</option>
                                <option value="inset" <?php if($fpg_text_border_left_style=="inset"){echo 'selected';} ?>>Inset</option>
                            </select>
                            <input type="text" name="fpg_text_border_left_width" size="6" value="<?php echo $fpg_text_border_left_width; ?>" />
                            <?php _e("Width (px)"); ?>
                            <input type="text" name="fpg_text_border_left_color" maxlength="6" size="6" class="inp-heading" value="<?php echo $fpg_text_border_left_color; ?>" />
                            <?php _e("Color"); ?>
                        </fieldset>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row">Text Border - Right</th>
                        <td>
                        <fieldset>
                            <select name="fpg_text_border_right_style">
                                <option value="dotted" <?php if($fpg_text_border_right_style=="dotted"){echo 'selected';} ?>>Dotted</option>
                                <option value="dashed" <?php if($fpg_text_border_right_style=="dashed"){echo 'selected';} ?>>Dashed</option>
                                <option value="solid" <?php if($fpg_text_border_right_style=="solid"){echo 'selected';} ?>>Solid</option>
                                <option value="double" <?php if($fpg_text_border_right_style=="double"){echo 'selected';} ?>>Double</option>
                                <option value="groove" <?php if($fpg_text_border_right_style=="groove"){echo 'selected';} ?>>Groove</option>
                                <option value="ridge" <?php if($fpg_text_border_right_style=="ridge"){echo 'selected';} ?>>Ridge</option>
                                <option value="outset" <?php if($fpg_text_border_right_style=="outset"){echo 'selected';} ?>>Outset</option>
                                <option value="inset" <?php if($fpg_text_border_right_style=="inset"){echo 'selected';} ?>>Inset</option>
                            </select>
                            <input type="text" name="fpg_text_border_right_width" size="6" value="<?php echo $fpg_text_border_right_width; ?>" />
                            <?php _e("Width (px)"); ?>
                            <input type="text" name="fpg_text_border_right_color" maxlength="6" size="6" class="inp-heading" value="<?php echo $fpg_text_border_right_color; ?>" />
                            <?php _e("Color"); ?>
                        </fieldset>
                        </td>
                    </tr>


                </tbody>
            </table>

        </div>








        <div class="ui-tabs-panel" id="tabs-6">
            <h3>Image Options</h3>
            <table class="form-table">
                <tbody>

                
                    <tr valign="top">
                        <th scope="row">Image BG Color</th>
                        <td>
                        <fieldset>
                            <input type="text" name="fpg_images_bg_color" maxlength="6" size="6" class="inp-heading" value="<?php echo $fpg_images_bg_color; ?>" />
                            <br />
                        </fieldset>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row">Scaling Options</th>
                        <td>
                            <fieldset>
                                <legend class="hidden">Scaling Options</legend>

                                <?php if($fpg_images_crop == 1){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                                <input type="checkbox" name="fpg_images_crop" value="true" <?php echo $checked; ?>><?php _e(" Crop Mode"); ?>
                                <br />
                                <?php _e("Default is Crop Mode when this option is checked. Unchecking this option will scale the image to fit (proportions not maintained)."); ?>
                                <br />
                                <br />

                                <?php if($fpg_images_height_noscale == 1){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                                <input type="checkbox" name="fpg_images_height_noscale" value="true" <?php echo $checked; ?>><?php _e(" Don't Scale Height"); ?>
                                <br />
                                <?php if($fpg_images_width_noscale == 1){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                                <input type="checkbox" name="fpg_images_width_noscale" value="true" <?php echo $checked; ?>><?php _e(" Don't Scale Width"); ?>
                                <br />
                                <?php _e("If Scale Mode is enabled, checking either of these options will prevent a dimension from being scaled."); ?>
                                <br />
                                <br />

                                <?php if($fpg_images_height_fit == 1){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                                <input type="checkbox" name="fpg_images_height_fit" value="true" <?php echo $checked; ?>><?php _e(" Fit Height"); ?>
                                <br />
                                <?php if($fpg_images_width_fit == 1){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                                <input type="checkbox" name="fpg_images_width_fit" value="true" <?php echo $checked; ?>><?php _e(" Fit Width"); ?>
                                <br />
                                <?php _e("Checking these options will stretch the width/height to fill the post scroll area."); ?>
                                <br />
                                <?php _e("If only one is selected, scaling will be proportional. Selecting both will disregard proportions."); ?>
                                <br />
                                <br />
                                <br />
                                <?php _e("After changing any of these options or changing the post scroll height/width, you should regenerate the thumbnails of images on your site that will appear in the post scroll."); ?>
                                <br />
                                This can be easily done with the <a href="http://wordpress.org/extend/plugins/regenerate-thumbnails/">Regenerate Thumbnails Plugin</a>.


                            </fieldset>
                        </td>
                    </tr>

                    

                </tbody>
            </table>

        </div>
     
    </div>




    <p class="submit">
        <input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
    </p>
</form>
</div>