<?php
/*
 *  To show/hide post author on individual posts.
 *
 * @copyright NHS Leadership Academy, Tony Blacker
 * @version   1.0 22nd October 2019
 * @package   Nightingale
 */


/**
 *  To hide author name from single post page
 *
 */
if ( ( isset( $nightingale_companion_options[ 'hide_author_name' ] ) ) && ( $nightingale_companion_options[ 'hide_author_name' ] === 'on' ) ) {
	add_action( 'wp_head', 'nightingale_companion_hide_post_author' );
	function nightingale_companion_hide_post_author() {
		?>
        <style>

        </style><?php
	}
}
/**
 * To hide post date from posts
 */
if ( ( isset( $nightingale_companion_options[ 'hide_post_date' ] ) ) && ( $nightingale_companion_options[ 'hide_post_date' ] === 'on' ) ) {
	add_action( 'wp_head', 'nightingale_companion_hide_post_date' );

	function nightingale_companion_hide_post_date() {
		?>
		<style>
			.entry-date {
				display : none !important;
			}
		</style><?php
	}
}

?>
