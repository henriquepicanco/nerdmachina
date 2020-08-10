<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NerdMachina
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-outer">
        <div class="post-inner">
            <?php nerdmachina_post_thumbnail(); ?>
        </div>

        <div class="post-inner">
            <header class="entry-header">
                <?php
                if ( 'post' === get_post_type() ) {
                    /* translators: used between list items, there is a space after the comma */
                    $categories_list = get_the_category_list( esc_html__( ', ', 'nerdmachina' ) );
                    if ( $categories_list ) {
                        /* translators: 1: list of categories. */
                        printf( '<span class="cat-links">%1$s</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                    }
                }
                ?>

                <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
            </header>

            <div class="entry-content">
                <?php the_excerpt(); ?>
           </div>
        </div>
    </div>
</article>
