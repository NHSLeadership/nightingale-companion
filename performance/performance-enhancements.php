<?php
/**
 * Performance tweaks to improve load times and overall performance of site.
 *
 * @package nightingale-companion
 * @copyright NHS Leadership Academy, Nick Summerfield
 * @version 1.0 2nd June 2020
 */
// load css stuff.
if ( ( isset( $nightingale_companion_options['load_css_1'] ) ) && ( $nightingale_companion_options['load_css_1'] === 'load_css_1' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'loadcss.php' );
}

// instantpage stuff.
if ( ( isset( $nightingale_companion_options['instantpage_2'] ) ) && ( $nightingale_companion_options['instantpage_2'] === 'instantpage_2' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'instantpage.php' );
}

// defer JS loading to footer.
if ( ( isset( $nightingale_companion_options['defer_js_3'] ) ) && ( $nightingale_companion_options['defer_js_3'] === 'defer_js_3' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'defer-js.php' );
}

// set cache headers.
require_once( plugin_dir_path( __FILE__ ) . 'cache-headers.php' );

//lazy loading - this will eventually be part of core WP
if ( ( ! is_admin() ) && ( isset( $nightingale_companion_options['enable_lazyloading_5'] ) ) && ( $nightingale_companion_options['enable_lazyloading_5'] === 'enable_lazyloading_5' ) ) {
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
if ( ( isset( $nightingale_companion_options['disable_emojis_6'] ) ) && ( $nightingale_companion_options['disable_emojis_6'] === 'disable_emojis_6' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'disable-emojis.php' );
}


// cleanup WP headers.
if ( ( isset( $nightingale_companion_options['cleanup_wp_header_7'] ) ) && ( $nightingale_companion_options['cleanup_wp_header_7'] === 'cleanup_wp_header_7' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'clean-wp-headers.php' );
}

if ( ( ! is_admin() ) && ( isset( $nightingale_companion_options['minify_8'] ) ) && ( $nightingale_companion_options['minify_8'] === 'minify_8' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'basic-minify.php' );
}

