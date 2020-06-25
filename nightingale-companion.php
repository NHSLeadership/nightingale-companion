<?php
/*
* Plugin Name: Nightingale Companion
* Plugin URI: https://github.com/NHSLeadership/nightingale-companion
* Description: A plugin to add in more functionality to the theme
* Author: Nick Summerfield, NHS Leadership Academy
* License: GPL v3
* Requires at least: 5.0
* Tested up to: 5.4
* Version: 1.0.2
*
* @package nightingale-companion
*/
defined( 'ABSPATH' ) || exit;
/**
 * Load translations (if any) for the plugin from the /languages/ folder.
 *
 * @link https://developer.wordpress.org/reference/functions/load_plugin_textdomain/
 */
add_action( 'init', 'nightingale_companion_load_textdomain' );

/**
 * Set the domain to be used for translations
 *
 * @return {null} simply loads in language files.
 * @since  1.0.0
 * @hook   nightingale_companion_load_textdomain
 */
function nightingale_companion_load_textdomain() {
	load_plugin_textdomain( 'nightingale_companion', false, basename( __DIR__ ) . '/languages' );
}


/**
 * Checks if the Nightingale theme is activated
 * If the Nightingale theme is not active, then don't allow the
 * activation of this plugin.
 *
 * @return {bool} did the plugin succesfully activate? If not, display error.
 * @since  1.0.0
 * @hook   nightingale_companion_activate
 */
function nightingale_companion_activate() {
	$theme = wp_get_theme();
	if ( current_user_can( 'activate_plugins' ) && ! ( ( 'Nightingale' == $theme->name ) || ( 'Nightingale' == $theme->parent_theme ) ) ) {
		// Deactivate the plugin.
		deactivate_plugins( plugin_basename( __FILE__ ) );
		// Throw an error in the WordPress admin console.
		$error_message = '<p style="font-family:-apple-system,BlinkMacSystemFont,\'Segoe UI\',Roboto,Oxygen-Sans,Ubuntu,Cantarell,\'Helvetica Neue\',sans-serif;font-size: 13px;line-height: 1.5;color:#444;">' . esc_html__( 'This plugin requires ', 'nightingale-companion' ) . '<a href="' . esc_url( 'https://en-gb.wordpress.org/themes/nightingale/' ) . '">Nightingale</a>' . esc_html__( ' theme (or a child theme of) to be installed and active.', 'nightingale-companion' ) . '</p>';
		die( $error_message ); // WPCS: XSS ok.
	} else {
		do_action( 'nightingale_companion_default_options' );
	}
}

register_activation_hook( __FILE__, 'nightingale_companion_activate' );

/**
 * Set the default values for the plugin settings on installation.
 *
 * @return {null} adds values to database, no return given.
 * @since  1.0.0
 * @hook   nightingale_companion_default_values
 */
function nightingale_companion_default_values() {
	$defaults = array(
		'retina_images'                => 'on', // EnableRetina Images
		'loadcss'                      => 'on', // Enable Load CSS
		'instantpage'                  => 'on', // Enable InstantPage
		'defer_js'                     => 'on', // Enable Defer JS
		'browser_cache'                => '43200', // Set Browser Cache to 12 hours
		'lazy_loading'                 => 'on', // Enable LazyLoading
		'disable_emojis'               => 'on', // Disable Emojis
		'cleanup_meta'                 => 'on', // Cleanup WP meta tags
		'compress_html'                => 'on', // Basic Minification of Output
		'excerpts_as_meta_description' => 'on', // Simple Meta Description Population
		'move_scripts_to_footer'       => 'on', // Sending Scripts to the Footer
		'style_login_page'             => 'on',
		'enable_emergency_alert'       => 'on',
		'show_author_bio'              => 'off',
		'show_author_posts'            => 'off',
		'hide_featured_images'         => 'off',
		'hide_author_name' => 'off',
		'hide_post_date' => 'off',
	);
	add_option( 'nightingale-companion', $defaults );
}

add_action( 'nightingale_companion_default_options', 'nightingale_companion_default_values' );

