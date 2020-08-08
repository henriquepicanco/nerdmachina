<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package NerdMachina
 */

get_header();
?>

	<div class="content-area">
		<main id="primary" class="site-main">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'components/post/content-single' );

				/**
				 * Posts navigation
				 */

				$nextPost = get_next_post();
				$prevPost = get_previous_post();

				$prevthumbnail150 = get_the_post_thumbnail_url($prevPost->ID, array( 'nerdmachina_archive_100x100' ) );
				$prevthumbnail = get_the_post_thumbnail_url($prevPost->ID, array( '' ) );

				$prevtitle = esc_html( 'Post anterior', 'nerdmachina' );
				$nexttitle = esc_html( 'Próximo post', 'nerdmachina' );

				$nextthumbnail = get_the_post_thumbnail_url($nextPost->ID, array( 'nerdmachina_archive_100x100' ) );
				$nextthumbnail100 = get_the_post_thumbnail_url($nextPost->ID, array( '' ) );


				the_post_navigation(
					array(
						'prev_text' => '
							<div id="post-previous" class="post-previous">
								<div class="post-outer">
									<div class="post-inner">
										<div class="entry-media">
											<picture>
												<source srcset="' . $prevthumbnail150 . '" media="(min-width: 0)">
                            					<img src="' . $prevthumbnail . '" alt="%title">
											</picture>
										</div>
									</div>
									<div class="post-inner">
										<span class="tag">' . $prevtitle . '</span>
										<h5 class="entry-title">%title</h5>
									</div>
								</div>
							</div>
						',
						'next_text' => '
							<div id="post-next" class="post-next">
								<div class="post-outer">
									<div class="post-inner">
										<div class="entry-media">
											<picture>
												<source srcset="' . $nextthumbnail150 . '" media="(min-width: 0)">
                            					<img src="' . $nextthumbnail . '" alt="%title">
											</picture>
										</div>
									</div>
									<div class="post-inner">
										<span class="tag">' . $nexttitle . '</span>
										<h5 class="entry-title">%title</h5>
									</div>
								</div>
							</div>
						',
					)
				);

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div>

<?php
get_footer();
