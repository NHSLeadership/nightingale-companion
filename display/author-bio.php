<?php
/**
 * Display an author bio section on blog pages
 *
 * @param     https://codex.wordpress.org/Customizing_the_Login_Form
 *
 * @copyright NHS Leadership Acadenightingale, Tony Blacker
 * @version   1.0 22nd October 2019
 * @package   Nightingale
 */


function nightingale_companion_author_bio( $content ) {
	global $post;
	if ( is_single() && isset( $post->post_author ) ) {

		$display_name = get_the_author_meta( 'display_name', $post->post_author );
		if ( !empty( $display_name ) ) {
			//$display_name = get_the_author_meta( 'nickname', $post->post_author );

			$user_description = get_the_author_meta( 'user_description', $post->post_author );

			$user_website = get_the_author_meta( 'url', $post->post_author );

			$user_posts = get_author_posts_url( get_the_author_meta( 'ID', $post->post_author ) );
			$author_details = '<div id="author_bio" class="nhsuk-panel-with-label author_bio">';
			if ( ! empty( $display_name ) ) {
				$author_details .= '<h3 class="nhsuk-panel-with-label__label">' . $display_name . '</h3>';
			}

			if ( ! empty( $user_description ) ) {
				$author_details .= '<p class="author_details">';
				$author_details .= '<span class="author_pic" style="float: left; padding: 0 10px 10px 0">' . get_avatar( get_the_author_meta( 'user_email' ), 90 ) . '</span>';
				$author_details .= nl2br( $user_description ) . '</p>';
			}

			$author_details .= '<div class="nhsuk-action-link"><a class="nhsuk-action-link__link" href="' . $user_posts . '">
			<svg class="nhsuk-icon nhsuk-icon__arrow-right-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">
      <path d="M0 0h24v24H0z" fill="none"></path>
      <path d="M12 2a10 10 0 0 0-9.95 9h11.64L9.74 7.05a1 1 0 0 1 1.41-1.41l5.66 5.65a1 1 0 0 1 0 1.42l-5.66 5.65a1 1 0 0 1-1.41 0 1 1 0 0 1 0-1.41L13.69 13H2.05A10 10 0 1 0 12 2z"></path>
    </svg>
			<span class="nhsuk-action-link__text">View all posts by ' . $display_name . '</span></a></div>';

			if ( ! empty( $user_website ) ) {

				$author_details .= '<p style="float: right;" class="nhsuk-body-s"><a href="' . $user_website . '" target="_blank" rel="nofollow">External Link for ' . $display_name . '</a><p>';

			}

			$content = $content . '<footer class="author_bio">' . $author_details . '</footer></div>';
		}
	}

	return $content;
}

add_action( 'the_content', 'nightingale_companion_author_bio' );

remove_filter( 'pre_user_description', 'wp_filter_kses' );
