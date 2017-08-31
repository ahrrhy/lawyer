<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package yatsyuk
 */

?>

<article class="container" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
    <div class="row justify-content-center">
        <div class="entry-content col-sm-8 text-center">
            <?php
            the_content();

            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'yatsyuk' ),
                'after'  => '</div>',
            ) );
            ?>
        </div><!-- .entry-content -->
    </div>
</article><!-- #post-## -->
