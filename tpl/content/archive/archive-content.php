<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
/**
 * Archive Content template
 *
 * @since 1.0.0
 * @package Nothing_Personal
 */
$archiveSettings = nothing_personal_archive_settings(); ?>

<div class="row">
    <div class="<?php echo( absint( $archiveSettings['remove_sidebar'] ) == 1 ? "col-xs-12" : "col-md-9 col-sm-8 col-xs-12" ); ?>">
        <div id="content" class="index-content archive-content pad-r-35">
            <div class="secondary-blog-elements">
                <div class="row top-xs">
					<?php

					if ( have_posts() ):
						while ( have_posts() ): the_post(); ?>
                            <div class="<?php echo esc_attr( $archiveSettings['archive_class'] ); ?>">
								<?php if ( $archiveSettings['archive_layout'] == 1 ):
									get_template_part( 'tpl/elements/blog/blog-element-type-1' );
								else:
									get_template_part( 'tpl/elements/blog/blog-element-type-1-s' );
								endif;
								?>
                            </div>
						<?php endwhile;

					else: ?>
                        <div class="col-sm-6 col-xs-12">
                            <p>
								<?php echo esc_html__( 'Sorry,no posts available.', 'nothing-personal' ); ?>
                            </p>
                            <h4><?php echo esc_html__( 'Search Again', 'nothing-personal' ); ?></h4>
                            <p>
								<?php echo get_search_form(); ?>
                            </p>
                        </div>
					<?php endif;

					?>
                </div>
                <div class="row">
                    <?php nothing_personal_posts_pagination(); ?>
                </div>
            </div>
        </div>
    </div>
	<?php if ( $archiveSettings['remove_sidebar'] == 0 ): ?>
        <div class="col-md-3 col-sm-4 col-xs-12">
			<?php get_sidebar(); ?>
        </div>
	<?php endif; ?>

</div>