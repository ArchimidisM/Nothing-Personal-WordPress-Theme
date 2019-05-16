<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
$wp_customize->add_setting( $prefix . '_disable_copyright', array(
	'default'           => esc_attr( $defaultValues['disable_copyright'] ),
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'nothing_personal_sanitize_checkbox',
) );
$wp_customize->add_setting( $prefix . '_copyright_text', array(
	'default'           => '',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'wp_kses_post',
) );

$wp_customize->add_control( $prefix . '_disable_copyright', array(
	'type'     => 'checkbox',
	'priority' => 9,
	'section'  => $prefix . '_theme_opts_copyright',
	'label'    => esc_html__( 'Completely remove the copyright and its contents.', 'nothing-personal' ),
) );

$wp_customize->add_control( $prefix . '_copyright_text', array(
	'type'     => 'textarea',
	'priority' => 10,
	'section'  => $prefix . '_theme_opts_copyright',
	'label'    => esc_html__( 'Copyright text.', 'nothing-personal' ),
) );