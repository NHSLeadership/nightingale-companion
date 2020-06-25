<?php
/*
 *  Add social links to screens.
 *
 * @copyright NHS Leadership Academy, Tony Blacker
 * @version   1.0 25th June 2020
 * @package   Nightingale
 */


/**
 *  Function to add a social links widget to left or right of screen
 */


function nightingale_companion_widgetise_header_enqueue() {
	wp_enqueue_script( 'socialfloating', plugin_dir_url( __FILE__ ) . 'js/jquery.socialfloating.js', 'jquery', '0.1.0' );
	wp_enqueue_style( ' socialfloating', plugin_dir_url( __FILE__ ) . 'css/socialfloating.css', '', '0.1.0' );
	wp_enqueue_script('fontawesome', 'https://kit.fontawesome.com/a10ba68d8d.js', '', '5.13.1' );
}

if ( get_theme_mod( 'social_on' ) === 'yes' ) {
	add_action( 'wp_enqueue_scripts', 'nightingale_companion_widgetise_header_enqueue', 99 );
}

function nightingale_companion_social_widgets() {
    if ( get_theme_mod( 'social_on' ) === 'yes' ) {

	    if ( get_theme_mod( 'social_side' ) === 'left' ) {
	        $side = 'left';
	    } else {
	        $side = 'right';
        }
	    ?>
        <script>
		    jQuery.socialfloating({
			    theme: 'color',
			    opaque: true,
			    effect: 'scroll',
			    icons: 'fontawesome5',
			    showHidebutton: true,
			    container: 'socialfloating',
			    position: '<?php echo $side; ?>',
			    buttons: [
				    <?php
				    $socials = array(
					    'facebook',
					    'twitter',
					    'instagram',
					    'youtube',
					    'vimeo',
					    'linkedin',
                        'rss',
				    );
				    foreach ( $socials as $social ) {
				        $icon = 'fab fa-' . $social;

					    if ( get_theme_mod( 'social_' . $social . '_on' ) === 'yes' ) {
						    $link = get_theme_mod( 'social_' . $social . '_link' );
						    if ( 'rss' === $social ) {
							    $icon = 'fa fa-rss';
							    $link = get_site_url() . '/feed';
						    }
						    echo "{
					enabled: true,
					icon: '" . $icon . "',
					name: '" . $social . "',
					link: '" . $link . "',
					title: 'Visit us on " . $social . "',
					color: '#E8EDEE'
				},";
					    }
				    }
				    ?>

			    ]
		    });
        </script>
	    <?php
    }
}

add_action( 'wp_footer', 'nightingale_companion_social_widgets' );



