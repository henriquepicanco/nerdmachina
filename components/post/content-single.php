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
        
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

        <div class="entry-summary">
            <?php the_excerpt(); ?>
        </div>
        
        <div class="entry-meta">
            <?php
            nerdmachina_posted_on();
            nerdmachina_posted_by();
            ?>
        </div>
    </header><!-- .entry-header -->
    
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="entry-media">
            <picture>
                <source srcset="<?php the_post_thumbnail_url( 'nerdmachina_single_400x225' ); ?>" media="(min-width: 0) and (max-width: 399px)">
                <source srcset="<?php the_post_thumbnail_url( 'nerdmachina_single_800x450' ); ?>" media="(min-width: 400px) and (max-width: 799px)">
                <source srcset="<?php the_post_thumbnail_url( 'nerdmachina_single_1024x576' ); ?>" media="(min-width: 800px)">
                <img src="<?php the_post_thumbnail_url( 'thumbnail' ); ?>" alt="<?php the_title(); ?>">
            </picture>
        </div>
    <?php endif; ?>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'nerdmachina' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nerdmachina' ),
				'after'  => '</div>',
			)
		);
		?>
    </div><!-- .entry-content -->
    

    <footer class="entry-footer">
        <?php
        
        // Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'nerdmachina' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
                printf( '<span class="tags-links">' . esc_html__( '%1$s', 'nerdmachina' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}
        
        ?>

        <?php get_template_part( 'components/content/share-buttons' ); ?>
    </footer>
</article><!-- #post-<?php the_ID(); ?> -->
