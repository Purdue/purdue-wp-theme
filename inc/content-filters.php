<?php

/**
 * Change the oembed HTML for youtube to use youtube-lite.
 *
 * @param string $html The HTML.
 * @param string $url  The URL.
 * @return string
 */
function youtube_lite_embed_oembed_html( $html, $url ) {
	if ( ! empty($url) ) {
		if ( 1 === preg_match( '/(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $url, $matches ) ) {
			$html = sprintf(
				'<lite-youtube class="youtube-lite" videoid="%s" params="rel=0"></lite-youtube>',
				$matches[1] ?: $matches[2]
			);
		}
	}
	return $html;
}

function check_youtube_lite_status() {
	add_filter( 'embed_oembed_html','youtube_lite_embed_oembed_html', 11, 2 );
}
add_action( 'init', 'check_youtube_lite_status' );