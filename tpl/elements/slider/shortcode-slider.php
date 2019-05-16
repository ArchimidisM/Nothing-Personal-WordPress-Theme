<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
/**
 * Gets and show the slider if a shortcode
 * is filled in the respective field
 *
 * @since 1.0.0
 * @package Nothing_Personal
 */
$sliderSettings = nothing_personal_slider_settings();
$width          = $sliderSettings['slider_width'];
$mT             = $sliderSettings['slider_margin_top'];
$mB             = $sliderSettings['slider_margin_bottom'];
$st             = $sliderSettings['slider_shortcode'];
if ( ! empty( $st ) ):
?>
<div class="<?php echo esc_attr( $width == 'np-container-full' ? $width : $width . ' container-fluid' ); ?>">
    <div class="np-slider-container <?php echo esc_attr( $mT ) . ' ' . esc_attr( $mB ); ?>">
		<?php
        echo do_shortcode($st); ?>
    </div>
</div>
<?php
endif;