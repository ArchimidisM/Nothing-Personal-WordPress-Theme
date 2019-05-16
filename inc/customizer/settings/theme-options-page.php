<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
/*
 * Settings customizer for the BASE Settings Section
 *
 * @since 1.0.0
 * @package Nothing_Personal
 */


$wp_customize->add_setting( $prefix . '_header_width', array(
	'default'           => esc_attr($defaultValues['header_width']),
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'nothing_personal_sanitize_select',
	'transport' => 'postMessage'
) );


$wp_customize->add_setting( $prefix . '_content_width', array(
	'default'           => esc_attr($defaultValues['content_width']),
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'nothing_personal_sanitize_select',
	'transport' => 'postMessage'
) );
$wp_customize->add_setting( $prefix . '_footer_width', array(
	'default'           => esc_attr($defaultValues['footer_width']),
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'nothing_personal_sanitize_select',
	'transport' => 'postMessage'
) );
$wp_customize->add_setting( $prefix . '_enable_sticky_menu', array(
    'default'           => esc_attr($defaultValues['enable_sticky_menu']),
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'nothing_personal_sanitize_checkbox',
) );

$wp_customize->add_control( $prefix . '_header_width', array(
	'type'        => 'select',
	'priority'    => 9,
	'section'     => $prefix . '_theme_opts_base',
	'label'       => esc_html__( 'Header width.', 'nothing-personal' ),
	'description' => esc_html__( 'Select the width for the header.', 'nothing-personal' ),
	'choices'     => array(
		'np-container-full-np' => esc_html__( '100% (No paddings)', 'nothing-personal' ),
		'np-container-full' => esc_html__( '100%', 'nothing-personal' ),
		'np-container' => esc_html__( '1180px', 'nothing-personal' ),
		'np-container-large' => esc_html__( '1040px', 'nothing-personal' ),
		'np-container-medium' => esc_html__( '996px', 'nothing-personal' ),
		'np-container-small' => esc_html__( '784px', 'nothing-personal' ),
		'np-container-xs' => esc_html__( '525px', 'nothing-personal' ),
	)
) );

$wp_customize->add_control( $prefix . '_content_width', array(
	'type'        => 'select',
	'priority'    => 11,
	'section'     => $prefix . '_theme_opts_base',
	'label'       => esc_html__( 'Content width.', 'nothing-personal' ),
	'description' => esc_html__( 'Select the width for main content.', 'nothing-personal' ),
	'choices'     => array(
		'np-container-full-np' => esc_html__( '100% (No paddings)', 'nothing-personal' ),
		'np-container-full' => esc_html__( '100%', 'nothing-personal' ),
		'np-container' => esc_html__( '1180px', 'nothing-personal' ),
		'np-container-large' => esc_html__( '1040px', 'nothing-personal' ),
		'np-container-medium' => esc_html__( '996px', 'nothing-personal' ),
		'np-container-small' => esc_html__( '784px', 'nothing-personal' ),
		'np-container-xs' => esc_html__( '525px', 'nothing-personal' ),
	)
) );

$wp_customize->add_control( $prefix . '_footer_width', array(
	'type'        => 'select',
	'priority'    => 12,
	'section'     => $prefix . '_theme_opts_base',
	'label'       => esc_html__( 'Footer width.', 'nothing-personal' ),
	'description' => esc_html__( 'Select the width for the footer.', 'nothing-personal' ),
	'choices'     => array(
		'np-container-full-np' => esc_html__( '100% (No paddings)', 'nothing-personal' ),
		'np-container-full' => esc_html__( '100%', 'nothing-personal' ),
		'np-container' => esc_html__( '1180px', 'nothing-personal' ),
		'np-container-large' => esc_html__( '1040px', 'nothing-personal' ),
		'np-container-medium' => esc_html__( '996px', 'nothing-personal' ),
		'np-container-small' => esc_html__( '784px', 'nothing-personal' ),
		'np-container-xs' => esc_html__( '525px', 'nothing-personal' ),
	)
) );

$wp_customize->add_control($prefix . '_enable_sticky_menu', array(
    'type' => 'checkbox',
    'priority' => 18,
    'section' => $prefix . '_theme_opts_base',
    'label' => esc_html__('Enable sticky menu.', 'nothing-personal'),
));