<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
add_action( 'tgmpa_register', 'nothing_personal_required_plugins' );

function nothing_personal_required_plugins() {

	$plugins = array(
		array(
			'name'     => 'One Click Demo Import',
			'slug'     => 'one-click-demo-import',
			'required' => false,
		),
		array(
			'name'     => 'AddToAny Share Buttons',
			'slug'     => 'add-to-any',
			'required' => false,
		),
		array(
			'name'     => 'Contact Form by WPForms – Drag & Drop Form Builder for WordPress',
			'slug'     => 'wpforms-lite',
			'required' => false,
		),
	);

	$config = array(
		'id'           => 'nothing-personal',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		// Menu slug.
		'has_notices'  => true,
		// Show admin notices or not.
		'dismissable'  => true,
		// If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',
		// If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,
		// Automatically activate plugins after installation or not.
		'message'      => '',
		// Message to output right before the plugins table.

		'strings' => array(
			'page_title' => __( 'Install Required Plugins', 'nothing-personal' ),
			'menu_title' => __( 'Install Plugins', 'nothing-personal' ),

			'installing' => __( 'Installing Plugin: %s', 'nothing-personal' ),

			'updating'                        => __( 'Updating Plugin: %s', 'nothing-personal' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'nothing-personal' ),
			'notice_can_install_required'     => _n_noop(

				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'nothing-personal'
			),
			'notice_can_install_recommended'  => _n_noop(

				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'nothing-personal'
			),
			'notice_ask_to_update'            => _n_noop(

				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'nothing-personal'
			),
			'notice_ask_to_update_maybe'      => _n_noop(

				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'nothing-personal'
			),
			'notice_can_activate_required'    => _n_noop(

				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'nothing-personal'
			),
			'notice_can_activate_recommended' => _n_noop(

				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'nothing-personal'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'nothing-personal'
			),
			'update_link'                     => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'nothing-personal'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'nothing-personal'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'nothing-personal' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'nothing-personal' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'nothing-personal' ),

			'plugin_already_active' => __( 'No action taken. Plugin %1$s was already active.', 'nothing-personal' ),

			'plugin_needs_higher_version' => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'nothing-personal' ),

			'complete'                       => __( 'All plugins installed and activated successfully. %1$s', 'nothing-personal' ),
			'dismiss'                        => __( 'Dismiss this notice', 'nothing-personal' ),
			'notice_cannot_install_activate' => __( 'There are one or more required or recommended plugins to install, update or activate.', 'nothing-personal' ),
			'contact_admin'                  => __( 'Please contact the administrator of this site for help.', 'nothing-personal' ),

			'nag_type' => '',
			// Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		)

	);

	tgmpa( $plugins, $config );
}
/*
 * Most of the theme functionality is based on filters.
 * @package Nothing Personal
 * @since 1.0.0
 */
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 *
 * @return array
 */

add_filter( 'body_class', 'nothing_personal_body_classes' );
function nothing_personal_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'no-single-item';
	} elseif ( is_archive() ) {
		$classes[] = 'archive-item';
	}

	return $classes;
}

add_filter( 'nothing_personal_header_class', 'nothing_personal_add_header_class', 1 );
function nothing_personal_add_header_class( $extraClasses ) {

	$classes[] = 'np-header-wrapper';

	if ( ! empty( $extraClasses ) ) {

		$extra = explode( ',', $extraClasses );

		$classes = array_merge( $classes, $extra );
	}
	$classes = array_map( 'esc_attr', $classes ); // WP XSS ok, sanitized

	return implode( ' ', $classes );

}

add_filter( 'nothing_personal_navigation_class', 'nothing_personal_add_nav_classes', 1 );
function nothing_personal_add_nav_classes( $extraClasses ) {

	$classes[] = 'np-main-navigation';

	if ( ! empty( $extraClasses ) ) {

		$extra = explode( ',', $extraClasses );

		$classes = array_merge( $classes, $extra );
	}
	$classes = array_map( 'esc_attr', $classes ); // WP XSS ok, sanitized

	return implode( ' ', $classes );

}

add_filter( 'nothing_personal_content_class', 'nothing_personal_add_content_classes', 1 );
function nothing_personal_add_content_classes() {

	$classes[] = 'np-content';

	if(is_front_page()):
        $classes[] = 'front-page-content-wrapper';
	elseif(is_home()):
        $classes[] = 'blog-listing-content-wrapper';
    endif;
	if(is_single()){
	    $classes[] = 'single-post-content-wrapper';
    }
	if(is_page()){
	    $classes[] = 'single-page-content-wrapper';
    }
	if ( ! empty( $extraClasses ) ) {

		$extra = explode( ',', $extraClasses );

		$classes = array_merge( $classes, $extra );
	}
	$classes = array_map( 'esc_attr', $classes ); // WP XSS ok, sanitized

	return implode( ' ', $classes );

}

add_filter( 'nothing_personal_footer_class', 'nothing_personal_add_footer_class', 1 );
function nothing_personal_add_footer_class( $extraClasses ) {

	$classes[] = 'np-footer-wrapper';

	if ( ! empty( $extraClasses ) ) {

		$extra = explode( ',', $extraClasses );

		$classes = array_merge( $classes, $extra );
	}
	$classes = array_map( 'esc_attr', $classes ); // WP XSS ok, sanitized

	return implode( ' ', $classes );

}

add_filter( 'nothing_personal_copyright_class', 'nothing_personal_add_copyright_class', 1 );
function nothing_personal_add_copyright_class( $extraClasses ) {

	$classes[] = 'np-copyright-wrapper';

	if ( ! empty( $extraClasses ) ) {

		$extra = explode( ',', $extraClasses );

		$classes = array_merge( $classes, $extra );
	}
	$classes = array_map( 'esc_attr', $classes ); // WP XSS ok, sanitized

	return implode( ' ', $classes );

}