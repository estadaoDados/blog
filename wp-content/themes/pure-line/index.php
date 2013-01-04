<?php
/**
 * Template: Index.php
 *
 * @package pureline
 * @subpackage Template
 */

get_header();
?>



    <?php $xyz = ""; 
    $pureline_layout = pureline_get_option('pureline_layout','2cl');
    $pureline_post_links = pureline_get_option('purelinepost_links','after');
    $pureline_post_layout = pureline_get_option('pureline_post_layout','two');
    $pureline_header_meta = pureline_get_option('pureline_header_meta','single_archive');
    $pureline_share_this = pureline_get_option('pureline_share_this','single');
    $pureline_similar_posts = pureline_get_option('pureline_similar_posts','disable');
    $pureline_nav_links = pureline_get_option('pureline_nav_links','after');
    
    
    
  if (($pureline_layout == "1c"))  
  
  
  
    { ?>
  
  
  <?php } else { ?>

  <?php $options = get_option('pureline');
  if ($pureline_layout == "3cm" || $pureline_layout == "3cl" || $pureline_layout == "3cr") { ?> 
  
  <?php get_sidebar('2'); ?>
  
  
  <?php } ?>
  
    <?php } ?>  



			<!--BEGIN #primary .hfeed-->
			<div id="primary" class="hfeed">
      

     
 
 <!---------------------- 
 ---- attachment begin
 ----------------------->  


 <?php if (is_attachment()) { ?>
      
      
     <?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
				
				<!--BEGIN .hentry-->
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <?php $options = get_option('pureline'); if (($pureline_header_meta == "") || ($pureline_header_meta == "single_archive")) 
        { ?>
        
        <h1 class="entry-title"><a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment" class="attach-font"><?php echo get_the_title($post->post_parent); ?></a> &raquo; <?php if ( get_the_title() ){ the_title();
 } else { _e( 'Untitled', 'pure-line' );  } ?></h1>
        
        
        	
	<!--BEGIN .entry-meta .entry-header-->
					<div class="entry-meta entry-header">
          <a href="<?php the_permalink() ?>"><span class="published"><?php the_time('M d'); ?>, <?php the_time('Y'); ?></strong></span></a>
 
          <?php if ( comments_open() ) : ?>           
          <span class="comment-count"> ~ <?php comments_popup_link( __( 'Leave a Comment', 'pure-line' ), __( '1 Comment', 'pure-line' ), __( '% Comments', 'pure-line' ) ); ?></span>
          <?php else : // comments are closed 
           endif; ?>
         
          
          <span class="author vcard">
          
 
          
          

          <?php _e( 'By', 'pure-line' ); ?> <strong><?php printf( '<a class="url fn" href="' . get_author_posts_url( $authordata->ID, $authordata->user_nicename ) . '" title="' . sprintf( 'View all posts by %s', $authordata->display_name ) . '">' . get_the_author() . '</a>' ) ?></strong></span>
						
						<?php edit_post_link( __( 'edit', 'pure-line' ), '<span class="edit-post">', '</span>' ); ?>

					<!--END .entry-meta .entry-header-->
                    </div>
                    
                     <?php } else { ?>
                    
                    <h1 class="entry-title" class="fl-l"><a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><?php echo get_the_title($post->post_parent); ?></a> &raquo; <?php the_title(); ?></h1>
                    
                     <?php if ( current_user_can( 'edit_post', $post->ID ) ): ?>
       
				    <?php edit_post_link( __( 'EDIT', 'pure-line' ), '<span class="edit-post edit-attach">', '</span>' ); ?>
                    <?php endif; ?>

                    <br /><br /><?php } ?>
					
					<!--BEGIN .entry-content .article-->
					<div class="entry-content article">
				
     
							<?php if ( wp_attachment_is_image() ) :
	$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
	foreach ( $attachments as $k => $attachment ) {
		if ( $attachment->ID == $post->ID )
			break;
	}
	$k++;
	// If there is more than 1 image attachment in a gallery
	if ( count( $attachments ) > 1 ) {
		if ( isset( $attachments[ $k ] ) )
			// get the URL of the next image attachment
			$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
		else
			// or get the URL of the first image attachment
			$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
	} else {
		// or, if there's only 1 image attachment, get the URL of the image
		$next_attachment_url = wp_get_attachment_url();
	}
