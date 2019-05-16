<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
/*
 * Styling options for the main elements.
 *
 * @since 1.0.0
 * @package Nothing_Personal
 */
$wp_customize->add_setting($prefix . '_h1_color', array(
	'default' => '',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage'
));
$wp_customize->add_setting($prefix . '_h2_color', array(
	'default' => '',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage'
));
$wp_customize->add_setting($prefix . '_h3_color', array(
	'default' => '',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage'
));
$wp_customize->add_setting($prefix . '_h4_color', array(
	'default' => '',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage'
));
$wp_customize->add_setting($prefix . '_h5_color', array(
	'default' => '',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage'
));
$wp_customize->add_setting($prefix . '_h6_color', array(
	'default' => '',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage'
));

$wp_customize->add_setting($prefix . '_p_color', array(
	'default' => '',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage'
));
$wp_customize->add_setting($prefix . '_a_color', array(
	'default' => '',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage'
));
$wp_customize->add_setting($prefix . '_a_hover_color', array(
	'default' => '',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(
	new WP_Customize_Color_Control($wp_customize,
		$prefix . '_h1_color',
		array(
			'label' => esc_html__('H1 Color.', 'nothing-personal'),
			'description' => esc_html__('Change the main color of the h1 heading.', 'nothing-personal'),
			'section' => $prefix . '_theme_styling_elements', // Add a default or your own section
		)));

$wp_customize->add_control(
	new WP_Customize_Color_Control($wp_customize,
		$prefix . '_h2_color',
		array(
			'label' => esc_html__('H2 Color.', 'nothing-personal'),
			'description' => esc_html__('Change the main color of the h2 heading.', 'nothing-personal'),
			'section' => $prefix . '_theme_styling_elements', // Add a default or your own section
		)));

$wp_customize->add_control(
	new WP_Customize_Color_Control($wp_customize,
		$prefix . '_h3_color',
		array(
			'label' => esc_html__('H3 Color.', 'nothing-personal'),
			'description' => esc_html__('Change the main color of the h3 heading.', 'nothing-personal'),
			'section' => $prefix . '_theme_styling_elements', // Add a default or your own section
		)));
$wp_customize->add_control(
	new WP_Customize_Color_Control($wp_customize,
		$prefix . '_h4_color',
		array(
			'label' => esc_html__('H4 Color.', 'nothing-personal'),
			'description' => esc_html__('Change the main color of the h4 heading.', 'nothing-personal'),
			'section' => $prefix . '_theme_styling_elements', // Add a default or your own section
		)));
$wp_customize->add_control(
	new WP_Customize_Color_Control($wp_customize,
		$prefix . '_h5_color',
		array(
			'label' => esc_html__('H5 Color.', 'nothing-personal'),
			'description' => esc_html__('Change the main color of the h5 heading.', 'nothing-personal'),
			'section' => $prefix . '_theme_styling_elements', // Add a default or your own section
		)));
$wp_customize->add_control(
	new WP_Customize_Color_Control($wp_customize,
		$prefix . '_h6_color',
		array(
			'label' => esc_html__('H6 Color.', 'nothing-personal'),
			'description' => esc_html__('Change the main color of the h6 heading.', 'nothing-personal'),
			'section' => $prefix . '_theme_styling_elements', // Add a default or your own section
		)));
$wp_customize->add_control(
	new WP_Customize_Color_Control($wp_customize,
		$prefix . '_p_color',
		array(
			'label' => esc_html__('Paragraphs Color.', 'nothing-personal'),
			'description' => esc_html__('Change the main color of paragraphs.', 'nothing-personal'),
			'section' => $prefix . '_theme_styling_elements', // Add a default or your own section
		)));

$wp_customize->add_control(
	new WP_Customize_Color_Control($wp_customize,
		$prefix . '_a_color',
		array(
			'label' => esc_html__('Links Color.', 'nothing-personal'),
			'description' => esc_html__('Change the main color of the links.', 'nothing-personal'),
			'section' => $prefix . '_theme_styling_elements', // Add a default or your own section
		)));
$wp_customize->add_control(
	new WP_Customize_Color_Control($wp_customize,
		$prefix . '_a_hover_color',
		array(
			'label' => esc_html__('Links Hover Color.', 'nothing-personal'),
			'description' => esc_html__('Change the main color of the links in hover state.', 'nothing-personal'),
			'section' => $prefix . '_theme_styling_elements', // Add a default or your own section
		)));