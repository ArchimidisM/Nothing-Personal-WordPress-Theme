<?php
/*
 * Template that opens the copyright section.
 * Used with nothing_personal_open_copyright hook
 * @since 1.0.0
 * @package Nothing_Personal
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
//$headerExtraClasses = akispress_header_extra_classes();
//$copyright = $_GET['copyright_type']; //DEMO
$copyright = 1;
$copyright_width = 'np-container container-fluid';

?>
<div id="np-copyright-wrapper" class="<?php echo apply_filters( 'nothing_personal_copyright_class', 'np-copyright-type-' . $copyright ); ?>">
<div class="<?php echo esc_attr( $copyright_width ); ?>">
        <div class="row middle-xs">

<?php do_action( 'nothing_personal_before_copyright_content' ); ?>