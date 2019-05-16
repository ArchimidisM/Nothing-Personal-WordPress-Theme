<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/**
 * Settings customizer for the native header image
 * settings.
 *
 * @since 1.0.0
 * @package Nothing_Personal
 */
$wp_customize->add_setting( $prefix . '_header_image_width', array(
    'default'           => esc_attr($defaultValues['header_image_width']),
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'nothing_personal_sanitize_select',
) );

$wp_customize->add_setting( $prefix . '_header_image_height', array(
    'default'           => esc_attr($defaultValues['header_image_height']),
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'nothing_personal_sanitize_integer',
) );
$wp_customize->add_setting( $prefix . '_mobile_logo_upload', array(
	'default'           => '',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( $prefix . '_header_image_width', array(
    'type'        => 'select',
    'priority'    =>15,
    'section'     => 'header_image',
    'label'       => esc_html__( 'Header Image Width.', 'nothing-personal' ),
    'description' => esc_html__( 'Select the width for the header image. You can also se the height for the setting below.', 'nothing-personal' ),
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
$wp_customize->add_control($prefix . '_header_image_height', array(
    'type' => 'number',
    'priority' => 16,
    'section' => 'header_image',
    'label' => esc_html__('Set the height of the header image. Default is 550px.', 'nothing-personal'),
));

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		$prefix . '_mobile_logo_upload',
		array(
			'label'      => __( 'Upload A Mobile Logo', 'nothing-personal' ),
			'section'    => 'title_tagline',
			'settings'   => $prefix . '_mobile_logo_upload',

		)
	)
);