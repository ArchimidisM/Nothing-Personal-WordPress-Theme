<?php
/**
 * Nothing Personal functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Nothing_Personal
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
require_once get_template_directory() . '/inc/boot.php';

if (!function_exists('nothing_personal_setup')) :
    function nothing_personal_setup()
    {

        global $content_width;
        if (!isset($content_width)) {
            $content_width = 1180;
        }
        load_theme_textdomain('nothing-personal', get_template_directory() . '/languages');

        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');

        add_image_size('nothing-personal-blog-grid-large-img', 785, 549, true);
        add_image_size('nothing-personal-blog-grid-small-img', 390, 280, true);
        add_image_size('nothing-personal-blog-grid-tall-img', 450, 550, true);

        add_image_size('nothing-personal-blog-element-type-1', 846, 586, true);
        add_image_size('nothing-personal-blog-element-type-1-s', 798, 600, true);
        add_image_size('nothing-personal-blog-element-full', 1190, 450, true);
        add_image_size('nothing-personal-single-post-tall', 590, 900, true);
        add_image_size('nothing-personal-single-post-box', 590, 420, true);
        add_image_size('nothing-personal-related-post', 599, 380, true);
        add_image_size('nothing-personal-page-image', 1180, 550, true);


        add_image_size('nothing-personal-list-item-plain-t1s', 420, 430, true);
        add_image_size('nothing-personal-list-item-plain-t1l', 420, 550, true);
        add_image_size('nothing-personal-widget-post', 590, 440, true);
        add_image_size('nothing-personal-widget-side-post', 220, 220, true);


        add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

        register_nav_menus(
            array(
                'nothing-personal-main-menu' => __('Main Menu', 'nothing-personal'),
                'nothing-personal-mobile-menu' => __('Mobile Menu', 'nothing-personal'),
            )
        );

        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));


        add_theme_support('custom-background', apply_filters('nothing_personal_custombg_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        add_theme_support('customize-selective-refresh-widgets');
        add_theme_support('custom-header', array(
            'flex-width' => true,
            'flex-height' => true,
            'height' => 580,
            'width' => 1180,
        ));
        add_theme_support('custom-logo', array(
            'height' => 58,
            'width' => 170,
            'flex-width' => true,
            'flex-height' => true,
        ));
    }
endif;
add_action('after_setup_theme', 'nothing_personal_setup');
if (!function_exists('nothing_personal_custombg_args')):

    function nothing_personal_custombg_args()
    {
        $background = set_url_scheme(get_background_image());
        $color = sanitize_hex_color(get_theme_mod('background_color', get_theme_support('custom-background', 'default-color')));

        if (!$background && !$color) {
            return;
        }

        $style = $color ? "background-color: #$color;" : '';

        if ($background) {
            $image = " background-image: url('$background');";

            $repeat = sanitize_hex_color(get_theme_mod('background_repeat', get_theme_support('custom-background', 'default-repeat')));
            if (!in_array($repeat, array('no-repeat', 'repeat-x', 'repeat-y', 'repeat'))) {
                $repeat = 'repeat';
            }
            $repeat = " background-repeat: $repeat;";

            $position = sanitize_hex_color(get_theme_mod('background_position_x', get_theme_support('custom-background', 'default-position-x')));
            if (!in_array($position, array('center', 'right', 'left'))) {
                $position = 'left';
            }
            $position = " background-position: top $position;";

            $attachment = sanitize_hex_color(get_theme_mod('background_attachment', get_theme_support('custom-background', 'default-attachment')));
            if (!in_array($attachment, array('fixed', 'scroll'))) {
                $attachment = 'scroll';
            }
            $attachment = " background-attachment: $attachment;";

            $style .= $image . $repeat . $position . $attachment;
        }
        ?>
        <style type="text/css" id="custom-background-css">
            body.custom-background {
            <?php echo trim( $style ); ?>
            }
        </style>
        <?php
    }
endif;
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nothing_personal_widgets()
{
    register_sidebar(array(
        'name' => esc_html__('Main Sidebar', 'nothing-personal'),
        'id' => 'sidebar',
        'description' => esc_html__('This is the default sidebar.', 'nothing-personal'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer 1', 'nothing-personal'),
        'id' => 'footer-1',
        'description' => esc_html__('Footer sidebar the first from the left.', 'nothing-personal'),
        'before_widget' => '<section id="%1$s" class="footer-widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="footer-widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer 2', 'nothing-personal'),
        'id' => 'footer-2',
        'description' => esc_html__('Footer sidebar,the second from the left.', 'nothing-personal'),
        'before_widget' => '<section id="%1$s" class="footer-widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="footer-widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer 3', 'nothing-personal'),
        'id' => 'footer-3',
        'description' => esc_html__('Footer sidebar,the second from the right.', 'nothing-personal'),
        'before_widget' => '<section id="%1$s" class="footer-widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="footer-widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer 4', 'nothing-personal'),
        'id' => 'footer-4',
        'description' => esc_html__('Footer sidebar,the first from the right.', 'nothing-personal'),
        'before_widget' => '<section id="%1$s" class="footer-widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="footer-widget-title">',
        'after_title' => '</h3>',
    ));

}

add_action('widgets_init', 'nothing_personal_widgets');

function nothing_personal_enqueue_styles()
{
    /*
     * Function that enqueues the stylesheets
     *
     * @package Nothing-Personal
     * @since 1.0.0
     */
    wp_enqueue_style('lato-font', NOTHING_PERSONAL_THEMEFONTS . 'Lato/lato-font.min.css', '', '1.0.0', 'all');
    wp_enqueue_style('montserrat-font', NOTHING_PERSONAL_THEMEFONTS . 'Montserrat/montserrat-font.min.css', '', '1.0.0', 'all');
    wp_enqueue_style('playfair-display-font', NOTHING_PERSONAL_THEMEFONTS . 'PlayFair-Display/playfair-font.min.css', '', '1.0.0', 'all');
    wp_enqueue_style('jam-fonts', NOTHING_PERSONAL_THEMEFONTS . 'JamIcons/jam.min.css', '', '1.0.0', 'all');

    /*= Vendors =*/

    wp_enqueue_style('slick', NOTHING_PERSONAL_VENDORASSETS . 'slick/slick-bundle.min.css', '', '1.0.0', 'all');
    wp_enqueue_style('fancybox', NOTHING_PERSONAL_VENDORASSETS . 'fancybox/jquery.fancybox.min.css', '', '1.0.0', 'all');
    wp_enqueue_style('hc-offcanvas-nav', NOTHING_PERSONAL_VENDORASSETS . 'hc-nav/hc-offcanvas-nav.min.css', '', '1.0.0', 'all');

    wp_enqueue_style('nothing-personal-grid', NOTHING_PERSONAL_THEMEASSETS . '/css/flexbox-grid.min.css', '', '1.0.0', 'all');
    wp_enqueue_style('nothing-personal-style', get_template_directory_uri() . '/sass/all.min.css', '', time(), 'all');
    wp_enqueue_style('nothing-personal-default', get_stylesheet_uri(), '', '1.0.0', 'all');
}

