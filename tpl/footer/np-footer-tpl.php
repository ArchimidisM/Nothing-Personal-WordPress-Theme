<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
/*
 * Template part that gets the footer tpl and its sidebars.
 */
$footerInfo = nothing_personal_footer_columns();
$footerColumns = absint($footerInfo['columns']);
$footerClass = esc_attr($footerInfo['class']);
?>
<?php for ($i = 1; $i <= $footerColumns; $i++): ?>
    <div class="<?php echo $footerClass; ?><?php echo esc_attr(($i == 1 ? 'first-footer-widget-area': ''));?> <?php echo esc_attr(($i == $footerColumns ? 'last-footer-widget-area': ''));?>">
		<?php dynamic_sidebar('footer-'.absint($i));?>
    </div>
<?php endfor; ?>