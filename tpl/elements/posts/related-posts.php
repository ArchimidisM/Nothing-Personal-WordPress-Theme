<?php
/**
 * Related Posts based on category
 *
 * @since 1.0.0
 * @package Nothing_Personal
 */
$objectID     = get_queried_object_id();
$relatedPosts = nothing_personal_get_related_posts( $objectID, 4 );

if ( ! empty( $relatedPosts ) ): ?>
    <div class="np-related-posts marg-b-30">
        <div class="row top-xs">
            <div class="col-xs-12 text-center">
                <h3 class="related-posts-title marg-t-0 marg-b-35"><?php echo __( 'RELATED POSTS', 'nothing-personal' ); ?></h3>
            </div>
        </div>
        <div class="row">
			<?php foreach ( $relatedPosts as $related_post ):
                $curPost = get_post($related_post);
			?>
                <div class="col-sm-4 col-xs-12">
                    <div class="single-related-post marg-b-15">

                        <article id="<?php echo absint($curPost->ID);?>" <?php post_class('blog-element-type-1'); ?>>
	                        <?php
	                        $thumbnail = get_post_thumbnail_id(absint($curPost->ID));
	                        if (has_post_thumbnail()):?>
                                <div class="related-featured-image">
                                    <a href="<?php echo esc_url(get_permalink()); ?>">
				                        <?php the_post_thumbnail('nothing-personal-related-post',
					                        array('class' => 'img-responsive')
				                        ); ?>
                                    </a>
                                </div>
	                        <?php endif; ?>
                            <div class="related-post-date text-center">
                                <span><?php echo esc_attr(get_the_time(get_option('date_format'))); ?></span>
                            </div>

                            <h4 class="related-post-title text-center">
                                <a href="<?php echo esc_url(get_permalink($curPost->ID)) ?>">
                                    <?php echo esc_html(get_the_title($curPost->ID));?></a>
                            </h4>
                        </article>
                    </div>
                </div>
			<?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>