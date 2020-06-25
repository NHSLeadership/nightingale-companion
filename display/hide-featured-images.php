<?php
/*
 *  To show/hide featured images on individual posts.
 *
 * @copyright NHS Leadership Academy, Tony Blacker
 * @version   1.0 22nd October 2019
 * @package   Nightingale
 */



add_action( 'wp_head', 'nightingale_companion_featured_image');

/**
 *  To hide featured image from single post page
 *
 */
function nightingale_companion_featured_image() {

    if( is_single() || is_page() ){

      ?>
          <style>
          .has-post-thumbnail img.wp-post-image{ display: none !important; }
          </style><?php
      }
}

?>
