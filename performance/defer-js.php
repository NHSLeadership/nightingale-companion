<?php
/**
 * Defer JS - force JS to load after other resources to stop it blocking visual elements being displayed.
 *
 * @package   nightingale-companion
 * @copyright NHS Leadership Academy, Nick Summerfield
 * @version   1.0 2nd June 2020
 */

/**
 * Defer JS to footer
 *
 * @param string $url javascript file being loaded.
 *
 * @return string $url Javascript file with defer tag added.
 */
function nightingale_companion_defer_parsing_js( $tag, $handle, $src ) {
	// Add the files to exclude from defer. Add jquery.js by default.
	$exclude_files = array( 'jquery', 'loadcss' ); //These are files we do not want to defer. Please add files here if needed
	// Bypass JS defer for logged in users.
	if ( ! in_array( $src, $exclude_files ) && ( ! is_user_logged_in() ) ) {
		$tag = '<script type="text/javascript" src="' . esc_url( $src ) . '" defer="defer" label="' . esc_url( $handle ) . '"></script>';
	}

	return $tag;

}

add_filter( 'script_loader_tag', 'nightingale_companion_defer_parsing_js', 10, 3 );
