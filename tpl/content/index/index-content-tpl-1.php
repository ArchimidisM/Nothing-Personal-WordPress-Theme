<?php
$blogArgs = nothing_personal_remove_sidebar();
?>
<div class="row">
    <div class="<?php echo esc_attr( $blogArgs['main_class'] ); ?>">
        <div id="content" class="index-content pad-r-35">

			<?php
			$curPage = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$args  = array(
				'post_type'           => 'post',
				'orderby'             => 'menu_order',
				'order'               => 'ASC',
				'ignore_sticky_posts' => true,
				'paged'               => $curPage
			);
			$pQ    = new WP_Query( $args );

			if ( $pQ->have_posts() ):
				while ( $pQ->have_posts() ): $pQ->the_post();
					get_template_part( 'tpl/elements/blog/blog-element-type-1' );
				endwhile; ?>
                <div class="col-xs-12">
					<?php nothing_personal_posts_pagination( $pQ ); ?>
                </div>
			<?php endif; ?>

			<?php wp_reset_postdata(); ?>
        </div>
    </div>
	<?php if ( esc_html( $blogArgs['remove_sidebar'] ) == false ): ?>
        <div class="col-md-3 col-sm-4 col-xs-12">
			<?php get_sidebar(); ?>
        </div>
	<?php endif; ?>

</div>