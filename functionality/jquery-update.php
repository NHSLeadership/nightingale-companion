<?php

/**
 * Update jQuery to latest version.
 *
 */
function nightingale_companion_update_jquery( $wp_customize ) {
	wp_deregister_script( 'jquery' );
	// Change the URL if you want to load a local copy of jQuery from your own server.
	wp_register_script( 'jquery', "https://code.jquery.com/jquery-3.4.1.min.js", array(), '3.4.1' );
	wp_enqueue_script( 'jquery');
}

add_action( 'wp_enqueue_scripts', 'nightingale_companion_update_jquery' );
