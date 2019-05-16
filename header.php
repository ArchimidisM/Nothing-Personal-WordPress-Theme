<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nothing_Personal
 */
?>
    <!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
    </head>

<body id="post-<?php the_ID(); ?>" <?php body_class(NOTHING_PERSONAL_THEMESLUG . '-body-contents item-with-id-' . get_the_id()); ?>>
<?php
/**
 * nothing_personal_header hook
 *
 * This hook is responsible for showing the header of the Nothing Personal WordPress Theme
 *
 * @since 1.0.0
 * @package Nothing_Personal
 *
 * @hooked nothing_personal_skip_link - 5
 * @hooked nothing_personal_open_header - 10
 * @hooked nothing_personal_get_header_tpl - 20
 * @hooked nothing_personal_close_header - 30
 * @hooked nothing_personal_get_mobile_header - 32
 * @hooked nothing_personal_show_header_image - 35
 * @hooked nothing_personal_get_post_grid - 38
 * @hooked nothing_personal_get_slider - 40
 */
do_action('nothing_personal_header'); ?>