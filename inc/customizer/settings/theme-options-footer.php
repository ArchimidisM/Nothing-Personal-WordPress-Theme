<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
/**
 * Settings customizer for the footer settings
 *
 * @since 1.0.0
 * @package Nothing_Personal
 */

$wp_customize->add_setting( $prefix . '_enable_footer', array(
	'default'           => esc_attr( $defaultValues['enable_footer'] ),
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'nothing_personal_sanitize_checkbox',
) );
if ( class_exists( 'Nothing_Personal_Control_Radio_Image' ) ) :
    $wp_customize->add_setting( $prefix . '_footer_layout', array(
        'default'           => esc_attr( $defaultValues['footer_layout'] ),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'nothing_personal_sanitize_integer',
    ) );
endif;

$wp_customize->add_control( $prefix . '_enable_footer', array(
	'type'     => 'checkbox',
	'priority' => 9,
	'section'  => $prefix . '_theme_opts_footer',
	'label'    => esc_html__( 'Completely remove the footer and its sidebars. It does not remove the copyright.', 'nothing-personal' ),
) );

$wp_customize->add_control(
    new Nothing_Personal_Control_Radio_Image(
        $wp_customize, $prefix . '_footer_layout', array(
            'label'    => esc_html__( 'Footer layout', 'nothing-personal' ),
            'priority' => 10,
            'section'  => $prefix . '_theme_opts_footer',
            'choices'  => array(
                1 => array(
                    'url'   => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/media/layouts/footer/footer-layout-1.jpg',
                    'label' => esc_html__( 'Default index', 'nothing-personal' ),
                ),
                2 => array(
                    'url'   => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/media/layouts/footer/footer-layout-2.jpg',
                    'label' => esc_html__( 'Index with no sidebar', 'nothing-personal' ),
                ),
                3 => array(
                    'url'   => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/media/layouts/footer/footer-layout-3.jpg',
                    'label' => esc_html__( 'Index style 2 w\t sidebar', 'nothing-personal' ),
                ),
                4 => array(
                    'url'   => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/media/layouts/footer/footer-layout-4.jpg',
                    'label' => esc_html__( 'Index style 2 w\t sidebar', 'nothing-personal' ),
                ),

            ),
        )
    )
);