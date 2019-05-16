<article id="np-article-with-id-<?php echo get_the_id(); ?>" class="np-list-item np-plain-list-item">
    <div class="row middle-xs">
        <div class="col-xs-12">
            <?php
            if (has_post_thumbnail()):
                $ps1 = 'nothing-personal-list-item-plain-t1l';
                $ps2 = 'nothing-personal-list-item-plain-t1s';
                $thumbId = get_post_thumbnail_id(get_the_ID());
                /**List Item based on index **/
                if (isset($indexType) && $indexType == 3 || $indexType == 4 || $indexType == 5):
                    $imageSrc = wp_get_attachment_image_src($thumbId, $ps1);
                else:
                    $imageSrc = wp_get_attachment_image_src($thumbId, ($counter % 2 == 0 ? $ps2 : $ps1));
                endif;
	            $image_alt = get_post_meta($thumbId, '_wp_attachment_image_alt', TRUE);

                $terms = nothing_personal_get_blog_item_categories(get_the_ID(), 'category');
                $np_status = nothing_personal_get_blog_item_categories(get_the_ID(), 'np_status');
                if($np_status !== false):?>
                <div class="np-list-item-statuses">
                    <?php echo $np_status; ?>
                </div>
                <?php endif; ?>
                <div class="np-list-item-featured-image">
                    <a href="<?php echo esc_url(get_permalink()); ?>" title="<?php the_title_attribute(); ?>">
                        <img src="<?php echo esc_url($imageSrc[0]); ?>" class="img-responsive"
                             alt="<?php echo esc_attr($image_alt); ?>"/>
                    </a>
                </div>
            <?php endif; ?>
            <div class="np-list-item-contents">

                <?php if ($terms != false): ?>
                    <div class="np-list-item-category">
                        <?php echo esc_html__('In', 'nothing-personal'); ?>
                        <?php echo $terms; ?>
                    </div>
                <?php endif; ?>
                <div class="np-list-item-title">
                    <h2><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h2>
                </div>
                <div class="np-list-item-meta">
                    <?php echo esc_attr(get_the_time(get_option('date_format'))); ?> / <span class="jam jam-cloud-f"></span>
                    <?php
                    $comments_number = get_comments_number();
                    if ('1' === $comments_number) {
                        /* translators: %s: post title */
                        printf(_x('One Reply to &ldquo;%s&rdquo;', 'comments title', 'nothing-personal'), get_the_title());
                    } else {
                        printf(
                        /* translators: 1: number of comments, 2: post title */
                            _nx(
                                '%1$s Reply to &ldquo;%2$s&rdquo;',
                                '%1$s Replies to &ldquo;%2$s&rdquo;',
                                $comments_number,
                                'comments title',
                                'nothing-personal'
                            ),
                            number_format_i18n($comments_number),
                            get_the_title()
                        );
                    }
                    ?>
                </div>
                <div class="np-list-item-excerpt">
                    <?php the_excerpt(); ?>
                </div>
                <div class="np-list-item-readmore">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <?php echo esc_html__('Read More', 'nothing-personal'); ?></a>
                </div>
            </div>
        </div>
    </div>
</article>