function nightingale_companion_customize_socials( $wp_customize ) {
	/**
	 * SECTION: Social Widgets Field
	 **/
	$wp_customize->add_section(
		'section_social',
		array(
			'title'       => esc_html__( 'Social Widget', 'nightingale' ),
			'description' => esc_attr__( 'Set up a floating widget with social links', 'nightingale' ),
			'priority'    => 80,
		)
	);

	/*
	 * Social Options
	 */
	$wp_customize->add_setting(
		'social_on', array(
			              'default'           => 'no',
			              'sanitize_callback' => 'esc_attr',
		              )
	);

	$wp_customize->add_control(
		'social_on',
		array(
			'label'       => esc_html__( 'Show social widget section?', 'nightingale' ),
			'section'     => 'section_social',
			'description' => esc_html__( 'Do you wish to have a social widget sitewide? This will be static links to your social channels, showing on either the left or right of your users window', 'nightingale' ),
			'type'        => 'radio',
			'choices'     => array(
				'yes' => esc_html__( 'Yes', 'nightingale' ),
				'no'  => esc_html__( 'No', 'nightingale' ),
			)
		)
	);


	$wp_customize->add_setting(
		'social_side', array(
			                    'default'           => 'right',
			                    'sanitize_callback' => 'esc_attr',
		                    )
	);

	$wp_customize->add_control(
		'social_side',
		array(
			'label'       => esc_html__( 'Where do you wish to show the social widget?', 'nightingale' ),
			'section'     => 'section_social',
			'description' => esc_html__( 'Pick whether this should be on the left or right of your users screen', 'nightingale' ),
			'type'        => 'radio',
			'choices'     => array(
				'left' => esc_html__( 'Left', 'nightingale' ),
				'right'  => esc_html__( 'Right', 'nightingale' ),
			),
			'active_callback' => function () use ( $wp_customize ) {
				return 'yes' === $wp_customize->get_setting( 'social_on' )->value();
			},
		)
	);

	$wp_customize->add_setting(
		'social_facebook_on', array(
			           'default'           => 'no',
			           'sanitize_callback' => 'esc_attr',
		           )
	);

	$wp_customize->add_control(
		'social_facebook_on',
		array(
			'label'       => esc_html__( 'Show FaceBook link?', 'nightingale' ),
			'section'     => 'section_social',
			'description' => esc_html__( 'Do you wish to show a facebook link on your widget?', 'nightingale' ),
			'type'        => 'radio',
			'choices'     => array(
				'yes' => esc_html__( 'Yes', 'nightingale' ),
				'no'  => esc_html__( 'No', 'nightingale' ),
			),
			'active_callback' => function () use ( $wp_customize ) {
				return 'yes' === $wp_customize->get_setting( 'social_on' )->value();
			},
		)
	);
	$wp_customize->add_setting(
		'social_facebook_link',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		'social_facebook_link',
		array(
			'label'   => esc_html__( 'Link to your FaceBook page (full url)', 'nightingale' ),
			'section' => 'section_social',
			'type'    => 'text',
			'active_callback' => function () use ( $wp_customize ) {
				return 'yes' === $wp_customize->get_setting( 'social_facebook_on' )->value();
			},
		)
	);



	$wp_customize->add_setting(
		'social_twitter_on', array(
			              'default'           => 'no',
			              'sanitize_callback' => 'esc_attr',
		              )
	);

	$wp_customize->add_control(
		'social_twitter_on',
		array(
			'label'       => esc_html__( 'Show Twitter link?', 'nightingale' ),
			'section'     => 'section_social',
			'description' => esc_html__( 'Do you wish to show a twitter link on your widget?', 'nightingale' ),
			'type'        => 'radio',
			'choices'     => array(
				'yes' => esc_html__( 'Yes', 'nightingale' ),
				'no'  => esc_html__( 'No', 'nightingale' ),
			),
			'active_callback' => function () use ( $wp_customize ) {
		return 'yes' === $wp_customize->get_setting( 'social_on' )->value();
	},
		)
	);
	$wp_customize->add_setting(
		'social_twitter_link',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		'social_twitter_link',
		array(
			'label'   => esc_html__( 'Link to your Twitter page (full url)', 'nightingale' ),
			'section' => 'section_social',
			'type'    => 'text',
			'active_callback' => function () use ( $wp_customize ) {
				return 'yes' === $wp_customize->get_setting( 'social_twitter_on' )->value();
			},
		)
	);



	$wp_customize->add_setting(
		'social_instagram_on', array(
			              'default'           => 'no',
			              'sanitize_callback' => 'esc_attr',
		              )
	);

	$wp_customize->add_control(
		'social_instagram_on',
		array(
			'label'       => esc_html__( 'Show Instagram link?', 'nightingale' ),
			'section'     => 'section_social',
			'description' => esc_html__( 'Do you wish to show an instagram link on your widget?', 'nightingale' ),
			'type'        => 'radio',
			'choices'     => array(
				'yes' => esc_html__( 'Yes', 'nightingale' ),
				'no'  => esc_html__( 'No', 'nightingale' ),
			),
			'active_callback' => function () use ( $wp_customize ) {
				return 'yes' === $wp_customize->get_setting( 'social_on' )->value();
			},
		)
	);
	$wp_customize->add_setting(
		'social_instagram_link',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		'social_instagram_link',
		array(
			'label'   => esc_html__( 'Link to your Instagram page (full url)', 'nightingale' ),
			'section' => 'section_social',
			'type'    => 'text',
			'active_callback' => function () use ( $wp_customize ) {
				return 'yes' === $wp_customize->get_setting( 'social_instagram_on' )->value();
			},
		)
	);



	$wp_customize->add_setting(
		'social_youtube_on', array(
			              'default'           => 'no',
			              'sanitize_callback' => 'esc_attr',
		              )
	);

	$wp_customize->add_control(
		'social_youtube_on',
		array(
			'label'       => esc_html__( 'Show YouTube link?', 'nightingale' ),
			'section'     => 'section_social',
			'description' => esc_html__( 'Do you wish to show a YouTube link on your widget?', 'nightingale' ),
			'type'        => 'radio',
			'choices'     => array(
				'yes' => esc_html__( 'Yes', 'nightingale' ),
				'no'  => esc_html__( 'No', 'nightingale' ),
			),
			'active_callback' => function () use ( $wp_customize ) {
				return 'yes' === $wp_customize->get_setting( 'social_on' )->value();
			},
		)
	);
	$wp_customize->add_setting(
		'social_youtube_link',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		'social_youtube_link',
		array(
			'label'   => esc_html__( 'Link to your YouTube channel (full url)', 'nightingale' ),
			'section' => 'section_social',
			'type'    => 'text',
			'active_callback' => function () use ( $wp_customize ) {
				return 'yes' === $wp_customize->get_setting( 'social_youtube_on' )->value();
			},
		)
	);


	$wp_customize->add_setting(
		'social_vimeo_on', array(
			                   'default'           => 'no',
			                   'sanitize_callback' => 'esc_attr',
		                   )
	);

	$wp_customize->add_control(
		'social_vimeo_on',
		array(
			'label'       => esc_html__( 'Show Vimeo link?', 'nightingale' ),
			'section'     => 'section_social',
			'description' => esc_html__( 'Do you wish to show a Vimeo link on your widget?', 'nightingale' ),
			'type'        => 'radio',
			'choices'     => array(
				'yes' => esc_html__( 'Yes', 'nightingale' ),
				'no'  => esc_html__( 'No', 'nightingale' ),
			),
			'active_callback' => function () use ( $wp_customize ) {
				return 'yes' === $wp_customize->get_setting( 'social_on' )->value();
			},
		)
	);
	$wp_customize->add_setting(
		'social_vimeo_link',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		'social_vimeo_link',
		array(
			'label'   => esc_html__( 'Link to your Vimeo channel (full url)', 'nightingale' ),
			'section' => 'section_social',
			'type'    => 'text',
			'active_callback' => function () use ( $wp_customize ) {
				return 'yes' === $wp_customize->get_setting( 'social_vimeo_on' )->value();
			},
		)
	);


	$wp_customize->add_setting(
		'social_linkedin_on', array(
			              'default'           => 'no',
			              'sanitize_callback' => 'esc_attr',
		              )
	);

	$wp_customize->add_control(
		'social_linkedin_on',
		array(
			'label'       => esc_html__( 'Show LinkedIn link?', 'nightingale' ),
			'section'     => 'section_social',
			'description' => esc_html__( 'Do you wish to show a link to your LinkedIn profile on your widget?', 'nightingale' ),
			'type'        => 'radio',
			'choices'     => array(
				'yes' => esc_html__( 'Yes', 'nightingale' ),
				'no'  => esc_html__( 'No', 'nightingale' ),
			),
			'active_callback' => function () use ( $wp_customize ) {
				return 'yes' === $wp_customize->get_setting( 'social_on' )->value();
			},
		)
	);
	$wp_customize->add_setting(
		'social_linkedin_link',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		'social_linkedin_link',
		array(
			'label'   => esc_html__( 'Link to your LinkedIn profile (full url)', 'nightingale' ),
			'section' => 'section_social',
			'type'    => 'text',
			'active_callback' => function () use ( $wp_customize ) {
				return 'yes' === $wp_customize->get_setting( 'social_linkedin_on' )->value();
			},
		)
	);


	$wp_customize->add_setting(
		'social_rss_on', array(
			                   'default'           => 'no',
			                   'sanitize_callback' => 'esc_attr',
		                   )
	);

	$wp_customize->add_control(
		'social_rss_on',
		array(
			'label'       => esc_html__( 'Show RSS feed?', 'nightingale' ),
			'section'     => 'section_social',
			'description' => esc_html__( 'Do you wish to show your RSS feed link on your widget?', 'nightingale' ),
			'type'        => 'radio',
			'choices'     => array(
				'yes' => esc_html__( 'Yes', 'nightingale' ),
				'no'  => esc_html__( 'No', 'nightingale' ),
			),
			'active_callback' => function () use ( $wp_customize ) {
				return 'yes' === $wp_customize->get_setting( 'social_on' )->value();
			},
		)
	);

}

add_action( 'customize_register', 'nightingale_companion_customize_socials' );
