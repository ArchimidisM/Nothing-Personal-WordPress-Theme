<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
/*
 * Typography Settings for the
 * Main Elements h1-h6 , p , a tags
 *
 * @since 1.0.0
 * @package Nothing_Personal
 */
$wp_customize->add_setting( $prefix . '_enable_custom_typography', array(
    'default'           => esc_attr( $defaultValues['enable_custom_typography'] ),
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'nothing_personal_sanitize_checkbox',
) );
$wp_customize->add_setting($prefix.'_main_font',
    array(
        'default' => '',
        'sanitize_callback' => 'nothing_personal_google_font_sanitization'
    ));
$wp_customize->add_setting($prefix.'_headings_font',
    array(
        'default' => '',
        'sanitize_callback' => 'nothing_personal_google_font_sanitization'
    ));
$wp_customize->add_setting($prefix.'_secondary_font',
    array(
        'default' => 'Open Sans',
        'sanitize_callback' => 'nothing_personal_google_font_sanitization'
    ));
$wp_customize->add_control( $prefix . '_enable_custom_typography', array(
    'type'     => 'checkbox',
    'priority' => 9,
    'section'  => $prefix . '_theme_typography_base',
    'label'    => esc_html__( 'Override the predifine fonts.', 'nothing-personal' ),
) );

$wp_customize->add_control(new Nothing_Personal_Google_Font_Select_Custom_Control($wp_customize,
    $prefix.'_main_font',
    array(
        'label' => __('Body Font','nothing-personal'),
        'description' => esc_html__('Select your body font','nothing-personal'),
        'section' => $prefix . '_theme_typography_base',
        'input_attrs' => array(
            'font_count' => 'all',
            'orderby' => 'alpha',
        ),
    )
));
$wp_customize->add_control(new Nothing_Personal_Google_Font_Select_Custom_Control($wp_customize,
    $prefix.'_headings_font',
    array(
        'label' => __('Headings Font','nothing-personal'),
        'description' => esc_html__('Select your headings font','nothing-personal'),
        'section' => $prefix . '_theme_typography_base',
        'input_attrs' => array(
            'font_count' => 'all',
            'orderby' => 'alpha',
        ),
    )
));
$wp_customize->add_control(new Nothing_Personal_Google_Font_Select_Custom_Control($wp_customize,
    $prefix.'_secondary_font',
    array(
        'label' => __('Secondary Font','nothing-personal'),
        'description' => esc_html__('Secondary font applies to the navigation menus, related posts etc, post dates, authors etc.','nothing-personal'),
        'section' => $prefix . '_theme_typography_base',
        'input_attrs' => array(
            'font_count' => 'all',
            'orderby' => 'alpha',
        ),
    )
));