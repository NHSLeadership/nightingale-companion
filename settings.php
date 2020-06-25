<?php
/**
 * Nightingale Companion Plugin settings.
 *
 * @package   nightingale-companion
 * @copyright NHS Leadership Academy, Nick Summerfield & Tony Blacker
 * @version   1.0 3rd June 2020
 */

/**
 * Code adding in the options page for the companion plugin that will allow the user to chose which elements of the
 * plugin are activated.
 */

require_once( 'RationalOptionPages.php' );

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
					'retina_images'   => array(
						'title'   => 'Retina Images',
						'type'    => 'checkbox',
						'checked' => 'true',
						'text'    => 'Enable retina display using retina.js?',
					),
					'disable_emojis'  => array(
						'title'   => 'Disable Emojis',
						'type'    => 'checkbox',
						'checked' => 'true',
						'text'    => 'Take WordPress emoji library out of being auto loaded',
					),
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
					'update_jquery'     => array(
						'title'   => 'Update jQuery',
						'type'    => 'checkbox',
						'checked' => '',
						'text'    => 'Update the core jQuery to 3.4.1. Use with caution, this may break certain features with other plugins. Enable at your own risk.',
					),
				),
			),
			'performance-options' => array(
				'title'  => __( 'Performance Options', 'nightingale' ),
				'fields' => array(
					'loadcss'       => array(
						'title'   => 'LoadCSS',
						'type'    => 'checkbox',
						'checked' => 'true',
						'text'    => 'Enable loadcss library to asynchronously load css files and improve performance',
					),
					'instantpage'   => array(
						'title'   => 'InstantPage',
						'type'    => 'checkbox',
						'checked' => 'true',
						'text'    => 'Enable instantpage library - this starts a page loading when a mouse hovers over it which improves User Experience',
					),
					'defer_js'      => array(
						'title'   => 'Defer JS',
						'type'    => 'checkbox',
						'checked' => 'true',
						'text'    => 'Defer loading of JS to increase speed of visible page load. (Note this does not actually improve overall speed, just the speed of loading for users to be able to interact with the screen)',
					),
					'browser_cache' => array(
						'title' => 'Browser Cache',
						'type'  => 'text',
						'value' => '43200',
						'text'  => 'Set Browser Cache duration in seconds. 300 = 5 minutes, 43200 = 12 hours. Think very carefully before setting to a higher value than 12 hours!',
					),
					'lazyloading'   => array(
						'title'   => 'Lazy Loading',
						'type'    => 'checkbox',
						'checked' => 'true',
						'text'    => ' Lazy Loading delays resources loading until the point they are in display. This improves performance on pages with images and videos.',
					),
					'compress_html' => array(
						'title'   => 'Compress HTML',
						'type'    => 'checkbox',
						'checked' => 'true',
						'text'    => 'Basic compression of output html (removes white space in the raw html that is sent to the browser)',
					),
					'move_scripts'  => array(
						'title'   => 'Move Scripts to Footer',
						'type'    => 'checkbox',
						'checked' => 'true',
						'text'    => 'Send scripts and styles to the footer. This may cause issues with other plugins. If this occurs, please disable.',
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
					'hide_author_name'     => array(
						'title'   => 'Hide Author Name',
						'type'    => 'checkbox',
						'checked' => '',
						'text'    => 'Prevent author from showing up on posts.',
					),
					'hide_post_date'       => array(
						'title'   => 'Hide Post Date',
						'type'    => 'checkbox',
						'checked' => '',
						'text'    => 'Prevent date of publishing from showing on posts',
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
