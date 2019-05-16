<?php
/**
 * The main search template file
 *
 * @package Nothing_Personal
 */
get_header();
/**
 * nothing_personal_archive_content hook
 *
 * This hook is responsible for getting the content for the archive pages
 * That means categories , archives , date archives.
 *
 * @since 1.0.0
 * @package Nothing_Personal
 *
 * @hooked nothing_personal_open_content - 10
 * @hooked nothing_personal_get_archive_content- 20
 * @hooked nothing_personal_close_content - 30
 */
do_action('nothing_personal_archive_content');

get_footer();
