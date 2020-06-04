<?php
/**
 * Nightingale Companion Plugin settings.
 *
 * @package nightingale-companion
 * @copyright NHS Leadership Academy, Nick Summerfield & Tony Blacker
 * @version 1.0 3rd June 2020
 */

/**
 * Code adding in the options page for the companion plugin that will allow the user to chose which elements of the
 * plugin are activated.
 */

class NightingaleCompanion {
	private $nightingale_companion_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'nightingale_companion_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'nightingale_companion_page_init' ) );
	}

	public function nightingale_companion_add_plugin_page() {
		add_options_page(
			'Nightingale Companion', // page_title
			'Nightingale Companion', // menu_title
			'manage_options', // capability
			'nightingale-companion', // menu_slug
			array( $this, 'nightingale_companion_create_admin_page' ) // function
		);
	}

	public function nightingale_companion_create_admin_page() {
		$this->nightingale_companion_options = get_option( 'nightingale_companion_option_name' ); ?>

		<div class="wrap">
			<h2>Nightingale Companion</h2>
			<div class="notice notice-info"><p>Settings to facilitate the Nightingale Companion plugin. Performance Settings here mean you can optimise your site in one easy bang.</p><p>The defaults when you install the plugin will make your site super speedy and reliable, so you <b>shouldn't need to modify</b> anything...</p></div>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
				settings_fields( 'nightingale_companion_option_group' );
				do_settings_sections( 'nightingale-companion-admin' );
				submit_button();
				?>
			</form>
		</div>
	<?php }

	public function nightingale_companion_page_init() {
		register_setting(
			'nightingale_companion_option_group', // option_group
			'nightingale_companion_option_name', // option_name
			array( $this, 'nightingale_companion_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'nightingale_companion_setting_section', // id
			'Settings', // title
			array( $this, 'nightingale_companion_section_info' ), // callback
			'nightingale-companion-admin' // page
		);

		add_settings_field(
			'retina_images_0', // id
			'Retina Images', // title
			array( $this, 'retina_images_0_callback' ), // callback
			'nightingale-companion-admin', // page
			'nightingale_companion_setting_section' // section
		);

		add_settings_field(
			'load_css_1', // id
			'Load CSS', // title
			array( $this, 'load_css_1_callback' ), // callback
			'nightingale-companion-admin', // page
			'nightingale_companion_setting_section' // section
		);

		add_settings_field(
			'instantpage_2', // id
			'InstantPage', // title
			array( $this, 'instantpage_2_callback' ), // callback
			'nightingale-companion-admin', // page
			'nightingale_companion_setting_section' // section
		);

		add_settings_field(
			'defer_js_3', // id
			'Defer JS', // title
			array( $this, 'defer_js_3_callback' ), // callback
			'nightingale-companion-admin', // page
			'nightingale_companion_setting_section' // section
		);

		add_settings_field(
			'set_browser_cache_4', // id
			'Set Browser Cache', // title
			array( $this, 'set_browser_cache_4_callback' ), // callback
			'nightingale-companion-admin', // page
			'nightingale_companion_setting_section' // section
		);

		add_settings_field(
			'enable_lazyloading_5', // id
			'Enable LazyLoading?', // title
			array( $this, 'enable_lazyloading_5_callback' ), // callback
			'nightingale-companion-admin', // page
			'nightingale_companion_setting_section' // section
		);

		add_settings_field(
			'disable_emojis_6', // id
			'Disable Emojis?', // title
			array( $this, 'disable_emojis_6_callback' ), // callback
			'nightingale-companion-admin', // page
			'nightingale_companion_setting_section' // section
		);

		add_settings_field(
			'cleanup_wp_header_7', // id
			'Cleanup WordPress Meta Tags?', // title
			array( $this, 'cleanup_wp_header_7_callback' ), // callback
			'nightingale-companion-admin', // page
			'nightingale_companion_setting_section' // section
		);
		add_settings_field(
			'move_to_footer_8', // id
			'Scripts and Styles to Footer', // title
			array( $this, 'move_to_footer_8_callback' ), // callback
			'nightingale-companion-admin', // page
			'nightingale_companion_setting_section' // section
		);
	}

	public function nightingale_companion_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['retina_images_0'] ) ) {
			$sanitary_values['retina_images_0'] = $input['retina_images_0'];
		}

		if ( isset( $input['load_css_1'] ) ) {
			$sanitary_values['load_css_1'] = $input['load_css_1'];
		}

		if ( isset( $input['instantpage_2'] ) ) {
			$sanitary_values['instantpage_2'] = $input['instantpage_2'];
		}

		if ( isset( $input['defer_js_3'] ) ) {
			$sanitary_values['defer_js_3'] = $input['defer_js_3'];
		}

		if ( isset( $input['set_browser_cache_4'] ) ) {
			$sanitary_values['set_browser_cache_4'] = sanitize_text_field( $input['set_browser_cache_4'] );
		}

		if ( isset( $input['enable_lazyloading_5'] ) ) {
			$sanitary_values['enable_lazyloading_5'] = $input['enable_lazyloading_5'];
		}

		if ( isset( $input['disable_emojis_6'] ) ) {
			$sanitary_values['disable_emojis_6'] = $input['disable_emojis_6'];
		}

		if ( isset( $input['cleanup_wp_header_7'] ) ) {
			$sanitary_values['cleanup_wp_header_7'] = $input['cleanup_wp_header_7'];
		}

		if ( isset( $input['move_to_footer_8'] ) ) {
			$sanitary_values['move_to_footer_8'] = $input['move_to_footer_8'];
		}

		return $sanitary_values;
	}

	public function nightingale_companion_section_info() {

	}

	public function retina_images_0_callback() {
		printf(
			'<input type="checkbox" name="nightingale_companion_option_name[retina_images_0]" id="retina_images_0" value="retina_images_0" %s> <label for="retina_images_0">Enable retina display using retina.js?</label>',
			( isset( $this->nightingale_companion_options['retina_images_0'] ) && $this->nightingale_companion_options['retina_images_0'] === 'retina_images_0' ) ? 'checked' : ''
		);
	}

	public function load_css_1_callback() {
		printf(
			'<input type="checkbox" name="nightingale_companion_option_name[load_css_1]" id="load_css_1" value="load_css_1" %s> <label for="load_css_1">Enable loadcss library to asynchronously load css files and improve performance?</label>',
			( isset( $this->nightingale_companion_options['load_css_1'] ) && $this->nightingale_companion_options['load_css_1'] === 'load_css_1' ) ? 'checked' : ''
		);
	}

	public function instantpage_2_callback() {
		printf(
			'<input type="checkbox" name="nightingale_companion_option_name[instantpage_2]" id="instantpage_2" value="instantpage_2" %s> <label for="instantpage_2">Enable instantpage library - this starts a page loading when a mouse hovers over it which improves User Experience? </label>',
			( isset( $this->nightingale_companion_options['instantpage_2'] ) && $this->nightingale_companion_options['instantpage_2'] === 'instantpage_2' ) ? 'checked' : ''
		);
	}

	public function defer_js_3_callback() {
		printf(
			'<input type="checkbox" name="nightingale_companion_option_name[defer_js_3]" id="defer_js_3" value="defer_js_3" %s> <label for="defer_js_3">Defer loading of JS to increase speed of visible page load? (Note this does not actually improve overall speed, just the speed of loading for users to be able to interact with the screen)</label>',
			( isset( $this->nightingale_companion_options['defer_js_3'] ) && $this->nightingale_companion_options['defer_js_3'] === 'defer_js_3' ) ? 'checked' : ''
		);
	}

	public function set_browser_cache_4_callback() {
		printf(
			'<input class="regular-text" type="text" name="nightingale_companion_option_name[set_browser_cache_4]" id="set_browser_cache_4" value="%s">',
			isset( $this->nightingale_companion_options['set_browser_cache_4'] ) ? esc_attr( $this->nightingale_companion_options['set_browser_cache_4']) : '43200'
		);
	}

	public function enable_lazyloading_5_callback() {
		printf(
			'<input type="checkbox" name="nightingale_companion_option_name[enable_lazyloading_5]" id="enable_lazyloading_5" value="enable_lazyloading_5" %s> <label for="enable_lazyloading_5">Lazy Loading delays resources loading until the point they are in display. This improves performance on pages with images and videos.</label>',
			( isset( $this->nightingale_companion_options['enable_lazyloading_5'] ) && $this->nightingale_companion_options['enable_lazyloading_5'] === 'enable_lazyloading_5' ) ? 'checked' : ''
		);
	}

	public function disable_emojis_6_callback() {
		printf(
			'<input type="checkbox" name="nightingale_companion_option_name[disable_emojis_6]" id="disable_emojis_6" value="disable_emojis_6" %s> <label for="disable_emojis_6">Take WordPress emoji library out of being auto loaded?</label>',
			( isset( $this->nightingale_companion_options['disable_emojis_6'] ) && $this->nightingale_companion_options['disable_emojis_6'] === 'disable_emojis_6' ) ? 'checked' : ''
		);
	}

	public function cleanup_wp_header_7_callback() {
		printf(
			'<input type="checkbox" name="nightingale_companion_option_name[cleanup_wp_header_7]" id="cleanup_wp_header_7" value="cleanup_wp_header_7" %s> <label for="cleanup_wp_header_7">Remove a lot of clutter from WP headers?</label>',
			( isset( $this->nightingale_companion_options['cleanup_wp_header_7'] ) && $this->nightingale_companion_options['cleanup_wp_header_7'] === 'cleanup_wp_header_7' ) ? 'checked' : ''
		);
	}

	public function move_to_footer_8_callback() {
		printf(
			'<input type="checkbox" name="nightingale_companion_option_name[move_to_footer_8]" id="move_to_footer_8" value="move_to_footer_8" %s> <label for="move_to_footer_8">Move all scripts and styles to footer (improves visible loading)?</label>',
			( isset( $this->nightingale_companion_options['move_to_footer_8'] ) && $this->nightingale_companion_options['move_to_footer_8'] === 'move_to_footer_8' ) ? 'checked' : ''
		);
	}


}
if ( is_admin() )
	$nightingale_companion = new NightingaleCompanion();

/*
 * Retrieve this value with:
 * $nightingale_companion_options = get_option( 'nightingale_companion_option_name' ); // Array of All Options
 * $retina_images_0 = $nightingale_companion_options['retina_images_0']; // Retina Images
 * $load_css_1 = $nightingale_companion_options['load_css_1']; // Load CSS
 * $instantpage_2 = $nightingale_companion_options['instantpage_2']; // InstantPage
 * $defer_js_3 = $nightingale_companion_options['defer_js_3']; // Defer JS
 * $set_browser_cache_4 = $nightingale_companion_options['set_browser_cache_4']; // Set Browser Cache
 * $enable_lazyloading_5 = $nightingale_companion_options['enable_lazyloading_5']; // Enable LazyLoading?
 * $disable_emojis_6 = $nightingale_companion_options['disable_emojis_6']; // Disable Emojis?
 * $cleanup_wp_header_7 = $nightingale_companion_options['cleanup_wp_header_7']; // Cleanup WP meta tags?
 * $move_to_footer_8 = $nightingale_companion_options['move_to_footer_8']; // Move scripts/styles to footer?
 *
 */
