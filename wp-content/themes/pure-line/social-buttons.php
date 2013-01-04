<div class="social-buttons"><div class="social-trans-left"></div><div class="social-trans-right"></div>
<div class="sc_menu">

<?php 
$pureline_rss_feed = pureline_get_option('pureline_rss_feed','');
$pureline_facebook = pureline_get_option('pureline_facebook','');
$pureline_twitter_id = pureline_get_option('pureline_twitter_id','');
$pureline_googleplus = pureline_get_option('pureline_googleplus','');
$pureline_skype = pureline_get_option('pureline_skype','');
$pureline_youtube = pureline_get_option('pureline_youtube','');
$pureline_flickr = pureline_get_option('pureline_flickr','');
$pureline_linkedin = pureline_get_option('pureline_linkedin','');
?>



<ul class="sc_menu">

<li><a target="_blank" href="<?php if ($pureline_rss_feed != "" ) { echo $pureline_rss_feed; } else { bloginfo( 'rss_url' ); } ?>" class="tipsytext" id="rss" original-title="RSS Feed"></a></li>

<?php 
  if (!empty($pureline_facebook)) { ?>
<li><a target="_blank" href="http://facebook.com/<?php if ($pureline_facebook == "" ) $pureline_facebook = $default_facebook;echo esc_attr($pureline_facebook);?>" class="tipsytext" id="facebook" original-title="Facebook"></a></li><?php } else { ?><?php } ?>

<?php 
  if (!empty($pureline_twitter_id)) { ?>
<li><a target="_blank" href="http://twitter.com/<?php if ($pureline_twitter_id == "" ) $pureline_twitter_id = $default_twitter_id;echo esc_attr($pureline_twitter_id);?>" class="tipsytext" id="twitter" original-title="Twitter"></a></li><?php } else { ?><?php } ?>

<?php 
  if (!empty($pureline_googleplus)) { ?>
<li><a target="_blank" href="http://plus.google.com/<?php if ($pureline_googleplus != "" ) echo $pureline_googleplus; ?>" class="tipsytext" id="plus" original-title="Google Plus"></a></li><?php } else { ?><?php } ?>

<?php 
  if (!empty($pureline_skype)) { ?>
<li><a href="skype:<?php if ($pureline_skype != "" ) echo $pureline_skype; ?>?call" class="tipsytext" id="skype" original-title="Skype"></a></li><?php } else { ?><?php } ?>

<?php 
  if (!empty($pureline_youtube)) { ?>
<li><a target="_blank" href="http://youtube.com/user/<?php if ($pureline_youtube != "" ) echo $pureline_youtube; ?>" class="tipsytext" id="youtube" original-title="YouTube"></a></li><?php } else { ?><?php } ?>

<?php 
  if (!empty($pureline_flickr)) { ?>
<li><a target="_blank" href="http://flickr.com/photos/<?php if ($pureline_flickr != "" ) echo $pureline_flickr; ?>" class="tipsytext" id="flickr" original-title="Flickr"></a></li><?php } else { ?><?php } ?>

<?php 
  if (!empty($pureline_linkedin)) { ?>
<li><a target="_blank" href="<?php if ($pureline_linkedin != "" ) echo $pureline_linkedin; ?>" class="tipsytext" id="linkedin" original-title="LinkedIn"></a></li><?php } else { ?><?php } ?>




</ul>
</div>

</div>