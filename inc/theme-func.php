<?php
/**
 * Functions for this specific theme.
 *
 * @package Nothing_Personal
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


if ( ! function_exists( 'nothing_personal_get_prefix' ) ):
	function nothing_personal_get_prefix() {
		$prefix = NOTHING_PERSONAL_THEMESLUG;

		return $prefix;
	}
endif;
/*================================================================= */
/** ELEMENTS AND GENERIC                                            */
/*================================================================= */
if ( ! function_exists( 'nothing_personal_posts_pagination' ) ):
	/**
	 * Function that gets the pagination links for the posts archives etc.
	 *
	 * @package Nothing_Personal
	 * @since 1.0.0
	 */
	function nothing_personal_posts_pagination( $customQuery = '' ) {
		if ( $customQuery == '' ) {
			get_template_part( 'tpl/generic/pagination/nav-below' );
		} else {
			include( locate_template( 'tpl/generic/pagination/nav-below-custom.php' ) );
		}
	}
endif;

if ( ! function_exists( 'nothing_personal_get_posts' ) ):
	/**
	 *
	 * @return array
	 * @package Nothing_Personal
	 * @since 1.0.0
	 */
	function nothing_personal_get_posts( $number = 3, $postType = array( 'post' ), $offset = 0, $extraArgs = array() ) {
		$postArray = array();
		$args      = array(
			'posts_per_page' => absint( $number ),
			'post_type'      => $postType,
			'offset'         => $offset
		);
		$args      += $extraArgs;


		$posts = get_posts( $args );

		if ( ! empty( $posts ) ):
			foreach ( $posts as $p ):
				$postArray[] = absint( $p->ID );
			endforeach;
		else:
			return false;
		endif;

		return $postArray;
	}
endif;
if ( ! function_exists( 'nothing_personal_get_postgrid_src' ) ):
	function nothing_personal_get_postgrid_src( $src = 'latest-posts-category' ) {
		$terms = esc_attr( get_theme_mod( 'nothing-personal_postgrid_category', 'featured' ) );
		if ( $src == 'latest-posts' ):
			$terms = 'uncategorized';
        elseif ( $src == 'latest-posts-category' ):
			$terms = esc_attr( $terms );
		endif;

		return $terms;

	}
endif;
/*================================================================  */
/** HEADER & NAVIGATION                                             */
/*================================================================= */
if ( ! function_exists( 'nothing_personal_header_image_settings' ) ):
	/*
	 * Function that works with the header image settings from the customizer
	 * settings.
	 *
	 * @package Nothing_Personal
	 * @since 1.0.0
	 */
	function nothing_personal_header_image_settings() {

		$settingsArray       = array();
		$header_width        = esc_attr(get_theme_mod( 'nothing-personal_header_image_width', 'np-container' ));
		$header_image_height = absint( get_theme_mod( 'nothing-personal_header_image_height', 500 ) );

		$settingsArray['header_image_width']  = $header_width;
		$settingsArray['header_image_height'] = $header_image_height;

		return $settingsArray;
	}
endif;
if ( ! function_exists( 'nothing_personal_header_settings' ) ):
	/*
	 * Function that works with the header settings from the customizer
	 * settings.
	 *
	 * @package Nothing_Personal
	 * @since 1.0.0
	 */
	function nothing_personal_header_settings() {

		$settingsArray = array();
		$header_width  = esc_attr(get_theme_mod( 'nothing-personal_header_width', 'np-container' ));
		$hasSticky     = esc_attr( get_theme_mod( 'nothing-personal_enable_sticky_menu', false ));
		$headerLayout  = absint( get_theme_mod( 'nothing-personal_header_layout', 1 ) );

		$settingsArray['header_width']  = $header_width;
		$settingsArray['has_sticky']    = $hasSticky;
		$settingsArray['header_layout'] = $headerLayout;

		return $settingsArray;
	}
endif;

add_filter( 'wp_nav_menu_items', 'nothing_personal_add_search_in_menu', 10, 2 );
function nothing_personal_add_search_in_menu( $items, $args ) {

	if ( $args->theme_location == 'nothing-personal-main-menu' ) {


		$items .= '<li class="text-center">
<a class="np-search-overlay-trigger remove-text-decoration" href="#" title="' . esc_attr__( 'Search the website', 'nothing-personal' ) . '"><span class="jam jam-search"></span></a>';
	}

	return $items;
}

