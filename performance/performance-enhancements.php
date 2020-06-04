<?php
/**
 * Performance tweaks to improve load times and overall performance of site.
 *
 * @package nightingale-companion
 * @copyright NHS Leadership Academy, Nick Summerfield
 * @version 1.0 2nd June 2020
 */
// load css stuff.
if  ( ( isset( $nightingale_companion_options['load_css_1'] ) )&& ($nightingale_companion_options['load_css_1'] === 'load_css_1' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'loadcss.php' );
}

// instantpage stuff.
if  ( ( isset( $nightingale_companion_options['instantpage_2'] ) )&& ($nightingale_companion_options['instantpage_2'] === 'instantpage_2' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'instantpage.php' );
}

// defer JS loading to footer.
if  ( ( isset( $nightingale_companion_options['defer_js_3'] ) )&& ($nightingale_companion_options['defer_js_3'] === 'defer_js_3' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'deferjs.php' );
}

// set cache headers.
	require_once( plugin_dir_path( __FILE__ ) . 'cacheheaders.php' );


// disableemojis.
if  ( ( isset( $nightingale_companion_options['disable_emojis_6'] ) )&& ($nightingale_companion_options['disable_emojis_6'] === 'disable_emojis_6' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'disable_emojis.php' );
}


// cleanup WP headers.
if  ( ( isset( $nightingale_companion_options['cleanup_wp_header_7'] ) )&& ($nightingale_companion_options['cleanup_wp_header_7'] === 'cleanup_wp_header_7' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'clean_wp_headers.php' );
}
