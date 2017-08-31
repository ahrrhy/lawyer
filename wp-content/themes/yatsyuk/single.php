<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package yatsyuk
 */

get_header(); ?>

	<div id="primary" class="content-area container-fluid">
        <div class="container">
            <div class="row">

                <main id="main" class="site-main col-sm-9 single" role="main">
                    <div class="row">

                            <?php
                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/content', get_post_format() );




                            endwhile; // End of the loop.
                            ?>


                    </div>

                </main><!-- #main -->
                <?php
                get_sidebar();
                ?>
            </div>
        </div>
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
