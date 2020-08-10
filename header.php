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
		<div class="site-header-main">
			<div class="site-header__inner">
				<div class="site-header__inner-wrapper">
					<div class="site-header__content">
						<button class="menu-toggle desktop-toggle" aria-controls="menu-modal" aria-expanded="false">
							<?php echo nerdmachina_get_theme_svg( 'bars' ); ?>
							<span class="toggle-text"><?php esc_html_e( 'Menu', 'nerdmachina' ); ?></span>
						</button>

						<button class="search-toggle desktop-toggle" aria-controls="search-modal" aria-expanded="false">
							<?php echo nerdmachina_get_theme_svg( 'search' ); ?>
							<span class="toggle-text"><?php esc_html_e( 'Pesquisar', 'nerdmachina' ); ?></span>
						</button>
					</div>

					<div class="site-header__content">
						<button class="menu-toggle mobile-toggle" aria-controls="menu-modal" aria-expanded="false">
							<?php echo nerdmachina_get_theme_svg( 'bars' ); ?>
							<span class="screen-reader-text"><?php esc_html_e( 'Abrir menu', 'nerdmachina' ); ?></span>
						</button>

						<?php get_template_part( 'components/header/site-branding' ); ?>

						<button class="search-toggle mobile-toggle" aria-controls="search-modal" aria-expanded="false">
							<?php echo nerdmachina_get_theme_svg( 'search' ); ?>
							<span class="screen-reader-text"><?php esc_html_e( 'Abrir busca', 'nerdmachina' ); ?></span>
						</button>
					</div>

					<div class="site-header__content">
						<?php get_template_part( 'components/navigation/social-navigation' ); ?>

						<a class="donation-toggle" href="https://nerdmachina.com/apoie/">
							<span class="text-toggle"><?php esc_html_e( 'Apoie-nos', 'nerdmachina' ); ?></span>
						</a>
					</div>
				</div>
			</div>

			<?php get_template_part( 'components/modal/search-modal' ); ?>
		</div>
	</header>

	<div class="site-content">
		<?php if ( is_archive() || is_search() ) : ?>
			<header class="page-header">
				<div class="page-header__inner">
					<div class="page-header__inner-wrapper">
						<?php if ( is_search() ) : ?>
							<span class="algolia-search">
								<?php echo nerdmachina_get_theme_svg( 'algolia' ); ?>
							</span>
							<h1 class="page-title">
								<?php echo get_search_query();?>
							</h1>
						<?php else : ?>
							<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="archive-description">', '</div>' );
						?>
						<?php endif; ?>
					</div>
				</div>
			</header>
		<?php endif; ?>

		<div class="site-content__inner">