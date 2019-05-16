<?php
/*
 * Featured area tpl
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$header_width = 'np-container';
?>
<div id="np-featured-area-wrapper" class="np-featured-area">
    <div class="<?php echo esc_attr( $header_width ); ?><?php echo( $header_width === 'np-container-full-np' ? false : ' container-fluid' ); ?>">
        <div class="row middle-xs">
            <div class="col-xs-12">
	            <?php dynamic_sidebar( 'featured-sidebar' ); ?>
            </div>
        </div>
    </div>
</div>
