<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package What A Great Website
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="entry-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'wagw' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'wagw' ); ?></p>

					<?php get_search_form(); ?>

<?php echo do_shortcode('[sds-sitemap]'); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
