<article id="<?php the_ID(); ?>" <?php post_class('blog-element-type-1'); ?>>

        <div class="blog-item-date text-center">
            <span><?php echo esc_attr(get_the_time(get_option('date_format'))); ?></span>
        </div>
        <h2 class="blog-item-title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
        </h2>
        <?php
        if (has_post_thumbnail()):?>
            <div class="blog-element-featured-image">
                <a href="<?php echo esc_url(get_permalink()); ?>" title="<?php the_title_attribute(); ?>">
                    <?php the_post_thumbnail('nothing-personal-blog-element-type-1',
                        array('class' => 'img-responsive')); ?>
                </a>
            </div>
        <?php endif; ?>
        <div class="blog-element-excerpt">
            <?php the_excerpt(); ?>
        </div>
        <div class="blog-element-read-more marg-b-35 text-center">
            <a href="<?php the_permalink(); ?>" class="btn btn-trans-black btn-oval"
               title="<?php the_title_attribute(); ?>"><?php echo esc_html__('READ MORE','nothing-personal');?></a>
        </div>

        <div class="blog-element-meta d-flex v-center-flex">
            <div class="blog-element-share">
                <span><?php echo esc_html__('SHARE:','nothing-personal'); ?></span>
                <?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { ADDTOANY_SHARE_SAVE_KIT(); } ?>
            </div>
            <?php $terms = nothing_personal_get_blog_item_categories(get_the_ID(), 'category'); ?>
            <div class="blog-element-category">
                <?php echo $terms; ?>
                <span class="blog-element-comments">
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
                            number_format_i18n($comments_number), get_the_title()
                        );
                    }

                    ?>
                </span>
            </div>
        </div>

</article>