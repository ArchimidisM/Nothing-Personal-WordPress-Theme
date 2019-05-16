<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
/*
 * Most of the theme functionality is based on hooks.
 * Here all hooks are based.
 * @package Nothing Personal
 * @since 1.0.0
 */
/*============================================================== */
/** HEADER                                                       */
/*============================================================== */
if (!function_exists('nothing_personal_skip_link')):
    add_action('nothing_personal_header', 'nothing_personal_skip_link', 5);
    /**
     * Add skip to content link before the header.
     *
     * @since 1.0.0
     * @package AkisPress
     */
    function nothing_personal_skip_link()
    {
        printf('<a class="screen-reader-text skip-link" href="#content" title="%1$s">%2$s</a>',
            esc_attr__('Skip to content', 'nothing-personal'),
            esc_html__('Skip to content', 'nothing-personal')
        );
    }
endif;
if (!function_exists('nothing_personal_open_header')):
    add_action('nothing_personal_header', 'nothing_personal_open_header', 10);
    /**
     * Open the header element.
     *
     * @since 1.0.0
     * @package AkisPress
     */
    function nothing_personal_open_header()
    {
        get_template_part('tpl/header/open-header-wrap');
    }
endif;

if (!function_exists('nothing_personal_get_header_tpl')):
    add_action('nothing_personal_header', 'nothing_personal_get_header_tpl', 20);
    /**
     * Gets the right header tpl
     *
     * @since 1.0.0
     * @package AkisPress
     */
    function nothing_personal_get_header_tpl()
    {
        $headerSettings = nothing_personal_header_settings();
        $headerLayout = $headerSettings['header_layout'];

        get_template_part('tpl/header/np-header-' . absint($headerLayout));
    }
endif;
if (!function_exists('nothing_personal_close_header')):
    add_action('nothing_personal_header', 'nothing_personal_close_header', 30);
    /**
     * Open the header element.
     *
     * @since 1.0.0
     * @package AkisPress
     */
    function nothing_personal_close_header()
    {
        get_template_part('tpl/header/close-header-wrap');
    }
endif;
if (!function_exists('nothing_personal_get_mobile_header')):
    add_action('nothing_personal_header', 'nothing_personal_get_mobile_header', 32);
    /**
     * Shows the mobile header
     *
     * @since 1.0.0
     * @package AkisPress
     */
    function nothing_personal_get_mobile_header()
    {
        get_template_part('tpl/header/np-mobile-header');
    }
endif;
if (!function_exists('nothing_personal_show_header_image')):
    add_action('nothing_personal_header', 'nothing_personal_show_header_image', 35);
    /**
     * Shows the header image.
     *
     * @since 1.0.0
     * @package Nothing_Personal
     */
    function nothing_personal_show_header_image()
    {
        $header_image_url = esc_url(get_header_image());
        if (empty($header_image_url)):
            return;
        else:
            get_template_part('tpl/generic/header-image');
        endif;

    }
endif;
if (!function_exists('nothing_personal_get_post_grid')):
    add_action('nothing_personal_header', 'nothing_personal_get_post_grid', 38);
    /**
     * Shows the header image.
     *
     * @since 1.0.0
     * @package Nothing_Personal
     */
    function nothing_personal_get_post_grid()
    {
        $postGridSettings = nothing_personal_post_grid_settings();

        $showGrid = esc_attr(get_theme_mod('nothing-personal_enable_postgrid', false));
        $is_frontpage = esc_attr(get_theme_mod('nothing-personal_show_postgrid_frontpage', true));
        $width = $postGridSettings['postgrid_width'];
        $mT = $postGridSettings['postgrid_margin_top'];
        $mB = $postGridSettings['postgrid_margin_bottom'];
        $type = $postGridSettings['postgrid_src_type'];
        $theTerm = $postGridSettings['postgrid_category'];
        $whatTerm = esc_attr(nothing_personal_get_postgrid_src($type));

        if ($showGrid == true):
            //if is only home page or not
            if (is_front_page() && $is_frontpage == true):
                include(locate_template('tpl/elements/post-grids/post-grid-element-type-' . absint($postGridSettings['postgrid_layout']) . '.php', false, false));
            elseif ($is_frontpage == false):
                include(locate_template('tpl/elements/post-grids/post-grid-element-type-' . absint($postGridSettings['postgrid_layout']) . '.php', false, false));
            endif;
        endif;
    }
