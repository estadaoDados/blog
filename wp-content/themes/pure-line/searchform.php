<?php
/**
 * Template: Searchform.php
 *
 * @package pureline
 * @subpackage Template
 */
?>
<!--BEGIN #searchform-->
       <form action="<?php echo home_url(); ?>" method="get" class="searchform">
       
         <div id="searchtextbox">
  
  <input id="searchtext" type="text" tabindex="1" name="s" class="search" onfocus="if (this.value == '<?php _e( 'Type your search and press enter', 'pure-line' ); ?>') {this.value=''}" onblur="if(this.value == '') { this.value='<?php _e( 'Type your search and press enter', 'pure-line' ); ?>'}" value="<?php _e( 'Type your search and press enter', 'pure-line' ); ?>"> 
  
  </div>  
    
</form>

<div style="clear:both;"></div>

<!--END #searchform-->