add_action('wp_enqueue_scripts', 'nothing_personal_enqueue_styles');


function nothing_personal_enqueue_scripts()
{

    wp_enqueue_script('slick-carousel', NOTHING_PERSONAL_THEMEASSETS . 'vendors/slick/slick.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('fancybox', NOTHING_PERSONAL_THEMEASSETS . 'vendors/fancybox/jquery.fancybox.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('hc-offcanvas-nav', NOTHING_PERSONAL_THEMEASSETS . 'vendors/hc-nav/hc-offcanvas-nav.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('np-theme', NOTHING_PERSONAL_THEMEASSETS . '/js/np.min.js', array('jquery'), time(), true);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'nothing_personal_enqueue_scripts');

if (!function_exists('nothing_personal_enqueue_admin_scripts')):
    /**
     * Function that enqueues the different styles and scripts
     * in the admin area.
     *
     * @package Nothing_Personal
     * @since 1.0.0
     */
    function nothing_personal_enqueue_admin_scripts($hook)
    {
        if ('widgets.php' != $hook) {
            return;
        }

        wp_enqueue_style('nothing-personal-widget-css', NOTHING_PERSONAL_ADMINASSETS . 'admin-widgets.min.css', '', time(), 'all');
        wp_enqueue_script('nothing-personal-widget-js', NOTHING_PERSONAL_ADMINASSETS . 'admin-widgets.min.js', array('jquery'), time(), true);
    }

    add_action('admin_enqueue_scripts', 'nothing_personal_enqueue_admin_scripts');
endif;

if (!function_exists('nothing_personal_customizer_js')):

    function nothing_personal_customizer_js()
    {

        wp_enqueue_script('nothing-personal-customizer-script', get_template_directory_uri() . '/inc/customizer/assets/js/np-customizer.min.js', array(
            'jquery',
            'customize-preview'
        ), rand(8, 888), true);
    }
endif;
add_action('customize_preview_init', 'nothing_personal_customizer_js');

if (!function_exists('nothing_personal_comments')):
    function nothing_personal_comments($comment, $args, $depth)
    {

        extract($args, EXTR_SKIP);

        if ('article' == $args['style']) {
            $tag = 'article';
            $add_below = 'comment';
        } else {
            $tag = 'article';
            $add_below = 'comment';
        }

        ?>
        <<?php echo $tag . ' '; ?>
        <?php comment_class(empty($args['has_children']) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>" itemscope itemtype="http://schema.org/Comment">

        <div class="row top-xs">
            <div class="col-sm-1 col-xs-2">
                <figure class="gravatar">
                    <?php echo get_avatar($comment, 65, '',
                        esc_attr__('Author’s gravatar', 'nothing-personal'), array("class" => "img-responsive")); ?>
                </figure>

            </div>
            <div class="col-sm-11 col-xs-10">
                <div class="comment-meta post-meta" role="complementary">
                    <div class="show-flex align-baseline">
                        <h4 class="comment-author">
                            <a class="comment-author-link" href="<?php comment_author_url(); ?>"
                               itemprop="author"><?php comment_author(); ?></a>

                        </h4>
                        <time class="comment-meta-item"
                              datetime="<?php comment_date('Y-m-d') ?>T<?php comment_time('H:iP') ?>"
                              itemprop="datePublished"><?php comment_date(get_option('date-format')); ?> <a
                                    href="#comment-<?php comment_ID() ?>"
                                    itemprop="url"></a>
                        </time>
                    </div>
                    <?php edit_comment_link('<p class="comment-meta-item">' . __('Edit this comment', 'nothing-personal') . '</p>', '', ''); ?>
                    <?php if ($comment->comment_approved == '0') : ?>
                        <p class="comment-meta-item"><?php echo esc_html__('Your comment is awaiting moderation.', 'nothing-personal'); ?></p>
                    <?php endif; ?>
                </div>
                <div class="comment-content post-content" itemprop="text">
                    <?php comment_text() ?>
                    <div class="comment-reply">
                        <?php comment_reply_link(array_merge($args, array(
                            'add_below' => $add_below,
                            'depth' => $depth,
                            'max_depth' => $args['max_depth'],
                            'before' => '<span class="jam jam-message-writing"></span>'
                        ))) ?>
                    </div>
                </div>
            </div>
        </div>
        </article>
    <?php }
endif;
/*
 * Import the demo data
 */
function nothing_personal_import_demo()
{
    return array(
        array(
            'import_file_name' => esc_html__('Demo Import', 'nothing-personal'),
            'local_import_file' => trailingslashit(get_template_directory()) . 'demo_data/nothingpersonal.WordPress.2019-05-10.xml',
            'local_import_widget_file' => trailingslashit(get_template_directory()) . 'demo_data/akisthemes.com-demos-nothing-personal-theme-demo-widgets.wie',
            'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'demo_data/nothing-personal-export.dat',
            'import_notice' => __('After importing this data everything will be in place like the demo.', 'nothing-personal'),
            'preview_url' => esc_url('https://akisthemes.com/demos/nothing-personal-theme-demo/'),
        )
    );
}

add_filter('pt-ocdi/import_files', 'nothing_personal_import_demo');
/*
 * Import HomePage, Blog and menus
 */
function nothing_personal_import_pages()
{
    $main_menu = get_term_by('name', 'Main Menu', 'nav_menu');
    $mobile_menu = get_term_by('name', 'Mobile Menu', 'nav_menu');

    set_theme_mod('nav_menu_locations', array(
            'nothing-personal-main-menu' => $main_menu->term_id,
            'nothing-personal-mobile-menu' => $mobile_menu->term_id,
        )
    );
}

add_action('pt-ocdi/after_import', 'nothing_personal_import_pages');


if (!function_exists('nothing_personal_google_font_sanitization_mod')) {
    function nothing_personal_google_font_sanitization_mod($input)
    {
        $val = json_decode($input, true);
        if (is_array($val)) {
            foreach ($val as $key => $value) {
                $val[$key] = sanitize_text_field($value);
            }
            $input = json_encode($val);
        } else {
            $input = json_encode(sanitize_text_field($val));
        }
        return $input;
    }
}