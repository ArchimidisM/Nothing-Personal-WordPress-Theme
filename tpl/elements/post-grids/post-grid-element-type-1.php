<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
/**
 * Post grid element with 3 posts.
 *
 * @since 1.0.0
 * @package Nothing_Personal
 */

$largePost = nothing_personal_get_posts(1, array('post'), '0',
    array(
        'ignore_sticky_posts' => true,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => $whatTerm,
                'operator' => esc_attr($whatTerm == 'uncategorized' ? 'NOT IN' : 'IN')
            )
        )
    )
);
$smallPosts = nothing_personal_get_posts(2, array('post'),
    1,
    array(
        'ignore_sticky_posts' => true,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => $whatTerm,
                'operator' => esc_attr($whatTerm == 'uncategorized' ? 'NOT IN' : 'IN')
            )
        )
    )
);
?>
<div class="np-post-grid np-post-grid-type-1 <?php echo esc_attr($mT) . ' ' . esc_attr($mB); ?>">
<div class="<?php echo esc_attr($width == 'np-container-full' ? $width : $width . ' container-fluid'); ?>">

        <div class="row">

            <?php if ($largePost != false):

                foreach ($largePost as $singlePost):

                    $curPost = get_post($singlePost);
                    $thumbnail = get_post_thumbnail_id(absint($curPost->ID));
                    if ($width == 'np-container-full'):
                        $thumbNailSrc = wp_get_attachment_image_src($thumbnail, 'full');
                    else:
                        $thumbNailSrc = wp_get_attachment_image_src($thumbnail, 'nothing-personal-blog-grid-large-img'); // should check of full width.
                    endif;
                    ?>
                    <div class="col-md-8 col-sm-6 col-xs-12 marg-b-15">
                        <div class="post-grid-item post-grid-large-image"
                             style="background:url('<?php echo esc_url($thumbNailSrc[0]); ?>') center no-repeat; background-size: cover;">

                            <div class="post-grid-overlay">
                                <a href="<?php echo esc_url(get_permalink($curPost->ID)); ?>"
                                   title="<?php echo esc_attr(get_the_title($curPost->ID)) ?>"></a>
                            </div>

                            <div class="post-grid-details">
                                <div class="post-grid-date">
                                    <?php echo esc_attr(get_the_time(get_option('date_format'))); ?>
                                </div>
                                <h2 class="post-grid-title"><?php echo get_the_title($curPost->ID); ?></h2>
                            </div>

                        </div>

                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php

            if ($smallPosts != false): ?>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <?php
                    foreach ($smallPosts as $smallPost):
                        $curPost = get_post($smallPost);
                        $thumbnail = get_post_thumbnail_id(absint($curPost->ID));
                        if ($width == 'np-container-full-np'):
                            $thumbNailSrc = wp_get_attachment_image_src($thumbnail, 'full');
                        else:
                            $thumbNailSrc = wp_get_attachment_image_src($thumbnail, 'nothing-personal-blog-grid-small-img'); // should check of full width.
                        endif;
                        ?>
                        <div class="marg-b-15 post-grid-item post-grid-small-image"
                             style="background:url('<?php echo esc_url($thumbNailSrc[0]); ?>')
                                     center no-repeat;  background-size: cover;">
                            <div class="post-grid-overlay">
                                <a href="<?php echo esc_url(get_permalink($curPost->ID)); ?>"
                                   title="<?php the_title_attribute(); ?>"></a>
                            </div>
                            <div class="post-grid-details">
                                <div class="post-grid-date">
                                    <?php echo esc_attr(get_the_time(get_option('date_format'))); ?>
                                </div>
                                <h2 class="post-grid-title"><?php echo esc_html(get_the_title($curPost->ID)); ?></h2>
                            </div>

                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
