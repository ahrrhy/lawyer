<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package yatsyuk
 */

?>
<ul class="list-unstyled cases-list">
    <?php while ( have_posts() ) : the_post();?>
        <li class="media cases-item">
            <?php the_post_thumbnail('medium', array(
                'class' => "d-flex mr-3",
                'alt' => 'photo')); ?>
            <div class="media-body cases-wrap">
                <h3 class="mt-0 mb-1">
                    <a href="<?php echo get_permalink(); ?>"><?php the_title();?></a>
                </h3>
                <?php
                the_excerpt(); ?>
            </div>
        </li>
    <?php endwhile; ?>
</ul>

