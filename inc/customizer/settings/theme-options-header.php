<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
/*
 * Settings customizer for the BASE Settings Section
 *
 * @since 1.0.0
 * @package Nothing_Personal
 */


$wp_customize->add_setting( $prefix . '_header_width', array(
	'default'           => esc_attr( $defaultValues['header_width'] ),
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'nothing_personal_sanitize_select',
	'transport'         => 'postMessage'
) );


if ( class_exists( 'Nothing_Personal_Control_Radio_Image' ) ) :
	$wp_customize->add_setting( $prefix . '_header_layout', array(
		'default'           => esc_attr( $defaultValues['header_layout'] ),
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'nothing_personal_sanitize_integer',
	) );
endif;

	$wp_customize->add_control( $prefix . '_header_width', array(
		'type'        => 'select',
		'priority'    => 9,
		'section'     => $prefix . '_theme_opts_header',
		'label'       => esc_html__( 'Header width.', 'nothing-personal' ),
		'description' => esc_html__( 'Select the width for the header.', 'nothing-personal' ),
		'choices'     => array(
			'np-container-full-np' => esc_html__( '100% (No paddings)', 'nothing-personal' ),
			'np-container-full'    => esc_html__( '100%', 'nothing-personal' ),
			'np-container'         => esc_html__( '1180px', 'nothing-personal' ),
			'np-container-large'   => esc_html__( '1040px', 'nothing-personal' ),
			'np-container-medium'  => esc_html__( '996px', 'nothing-personal' ),
			'np-container-small'   => esc_html__( '784px', 'nothing-personal' ),
			'np-container-xs'      => esc_html__( '525px', 'nothing-personal' ),
		)
	) );


	$wp_customize->add_control(
		new Nothing_Personal_Control_Radio_Image(
			$wp_customize, $prefix.'_header_layout', array(
				'label'    => esc_html__( 'Layout', 'nothing-personal' ),
				'priority' => 10,
				'section'  => $prefix . '_theme_opts_header',
				'choices'  => array(
					1 => array(
						'url'   => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/media/layouts/header/header-layout-1-1.png',
						'label' => esc_html__( 'Default Header', 'nothing-personal' ),
					),
					2 => array(
						'url'   => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/media/layouts/header/header-layout-2.jpg',
						'label' => esc_html__( 'Logo on top', 'nothing-personal' ),
					),
					3 => array(
						'url'   => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/media/layouts/header/header-layout-3.png',
						'label' => esc_html__( 'Logo on bottom', 'nothing-personal' ),
					),
				),
			)
		)
	);