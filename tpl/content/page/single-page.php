<?php
/**
 * Show the page content
 *
 * @since 1.0.0
 * @package Nothing_Personal
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

?>
<div class="row">
    <?php if (have_posts()): ?>
        <div class="col-xs-12">
            <?php while (have_posts()): the_post(); ?>
                <div id="content" class="single-content pad-r-35">
                    <article id="<?php the_ID(); ?>" <?php post_class( 'blog-element-type-1 single-page' ); ?>>

                        <?php
                        if ( has_post_thumbnail() ):?>
                            <div class="blog-element-featured-image single-page-image">

                                <?php the_post_thumbnail( 'nothing-personal-page-image',
                                    array(
                                        'class' => 'img-responsive',
                                    )
                                ); ?>

                            </div>
                        <?php endif; ?>

                        <h1 class="single-page-title">
		                    <?php the_title(); ?>
                        </h1>
                        <div class="single-page-content">
                            <?php the_content(); ?>
                        </div>

                        <div class="np-link-pages">
	                        <?php wp_link_pages(); ?>
                        </div>
                    </article>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif;
    ?>


</div>
