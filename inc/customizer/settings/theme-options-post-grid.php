<?php
/**
 * @since 1.0.0
 * @package Nothing_Personal
 */
if ( ! function_exists( 'nothing_personal_customizer_categories' ) ):
	function nothing_personal_customizer_categories( $tax = 'category' ) {
		$catArray      = array();

		$allCategories = get_terms(
			array(
				'taxonomy'   => $tax,
				'hide_empty' => false
			)
		);

		if ( ! empty( $allCategories ) ):
			foreach ( $allCategories as $category ):

				$catArray[$category->slug] = $category->name;

			endforeach;
		endif;

		return $catArray;
	}
endif;


$wp_customize->add_setting( $prefix . '_enable_postgrid', array(
	'default'           => esc_attr($defaultValues['enable_postgrid']),
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'nothing_personal_sanitize_checkbox',
) );
$wp_customize->add_setting( $prefix . '_show_postgrid_frontpage', array(
	'default'           => esc_attr($defaultValues['show_postgrid_frontpage']),
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'nothing_personal_sanitize_checkbox',
) );
$wp_customize->add_setting( $prefix . '_postgrid_width', array(
	'default'           => esc_attr($defaultValues['postgrid_width']),
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'nothing_personal_sanitize_select',
) );
$wp_customize->add_setting( $prefix . '_postgrid_margin_top', array(
	'default'           => esc_attr($defaultValues['postgrid_margin_top']),
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'nothing_personal_sanitize_select',
) );

$wp_customize->add_setting( $prefix . '_postgrid_margin_bottom', array(
	'default'           => esc_attr($defaultValues['postgrid_margin_bottom']),
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'nothing_personal_sanitize_select',
) );

$wp_customize->add_setting( $prefix . '_postgrid_src_type', array(
	'default'           => esc_attr($defaultValues['postgrid_src_type']),
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'nothing_personal_sanitize_select',
) );
$wp_customize->add_setting( $prefix . '_postgrid_category', array(
	'default'           => esc_attr($defaultValues['postgrid_category']),
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'nothing_personal_sanitize_select',
) );

if ( class_exists( 'Nothing_Personal_Control_Radio_Image' ) ) :
	$wp_customize->add_setting( $prefix . '_postgrid_layout', array(
		'default'           => esc_attr( $defaultValues['postgrid_layout'] ),
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'nothing_personal_sanitize_integer',
	) );
endif;

$wp_customize->add_control($prefix . '_enable_postgrid', array(
	'type' => 'checkbox',
	'priority' => 7,
	'section' => $prefix . '_theme_opts_post_grid',
	'label' => esc_html__('Show the post grid.', 'nothing-personal'),
));
$wp_customize->add_control($prefix . '_show_postgrid_frontpage', array(
	'type' => 'checkbox',
	'priority' => 8,
	'section' => $prefix . '_theme_opts_post_grid',
	'label' => esc_html__('Show the post grid only in the frontpage.', 'nothing-personal'),
));
$wp_customize->add_control( $prefix . '_postgrid_width', array(
	'type'        => 'select',
	'priority'    => 9,
	'section'     => $prefix . '_theme_opts_post_grid',
	'label'       => esc_html__( 'Select the grid/carousel container width.', 'nothing-personal' ),
	'description' => esc_html__( 'You can have it full width if you wish.', 'nothing-personal' ),
	'choices'     => array(
		'np-container-full' => esc_html__( '100%', 'nothing-personal' ),
		'np-container' => esc_html__( '1180px', 'nothing-personal' ),
		'np-container-large' => esc_html__( '1040px', 'nothing-personal' ),
		'np-container-medium' => esc_html__( '996px', 'nothing-personal' ),
		'np-container-small' => esc_html__( '784px', 'nothing-personal' ),
		'np-container-xs' => esc_html__( '525px', 'nothing-personal' ),
	)
) );

