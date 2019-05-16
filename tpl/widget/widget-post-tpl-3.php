<?php if ( $counter == 1 ): ?>
<article id="post-<?php the_ID(); ?>" class="widget-post">
    <?php $terms = nothing_personal_get_blog_item_categories( get_the_ID(), 'category' ); ?>
    <?php
    if (has_post_thumbnail()): ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php
            the_post_thumbnail('nothing-personal-widget-post',
                array(
                    'class' => 'widget-post-featured-image img-responsive')); ?>
        </a>
    <?php endif; ?>

    <p class="widget-post-meta"><?php echo esc_html__('In','nothing-personal');?><a href="#"
                                      title="<?php echo esc_attr('View posts under this category', 'nothing-personal'); ?>"> <?php echo $terms; ?></a>
        <span class="widget-post-author"><?php the_author_posts_link(); ?></span></p>
    <h4 class="widget-post-title">
        <a href="<?php the_permalink();?>">
            <?php the_title(); ?>
        </a>
    </h4>
    <div class="widget-post-after-title">
        <div class="widget-post-date">
            <span class="jam jam-clock"></span> <?php echo esc_attr(get_the_time(get_option('date_format'))); ?>
        </div>

        <a class="widget-post-readmore" href="<?php the_permalink(); ?>"><?php echo esc_html__('More','nothing-personal'); ?></a>
    </div>
</article>
<?php else: ?>
	<article class="widget-post widget-side-post">
		<div class="row top-xs">
			<div class="col-xs-4">
                <?php $terms = nothing_personal_get_blog_item_categories( get_the_ID(), 'category' ); ?>
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
				<p class="widget-post-meta"><?php echo esc_html__('In','nothing-personal');?>  <?php echo $terms; ?> </p>
				<h3 class="widget-post-title">
					<a href="<?php the_permalink();?>">
						<?php the_title(); ?>
					</a>
				</h3>
				<div class="widget-post-after-title">
					<div class="widget-post-date">
						<span class="jam jam-clock"></span> <?php echo esc_attr(get_the_time(get_option('date_format'))); ?>
					</div>

					<a class="widget-post-readmore" href="<?php the_permalink(); ?>"><?php echo esc_html__('More','nothing-personal');?></a>
				</div>
			</div>
		</div>
	</article>
<?php endif; ?>