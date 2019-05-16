<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
/*
 * Styling optios for the post grid.
 *
 * @since 1.0.0
 * @package Nothing_Personal
 */
if (class_exists('Nothing_Personal_Alpha_Color_Control')) {
    // Alpha Color Picker setting.
    $wp_customize->add_setting(
        $prefix . '_postgrid_overlay',
        array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'nothing_personal_sanitize_rgba',
            'transport' => 'postMessage'
        )
    );
}
if (class_exists('Nothing_Personal_Alpha_Color_Control')) {
    // Alpha Color Picker setting.
    $wp_customize->add_setting(
        $prefix . '_postgrid_overlay_hover',
        array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'nothing_personal_sanitize_rgba',
        )
    );
}

$wp_customize->add_setting($prefix . '_postgrid_date_color', array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));
$wp_customize->add_setting($prefix . '_postgrid_title_color', array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(
    new Nothing_Personal_Alpha_Color_Control(
        $wp_customize,
        $prefix . '_postgrid_overlay',
        array(
            'label' => esc_html__('Overlay color for the items.', 'nothing-personal'),
            'description' => esc_html__('Overlay color for the items.', 'nothing-personal'),
            'priority'=> 5,
            'section' => $prefix . '_theme_styling_post_grid',
            'show_opacity' => true,
	        'palette'=> true
        )
    )
);
$wp_customize->add_control(
    new Nothing_Personal_Alpha_Color_Control(
        $wp_customize,
        $prefix . '_postgrid_overlay_hover',
        array(
            'label' => esc_html__('Overlay hover color for the items.', 'nothing-personal'),
            'description' => esc_html__('Overlay color for the items.', 'nothing-personal'),
            'priority'=> 6,
            'section' => $prefix . '_theme_styling_post_grid',
            'show_opacity' => true,
	        'palette'=> true
        )
    )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control($wp_customize,
        $prefix . '_postgrid_date_color',
        array(
            'label' => esc_html__('Date Color.', 'nothing-personal'),
            'description' => esc_html__('Change the date color . This changes the small dotted borders color as well after you hit publish.', 'nothing-personal'),
            'section' => $prefix . '_theme_styling_post_grid', // Add a default or your own section
        )));
$wp_customize->add_control(
    new WP_Customize_Color_Control($wp_customize,
        $prefix . '_postgrid_title_color',
        array(
            'label' => esc_html__('Change the title color.', 'nothing-personal'),
            'description' => esc_html__('Change the main title color.', 'nothing-personal'),
            'section' => $prefix . '_theme_styling_post_grid', // Add a default or your own section
        )));
