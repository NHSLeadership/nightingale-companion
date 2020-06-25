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
	$post_type = get_post_type();
	$include   = array( 'post' );
	$output    = '';
	if ( is_single() && in_array( $post_type, $include ) ):

		$output .= '<!-- AddToAny BEGIN -->
<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
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
<script async src="https://static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->';
	endif;
	$position = $nightingale_companion_options[ 'sharing_buttons' ];
	if ('top' === $position) {
		$content = $output.$content;
	} else if ('bottom' === $position ) {
		$content = $content . $output;
	} else if ('both' === $position ) {
		$content = $output.$content.$output;
	}
	return $content;
}

add_action( 'the_content', 'nightingale_companion_sharing_caring' );
