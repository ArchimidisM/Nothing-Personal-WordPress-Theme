<?php
/*
 * Template that opens the header section.
 * Used with nothing_personal_open_header hook
 * @since 1.0.0
 * @package Nothing_Personal
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
//$headerExtraClasses = akispress_header_extra_classes();

$footer = 1;
$header_width = 'np-container container-fluid';

?>

<footer id="np-footer-wrapper" class="<?php echo apply_filters( 'nothing_personal_footer_class', 'np-footer-enabled' ); ?>">
    <div class="<?php echo esc_attr( $header_width ); ?>">
        <div class="row">