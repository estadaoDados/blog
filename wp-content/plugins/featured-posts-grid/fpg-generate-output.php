<?php
    if ( isset($_POST['fpg_opt_hidden']) && $_POST['fpg_opt_hidden'] == 'Y' ) {
        /* Numeric Variables */
        $variables = array (
            'fpg_rows',
            'fpg_columns',
            'fpg_padding_topbottom',
            'fpg_padding_leftright',
            'fpg_spacing_horizontal',
            'fpg_pages_max',
            'fpg_item_height',
            'fpg_item_width',
            'fpg_item_dropshadow_x',
            'fpg_item_dropshadow_y',
            'fpg_item_dropshadow_blur',
            'fpg_item_dropshadow_spread',
            'fpg_item_dropshadow_hover_x',
            'fpg_item_dropshadow_hover_y',
            'fpg_item_dropshadow_hover_blur',
            'fpg_item_dropshadow_hover_spread',
            'fpg_text_dropshadow_x',
            'fpg_text_dropshadow_y',
            'fpg_text_dropshadow_blur',
            'fpg_text_dropshadow_spread',
            'fpg_text_inset_dropshadow_x',
            'fpg_text_inset_dropshadow_y',
            'fpg_text_inset_dropshadow_blur',
            'fpg_text_inset_dropshadow_spread',
            //'fpg_pages_pips_spacing',
            'fpg_item_text_bg_alpha',
            'fpg_item_dropshadow_alpha',
            'fpg_item_dropshadow_hover_alpha',
            'fpg_text_dropshadow_alpha',
            'fpg_text_inset_dropshadow_alpha',
            'fpg_inner_border_width',
            'fpg_item_border_top_width',
            'fpg_item_border_bottom_width',
            'fpg_item_border_left_width',
            'fpg_item_border_right_width',
            'fpg_text_border_top_width',
            'fpg_text_border_bottom_width',
            'fpg_text_border_left_width',
            'fpg_text_border_right_width',
            'fpg_page_speed',
            'fpg_scroll_interval'
        );

        foreach ($variables as $var) {
            $var_value = $_POST[$var];
            if ( is_numeric($var_value) )
                update_option($var, $var_value);
            else
                $error[] = "ERROR: ".$var." - Must be a number.";
        }




        /* Text Variables */
        $variables = array (
            'fpg_width',
            'fpg_hover_x_offset',
            'fpg_hover_y_offset',
            'fpg_item_dropshadow_color',
            'fpg_item_dropshadow_hover_color',
            'fpg_text_dropshadow_color',
            'fpg_text_inset_dropshadow_color',
            'fpg_item_border_top_style',
            'fpg_item_border_top_color',
            'fpg_item_border_bottom_style',
            'fpg_item_border_bottom_color',
            'fpg_item_border_left_style',
            'fpg_item_border_left_color',
            'fpg_item_border_right_style',
            'fpg_item_border_right_color',
            'fpg_item_text_bg_color',
            'fpg_item_text_color',
            'fpg_item_text_fontfamily',
            'fpg_item_text_fontstyle',
            'fpg_item_text_fontvariant',
            'fpg_item_text_fontweight',
            'fpg_item_text_fontsize',
            'fpg_item_text_lineheight',
            'fpg_item_excerpt_color',
            'fpg_item_excerpt_fontfamily',
            'fpg_item_excerpt_fontstyle',
            'fpg_item_excerpt_fontvariant',
            'fpg_item_excerpt_fontweight',
            'fpg_item_excerpt_fontsize',
            'fpg_item_excerpt_lineheight',
            'fpg_item_author_color',
            'fpg_item_author_fontfamily',
            'fpg_item_author_fontstyle',
            'fpg_item_author_fontvariant',
            'fpg_item_author_fontweight',
            'fpg_item_author_fontsize',
            'fpg_item_author_lineheight',
            'fpg_item_date_color',
            'fpg_item_date_fontfamily',
            'fpg_item_date_fontstyle',
            'fpg_item_date_fontvariant',
            'fpg_item_date_fontweight',
            'fpg_item_date_fontsize',
            'fpg_item_date_lineheight',
            'fpg_text_border_top_style',
            'fpg_text_border_top_color',
            'fpg_text_border_bottom_style',
            'fpg_text_border_bottom_color',
            'fpg_text_border_left_style',
            'fpg_text_border_left_color',
            'fpg_text_border_right_style',
            'fpg_text_border_right_color',
            'fpg_arrow_position',
            'fpg_arrow_image',
            'fpg_pages_pips_image',
            'fpg_images_bg_color',
            'fpg_arrow_image_custom_url',
            'fpg_pages_pips_custom_url',
            'fpg_inner_border_color'
        );

        foreach ($variables as $var) {
            $var_value = $_POST[$var];
            update_option($var, $var_value);
        }



        /* Boolean Variables */
        $variables = array (
            'fpg_excerpt_display',
            'fpg_author_display',
            'fpg_date_display',
            'fpg_item_dropshadow_enable',
            'fpg_text_dropshadow_enable',
            'fpg_text_inset_dropshadow_enable',
            'fpg_images_crop',
            'fpg_images_height_noscale',
            'fpg_images_width_noscale',
            'fpg_images_height_fit',
            'fpg_images_width_fit',
            'fpg_autoscroll',
            'fpg_rollover',
            'fpg_enable_static_caching'
        );

        foreach ($variables as $var) {
            $var_value = isset($_POST[$var]) ? 1:0;
            update_option($var, $var_value);
        }




        if( empty($error) ){ 
            ?>
            <div class="updated"><p><strong><?php _e('Settings Saved.', 'wp-rp' ); ?></strong></p></div>
            <?php 
            
            if (get_option('fpg_enable_static_caching') == '1')
            {
                fpg_generate_js();
                fpg_generate_css();
            }
        }
        else
        { 
            ?>
            <div class="error"><p><strong>
            <?php
             
            foreach ( $error as $key=>$val ) {
                _e($val); 
                echo "<br/>";
            }

            ?>
            </strong></p></div>
            <?php 
        }
    }
