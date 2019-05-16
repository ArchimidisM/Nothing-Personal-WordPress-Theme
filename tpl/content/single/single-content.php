<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$singleType = absint(get_theme_mod('nothing-personal_single_layout',1));
$sidebar = nothing_personal_single_post_sidebar();
?>
<div class="row">
	<?php if ( have_posts() ): ?>
        <div class="<?php echo esc_attr( nothing_personal_set_single_post_class() ); ?>">
			<?php while ( have_posts() ): the_post(); ?>
                <div id="content" class="single-content pad-r-35">
					<?php get_template_part( 'tpl/elements/posts/post-tpl-'.absint($singleType) ); ?>
                </div>
			<?php endwhile; ?>
        </div>
	<?php endif;
	?>
	<?php if ( $sidebar == true ): ?>
        <div class="col-md-3 col-sm-4 col-xs-12">
			<?php get_sidebar(); ?>
        </div>
	<?php endif; ?>
</div>
