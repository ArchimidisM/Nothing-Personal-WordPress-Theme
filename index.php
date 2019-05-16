<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nothing_Personal
 */
get_header();
/**
 * nothing_personal_content hook
 *
 * This hook is responsible for getting the content.
 *
 * @since 1.0.0
 * @package Nothing_Personal
 *
 * @hooked nothing_personal_open_content - 10
 * @hooked nothing_personal_get_index_content_tpl - 20
 * @hooked nothing_personal_close_content - 30
 */
do_action( 'nothing_personal_index_content' );

get_footer();
