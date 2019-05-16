<article id="<?php the_ID(); ?>" <?php post_class( 'blog-element-type-1 single-post single-type-3 marg-b-50' ); ?>>
    <div class="row">
        <div class="col-xs-12">
			<?php
			if ( has_post_thumbnail() ):?>
                <div class="blog-element-featured-image">

					<?php the_post_thumbnail( 'nothing-personal-blog-element-full',
						array(
							'class' => 'img-responsive'
						)
					); ?>

                </div>
			<?php endif; ?>
        </div>
    </div>
    <div class="row marg-t-30">
        <div class="col-md-9 col-sm-8 col-xs-12 pad-r-35">
            <div class="blog-item-date text-center">
                <span><?php echo get_the_time( get_option( 'date_format' ) ); ?></span>
            </div>
            <h2 class="blog-item-title">
				<?php the_title(); ?>
            </h2>
            <div class="blog-element-content">
				<?php the_content(); ?>
            </div>
			<?php
			$tags = nothing_personal_get_tags( get_the_ID() );
			if ( $tags != false ): ?>
                <ul class="single-post-tags text-center marg-t-30 marg-b-30">
					<?php foreach ( $tags as $tg ): ?>
                        <li>
                            <a href="<?php echo esc_url( get_term_link( $tg->term_id ) ); ?>">#<?php echo esc_html( $tg->name ); ?></a>
                        </li>
					<?php endforeach; ?>
                </ul>
			<?php endif; ?>
            <div class="blog-element-meta d-flex v-center-flex marg-b-35">
                <div class="blog-element-share">
                    <span><?php echo esc_html__( 'SHARE:', 'nothing-personal' ); ?></span>
					<?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) {
						ADDTOANY_SHARE_SAVE_KIT();
					} ?>
                </div>
				<?php $terms = nothing_personal_get_blog_item_categories( get_the_ID(), 'category' ); ?>
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
            <?php
            /**
             * Hooks to show the content elements of the single post bottom
             *
             * nothing_personal_get_author_bio - 10
             * nothing_personal_get_post_navigation - 15
             * nothing_personal_get_related_posts - 20
             * nothing_personal_get_comments - 25
             *
             *
             * @since 1.0.0
             * @package Nothing_Personal
             */
            do_action('nothing_personal_single_content_bottom');

			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>
        </div>

        <div class="col-md-3 col-sm-4 col-xs-12">
			<?php get_sidebar(); ?>
        </div>

</article>