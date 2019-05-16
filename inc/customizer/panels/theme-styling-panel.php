<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
$wp_customize->add_panel( $prefix . '_theme_styling', array(
    'priority'       => 4,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => esc_html__( 'NP Theme Styling', 'nothing-personal' ),
    'description'    => esc_html__( 'Nothing Personal Theme styling options. A lot of colorpickers are here. ', 'nothing-personal' ),
) );

$wp_customize->add_section( $prefix . '_theme_styling_header', array(
    'priority'       => 9,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Header styling', 'nothing-personal' ),
    'description'    => esc_html__('Complete styling of the header element. It contains the navigation.','nothing-personal'),
    'panel'          => $prefix . '_theme_styling',
) );
$wp_customize->add_section( $prefix . '_theme_styling_post_grid', array(
    'priority'       => 9,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Post Grid styling', 'nothing-personal' ),
    'description'    => esc_html__('Complete styling for the post grid element (both grid and carousel).','nothing-personal'),
    'panel'          => $prefix . '_theme_styling',
) );
$wp_customize->add_section( $prefix . '_theme_styling_elements', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Main Elements Styling', 'nothing-personal' ),
    'description'    => esc_html__('Complete styling the main elements like h1,h2,h3 p tags etc . ','nothing-personal'),
    'panel'          => $prefix . '_theme_styling',
) );
$wp_customize->add_section( $prefix . '_theme_styling_footer', array(
    'priority'       => 11,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Footer styling', 'nothing-personal' ),
    'description'    => esc_html__('Complete styling of the footer area . ','nothing-personal'),
    'panel'          => $prefix . '_theme_styling',
) );
$wp_customize->add_section( $prefix . '_theme_styling_copyright', array(
    'priority'       => 12,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Copyright styling', 'nothing-personal' ),
    'description'    => esc_html__('Complete styling of the copyright area . ','nothing-personal'),
    'panel'          => $prefix . '_theme_styling',
) );

require_once NOTHING_PERSONAL_INCPATH.'customizer/settings/theme-styling-header.php';
require_once NOTHING_PERSONAL_INCPATH.'customizer/settings/theme-styling-post-grid.php';
require_once NOTHING_PERSONAL_INCPATH.'customizer/settings/theme-styling-elements.php';
require_once NOTHING_PERSONAL_INCPATH.'customizer/settings/theme-styling-footer.php';
require_once NOTHING_PERSONAL_INCPATH.'customizer/settings/theme-styling-copyright.php';