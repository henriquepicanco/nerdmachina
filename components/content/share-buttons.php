<?php
$title   = rawurlencode( html_entity_decode( get_the_title(), ENT_COMPAT, 'UTF-8' ) );
$picture = ( has_post_thumbnail() ) ? '&picture= ' . get_the_post_thumbnail_url() : null;

// Generate the Facebook URL.
$facebook_url = '
	https://www.facebook.com/sharer/sharer.php?
	u=' . get_the_permalink() . '
	&title=' . $title .
	$picture;
?>

<div class="entry-share">
    <ul class="entry-share__inner">
        <li class="share-buttons share-twitter">
            <a class="share-icon share-icon--twitter" href="http://twitter.com/share?text=<?php echo esc_attr( $title ); ?>&nbsp;—&url=<?php the_permalink(); ?>&via=nerdmachina" target="_blank">
                <span class="screen-reader-text"><?php echo esc_html__( 'Compartilhe no Twitter', 'tabor' ); ?></span>
                <?php echo nerdmachina_get_theme_svg( 'twitter' ); ?>
            </a>
        </li>
        <li class="share-buttons share-facebook">
            <a class="share-icon share-icon--facebook" href="<?php echo esc_url( $facebook_url ); ?>" target="_blank">
                <span class="screen-reader-text"><?php echo esc_html__( 'Compartilhe no Facebook', 'tabor' ); ?></span>
                <?php echo nerdmachina_get_theme_svg( 'facebook' ); ?>
            </a>
        </li>
    </ul>
</div>