if ( ! function_exists( 'nothing_personal_post_grid_settings' ) ):
	/*
	 * Function that works with the post grid settings.
	 *
	 * @package Nothing_Personal
	 * @since 1.0.0
	 */
	function nothing_personal_post_grid_settings() {

		$settingsArray = array();

		$postGrid_width         = get_theme_mod( 'nothing-personal_postgrid_width', 'np-container' );
		$postGrid_margin_top    = get_theme_mod( 'nothing-personal_postgrid_margin_top', 'marg-t-45' );
		$postGrid_margin_bottom = get_theme_mod( 'nothing-personal_postgrid_margin_bottom', 'marg-b-45' );
		$postGrid_src_type      = get_theme_mod( 'nothing-personal_postgrid_src_type', 'latests-posts-category' );
		$postGrid_category      = get_theme_mod( 'nothing-personal_postgrid_category', 'featured' );
		$postGrid_layout        = get_theme_mod( 'nothing-personal_postgrid_layout', 1 );

		$settingsArray['postgrid_width']         = esc_attr( $postGrid_width );
		$settingsArray['postgrid_margin_top']    = esc_attr( $postGrid_margin_top );
		$settingsArray['postgrid_margin_bottom'] = esc_attr( $postGrid_margin_bottom );
		$settingsArray['postgrid_src_type']      = esc_attr( $postGrid_src_type );
		$settingsArray['postgrid_category']      = esc_attr( $postGrid_category );
		$settingsArray['postgrid_layout']        = absint( $postGrid_layout );


		return $settingsArray;
	}
endif;
if ( ! function_exists( 'nothing_personal_slider_settings' ) ):
	/**
	 * Function that works with the shortcode slider settings.
	 *
	 * @package Nothing_Personal
	 * @since 1.0.0
	 */
	function nothing_personal_slider_settings() {

		$settingsArray = array();

		$slider_width         = get_theme_mod( 'nothing-personal_slider_width', 'np-container' );
		$slider_margin_top    = get_theme_mod( 'nothing-personal_slider_margin_top', 'marg-t-45' );
		$slider_margin_bottom = get_theme_mod( 'nothing-personal_slider_margin_bottom', 'marg-b-45' );
		$slider_shortcode     = get_theme_mod( 'nothing-personal_slider_shortcode', '' );

		$settingsArray['slider_width']         = esc_attr( $slider_width );
		$settingsArray['slider_margin_top']    = esc_attr( $slider_margin_top );
		$settingsArray['slider_margin_bottom'] = esc_attr( $slider_margin_bottom );
		$settingsArray['slider_shortcode']     = sanitize_text_field($slider_shortcode);


		return $settingsArray;
	}
endif;


/*================================================================  */
/** INDEX PAGE LAYOUT                                               */
/*================================================================= */
if ( ! function_exists( 'nothing_personal_get_index_layout' ) ):

	function nothing_personal_get_index_layout() {
		$prefix        = nothing_personal_get_prefix();
		$indexSettings = array();

		$indexType = absint( get_theme_mod( $prefix . '_index_layout', 1 ) );

		$indexSettings['indexType'] = $indexType;

		return $indexSettings;

	}
endif;

if ( ! function_exists( 'nothing_personal_get_tags' ) ):
	function nothing_personal_get_tags( $post_id ) {
		$tags = wp_get_post_tags( $post_id );
		if ( empty( $tags ) ):
			return false;
		else:
			return $tags;
		endif;
	}
endif;

if ( ! function_exists( 'nothing_personal_remove_sidebar' ) ):
	function nothing_personal_remove_sidebar() {
		$itemArgs      = array();
		$removeSidebar = esc_attr( get_theme_mod( 'nothing-personal_disable_sidebar', false ));
		if ( $removeSidebar == true ) {
			$itemArgs['main_class']     = 'col-xs-12';
			$itemArgs['remove_sidebar'] = true;
		} else {
			$itemArgs['main_class']     = 'col-md-9 col-sm-8 col-xs-12';
			$itemArgs['remove_sidebar'] = false;
		}

		return $itemArgs;
	}
endif;

/*================================================================  */
/** ELEMENTS                                                        */
/*================================================================= */

if ( ! function_exists( 'nothing_personal_get_blog_item_categories' ) ):
	function nothing_personal_get_blog_item_categories( $postID, $taxonomy ) {

		$categories = wp_get_object_terms( $postID, $taxonomy );

		if ( ! empty( $categories ) ):

			$numItems       = count( $categories );
			$i              = 0;
			$categoriesHTML = '';
			foreach ( $categories as $ct ):
				$categoriesHTML .= '<a href="' . esc_url( get_term_link( $ct->term_id ) ) . '" 
				title="' . esc_attr__( 'View all posts under this category.', 'nothing-personal' ) . '">' . esc_html( $ct->name ) . '</a>' . esc_attr( ++ $i === $numItems ? '' : ', ' );
			endforeach;
		else:
			return false;
		endif;

		return $categoriesHTML;
	}
