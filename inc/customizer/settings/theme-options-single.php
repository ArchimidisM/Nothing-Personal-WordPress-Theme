<?php
if ( class_exists( 'Nothing_Personal_Control_Radio_Image' ) ) :
	$wp_customize->add_setting( $prefix . '_single_layout', array(
		'default'           => esc_attr( $defaultValues['single_layout'] ),
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'nothing_personal_sanitize_integer',
	) );
endif;

$wp_customize->add_control(
	new Nothing_Personal_Control_Radio_Image(
		$wp_customize, $prefix . '_single_layout', array(
			'label'    => esc_html__( 'Select the layout.', 'nothing-personal' ),
			'description'    => esc_html__( 'Select your favorite layout.', 'nothing-personal' ),
			'priority' => 15,
			'section'  => $prefix . '_theme_opts_single',
			'choices'  => array(
				1 => array(
					'url'   => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/media/layouts/single/single-layout-1.jpg',
					'label' => esc_html__( 'Default single post', 'nothing-personal' ),
				),
				2 => array(
					'url'   => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/media/layouts/single/single-layout-2.jpg',
					'label' => esc_html__( 'Single post with featured image on the left', 'nothing-personal' ),
				),
				3 => array(
					'url'   => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/media/layouts/single/single-layout-3.jpg',
					'label' => esc_html__( 'Single post with large featured image and sidebar', 'nothing-personal' ),
				),
				4 => array(
					'url'   => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/media/layouts/single/single-layout-4.jpg',
					'label' => esc_html__( 'Single post with large featured  and centered content / no sidebar', 'nothing-personal' ),
				),
				5 => array(
					'url'   => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/media/layouts/single/single-layout-5.jpg',
					'label' => esc_html__( 'Single post with large featured  and centered title and below the content.', 'nothing-personal' ),
				),

			),
		)
	)
);