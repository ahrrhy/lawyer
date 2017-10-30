<?php
/**
 * yatsyuk Theme Customizer
 *
 * @package yatsyuk
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function yatsyuk_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'blogname', array(
            'selector'        => '.site-title a',
            'render_callback' => 'yatsyuk_customize_partial_blogname',
        ) );
        $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
            'selector'        => '.site-description',
            'render_callback' => 'yatsyuk_customize_partial_blogdescription',
        ) );
    }
}
add_action( 'customize_register', 'yatsyuk_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function yatsyuk_customize_partial_blogname() {
    bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function tashastudio_customize_partial_blogdescription() {
    bloginfo( 'description' );
}

function control_custom_header_settings ($wp_customize){

    /**
     * Adding color to Cases Headers
     */
    $wp_customize->add_section('heading_links_color', array(
        'title' => 'Налаштування кольору заголовків справ та статтей'
    ));
    $wp_customize->add_setting('heading_color', array(
        'default' => '#d5d0ca',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'heading_color', array(
        'label' => __('Колір заголовків справ та статтей', 'yatsyuk'),
        'section' => 'heading_links_color',
        'settings' => 'heading_color',
    ) ) );
    /**
     * Adding color to Posts dates
     */
    $wp_customize->add_setting('date_color', array(
        'default' => '#40809b',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'date_color', array(
        'label' => __('Колір дати справ та статтей', 'yatsyuk'),
        'section' => 'heading_links_color',
        'settings' => 'date_color',
    ) ) );
    /**
     * Adding border color to Posts dates
     */
    $wp_customize->add_setting('date_border_color', array(
        'default' => '#cbd4d6',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'date_border_color', array(
        'label' => __('Колір ліній дати справ та статтей', 'yatsyuk'),
        'section' => 'heading_links_color',
        'settings' => 'date_border_color',
    ) ) );



    /**
     * Adding body bg color
     */
    $wp_customize->add_section('body_bg', array(
        'title' => 'Налаштування кольору фону сайту сторінки'
    ));
    $wp_customize->add_setting('body_bg_color', array(
        'default' => '#d5d0ca',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_bg_color', array(
        'label' => __('Колір Посилань Головного Меню', 'yatsyuk'),
        'section' => 'body_bg',
        'settings' => 'body_bg_color',
    ) ) );

    /**
     * Adding custom Backgrounds For DIFFERENT pages
     */
    $wp_customize->add_section('pages_bg', array(
        'title' => 'Налаштування фону різних сторінок сайту'
    ));

    $wp_customize->add_setting('about_page_bg');

    //bg in about_page

    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'about_page_bg', array(
        'label' => 'Фон сторінки Про адвоката',
        'section' => 'pages_bg',
        'settings' => 'about_page_bg',
        'width' => '2500',
        'height' => '1500'
    )));

    $wp_customize->add_setting('blog_page_bg');

    //bg in blog page

    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'blog_page_bg', array(
        'label' => 'Фон сторінки Блог',
        'section' => 'pages_bg',
        'settings' => 'blog_page_bg',
        'width' => '2500',
        'height' => '1500'
    )));

    $wp_customize->add_setting('practice_page_bg');

    //bg in practice page

    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'practice_page_bg', array(
        'label' => 'Фон сторінки Судова практика',
        'section' => 'pages_bg',
        'settings' => 'practice_page_bg',
        'width' => '2500',
        'height' => '1500'
    )));

    $wp_customize->add_setting('price_page_bg');

    //bg in practice page

    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'price_page_bg', array(
        'label' => 'Фон сторінки Порядок та вартість',
        'section' => 'pages_bg',
        'settings' => 'price_page_bg',
        'width' => '2500',
        'height' => '1500'
    )));

    $wp_customize->add_setting('consult_page_bg');

    //bg in practice page

    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'consult_page_bg', array(
        'label' => 'Фон сторінки Консультації',
        'section' => 'pages_bg',
        'settings' => 'consult_page_bg',
        'width' => '2500',
        'height' => '1500'
    )));



    /**
     * Adding custom Banner
     */
    $wp_customize->add_section('header_section', array(
        'title' => 'Налаштування заголовку сайта'
    ));

    $wp_customize->add_setting('banner_other');

    //banner in all pages except front

    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'banner_other', array(
        'label' => 'Баннер у заголовку сторінок',
        'section' => 'header_section',
        'settings' => 'banner_other',
        'width' => '2500',
        'height' => '856'
        )));

    /**
     * Adding custom Information to Front-Page Before Navigation
     */
    $wp_customize->add_setting('site_main_title');

    $wp_customize->add_control('site_main_title',
        array(
            'label' => 'Введіть Заголовок перед Меню',
            'section' => 'header_section',
            'type' => 'text',
        )
    );

    /**
     * Add logo to front header
     */
    $wp_customize->add_setting('logo');

    //banner in all pages except front

    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'logo', array(
        'label' => 'Логотип',
        'section' => 'header_section',
        'settings' => 'logo',
        'width' => '2500',
        'height' => '856'
    )));


    /**
     * Adding custom Navigation Links Color
     */

    $wp_customize->add_setting('navigation_links_color', array(
        'default' => '#ffffff',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navigation_links_color', array(
        'label' => __('Колір Посилань Головного Меню', 'yatsyuk'),
        'section' => 'header_section',
        'settings' => 'navigation_links_color',
    ) ) );

    //border color
    $wp_customize->add_setting('control_border_color', array(
        'default' => '#ffffff',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'control_border_color', array(
        'label' => __('Border and Hover Color', 'yatsuyk'),
        'section' => 'header_section',
        'settings' => 'control_border_color',
    ) ) );

    /**
     * Adding custom Home Page Background
     */
    $wp_customize->add_section('front_page', array(
        'title' => 'Налаштування головної сторінки'
    ));
    $wp_customize->add_setting('background_front');

    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'background_front', array(
        'label' => 'Фонове зображення на головній сторінці',
        'section' => 'front_page',
        'settings' => 'background_front',
        'width' => '2500',
        'height' => '856'
    )));


    /**
     * Adding checkbox to display front-page content
     */
    $wp_customize->add_setting('content_front_hide');

    $wp_customize->add_control('content_front_hide',
        array(
            'label' => 'Показувати контент головної сторінки?',
            'section' => 'front_page',
            'type' => 'checkbox',
        )
    );

    /**
     * Adding custom Information to Front-Page
     */
    $wp_customize->add_setting('information_front');

    $wp_customize->add_control('information_front',
        array(
            'label' => 'Введіть Заголовок',
            'section' => 'front_page',
            'type' => 'text',
        )
    );

    /**
     * Adding custom Information to Footer
     */

    $wp_customize->add_section('footer_section', array(
        'title' => 'Налаштування підвалу сайту'
    ));

    $wp_customize->add_setting('contacts_footer');

    $wp_customize->add_control('contacts_footer',
        array(
            'label' => 'Введіть заголовок секції Контакти',
            'section' => 'footer_section',
            'type' => 'text',
        )
    );

    //Adding google maps

    $wp_customize->add_setting('how_to_footer');

    $wp_customize->add_control('how_to_footer',
        array(
            'label' => 'Введіть заголовок секції Карти',
            'section' => 'footer_section',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting('maps_footer');

    $wp_customize->add_control('maps_footer',
        array(
            'label' => 'Введіть в поле посилання з гугл карт',
            'section' => 'footer_section',
            'type' => 'text',
        )
    );

    // Text color
    $wp_customize->add_setting('text_footer', array(
        'default' => '#666666',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text_footer', array(
        'label' => __('Колір тексту підвалу', 'yatsuyk'),
        'section' => 'footer_section',
        'settings' => 'text_footer',
    ) ) );

    // Headers color
    $wp_customize->add_setting('headers_footer', array(
        'default' => '#40809b',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'headers_footer', array(
        'label' => __('Колір заголовків у підвалі', 'yatsuyk'),
        'section' => 'footer_section',
        'settings' => 'headers_footer',
    ) ) );

    // Headers border color
    $wp_customize->add_setting('headers_border_footer', array(
        'default' => '#cbd4d6',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'headers_border_footer', array(
        'label' => __('Колір нижньої лінії заголовків у підвалі', 'yatsuyk'),
        'section' => 'footer_section',
        'settings' => 'headers_border_footer',
    ) ) );

    //BG color
    $wp_customize->add_setting('background_footer', array(
        'default' => '#ffffff',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'background_footer', array(
        'label' => __('Колір фону підвалу', 'yatsuyk'),
        'section' => 'footer_section',
        'settings' => 'background_footer',
    ) ) );

    //BG to Copyrights
    $wp_customize->add_setting('background_footer_copy');

    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'background_footer_copy', array(
        'label' => 'Фонове зображення секції Копірайт',
        'section' => 'footer_section',
        'settings' => 'background_footer_copy',
    )));

    //Copyrights text color
    $wp_customize->add_setting('text_footer_copy', array(
        'default' => '#666666',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text_footer_copy', array(
        'label' => __('Колір тексту у Copyright', 'yatsuyk'),
        'section' => 'footer_section',
        'settings' => 'text_footer_copy',
    ) ) );

    /**
     *  Adding circumstances word before the Cases-Header
     */

    $wp_customize->add_section('cases_page', array(
        'title' => 'Текст перед заголовком Справи'
    ));

    $wp_customize->add_setting('circumstances_text');

    $wp_customize->add_control('circumstances_text',
        array(
            'label' => 'Текст перед заголовком Справи',
            'section' => 'cases_page',
            'type' => 'text',
        )
    );

    /**
     *  Adding circumstances word before the Cases-Header
     */

    $wp_customize->add_section('jivo_chat', array(
        'title' => 'Сюди потрібно вставити код з JivoChat'
    ));

    $wp_customize->add_setting('jivo_chat_code');

    $wp_customize->add_control('jivo_chat_code',
        array(
            'label' => 'Текст перед заголовком Справи',
            'section' => 'jivo_chat',
            'type' => 'text',
        )
    );
}
add_action( 'customize_register', 'control_custom_header_settings' );

