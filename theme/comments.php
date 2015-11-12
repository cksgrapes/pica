<?php
if ( post_password_required() )
	return;
?>


<?php

$fields =  array(
	'author' => '<p class="comment-form-author">' . ( $req ? '<span class="required">*</span>' : '' ) .
	            '<input id="author" name="author" type="text" placeholder="匿名" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' /></p>',
	'email'  => '',
	'url'    => '',
);

$defaults = array(
	'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
	'comment_field'        => '<input type="text" id="comment" placeholder="コメント" name="comment" aria-required="true">',
	'must_log_in'          => '',
	'logged_in_as'         => '',
	'comment_notes_before' => '',
	'comment_notes_after'  => '',
	'title_reply'          => '',
	'title_reply_to'       => '',
	'cancel_reply_link'    => '',
	'label_submit'         => '送信',
);

comment_form($defaults); ?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ul',
					'callback' => 'mytheme_comment',
				) );
			?>
		</ol><!-- .comment-list -->

		<?php
			// Are there comments to navigate through?
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
		<nav class="navigation comment-navigation" role="navigation">
			<div class="nav-previous"><?php previous_comments_link(); ?></div>
			<div class="nav-next"><?php next_comments_link(); ?></div>
		</nav><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.' , 'twentythirteen' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

</div><!-- #comments -->
