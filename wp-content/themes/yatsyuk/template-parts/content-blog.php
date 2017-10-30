<?php
/**
 * Template part for displaying page content in home.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package yatsyuk
 */

?>

    <?php
    global $wp_query;
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    // display cases
        if (! is_home()){
            $args = array(
                'post_type' => 'cases',
                'paged' => $paged,
            );
            $tax_query = new WP_Query($args); ?>
            <ul class="list-unstyled cases-list col-12 minus-padding">
           <?php
           while ($tax_query->have_posts() ) : $tax_query->the_post(); ?>

                <li>
                    <p class="circumstances"><?php echo get_theme_mod('circumstances_text'); ?></p>
                    <div class="media cases-item">

                        <?php the_post_thumbnail( array(96, 96), array(
                            'class' => "d-flex mr-3",
                            'alt' => 'photo')); ?>
                        <div class="media-body cases-wrap">
                            <h3 class="mt-0 mb-1">
                                <a class="heading-link" href="<?php echo get_permalink(); ?>"><?php the_title();?></a>
                            </h3>
                            <?php
                            the_excerpt(); ?>
                            <p class="cases-date"><?php the_date(); ?></p>
                        </div>

                    </div>
                </li>
                <?php endwhile; ?>
            </ul>

            <?php wp_reset_postdata();
            // пагинация для произвольного запроса
            $big = 999999999; // уникальное число

            echo paginate_links( array(
                'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format'  => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total'   => $tax_query->max_num_pages,
                'prev_next'    => false,
                'type'         => 'list',
            ) );
        }else{ ?>
            <ul class="list-unstyled cases-list col-12 minus-padding">

           <?php while ( have_posts() ) : the_post();?>

                <li>
                    <p class="post-publish-date"><span><?php the_time(); ?></span></p>
                    <div class="media cases-item">

                        <?php the_post_thumbnail(array(96, 96), array(
                            'class' => "d-flex mr-3",
                            'alt' => 'photo')); ?>
                        <div class="media-body cases-wrap">
                            <h3 class="mt-0 mb-1">
                                <a class="heading-link" href="<?php echo get_permalink(); ?>"><?php the_title();?></a>
                            </h3>
                            <?php
                            the_excerpt(); ?>
                        </div>

                    </div>
                </li>

    <?php endwhile; ?>
            </ul>
<?php
            // пагинация для произвольного запроса
            $big = 999999999; // уникальное число

            echo paginate_links( array(
                'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format'  => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total'   => $wp_query->max_num_pages,
                'prev_next'    => false,
                'type'         => 'list',
            ) );
        }

    ?>



