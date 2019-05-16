<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
//$navigationClasses = akispress_navigation_classes();
?>
<nav id="np-topbar-navigation">
	<?php
	wp_nav_menu(array(
		'theme_location' => 'np-top-menu',
		'menu_class' => apply_filters('nothing_personal_navigation_class','np-topbar-nav'),
		'container' => false,
	)); ?>
</nav>