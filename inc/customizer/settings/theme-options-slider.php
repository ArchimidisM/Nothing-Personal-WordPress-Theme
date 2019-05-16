<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
/**
 * Settings customizer for the slider
 * settings.
 *
 * @since 1.0.0
 * @package Nothing_Personal
 */


$wp_customize->add_setting( $prefix . '_enable_slider', array(
	'default'           => esc_attr( $defaultValues['enable_slider'] ),
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'nothing_personal_sanitize_checkbox',
) );
$wp_customize->add_setting( $prefix . '_slider_width', array(
	'default'           => esc_attr($defaultValues['slider_width']),
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'nothing_personal_sanitize_select',
) );
$wp_customize->add_setting( $prefix . '_slider_shortcode', array(
	'default'           => esc_attr( $defaultValues['slider_shortcode'] ),
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_setting( $prefix . '_slider_margin_top', array(
	'default'           => esc_attr($defaultValues['slider_margin_top']),
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'nothing_personal_sanitize_select',
) );

$wp_customize->add_setting( $prefix . '_slider_margin_bottom', array(
	'default'           => esc_attr($defaultValues['slider_margin_bottom']),
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'nothing_personal_sanitize_select',
) );

$wp_customize->add_control($prefix . '_enable_slider', array(
	'type' => 'checkbox',
	'priority' => 8,
	'section' => $prefix . '_theme_opts_slider',
	'label' => esc_html__('Enable the slider feature', 'nothing-personal'),
));
$wp_customize->add_control( $prefix . '_slider_width', array(
	'type'        => 'select',
	'priority'    => 9,
	'section'     => $prefix . '_theme_opts_slider',
	'label'       => esc_html__( 'Select the slider container type', 'nothing-personal' ),
	'description' => esc_html__( 'You can have it full width if you wish.', 'nothing-personal' ),
	'choices'     => array(
		'np-container-full' => esc_html__( '100%', 'nothing-personal' ),
		'np-container' => esc_html__( '1180px', 'nothing-personal' ),
		'np-container-large' => esc_html__( '1040px', 'nothing-personal' ),
		'np-container-medium' => esc_html__( '996px', 'nothing-personal' ),
		'np-container-small' => esc_html__( '784px', 'nothing-personal' ),
		'np-container-xs' => esc_html__( '525px', 'nothing-personal' ),
	)
) );
$wp_customize->add_control($prefix . '_slider_shortcode', array(
	'type' => 'text',
	'priority' => 10,
	'section' => $prefix . '_theme_opts_slider',
	'label' => esc_html__('Paste the slider\'s shortcode.', 'nothing-personal'),
));
$wp_customize->add_control( $prefix . '_slider_margin_top', array(
	'type'        => 'select',
	'priority'    => 10,
	'section'     => $prefix . '_theme_opts_slider',
	'label'       => esc_html__( 'Margin from the top?', 'nothing-personal' ),
	'description' => esc_html__( 'Select a value please.', 'nothing-personal' ),
	'choices'     => array(
		'no-margin-top' => esc_html__( '0', 'nothing-personal' ),
		'marg-t-5' => esc_html__( '5px', 'nothing-personal' ),
		'marg-t-10' => esc_html__( '10px', 'nothing-personal' ),
		'marg-t-15' => esc_html__( '15px', 'nothing-personal' ),
		'marg-t-20' => esc_html__( '20px', 'nothing-personal' ),
		'marg-t-25' => esc_html__( '25px', 'nothing-personal' ),
		'marg-t-30' => esc_html__( '30px', 'nothing-personal' ),
		'marg-t-35' => esc_html__( '35px', 'nothing-personal' ),
		'marg-t-40' => esc_html__( '40px', 'nothing-personal' ),
		'marg-t-45' => esc_html__( '45px', 'nothing-personal' ),
		'marg-t-50' => esc_html__( '50px', 'nothing-personal' ),
		'marg-t-55' => esc_html__( '55px', 'nothing-personal' ),
		'marg-t-60' => esc_html__( '60px', 'nothing-personal' ),
		'marg-t-70' => esc_html__( '70px', 'nothing-personal' ),
		'marg-t-80' => esc_html__( '80px', 'nothing-personal' ),
		'marg-t-90' => esc_html__( '90px', 'nothing-personal' ),
		'marg-t-100' => esc_html__( '100px', 'nothing-personal' ),

	)
) );
$wp_customize->add_control( $prefix . '_slider_margin_bottom', array(
	'type'        => 'select',
	'priority'    => 11,
	'section'     => $prefix . '_theme_opts_slider',
	'label'       => esc_html__( 'Margin from the bottom?', 'nothing-personal' ),
	'description' => esc_html__( 'Select a value please.', 'nothing-personal' ),
	'choices'     => array(
		'no-margin-top' => esc_html__( '0', 'nothing-personal' ),
		'marg-b-5' => esc_html__( '5px', 'nothing-personal' ),
		'marg-b-10' => esc_html__( '10px', 'nothing-personal' ),
		'marg-b-15' => esc_html__( '15px', 'nothing-personal' ),
		'marg-b-20' => esc_html__( '20px', 'nothing-personal' ),
		'marg-b-25' => esc_html__( '25px', 'nothing-personal' ),
		'marg-b-30' => esc_html__( '30px', 'nothing-personal' ),
		'marg-b-35' => esc_html__( '35px', 'nothing-personal' ),
		'marg-b-40' => esc_html__( '40px', 'nothing-personal' ),
		'marg-b-45' => esc_html__( '45px', 'nothing-personal' ),
		'marg-b-50' => esc_html__( '50px', 'nothing-personal' ),
		'marg-b-55' => esc_html__( '55px', 'nothing-personal' ),
		'marg-b-60' => esc_html__( '60px', 'nothing-personal' ),
		'marg-b-70' => esc_html__( '70px', 'nothing-personal' ),
		'marg-b-80' => esc_html__( '80px', 'nothing-personal' ),
		'marg-b-90' => esc_html__( '90px', 'nothing-personal' ),
		'marg-b-100' => esc_html__( '100px', 'nothing-personal' ),

	)
) );