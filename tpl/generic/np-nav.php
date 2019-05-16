<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<nav id="np-main-navigation">
	<?php
	wp_nav_menu(array(
		'theme_location' => 'nothing-personal-main-menu',
		'menu_class' => apply_filters('nothing_personal_navigation_class','np-header-nav'),
		'container' => false,
	)); ?>
</nav>