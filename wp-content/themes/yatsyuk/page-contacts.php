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

    <div id="primary" class="content-area <?php global $post;
                                                        $post_slug=$post->post_name;
                                                        echo $post_slug; ?>">
        <main id="main" class="site-main container-fluid <?php if (is_page('price')){ echo 'price'; } ?>" role="main">

            <div class="container">
                <?php
                the_title( '<h1 class="entry-title">', '</h1>' );
                ?>
                <div class="row">

                    <?php
                    while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/content', 'page' );

                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;

                    endwhile; // End of the loop.
                    ?>


                </div>


                <section class="acf-address row">

                    <div class="col-md-3">

                        <h3 class="acf-header"><?php the_field('our_address'); ?></h3>

                        <ul class="acf-address-contacts">

                            <?php
                            $acf_city_address = get_field('acf_city_address');
                            $acf_street_address = get_field('acf_street_address');
                            $acf_post_index = get_field('acf_post_index');
                            ?>
                            <li><?php
                                if(!empty($acf_city_address)){
                                    the_field('acf_city_address');
                                }
                                ?></li>
                            <li><?php
                                if(!empty($acf_street_address)){
                                    the_field('acf_street_address');
                                }
                                ?></li>
                            <li><?php
                                if(!empty($acf_post_index)){
                                    the_field('acf_post_index');
                                }
                                ?></li>
                        </ul>


                        <h3 class="acf-header"><?php the_field('our_phones'); ?></h3>
                        
                        <ul class="acf-address-contacts">
                            <?php
                                $acf_kiyvstar = get_field('acf_kiyvstar');
                                $acf_life = get_field('acf_life');
                                $acf_vodafon = get_field('acf_vodafon');
                                $acf_office = get_field('acf_office');
                            ?>
                            <li><?php
                                if(!empty($acf_kiyvstar)){
                                    the_field('acf_kiyvstar');
                                }
                                 ?></li>
                            <li><?php
                                if(!empty($acf_kiyvstar)){
                                   the_field('acf_life');
                                }
                                ?></li>
                            <li><?php
                                if(!empty($acf_kiyvstar)){
                                    the_field('acf_vodafon');
                                } ?></li>
                            <li><?php
                                if(!empty($acf_kiyvstar)){
                                    the_field('acf_office');
                                } ?></li></li>
                        </ul>
                    </div>

                   <div class="col-md-9">

                       <h3 class="acf-header"><?php the_field('how_to_come'); ?></h3>
                       <?php

                       $location = get_field('google_maps');

                       if( !empty($location) ):
                           ?>
                           <div class="acf-map">
                               <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                           </div>
                       <?php endif; ?>

                   </div>

                </section>
            </div>


        </main><!-- #main -->
    </div><!-- #primary -->




<?php
get_footer();
