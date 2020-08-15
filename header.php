<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package NerdMachina
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'nerdmachina' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="navbar navbar-top">
			<div class="navbar-inner">
				<div class="navbar-container">
					<div class="navbar-content">
						<div class="navbar-col">
							<?php get_template_part( 'components/navigation/social-navigation' ); ?>
						</div>
						<div class="navbar-col">
							<div class="navbar-brand">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_html( 'Homepage', 'nerdmachina' ); ?>" rel="home">
									<?php get_template_part( 'components/brand/nerdmachina-lg' ); ?>
								</a>
							</div>
						</div>
						<div class="navbar-col">
							<a class="donation-toggle" href="https://nerdmachina.com/apoie/">
								<?php echo nerdmachina_get_theme_svg( 'heart' ); ?>
								<span class="text-toggle"><?php esc_html_e( 'Apoie-nos', 'nerdmachina' ); ?></span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="navbar navbar-primary">
			<div class="navbar-inner">
				<div class="navbar-container">
					<div class="navbar-content">
						<div class="navbar-col">
							<button class="offcanvas-toggle">
								<?php echo nerdmachina_get_theme_svg( 'bars' ); ?>
								<span class="screen-reader-text"><?php esc_html_e( 'Menu', 'nerdmachina' ); ?></span>
							</button>

							<div class="navbar-brand">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_html( 'Homepage', 'nerdmachina' ); ?>" rel="home">
									<?php get_template_part( 'components/brand/nerdmachina-sm' ); ?>
								</a>
							</div>
						</div>
						<div class="navbar-col">
							<?php get_template_part( 'components/navigation/main-navigation' ); ?>
						</div>
						<div class="navbar-col">
							<button class="search-toggle">
								<?php echo nerdmachina_get_theme_svg( 'search' ); ?>
								<span class="screen-reader-text"><?php esc_html_e( 'Search', 'nerdmachina' ); ?></span>
							</button>
						</div>
					</div>
				</div>
			</div>
			<div class="site-search-wrap">
				<div class="site-search">
					<div class="container">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
		</div>

		<div class="navbar-dummy"></div>
	</header>

	<div class="site-content">
		<?php if ( is_archive() || is_search() ) : ?>
			<header class="page-header">
				<div class="page-header-container">
					<div class="page-header-inner">
						<?php if ( is_search() ) : ?>
							<span class="algolia-search">
								<?php echo nerdmachina_get_theme_svg( 'algolia' ); ?>
							</span>
							<h1 class="page-title">
								<?php echo get_search_query();?>
							</h1>
						<?php else : ?>
							<?php
							// Add special subtitles.
							if ( is_category() ) {
								$subtitle = esc_html__( 'Browsing Category', 'squaretype' );
							} elseif ( is_tag() ) {
								$subtitle = esc_html__( 'Browsing Tag', 'squaretype' );
							} else {
								$subtitle = '';
							}

							// Add a subtitle, wrapped in <p></p> if it exists.
							if ( $subtitle ) {
								?>
								<p class="page-subtitle title-block"><?php echo esc_html( $subtitle ); ?></p>
								<?php
							}

							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="archive-description">', '</div>' );
						?>
						<?php endif; ?>
					</div>
				</div>
			</header>
		<?php endif; ?>

		<div class="site-content-wrapper">
			<div class="site-content-container">
				<div class="site-content-inner">