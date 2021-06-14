<?php
/**
 * Performance tweaks to improve load times and overall performance of site.
 *
 * @package   nightingale-companion
 * @copyright NHS Leadership Academy, Nick Summerfield
 * @version   1.0 2nd June 2020
 */
// instantpage stuff.
if ( ( isset( $nightingale_companion_options[ 'instantpage' ] ) ) && ( $nightingale_companion_options[ 'instantpage' ] === 'on' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'instantpage.php' );
}


// set cache headers.
if  ( ( isset( $nightingale_companion_options[ 'browser_cache' ] ) ) && ( $nightingale_companion_options[ 'browser_cache' ] > 0 ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'cache-headers.php' );
}

// disableemojis.
if ( ( isset( $nightingale_companion_options[ 'disable_emojis' ] ) ) && ( $nightingale_companion_options[ 'disable_emojis' ] === 'on' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'disable-emojis.php' );
}

// cleanup WP headers.
if ( ( isset( $nightingale_companion_options[ 'cleanup_meta' ] ) ) && ( $nightingale_companion_options[ 'cleanup_meta' ] === 'on' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'clean-wp-headers.php' );
}



