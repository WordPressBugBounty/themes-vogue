<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Vogue
 */
?><!DOCTYPE html><!-- Vogue.ORG -->
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php if ( get_theme_mod( 'vogue-site-add-side-social' ) ) : ?>
	<div class="side-aligned-social hide-side-social">
		<?php get_template_part( '/templates/social-links' ); ?>
	</div>
<?php endif; ?>
<div id="page" class="hfeed site <?php echo sanitize_html_class( get_theme_mod( 'vogue-slider-type' ) ); ?>">

<a class="skip-link screen-reader-text" href="#site-content"><?php esc_html_e( 'Skip to content', 'vogue' ); ?></a>

<?php echo ( get_theme_mod( 'vogue-site-layout', customizer_library_get_default( 'vogue-site-layout' ) ) == 'vogue-site-boxed' ) ? '<div class="site-boxed">' : ''; ?>
	
	<?php get_template_part( '/templates/header/header' ); ?>
	
	<?php if ( is_front_page() ) : ?>
		
		<?php get_template_part( '/templates/slider/homepage-slider' ); ?>
		
	<?php endif; ?>

	<div id="site-content" class="site-container content-container <?php echo ( ! is_active_sidebar( 'sidebar-1' ) ) ? sanitize_html_class( 'content-no-sidebar' ) : sanitize_html_class( 'content-has-sidebar' ); ?> <?php echo ( get_theme_mod( 'vogue-titlebar-centered' ) ) ? sanitize_html_class( 'title-bar-centered' ) : ''; ?>">
