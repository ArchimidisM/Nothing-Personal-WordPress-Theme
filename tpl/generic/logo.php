<?php
/*
 * Template tha gets the logo or the site title/tagline
 *
 * @since 1.0.0
 * @package Nothing_Personal
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$custom_logo_id = absint(get_theme_mod( 'custom_logo' ));
$logo           = wp_get_attachment_image_src( $custom_logo_id, 'full' );

?>
<?php
if ( has_custom_logo() ) { ?>
	<div class="np-logo-wrapper remove-line-height">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-image">
			<img class="img-responsive" src="<?php echo esc_url( $logo[0] ); ?>"
			     alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
		</a>
	</div>
<?php } else { ?>

	<div class="no-logo-wrapper">
		<h2 class="site-title remove-margin">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
		</h2>
		<p class="site-tagline remove-margin">
			<?php echo get_bloginfo( 'description' ); ?>
		</p>

	</div>
<?php }
?>