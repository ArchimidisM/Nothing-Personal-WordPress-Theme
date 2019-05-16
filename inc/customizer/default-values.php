<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
/**
 * Nothing Personal Theme Customizer
 *
 * This file sets the default values for all the customizer settings
 *
 * @package Nothing_Personal
 * @since 1.0.0
 */

if ( ! function_exists( 'nothing_personal_get_default_customizer_values' ) ):
	/**
	 * Load the default values for the customizer
	 *
	 * @package Nothing_Personal
	 * @since 1.0.0
	 */
	function nothing_personal_get_default_customizer_values() {

		$defaultVars = array(
			'enable_topbar'           => false,
			'topbar_width'            => 'np-container',
			'header_width'            => 'np-container-full-np',
			'content_width'           => 'np-container',
			'footer_width'            => 'np-container',
			'disable_sidebar'            => false,
			'enable_sticky_menu'      => false,
			'header_layout'           => 3,
			'header_image_width'      => 'np-container',
			'featured_width'          => 'np-container',
			'header_image_height'     => 550,
			'featured_padding_top'    => 0,
			'featured_padding_bottom' => 0,
			'featured_margin_top'     => 0,
			'featured_margin_bottom'  => 0,
			'index_layout'            => 1,
			'enable_postgrid'         => false,
			'show_postgrid_frontpage'         => true,
			'postgrid_width'          => 'np-container',
			'postgrid_margin_top'     => 'marg-t-45',
			'postgrid_margin_bottom'  => 'marg-b-45',
			'postgrid_src_type'  => 'latest-posts-category',
			'postgrid_category'  => 'featured',
			'postgrid_layout'  => 1,
			'enable_slider'  => false,
			'slider_width'  => 'np-container',
			'slider_shortcode'=>'',
			'slider_margin_top'     => 'marg-t-45',
			'slider_margin_bottom'  => 'marg-b-45',
			'single_layout'  => 1,
			'archive_layout'  => 3,
			'archive_disable_sidebar'  => false,
			'enable_footer'=> true,
			'footer_layout'  => 1,
			'disable_copyright'  => false,
			'enable_custom_typography'  => false,
			'body_font'  => 'Lato'
		);

		return $defaultVars;
	}
endif;