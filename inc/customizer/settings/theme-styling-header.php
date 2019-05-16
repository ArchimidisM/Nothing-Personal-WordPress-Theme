<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
/*
 * Settings customizer for the Topbar Styling Section
 *
 * @since 1.0.0
 * @package Nothing_Personal
 */

$wp_customize->add_setting( $prefix . '_header_bg_color', array(
	'default'           => '',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport'         => 'postMessage'
) );
$wp_customize->add_setting( $prefix . '_navigation_bg_color', array(
	'default'           => '',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport'         => 'postMessage'
) );
$wp_customize->add_setting( $prefix . '_navigation_links_color', array(
	'default'           => '',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport'         => 'postMessage'
) );
$wp_customize->add_setting( $prefix . '_navigation_links_hover_color', array(
	'default'           => '',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_hex_color',
) );
$wp_customize->add_setting( $prefix . '_navigation_child_links_color', array(
	'default'           => '',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport'         => 'postMessage'
) );
$wp_customize->add_setting( $prefix . '_navigation_child_links_hover_color', array(
	'default'           => '',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_hex_color',
) );
$wp_customize->add_setting( $prefix . '_navigation_current_item_dot_color', array(
	'default'           => '',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_hex_color',
) );
$wp_customize->add_setting( $prefix . '_navigation_current_submenu_item_color', array(
	'default'           => '',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport'         => 'postMessage'
) );

$wp_customize->add_control(
	new WP_Customize_Color_Control( $wp_customize,
		$prefix . '_header_bg_color',
		array(
			'label'   => esc_html__( 'Header background color.', 'nothing-personal' ),
			'description'   => esc_html__( 'Change the background of the header element. It contains both the logo and the navigation.', 'nothing-personal' ),
			'section' => $prefix . '_theme_styling_header', // Add a default or your own section
		) ) );
$wp_customize->add_control(
	new WP_Customize_Color_Control( $wp_customize,
		$prefix . '_navigation_bg_color',
		array(
			'label'   => esc_html__( 'Navigation background color.', 'nothing-personal' ),
			'description'   => esc_html__( 'Change the background of the navigation element. If you use the default header layout it applies to whole header.', 'nothing-personal' ),
			'section' => $prefix . '_theme_styling_header', // Add a default or your own section
		) ) );
$wp_customize->add_control(
	new WP_Customize_Color_Control( $wp_customize,
		$prefix . '_navigation_links_color',
		array(
			'label'   => esc_html__( 'Navigation main links color.', 'nothing-personal' ),
			'description'   => esc_html__( 'Change the parent links color.', 'nothing-personal' ),
			'section' => $prefix . '_theme_styling_header', // Add a default or your own section
		) ) );

$wp_customize->add_control(
	new WP_Customize_Color_Control( $wp_customize,
		$prefix . '_navigation_links_hover_color',
		array(
			'label'   => esc_html__( 'Navigation main links hover color.', 'nothing-personal' ),
			'description'   => esc_html__( 'Change the parent links hover color.', 'nothing-personal' ),
			'section' => $prefix . '_theme_styling_header', // Add a default or your own section
		) ) );


$wp_customize->add_control(
	new WP_Customize_Color_Control( $wp_customize,
		$prefix . '_navigation_child_links_color',
		array(
			'label'   => esc_html__( 'Navigation child links color.', 'nothing-personal' ),
			'description'   => esc_html__( 'Change the child links color.', 'nothing-personal' ),
			'section' => $prefix . '_theme_styling_header', // Add a default or your own section
		) ) );

$wp_customize->add_control(
	new WP_Customize_Color_Control( $wp_customize,
		$prefix . '_navigation_child_links_hover_color',
		array(
			'label'   => esc_html__( 'Navigation child links hover color.', 'nothing-personal' ),
			'description'   => esc_html__( 'Change the child links hover color.', 'nothing-personal' ),
			'section' => $prefix . '_theme_styling_header', // Add a default or your own section
		) ) );
$wp_customize->add_control(
	new WP_Customize_Color_Control( $wp_customize,
		$prefix . '_navigation_current_item_dot_color',
		array(
			'label'   => esc_html__( 'Current item dot color.', 'nothing-personal' ),
			'description'   => esc_html__( 'Change the color of the current item\'s dot.', 'nothing-personal' ),
			'section' => $prefix . '_theme_styling_header', // Add a default or your own section
		) ) );

$wp_customize->add_control(
	new WP_Customize_Color_Control( $wp_customize,
		$prefix . '_navigation_current_submenu_item_color',
		array(
			'label'   => esc_html__( 'Current item in submenu color.', 'nothing-personal' ),
			'description'   => esc_html__( 'Change the color of the current item\'s in the submenu.', 'nothing-personal' ),
			'section' => $prefix . '_theme_styling_header', // Add a default or your own section
		) ) );
