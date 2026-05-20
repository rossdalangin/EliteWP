<?php
/**
 * The template for displaying comments
 *
 * @package Premium_B2B
 */

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area container" style="max-width: 65ch; margin-top: 6rem;">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			$premium_b2b_comment_count = get_comments_number();
			if ( '1' === $premium_b2b_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'premium-b2b' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf(
					/* translators: 1: comment count, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $premium_b2b_comment_count, 'comments title', 'premium-b2b' ) ),
					number_format_i18n( $premium_b2b_comment_count ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h2>

		<ol class="comment-list" style="margin-top: 2rem;">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size' => 60,
				)
			);
			?>
		</ol>

		<?php
		the_comments_navigation();

		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'premium-b2b' ); ?></p>
			<?php
		endif;

	endif;

	comment_form( array(
		'class_form' => 'comment-form grid',
		'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title">',
		'title_reply_after'  => '</h3>',
	) );
	?>

</div><!-- #comments -->
