<article id="post-<?php the_ID(); ?>" class="widget-post widget-side-post">
    <?php $terms = nothing_personal_get_blog_item_categories(get_the_ID(), 'category'); ?>
    <div class="row top-xs">
        <div class="col-xs-4">
            <?php
            if (has_post_thumbnail()): ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php
                    the_post_thumbnail('nothing-personal-widget-side-post',
                        array(
                            'class' => 'widget-post-featured-image img-responsive')); ?>
                </a>
            <?php endif; ?>
        </div>
        <div class="col-xs-8">
            <h3 class="widget-post-title">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h3>
            <div class="widget-post-after-title">
                <div class="widget-post-date">
                    <span class="jam jam-clock"></span> <?php echo esc_attr(get_the_time(get_option('date_format'))); ?>
                </div>
            </div>
        </div>
    </div>
</article>