<?php
/**
 * Template: Header.php 
 *
 * @package pureline
 * @subpackage Template
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!--BEGIN html-->
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>


<!--BEGIN head-->
<head profile="<?php pureline_get_profile_uri(); ?>">

	<title><?php wp_title('-', true); ?></title>

	<!-- Meta Tags -->
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo('charset'); ?>" />

<?php wp_head(); ?>   

<!--END head-->  
</head>



<!--BEGIN body-->
<body <?php body_class(); ?>>

<?php $pureline_custom_background = pureline_get_option('pureline_custom_background','0'); if ($pureline_custom_background == "1") { ?>
<div id="wrapper">
<?php } ?>

<div id="top"></div>





	<!--BEGIN .header-->
		<div class="header">
    
	<!--BEGIN .container-->
	<div class="container container-header">
  
  
  
  
  
  
   <div class="subscribe-box">
  
  <!--BEGIN #subscribe-follow-->
 
<?php get_template_part('social-buttons', 'header'); ?>


<!--END #subscribe-follow-->
  
  
</div>                        
  
  
  
  <?php $pureline_pos_logo = pureline_get_option('pureline_pos_logo','left'); if ($pureline_pos_logo == "disable") { ?>
  
  <?php } else { ?>
  
  <?php $options = get_option('pureline');
    if (!empty($options['pureline_header_logo'])) {
        echo "<a href=".home_url()."><img id='logo-image' src=".$options['pureline_header_logo']." /></a>";
    }
      ?>  
     
     <?php } ?> 
     
     
     <?php 
       
     $tagline = '<div id="tagline">'.get_bloginfo( 'description' ).'</div>';
     
     $pureline_tagline_pos = pureline_get_option('pureline_tagline_pos','next');
     
     if (($pureline_tagline_pos !== "disable") && ($pureline_tagline_pos == "above")) { 
 
     
     echo $tagline;
      
     } ?>
     
     
     <?php $pureline_blog_title = pureline_get_option('pureline_blog_title','0'); if ($pureline_blog_title == "1") { ?>
      
     <?php } else { ?> 
     
     
       
			<div id="logo"><span></span><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ) ?></a></div>
      
      <?php } if (($pureline_tagline_pos !== "disable") && (($pureline_tagline_pos == "") || ($pureline_tagline_pos == "next") || ($pureline_tagline_pos == "under")))    
      {
			echo $tagline;
      
      } ?>
      
      
     

	<!--END .container-->
		</div>
    

    		<!--END .header-->
		</div>
    
  
  <div class="menu-container">
          	
	<div class="menu-back">
  
  

  
  <!--BEGIN .container-menu-->
  <div class="container nacked-menu container-menu">

     <?php $pureline_main_menu = pureline_get_option('pureline_main_menu','0'); if ($pureline_main_menu == "1") { ?>
    <br /><br />
    
   <?php } else { ?>
   
   <div class="menu-header">

    <?php if ( has_nav_menu( 'primary-menu' ) ) { ?>
 
     
     <?php wp_nav_menu( array( 'menu_class' => 'nav', 'theme_location' => 'primary-menu' ) ); ?>
      
      <?php } else { ?>
      
      
	        <?php wp_page_menu( 'show_home=1' ); ?>
          
          <?php } ?>  
          
          
          
          <a id="searchbutton" href="#" onClick="magicShow('searchfield'); return false;"></a>

<div id="searchfield" style='display: none;'><?php get_search_form(); ?></div>
       
       <?php } ?>
       
       
       
       
       </div>


          <?php $pureline_widgets_header = pureline_get_option('pureline_widgets_header','disable');

// if Header widgets exist

  if (($pureline_widgets_header == "") || ($pureline_widgets_header == "disable"))  
{ } else { ?>
     
  <div class="container widgets-back">  
  
    
        <!--BEGIN .widgets-holder-->
    <div class="widgets-holder widgets-back-inside">
    
    <div class="header-1">
    	<?php	if ( !dynamic_sidebar( 'header-1' )) : ?>
      <?php endif; ?>
      </div>
     
     <div class="header-2"> 
      <?php	if ( !dynamic_sidebar( 'header-2' ) ) : ?>
      <?php endif; ?>
      </div>
    
    <div class="header-3">  
	    <?php	if ( !dynamic_sidebar( 'header-3' ) ) : ?>
      <?php endif; ?>
      </div>      
    
    
    <div class="header-4">  
    	<?php	if ( !dynamic_sidebar( 'header-4' ) ) : ?>
      <?php endif; ?>
      </div>
        
    </div> 
    
    <!--END .widgets-holder--> 
    
   </div>
   
   
   
     <?php } ?>
   
     <!-- AD Space 2 -->
  
     </div> 
       
             	<!--BEGIN .content-->
	<div class="content">  
  
 


       	<!--BEGIN .container-->
	<div class="container container-center">
  
   


		<!--BEGIN #content-->
		<div id="content">
    
    
    


	