<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package What A Great Website
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--[if lt IE 9]>
<script>
var e = ("abbr,article,aside,audio,canvas,datalist,details," + "figure,footer,header,hgroup,mark,menu,meter,nav,output," + "progress,section,time,video,main").split(','); for (var i = 0; i < e.length; i++) { document.createElement(e[i]); } </script> <![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >

<div id="page" class="hfeed site">
<div id="masthead-container">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'wagw' ); ?></a>
	<header id="masthead" class="site-header" role="banner">
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle"><?php _e( 'View Menu', 'wagw' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->

		<div id="hdr-logo"><a href="/"><img src="/wp-content/uploads/WAWG-Logo.png" alt="Wow! What A great Website!" title="Wow! What A Great Website!"></a></div>
		<div class="site-branding">
<?php get_sidebar( 'header' ); ?>

			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div>
	</header><!-- #masthead -->
</div><!-- masthead container -->


		<?php
		if ( ! is_home() && ! is_single() && ! is_page_template( 'slider-page.php' ) && has_post_thumbnail() ) { ?>
			 <div id="featured-image">
			<?php the_post_thumbnail( 'full' ); ?>
			</div>
		<?php   } ?>

			

	<div id="content" class="site-content">
