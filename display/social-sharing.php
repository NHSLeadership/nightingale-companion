<?php
/**
 * add social sharing icons to posts and pages
 */


/**
 * Add a social media share box to your WordPress site.
 * using add to any code generator
 **/

function nightingale_companion_sharing_caring( $content ) {
	global $nightingale_companion_options;
	if ( ! empty( $nightingale_companion_options ) ) {
		$post_type = get_post_type();
		$include   = array( 'post' );
		$output    = '';
		if ( is_single() && in_array( $post_type, $include ) ) {
			if ( isset( $nightingale_companion_options['sharing_title'] ) ) {
				$output .= '<div class="nhsuk-panel nhsuk-panel--grey"><!-- AddToAny BEGIN -->
					<h4 style="float: left;">' . $nightingale_companion_options['sharing_title'] . '&nbsp;&nbsp;</h4><div class="a2a_kit a2a_kit_size_32 a2a_default_style">
					<a class="a2a_button_facebook"></a>
					<a class="a2a_button_twitter"></a>
					<a class="a2a_button_linkedin"></a>
					<a class="a2a_button_pinterest"></a>
					<a class="a2a_button_whatsapp"></a>
					<a class="a2a_button_evernote"></a>
					<a class="a2a_button_email"></a>
					<a class="a2a_button_copy_link"></a>
					<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
					</div>
					<!-- AddToAny END -->
					</div>';
			}
		}
		$position = isset( $nightingale_companion_options['sharing_buttons'] ) ? $nightingale_companion_options['sharing_buttons'] : null;
		if ( 'top' === $position ) {
			$content = $output . $content;
		} elseif ( 'bottom' === $position ) {
			$content = $content . $output;
		} elseif ( 'both' === $position ) {
			$content = $output . $content . $output;
		}
		if ( ! empty( $output ) ) {
			$content = $content . '<script async src="https://static.addtoany.com/menu/page.js"></script>';
		}
		return $content;
	}
}

add_action( 'the_content', 'nightingale_companion_sharing_caring' );
