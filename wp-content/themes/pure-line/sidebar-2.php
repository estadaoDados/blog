<?php
/**
 * Template: Sidebar.php
 *
 * @package pureline
 * @subpackage Template
 */
?>
        <!--BEGIN #secondary-2 .aside-->
        <div id="secondary-2" class="aside">
        
        
        
        
        
        
			<?php	/* Widgetized Area */
					if ( !dynamic_sidebar( 'sidebar-2' )) : ?>



     <!--BEGIN #widget-pages-->
            
				<?php pureline_widget_before_widget(); ?><?php pureline_widget_before_title(); ?><?php _e( 'Pages', 'pure-line' ); ?><?php pureline_widget_after_title(); ?>
				<ul>
					<?php wp_list_pages('title_li='); ?> 
				</ul>
          <?php pureline_widget_after_widget(); ?> 
            <!--END #widget-pages-->
			

                         <!--BEGIN #widget-categories-->
          
				<?php pureline_widget_before_widget(); ?><?php pureline_widget_before_title(); ?><?php _e( 'Categories', 'pure-line' ); ?><?php pureline_widget_after_title(); ?>
				<ul>
					<?php wp_list_categories( 'title_li=' ); ?>
				</ul>
                    <?php pureline_widget_after_widget(); ?>    
                        <!--END #widget-categories-->
 
 
                            <!--BEGIN #widget-feeds-->
         
				<?php pureline_widget_before_widget(); ?><?php pureline_widget_before_title(); ?><?php _e( 'RSS Syndication', 'pure-line' ); ?><?php pureline_widget_after_title(); ?>
				<ul>
					<li><a href="<?php bloginfo( 'rss2_url' ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ), 1 ) ?> Posts RSS feed" rel="alternate" type="application/rss+xml"><?php _e( 'All posts', 'pure-line' ); ?></a></li>
					<li><a href="<?php bloginfo( 'comments_rss2_url' ); ?>" title="<?php echo esc_html( bloginfo( 'name' ), 1 ) ?> Comments RSS feed" rel="alternate" type="application/rss+xml"><?php _e( 'All comments', 'pure-line' ); ?></a></li>
				</ul>
                <?php pureline_widget_after_widget(); ?> 
                     <!--END #widget-feeds-->

          
			<?php endif; ?>
		<!--END #secondary-2 .aside-->
    
    
    
    
		</div>
    
