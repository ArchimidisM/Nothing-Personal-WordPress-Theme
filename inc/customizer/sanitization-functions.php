<?php
/*
 * Sanitization functions for the customizer.
 *
 * @package Nothing_Personal
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'nothing_personal_sanitize_integer' ) ) {
	/**
	 * Sanitize integer.
	 *
	 * @since 0.0.1
	 * @package AkisPress
	 */
	function nothing_personal_sanitize_integer( $input ) {
		return absint( $input );
	}
}

if ( ! function_exists( 'nothing_personal_sanitize_dropdown_pages' ) ):
	/**
	 * Sanitize the dropdown page selected via
	 * the Customizer.
	 *
	 * @since 0.0.1
	 * @package AkisPress
	 */
	function nothing_personal_sanitize_dropdown_pages( $page_id, $setting ) {
		$page_id = absint( $page_id );

		return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

endif;

if ( ! function_exists( 'nothing_personal_sanitize_select' ) ):
	function nothing_personal_sanitize_select( $input, $setting ) {

		$input   = sanitize_key( $input );
		$choices = $setting->manager->get_control( $setting->id )->choices;

		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

	}
endif;
if ( ! function_exists( 'nothing_personal_sanitize_checkbox' ) ):
	function nothing_personal_sanitize_checkbox( $checked ) {
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}
endif;
if(!function_exists('nothing_personal_sanitize_rgba')):
	function nothing_personal_sanitize_rgba( $color ) {
		if ( empty( $color ) || is_array( $color ) )
			return '';

		if ( false === strpos( $color, 'rgba' ) ) {
			return sanitize_hex_color( $color );
		}

		// By now we know the string is formatted as an rgba color so we need to further sanitize it.
		$color = str_replace( ' ', '', $color );
		sscanf( $color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
		return 'rgba('.$red.','.$green.','.$blue.','.$alpha.')';}
endif;

if ( ! function_exists( 'nothing_personal_google_font_sanitization' ) ) {
    function nothing_personal_google_font_sanitization( $input ) {
        $val =  json_decode( $input, true );
        if( is_array( $val ) ) {
            foreach ( $val as $key => $value ) {
                $val[$key] = sanitize_text_field( $value );
            }
            $input = json_encode( $val );
        }
        else {
            $input = json_encode( sanitize_text_field( $val ) );
        }
        return $input;
    }
}
