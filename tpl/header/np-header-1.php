<?php
/*
* Template thats gets the header 1 to show.
*
* @since 1.0.0
* @package Nothing_Personal
*/
if (!defined('ABSPATH')) {
    exit;
}
?>
<div class="col-xs-3">
    <?php get_template_part('tpl/generic/logo'); ?>
</div>
<div class="col-xs-9 text-right">
    <?php get_template_part('tpl/generic/np-nav');?>
</div>
