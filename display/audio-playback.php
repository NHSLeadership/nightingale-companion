<?php
/**
 * Forked from: Media Playback Speed (Forked)
 * Description: Appends playback buttons to the Audio Player, Video Player & PLaylist shortcodes. Based on original by Daron Spence.
 * Author: LewisCowles
 * Version: 1.1.5
 *
 * Modified for Nightingale Companion plugin audio embed (Gutenberg block) by Tony Blacker, August 2020
 */
function nightingale_companion_audio_playback_speed() {
	global $wp_query;
	$posts   = $wp_query->posts;
	$pattern = '<audio';
	if ( is_singular() ) {
		foreach ( $posts as $post ) {
			if ( preg_match_all( '/' . $pattern . '/s', $post->post_content, $matches ) ) {

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_script(
		'cd2-media-playback-speed-js',
		plugins_url( 'js/playback-speed.js', __FILE__ ),
		[],
		'1.1.5',
		true
	);
}, 1, 100 );

add_action( 'wp_footer', function () {
	$defaults = array(
		array( 'rate' => 0.5, 'title' => __( 'Playback Speed 0.5x', 'media-playback-speed' ), 'label' => __( '0.5x', 'media-playback-speed' ) ),
		array( 'rate' => 0.75, 'title' => __( 'Playback Speed 0.75x', 'media-playback-speed' ), 'label' => __( '0.75x', 'media-playback-speed' ) ),
		array( 'rate' => 1.0, 'title' => __( 'Playback Speed 1x', 'media-playback-speed' ), 'label' => __( '1x', 'media-playback-speed' ) ),
		array( 'rate' => 1.25, 'title' => __( 'Playback Speed 1.25x', 'media-playback-speed' ), 'label' => __( '1.25x', 'media-playback-speed' ) ),
		array( 'rate' => 1.5, 'title' => __( 'Playback Speed 1.5x', 'media-playback-speed' ), 'label' => __( '1.5x', 'media-playback-speed' ) ),
		array( 'rate' => 1.75, 'title' => __( 'Playback Speed 1.75x', 'media-playback-speed' ), 'label' => __( '1.75x', 'media-playback-speed' ) ),
		array( 'rate' => 2.0, 'title' => __( 'Playback Speed 2x', 'media-playback-speed' ), 'label' => __( '2x', 'media-playback-speed' ) ),
	);
	?>
    <style>
        .mejs-button:first-of-type:before {
            content   : 'Speed: ';
            font-size : 0.75rem;
            color     : #4c6272;
        }

        .mejs-button {
            float    : left;
            position : relative;
            top      : 10px;
            left     : 10px;
        }

        .mejs-button.blank-button > button {
            background : transparent;
            color      : #4c6272;
            font-style : italic;
            border     : none;
            font-size  : 0.75em;
            width      : auto;
        }

        .mejs-button.blank-button > button.mejs-active {
            color         : #ffffff;
            font-style    : normal;
            background    : #005eb8;
            border-radius : 4px;
        }

        .wp-block-audio:after {
            clear   : both;
            content : '';
            display : table;
        }

        .wp-block-audio audio {
            width : unset !important;
            float : left;
        }
    </style>
    <script type="text/template" id="playback-buttons-template">
		<?php if ( apply_filters( 'media-playback-speed-generate-controls', true ) ): ?>
			<?php foreach ( apply_filters( 'media-playback-speed-data', $defaults ) as $item ): ?>
                <div class="mejs-button blank-button">
                    <button type="button" class="playback-rate-button<?php echo( ( $item[ 'rate' ] == 1 ) ? ' mejs-active active-playback-rate' : '' ); ?>" data-value="<?php echo esc_attr( $item[ 'rate' ] ); ?>" title="<?php echo esc_attr( $item[ 'title' ] ); ?>" aria-label="<?php echo esc_attr( $item[ 'title' ] ); ?>" tabindex="0"><?php echo esc_html( $item[ 'label' ] ); ?></button>
                </div>
			<?php endforeach; ?>
		<?php endif; ?>
    </script>
	<?php
}, 1, 100 );
			}
		}
	}
}

add_action ( 'wp', 'nightingale_companion_audio_playback_speed');
