<?php
/**
 * Display tweaks to modify the display options of the site.
 *
 * @package   nightingale-companion
 * @copyright NHS Leadership Academy, Tony Blacker
 * @version   1.0 25th June 2020
 */


if ( ( isset( $nightingale_companion_options[ 'style_login_page' ] ) ) && ( $nightingale_companion_options[ 'style_login_page' ] === 'on' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'login.php' );
}

/* Display Author Bio */
if ( ( isset( $nightingale_companion_options[ 'show_author_bio' ] ) ) && ( $nightingale_companion_options[ 'show_author_bio' ] === 'on' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'author-bio.php' );
}

/* Display Other Posts By Author */
if ( ( isset( $nightingale_companion_options[ 'show_author_posts' ] ) ) && ( $nightingale_companion_options[ 'show_author_posts' ] === 'on' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'posts-by-author.php' );
}

if ( ( isset( $nightingale_companion_options[ 'hide_featured_images' ] ) ) && ( $nightingale_companion_options[ 'hide_featured_images' ] === 'on' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'hide-featured-images.php' );
}

// the checks for enabling etc are all in the file itself, so no wrap around this require
require_once( plugin_dir_path( __FILE__ ) . 'social-links.php' );

// the checks for enabling etc are all in the file itself, so no wrap around this require
require_once( plugin_dir_path( __FILE__ ) . 'social-sharing.php' );

if ( ( isset( $nightingale_companion_options[ 'enable_emergency_alert' ] ) ) && ( $nightingale_companion_options[ 'enable_emergency_alert' ] === 'on' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'customizer.php' );
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
			require_once( plugin_dir_path( __FILE__ ) . 'partials/emergency-alert.php' );
		}

		/**
		 * jQuery routine to take the output emergency alert and insert it into the correct area of the output html
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

if ( ( isset( $nightingale_companion_options[ 'audio_playback' ] ) ) && ( $nightingale_companion_options[ 'audio_playback' ] === 'on' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'audio-playback.php' );
}
