<?php
/**
 * Vogue Theme Customizer
 *
 * @package Vogue
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vogue_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'vogue_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function vogue_customize_preview_js() {
	wp_enqueue_script( 'vogue_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'vogue_customize_preview_js' );

/**
 * Add postMessage support for site title and description & theme text for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vogue_customize_register_patrials( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'vogue_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'vogue_customize_partial_blogdescription',
		) );
		// Header Partials
		$wp_customize->selective_refresh->add_partial( 'vogue-website-head-no', array(
			'selector'        => '.header-phone',
			'render_callback' => 'vogue_customize_partial_header_phone',
		) );
		$wp_customize->selective_refresh->add_partial( 'vogue-website-site-add', array(
			'selector'        => '.header-address',
			'render_callback' => 'vogue_customize_partial_header_address',
		) );
	}
}
add_action( 'customize_register', 'vogue_customize_register_patrials' );

/**
 * Render Header partials.
 */
function vogue_customize_partial_blogname() {
	bloginfo( 'name' );
}
function vogue_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
function vogue_customize_partial_header_phone() {
	bloginfo( 'vogue-website-head-no' );
}
function vogue_customize_partial_header_address() {
	bloginfo( 'vogue-website-site-add' );
}
