<?php
/**
 * Performance tweaks to improve load times and overall performance of site.
 *
 * @package   nightingale-companion
 * @copyright NHS Leadership Academy, Nick Summerfield
 * @version   1.0 2nd June 2020
 */
// load css stuff.
if ( ( isset( $nightingale_companion_options[ 'loadcss' ] ) ) && ( $nightingale_companion_options[ 'loadcss' ] === 'on' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'loadcss.php' );
}

// instantpage stuff.
if ( ( isset( $nightingale_companion_options[ 'instantpage' ] ) ) && ( $nightingale_companion_options[ 'instantpage' ] === 'on' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'instantpage.php' );
}

// defer JS loading to footer.
if ( ( isset( $nightingale_companion_options[ 'defer_js' ] ) ) && ( $nightingale_companion_options[ 'defer_js' ] === 'on' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'defer-js.php' );
}

// set cache headers.
if ( ( ! is_admin() ) && ( isset( $nightingale_companion_options[ 'browser_cache' ] ) ) && ( $nightingale_companion_options[ 'browser_cache' ] > 0 ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'cache-headers.php' );
}

//lazy loading - this will eventually be part of core WP
if ( ( ! is_admin() ) && ( isset( $nightingale_companion_options[ 'lazy_loading' ] ) ) && ( $nightingale_companion_options[ 'lazy_loading' ] === 'on' ) ) {
	if (
		! function_exists( 'wp_lazy_loading_enabled' ) &&
		! function_exists( 'wp_filter_content_tags' ) &&
		! function_exists( 'wp_img_tag_add_loading_attr' ) &&
		! function_exists( 'wp_img_tag_add_srcset_and_sizes_attr' )
	) {
		require_once( plugin_dir_path( __FILE__ ) . 'lazy-loading.php' );
	}
}

// disableemojis.
if ( ( isset( $nightingale_companion_options[ 'disable_emojis' ] ) ) && ( $nightingale_companion_options[ 'disable_emojis' ] === 'on' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'disable-emojis.php' );
}

// cleanup WP headers.
if ( ( isset( $nightingale_companion_options[ 'cleanup_meta' ] ) ) && ( $nightingale_companion_options[ 'cleanup_meta' ] === 'on' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'clean-wp-headers.php' );
}

if ( ( ! is_admin() ) && ( isset( $nightingale_companion_options[ 'compress_html' ] ) ) && ( $nightingale_companion_options[ 'compress_html' ] === 'on' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'basic-minify.php' );
}

if ( ( ! is_admin() ) && ( isset( $nightingale_companion_options[ 'move_scripts_to_footer' ] ) ) && ( $nightingale_companion_options[ 'move_scripts_to_footer' ] === 'on' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'script-to-footer.php' );
}

