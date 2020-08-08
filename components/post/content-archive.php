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
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="entry-media">
                    <a href="<?php the_permalink(); ?>" rel="bookmark">
                        <picture>
                            <source srcset="<?php the_post_thumbnail_url( 'nerdmachina_archive_100x100' ); ?>" media="(min-width: 0) and (max-width: 767px)">
                            <source srcset="<?php the_post_thumbnail_url( 'nerdmachina_archive_300x300' ); ?>" media="(min-width: 768px)">
                            <img src="<?php the_post_thumbnail_url( 'thumbnail' ); ?>" alt="<?php the_title(); ?>">
                        </picture>
                    </a>
                </div>
            <?php endif; ?>
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
