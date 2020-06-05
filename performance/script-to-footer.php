<?php
/**
 * Script to Footer - Move all JavaScript and styles to footer
 *
 * @package nightingale-companion
 * @copyright NHS Leadership Academy, Nick Summerfield
 * @version 1.0 5th June 2020
 */

/**
* Grab all scripts, chuck 'em at bottom of html
*/
function nightingale_script_to_footer() {

    // clean head
    remove_action('wp_head', 'wp_print_scripts');
    remove_action('wp_head', 'wp_print_head_scripts', 9);
    remove_action('wp_head', 'wp_enqueue_scripts', 1);
    remove_action('wp_head', 'wp_enqueue_style', 1);
    // move script to footer
    add_action('wp_footer', 'wp_print_scripts', 5);
    add_action('wp_footer', 'wp_print_head_scripts', 5);
    add_action('wp_footer', 'wp_enqueue_scripts', 5);
    add_action('wp_footer', 'wp_enqueue_style', 10);

}

add_action( 'wp_enqueue_scripts', 'nightingale_script_to_footer', 99 );
