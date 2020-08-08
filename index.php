<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NerdMachina
 */

get_header();
?>

	<div class="content-area">
		<main id="primary" class="site-main">

			<?php
			if ( have_posts() ) :

				if ( is_home() && ! is_front_page() ) :
					?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
					<?php
				endif;
				?>

				<div class="site-main__inner">
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
						get_template_part( 'components/post/content-archive' );

					endwhile;
					?>
				</div>

				<?php
				the_posts_pagination(
					array(
						'prev_text'          => nerdmachina_get_theme_svg( 'arrow-left' ) . '<span class="screen-reader-text">' . __( 'Página anterior', 'nerdmachina' ) . '</span>',
						'next_text'          => '<span class="screen-reader-text">' . __( 'Próxima página', 'nerdmachina' ) . '</span>' . nerdmachina_get_theme_svg( 'arrow-right' ),
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Página', 'nerdmachina' ) . ' </span>',
					)
				);

				printf( '<div class="load-more-posts"><button class="load-more">%1$s</button></div>', esc_html__( 'Carregar mais', 'nerdmachina' ) );

			else :

				get_template_part( 'components/post/content-none' );

			endif;
			?>

		</main><!-- #main -->
	</div>

<?php
get_sidebar();
get_footer();
