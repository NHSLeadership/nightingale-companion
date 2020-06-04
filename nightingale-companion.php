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
	} else {
		do_action( 'nightingale_companion_default_options' );
	}
}

register_activation_hook( __FILE__, 'nightingale_companion_activate' );

function nightingale_companion_default_values() {
	$defaults = array(
		'retina_images_0' => 'retina_images_0', // EnableRetina Images
		'load_css_1' => 'load_css_1', // Enable Load CSS
		'instantpage_2' => 'instantpage_2', // Enable InstantPage
		'defer_js_3' => 'defer_js_3', // Enable Defer JS
		'set_browser_cache_4' => '43200', // Set Browser Cache to 12 hours
		'enable_lazyloading_5' => 'enable_lazyloading_5', // Enable LazyLoading
		'disable_emojis_6' => 'disable_emojis_6', // Disable Emojis
		'cleanup_wp_header_7' => 'cleanup_wp_header_7', // Cleanup WP meta tags
		'move_to_footer_8' => 'move_to_footer_8', // Move Scripts and Styles to Footer
	);
	add_option('nightingale_companion_option_name', $defaults );
}

add_action( 'nightingale_companion_default_options', 'nightingale_companion_default_values' );

require_once( plugin_dir_path( __FILE__ ) . 'settings.php' );
$nightingale_companion_options = get_option( 'nightingale_companion_option_name' ); // Array of All Options set for this plugin.
if  ( ( isset( $nightingale_companion_options['retina_images_0'] ) )&& ($nightingale_companion_options['retina_images_0'] === 'retina_images_0' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'display/retina-images.php' );
}
require_once( plugin_dir_path( __FILE__ ) . 'performance/performance-enhancements.php' );

require_once( plugin_dir_path( __FILE__ ) . 'functionality/customizer.php' );
if ( get_theme_mod( 'emergency_on' ) === 'yes' ) { // only do this bit if the emergency banner is actually enabled at this time.
	// Add in the emergency header to the top of the display
	add_filter( 'get_header', 'nightingale_emergency_header' );

	function nightingale_emergency_header( $content ) {
		//get your data
		require_once( plugin_dir_path( __FILE__ ) . 'functionality/partials/emergency-alert.php' );
	}

	function nhsblocks_emergency_footer() {
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

	add_action( 'wp_footer', 'nhsblocks_emergency_footer' );
}


require_once( plugin_dir_path( __FILE__ ) . 'display/login.php' );