endif;

if ( ! function_exists( 'nothing_personal_add_fancybox' ) ):
	function nothing_personal_add_fancybox( $content, $id ) {
		/*
		 * We modify the galleries in order to add some lightbox magic.
		 *
		 * @package Nothing_Personal
		 * @since 1.0.0
		 */
		$title = get_the_title( $id );

		return str_replace( '<a', '<a data-type="image" data-fancybox="gallery" data-caption="' . esc_attr( $title ) . '" title="' . esc_attr( $title ) . '" ', $content );
	}

	add_filter( 'wp_get_attachment_link', 'nothing_personal_add_fancybox', 10, 4 );
endif;

/*================================================================  */
/** SINGLE POST                                                     */
/*================================================================= */
if ( ! function_exists( 'nothing_personal_set_single_post_class' ) ):
	function nothing_personal_set_single_post_class() {
		$postClass = absint( get_theme_mod( 'nothing-personal_single_layout', 1 ) );
		switch ( $postClass ) {
			case 2:
				return esc_attr( 'col-xs-12' );
			case 3:
				return esc_attr( 'col-xs-12' );
			case 4:
				return esc_attr( 'col-xs-12' );
			case 5:
				return esc_attr( 'col-xs-12' );
			default:
				return esc_attr( 'col-md-9 col-sm-8 col-xs-12' );
		}

	}
endif;

if ( ! function_exists( 'nothing_personal_single_post_sidebar' ) ):
	function nothing_personal_single_post_sidebar() {
		$postClass = absint( get_theme_mod( 'nothing-personal_single_layout', 1 ) );
		switch ( $postClass ) {
			case 2:
				return false;
			case 3:
				return true;
			case 4:
				return false;
			case 5:
				return false;
			default:
				return true;
		}
	}
endif;

if ( ! function_exists( 'nothing_personal_get_related_posts' ) ):
	function nothing_personal_get_related_posts( $postID, $postNumber = 3 ) {
		/**
		 * Function that returns the related posts based on the users preferences.
		 * Related Posts appear below the post.
		 *
		 * @since 1.0.0
		 * @package Nothing_Personal
		 */
		$postCategories = get_the_category( $postID );
		$postArray      = array();
		if ( empty( $postCategories ) ): return false; endif;

		$catidlist = '';

		foreach ( $postCategories as $category ) {
			$catidlist .= $category->cat_ID . ",";
		}
		$custom_query_args = array(
			'posts_per_page' => $postNumber,
			'post__not_in'   => array( $postID ),
			'cat'            => $catidlist,
		);
		$posts             = get_posts( $custom_query_args );

		if ( ! empty( $posts ) ):
			foreach ( $posts as $p ):
				$postArray[] = absint( $p->ID );
			endforeach;
		else:
			return false;
		endif;

		return $postArray;


	}
endif;

if ( ! function_exists( 'nothing_personal_get_author_meta' ) ):
	function nothing_personal_get_author_meta() {
		$authorObj                     = array();
		$authorObj['id']               = absint( get_the_author_meta( 'ID' ) );
		$authorObj['display_name']     = esc_html( get_the_author_meta( 'display_name' ) );
		$authorObj['authorName']       = esc_html( get_the_author_meta( 'first_name' ) ) . ' ' . esc_html( get_the_author_meta( 'last_name' ) );
		$authorObj['user_description'] = esc_html( get_the_author_meta( 'user_description' ) );

		return $authorObj;
	}
endif;
/*================================================================  */
/** ARCHIVES                                                         */
/*================================================================= */
if ( ! function_exists( 'nothing_personal_archive_settings' ) ):
	/**
	 * Function that gets the following via the customizer:
	 * archive-layout (1-5)
	 * archive-sidebar and returns an array
	 *
	 * @return array
	 *
	 * @package Nothing_Personal
	 * @since 1.0.0
	 */
	function nothing_personal_archive_settings() {
		$as = array();

		$archiveLayout  = absint( get_theme_mod( 'nothing-personal_archive_layout', 4 ) );
		$archiveSidebar = absint( get_theme_mod( 'nothing-personal_archive_disable_sidebar', false ) );
		switch ( $archiveLayout ) {
			case 1:

				$as['archive_class'] = 'col-xs-12';
				break;
			case 2:
				$as['archive_class'] = 'col-sm-6 col-xs-12';
				break;
			case 3:
				$as['archive_class'] = 'col-sm-4 col-xs-12';
				break;
			default:
				$as['archive_class'] = 'col-xs-12';
		}
		$as['archive_layout'] = $archiveLayout;
		$as['remove_sidebar'] = $archiveSidebar;

		return $as;
	}
