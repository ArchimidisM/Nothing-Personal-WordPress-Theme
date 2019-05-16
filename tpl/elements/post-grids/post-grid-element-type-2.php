<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
/**
 * Post grid element with 3 posts, tall ones.
 *
 * @since 1.0.0
 * @package Nothing_Personal
 */
$gridPosts = nothing_personal_get_posts( 3, array( 'post' ), '0',
	array(
		'ignore_sticky_posts' => true,
		'orderby'             => 'menu_order',
		'order'               => 'ASC',
		'tax_query'           => array(
			'relation' => 'AND',
			array(
				'taxonomy' => 'category',
				'field'    => 'slug',
				'terms'    => $whatTerm,
				'operator' => esc_attr( $whatTerm == 'uncategorized' ? 'NOT IN' : 'IN' )
			)
		)
	)
);
?>
<div class="np-post-grid np-post-grid-type-1 <?php echo esc_attr( $mT ) . ' ' . esc_attr( $mB ); ?>">
<div class="<?php echo esc_attr( $width == 'np-container-full' ? $width : $width . ' container-fluid' ); ?>">

		<?php if ( $gridPosts != false ): ?>
            <div class="row">
				<?php foreach($gridPosts as $grid_post):
                    $curPost = get_post(absint($grid_post));

					$thumbnail = get_post_thumbnail_id( $curPost->ID);
					if ( $width == 'np-container-full' ):
						$thumbNailSrc = wp_get_attachment_image_src( $thumbnail, 'full' );
					else:
						$thumbNailSrc = wp_get_attachment_image_src( $thumbnail, 'nothing-personal-blog-grid-tall-img' ); // should check of full width.
					endif;
					?>
                    <div class="col-md-4 col-sm-4 col-xs-12 marg-b-15">
                        <div class="post-grid-item post-grid-tall-image"
                             style="background:url('<?php echo esc_url( $thumbNailSrc[0] ); ?>') center no-repeat; background-size: cover;">
                            <div class="post-grid-overlay">
                                <a href="<?php echo esc_url(get_permalink($curPost->ID)); ?>" title="<?php echo esc_attr(get_the_title($curPost->ID)) ?>"></a>
                            </div>
                            <div class="post-grid-details">
                                <div class="post-grid-date">
									<?php echo get_the_time( get_option( 'date_format' ) ); ?>
                                </div>
                                <h2 class="post-grid-title"><?php echo get_the_title($curPost->ID); ?></h2>
                            </div>
                        </div>
                    </div>
				<?php endforeach; ?>

            </div>
		<?php endif; ?>
    </div>
</div>
