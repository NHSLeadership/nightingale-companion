<?php

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function nightingale_companion_customize_register( $wp_customize ) {
	/**
	 * SECTION: Emergency Alert Field
	 **/
	$wp_customize->add_section(
		'section_emergency',
		array(
			'title'       => esc_html__( 'Emergency Alert', 'nightingale' ),
			'description' => esc_attr__( 'Adds a site wide alert to the top of your site. Use sparingly!', 'nightingale' ),
			'priority'    => 75,
		)
	);

	/*
	 * Emergency Options
	 */
	$wp_customize->add_setting(
		'emergency_on', array(
			'default'           => 'no',
			'sanitize_callback' => 'esc_attr',
		)
	);

	$wp_customize->add_control(
		'emergency_on',
		array(
			'label'       => esc_html__( 'Show an emergency alert?', 'nightingale' ),
			'section'     => 'section_emergency',
			'description' => esc_html__( 'Do you wish to have an emergency banner showing sitewide? This should not be standard practice, this banner is for exceptional circumstances ONLY', 'nightingale' ),
			'type'        => 'radio',
			'choices'     => array(
				'yes' => esc_html__( 'Yes', 'nightingale' ),
				'no'  => esc_html__( 'No', 'nightingale' ),
			)
		)
		);
	$wp_customize->add_setting(
		'emergency_heading',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		'emergency_heading',
		array(
			'label'   => esc_html__( 'Emergency Alert Title', 'nightingale' ),
			'section' => 'section_emergency',
			'type'    => 'text',
		)
	);
	$wp_customize->add_setting(
		'emergency_content',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		'emergency_content',
		array(
			'label'   => esc_html__( 'Emergency Alert Content', 'nightingale' ),
			'section' => 'section_emergency',
			'type'    => 'textarea',
		)
	);
	$wp_customize->add_setting(
		'emergency_link',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		'emergency_link',
		array(
			'label'   => esc_html__( 'Emergency Alert Link (url) to Further Info', 'nightingale' ),
			'section' => 'section_emergency',
			'type'    => 'url',
		)
	);
	$wp_customize->add_setting(
		'emergency_link_title',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		'emergency_link_title',
		array(
			'label'   => esc_html__( 'Emergency Alert Text to Link', 'nightingale' ),
			'section' => 'section_emergency',
			'type'    => 'text',
		)
	);

	/*
	 * Emergency Date Options
	 */
	$wp_customize->add_setting(
		'emergency_date_on', array(
			'default'           => 'no',
			'sanitize_callback' => 'esc_attr',
		)
	);

	$wp_customize->add_control(
		'emergency_date_on',
		array(
			'label'       => esc_html__( 'Show last updated?', 'nightingale' ),
			'section'     => 'section_emergency',
			'description' => esc_html__( 'Do you wish to show the date this message was last updated?', 'nightingale' ),
			'type'        => 'radio',
			'choices'     => array(
				'yes' => esc_html__( 'Yes', 'nightingale' ),
				'no'  => esc_html__( 'No', 'nightingale' ),
			)
		)
		);
	$wp_customize->add_setting(
		'emergency_date',
		array(
			'default'           => false,
			'sanitize_callback' => 'nightingale_sanitize_date',
		)
	);
	$wp_customize->add_control(
		'emergency_date',
		array(
			'label'       => esc_html__( 'Date Last Updated', 'nightingale' ),
			'section'     => 'section_emergency',
			'type'        => 'date',
			'input_attrs' => array(
				'placeholder' => __( 'mm/dd/yyyy', 'nightingale' ),
			)
		)
	);
}

add_action( 'customize_register', 'nightingale_companion_customize_register' );
