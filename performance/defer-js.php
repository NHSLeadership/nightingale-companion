<?php
/**
 * Defer JS - force JS to load after other resources to stop it blocking visual elements being displayed.
 *
 * @package nightingale-companion
 * @copyright NHS Leadership Academy, Nick Summerfield
 * @version 1.0 2nd June 2020
 */

/**
 * Defer JS to footer
 *
 * @param string $url javascript file being loaded.
 *
 * @return string $url Javascript file with defer tag added.
 */
function nightingale_defer_parsing_js( $url ) {
	// Add the files to exclude from defer. Add jquery.js by default.
	$exclude_files = array( 'jquery', 'loadcss' );
	// Bypass JS defer for logged in users.
	if ( ! is_user_logged_in() ) {
		if ( false === strpos( $url, '.js' ) ) {
			return $url;
		}

		foreach ( $exclude_files as $file ) {
			if ( strpos( $url, $file ) ) {
				return $url;
			}
		}
	} else {
		return $url;
	}

	return "$url' defer='defer";

}

add_filter( 'clean_url', 'nightingale_defer_parsing_js', 11, 1 );
