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
$wp_customize->add_setting($prefix . '_footer_bg', array(
	'default' => '',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage'
));
$wp_customize->add_setting($prefix . '_footer_headings_color', array(
	'default' => '',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage'
));
$wp_customize->add_setting($prefix . '_footer_text_color', array(
	'default' => '',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage'
));
$wp_customize->add_setting($prefix . '_footer_links_color', array(
	'default' => '',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage'
));
$wp_customize->add_setting($prefix . '_footer_links_hover_color', array(
	'default' => '',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(
	new WP_Customize_Color_Control($wp_customize,
		$prefix . '_footer_bg',
		array(
			'label' => esc_html__('Footer background color.', 'nothing-personal'),
			'description' => esc_html__('Change the main footer background color.', 'nothing-personal'),
			'section' => $prefix . '_theme_styling_footer', // Add a default or your own section
		)));

$wp_customize->add_control(
	new WP_Customize_Color_Control($wp_customize,
		$prefix . '_footer_headings_color',
		array(
			'label' => esc_html__('Footer headings color.', 'nothing-personal'),
			'description' => esc_html__('This applies to the footer widget headings', 'nothing-personal'),
			'section' => $prefix . '_theme_styling_footer', // Add a default or your own section
		)));

$wp_customize->add_control(
	new WP_Customize_Color_Control($wp_customize,
		$prefix . '_footer_text_color',
		array(
			'label' => esc_html__('Footer text color.', 'nothing-personal'),
			'description' => esc_html__('This applies to the footer text', 'nothing-personal'),
			'section' => $prefix . '_theme_styling_footer', // Add a default or your own section
		)));
$wp_customize->add_control(
	new WP_Customize_Color_Control($wp_customize,
		$prefix . '_footer_links_color',
		array(
			'label' => esc_html__('Footer links color.', 'nothing-personal'),
			'description' => esc_html__('This applies to the links color', 'nothing-personal'),
			'section' => $prefix . '_theme_styling_footer', // Add a default or your own section
		)));
$wp_customize->add_control(
	new WP_Customize_Color_Control($wp_customize,
		$prefix . '_footer_links_hover_color',
		array(
			'label' => esc_html__('Footer links hover color.', 'nothing-personal'),
			'description' => esc_html__('This applies to the links color - hover state', 'nothing-personal'),
			'section' => $prefix . '_theme_styling_footer', // Add a default or your own section
		)));

