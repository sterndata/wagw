<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package What A Great Website
 */

if ( is_active_sidebar( 'footer' ) ) { ?>
	<div id="sidebar-footer" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'footer' );  ?>
	</div><!-- #sidebar-footer -->
<?php } ?>