endif;
if (!function_exists('nothing_personal_get_slider')):
    add_action('nothing_personal_header', 'nothing_personal_get_slider', 40);
    /**
     * Shows the slider if any.
     *
     * @since 1.0.0
     * @package Nothing_Personal
     */
    function nothing_personal_get_slider()
    {
        $showSlider = esc_attr(get_theme_mod('nothing-personal_enable_slider', false));
        if ($showSlider == true):
            get_template_part('tpl/elements/slider/shortcode-slider');
        endif;
    }
endif;

/*============================================================== */
/** INDEX                                                        */
/*============================================================== */
if (!function_exists('nothing_personal_open_content')):
    function nothing_personal_open_content()
    {
        /**
         * Open the content element.
         *
         * @since 1.0.0
         * @package AkisPress
         */

        get_template_part('tpl/content/open-content-wrap');
    }

    add_action('nothing_personal_index_content', 'nothing_personal_open_content', 10);
    add_action('nothing_personal_single_content', 'nothing_personal_open_content', 10);
    add_action('nothing_personal_page_content', 'nothing_personal_open_content', 10);
    add_action('nothing_personal_archive_content', 'nothing_personal_open_content', 10);
endif;

if (!function_exists('nothing_personal_index_content')):
    function nothing_personal_index_content()
    {
        /**
         * The main index content.
         *
         * @since 1.0.0
         * @package AkisPress
         */
        $indexType = absint(get_theme_mod('nothing-personal_index_layout', 1));
        get_template_part('tpl/content/index/index-content-tpl-' . $indexType);
    }

    add_action('nothing_personal_index_content', 'nothing_personal_index_content', 20);
endif;
if (!function_exists('nothing_personal_close_content')):
    function nothing_personal_close_content()
    {
        /**
         * Closes the content element.
         *
         * @since 1.0.0
         * @package AkisPress
         */

        get_template_part('tpl/content/close-content-wrap');
    }

    add_action('nothing_personal_index_content', 'nothing_personal_close_content', 30);
    add_action('nothing_personal_single_content', 'nothing_personal_close_content', 30);
    add_action('nothing_personal_page_content', 'nothing_personal_close_content', 30);
    add_action('nothing_personal_archive_content', 'nothing_personal_close_content', 30);
endif;

/*============================================================== */
/** SINGLE POST/PAGE                                             */
/*============================================================== */
if (!function_exists('nothing_personal_get_single_tpl')):
    /**
     * Function that gets the single post template
     *
     * @since 1.0.0
     * @package Nothing_Personal
     */
    function nothing_personal_get_single_tpl()
    {
        get_template_part('tpl/content/single/single-content');
    }

    add_action('nothing_personal_single_content', 'nothing_personal_get_single_tpl', 20);
endif;

if (!function_exists('nothing_personal_get_author_bio')):
    /**
     * Function that gets the author bio
     *
     * @since 1.0.0
     * @package Nothing_Personal
     * @return mixed
     */
    function nothing_personal_get_author_bio()
    {
        get_template_part('tpl/elements/posts/author-bio');
    }

    add_action('nothing_personal_single_content_bottom', 'nothing_personal_get_author_bio', 10);
endif;
if (!function_exists('nothing_personal_get_post_navigation')):
    /**
     * Function that gets the post navigation aka the
     * previous and next posts.
     *
     * @since 1.0.0
     * @package Nothing_Personal
     * @return mixed
     */
    function nothing_personal_get_post_navigation()
    {
        get_template_part('tpl/elements/general/post-navigation');
    }

    add_action('nothing_personal_single_content_bottom', 'nothing_personal_get_post_navigation', 15);
endif;
if (!function_exists('nothing_personal_get_related_posts_tpl')):
    /**
     * Function that gets the related posts of each post
     *
     * @since 1.0.0
     * @package Nothing_Personal
     * @return mixed
     */
    function nothing_personal_get_related_posts_tpl()
    {
        get_template_part('tpl/elements/posts/related-posts');
    }

    add_action('nothing_personal_single_content_bottom', 'nothing_personal_get_related_posts_tpl', 20);
