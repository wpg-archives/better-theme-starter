<?php

if( ! function_exists('themestarter_hide_wp_version_generator_tag') ) {
	function themestarter_hide_wp_version_generator_tag() {
		return '';
	}
	add_filter('the_generator', 'themestarter_hide_wp_version_generator_tag');
}

if( ! function_exists('themestarter_hide_wp_version_styles_scripts') ) {
	function themestarter_hide_wp_version_styles_scripts( $string ) {
	     global $wp_version;
	     parse_str(parse_url($string, PHP_URL_QUERY), $query);
	     if ( !empty($query['ver']) && $query['ver'] === $wp_version ) {
	          $string = remove_query_arg('ver', $string);
	     }
	     return $string;
	}
	add_filter( 'script_loader_src', 'themestarter_hide_wp_version_styles_scripts' );
	add_filter( 'style_loader_src', 'themestarter_hide_wp_version_styles_scripts' );
}