?>


<?php
    function fpg_generate_js()
    {
        ob_start();

        include(WP_PLUGIN_DIR.'/featured-posts-grid/js/fpg.js.php');

        $file_contents = ob_get_contents();
        $file_path = WP_PLUGIN_DIR.'/featured-posts-grid/js/fpg.js';
        $ret_val = file_put_contents($file_path, $file_contents);
        
        ob_end_clean();

        if (!($ret_val === FALSE))
        {
            ?>
            <div class="updated"><p><strong><?php _e('FPG Static JavaScript files updated.', 'wp-rp' ); ?></strong></p></div>
            <?php
        }
        else
        {
            ?>
            <div class="error"><p><strong><?php _e('FPG Static JavaScript files could not be updated.<br/>You may need to temporarily change the permissions of the '.WP_PLUGIN_DIR.'/featured-posts-grid/js directory. See plugin FAQ for details.<br/>Plugin will continue to operate normally but at sub-optimal performance until this issue is resolved.', 'wp-rp' ); ?></strong></p></div>
            <?php
        }
    }

    function fpg_generate_css()
    {
        ob_start();

        include(WP_PLUGIN_DIR.'/featured-posts-grid/css/fpg.css.php');

        $file_contents = ob_get_contents();
        $file_path = WP_PLUGIN_DIR.'/featured-posts-grid/css/fpg.css';
        $ret_val = file_put_contents($file_path, $file_contents);
        
        ob_end_clean();

        if (!($ret_val === FALSE))
        {
            ?>
            <div class="updated"><p><strong><?php _e('FPG Static CSS files updated.', 'wp-rp' ); ?></strong></p></div>
            <?php
        }
        else
        {
            ?>
            <div class="error"><p><strong><?php _e('FPG Static CSS files could not be updated.<br/>You may need to temporarily change the permissions of the '.WP_PLUGIN_DIR.'/featured-posts-grid/css directory. See plugin FAQ for details.<br/>Plugin will continue to operate normally but at sub-optimal performance until this issue is resolved.', 'wp-rp' ); ?></strong></p></div>
            <?php
        }
    }
?>