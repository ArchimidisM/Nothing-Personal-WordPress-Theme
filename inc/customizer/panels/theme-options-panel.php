<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
$wp_customize->add_panel( $prefix . '_theme_opts', array(
    'priority'       => 4,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => esc_html__( 'NP Theme Options', 'nothing-personal' ),
    'description'    => esc_html__( 'Nothing Personal Theme Options. ', 'nothing-personal' ),
) );
$wp_customize->add_section( $prefix . '_theme_opts_header', array(
    'priority'       => 8,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Header / Navigation', 'nothing-personal' ),
    'description'    => esc_html__('Options for the header layout.','nothing-personal'),
    'panel'          => $prefix . '_theme_opts',
) );
$wp_customize->add_section( $prefix . '_theme_opts_post_grid', array(
    'priority'       => 9,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Post Grid / Carousel', 'nothing-personal' ),
    'description'    => esc_html__('You can create a great post grid or carousel of posts with ease.','nothing-personal'),
    'panel'          => $prefix . '_theme_opts',
) );
$wp_customize->add_section( $prefix . '_theme_opts_slider', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Slider(via shortcode)', 'nothing-personal' ),
    'description'    => esc_html__('Add your favourite slider in the header ,using ANY slider you want!','nothing-personal'),
    'panel'          => $prefix . '_theme_opts',
) );
$wp_customize->add_section( $prefix . '_theme_opts_index', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Blog Page', 'nothing-personal' ),
    'description'    => esc_html__('Settings for the index page.','nothing-personal'),
    'panel'          => $prefix . '_theme_opts',
) );
$wp_customize->add_section( $prefix . '_theme_opts_single', array(
    'priority'       => 11,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Single Post settings', 'nothing-personal' ),
    'description'    => esc_html__('Settings for the single posts.','nothing-personal'),
    'panel'          => $prefix . '_theme_opts',
) );
$wp_customize->add_section( $prefix . '_theme_opts_archive', array(
    'priority'       => 12,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Archive/Category/Tag Settings', 'nothing-personal' ),
    'description'    => esc_html__('Settings for the archive pages including archives , tags and category pages as well.','nothing-personal'),
    'panel'          => $prefix . '_theme_opts',
) );
$wp_customize->add_section( $prefix . '_theme_opts_footer', array(
    'priority'       => 18,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Footer settings', 'nothing-personal' ),
    'description'    => esc_html__('Settings for the footer area.','nothing-personal'),
    'panel'          => $prefix . '_theme_opts',
) );
$wp_customize->add_section( $prefix . '_theme_opts_copyright', array(
    'priority'       => 19,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Copyright settings', 'nothing-personal' ),
    'description'    => esc_html__('Settings for the footer area.','nothing-personal'),
    'panel'          => $prefix . '_theme_opts',
) );

require_once NOTHING_PERSONAL_INCPATH.'customizer/settings/theme-options-header.php';
require_once NOTHING_PERSONAL_INCPATH.'customizer/settings/theme-options-post-grid.php';
require_once NOTHING_PERSONAL_INCPATH.'customizer/settings/theme-options-slider.php';
require_once NOTHING_PERSONAL_INCPATH.'customizer/settings/theme-options-index.php';
require_once NOTHING_PERSONAL_INCPATH.'customizer/settings/theme-options-single.php';
require_once NOTHING_PERSONAL_INCPATH.'customizer/settings/theme-options-archive.php';

require_once NOTHING_PERSONAL_INCPATH.'customizer/settings/theme-options-footer.php';
require_once NOTHING_PERSONAL_INCPATH.'customizer/settings/theme-options-copyright.php';