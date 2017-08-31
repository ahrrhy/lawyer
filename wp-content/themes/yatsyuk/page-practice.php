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

    <div id="primary" class="content-area container-fluid">
        <div class="container">
            <div class="row">

                <main id="main" class="site-main home-main col-sm-9" role="main">

                    <?php
                    the_title( '<h1 class="entry-title">', '</h1>' );
                    ?>

                    <div class="container">
                        <div class="row">

                            <?php
                            if ( have_posts() ) :

                                get_template_part( 'template-parts/content', 'blog' );

                                // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                                endif;

                            else :
                                get_template_part( 'template-parts/content', 'none' );
                            endif;
                            ?>


                        </div>
                    </div>

                </main><!-- #main -->
                <?php
                get_sidebar();
                ?>
            </div>
        </div>
    </div><!-- #primary -->

<?php

get_footer();
