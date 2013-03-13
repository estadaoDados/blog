<?php
/**
 * Template: Sidebar.php
 *
 * @package pureline
 * @subpackage Template
 */
?>
        <!--BEGIN #secondary .aside-->
        <div id="secondary" class="aside">
        
      
      

        
        
        
			<?php	/* Widgetized Area */
					if ( !dynamic_sidebar( 'sidebar-1' )) : ?>


           <!--BEGIN #widget-posts-->            
          
				<?php pureline_widget_before_widget(); ?><?php pureline_widget_before_title(); ?><?php _e( 'Recent Posts', 'pure-line' ); ?><?php pureline_widget_after_title(); ?>
				<ul>
<?php $myposts = get_posts('numberposts=5'); // number of posts
foreach($myposts as $post) :?>
<li><a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_title();?></a></li>
<?php endforeach; ?>
				</ul>
            <?php pureline_widget_after_widget(); ?>   
                <!--END #widget-posts-->
                
                
                 <!--BEGIN #widget-comments-->
        
			<?php pureline_widget_before_widget(); ?><?php pureline_widget_before_title(); ?><?php _e( 'Recent Comments', 'pure-line' ); ?><?php pureline_widget_after_title(); ?>

          <?php
global $wpdb;
$output = '';
$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID,
comment_post_ID, comment_author, comment_date_gmt, comment_approved,
comment_type,comment_author_url,
SUBSTRING(comment_content,1,30) AS com_excerpt
FROM $wpdb->comments
LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID =
$wpdb->posts.ID)
WHERE comment_approved = '1' AND comment_type = '' AND
post_password = ''
ORDER BY comment_date_gmt DESC
LIMIT 5";    // number of comments
$comments = $wpdb->get_results($sql);
$output .= "\n<ul>";
foreach ($comments as $comment) {
$output .= "\n<li>".wp_filter_nohtml_kses($comment->comment_author)
." on " . "<a href=\"" . get_permalink($comment->ID) .
"#comment-" . $comment->comment_ID . "\">" . $comment->post_title
."</a></li>";
}
$output .= "\n</ul>";
echo $output;?>


            <?php pureline_widget_after_widget(); ?>  
               <!--END #widget-comments-->
               
               
                
                   	<!--BEGIN #widget-archives-->
           
				<?php pureline_widget_before_widget(); ?><?php pureline_widget_before_title(); ?><?php _e( 'Archives', 'pure-line' ); ?><?php pureline_widget_after_title(); ?>
				<ul>
					<?php wp_get_archives( 'type=monthly' ) ?>
				</ul>
          <?php pureline_widget_after_widget(); ?>   
            <!--END #widget-archives-->
            
            
           			
<?php if ( get_tags() ) { ?>
            <!--BEGIN #widget-tags-->
        
			<?php pureline_widget_before_widget(); ?><?php pureline_widget_before_title(); ?><?php _e( 'Tags', 'pure-line' ); ?><?php pureline_widget_after_title(); ?>
				<?php wp_tag_cloud( 'title_li=' ); ?>
                     <?php pureline_widget_after_widget(); ?> 
                     <!--END #widget-tags-->
<?php } ?>



            
            
              <!--BEGIN #widget-calendar-->
        <?php pureline_widget_before_widget(); ?><?php pureline_widget_before_title(); ?><?php _e( 'Calendar', 'pure-line' ); ?><?php pureline_widget_after_title(); ?>
  
               
               <?php get_calendar(); ?>
               
                    <?php pureline_widget_after_widget(); ?> 
               <!--END #widget-calendar-->

               
                 <!--BEGIN #widget-meta-->
          
          <?php pureline_widget_before_widget(); ?><?php pureline_widget_before_title(); ?><?php _e( 'Meta', 'pure-line' ); ?><?php pureline_widget_after_title(); ?>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
</ul>
			<?php pureline_widget_after_widget(); ?>
      			<!--END #widget-meta-->



			<?php endif; ?>
		<!--END #secondary .aside-->
    
    
 
    
    
		</div>  