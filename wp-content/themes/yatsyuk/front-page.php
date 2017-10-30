<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package yatsyuk
 */

get_header(); ?>

    <?php if (get_theme_mod('content_front_hide')): ?>
        <section class="front-content">
            <div id="primary" class="content-area">
                <main id="main" class="main container-fluid front-content" role="main">

                    <?php
                    while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/content', 'front' );

                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;

                    endwhile; // End of the loop.
                    ?>
                    <p class="front-link-wrapper"><a class="front-link" href="<?php echo get_post_meta($post->ID, 'welcome-link', 1);?>" target="_blank"><?php echo get_post_meta($post->ID, 'welcome-link-text', 1);?></a></p>
                </main><!-- #main -->
            </div><!-- #primary -->
        </section>
        <?php endif; ?>
<?php

get_footer();
