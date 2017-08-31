<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package yatsyuk
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

<div id="comments" class="comments-area col-12">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'yatsyuk' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'yatsyuk' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'yatsyuk' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ol class="comment-list">
			<?php
                wp_list_comments(['callback' => 'sage_comment']);
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
            <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
                <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'yatsyuk' ); ?></h2>
                <div class="nav-links">

                    <div class="nav-previous">
                        <?php previous_comments_link( esc_html__( 'Older Comments', 'yatsyuk' ) ); ?>
                    </div>
                    <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'yatsyuk' ) ); ?></div>

                </div><!-- .nav-links -->
            </nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.

	endif; // Check for have_comments().


	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'yatsyuk' ); ?></p>
	<?php
	endif;

    $comment_args = array( 'title_reply'=>'Залиште ваш відгук:',

        'comment_field' => '<p class="col-12">' .

            '<label class="comment-label" for="comment">' . __( 'Ваш відгук' ) . '</label>' .

            '<textarea id="comment" name="comment" aria-required="true"></textarea>' .

            '</p>',

        'logged_in_as' => '<p class="logged-in-as col-12">' . sprintf( __( 'Ви зареєстровані як <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Вийти?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) .'</p>',
        'comment_notes_before' => '',
        'comment_notes_after' => '',
        'class_form' =>'row comment-form',
        'submit_field' =>'<p class="form-submit col-sm-6">%1$s %2$s</p>',

    );
    $comment_args1 = array( 'title_reply'=>'Залиште ваше запитання:',

        'comment_field' => '<p class="col-12">' .

            '<label class="comment-label" for="comment">' . __( 'Ваш відгук' ) . '</label>' .

            '<textarea id="comment" name="comment" aria-required="true"></textarea>' .

            '</p>',

        'logged_in_as' => '<p class="logged-in-as col-12">' . sprintf( __( 'Ви зареєстровані як <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Вийти?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) .'</p>',
        'comment_notes_before' => '',
        'comment_notes_after' => '',
        'class_form' =>'row comment-form',
        'submit_field' =>'<p class="form-submit col-sm-6">%1$s %2$s</p>',

    );

    if (is_page('consult')){
        comment_form($comment_args1);
    }else comment_form($comment_args);
	?>

</div><!-- #comments -->


<?php

/**
 * Build comment using bootstrap media object
 */

function sage_comment($comment, $args, $depth) {
//get comment to determine type
    $GLOBALS['comment'] = $comment;

    switch ($comment->comment_type):
        case 'pingback':
        case 'trackback': ?>
            <li class="media" id="comment-<?php comment_ID(); ?>">
                <div class="media-body">
                    <p>
                        <?php _e('Pingback:', 'sage'); ?> <?php comment_author_link(); ?>
                    </p>
                </div><!--/.media-body -->
            </li>
            <?php
            break;
        default:
            global $post; ?>
            <li class="media">
                        <a href="<?php echo $comment->comment_author_url;?>" class="d-flex mr-3">
                            <?php echo get_avatar($comment, 96); ?>
                        </a>
                    <div class="media-body">
                        <h4 class="mt-0 mb-1 comment-author-name">
                            <?php printf('<cite class="fn">%1$s %2$s</cite>',
                                get_comment_author_link(),
                                // If current post author is also comment author, make it known visually.
                                ($comment->user_id === $post->post_author) ? '<span class="label"> ' . __(
                                        'Автор',
                                        'yatsyuk'
                                    ) . '</span> ' : ''); ?>
                            <span class="comment-title">
                                <?php
                                    echo get_comment_meta(get_comment_ID(), 'title', true);
                                 ?>
                            </span>
                        </h4>
                        <?php if ('0' == $comment->comment_approved) : ?>
                            <p class="comment-awaiting-moderation">
                                <?php _e('Ваш відгук очікує модерації.','sage'); ?>
                            </p>
                        <?php endif; ?>
                        <?php comment_text(); ?>
                        <p class="meta">
                            <?php printf('<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
                                esc_url(get_comment_link($comment->comment_ID)),
                                get_comment_time('c'),
                                sprintf(
                                    __('%1$s о %2$s', 'sage'),
                                    get_comment_date(),
                                    get_comment_time()
                                ));
                            ?>
                        </p>
                        <p class="reply">
                            <?php comment_reply_link( array_merge($args, array(
                                    //'reply_text' => __('Reply <span>&darr;</span>', 'sage'),
                                    'reply_text' => __('Відповісти', 'yatsyuk'),
                                    'depth'      => $depth,
                                    'max_depth'  => $args['max_depth']
                                )
                            ));
                            ?>
                        </p>

                    </div>
            </li>
            <?php
            break;
    endswitch;
}