?>
						<p class="attachment" align="center"><a href="<?php echo wp_get_attachment_url(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>" class="single-gallery-image"><?php
							echo wp_get_attachment_image( $post->ID, $size='medium' ); // filterable image width with, essentially, no limit for image height.
						?></a></p>

						
			
              
              <div class="navigation-links single-page-navigation" style="clear:both;">
<div class="nav-next"><?php next_image_link ( false, 'Next Image &nbsp;&nbsp;&raquo;&nbsp;&nbsp;' ); ?></div>              
	<div class="nav-previous"><?php previous_image_link ( false, '&nbsp;&nbsp;&laquo;&nbsp;&nbsp; Previous Image' ); ?></div>
	
<!--END .navigation-links-->

              
              
              
              
						</div><!-- #nav-below -->
<?php else : ?>
						<a href="<?php echo wp_get_attachment_url(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php echo basename( get_permalink() ); ?></a>
<?php endif; ?>

<div class="entry-caption"><?php if ( !empty( $post->post_excerpt ) ) the_excerpt(); ?></div>
         
			

					 <!--END .entry-content .article-->
           <div style="clear:both;"></div>
					</div>
				<!--END .hentry-->
				</div>

         <?php $options = get_option('pureline'); if (($pureline_share_this == "single_archive") || ($pureline_share_this == "all")) { 
        pureline_sharethis();  } else { ?> <div class="margin-40"></div> <?php }?>
        
        
				<?php comments_template( '', true ); ?>
                
				<?php endwhile; else : ?>

				<!--BEGIN #post-0-->
				<div id="post-0" <?php post_class(); ?>>
					<h1 class="entry-title"><?php echo __('Not Found','pure-line'); ?></h1>

					<!--BEGIN .entry-content-->
					<div class="entry-content">
						<p><?php echo __('Sorry, no attachments matched your criteria','pure-line');?>.</p>
					<!--END .entry-content-->
					</div>
				<!--END #post-0-->
				</div>
        
         <!---------------------- 
 ---- attachment end
 ----------------------->  

			<?php endif; ?>      

 <!---------------------- 
 ---- single post begin
 ----------------------->     
      
 <?php } elseif (is_single()) { ?>
 
 
 <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                
                 <?php $options = get_option('pureline'); if (($pureline_post_links == "before") || ($pureline_post_links == "both")) { ?>
          
          
         <span class="nav-top">
				<?php get_template_part( 'navigation', 'index' ); ?>
        </span>
        
        <?php } ?> 

				<!--BEGIN .hentry-->
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					



          <?php $options = get_option('pureline'); if (($pureline_header_meta == "") || ($pureline_header_meta == "single") || ($pureline_header_meta == "single_archive")) 
        { ?>  <h1 class="entry-title"><?php if ( get_the_title() ){ the_title(); }else{ _e( 'Untitled', 'pure-line' );  } ?></h1>
        
        
					<!--BEGIN .entry-meta .entry-header-->
					<div class="entry-meta entry-header">
          <a href="<?php the_permalink() ?>"><span class="published"><?php the_time('M d'); ?>, <?php the_time('Y'); ?></strong></span></a>
 
          <?php if ( comments_open() ) : ?>           
          <span class="comment-count"> ~ <?php comments_popup_link( __( 'Leave a Comment', 'pure-line' ), __( '1 Comment', 'pure-line' ), __( '% Comments', 'pure-line' ) ); ?></span>
          <?php else :
           endif; ?>
         
          
          <span class="author vcard">
          
  
          
          

          ~ <?php _e( 'Written by', 'pure-line' ); ?> <strong><?php printf( '<a class="url fn" href="' . get_author_posts_url( $authordata->ID, $authordata->user_nicename ) . '" title="' . sprintf( 'View all posts by %s', $authordata->display_name ) . '">' . get_the_author() . '</a>' ) ?></strong></span>
						
						
            				    <?php edit_post_link( __( 'edit', 'pure-line' ), '<span class="edit-post">', '</span>' ); ?>
					<!--END .entry-meta .entry-header-->
                    </div>   <?php } else { ?>
                    
                    <h1 class="entry-title fl-l"><?php the_title(); ?></h1>
                    
                     <?php if ( current_user_can( 'edit_post', $post->ID ) ): ?>
       
						<?php edit_post_link( __( 'EDIT', 'pure-line' ), '<span class="edit-post edit-attach">', '</span>' ); ?>
            
                        				    
				
                    <?php endif; ?>

                    <br /><br /><?php } ?>
                    
                    
                  
      
			<!--BEGIN .entry-content .article-->
					<div class="entry-content article">
						<?php the_content( __('~ read more ~', 'pure-line' ) ); ?>
            <?php wp_link_pages( array( 'before' => '<div id="page-links"><p>' . __( '<strong>Pages:</strong>', 'pure-line' ), 'after' => '</p></div>' ) ); ?>
					<!--END .entry-content .article-->
					
          <div style="clear:both;"></div>
          </div>
          
          
          
         

						<!--BEGIN .entry-meta .entry-footer-->
                    <div class="entry-meta entry-footer">
                    	<?php if ( pureline_get_terms( 'cats' ) ) { ?>
                    	<span class="entry-categories"><strong><?php _e('Posted in', 'pure-line' ); ?></strong> <?php echo pureline_get_terms( 'cats' ); ?></span>
                      <?php } ?><?php if ( pureline_get_terms( 'cats' ) && pureline_get_terms( 'tags' ) ) { ?><span class="meta-sep">-</span><?php } ?>
						<?php if ( pureline_get_terms( 'tags' ) ) { ?>
                                                <span class="entry-tags"><strong><?php _e('Tagged', 'pure-line' ); ?></strong> <?php echo pureline_get_terms( 'tags' ); ?></span>
                        <?php } ?>
					<!--END .entry-meta .entry-footer-->
                    </div>
                    
                    
                                   
                    <!-- Auto Discovery Trackbacks
					<?php trackback_rdf(); ?>
					-->
				<!--END .hentry-->
				</div>
        
      <?php $options = get_option('pureline'); if (($pureline_share_this == "") || ($pureline_share_this == "single") || ($pureline_share_this == "single_archive")  || ($pureline_share_this == "all")) { 
        pureline_sharethis(); } else { ?> <div class="margin-40"></div> <?php }?>
        
        
        
        
<?php $options = get_option('pureline'); if (($pureline_similar_posts == "") || ($pureline_similar_posts == "disable")) {} else {
pureline_similar_posts(); } ?>  

       
        <?php if (($pureline_post_links == "") || ($pureline_post_links == "after") || ($pureline_post_links == "both")) { ?>
               
				<?php get_template_part( 'navigation', 'index' ); ?>

        
        <?php } ?>   

				<?php 
        
        if ( comments_open() ) :
        
        comments_template( '', true ); 
        
        else:
        
        comments_template( '', true );
        
        echo __( 'Comments are disabled', 'pure-line' );
        
        echo '<br /><br />';
        
        endif;
        ?>
                
				<?php endwhile; else : ?>

				<!--BEGIN #post-0-->
				<div id="post-0" <?php post_class(); ?>>
					<h1 class="entry-title"><?php _e( 'Not Found', 'pure-line' ); ?></h1>
          
          

					<!--BEGIN .entry-content-->
					<div class="entry-content">
						<p><?php _e( 'Sorry, but you are looking for something that isn\'t here.', 'pure-line' ); ?></p>
						<?php get_search_form(); ?>
					<!--END .entry-content-->
					</div>
				<!--END #post-0-->
				</div>

			<?php endif; ?>

 <!---------------------- 
 ---- single post end
 -----------------------> 


 <!---------------------- 
 ---- home/date/category/tag/search/author begin
 ----------------------->         
      
      <?php } elseif (is_home() || is_date() || is_category() || is_tag() || is_search() || is_author()) { ?>
 
 
 
 <!---------------------- 
 ---- 2 or 3 columns begin
 ----------------------->
 

 
      <?php if (is_date()) { ?> 
      
      
      	<?php /* If this is a daily archive */ if ( is_day() ) { ?>
				<h2 class="page-title archive-title"><?php _e( 'Daily archives for', 'pure-line' ); ?> <span class="daily-title"><?php the_time( 'F jS, Y' ); ?></span></h2>
        				<?php /* If this is a monthly archive */ } elseif ( is_month() ) { ?>
				<h2 class="page-title archive-title"><?php _e( 'Monthly archives for', 'pure-line' ); ?> <span class="monthly-title"><?php the_time( 'F, Y' ); ?></span></h2>
				<?php /* If this is a yearly archive */ } elseif ( is_year() ) { ?>
				<h2 class="page-title archive-title"><?php _e( 'Yearly archives for', 'pure-line' ); ?> <span class="yearly-title"><?php the_time( 'Y' ); ?></span></h2>
				<?php } ?>
        
      <?php } elseif (is_category()) { ?> 
    <h2 class="page-title archive-title"><?php _e( 'Posts in category', 'pure-line' ); ?> <span id="category-title"><?php single_cat_title(); ?></span></h2>

      
       <?php } elseif (is_tag()) { ?> 
       <h2 class="page-title archive-title"><?php _e( 'Posts tagged', 'pure-line' ); ?> <span id="tag-title"><?php single_tag_title(); ?></span></h2>
       
       
       <?php } elseif (is_search()) { ?>
       
       
       <h2 class="page-title search-title"><?php _e( 'Search results for', 'pure-line' ); ?> <?php echo '<span class="search-term">'.the_search_query().'</span>'; ?></h2>
       
          <?php } elseif (is_author()) { ?>
       
       
       <h2 class="page-title archive-title"><?php _e( 'Posts by', 'pure-line' ); ?> <span class="author-title"><?php the_post(); echo $authordata->display_name; rewind_posts(); ?></span></h2>
       
       <?php } ?>
 
  <?php $options = get_option('pureline'); if ($pureline_post_layout == "" || $pureline_post_layout == "two" || $pureline_post_layout == "three") { ?>      
    
    
       <?php if (($pureline_nav_links == "before") || ($pureline_nav_links == "both")) { ?>
          
          
        
				   <span class="nav-top">
				<?php get_template_part( 'navigation', 'index' ); ?>
        </span>
        
        <?php } else {?> 
        
        <?php } ?>         
    
   
      
			<?php if ( have_posts() ) : ?>
      
      
 
      
      
                <?php while ( have_posts() ) : the_post(); ?>
        
                

				<!--BEGIN .hentry-->
				<div id="post-<?php the_ID(); ?>"  
        
       <?php $options = get_option('pureline'); if ($pureline_post_layout == "" || $pureline_post_layout == "two") { 
       $pureline_box = 'odd'.($xyz++%2); } else { $pureline_box = 'odd'.($xyz++%3); } ?>
        
        <?php post_class($pureline_box.' margin-40'); ?>>
        
        
        
          <?php $options = get_option('pureline'); if (($pureline_header_meta == "") || ($pureline_header_meta == "single_archive")) 
        { ?>
        
					<h1 class="entry-title">
          
          
         
          <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
<?php
if ( get_the_title() ){ $title = the_title('', '', false);
echo pureline_truncate($title, 40, '...'); }else{ _e( 'Untitled', 'pure-line' );  }
 ?></a> 
          
          
          
          </h1>

					<!--BEGIN .entry-meta .entry-header-->
					<div class="entry-meta entry-header">
          <a href="<?php the_permalink() ?>"><span class="published"><?php the_time('M d'); ?>, <?php the_time('Y'); ?></strong></span></a>
          <span class="author vcard">
 
          ~ <?php _e( 'Written by', 'pure-line' ); ?> <strong><?php printf( '<a class="url fn" href="' . get_author_posts_url( $authordata->ID, $authordata->user_nicename ) . '" title="' . sprintf( 'View all posts by %s', $authordata->display_name ) . '">' . get_the_author() . '</a>' ) ?></strong></span>
						
            
            
              <?php if ( comments_open() ) : ?>           
          <span class="comment-count"> ~ <?php comments_popup_link( __( 'Leave a Comment', 'pure-line' ), __( '1 Comment', 'pure-line' ), __( '% Comments', 'pure-line' ) ); ?></span>
          <?php else : // comments are closed 
           endif; ?>
            
            
            
						 <?php edit_post_link( __( 'edit', 'pure-line' ), '<span class="edit-post">', '</span>' ); ?>

					<!--END .entry-meta .entry-header-->
                    </div>
                    
                  <?php } else { ?>
                    
                    <h1 class="entry-title fl-l"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
<?php
if ( get_the_title() ){ $title = the_title('', '', false);
echo pureline_truncate($title, 40, '...'); }else{ _e( 'Untitled', 'pure-line' );  }
 ?></a> </h1>
                    
                     <?php if ( current_user_can( 'edit_post', $post->ID ) ): ?>
       
						<?php edit_post_link( __( 'EDIT', 'pure-line' ), '<span class="edit-post edit-attach">', '</span>' ); ?>
            
            
				
                    <?php endif; ?>

                    <br /><br /><?php } ?> 

					<!--BEGIN .entry-content .article-->
					<div class="entry-content article">
          
            <?php  
           
          
if(has_post_thumbnail()) {
	echo '<a class="post-thumbnail" href="'; the_permalink(); echo '">';the_post_thumbnail('post-thumbnail'); echo '</a>';
  
     } else {

                      $image = pureline_get_first_image(); 
                        if ($image):
                      echo '<a class="post-thumbnail" href="'; the_permalink(); echo'"><img src="'.$image.'" alt="';the_title_attribute();echo'" /></a>';
                      
                      
                       endif;
               } ?>
               

          
          <?php $postexcerpt = get_the_content();
$postexcerpt = apply_filters('the_content', $postexcerpt);
$postexcerpt = str_replace(']]>', ']]&gt;', $postexcerpt);
$postexcerpt = wp_filter_nohtml_kses($postexcerpt);
$postexcerpt = strip_shortcodes($postexcerpt);

echo pureline_truncate($postexcerpt, 350, ' [...]');
 ?>
          
          
          <div class="entry-meta entry-footer">
          
          <span class="read-more">
           <a href="<?php the_permalink(); ?>"><?php _e('~ read more ~', 'pure-line' ); ?></a> 
           </span>
          
         
          </div>

					<!--END .entry-content .article-->
          <div style="clear:both;"></div>
					</div>
          
          

				<!--END .hentry-->
				</div>   
        
        <?php $i='';$i++; ?> 

				<?php endwhile; ?>
				<?php get_template_part( 'navigation', 'index' ); ?>
				<?php else : ?>
        
        
        
        <?php if (is_search()) { ?>
        
        
        	<!--BEGIN #post-0-->
				<div id="post-0" <?php post_class(); ?>>
					<h1 class="entry-title"><?php _e( 'Your search for', 'pure-line' ); ?> "<?php echo the_search_query(); ?>" <?php _e( 'did not match any entries', 'pure-line' ); ?></h1>
					
					<!--BEGIN .entry-content-->
					<div class="entry-content">
				<br />
						<p><?php _e( 'Suggestions:', 'pure-line' ); ?></p>
						<ul>
							<li><?php _e( 'Make sure all words are spelled correctly.', 'pure-line' ); ?></li>
							<li><?php _e( 'Try different keywords.', 'pure-line' ); ?></li>
							<li><?php _e( 'Try more general keywords.', 'pure-line' ); ?></li>
						</ul>
					<!--END .entry-content-->
					</div>
				<!--END #post-0-->
				</div>
        
        <?php } else { ?>

				<!--BEGIN #post-0-->
				<div id="post-0" <?php post_class(); ?>>
					<h1 class="entry-title"><?php _e( 'Not Found', 'pure-line' ); ?></h1>

					<!--BEGIN .entry-content-->
					<div class="entry-content">
						<p><?php _e( 'Sorry, but you are looking for something that isn\'t here.', 'pure-line' ); ?></p>
							<!--END .entry-content-->
					</div>
				<!--END #post-0-->
				</div>   
        
        <?php } ?>

			<?php endif; ?>
           
      
<!---------------------- 
 -----------------------
 -----------------------  
 ---- 2 or 3 columns end
 -----------------------
 -----------------------
 ----------------------->  
 
 
 <!---------------------- 
 -----------------------
 -----------------------  
 ---- 1 column begin
 -----------------------
 -----------------------
 -----------------------> 
  
  
  <?php } else { ?>    
     
      <?php $options = get_option('pureline'); if (($pureline_nav_links == "before") || ($pureline_nav_links == "both")) { ?>
          
          
        
				   <span class="nav-top">
				<?php get_template_part( 'navigation', 'index' ); ?>
        </span>
        
        <?php } else {?> 
        
        <?php } ?> 
         

      
			<?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                
                
                  


				<!--BEGIN .hentry-->
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					


          <?php if (($pureline_header_meta == "") || ($pureline_header_meta == "single_archive")) 
        { ?>
        
        <h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php if ( get_the_title() ){ the_title();}else{ _e( 'Untitled', 'pure-line' );  } ?></a></h1>
        
					<!--BEGIN .entry-meta .entry-header-->
					<div class="entry-meta entry-header">
          <a href="<?php the_permalink() ?>"><span class="published"><?php the_time('M d'); ?>, <?php the_time('Y'); ?></strong></span></a>
          
           <?php if ( comments_open() ) : ?>           
          <span class="comment-count"><a href="<?php comments_link(); ?>"><?php comments_popup_link( __( 'Leave a Comment', 'pure-line' ), __( '1 Comment', 'pure-line' ), __( '% Comments', 'pure-line' ) ); ?></a></span>
          <?php else : // comments are closed 
           endif; ?>
          
          <span class="author vcard">
          
   
          
          

          ~ <?php _e( 'Written by', 'pure-line' ); ?> <strong><?php printf( '<a class="url fn" href="' . get_author_posts_url( $authordata->ID, $authordata->user_nicename ) . '" title="' . sprintf( 'View all posts by %s', $authordata->display_name ) . '">' . get_the_author() . '</a>' ) ?></strong></span>
						
						
						
            <?php edit_post_link( __( 'edit', 'pure-line' ), '<span class="edit-post">', '</span>' ); ?>
					<!--END .entry-meta .entry-header-->
                    </div>
                    
                    <?php } else { ?>
                    
                    <h1 class="entry-title fl-l"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php if ( get_the_title() ){ the_title();}else{ _e( 'Untitled', 'pure-line' );  } ?></a></h1>
                    
                     <?php if ( current_user_can( 'edit_post', $post->ID ) ): ?>
       
						<?php edit_post_link( __( 'EDIT', 'pure-line' ), '<span class="edit-post edit-attach">', '</span>' ); ?>
            
				
                    <?php endif; ?>

                    <br /><br /><?php } ?>

					<!--BEGIN .entry-content .article-->
					<div class="entry-content article">
          
          
           <?php $options = get_option('pureline'); if (($options['pureline_excerpt_thumbnail'] == "1")) { ?> 
           
            <?php if(has_post_thumbnail()) {
	echo '<span class="thumbnail"><a class="post-thumbnail" href="'; the_permalink(); echo '">';the_post_thumbnail('post-thumbnail'); echo '</a></span>';
  
     } else {

                      $image = pureline_get_first_image(); 
                        if ($image):
                      echo '<span class="thumbnail"><a class="post-thumbnail" href="'; the_permalink(); echo'"><img src="'.$image.'" alt="';the_title_attribute();echo'" /></a></span>';
                       endif;
               } ?>
               
               
               
               

               

          
          <?php the_excerpt();?>
 
          
           <span class="read-more">
           <a href="<?php the_permalink(); ?>"><?php _e('~ read more ~', 'pure-line' ); ?></a>
           </span>
           
          <?php } else { ?>
          
          
						<?php the_content( __('~ read more ~', 'pure-line' ) ); ?>
            
            <?php wp_link_pages( array( 'before' => '<div id="page-links"><p>' . __( '<strong>Pages:</strong>', 'pure-line' ), 'after' => '</p></div>' ) ); ?>
            
            <?php } ?>
						
					<!--END .entry-content .article--> 
          <div style="clear:both;"></div>                    
					</div>
          
          
          
					<!--BEGIN .entry-meta .entry-footer-->
         
                    <div class="entry-meta entry-footer">
                     <?php if ( pureline_get_terms( 'cats' ) ) { ?>
                    	<span class="entry-categories"><strong><?php _e('Posted in', 'pure-line' ); ?></strong> <?php echo pureline_get_terms( 'cats' ); ?></span>
                      <?php } ?><?php if ( pureline_get_terms( 'cats' ) && pureline_get_terms( 'tags' ) ) { ?><span class="meta-sep">-</span><?php } ?>
						<?php if ( pureline_get_terms( 'tags' ) ) { ?>
                        
                        <span class="entry-tags"><strong><?php _e('Tagged', 'pure-line' ); ?></strong> <?php echo pureline_get_terms( 'tags' ); ?></span>
                        <?php } ?>
					<!--END .entry-meta .entry-footer-->
                    </div>
                   
				<!--END .hentry-->
				</div>
        
        
       <?php $options = get_option('pureline'); if (($pureline_share_this == "single_archive") || ($pureline_share_this == "all")) { 
        pureline_sharethis();  } else { ?> <div class="margin-40"></div> <?php }?>
      
         
      <?php comments_template(); ?>  
       

				<?php endwhile; ?>
        
        
        <?php $options = get_option('pureline'); if (($pureline_nav_links == "") || ($pureline_nav_links == "after") || ($pureline_nav_links == "both")) { ?>
          
          
        
				<?php get_template_part( 'navigation', 'index' ); ?>
        
        <?php } else {?>
        
        <?php } ?>
        
				<?php else : ?>

		     <?php if (is_search()) { ?>
        
        
        	<!--BEGIN #post-0-->
				<div id="post-0" <?php post_class(); ?>>
			
    		<h1 class="entry-title"><?php _e( 'Your search for', 'pure-line' ); ?> "<?php echo the_search_query(); ?>" <?php _e( 'did not match any entries', 'pure-line' ); ?></h1>
					
					<!--BEGIN .entry-content-->
					<div class="entry-content">
				<br />
						<p><?php _e( 'Suggestions:', 'pure-line' ); ?></p>
						<ul>
							<li><?php _e( 'Make sure all words are spelled correctly.', 'pure-line' ); ?></li>
							<li><?php _e( 'Try different keywords.', 'pure-line' ); ?></li>
							<li><?php _e( 'Try more general keywords.', 'pure-line' ); ?></li>
						</ul>
					<!--END .entry-content-->
					</div>
				<!--END #post-0-->
				</div>
        
        <?php } else { ?>

				<!--BEGIN #post-0-->
				<div id="post-0" <?php post_class(); ?>>
					<h1 class="entry-title"><?php _e( 'Not Found', 'pure-line' ); ?></h1>

					<!--BEGIN .entry-content-->
					<div class="entry-content">
						<p><?php _e( 'Sorry, but you are looking for something that isn\'t here.', 'pure-line' ); ?></p>
            
            
            
							<!--END .entry-content-->
					</div>
				<!--END #post-0-->
				</div>   
        
        <?php } ?>

			<?php endif; ?>
      
      
      
      <?php } ?>
      
 <!---------------------- 
 -----------------------
 -----------------------  
 ---- 1 column end
 -----------------------
 -----------------------
 ----------------------->       
      
<!---------------------- 
  -----------------------
  -----------------------
  ---- home/date/category/tag/search/author end
  -----------------------
  -----------------------
  -----------------------> 
      
      <?php } elseif (is_page()) { ?>
      
      
      <?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>

				<!--BEGIN .hentry-->
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
				<h1 class="entry-title"><?php if ( get_the_title() ){ the_title(); }else{ _e( 'Untitled', 'pure-line' );  } ?></h1>  
                    
                    <?php if ( current_user_can( 'edit_post', $post->ID ) ): ?>
       
						<?php edit_post_link( __( 'EDIT', 'pure-line' ), '<span class="edit-page">', '</span>' ); ?>
            
				
                    <?php endif; ?>

                    <br /><br />

					<!--BEGIN .entry-content .article-->
					<div class="entry-content article">
						<?php the_content( __('~ read more ~', 'pure-line' ) ); ?>
					<!--END .entry-content .article-->
          <div style="clear:both;"></div>
					</div>
          
             

					<!-- Auto Discovery Trackbacks
					<?php trackback_rdf(); ?>
					-->
				<!--END .hentry-->
				</div>
        
               <?php $options = get_option('pureline'); if (($pureline_share_this == "all")) { 
        pureline_sharethis();  } ?>
        
				<?php comments_template( '', true ); ?>

			<?php endwhile; endif; ?>
   
   
   
      <?php } elseif (is_404()) { ?>
     
     	<!--BEGIN #post-0-->
				<div id="post-0" <?php post_class(); ?>>
           <h1 class="entry-title"><?php _e( 'Not Found', 'pure-line' ); ?></h1>

					<!--BEGIN .entry-content-->
					<div class="entry-content">
						<p><?php _e( 'Sorry, but you are looking for something that isn\'t here.', 'pure-line' ); ?></p>
            
            
					<!--END .entry-content-->
					</div>
				<!--END #post-0-->
				</div> 
      
        
      
      <?php } ?>


			<!--END #primary .hfeed-->
			</div>
      
        <?php $options = get_option('pureline');
  if (($pureline_layout == "1c"))  
  
  
    { ?>
  
  
  <?php } else { ?>


<?php get_sidebar(); ?>

    <?php } ?>

<?php get_footer(); ?>