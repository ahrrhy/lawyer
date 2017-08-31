<?php
/*
* Meta boxes
*/
function my_extra_fields() {
global $post;
    if ( $post->post_name == home ) {
        add_meta_box( 'section_welcome', 'Коротка Інформація ', 'section_welcome_box_func', 'page', 'normal', 'high'  );
    };
}
add_action('add_meta_boxes', 'my_extra_fields', 1);

// Block code

function section_welcome_box_func( $post ){ ?>
    <ul>
        <li>
            <label>Текст посилання на сторінку Про адвоката:
                <input type="text" name="extra[welcome-link-text]" value="<?php echo get_post_meta($post->ID, 'welcome-link-text', 1); ?>" style="width:30%;" />
            </label>
        </li>
        <li>
            <label>Посилання на сторінку Про адвоката:
                <input type="text" name="extra[welcome-link]" value="<?php echo get_post_meta($post->ID, 'welcome-link', 1); ?>" style="width:30%;" />
            </label>
        </li>
        <li>
            <input type="hidden" name="extra[welcome-display]" value="">
            <label><input type="checkbox" name="extra[welcome-display]" value="1" <?php checked( get_post_meta($post->ID, 'welcome-display', 1), 1 ) ?>> Показувати?</label>
        </li>
    </ul>

    <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
    <?php
}

/* Save the data, if you save the post */
function my_extra_fields_update( $post_id ){
    if ( ! wp_verify_nonce($_POST['extra_fields_nonce'], __FILE__) ) return false; // Test
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE  ) return false; // Exit if this autosave
    if ( !current_user_can('edit_post', $post_id) ) return false; // Exit if the user does not have the right to edit the record

    if( !isset($_POST['extra']) ) return false; // If there is no data? left

    // Все ОК! Теперь, нужно сохранить/удалить данные
    $_POST['extra'] = array_map('trim', $_POST['extra']); // Clean all data from spaces at the edges
    foreach( $_POST['extra'] as $key=>$value ){
        if( empty($value) ){
            delete_post_meta($post_id, $key); // Delete the field if the value is empty
            continue;
        }

        update_post_meta($post_id, $key, $value); // add_post_meta() работает автоматически
    }
    return $post_id;
}

add_action('save_post', 'my_extra_fields_update', 0);
