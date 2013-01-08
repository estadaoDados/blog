<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Catch Themes
 * @subpackage Catch_Box
 * @since Catch Box 1.0
 */
?>

	</div><!-- #main -->

	<footer id="colophon" role="contentinfo">
			<?php
				/* A sidebar in the footer? Yep. You can can customize
				 * your footer with three columns of widgets.
				 */
				get_sidebar( 'footer' );
			?>
           <?php if ( has_nav_menu( 'footer', 'catchbox' ) ) { ?>
                <nav id="access-footer" role="navigation">
                	<h3 class="assistive-text"><?php _e( 'Footer menu', 'catchbox' ); ?></h3>
                    <?php wp_nav_menu( array( 'theme_location'  => 'footer', 'depth' => 1 ) );  ?>
                </nav>
            <?php } ?>
			<div id="site-generator" class="clearfix">
            	<?php do_action( 'catchbox_startgenerator_open' ); ?>
            	<div class="copyright">
                	<?php esc_attr_e('Copyright &copy;', 'catchbox'); ?> <?php _e(date('Y')); ?>
                    <a href="<?php echo home_url('/') ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
						<?php bloginfo('name'); ?>
            		</a>
                    <?php esc_attr_e('. All Rights Reserved.', 'catchbox'); ?>
                </div>
                <div class="powered">
                	<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'catchbox' ) ); ?>" title="<?php esc_attr_e( 'Powered by WordPress', 'catchbox' ); ?>" rel="generator"><?php printf( __( 'Powered by %s', 'catchbox' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
                    <a href="<?php echo esc_url( __( 'http://catchthemes.com/', 'catchbox' ) ); ?>" title="<?php esc_attr_e( 'Theme Catch Box by Catch Themes', 'catchbox' ); ?>" rel="designer"><?php printf( __( 'Theme: %s', 'catchbox' ), 'Catch Box' ); ?></a>
            	</div>
                <?php do_action( 'catchbox_startgenerator_close' ); ?>
          	</div> <!-- #site-generator -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>