require_once( plugin_dir_path( __FILE__ ) . 'settings.php' );
$nightingale_companion_options = get_option( 'nightingale-companion' ); // Array of All Options set for this plugin.
if ( ( isset( $nightingale_companion_options[ 'retina_images' ] ) ) && ( $nightingale_companion_options[ 'retina_images' ] === 'on' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'display/retina-images.php' );
}
require_once( plugin_dir_path( __FILE__ ) . 'performance/performance-enhancements.php' );

if ( ( isset( $nightingale_companion_options[ 'enable_emergency_alert' ] ) ) && ( $nightingale_companion_options[ 'enable_emergency_alert' ] === 'on' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'functionality/customizer.php' );
	if ( get_theme_mod( 'emergency_on' ) === 'yes' ) { // only do this bit if the emergency banner is actually enabled at this time.
		// Add in the emergency header to the top of the display
		add_filter( 'wp_footer', 'nightingale_companion_emergency_header' );

		/**
		 * Add in the emergency header to the output hmtl where active
		 *
		 * @hook   nightingale_emergency_header
		 *
		 * @param  {array} $content The initial content for the output.
		 *
		 * @return {array} $content the modified output including the header emergency alert code.
		 * @since  1.0.0
		 */
		function nightingale_companion_emergency_header( $content ) {
			//get your data
			require_once( plugin_dir_path( __FILE__ ) . 'functionality/partials/emergency-alert.php' );
		}

		/**
		 * jQuery routine to take the output emergency alert and insert it into the corret area of the output html
		 *
		 * @since 1.0.0
		 * @hook  nhsblocks_emergency_footer
		 */
		function nightingale_companion_emergency_footer() {
			echo "<script>
		const emergencyBlock = document.querySelector('.nhsuk-global-alert');
		if ( ( emergencyBlock ) ) { 
			matches = emergencyBlock.matches ? emergencyBlock.matches('.nhsuk-global-alert') : emergencyBlock.msMatchesSelector('.nhsuk-global-alert');
			if ( matches === true ) {
				const header = document.querySelector('header');
					jQuery('.nhsuk-global-alert').insertAfter( header );
			}
		}	
	</script>";
		}

		add_action( 'wp_footer', 'nightingale_companion_emergency_footer' );
	}
}

if ( ( isset( $nightingale_companion_options[ 'excerpts_as_meta_description' ] ) ) && ( $nightingale_companion_options[ 'excerpts_as_meta_description' ] === 'on' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'functionality/simple-meta.php' );
}

if ( ( isset( $nightingale_companion_options[ 'style_login_page' ] ) ) && ( $nightingale_companion_options[ 'style_login_page' ] === 'on' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'display/login.php' );
}

/* Display Author Bio */
if ( ( isset( $nightingale_companion_options[ 'show_author_bio' ] ) ) && ( $nightingale_companion_options[ 'show_author_bio' ] === 'on' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'display/author-bio.php' );
}

/* Display Other Posts By Author */
if ( ( isset( $nightingale_companion_options[ 'show_author_posts' ] ) ) && ( $nightingale_companion_options[ 'show_author_posts' ] === 'on' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'display/posts-by-author.php' );
}

if ( ( isset( $nightingale_companion_options[ 'hide_featured_images' ] ) ) && ( $nightingale_companion_options[ 'hide_featured_images' ] === 'on' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'display/hide-featured-images.php' );
}

require_once( plugin_dir_path( __FILE__ ) . 'display/suppress-post-fields.php' );

require_once( plugin_dir_path( __FILE__ ) . 'display/social-links.php' );

require_once( plugin_dir_path( __FILE__ ) . 'functionality/jquery-update.php' );
/**
 * Add the plugin settings link to the plugins screen for quick access.
 *
 * @param  {array} $links - the default links displayed under the plugins name on the plugin page in admin.
 *
 * @return {array} - the returned array including the new settings link.
 */
function nightingale_companion_plugin_action_links( $links ) {
	return array_merge( array(
		                    '<a href="' . get_admin_url( null, 'options-general.php?page=nightingale_companion' ) . '">' . __( 'Settings' ) . '</a>',
	                    ), $links );
}

add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'nightingale_companion_plugin_action_links' );

