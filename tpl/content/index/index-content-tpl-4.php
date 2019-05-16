<?php
$blogArgs = nothing_personal_remove_sidebar();
?>
<div class="row">
    <div class="<?php echo esc_attr($blogArgs['main_class']); ?>">
        <div id="content" class="index-content pad-r-35">
            <div class="secondary-blog-elements">
                <div class="row top-xs">
                    <?php
                    $curPage = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = array(
                        'post_type' => 'post',
                        'orderby' => 'menu_order',
                        'order' => 'ASC',
                        'ignore_sticky_posts' => true,
                        'paged' => $curPage
                    );
                    $sQ = new WP_Query($args);

                    if ($sQ->have_posts()):
                        while ($sQ->have_posts()): $sQ->the_post(); ?>
                            <div class="col-sm-6 col-xs-12">
                                <?php get_template_part('tpl/elements/blog/blog-element-type-1-s'); ?>
                            </div>
                        <?php endwhile; ?>
                    <?php  endif;  ?>
                    <div class="col-xs-12">
	                    <?php nothing_personal_posts_pagination($sQ); ?>
                    </div>
                    <?php
                    wp_reset_postdata();
                    ?>
                </div>

            </div>
        </div>
    </div>
    <?php if (esc_html($blogArgs['remove_sidebar']) == false): ?>
        <div class="col-md-3 col-sm-4 col-xs-12">
            <?php get_sidebar(); ?>
        </div>
    <?php endif; ?>
</div>