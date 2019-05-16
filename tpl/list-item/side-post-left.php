<article id="np-article-with-id-<?php echo get_the_id(); ?>"
         class="np-list-item np-side-post-left featured-post">
    <div class="row middle-xs">
        <div class="col-md-6 col-xs-12">
            <?php if (has_post_thumbnail()):
                $thumbId = get_post_thumbnail_id(get_the_ID());
                $imageSrc = wp_get_attachment_image_src($thumbId, 'list-item-boxed-t1');
                $terms = nothing_personal_get_blog_item_categories(get_the_ID(), 'category');
                ?>
                <div class="np-list-item-featured-image"
                     style="background-image:url('<?php echo esc_url($imageSrc[0]); ?>');
                             background-position: center; background-size: cover; height:480px; background-repeat: no-repeat;">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                </div>
            <?php endif; ?>
        </div>
        <div class="col-md-6 col-xs-12 text-center">
            <div class="np-list-item-contents">
                <?php if ($terms != false): ?>
                    <div class="np-list-item-category">
                        <?php echo $terms; ?>
                    </div>
                <?php endif; ?>
                <div class="np-list-item-title">
                    <h2><?php the_title(); ?></h2>
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