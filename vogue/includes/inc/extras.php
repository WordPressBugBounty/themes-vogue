<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Vogue
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function vogue_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'vogue_body_classes' );

/**
 * Enqueue Google Fonts for Blocks Editor
 */
function customizer_vogue_editor_fonts() {

	// Font options
	$fonts = array(
		get_theme_mod( 'vogue-body-font', customizer_library_get_default( 'vogue-body-font' ) ),
		get_theme_mod( 'vogue-heading-font', customizer_library_get_default( 'vogue-heading-font' ) )
	);

	$font_uri = customizer_library_get_google_font_uri( $fonts );

	// Load Google Fonts
	if ( !get_theme_mod( 'vogue-disable-google-fonts', customizer_library_get_default( 'vogue-disable-google-fonts' ) ) ) {
		wp_enqueue_style( 'customizer_vogue_editor_fonts', $font_uri, array(), null, 'screen' );
	}

}
add_action( 'enqueue_block_editor_assets', 'customizer_vogue_editor_fonts' );

if ( ! function_exists( 'customizer_library_vogue_editor_styles' ) ) :
/**
 * Generates the fonts selected in the Customizer and enqueues it to the Blocks Editor
 */
function customizer_library_vogue_editor_styles() {
	$bodyfontfam = get_theme_mod( 'vogue-body-font', customizer_library_get_default( 'vogue-body-font' ) );
	$headingfontfam = get_theme_mod( 'vogue-heading-font', customizer_library_get_default( 'vogue-heading-font' ) );
	if ( get_theme_mod( 'vogue-disable-google-fonts' ) == 1 ) {
		$bodyfontfam = get_theme_mod( 'vogue-body-font-websafe', customizer_library_get_default( 'vogue-body-font-websafe' ) );
		$headingfontfam = get_theme_mod( 'vogue-heading-font-websafe', customizer_library_get_default( 'vogue-heading-font-websafe' ) );
	}

	$editor_css = '.editor-styles-wrapper div.wp-block,
				.editor-styles-wrapper div.wp-block p {
					font-family: "' . esc_attr( $bodyfontfam ) . '", sans-serif;
					font-size: 14px;
					color: ' . sanitize_hex_color( get_theme_mod( 'vogue-body-font-color', customizer_library_get_default( 'vogue-body-font-color' ) ) ) . ';
				}
				.editor-post-title .editor-post-title__block .editor-post-title__input,
				.editor-styles-wrapper .wp-block h1,
				.editor-styles-wrapper .wp-block h2,
				.editor-styles-wrapper .wp-block h3,
				.editor-styles-wrapper .wp-block h4,
				.editor-styles-wrapper .wp-block h5,
				.editor-styles-wrapper .wp-block h6 {
					font-family: "' . esc_attr( $headingfontfam ) . '", sans-serif;
					color: ' . sanitize_hex_color( get_theme_mod( 'vogue-heading-font-color', customizer_library_get_default( 'vogue-heading-font-color' ) ) ) . ';
				}
				.wp-block-quote:not(.is-large),
				.wp-block-quote:not(.is-style-large) {
					border-left-color: ' . sanitize_hex_color( get_theme_mod( 'vogue-primary-color', customizer_library_get_default( 'vogue-primary-color' ) ) ) . ' !important;
				}
				.editor-styles-wrapper .wp-block h1 {
					font-size: 32px;
					margin-bottom: .55em;
					font-weight: 500;
				}
				
				.editor-styles-wrapper .wp-block h2 {
					font-size: 28px;
					margin-bottom: .65em;
					font-weight: 500;
				}
				
				.editor-styles-wrapper .wp-block h3 {
					font-size: 22px;
					margin-bottom: .8em;
					font-weight: 500;
				}
				
				.editor-styles-wrapper .wp-block h4 {
					font-size: 20px;
					margin-bottom: 1.1em;
					font-weight: 500;
				}
				
				.editor-styles-wrapper .wp-block h5 {
					font-size: 16px;
					margin-bottom: 1.3em;
					font-weight: 500;
				}
				
				.editor-styles-wrapper .wp-block h6 {
					font-size: 14px;
					margin-bottom: 1.4em;
					font-weight: 500;
				}';

	if ( ! empty( $editor_css ) ) {
		wp_register_style( 'vogue-editor-custom-css', false );
		wp_enqueue_style( 'vogue-editor-custom-css' );
		wp_add_inline_style( 'vogue-editor-custom-css', $editor_css );
	}
}
endif;
add_action( 'enqueue_block_editor_assets', 'customizer_library_vogue_editor_styles' );