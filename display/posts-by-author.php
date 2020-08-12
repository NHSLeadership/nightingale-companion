<?php
/**
 * Display other posts by same author on blog page
 *
 * @param     https://codex.wordpress.org/Customizing_the_Login_Form
 *
 * @copyright NHS Leadership Acadenightingale, Tony Blacker
 * @version   1.0 22nd October 2019
 * @package   Nightingale
 */

function nightingale_companion_postsby_author( $content ) {
	global $post;
	if ( is_single() && isset( $post->post_author ) ) {
		$authorid = get_the_author_meta( 'ID', $post->post_author );
		//$authors_posts = get_posts( array( 'author' => $authorid, 'post__not_in' => array( $post->ID ), 'posts_per_page' => 5 ) );
		$args = array (
			'posts_per_page' => '6',
			'author' => $authorid,
			'post_type' => 'post',
			'post__not_in' => array( $post->ID),
		);
		$authors_posts = new WP_Query( $args );
		$sidebar       = ( 'true' === get_theme_mod( 'blog_sidebar' ) );
		if ( $sidebar ) :
			$sideclass = 'nhsuk-grid-column-one-half ';
		else :
			$sideclass = 'nhsuk-grid-column-one-third ';
		endif;
		$display_name = get_the_author_meta( 'display_name', $post->post_author );
		$output = '<h4>Read other posts by ' . $display_name . '</h4><div class="nhsuk-grid-row nhsuk-promo-group">';
		//foreach ( $authors_posts as $authors_post ) {
		while ( $authors_posts->have_posts() ) : $authors_posts->the_post();
			if ( has_post_thumbnail() ) :

				$image = the_post_thumbnail( 'thumbnail', [ 'class' => 'nhsuk-promo__img' ] );

			else :

				$fallback = get_theme_mod( 'blog_fallback' );

				if ( $fallback ) {
					$image = wp_get_attachment_image( $fallback, 'thumbnail', false, [ 'class' => 'nhsuk-promo__img' ] );
				} else {
					$image = '';
				}
			endif;
			$link  = get_the_permalink();
			$title = get_the_title();
			$date = get_the_date();
			if ( has_excerpt() ) {
				$excerpt = '<p>' . get_the_excerpt() . '</p>';
			} else {
				$excerpt = '';
			}
			$output .= '<div class="' . $sideclass . 'nhsuk-promo-group__item">';
			$output .= '<div class="nhsuk-promo">
			<a class="nhsuk-promo__link-wrapper" href="' . $link . '">' . $image;
			$output .= '<div class="nhsuk-promo__content">';
			$output .= '<h2 class="nhsuk-promo__heading">' . $title . '</h2>';
			$output .= '<span class="nhsuk-body-s entry-date">' . $date . '</span>';
			$output .= $excerpt;
			$output .= '</div></a></div></div>';
			//}
		endwhile;
		$output .= '</div>';
		$content = $content . $output;
	}

	wp_reset_postdata();
	return $content;
}

add_action( 'the_content', 'nightingale_companion_postsby_author' );

