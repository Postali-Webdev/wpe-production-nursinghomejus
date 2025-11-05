<?php
/**
 * Search form.
 *
 * @package Postali Parent
 * @author Postali LLC
 */

// Since we can have multiple search forms per page we should generate a unique element ID.
$search_input_id = sprintf( 'search-input-%s', uniqid() );

?>

<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search" role="search">
	<label for="<?php echo esc_attr( $search_input_id ); ?>" class="screen-reader-text">
		<?php esc_html_e( 'Search for:', 'postali' ); ?>
	</label>
	<input type="text" name="s" placeholder="Search" id="<?php echo esc_attr( $search_input_id ); ?>" value="<?php the_search_query(); ?>" />
	<button type="submit" value="<?php echo esc_attr__( 'Search', 'postali' ); ?>">
		<?php esc_html_e( 'Search', 'postali' ); ?>
	</button>
</form><!-- form.search -->