endif;
/*============================================================ */
/* FOOTER
/*==============================================================*/
if ( ! function_exists( 'nothing_personal_footer_sidebar_enable' ) ):
	function nothing_personal_footer_sidebar_enable() {
		$isFooterEnabled = get_theme_mod( 'nothing-personal_enable_footer', true );

		if ( $isFooterEnabled == true ) {
			return true;
		} else {
			return false;
		}
	}
endif;
if ( ! function_exists( 'nothing_personal_footer_columns' ) ):
	function nothing_personal_footer_columns() {
		/**
		 * Function that returns the footer sidebar classes.
		 *
		 * @since 1.0.0
		 * @package Nothing_Personal
		 */
		$footerInfo = array();
		$footerCols = absint(get_theme_mod( 'nothing-personal_footer_layout', 1 ));

		if ( $footerCols == 1 ) {
			$footerInfo['class'] = 'col-xs-12 ';

		} elseif ( $footerCols == 2 ) {
			$footerInfo['class'] = 'col-sm-6 col-xs-12 ';

		} elseif ( $footerCols == 3 ) {
			$footerInfo['class'] = 'col-sm-4 col-xs-12 ';
		} elseif ( $footerCols == 4 ) {
			$footerInfo['class'] = 'col-sm-3 col-xs-12 ';

		}
		$footerInfo['columns'] = $footerCols;

		return $footerInfo;
	}

endif;
/*============================================================ */
/** COPYRIGHT                                                  */
/*============================================================ */
if ( ! function_exists( 'nothing_personal_copyright_enable' ) ):
	function nothing_personal_copyright_enable() {
		$isCopyrightDisabled = esc_attr(get_theme_mod( 'nothing-personal_disable_copyright', false ));

		if ( $isCopyrightDisabled == false ) {
			return false;
		} else {
			return true;
		}
	}
endif;
if ( ! function_exists( 'nothing_personal_get_copyright_settings' ) ):
	function nothing_personal_get_copyright_settings() {
		$copys = array();

		$copyright_text = wp_kses_post( get_theme_mod( 'nothing-personal_copyright_text' ), '' );

		$copys['text'] = $copyright_text;

		return $copys;
	}
endif;
/*============================================================ */
/** CUSTOM CSS                                                 */
/*============================================================ */
if ( ! function_exists( 'nothing_personal_custom_css' ) ):
	/*
	 * Function that works with some customizer options and sends the
	 * output as custom CSS to the wp_head element.
	 *
	 * @package Nothing_Personal
	 * @since 1.0.0
	 */
	function nothing_personal_custom_css() {
		$allCustomCSS = nothing_personal_get_all_css();
		if ( $allCustomCSS == false ) {
			return;
		}
		ob_start(); ?>
        <style class="np-custom-style" id="np-custom-css">

            <?php
				foreach($allCustomCSS as $segments){
					foreach($segments as $key=>$value){
						echo $key.$value.';}';
					}
				}
			?>

        </style>
		<?php echo ob_get_clean();
	}

	add_action( 'wp_head', 'nothing_personal_custom_css', 99 );
endif;

