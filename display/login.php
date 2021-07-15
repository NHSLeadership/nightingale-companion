<?php
/**
 * Customise the login page
 *
 * @param https://codex.wordpress.org/Customizing_the_Login_Form
 *
 * @copyright NHS Leadership Acadenightingale, Tony Blacker
 * @version 1.0 22nd October 2019
 * @package Nightingale
 */

/**
 * Add in a bit of extra css for the login logo wrapper.
 */
function nightingale_login_logo() { ?>
	<style type="text/css">
		.nhsuk-header__search-wrap, .nhsuk-breadcrumb, #login h1 {
			display: none !important;
		}

		.nhsuk-main-wrapper {
			padding-top: 0 !important;
		}

		#content {
			background: #f0f4f5;
		}
	</style>
	<?php
}

add_action( 'login_enqueue_scripts', 'nightingale_login_logo' );

/**
 * Get the url for any user submitted URL
 *
 * @return string|void url
 */
function nightingale_companion_login_logo_url() {
	return home_url();
}

add_filter( 'login_headerurl', 'nightingale_companion_login_logo_url' );

// apply site colour to the login page as well.
add_filter( 'login_body_class', 'nightingale_custom_page_colour' );

/**
 * Add in extra divs around the header output.
 */
function nightingale_companion_login_header_styler() {
	get_template_part( 'header' );
	echo '<div id="content" class="nhsuk-width-container nhsuk-width-container--full">
			<main class="nhsuk-main-wrapper nhsuk-main-wrapper--no-padding" id="maincontent">
				<div id="contentinner" class="nhsuk-width-container">
					<div id="primary" class="nhsuk-grid-row">
						<div class="nhsuk-grid-column-full-width">
							<div class="nhsuk-panel-with-label">
								<h3 class="nhsuk-panel-with-label__label">Login</h3>';
}

add_action( 'login_header', 'nightingale_companion_login_header_styler' );


/**
 * Add in Nightingale Footer div closures.
 */
function nightingale_companion_login_footer_styler() {
	echo '					</div>
						</div>
					</div>
				</div>
			</main>
		  </div>';
	get_template_part( 'footer' );
}

add_action( 'login_footer', 'nightingale_companion_login_footer_styler' );
