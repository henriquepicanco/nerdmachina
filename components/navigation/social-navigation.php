<nav id="social-navigation" class="social-navigation">
    <ul class="social-menu">
        <?php
        wp_nav_menu(
            array(
                'theme_location'  => 'social',
                'container'       => '',
                'container_class' => '',
                'items_wrap'      => '%3$s',
                'menu_id'         => '',
                'menu_class'      => '',
                'depth'           => 1,
                'link_before'     => '<span class="screen-reader-text">',
                'link_after'      => '</span>',
                'fallback_cb'     => '',
            )
        );
        ?>
    </ul>
</nav>