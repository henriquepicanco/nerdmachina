<div id="menu-modal" class="menu-modal">
    <div class="menu-modal__header">
        <?php get_template_part( 'components/header/site-branding' ); ?>

        <button class="close-toggle" aria-controls="menu-modal" aria-expanded="false">
            <?php echo nerdmachina_get_theme_svg( 'cross' ); ?>
            <span class="screen-reader-text"><?php esc_html_e( 'Fechar menu', 'nerdmachina' ); ?></span>
        </button>
    </div>

    <?php get_template_part( 'components/navigation/main-navigation' ); ?>

    <?php get_template_part( 'components/navigation/social-navigation' ); ?>
</div>