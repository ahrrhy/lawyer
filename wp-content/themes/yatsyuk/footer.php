<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package yatsyuk
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer container-fluid" role="contentinfo">

        <div class="row">

            <div class="container">
                <div class="row">

                    <address class="contact-info col-sm-6">
                        <p class="contact-info-header">
                            <span><?php echo get_theme_mod('contacts_footer'); ?></span>
                        </p>
                        <div class="row">
                                <ul class="contact-list col-sm-5">
                                    <?php $options = get_option( 'theme_settings' ); ?>
                                    <li class="address-item">
                                        <?php if (! empty($options)){
                                            echo $options['street_address'];
                                        } ?>
                                    </li>
                                    <li class="address-item">
                                        <?php if (! empty($options)){
                                            echo $options['city_address'];
                                        } ?>
                                    </li>
                                    <li class="address-item">
                                        <?php if (! empty($options)){
                                            echo $options['post_address'];
                                        } ?>
                                    </li>
                                </ul>
                                <ul class="contact-list-phone col-sm-7">
                                    <?php if ($options['phone_kiiv']){ ?>
                                        <li class="phone-item"><?php echo $options['phone_kiiv']; ?></li>
                                    <?php } ?>
                                    <?php if ($options['phone_life']){ ?>
                                        <li class="phone-item"><?php echo $options['phone_life']; ?></li>
                                    <?php } ?>
                                    <?php if ($options['phone_voda']){ ?>
                                        <li class="phone-item"><?php echo $options['phone_voda']; ?></li>
                                    <?php } ?>
                                    <?php if ($options['phone_office']){ ?>
                                        <li class="phone-item"><?php echo $options['phone_office']; ?></li>
                                    <?php } ?>
                                    <?php if ($options['contact_mail']){ ?>
                                        <li class="mail-item"><?php echo $options['contact_mail']; ?></li>
                                    <?php } ?>

                                </ul>
                        </div>


                    </address><!-- .site-info -->
                    <section class="col-sm-6">
                            <h4 class="contact-info-header"><span><?php echo get_theme_mod('how_to_footer'); ?></span>
                            </h4>
                            <?php

                            $location = get_theme_mod('maps_footer');

                            if (!empty($location)):
                                ?>
                                <div class="acf-map">
                                    <?php echo $location; ?>
                                </div>
                            <?php endif;
                         ?>
                    </section>
                </div>
            </div>
            <div id="copyright" class="copyright col-12">
                <div class="container">
                    <div class="row">
                        <?php
                        //получение опций темы
                        $options = get_option( 'theme_settings' ); ?>
                        <?php if($options['footer']) { // выводим то что написал пользователь?>
                            <p><?php echo $options['footer']; ?></p>
                        <?php } else { // или текст по умолчанию ?>
                            <p>&copy; <?php echo date('Y'); ?> <a href="<?php bloginfo( 'url' ) ?>/" title="<?php bloginfo( 'name' ) ?>"><?php bloginfo( 'name' ) ?></a>. Усі права захищені. Використання матеріалів дозволяється тільки з використанням посилання на джерело</p>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->


<?php wp_footer(); ?>

</body>
</html>