endif;

if (!function_exists('nothing_personal_get_page_tpl')):
    function nothing_personal_get_page_tpl()
    {
        get_template_part('tpl/content/page/single-page');
    }

    add_action('nothing_personal_page_content', 'nothing_personal_get_page_tpl', 20);
endif;

/*============================================================== */
/** ARCHIVE PAGES / CATEGORIES / TAGS / SEARCH                   */
/*============================================================== */

if (!function_exists('nothing_personal_archive_header')):
    function nothing_personal_archive_header()
    {
        if (is_archive()) {
            get_template_part('tpl/generic/archive-header-tpl');
        } elseif (is_search()) {
            get_template_part('tpl/generic/search-header-tpl');
        }
    }

    add_action('nothing_personal_before_content_wrapper', 'nothing_personal_archive_header', 5);
endif;

if (!function_exists('nothing_personal_get_archive_tpl')):
    function nothing_personal_get_archive_tpl()
    {
        get_template_part('tpl/content/archive/archive-content');
    }

    add_action('nothing_personal_archive_content', 'nothing_personal_get_archive_tpl', 20);
endif;


/*============================================================== */
/** FOOTER                                                       */
/*============================================================== */
if (!function_exists('nothing_personal_open_footer')):
    add_action('nothing_personal_footer', 'nothing_personal_open_footer', 10);
    /**
     * Open the footer element.
     *
     * @since 1.0.0
     * @package AkisPress
     */
    function nothing_personal_open_footer()
    {
        get_template_part('tpl/footer/open-footer-wrap');
    }
endif;

if (!function_exists('nothing_personal_get_footer_tpl')):
    add_action('nothing_personal_footer', 'nothing_personal_get_footer_tpl', 20);
    /**
     * Gets the footer tpl.
     *
     * @since 1.0.0
     * @package AkisPress
     */
    function nothing_personal_get_footer_tpl()
    {
        get_template_part('tpl/footer/np-footer-tpl');
    }
endif;

if (!function_exists('nothing_personal_close_footer')):
    add_action('nothing_personal_footer', 'nothing_personal_close_footer', 30);
    /**
     * Close the the footer element.
     *
     * @since 1.0.0
     * @package AkisPress
     */
    function nothing_personal_close_footer()
    {
        get_template_part('tpl/footer/close-footer-wrap');
    }
endif;
/*============================================================== */
/** COPYRIGHT                                                       */
/*============================================================== */
if (!function_exists('nothing_personal_open_copyright')):
    add_action('nothing_personal_copyright', 'nothing_personal_open_copyright', 10);
    /**
     * Open the copyright element.
     *
     * @since 1.0.0
     * @package AkisPress
     */
    function nothing_personal_open_copyright()
    {
        get_template_part('tpl/copyright/open-copyright-wrap');
    }
endif;

if (!function_exists('nothing_personal_get_copyright_tpl')):
    add_action('nothing_personal_copyright', 'nothing_personal_get_copyright_tpl', 20);
    /**
     * Gets the copyright tpl
     *
     * @since 1.0.0
     * @package AkisPress
     */
    function nothing_personal_get_copyright_tpl()
    {
        $copyright_style = 1;
        get_template_part('tpl/copyright/np-copyright-' . absint($copyright_style));
    }
endif;

if (!function_exists('nothing_personal_close_copyright')):
    add_action('nothing_personal_copyright', 'nothing_personal_close_copyright', 30);
    /**
     * Close the the copyright element.
     *
     * @since 1.0.0
     * @package AkisPress
     */
    function nothing_personal_close_copyright()
    {
        get_template_part('tpl/copyright/close-copyright-wrap');
    }
endif;
/*============================================================== */
/** FLOATED ITEMS                                                */
/*============================================================== */
if (!function_exists('nothing_personal_mobile_menu_tpl')):
    /**
     * Function that returns the
     * main mobile menu in an offcanvas sidebar
     */
    function nothing_personal_mobile_menu_tpl(){
        get_template_part('tpl/floated/mobile-menu');
    }
add_action('nothing_personal_floated_items','nothing_personal_mobile_menu_tpl',5);
endif;
