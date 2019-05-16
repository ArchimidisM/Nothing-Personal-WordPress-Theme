<article id="post-<?php the_ID(); ?>" class="widget-post">
	<?php
    $terms = nothing_personal_get_blog_item_categories( get_the_ID(), 'category' );
	if ( has_post_thumbnail() ): ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<?php
			the_post_thumbnail( 'nothing-personal-widget-post',
				array(
					'class' => 'widget-post-featured-image img-responsive'
				) ); ?>
        </a>

	<?php endif; ?>

    <p class="widget-post-meta"><?php echo esc_html__('In','nothing-personal');?>
        <?php echo $terms; ?>
		<?php if ( $show_author == true ): ?>
            <span class="widget-post-author"><?php the_author_posts_link(); ?></span>
		<?php endif; ?>

    </p>
    <h4 class="widget-post-title">
        <a href="<?php the_permalink();?>">
			<?php the_title(); ?>
        </a>
    </h4>

    <div class="widget-post-after-title">
		<?php if ( $show_date == true ): ?>
            <div class="widget-post-date">
                <span class="jam jam-clock"></span> <?php echo get_the_time( get_option( 'date_format' ) ); ?>
            </div>
		<?php endif; ?>
    </div>
</article>