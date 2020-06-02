<?php
/*
* Plugin Name: Nightingale Companion
* Plugin URI: https://github.com/NHSLeadership/nightingale-companion
* Description: A plugin to add in more functionality to the theme
* Author: Nick Summerfield, NHS Leadership Academy
* License: GPL v3
* Requires at least: 5.0
* Tested up to: 5.4
* Version: 1.0
*
* @package nightingale-companion
*/

/**
 * Load translations (if any) for the plugin from the /languages/ folder.
 *
 * @link https://developer.wordpress.org/reference/functions/load_plugin_textdomain/
 */
add_action( 'init', 'lafeatures_load_textdomain' );

/**
 * Set the domain to be used for translations
 */
function lafeatures_load_textdomain() {
    load_plugin_textdomain( 'lafeatures', false, basename( __DIR__ ) . '/languages' );
}


/**
 * Checks if the Nightingale theme is activated
 *
 * If the Nightingale theme is not active, then don't allow the
 * activation of this plugin.
 *
 * @since 1.0.0
 */
function nightingale_companion_activate() {
    if ( current_user_can( 'activate_plugins' ) && ! ( 'Nightingale' == wp_get_theme() ) ) {
        // Deactivate the plugin.
        deactivate_plugins( plugin_basename( __FILE__ ) );
        // Throw an error in the WordPress admin console.
        $error_message = '<p style="font-family:-apple-system,BlinkMacSystemFont,\'Segoe UI\',Roboto,Oxygen-Sans,Ubuntu,Cantarell,\'Helvetica Neue\',sans-serif;font-size: 13px;line-height: 1.5;color:#444;">' . esc_html__( 'This plugin requires ', 'nightingale-companion' ) . '<a href="' . esc_url( 'https://en-gb.wordpress.org/themes/nightingale/' ) . '">Nightingale</a>' . esc_html__( ' theme to be installed and active.', 'nightingale-companion' ) . '</p>';
        die( $error_message ); // WPCS: XSS ok.
    }
}

register_activation_hook( __FILE__, 'nightingale_companion_activate' );

require_once( plugin_dir_path( __FILE__ ) . 'display/retina-images.php' );

