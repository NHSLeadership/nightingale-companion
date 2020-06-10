<?php
/**
 * Remove a lot of stuff out of headers that we just don't need.
 *
 * @package nightingale-companion
 * @copyright NHS Leadership Academy, Nick Summerfield
 * @version 1.0 2nd June 2020
 */


/**
 * Remove a chunk of stuff from the header to optimise loading.
 */
function nightingale_companion_head_cleanup() {
	remove_action( 'wp_head', 'feed_links_extra', 3 );                      // Category Feeds.
	remove_action( 'wp_head', 'feed_links', 2 );                            // Post and Comment Feeds.
	remove_action( 'wp_head', 'rsd_link' );                                 // EditURI link.
	remove_action( 'wp_head', 'wlwmanifest_link' );                         // Windows Live Writer.
	remove_action( 'wp_head', 'index_rel_link' );                           // index link.
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );              // previous link.
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );               // start link.
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );   // Links for Adjacent Posts.
	remove_action( 'wp_head', 'wp_generator' );                             // WP version.
}


/*
 * Clean up the WordPress head.
 */

// remove header links.
add_action( 'init', 'nightingale_companion_head_cleanup' );
