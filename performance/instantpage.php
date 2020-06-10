<?php
/**
 * Instant Page - start loading a page as soon as a mouse hovers over a link to speed up load time..
 *
 * @package nightingale-companion
 * @copyright NHS Leadership Academy, Nick Summerfield
 * @version 1.0 2nd June 2020
 */

/**
 * Load in the instantpage javascript file to header inline.
 */
function nightingale_companion_load_instantpage() {
	wp_register_script( 'instantpage', plugins_url( 'js/instantpage.js', __FILE__ ), array(), '02062020', false ); // Register instantpage javascript function.
	wp_enqueue_script( 'instantpage', plugins_url( 'js/instantpage.js', __FILE__ ), array(), '02062020', false ); // Queue it up.

}

add_action( 'wp_head', 'nightingale_companion_load_instantpage', 99 );
add_action( 'login_head', 'nightingale_companion_load_instantpage', 99 );

