<?php
$curPage = absint( get_query_var( 'paged' ) );
if ( $curPage != 0 ): ?>
    <h6 class="post-pagination-title marg-t-25">
		<?php echo esc_html__( 'You are here: Page ', 'nothing-personal' ); ?>
		<?php
		$curPage = absint( get_query_var( 'paged' ) );
		echo( $curPage == '' ? 1 : $curPage );
		?>
    </h6>
    <ul class="np-posts-pagination">
        <li class="page-item page-prev">
            <div class="page-item-subtitle">
				<?php previous_posts_link( sprintf( __( ' %s Previous posts', 'nothing-personal' ), '<span class="jam jam-arrow-left"></span>' ) ) ?>
            </div>
        </li>
        <li class="page-item page-next">
            <div class="page-item-subtitle">
				<?php next_posts_link( sprintf( __( 'Next posts %s', 'nothing-personal' ), '<span class="jam jam-arrow-right"></span>' ) ) ?>
            </div>
        </li>
    </ul>
<?php endif; ?>