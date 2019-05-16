<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
/**
 * Nothing Personal Theme Customizer
 * This file contains all the proper settings for each panel
 * sanitization functions etc.
 * @package Nothing_Personal
 * @since 1.0.0
 */

if ( ! function_exists( 'nothing_personal_load_customizer' ) ):
    add_action( 'customize_register', 'nothing_personal_load_customizer' );
    /**
     * Loads the customizer with its options.
     *
     * @package Nothing_Personal
     * @since 1.0.0
     *
     * @param WP_Customize_Manager $wp_customize Theme Customizer object.
     */
    function nothing_personal_load_customizer( $wp_customize ) {
	    require_once NOTHING_PERSONAL_INCPATH. 'customizer/default-values.php';
        $prefix                  = NOTHING_PERSONAL_THEMESLUG;
        $defaultValues = nothing_personal_get_default_customizer_values();

	    require_once NOTHING_PERSONAL_INCPATH . 'customizer/controls/radio-image/class-customize-control-radio-image.php';
	    require_once NOTHING_PERSONAL_INCPATH . 'customizer/controls/alpha-colorpicker/class-customizer-alpha-color-control.php';
	    require_once NOTHING_PERSONAL_INCPATH . 'customizer/controls/font-selector/class-font-selector-control.php';


	    require_once NOTHING_PERSONAL_INCPATH. 'customizer/default-options.php';
        require_once NOTHING_PERSONAL_INCPATH. 'customizer/panels/theme-options-panel.php';
        require_once NOTHING_PERSONAL_INCPATH. 'customizer/panels/theme-styling-panel.php';
        require_once NOTHING_PERSONAL_INCPATH. 'customizer/panels/theme-typography-panel.php';
        require_once NOTHING_PERSONAL_INCPATH. 'customizer/sanitization-functions.php';
    }

endif;