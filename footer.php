<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package NerdMachina
 */

?>

		</div>
	</div>

	<footer id="colophon" class="site-footer">
		<div class="site-footer__inner">
			<div class="site-info">
				<p><?php get_template_part( 'components/header/site-branding' ); ?></p>
				<p><?php get_template_part( 'components/navigation/footer-navigation' ); ?></p>
				<p><?php echo nerdmachina_copyright(); ?> <?php printf( esc_html__( '%1$s - Conteúdo sob Creative Commons %2$s', 'nerdmachina' ), 'NerdMachina', '<a href="https://nerdmachina.com.br/direitos-do-conteudo">(Saiba mais)</a>' ); ?>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php get_template_part( 'components/modal/menu-modal' ); ?>

<?php wp_footer(); ?>

</body>
</html>
