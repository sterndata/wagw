<?php
/**
 * The Template for displaying all single posts.
 *
 * @package What A Great Website
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php
						   $format = 'single';
			if ( $thisone = get_post_format() ) { $format = $thisone; }
						   get_template_part( 'content', $format ); ?>

			<?php wagw_post_nav(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || '0' != get_comments_number() ) :
				comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
