<?php
/**
 * Template: Navigation.php 
 *
 * @package pureline
 * @subpackage Template
 */

if ( is_singular() and !is_page() ) { ?>
<!--BEGIN .navigation-links-->
<div class="navigation-links single-page-navigation" style="clear:both;">
	<div class="nav-previous"><?php previous_post_link( '%link', '&larr;' ); ?></div>
	<div class="nav-next"><?php next_post_link( '%link', '&rarr;' ); ?></div>
<!--END .navigation-links-->
</div>
<div style="clear:both;"></div>
<?php } else { ?>
<!--BEGIN .navigation-links-->
<div class="navigation-links page-navigation" style="clear:both;">
<?php if (function_exists('wp_pagenavi')) : ?>
        <?php wp_pagenavi(); ?>
    <?php else: ?>
	<span class="nav-next"><?php next_posts_link( __( '<span class="nav-meta">&larr;</span>', 'pure-line' ) ); ?></span>
	<span class="nav-previous"><?php previous_posts_link( __( '<span class="nav-meta">&rarr;</span>', 'pure-line' ) ); ?></span>
  <?php endif; ?>
<!--END .navigation-links-->
</div>
<div style="clear:both;"></div>

<?php } ?>