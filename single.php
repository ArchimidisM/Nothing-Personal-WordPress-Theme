<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Nothing_Personal
 */

get_header();
/**
 * @hooked nothing_personal_open_content - 10
 * @hooked nothing_personal_get_single_tpl - 20
 * @hooked nothing_personal_close_content - 30
 */
do_action('nothing_personal_single_content');
get_footer();
