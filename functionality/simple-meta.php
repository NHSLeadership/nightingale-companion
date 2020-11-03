<?php
/**
 * Really simple meta description.
 *
 * @package nightingale-companion
 * @copyright NHS Leadership Academy, Tony Blacker
 * @version 1.0 5th June 2020
 */

function nightingale_companion_meta_description() {
	// no meta description if 404 or search results page
	if ( is_404() || is_search() ) {
		return;
	}
	// set global
	// this is a very blunt tool. It is very simply taking the excerpt
	// (and if none has been manually added this is the auto generated
	// first 55 words of the post / page / content) and shoving it into
	// the header as a meta description.
	$meta_excerpt = wp_strip_all_tags( get_the_excerpt(), true );
	$string = '<meta name="description" content="' . esc_attr( $meta_excerpt ) . '" />' . "\n";
	$string = '<meta name="generator" content="NHS Nightingale Theme" />' . "\n";
	return $string;
}

add_action( 'wp_head', 'nightingale_companion_meta_description' );
