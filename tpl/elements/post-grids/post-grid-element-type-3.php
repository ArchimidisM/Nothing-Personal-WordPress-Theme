<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
/**
 * Post Carousel TPL
 *
 * @since 1.0.0
 * @package Nothing_Personal
 */

$carouselPosts = nothing_personal_get_posts( 5, array( 'post' ), '0',
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

<div class="<?php echo esc_attr( $width == 'np-container-full' ? $width : $width . ' container-fluid' ); ?>">

    <div class="np-post-grid np-post-carousel-wrapper <?php echo esc_attr( $mT ) . ' ' . esc_attr( $mB ); ?>">
		<?php if ( $carouselPosts != false ): ?>
            <div class="post-carousel-container" data-show-items="3" data-scroll-items="1" data-prev="" data-next="">
				<?php foreach ( $carouselPosts as $carouselPost ):
					$curPost = get_post( $carouselPost );
					$thumbnail = get_post_thumbnail_id( $curPost->ID );
					$thumbNailSrc = wp_get_attachment_image_src( $thumbnail, 'full' );
					?>
                    <div class="post-carousel-item">
                        <div class="post-grid-tall-image"
                             style="background:url('<?php echo esc_url( $thumbNailSrc[0] ); ?>') center no-repeat; background-size: cover;">
                            <a class="overlay-link" href="<?php echo esc_url( get_the_permalink( $curPost->ID ) ); ?>"></a>
                            <div class="post-carousel-internal d-flex full-center-flex full-height text-center">
                                <div class="post-carousel-details">
                                    <div class="post-grid-date">
										<?php echo get_the_time( get_option( 'date_format' ) ); ?>
                                    </div>
                                    <h2 class="post-grid-title"><?php echo get_the_title( $curPost->ID ); ?></h2>
                                    <a class="btn btn-opaque-bg"
                                       href="<?php echo esc_url( get_permalink( $curPost->ID ) ); ?>"
                                       title="<?php the_title_attribute(); ?>">
										<?php echo esc_html__( 'READ MORE', 'nothing-personal' ); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
				<?php endforeach; ?>
            </div>
            <div class="post-carousel-pagination">
                <a class="carousel-prev" href="#"><span class="jam jam-chevron-left"></span></a>
                <a class="carousel-next" href="#"><span class="jam jam-chevron-right"></span></a>
            </div>
		<?php endif; ?>

    </div>
</div>