if ( ! function_exists( 'nothing_personal_get_all_css' ) ):
	function nothing_personal_get_all_css() {
		/*
		 * Function that gets all the specified elements from the customizer and
		 * sets their css.
		 *
		 * @package Nothing_Personal
		 * @since 1.0.0
		 */
		$dynamicCSS = array();
		$prefix     = 'nothing-personal';
		/*===================
		/** 1. TopBar Styling
		/** 2. Header Styling
		/** 3. Navigation Styling **/

		$np_header = array(
			'.np-header-wrapper { background: '                                                                              => sanitize_hex_color( get_theme_mod( $prefix . '_header_bg_color', '' ) ),
			'.np-header-type-1, .np-header-type-2 .np-main-navigation, .np-header-type-3 .np-main-navigation { background: ' => sanitize_hex_color( get_theme_mod( $prefix . '_navigation_bg_color', '' ) ),
			'.np-header-nav > li > a:not(:hover) { color: '                                                                  => sanitize_hex_color( get_theme_mod( $prefix . '_navigation_links_color', '' ) ),
			'.np-header-nav > li > a:hover { color: '                                                                        => sanitize_hex_color( get_theme_mod( $prefix . '_navigation_links_hover_color', '' ) ),
			'.np-header-nav > li .sub-menu li > a:not(:hover) { color: '                                                     => sanitize_hex_color( get_theme_mod( $prefix . '_navigation_child_links_color', '' ) ),
			'.np-header-nav > li .sub-menu li > a:hover { color: '                                                           => sanitize_hex_color( get_theme_mod( $prefix . '_navigation_child_links_hover_color', '' ) ),
			'.np-main-navigation li.current-menu-item:after, 
			.np-main-navigation li.current-page-ancestor:after { color: '                                        => sanitize_hex_color( get_theme_mod( $prefix . '_navigation_current_item_dot_color', '' ) ),
			'.np-main-navigation li .sub-menu li.current-menu-item a { color: '                                              => sanitize_hex_color( get_theme_mod( $prefix . '_navigation_current_submenu_item_color', '' ) ),

		);

		$np_postgrid = array(
			'.post-grid-overlay { background:'       => sanitize_hex_color_no_hash( get_theme_mod( $prefix . '_postgrid_overlay', '' ) ),
			'.post-grid-overlay:hover { background:' => sanitize_hex_color_no_hash( get_theme_mod( $prefix . '_postgrid_overlay_hover', '' ) ),
			'.post-grid-date { color:'               => sanitize_hex_color( get_theme_mod( $prefix . '_postgrid_date_color', '' ) ),
			'.post-grid-date:before { border-color:' => sanitize_hex_color( get_theme_mod( $prefix . '_postgrid_date_color', '' ) ),
			'.post-grid-date:after { border-color:'  => sanitize_hex_color( get_theme_mod( $prefix . '_postgrid_date_color', '' ) ),
			'.post-grid-title { color :'             => sanitize_hex_color( get_theme_mod( $prefix . '_postgrid_title_color', '' ) ),
		);

		$np_elements = array(
			'#np-content-wrapper h1{ color:'  => sanitize_hex_color( get_theme_mod( $prefix . '_h1_color', '' ) ),
			'#np-content-wrapper h2 { color:' => sanitize_hex_color( get_theme_mod( $prefix . '_h2_color', '' ) ),
			'#np-content-wrapper h3 { color:' => sanitize_hex_color( get_theme_mod( $prefix . '_h3_color', '' ) ),
			'#np-content-wrapper h4 { color:' => sanitize_hex_color( get_theme_mod( $prefix . '_h4_color', '' ) ),
			'#np-content-wrapper h5 { color:' => sanitize_hex_color( get_theme_mod( $prefix . '_h5_color', '' ) ),
			'#np-content-wrapper h6 { color:' => sanitize_hex_color( get_theme_mod( $prefix . '_h6_color', '' ) ),

			'#np-content-wrapper p{ color:'              => sanitize_hex_color( get_theme_mod( $prefix . '_p_color', '' ) ),
			'#np-content-wrapper a{ color:'              => sanitize_hex_color( get_theme_mod( $prefix . '_a_color', '' ) ),
			'#np-content-wrapper a:hover{ color:'        => sanitize_hex_color( get_theme_mod( $prefix . '_a_hover_color', '' ) ),
			'#np-content-wrapper a:hover{ border-color:' => sanitize_hex_color( get_theme_mod( $prefix . '_a_hover_color', '' ) ),
		);
		$np_footer   = array(
			'#np-footer-wrapper{ background:'     => sanitize_hex_color( get_theme_mod( $prefix . '_footer_bg', '' ) ),
			'.footer-widget-title{ color:'        => sanitize_hex_color( get_theme_mod( $prefix . '_footer_headings_color', '' ) ),
			'#np-footer-wrapper p { color:'       => sanitize_hex_color( get_theme_mod( $prefix . '_footer_text_color', '' ) ),
			'#np-footer-wrapper a { color:'       => sanitize_hex_color( get_theme_mod( $prefix . '_footer_links_color', '' ) ),
			'#np-footer-wrapper a:hover { color:' => sanitize_hex_color( get_theme_mod( $prefix . '_footer_links_hover_color', '' ) ),
		);

		$np_copyright = array(
			'#np-copyright-wrapper { background: ' => sanitize_hex_color( get_theme_mod( $prefix . '_copyright_bg', '' ) )
		);
		$customFonts  = absint( get_theme_mod( 'nothing-personal_enable_custom_typography' ), false );
		if ( $customFonts == true ) {
			/*
			 * Main font.
			 * Headings font.
			 * Secondary font.
			 */
			$mainfont     = get_theme_mod( 'nothing-personal_main_font', '' );
			$headingsfont =  get_theme_mod( 'nothing-personal_headings_font', '' );
			$secfont      = get_theme_mod( 'nothing-personal_secondary_font', '' );

			$fontBlock  = json_decode( $mainfont );
			$fontFamily = ( empty( $mainfont ) ? 'Open Sans, sans-serif' : $fontBlock->font . ' ,' . $fontBlock->category );

			$headingsFontBlock  = json_decode( $headingsfont );
			$headingsfontfamily = ( empty( $headingsfont ) ? 'Open Sans, sans-serif' : $headingsFontBlock->font . ',' . $headingsFontBlock->category );

			$secFontBlock  = json_decode( $secfont );
			$secfontfamily = ( empty( $secfont ) ? 'Open Sans, sans-serif' : $secFontBlock->font . ',' . $secFontBlock->category );

			$np_customtypo = array(
				'body, body p, #np-content-wrapper p{font-family:'                     => $fontFamily,
				'h1, h2, h3, h4, h5, h6 { font-family: '                               => $headingsfontfamily,
				'.np-main-navigation li a, 
                .btn ,
                .post-grid-date, 
                .blog-element-type-1 .blog-item-date, 
                .blog-element-type-1-s .blog-item-date{ font-family: ' => $secfontfamily
			);
		} else {
			$np_customtypo = array();

		}

		$header_styles     = array_filter( $np_header );
		$postgrid_styles   = array_filter( $np_postgrid );
		$element_styles    = array_filter( $np_elements );
		$footer_styles     = array_filter( $np_footer );
		$copyright_styles  = array_filter( $np_copyright );
		$typography_styles = array_filter( $np_customtypo );


		$dynamicCSS[] = $header_styles;
		$dynamicCSS[] = $postgrid_styles;
		$dynamicCSS[] = $element_styles;
		$dynamicCSS[] = $footer_styles;
		$dynamicCSS[] = $copyright_styles;
		$dynamicCSS[] = $typography_styles;

		$totalArray = array_filter( $dynamicCSS );


		if ( empty( $totalArray ) ) :
			return false;
		else:
			return $dynamicCSS;
		endif;

	}
endif;

if ( ! function_exists( 'nothing_personal_add_custom_fonts' ) ):
	function nothing_personal_add_custom_fonts() {
		$customFonts = absint( get_theme_mod( 'nothing-personal_enable_custom_typography' ), false );

		if ( $customFonts == true ) {
			$mainfont     = nothing_personal_google_font_sanitization_mod(get_theme_mod( 'nothing-personal_main_font', '' ));
			$headingsfont = nothing_personal_google_font_sanitization_mod(get_theme_mod( 'nothing-personal_headings_font', '' ));
			$secfont      = nothing_personal_google_font_sanitization_mod(get_theme_mod( 'nothing-personal_secondary_font', '' ));

			$fontBlock  = json_decode( $mainfont );
			$fontFamily = ( empty( $mainfont ) ? 'Open+Sans' : $fontBlock->font );

			$headingsFontBlock  = json_decode( $headingsfont );
			$headingsfontfamily = ( empty( $headingsfont ) ? 'Open+Sans' : $headingsFontBlock->font );

			$secFontBlock  = json_decode( $secfont );
			$secfontfamily = ( empty( $secfont ) ? 'Open+Sans' : $secFontBlock->font );

			//print_r(json_decode(nothing_personal_google_font_sanitization($mainfont)));

			wp_enqueue_style( 'nothing-personal-custom-body-font', 'https://fonts.googleapis.com/css?family=' . $fontFamily, '', '', 'all' );
			wp_enqueue_style( 'nothing-personal-custom-headings-font', 'https://fonts.googleapis.com/css?family=' . $headingsfontfamily, '', '', 'all' );
			wp_enqueue_style( 'nothing-personal-custom-secondary-font', 'https://fonts.googleapis.com/css?family=' . $secfontfamily, '', '', 'all' );
		}

	}

	add_action( 'wp_enqueue_scripts', 'nothing_personal_add_custom_fonts', 98 );
endif;