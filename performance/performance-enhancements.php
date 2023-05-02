<?php
/**
 * Performance tweaks to improve load times and overall performance of site.
 *
 * @package   nightingale-companion
 * @copyright NHS Leadership Academy, Nick Summerfield
 * @version   1.0 2nd June 2020
 */
// load css stuff.
// removed


// defer JS loading to footer.
// removed

// set cache headers.
// removed

// disableemojis.
if ( ( isset( $nightingale_companion_options[ 'disable_emojis' ] ) ) && ( $nightingale_companion_options[ 'disable_emojis' ] === 'on' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'disable-emojis.php' );
}

// cleanup WP headers.
if ( ( isset( $nightingale_companion_options[ 'cleanup_meta' ] ) ) && ( $nightingale_companion_options[ 'cleanup_meta' ] === 'on' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'clean-wp-headers.php' );
}



