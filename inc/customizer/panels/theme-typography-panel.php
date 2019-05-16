<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
$wp_customize->add_panel( $prefix . '_theme_typography', array(
    'priority'       => 5,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => esc_html__( 'NP Theme Typography', 'nothing-personal' ),
    'description'    => esc_html__( 'Typography Options. ', 'nothing-personal' ),
) );

$wp_customize->add_section( $prefix . '_theme_typography_base', array(
    'priority'       => 18,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Basic Typography', 'nothing-personal' ),
    'description'    => esc_html__('Typography settings.','nothing-personal'),
    'panel'          => $prefix . '_theme_typography',
) );

//require_once NOTHING_PERSONAL_INCPATH.'customizer/settings/theme-options-header.php';
require_once NOTHING_PERSONAL_INCPATH.'customizer/settings/theme-typography-options.php';