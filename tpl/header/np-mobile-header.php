<?php
/**
 * Template that shows the mobile header
 * @since 1.0.0
 * @package Nothing_Personal
 */
if (!defined('ABSPATH')) {
    exit;
}
$mobile_logo = get_theme_mod('nothing-personal_mobile_logo_upload', '');
?>
<header id="np-header-mobile-wrapper" class="hide show-phone-only show-table-portrait">
    <div class="np-container container-fluid mobile-app-container">
        <div class="row middle-xs">
            <div class="col-xs-2">
                <a href="#" class="mobile-trigger">
                    <i class="jam jam-menu"></i>
                </a>
            </div>
            <div class="col-xs-8 text-center remove-line-height">

                <?php
                if (!empty($mobile_logo)):
                    echo '<a href="' . esc_url(home_url()) . '"> 
                    <img src="' . esc_url($mobile_logo) . '"  class="mobile-logo img-responsive" alt="' . esc_attr(get_bloginfo('name')) . '" />
                    </a>';
                else:
                    get_template_part('tpl/generic/logo');
                endif;
                ?>
            </div>
            
        </div>
    </div>
</header>
