<article id="<?php the_ID(); ?>" <?php post_class('blog-element-type-1 blog-element-type-1-s'); ?>>
        <?php
        if (has_post_thumbnail()):?>
            <div class="blog-element-featured-image">
                <a href="<?php echo esc_url(get_permalink()); ?>" title="<?php the_title_attribute(); ?>">
                    <?php the_post_thumbnail('nothing-personal-blog-element-type-1-s',
                        array('class' => 'img-responsive')
                    ); ?>
                </a>
            </div>
        <?php endif; ?>
        <div class="blog-item-date text-center">
            <span><?php echo esc_attr(get_the_time(get_option('date_format'))); ?></span>
        </div>
        <h2 class="blog-item-title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
        </h2>
        <div class="blog-element-excerpt">
            <?php the_excerpt(); ?>
        </div>
        <div class="blog-element-read-more marg-b-35 text-center">
            <a href="<?php the_permalink(); ?>" class="read-more-link"
               title="<?php the_title_attribute(); ?>"><?php echo esc_html__('READ MORE','nothing-personal');?><span class="jam jam-arrow-right"></span></a>
        </div>
        <div class="blog-element-meta d-flex v-center-flex">
            <div class="blog-element-share">
			    <?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { ADDTOANY_SHARE_SAVE_KIT(); } ?>
            </div>
		    <?php $terms = nothing_personal_get_blog_item_categories(get_the_ID(), 'category'); ?>
            <div class="blog-element-category">
			    <?php echo $terms; ?>
            </div>
        </div>

</article>