<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
/*
 * Styling options for the copyright
 *
 * @since 1.0.0
 * @package Nothing_Personal
 */
$wp_customize->add_setting($prefix . '_copyright_bg', array(
	'default' => '',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage'
));
$wp_customize->add_control(
	new WP_Customize_Color_Control($wp_customize,
		$prefix . '_copyright_bg',
		array(
			'label' => esc_html__('Copyright background color.', 'nothing-personal'),
			'description' => esc_html__('Change the main copyright background color.', 'nothing-personal'),
			'section' => $prefix . '_theme_styling_copyright', // Add a default or your own section
		)));

