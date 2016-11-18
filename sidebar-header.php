<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package What A Great Website
 */

if ( is_active_sidebar( 'header' ) ) { ?>
	<div id="sidebar-header" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'header' );  ?>
	</div><!-- #sidebar-header -->
<?php } ?>
