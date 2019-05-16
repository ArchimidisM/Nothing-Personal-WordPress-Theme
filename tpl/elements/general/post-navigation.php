<?php
/**
 * Post navigation it gets the previous and the next post
 *
 * @since 1.0.0
 * @package Nothing_Personal
 */
$prevPost = get_previous_post();
$nextPost = get_next_post();
if ( ! empty( $nextPost ) || ! empty( $prevPost ) ): ?>
    <div class="np-post-navigation">

        <div class="row top-xs">
            <div class="col-xs-12 text-center">
                <h3 class="post-navigation-title marg-t-0 marg-b-35"><?php echo __('READ ALSO','nothing-personal');?></h3>
            </div>
			<?php if ( ! empty( $prevPost ) ): ?>
                <div class="col-sm-6 col-xs-12">
                    <!-- Previous Post -->
                    <?php
                    $postID = absint($prevPost->ID);
                    $thumbnailID = get_post_thumbnail_id($postID);
                    $image = wp_get_attachment_image_src($thumbnailID,'full');
                    ?>
                    <div class="prevNextPost np-previous-post marg-b-5" style="background-image:url('<?php echo esc_url($image[0]);?>');">
                        <div class="prevNextPost-inner">
                            <p><?php echo esc_html__('PREVIOUS POST','nothing-personal');?></p>
                            <h4>
                                <a href="<?php echo esc_url(get_permalink($postID));?>" title="<?php the_title_attribute();?>">
                                    <?php echo esc_html($prevPost->post_title);?>
                                </a>
                            </h4>
                        </div>
                        <a class="overlay-link" href="<?php echo esc_url(get_permalink($postID));?>" title="<?php the_title_attribute();?>">
                            <span class="screen-reader-text"><?php echo esc_html($prevPost->post_title);?></span>
                        </a>
                    </div>
                </div>
			<?php endif; ?>
			<?php if ( ! empty( $nextPost ) ): ?>
                <div class="col-sm-6 col-xs-12">
                    <!-- Next Post -->
					<?php
					$postID = absint($nextPost->ID);
					$thumbnailID = get_post_thumbnail_id($postID);
					$image = wp_get_attachment_image_src($thumbnailID,'full');
					?>
                    <div class="prevNextPost np-next-post marg-b-5" style="background-image:url('<?php echo esc_url($image[0]);?>');">
                        <div class="prevNextPost-inner">
                            <p><?php echo esc_html__('NEXT POST','nothing-personal');?></p>
                            <h4>   <a href="<?php echo esc_url(get_permalink($postID));?>" title="<?php the_title_attribute();?>">
		                            <?php echo esc_html($nextPost->post_title);?>
                                </a></h4>
                        </div>
                        <a class="overlay-link" href="<?php echo esc_url(get_permalink($postID));?>" title="<?php the_title_attribute();?>">
                            <span class="screen-reader-text"><?php echo esc_html($nextPost->post_title);?></span>
                        </a>
                    </div>
                </div>
			<?php endif; ?>
        </div>
    </div>
<?php endif; ?>