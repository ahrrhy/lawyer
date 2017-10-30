<?php
/*
Plugin Name: Расширенные комментарии
Version: 1.0
Plugin URI: https://wp-kama.ru/?p=8342
Description: Плагін, який дозволяє розширити стандартні комментарі.
Author: Campusboy
Author URI: https://wp-plus.ru/
*/

/**
 *  Adding new fields to comment_form();
 *
 */

add_filter('comment_form_default_fields', 'extend_comment_custom_default_fields');
function extend_comment_custom_default_fields($fields) {

    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );

    $fields[ 'author' ] = '<p class="comment-form-author col-sm-6">'.
        '<label class="comment-label" for="author">' . __( 'Ім\'я' ) . ( $req ? '<span class="required"> *</span>' : '' ). '</label>'.

        '<input id="author" class="comment-input" name="author" type="text" value="'. esc_attr( $commenter['comment_author'] ) .
        '" tabindex="1"' . $aria_req . ' /></p>';

    $fields[ 'email' ] = '<p class="comment-form-email col-sm-6">'.
        '<label class="comment-label" for="email">' . __( 'Електронна пошта' ) . ( $req ? '<span class="required"> *</span>' : '' ). '</label>'.

        '<input id="email"  class="comment-input" name="email" type="text" value="'. esc_attr( $commenter['comment_author_email'] ) .
        '" size="30"  tabindex="2"' . $aria_req . ' /></p>';

    $fields[ 'url' ] = '';

    $fields[ 'phone' ] = '<p class="comment-form-phone col-sm-6">'.
        '<label class="comment-label" for="phone">' . __( 'Контактний номер' ) . '</label>'.
        '<input id="phone" class="comment-input" name="phone" type="text" size="30"  tabindex="4" /></p>';


    return $fields;
}


/**
 *
 * Adding fields for all users
 */
add_action( 'comment_form_logged_in_after', 'extend_comment_custom_fields' );
add_action( 'comment_form_after_fields', 'extend_comment_custom_fields' );
function extend_comment_custom_fields() {

    echo '<p class="comment-form-title col-sm-6" >'.
        '<label class="comment-label" for="title">' . __( 'Назва коментаря' ) . '</label>'.
        '<input id="title" class="comment-input" name="title" type="text" /></p>';
}

/**
 *
 *Saving data to front-end
 *
 */

add_action( 'comment_post', 'save_extend_comment_meta_data' );
function save_extend_comment_meta_data( $comment_id ){

    if( !empty( $_POST['phone'] ) ){
        $phone = sanitize_text_field($_POST['phone']);
        add_comment_meta( $comment_id, 'phone', $phone );
    }

    if( !empty( $_POST['title'] ) ){
        $title = sanitize_text_field($_POST['title']);
        add_comment_meta( $comment_id, 'title', $title );
    }
}

// Добавляем новый метабокс на страницу редактирования комментария
add_action( 'add_meta_boxes_comment', 'extend_comment_add_meta_box' );
function extend_comment_add_meta_box(){
    add_meta_box( 'title', __( 'Comment Metadata - Extend Comment' ), 'extend_comment_meta_box', 'comment', 'normal', 'high' );
}

// Отображаем наши поля
function extend_comment_meta_box( $comment ){
    $phone  = get_comment_meta( $comment->comment_ID, 'phone', true );
    $title  = get_comment_meta( $comment->comment_ID, 'title', true );

    wp_nonce_field( 'extend_comment_update', 'extend_comment_update', false );
    ?>
    <p>
        <label for="phone"><?php _e( 'Phone' ); ?></label>
        <input type="text" name="phone" value="<?php echo esc_attr( $phone ); ?>" class="widefat" />
    </p>
    <p>
        <label for="title"><?php _e( 'Comment Title' ); ?></label>
        <input type="text" name="title" value="<?php echo esc_attr( $title ); ?>" class="widefat" />
    </p>

    <?php
}

/**
 *
 * Saving editions on wp-admin
 */
add_action( 'edit_comment', 'extend_comment_edit_meta_data' );
function extend_comment_edit_meta_data( $comment_id ) {
    if( ! isset( $_POST['extend_comment_update'] ) || ! wp_verify_nonce( $_POST['extend_comment_update'], 'extend_comment_update' ) )
        return;

    if( !empty($_POST['phone']) ){
        $phone = sanitize_text_field($_POST['phone']);
        update_comment_meta( $comment_id, 'phone', $phone );
    }
    else
        delete_comment_meta( $comment_id, 'phone');

    if( !empty($_POST['title']) ){
        $title = sanitize_text_field($_POST['title']);
        update_comment_meta( $comment_id, 'title', $title );
    }
    else
        delete_comment_meta( $comment_id, 'title');

}