$wp_customize->add_control( $prefix . '_postgrid_margin_top', array(
	'type'        => 'select',
	'priority'    => 10,
	'section'     => $prefix . '_theme_opts_post_grid',
	'label'       => esc_html__( 'Margin from the top?', 'nothing-personal' ),
	'description' => esc_html__( 'Select a value please.', 'nothing-personal' ),
	'choices'     => array(
		'no-margin-top' => esc_html__( '0', 'nothing-personal' ),
		'marg-t-5' => esc_html__( '5px', 'nothing-personal' ),
		'marg-t-10' => esc_html__( '10px', 'nothing-personal' ),
		'marg-t-15' => esc_html__( '15px', 'nothing-personal' ),
		'marg-t-20' => esc_html__( '20px', 'nothing-personal' ),
		'marg-t-25' => esc_html__( '25px', 'nothing-personal' ),
		'marg-t-30' => esc_html__( '30px', 'nothing-personal' ),
		'marg-t-35' => esc_html__( '35px', 'nothing-personal' ),
		'marg-t-40' => esc_html__( '40px', 'nothing-personal' ),
		'marg-t-45' => esc_html__( '45px', 'nothing-personal' ),
		'marg-t-50' => esc_html__( '50px', 'nothing-personal' ),
		'marg-t-55' => esc_html__( '55px', 'nothing-personal' ),
		'marg-t-60' => esc_html__( '60px', 'nothing-personal' ),
		'marg-t-70' => esc_html__( '70px', 'nothing-personal' ),
		'marg-t-80' => esc_html__( '80px', 'nothing-personal' ),
		'marg-t-90' => esc_html__( '90px', 'nothing-personal' ),
		'marg-t-100' => esc_html__( '100px', 'nothing-personal' ),
		
	)
) );
$wp_customize->add_control( $prefix . '_postgrid_margin_bottom', array(
	'type'        => 'select',
	'priority'    => 11,
	'section'     => $prefix . '_theme_opts_post_grid',
	'label'       => esc_html__( 'Margin from the bottom?', 'nothing-personal' ),
	'description' => esc_html__( 'Select a value please.', 'nothing-personal' ),
	'choices'     => array(
		'no-margin-top' => esc_html__( '0', 'nothing-personal' ),
		'marg-b-5' => esc_html__( '5px', 'nothing-personal' ),
		'marg-b-10' => esc_html__( '10px', 'nothing-personal' ),
		'marg-b-15' => esc_html__( '15px', 'nothing-personal' ),
		'marg-b-20' => esc_html__( '20px', 'nothing-personal' ),
		'marg-b-25' => esc_html__( '25px', 'nothing-personal' ),
		'marg-b-30' => esc_html__( '30px', 'nothing-personal' ),
		'marg-b-35' => esc_html__( '35px', 'nothing-personal' ),
		'marg-b-40' => esc_html__( '40px', 'nothing-personal' ),
		'marg-b-45' => esc_html__( '45px', 'nothing-personal' ),
		'marg-b-50' => esc_html__( '50px', 'nothing-personal' ),
		'marg-b-55' => esc_html__( '55px', 'nothing-personal' ),
		'marg-b-60' => esc_html__( '60px', 'nothing-personal' ),
		'marg-b-70' => esc_html__( '70px', 'nothing-personal' ),
		'marg-b-80' => esc_html__( '80px', 'nothing-personal' ),
		'marg-b-90' => esc_html__( '90px', 'nothing-personal' ),
		'marg-b-100' => esc_html__( '100px', 'nothing-personal' ),
		
	)
) );

$wp_customize->add_control( $prefix . '_postgrid_src_type', array(
	'type'        => 'select',
	'priority'    => 12,
	'section'     => $prefix . '_theme_opts_post_grid',
	'label'       => esc_html__( 'Select the post source', 'nothing-personal' ),
	'description' => esc_html__( 'Select a value please.', 'nothing-personal' ),
	'choices'     => array(
		'latest-posts' => esc_html__( 'Latest Posts', 'nothing-personal' ),
		'latest-posts-category' => esc_html__( 'Latest Posts from a specific category', 'nothing-personal' ),

	)
) );
$wp_customize->add_control( $prefix . '_postgrid_category', array(
	'type'        => 'select',
	'priority'    => 13,
	'section'     => $prefix . '_theme_opts_post_grid',
	'label'       => esc_html__( 'Select the category', 'nothing-personal' ),
	'description' => esc_html__( 'The posts in the grid will be from that category.', 'nothing-personal' ),
	'choices'     => nothing_personal_customizer_categories('category')
) );
$wp_customize->add_control(
	new Nothing_Personal_Control_Radio_Image(
		$wp_customize, $prefix . '_postgrid_layout', array(
			'label'    => esc_html__( 'Select the layout.', 'nothing-personal' ),
			'description'    => esc_html__( 'Some layouts require the full width layout because it is better for the user experience.', 'nothing-personal' ),
			'priority' => 15,
			'section'  => $prefix . '_theme_opts_post_grid',
			'choices'  => array(
				1 => array(
					'url'   => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/media/layouts/post-grid/post-grid-layout-1.png',
					'label' => esc_html__( 'Default Post Grid', 'nothing-personal' ),
				),
				2 => array(
					'url'   => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/media/layouts/post-grid/post-grid-layout-2.png',
					'label' => esc_html__( 'Horizontal Post Grid', 'nothing-personal' ),
				),
                3 => array(
					'url'   => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/media/layouts/post-grid/post-grid-layout-3.jpg',
					'label' => esc_html__( 'Carousel', 'nothing-personal' ),
				),

			),
		)
	)
);