<?php
/**
 * Template Name: One column - no sidebar 
 *
 * @package pureline
 * @subpackage Template
 */
 
 get_header(); 
?>
    
    			<!--BEGIN #primary .hfeed-->
			<div id="primary" class="hfeed full-width">
  
  
  
  
  
    <?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>

				<!--BEGIN .hentry-->
				<div id="post-<?php the_ID(); ?>" class="<?php post_class(); ?>"> 
				<h1 class="entry-title"><?php if ( get_the_title() ){ the_title(); }else{ _e( 'Untitled', 'pure-line' );  } ?></h1>  
                    
                    <?php if ( current_user_can( 'edit_post', $post->ID ) ): ?>
       
						<?php edit_post_link( __( 'EDIT', 'pure-line' ), '<span class="edit-page">', '</span>' ); ?>
            
				
                    <?php endif; ?>

                    <br /><br />

					<!--BEGIN .entry-content .article-->
					<div class="entry-content article">
						<?php the_content( __('READ MORE &raquo;', 'pure-line' ) ); ?>
					<!--END .entry-content .article-->
          <div style="clear:both;"></div>
					</div>
          
             

					<!-- Auto Discovery Trackbacks
					<?php trackback_rdf(); ?>
					-->
				<!--END .hentry-->
				</div>
        
               <?php $options = get_option('pureline'); if (($options['pureline_share_this'] == "all")) { 
        pureline_sharethis();  } ?>
        
				<?php comments_template( '', true ); ?>

			<?php endwhile; endif; ?> 
  
  
  
  
  
 	<!--END #primary .hfeed-->
			</div> 
  
  

	<?php get_footer(); ?>