<?php
/**
 * Scripts to footer - force all scripts and styles to go into the footer region.
 *
 * @package nightingale-companion
 * @copyright NHS Leadership Academy, Tony Blacker
 * @version 1.0 4th June 2020
 */

/*
 * Move ALL scripts and styles to the footer region.
 */
remove_action( 'wp_head', 'wp_print_scripts' );
remove_action( 'wp_head', 'wp_print_head_scripts', 9 );
remove_action( 'wp_head', 'wp_enqueue_scripts', 1 );
add_action( 'wp_footer', 'wp_print_scripts', 5 );
add_action( 'wp_footer', 'wp_enqueue_scripts', 5 );
add_action( 'wp_footer', 'wp_print_head_scripts', 5 );
