<?php
/**
 * Main boot file of the theme.
 *
 * @package Nothing_Personal
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

DEFINE('NOTHING_PERSONAL_THEMENAME','Nothing Personal');
DEFINE('NOTHING_PERSONAL_THEMESLUG','nothing-personal');
DEFINE('NOTHING_PERSONAL_THEMEASSETS',get_template_directory_uri().'/front-assets/');
DEFINE('NOTHING_PERSONAL_VENDORASSETS',get_template_directory_uri().'/front-assets/vendors/');
DEFINE('NOTHING_PERSONAL_ADMINASSETS',get_template_directory_uri().'/admin-assets/');
DEFINE('NOTHING_PERSONAL_THEMEFONTS',get_template_directory_uri().'/front-assets/fonts/');
DEFINE('NOTHING_PERSONAL_TPLPATH',get_template_directory().'/tpl/');
DEFINE('NOTHING_PERSONAL_INCPATH',get_template_directory().'/inc/');

require_once get_template_directory().'/ext-inc/class-tgm-plugin-activation.php';
require_once get_template_directory().'/inc/customizer/customizer.php';
require_once get_template_directory().'/inc/hooks.php';
require_once get_template_directory().'/inc/filters.php';
require_once get_template_directory().'/inc/widgets.php';
require_once get_template_directory().'/inc/theme-func.php';