<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * The template for displaying all single pages
 *
 *
 * @package Nothing_Personal
 * @since 1.0.0
 */

get_header();
/**
 * @hooked nothing_personal_open_content - 10
 * @hooked nothing_personal_get_page_tpl - 20
 * @hooked nothing_personal_close_content - 30
 */
do_action('nothing_personal_page_content');
get_footer();
