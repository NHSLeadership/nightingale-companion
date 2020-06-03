<?php
/**
 * LazyLoad - push loading of images and videos to only when they are required
 *
 * @package nightingale-companion
 * @copyright NHS Leadership Academy, Nick Summerfield
 * @version 1.0 2nd June 2020
 */

/**
 * Lazyload images
 */
function nightingale_lazyload() {
	wp_register_script( 'lazyload', plugins_url('js/blazy.min.js', __FILE__ ) , array(), '02062020', true ); // Register instantpage javascript function.
	wp_enqueue_script( 'lazyload', plugins_url('js/blazy.min.js', __FILE__ ) , array(), '02062020', true ); // Queue it up.
}

add_action( 'wp_head', 'nightingale_lazyload', 90 );

function nightingale_add_lazy_class($content){

	$content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
	$document = new DOMDocument();
	libxml_use_internal_errors(true);
	$document->loadHTML(utf8_decode($content));

	$imgs = $document->getElementsByTagName('img');
	foreach ($imgs as $img) {
		$img->setAttribute('class','b-lazy');
	}

	$html = $document->saveHTML();
	return $html;
}

add_filter        ('the_content', 'nightingale_add_lazy_class');

function nightingale_lazyload_init() {
	echo "<script>var bLazy = new Blazy({
selector: 'img, video',
});</script>";

}

add_action( 'wp_footer', 'nightingale_lazyload_init', 99 );
