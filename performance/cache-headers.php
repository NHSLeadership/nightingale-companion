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
	if ( get_current_user_id() ) {
		//bust the cache so logged in users can see the admin bar and any content edits easily
			$headers[ 'Cache-Control' ] = 'no-store, no-cache, must-revalidate, max-age=0';
			$headers[ 'Expires' ] = '01 Jan 2000 00:00:00 GMT';
			$headers[ 'Pragma' ] = 'no-cache';
	} else {
		// var_dump($headers); #=> if you want to see the current headers...
		$cacheduration = $nightingale_companion_options[ 'browser_cache' ];
					$headers[ 'Cache-Control' ] = 'max-age=' . $cacheduration; // 12 hours.
	}
	return $headers;
}

add_filter( 'wp_headers', 'nightingale_companion_add_header_cache' );
