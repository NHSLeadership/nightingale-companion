<?php
/**
 * Nightingale Companion Plugin settings.
 *
 * @package   nightingale-companion
 * @copyright NHS Leadership Academy, Nick Summerfield & Tony Blacker
 * @version   1.3.4 07 Oct 2022
 */

/**
 * Code adding in the options page for the companion plugin that will allow the user to chose which elements of the
 * plugin are activated.
 */
if ( ! class_exists( 'RationalOptionPages' ) ) {
	require_once( 'RationalOptionPages.php' );
}

// this array is made up using the guide at https://github.com/jeremyHixon/RationalOptionPages
$pages       = array(
	'nightingale-companion' => array(
		'parent_slug' => 'options-general.php',
		'page_title'  => __( 'Nightingale Companion', 'nightingale' ),
		'text'        => 'something in here',
		'sections'    => array(
			'display-options'     => array(
				'title'  => __( 'Display Options', 'nightingale' ),
				'fields' => array(
					'login_styling'   => array(
						'title'   => 'Style Login Page',
						'type'    => 'checkbox',
						'checked' => 'true',
						'text'    => 'Apply styling to login and registration screens to match rest of front end design',
					),
					'emergency_alert' => array(
						'title'   => 'Enable Emergency Alert?',
						'type'    => 'checkbox',
						'checked' => 'true',
						'text'    => 'Add an emergency alert banner to be configured across the whole site (if enabled, you will still need to visit Appearance > Customizer > Emergency Alert to configure what actually displays)',
					),
					'sharing_buttons' => array(
						'title'   => 'Sharing Buttons?',
						'type'    => 'select',
						'value' => 'none',
						'choices' => array(
							'none' => __('Don\'t Display Sharing Buttons', 'nightingale'),
							'top' => __( 'Show Sharing Buttons above content', 'nightingale'),
							'bottom' => __( 'Show Sharing Buttons below content', 'nightingale'),
							'both' => __( 'Show Sharing Buttons above and below content', 'nightingale'),
						),
					),
					'sharing_title' => array(
						'title' => 'Sharing Title',
						'type'  => 'text',
						'value' => 'Share this:',
						'text'  => 'The text to show before your sharing buttons',
					),
					'audio_playback' => array(
						'title'   => 'Audio Playback',
						'type'    => 'checkbox',
						'checked' => 'false',
						'text'    => 'Add speed control buttons to audio playback HTML5 elements - this only applies to audio files added using the native WP embed, not to third party audio player plugins.',
					),
				),
			),
			'function-options'    => array(
				'title'  => __( 'Functionality Options', 'nightingale' ),
				'fields' => array(
					'meta_descriptions' => array(
						'title'   => 'Excerpts as Meta Description',
						'type'    => 'checkbox',
						'checked' => 'true',
						'text'    => 'Activate to use page/post excerpts as meta description - untick if you are using an SEO plugin which covers this.',
					),
					'cleanup_wp'        => array(
						'title'   => 'Cleanup Meta',
						'type'    => 'checkbox',
						'checked' => 'true',
						'text'    => 'Cleanup the WP meta tags added by default to remove unused items',
					),
				),
			),
			'performance-options' => array(
				'title'  => __( 'Performance Options', 'nightingale' ),
				'fields' => array(
					'disable_emojis'  => array(
						'title'   => 'Disable Emojis',
						'type'    => 'checkbox',
						'checked' => 'true',
						'text'    => 'Take WordPress emoji library out of being auto loaded',
					),
				),
			),
			'blog-options'        => array(
				'title'  => __( 'Blog Section Settings', 'nightingale' ),
				'fields' => array(
					'hide_featured_images' => array(
						'title'   => 'Hide Featured Images',
						'type'    => 'checkbox',
						'checked' => '',
						'text'    => 'Suppress featured images from displaying on single post pages. i.e. only show featured image on pages with multiple posts on them.',
					),
					'show_author_bio'      => array(
						'title'   => 'Show Author Bio?',
						'type'    => 'checkbox',
						'checked' => '',
						'text'    => 'Displays an author bio section below posts',
					),
					'show_author_posts'    => array(
						'title'   => 'Show Author Posts?',
						'type'    => 'checkbox',
						'checked' => '',
						'text'    => 'Display 6 posts from the same author below blog post',
					),
				),
			),
		),
	),
);
$option_page = new RationalOptionPages( $pages );
