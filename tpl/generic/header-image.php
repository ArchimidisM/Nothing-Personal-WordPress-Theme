<?php
/*
 * Header image tpl
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.

}
$headerImageSettings = nothing_personal_header_image_settings();
$header_image_width =  $headerImageSettings['header_image_width'];
$header_image_height =  $headerImageSettings['header_image_height'];
?>
<div class="np-header-image-wrapper">
    <div class="<?php echo esc_attr($header_image_width); ?><?php echo ($header_image_width === 'np-container-full-np' ? false : ' container-fluid') ;?>">
        <div class="row">
            <div class="col-xs-12">
                <?php $header_image_url = esc_url(get_header_image()); ?>
                <div class="np-header-image"
                     style="background:url('<?php echo esc_url($header_image_url); ?>')
                             center no-repeat; <?php echo ($header_image_height != '' ? "height:".$header_image_height.'px;' :'');?>"></div>
            </div>
        </div>
    </div>
</div>