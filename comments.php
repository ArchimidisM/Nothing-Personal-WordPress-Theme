<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nothing_Personal
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<?php
	if ( have_comments() ) :
		?>
        <div class="comments-top text-center marg-t-40 marg-b-40">

            <h2 class="comments-title marg-t-0 marg-b-0">
                <span><?php echo esc_html__( 'COMMENTS', 'nothing-personal' ); ?></span></h2>
            <h3 class="comments-subtitle marg-b-0 marg-t-0">
				<?php
				$nothing_personal_comment_count = get_comments_number();
				if ( '1' === $nothing_personal_comment_count ) {
					printf(
					/* translators: 1: title. */
						esc_html__( 'One comment on &ldquo;%1$s&rdquo;', 'nothing-personal' ),
						'<span>' . get_the_title() . '</span>'
					);
				} else {
					printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
						esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $nothing_personal_comment_count, 'comments title', 'nothing-personal' ) ),
						number_format_i18n( $nothing_personal_comment_count ),
						'<span>' . get_the_title() . '</span>'
					);
				}
				?>
            </h3><!-- .comments-title -->

			<?php the_comments_navigation(); ?>
        </div>
        <ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'      => 'ul',
				'short_ping' => true,
				'callback'   => 'nothing_personal_comments'
			) );
			?>
        </ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'nothing-personal' ); ?></p>
		<?php
		endif;

	endif; // Check for have_comments().

	comment_form();
	?>

</div><!-- #comments -->
