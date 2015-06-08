<?php

/**
 * Setup the Theme Customizer settings and controls
 * 
 * @link http://codex.wordpress.org/Theme_Customization_API
 */
if ( ! function_exists( 'themestarter_customize_theme' ) ) :
	function themestarter_customize_theme ( $wp_customize ) {

		if ( empty($wp_customize) ) {
			return;
		}

		// SECTION TITLE AND TAGLINE
		require_once THEMESTARTER_DIR_INCLUDE . '/theme-customization-api/section_themestarter.php';

	}
	add_action( 'customize_register' , 'themestarter_customize_theme');
endif; // themestarter_register