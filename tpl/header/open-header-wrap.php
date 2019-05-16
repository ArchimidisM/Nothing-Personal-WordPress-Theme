<?php
/*
 * Template that opens the header section.
 * Used with nothing_personal_open_header hook
 * @since 1.0.0
 * @package Nothing_Personal
 */
if (!defined('ABSPATH')) {
    exit;
}

$headerSettings = nothing_personal_header_settings();
$header_width = $headerSettings['header_width'];
$hasSticky = $headerSettings['has_sticky'];
$headerLayout = $headerSettings['header_layout'];
?>
<header id="np-header-wrapper" class="<?php echo apply_filters('nothing_personal_header_class','hide show-tablet-landscape show-desktop-only np-header-type-'.absint($headerLayout));?>">
    <div class="<?php echo esc_attr($header_width); ?><?php echo ($header_width === 'np-container-full-np' ? false : ' container-fluid') ;?>">
        <div class="row middle-xs">
