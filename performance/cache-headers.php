<?php
/**
 * Cache Headers - set http headers to force browsers to cache locally.
 *
 * @package nightingale-companion
 * @copyright NHS Leadership Academy, Nick Summerfield
 * @version 1.0 2nd June 2020
 */

/*
 * Modify HTTP header to add a 12 hour browser cache instruction.
 */
function nightingale_companion_add_header_cache( $headers ) {
	global $nightingale_companion_options;
	// var_dump($headers); #=> if you want to see the current headers...
	$cacheduration = $nightingale_companion_options['browser_cache'];
	if ( ! is_admin() ) {
		$headers['Cache-Control'] = 'max-age=' . $cacheduration; // 12 hours.
	}

	return $headers;
}

add_filter( 'wp_headers', 'nightingale_companion_add_header_cache' );
