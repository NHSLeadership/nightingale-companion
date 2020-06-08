<?php
/**
 * Load CSS - asynchronously load in css resources.
 *
 * @package nightingale-companion
 * @copyright NHS Leadership Academy, Nick Summerfield
 * @version 1.0 2nd June 2020
 */

/**
 * Load in the loadcss javascript file to header inline.
 */
function nightingale_load_css() {
	wp_register_script( 'loadcss', plugins_url( 'js/loadcss.js', __FILE__ ), array(), '02062020', false ); // Register loadCSS javascript function.
	wp_enqueue_script( 'loadcss', plugins_url( 'js/loadcss.js', __FILE__ ), array(), '02062020', false ); // Queue it up.

}

add_action( 'wp_head', 'nightingale_load_css', 1 );
add_action( 'login_head', 'nightingale_load_css', 1 );


/**
 * Run all css includes through loadcss function.
 *
 * @param string $html full string of original declaration.
 * @param string $handle unique identifier.
 * @param string $href precise link of stylesheet.
 *
 * @return string
 */
function nightingale_loadcss_files( $html, $handle, $href ) {
	if ( $html ) {
		if ( is_admin() ) {
			return $html;
		}
		$dom = new DOMDocument();
		$dom->loadHTML( $html );
		$a = $dom->getElementById( $handle . '-css' );
		if ( ! empty( $a ) ) {
			return "<script>loadCSS('" . $a->getAttribute( 'href' ) . "',0,'" . $a->getAttribute( 'media' ) . "');</script>\n";
		}
	}
}

add_filter( 'style_loader_tag', 'nightingale_loadcss_files', 9999, 3 );


// Down and dirty trick to load scripts BEFORE css to make loadCSS work properly.
remove_action( 'wp_head', 'wp_print_styles', 8 );
add_action( 'wp_footer', 'wp_print_styles', 10 );
