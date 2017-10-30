<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package yatsyuk
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>



<?php
    if(get_theme_mod('jivo_chat_code')){
        echo get_theme_mod('jivo_chat_code');
    }
?>



<div id="page" class="site">
	<header id="masthead" class="site-header container-fluid <?php if(is_front_page()){
	    echo "front-header  minus-padding";
    }else echo "other-header"; ?>" role="banner">
        <div class="container  <?php if(is_front_page()){
        echo "front-header-wrapper";} ?>">
            <div class="row justify-content-center">

                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">



                        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <p class="site-title"><?php echo get_theme_mod('site_main_title'); ?></p>
                        <?php
                        wp_nav_menu( array(
                                'menu'              => 'menu-1',
                                'theme_location'    => 'primary',
                                'depth'             => 2,
                                'container'         => 'div',
                                'container_class'   => 'collapse navbar-collapse ',
                                'container_id'      => 'navbarNavAltMarkup',
                                'menu_class'        => 'navbar-nav row  justify-content-between',
                                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                'walker'            => new WP_Bootstrap_Navwalker())
                        );
                        ?>

                </nav>

            </div>
        </div>
        <?php
        if(is_front_page()){  ?>
            <section class="description-front container">
                <div class="row text-center">
                    <p class="col-12 custom-logo"><?php echo wp_get_attachment_image(get_theme_mod("logo"), '',false, array('class'=>'img-fluid')); ?></p>
                    <?php $description = get_bloginfo( 'description', 'display' );
                    if ( $description || is_customize_preview() ) { ?>
                        <h1 class="site-description col-12"><?php echo $description; /* WPCS: xss ok. */ ?></h1>
                        <?php
                    }
                    ?>
                    <?php if ( get_post_meta($post->ID, 'welcome-display', 1) ){ ?>

                        <h3 class="page-title col-12"><?php echo get_theme_mod('information_front'); ?></h3>
                        <?php } ?>
                    <?php $options = get_option( 'theme_settings' ); ?>
                    <p class="phone-wrapper col-12">
                        <?php if ($options['phone_kiiv']){ ?>
                            <span class="phone-item-front col-sm-12 col-md"><a href="tel:<?php echo $options['phone_kiiv']; ?>"><?php echo $options['phone_kiiv']; ?></a></span>
                        <?php } ?>
                        <?php if ($options['phone_life']){ ?>
                            <span class="phone-item-front col-sm-12 col-md"><a href="tel:<?php echo $options['phone_life']; ?>"><?php echo $options['phone_life']; ?></a></span>
                        <?php } ?>
                        <?php if ($options['phone_voda']){ ?>
                            <span class="phone-item-front col-sm-12 col-md"><a href="tel:<?php echo $options['phone_voda']; ?>"><?php echo $options['phone_voda']; ?></a></span>
                        <?php } ?>
                        <?php if ($options['phone_office']){ ?>
                            <span class="phone-item-front col-sm-12 col-md"><a href="tel:<?php echo $options['phone_office']; ?>"><?php echo $options['phone_office']; ?></a></span>
                        <?php } ?>
                    </p>

                </div>
            </section>

            <?php
        }
        ?>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
