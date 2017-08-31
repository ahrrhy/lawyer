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
}
add_action( 'customize_register', 'yatsyuk_customize_register' );

function control_custom_header_settings ($wp_customize){
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
        'default' => '#d90c00',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'control_border_color_control', array(
        'label' => __('Border and Hover Color', 'yatsuyk'),
        'section' => 'control_custom_header_settings_section',
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
        'width' => '2380',
        'height' => '1770'
    )));

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
}
add_action( 'customize_register', 'control_custom_header_settings' );

function control_customize_css() {

    global $post;
    if ( $post->post_name == home ) { ?>
        <style type="text/css">
            body{
                background: url("<?php echo wp_get_attachment_url(get_theme_mod('background_front')); ?>") center/cover no-repeat scroll;
            }
            @media screen and (min-width: 768px){
                body{
                    background: url("<?php echo wp_get_attachment_url(get_theme_mod('background_front')); ?>") left top/cover no-repeat scroll;
                }
            }
        </style>
        <?php
    } ?>
    <style type="text/css">
        .front-header{
            background: url("<?php echo wp_get_attachment_url(get_theme_mod('banner_front')); ?>") center/cover no-repeat;
        }
        .other-header{
            background: url("<?php echo wp_get_attachment_url(get_theme_mod('banner_other')); ?>") center/cover no-repeat;
        }
        .navbar .navbar-nav a, .navbar-light .site-title, .site-description, .phone-wrapper, .page-title{
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
