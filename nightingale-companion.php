<?php
/*
* Plugin Name: Nightingale Companion
* Plugin URI: https://github.com/NHSLeadership/nightingale-companion
* Description: A plugin to add in more functionality to the theme
* Author: Nick Summerfield, NHS Leadership Academy
* License: GPL v3
* Requires at least: 5.0
* Tested up to: 6.0
* Version: 1.3.6
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
		'loadcss'                      => 'on', // Enable Load CSS
		'javascript_loading'           => 'none', // Enable Defer JS
		'browser_cache'                => '43200', // Set Browser Cache to 12 hours
		'disable_emojis'               => 'on', // Disable Emojis
		'cleanup_meta'                 => 'on', // Cleanup WP meta tags
		'excerpts_as_meta_description' => 'on', // Simple Meta Description Population
		'style_login_page'             => 'on', // Add styling to login page to match rest of theme
		'enable_emergency_alert'       => 'on', // Add functionality to show emergency alert (options get added to theme customiser)
		'show_author_bio'              => 'off', // show an author bio section below posts
		'show_author_posts'            => 'off', // show other posts by author below posts
		'hide_featured_images'         => 'off', // suppress featured images on individual pages
		'sharing_buttons'              => 'none', // enable sharing buttons on posts
		'sharing_title'                => 'Share this:', // set title of sharing buttons region
	);
	if ( is_multisite() ) {
		if ( ! get_option( 'nightingale-companion' ) ) {
			add_site_option( 'nightingale-companion', $defaults, '', 'yes' );
		}
	} else {
		if ( ! get_option( 'nightingale-companion' ) ) {
			add_option( 'nightingale-companion', $defaults, '', 'yes' );
		}
	}
}

add_action( 'nightingale_companion_default_options', 'nightingale_companion_default_values' );

require_once( plugin_dir_path( __FILE__ ) . 'settings.php' );
$nightingale_companion_options = get_option( 'nightingale-companion' ); // Array of All Options set for this plugin.

require_once( plugin_dir_path( __FILE__ ) . 'performance/performance-enhancements.php' );

require_once( plugin_dir_path( __FILE__ ) . 'display/display-enhancements.php' );

if ( ( isset( $nightingale_companion_options[ 'excerpts_as_meta_description' ] ) ) && ( $nightingale_companion_options[ 'excerpts_as_meta_description' ] === 'on' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'functionality/simple-meta.php' );
}


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

