<?php

if ( ! function_exists( 'themestarter_setup' ) ) :
function themestarter_setup() {
	load_theme_textdomain( 'THEMESTARTER_DOMAIN', get_template_directory() . '/languages' );
	add_theme_support( 'post-thumbnails' ); 
}
endif; // themestarter_setup
add_action( 'after_setup_theme', 'themestarter_setup' );