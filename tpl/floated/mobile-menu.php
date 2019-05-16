<?php
/**
 * Template that gets the mobile offcanvas bar
 * @since 1.0.0
 * @package Nothing_Personal
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}?>
<nav id="np-mobile-navigation" style="display: none;">
    <?php
    wp_nav_menu(array(
        'theme_location' => 'nothing-personal-mobile-menu',
        'menu_class' => 'np-mobile-nav',
        'container' => false,
    )); ?>
</nav>
