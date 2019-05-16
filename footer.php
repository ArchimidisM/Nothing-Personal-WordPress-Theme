<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nothing_Personal
 */

/**
 * nothing_personal_footer hook
 *
 * This hook is responsible for showing the footer contents
 *
 * @since 1.0.0
 * @package Nothing_Personal
 *
 * @hooked nothing_personal_open_footer - 10
 * @hooked akispress_get_footer_tpl - 20
 * @hooked nothing_personal_close_footer - 30
 */
$nothing_personal_footer_enable = absint( nothing_personal_footer_sidebar_enable() );
if ( $nothing_personal_footer_enable != true ):
	do_action( 'nothing_personal_footer' );
endif;

/**
 * nothing_personal_copyright hook
 *
 * This hook is responsible for showing the copyright contents
 *
 * @since 1.0.0
 * @package Nothing_Personal
 *
 * @hooked nothing_personal_open_copyright - 10
 * @hooked nothing_personal_get_copyright_tpl - 20
 * @hooked nothing_personal_close_copyright - 30
 */
$nothing_personal_copyright_disable = absint( nothing_personal_copyright_enable() );
if ( $nothing_personal_copyright_disable == 0 ):
	do_action( 'nothing_personal_copyright' );
endif;
/**
 * nothing_personal_floated_items hook
 *
 * This hook is responsible for showing floated items
 * like sidebars,navigation menus mostly in mobile.
 *
 * @since 1.0.0
 * @package Nothing_Personal
 *
 * @hooked nothing_personal_mobile_menu_tpl - 5
 * @hooked nothing_personal_floated_sidebar- 10
 * @hooked nothing_personal_floated_search - 15
 */
do_action( 'nothing_personal_floated_items' );
wp_footer(); ?>

</body>
</html>
