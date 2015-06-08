<?php

/**
 * Load the scripts
 *
 * @since 1.0.0
 *
 */
if ( ! function_exists( 'themestarter_scripts' ) ) {
	function themestarter_scripts() {

		// HEADER
		//wp_enqueue_script( 'example', THEMESTARTER_URL_SCRIPTS . '/example.js', array(), false, false );


		// JQUERY
		if( ! is_admin() ) {
			//wp_deregister_script( 'jquery' );
			//wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js', array(), false, true );
		}

		// FOOTER
		//wp_enqueue_script( 'example', THEMESTARTER_URL_SCRIPTS . '/example.js', array(), false, true );

		// CONDITIONNAL TAGS
	    //global $wp_scripts;
	    //$wp_scripts->registered['example']->add_data( 'conditional', 'lt IE 9' );
	}
	add_action( 'wp_enqueue_scripts', 'themestarter_scripts', 10);
}