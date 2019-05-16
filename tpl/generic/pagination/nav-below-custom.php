<?php
/**
 * This navigation is used with Custom WP Queries
 *
 * @package Nothing_Personal
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$curPage = absint( get_query_var( 'paged' ) );
if($curPage != 0 ):
?>
<h6 class="post-pagination-title marg-t-25">
	<?php echo esc_html__( 'You are here: Page ', 'nothing-personal' ); ?>

	echo( $page == '' ? 1 : $page );
	?>
</h6>
<ul class="np-posts-pagination">
    <?php if (get_previous_posts_link() !='') : ?>
    <li class="page-item page-prev">
        <div class="page-item-subtitle">
	        <?php
	        echo
		        '<span class="jam jam-arrow-left"></span>'.get_previous_posts_link(esc_html__('Previous posts','nothing-personal'));
	        ?>
        </div>
    </li>
    <?php endif; ?>
    <?php if(get_next_posts_link() !=''):?>
    <li class="page-item page-next">
        <div class="page-item-subtitle">
            <?php
            echo
            get_next_posts_link(esc_html__('Next posts','nothing-personal'),$customQuery->max_num_pages).
            '<span class="jam jam-arrow-right"></span>';
            ?>
        </div>
    </li>
    <?php endif; ?>
</ul>
<?php endif; ?>