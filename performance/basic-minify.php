<?php
/**
 * Minify output html and inline css/js.
 *
 * @package nightingale-companion
 * @copyright NHS Leadership Academy, Tony Blacker
 * @version 1.0 4th June 2020
 * @source https://blog.finderonly.net/wp-content/uploads/2011/05/minifier-script.txt
 */

/**
 * Class WP_HTML_Compression - compress the output HTML by removing whitespace
 * @since 1.0.0
 * @hook WP_HTML_Compression
 */
class Nightingale_Companion_WP_HTML_Compression {
	// Settings
	protected $compress_css = true;
	protected $compress_js = true;
	protected $info_comment = true;
	protected $remove_comments = true;

	// Variables
	protected $html;

	public function __construct( $html ) {
		if ( ! empty( $html ) ) {
			$this->parseHTML( $html );
		}
	}

	public function __toString() {
		return $this->html;
	}

	/**
	 * Generate content for the bottom of the output HTML to demonstrate what savings were created.
	 * @since 1.0.0
	 * @hook bottomComment
	 * @param {string} $raw - the raw html before compression.
	 * @param {string} $compressed - the compressed html after compression.
	 */
	protected function bottomComment( $raw, $compressed ) {
		$raw        = strlen( $raw );
		$compressed = strlen( $compressed );

		$savings = ( $raw - $compressed ) / $raw * 100;

		$savings = round( $savings, 2 );

	}

	/**
	 * minifyHTML - the actual clever bit which reduces whitespace from output HTML.
	 * @since 1.0.0
	 * @hook minifyHTML
	 * @param {string} $html - the raw HTML pre compression.
	 *
	 * @return {string} - the compressed HTML with whitespace stripped out.
	 */
	protected function minifyHTML( $html ) {
		$pattern = '/<(?<script>script).*?<\/script\s*>|<(?<style>style).*?<\/style\s*>|<!(?<comment>--).*?-->|<(?<tag>[\/\w.:-]*)(?:".*?"|\'.*?\'|[^\'">]+)*>|(?<text>((<[^!\/\w.:-])?[^<]*)+)|/si';
		preg_match_all( $pattern, $html, $matches, PREG_SET_ORDER );
		$overriding = false;
		$raw_tag    = false;
		// Variable reused for output
		$html = '';
		foreach ( $matches as $token ) {
			$tag = ( isset( $token['tag'] ) ) ? strtolower( $token['tag'] ) : null;

			$content = $token[0];

			if ( is_null( $tag ) ) {
				if ( ! empty( $token['script'] ) ) {
					$strip = $this->compress_js;
				} else if ( ! empty( $token['style'] ) ) {
					$strip = $this->compress_css;
				} else if ( $content == '<!--wp-html-compression no compression-->' ) {
					$overriding = ! $overriding;

					// Don't print the comment
					continue;
				} else if ( $this->remove_comments ) {
					if ( ! $overriding && $raw_tag != 'textarea' ) {
						// Remove any HTML comments, except MSIE conditional comments
						$content = preg_replace( '/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/s', '', $content );
					}
				}
			} else {
				if ( $tag == 'pre' || $tag == 'textarea' ) {
					$raw_tag = $tag;
				} else if ( $tag == '/pre' || $tag == '/textarea' ) {
					$raw_tag = false;
				} else {
					if ( $raw_tag || $overriding ) {
						$strip = false;
					} else {
						$strip = true;

						// Remove any empty attributes, except:
						// action, alt, content, src
						$content = preg_replace( '/(\s+)(\w++(?<!\baction|\balt|\bcontent|\bsrc)="")/', '$1', $content );

						// Remove any space before the end of self-closing XHTML tags
						// JavaScript excluded
						$content = str_replace( ' />', '/>', $content );
					}
				}
			}

			if ( $strip ) {
				$content = $this->removeWhiteSpace( $content );
			}

			$html .= $content;
		}

		return $html;
	}

	/**
	 * Parse the HTML to run through it and strip out accordingly.
	 * @hook parseHTML
	 * @since 1.0.0
	 *
	 * @param {string} $html - self explanatory. :)
	 */
	public function parseHTML( $html ) {
		$this->html = $this->minifyHTML( $html );

		if ( $this->info_comment ) {
			$this->html .= "\n" . $this->bottomComment( $html, $this->html );
		}
	}

	/**
	 * Take the whitespace out. All of it. Brutally if  necessary.
	 * @since 1.0.0
	 * @hook removeWhiteSpace
	 * @param {string} $str - what goes in.
	 *
	 * @return {string} string[] - what comes back out.
	 */
	protected function removeWhiteSpace( $str ) {
		$str = str_replace( "\t", ' ', $str );
		$str = str_replace( "\n", '', $str );
		$str = str_replace( "\r", '', $str );

		while ( stristr( $str, '  ' ) ) {
			$str = str_replace( '  ', ' ', $str );
		}

		return $str;
	}
}

/**
 * Finish up the compression with a success status.
 * @since 1.0.0
 * @hook WP_HTML_Compression
 * @param {string} $html - the input raw html
 *
 * @return {string} WP_HTML_Compression the output HTML generated by the class.
 */
function nightingale_companion_wp_html_compression_finish( $html ) {
	return new Nightingale_Companion_WP_HTML_Compression( $html );
}

/**
 * Trigger Compression
 * @since 1.0.0
 * @hook wp_html_compression_start
 */
function nightingale_companion_wp_html_compression_start() {
	ob_start( 'nightingale_companion_wp_html_compression_finish' );
}

add_action( 'init', 'nightingale_companion_wp_html_compression_start' );
