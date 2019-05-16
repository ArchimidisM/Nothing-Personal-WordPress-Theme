<?php
/*
* Template that opens the content section.
* @since 1.0.0
* @package Nothing_Personal
*/
if (!defined('ABSPATH')) {
    exit;
}
$extraContentClasses = nothing_personal_add_content_classes();
?>
<?php
/**
 * Well here you can hook an image, a slider whatever
 * and you can do via functions.php or from any other place.
 */
do_action('nothing_personal_before_content_wrapper');?>

<div id="np-content-wrapper" class="<?php echo apply_filters('nothing_personal_content_class',esc_attr($extraContentClasses));?>">
    <div class="np-container container-fluid">
