<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
/*
 * Settings customizer for the index page settings
 *
 * @since 1.0.0
 * @package Nothing_Personal
 */


$wp_customize->add_setting( $prefix . '_enable_sticky_menu', array(
	'default'           => esc_attr( $defaultValues['enable_sticky_menu'] ),
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'nothing_personal_sanitize_checkbox',
) );
$wp_customize->add_setting( $prefix . '_disable_sidebar', array(
	'default'           => esc_attr( $defaultValues['disable_sidebar'] ),
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'nothing_personal_sanitize_checkbox',
) );
if ( class_exists( 'Nothing_Personal_Control_Radio_Image' ) ) :
	$wp_customize->add_setting( $prefix . '_index_layout', array(
		'default'           => esc_attr( $defaultValues['index_layout'] ),
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'nothing_personal_sanitize_integer',
	) );
endif;

$wp_customize->add_control(
	new Nothing_Personal_Control_Radio_Image(
		$wp_customize, $prefix . '_index_layout', array(
			'label'    => esc_html__( 'Layout', 'nothing-personal' ),
			'priority' => 10,
			'section'  => $prefix . '_theme_opts_index',
			'choices'  => array(
				1 => array(
					'url'   => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/media/layouts/index/index-layout-1.jpg',
					'label' => esc_html__( 'Default index', 'nothing-personal' ),
				),
				2 => array(
					'url'   => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/media/layouts/index/index-layout-2.jpg',
					'label' => esc_html__( 'Index with no sidebar', 'nothing-personal' ),
				),
				3 => array(
					'url'   => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/media/layouts/index/index-layout-3.jpg',
					'label' => esc_html__( 'Index style 2 w\t sidebar', 'nothing-personal' ),
				),
				4 => array(
					'url'   => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/media/layouts/index/index-layout-4.jpg',
					'label' => esc_html__( 'Index style 2 w\t sidebar', 'nothing-personal' ),
				),
				5 => array(
					'url'   => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/media/layouts/index/index-layout-5.jpg',
					'label' => esc_html__( 'Index style 3 w\t sidebar', 'nothing-personal' ),
				),
			),
		)
	)
);

$wp_customize->add_control($prefix . '_disable_sidebar', array(
	'type' => 'checkbox',
	'priority' => 11,
	'section' => $prefix . '_theme_opts_index',
	'label' => esc_html__('Disable the sidebar. Show just your content!', 'nothing-personal'),
));