function control_customize_css() {

    global $post;
    if ( $post->post_name == home ) { ?>
        <style type="text/css">
            header.site-header{
                background: url("<?php echo wp_get_attachment_url(get_theme_mod('background_front')); ?>") center/cover no-repeat;
            }
            @media screen and (min-width: 768px){
                header.site-header{
                    background: url("<?php echo wp_get_attachment_url(get_theme_mod('background_front')); ?>") center/cover no-repeat scroll;
                }
            }
        </style>
        <?php
        //control_border_color
    } ?>
    <style type="text/css">
        /* make different backgrounds */
        div.practice{
            background: url("<?php echo wp_get_attachment_url(get_theme_mod('about_page_bg')); ?>") center/cover no-repeat;
        }
        @media screen and (min-width: 768px){
            div.practice{
                background: url("<?php echo wp_get_attachment_url(get_theme_mod('about_page_bg')); ?>") center/cover no-repeat;
            }
        }
        div.about{
            background: url("<?php echo wp_get_attachment_url(get_theme_mod('about_page_bg')); ?>") center/cover no-repeat;
        }
        @media screen and (min-width: 768px){
            div.about{
                background: url("<?php echo wp_get_attachment_url(get_theme_mod('about_page_bg')); ?>") center/cover no-repeat;
            }
        }
        div.blog{
            background: url("<?php echo wp_get_attachment_url(get_theme_mod('blog_page_bg')); ?>") center/cover no-repeat;
        }
        @media screen and (min-width: 768px){
            div.blog{
                background: url("<?php echo wp_get_attachment_url(get_theme_mod('blog_page_bg')); ?>") center/cover no-repeat;
            }
        }
        div.price{
            background: url("<?php echo wp_get_attachment_url(get_theme_mod('price_page_bg')); ?>") center/cover no-repeat;
        }
        @media screen and (min-width: 768px){
            div.price{
                background: url("<?php echo wp_get_attachment_url(get_theme_mod('price_page_bg')); ?>") center/cover no-repeat;
            }
        }
        div.consult{
            background: url("<?php echo wp_get_attachment_url(get_theme_mod('consult_page_bg')); ?>") center/cover no-repeat;
        }
        @media screen and (min-width: 768px){
            div.consult{
                background: url("<?php echo wp_get_attachment_url(get_theme_mod('consult_page_bg')); ?>") center/cover no-repeat;
            }
        }

        .cases-list .post-publish-date span {
            color: <?php echo get_theme_mod('date_color') ?>;
        }

        .cases-list .post-publish-date span, .cases-list .post-publish-date:before{
            border-color: <?php echo get_theme_mod('date_border_color') ?>;
        }

        .heading-link{
            color: <?php echo get_theme_mod('heading_color')?>;
        }
        body{
            background: <?php echo get_theme_mod('body_bg_color') ?>;
        }
        .front-header{
            background: url("<?php echo wp_get_attachment_url(get_theme_mod('background_front')); ?>") center/cover no-repeat;
        }
        .navbar .navbar-nav a:hover, .navbar-light .navbar-toggler, header .navbar ul, header .navbar .navbar-nav .active, .navbar{
            border-color: <?php echo get_theme_mod('control_border_color'); ?>;
        }
        .header .navbar .navbar-toggleable-md .navbar-light .bg-faded p.site-title:hover, .phone-wrapper span a:hover{
            color: <?php echo get_theme_mod('control_border_color'); ?>;
        }
        .other-header{
            background: url("<?php echo wp_get_attachment_url(get_theme_mod('banner_other')); ?>") center/cover no-repeat;
        }
        .navbar .navbar-nav a, .navbar-light .site-title, .site-description, .phone-wrapper, .phone-wrapper span a, .page-title{
            color: <?php echo get_theme_mod('navigation_links_color'); ?> ;
        }
        .site-footer{
            background-color: <?php echo get_theme_mod('background_footer'); ?> ;
        }
        .site-footer .copyright{
            background: url("<?php echo wp_get_attachment_url(get_theme_mod('background_footer_copy')); ?>") 0 0/cover;
        }
        .site-footer .contact-info-header{
            color: <?php echo get_theme_mod('headers_footer'); ?> ;
        }
        .site-footer .contact-info, .site-footer .services-cat-section{
            color: <?php echo get_theme_mod('text_footer'); ?> ;
        }
        .site-footer .contact-info-header::before{
            border-color: <?php echo get_theme_mod('headers_border_footer'); ?>;
        }
        .contact-info-header span{
            border-color: <?php echo get_theme_mod('headers_border_footer'); ?>;
        }
        .site-footer .copyright, .site-footer .copyright a{
            color: <?php echo get_theme_mod('text_footer_copy'); ?>;
        }
    </style>

<?php }

add_action('wp_head', 'control_customize_css');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function yatsyuk_customize_preview_js() {
	wp_enqueue_script( 'yatsyuk_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'yatsyuk_customize_preview_js' );
