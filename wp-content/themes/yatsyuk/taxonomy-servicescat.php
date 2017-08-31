<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package control
 */

get_header();
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
?>

    <div id="primary" class="content-area container-fluid">
        <div class="container">


            <div class="row">

                <main id="main" class="site-main col-sm-9" role="main">
                    <div class="row">
                        <header class="entry-header container">
                            <h1 class="entry-title tax-title"> <?php $terms = get_the_terms( $post->ID, 'servicescat' );
                                if( $terms ){
                                    $term = array_shift( $terms );
                                }
                                // теперь можно можно вывести название термина
                                echo $term->name; ?>
                            </h1>
                            <p class="tax-description">
                                <?php echo $term->description; ?>
                            </p>
                        </header>

                        <?php
                            if ( have_posts() ) : ?>
                                <ul class="list-unstyled cases-list">
                                    <?php  while ( have_posts() ) : the_post(); ?>

                                    <li>
                                        <p class="post-publish-date"><span><?php the_date(); ?></span></p>
                                        <div class="media cases-item">

                                            <?php the_post_thumbnail(array(96, 96), array(
                                                'class' => "d-flex mr-3",
                                                'alt' => 'photo')); ?>
                                            <div class="media-body cases-wrap">
                                                <h3 class="mt-0 mb-1">
                                                    <a href="<?php echo get_permalink(); ?>"><?php the_title();?></a>
                                                </h3>
                                                <?php
                                                the_excerpt(); ?>
                                            </div>
                                        </div>
                                    </li>

                               <?php endwhile; ?>

                                </ul>
                         <?php    else :
                                get_template_part( 'template-parts/content', 'none' );
                            endif;
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
get_footer();
