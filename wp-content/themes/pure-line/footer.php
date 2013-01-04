<?php
/**
 * Template: Footer.php
 *
 * @package pureline
 * @subpackage Template
 */
?>
		<!--END #content-->
		</div>
    
    	<!--END .container-->
	</div> 
  
  

      	<!--END .content-->
	</div> 
  
     <!--BEGIN .content-bottom--> 
  <div class="content-bottom">
  
       	<!--END .content-bottom-->
  </div>
			
		<!--BEGIN .footer-->
		<div class="footer">
    
  	<!--BEGIN .container-->
	<div class="container container-footer">    
  
  
           
  <?php $pureline_widgets_footer = pureline_get_option('pureline_widgets_num','disable');

// if Footer widgets exist

  if (($pureline_widgets_footer == "") || ($pureline_widgets_footer == "disable"))  
{ } else { ?> 
  
  <!--BEGIN .widgets-holder-->
    <div class="widgets-holder">
    
    <div class="footer-1">
    	<?php	if ( !dynamic_sidebar( 'footer-1' ) ) : ?>
      <?php endif; ?>
      </div>
     
     <div class="footer-2"> 
      <?php	if ( !dynamic_sidebar( 'footer-2' ) ) : ?>
      <?php endif; ?>
      </div>
    
    <div class="footer-3">  
	    <?php	if ( !dynamic_sidebar( 'footer-3' ) ) : ?>
      <?php endif; ?>
      </div>      
    
    
    <div class="footer-4">  
    	<?php	if ( !dynamic_sidebar( 'footer-4' ) ) : ?>
      <?php endif; ?>
      </div>
        
    </div> 
    
    <!--END .widgets-holder--> 
    
    <?php } ?>


<div style="clear:both;"></div> 
  
  <?php
 $footer_content = pureline_get_option('pureline_footer_content','');
 if ($footer_content === false) $footer_content = '';
 echo esc_attr($footer_content);
?>   


 

  
  

			<!-- Theme Hook -->
      
      <?php pureline_footer_hooks(); ?> 
      
		  

          	<!--END .container-->  
	</div> 

 
		
		<!--END .footer-->
		</div>

<!--END body-->  



  <?php $pureline_pos_button = pureline_get_option('pureline_pos_button','disable');
  if ($pureline_pos_button == "disable" || $pureline_pos_button == "") { ?>
  
   <?php } else { ?>
   
     <div id="backtotop"><a href="#top" id="top-link"><span class="top-icon"><?php _e( 'Top', 'pure-line' ); ?></span></a></div>   

<?php } ?>

<?php $pureline_custom_background = pureline_get_option('pureline_custom_background','0');if ($pureline_custom_background == "1") { ?>
</div>
<?php } ?>


<?php wp_footer(); ?> 

</body>
<!--END html(kthxbye)-->
</html>