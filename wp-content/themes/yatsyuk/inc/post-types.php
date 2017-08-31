<?php
/**
 * Create custom post type
 */

add_action('init', 'register_post_types');

function register_post_types() {
    register_post_type('cases', array(
        'labels' => array(
            'name' => esc_html__('Справи', 'yatsyuk'),
            'singular_name' => esc_html__('Справа', 'yatsyuk'),
            'add_new' => esc_html__('Додати нову', 'yatsyuk'),
            'add_new_item' => esc_html__('Додати нову Справу', 'yatsyuk'),
            'edit_item' => esc_html__('Редагувати Справу', 'yatsyuk'),
            'new_item' => esc_html__('Нова Справа', 'yatsyuk'),
            'view_item' => '',
        ),
        'description' => '',
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'query_var' => true,
        'capability_type' => 'post',
        'supports' => array('title', 'excerpt', 'thumbnail', 'title', 'editor', 'author', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes', 'post-formats'), // 'title','editor','author',,'excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'         => array('servicescat'),
        'has_archive' => true
    ));
   }

    add_action('init', 'create_taxonomy');
    function create_taxonomy()
    {

// Labels
// list: http://wp-kama.ru/function/get_taxonomy_labels
        $labels = array(
            'name' => esc_html__( 'Сфери Послуг', 'yatsyuk' ),
            'singular_name' => esc_html__( 'Сфера Послуг', 'yatsyuk' ),
            'search_items' => esc_html__( 'Шукати Сферу Послуг', 'yatsyuk' ),
            'all_items' => esc_html__( 'Усі Сфери Послуг', 'yatsyuk' ),
            'edit_item' => esc_html__( 'Редагувати Сферу Послуг', 'yatsyuk' ),
            'update_item' => esc_html__( 'Оновити Сферу Послуг', 'yatsyuk' ),
            'add_new_item' => esc_html__( 'Додати нову Сферу Послуг', 'yatsyuk' ),
            'new_item_name' => esc_html__( 'Нова назва Сфери Послуг', 'yatsyuk' ),
            'menu_name' => esc_html__( 'Сфери Послуг', 'yatsyuk' ),
            'parent_item' => null,
            'parent_item_colon' => null,
        );
// parameters
        $args = array(
            'labels'                => $labels,
            'public'                => true,
            'show_tagcloud'         => false, // равен аргументу show_ui
            'hierarchical'          => true,
            'update_count_callback' => '',
            'capabilities'          => array(),
            'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
            '_builtin'              => false,
            'query_var'             => true, // название параметра запроса
            'rewrite'               => true,
            'has_archive' => true
        );
        register_taxonomy('servicescat', array('cases'), $args);
    }


