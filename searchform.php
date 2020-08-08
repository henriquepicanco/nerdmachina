<?php
/**
 * Template for displaying search forms in NerdMachina
 *
 * @package WordPress
 * @subpackage NerdMachina
 * @since NerdMachina 1.0
 * @version 1.0
 */

?>

<?php $unique_id = esc_attr( nerdmachina_unique_id( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo $unique_id; ?>">
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'nerdmachina' ); ?></span>
	</label>
	<input type="search" id="<?php echo $unique_id; ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Digite seus termos de busca e tecle ENTER', 'placeholder', 'nerdmachina' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit"><?php echo nerdmachina_get_theme_svg( 'search' ); ?><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'nerdmachina' ); ?></span></button>
</form>
