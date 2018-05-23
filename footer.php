<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package What A Great Website
 */
?>

	</div><!-- #content -->
<div id="colophon-container">
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info"><a href="mailto:info@whatagreatwebsite.net">info@whatagreatwebsite.net</a> | <a href="tel:7739167684">773.916.7684</a><br />&copy; <?php echo date( 'Y' );?> What A Great Website!, LLC<br>
	                        <?php
							if ( function_exists( 'the_privacy_policy_link' ) ) {
								the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
							}
						?>

		</div><!-- .site-info -->
<?php get_sidebar( 'footer' ); ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</div><!-- colophon-container -->
</div><!-- main-container -->
</body>
</html>
