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
    <meta lang="ru">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'yatsyuk' ); ?></a>

	<header id="masthead" class="site-header container-fluid <?php if(is_front_page()){
	    echo "front-header";
    }else echo "other-header"; ?>" role="banner">
        <div class="container  <?php if(is_front_page()){
        echo "front-header-wrapper";} ?>">
            <div class="row justify-content-center">

                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">

                        <p class="site-title navbar-brand"><?php bloginfo( 'name' ); ?></p>

                        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <?php
                        wp_nav_menu( array(
                                'menu'              => 'menu-1',
                                'theme_location'    => 'primary',
                                'depth'             => 2,
                                'container'         => 'div',
                                'container_class'   => 'collapse navbar-collapse col-12',
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
                    <ul class="phone-wrapper col-12">
                        <?php if ($options['phone_kiiv']){ ?>
                            <li class="phone-item-front"><?php echo $options['phone_kiiv']; ?></li>
                        <?php } ?>
                        <?php if ($options['phone_life']){ ?>
                            <li class="phone-item-front"><?php echo $options['phone_life']; ?></li>
                        <?php } ?>
                        <?php if ($options['phone_voda']){ ?>
                            <li class="phone-item-front"><?php echo $options['phone_voda']; ?></li>
                        <?php } ?>
                        <?php if ($options['phone_office']){ ?>
                            <li class="phone-item-front"><?php echo $options['phone_office']; ?></li>
                        <?php } ?>
                    </ul>

                </div>
            </section>
            <?php
        }
        ?>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
