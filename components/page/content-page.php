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
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header>
    
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

		<?php the_content(); ?>

    </div>
</article>