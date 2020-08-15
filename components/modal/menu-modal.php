<div id="menu-modal" class="menu-modal">
    <div class="menu-modal__header">
        <div class="navbar-brand">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_html( 'Homepage', 'nerdmachina' ); ?>" rel="home">
                <?php get_template_part( 'components/brand/nerdmachina-sm' ); ?>
            </a>
        </div>

        <button class="close-toggle" aria-controls="menu-modal" aria-expanded="false">
            <?php echo nerdmachina_get_theme_svg( 'cross' ); ?>
            <span class="screen-reader-text"><?php esc_html_e( 'Fechar menu', 'nerdmachina' ); ?></span>
        </button>
    </div>

    <?php get_template_part( 'components/navigation/mobile-navigation' ); ?>

    <?php get_template_part( 'components/navigation/social-navigation' ); ?>
</div>