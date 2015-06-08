<?php

/**
 * Load the styles
 *
 * @since 1.0.0
 *
 */
if ( ! function_exists( 'themestarter_styles' ) ) {
	function themestarter_styles() {
		//wp_enqueue_style( 'themestarter-example', THEMESTARTER_URL_STYLES . '/example.css', false );
		wp_enqueue_style( 'themestarter-style', THEMESTARTER_URL_THEME . '/style.css', false );
	}
	add_action( 'wp_enqueue_scripts', 'themestarter_styles', 10);
}