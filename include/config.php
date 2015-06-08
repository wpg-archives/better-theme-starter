<?php

/**
 * Translation domain name for this plugin
 */
define( 'THEMESTARTER_DOMAIN', 'themestarter-theme' );

if ( ! defined('SCRIPT_DEBUG') ) {
	define( 'SCRIPT_DEBUG', WP_DEBUG );
}

/**
 * Paths (url and directory)
 */
define( 'THEMESTARTER_URL', esc_url( home_url( '/' ) ) );

define( 'THEMESTARTER_URL_THEME', get_template_directory_uri() );
define( 'THEMESTARTER_DIR_THEME', get_template_directory() );

define( 'THEMESTARTER_URL_STYLES', THEMESTARTER_URL_THEME . '/css' );
define( 'THEMESTARTER_DIR_STYLES', THEMESTARTER_DIR_THEME . '/css' );

define( 'THEMESTARTER_URL_SCRIPTS', THEMESTARTER_URL_THEME . '/js' );
define( 'THEMESTARTER_DIR_SCRIPTS', THEMESTARTER_DIR_THEME . '/js' );

define( 'THEMESTARTER_URL_IMAGES', THEMESTARTER_URL_THEME . '/images' );
define( 'THEMESTARTER_DIR_IMAGES', THEMESTARTER_DIR_THEME . '/images' );

define( 'THEMESTARTER_URL_INCLUDE', THEMESTARTER_URL_THEME . '/include' );
define( 'THEMESTARTER_DIR_INCLUDE', THEMESTARTER_DIR_THEME . '/include' );

define( 'THEMESTARTER_URL_LIB', THEMESTARTER_URL_INCLUDE . '/lib' );
define( 'THEMESTARTER_DIR_LIB', THEMESTARTER_DIR_INCLUDE . '/lib' );


/**
* MENUS
*/
define( 'THEMESTARTER_MENU_SIDEBAR_SLUG', 'themestarter_menu_sidebar' );

/**
* SIDEBAR AND WIDGETS
*/
define( 'THEMESTARTER_SIDEBAR_SLUG', 'themestarter_sidebar_left' );

/**
* OPTIONS
*/
define( 'THEMESTARTER_OPTION_SLUG', 'themestarter_section_themestarter' );
define( 'THEMESTARTER_OPTION_SLUG_COPYRIGHT', 'themestarter_copyright' );
define( 'THEMESTARTER_OPTION_SLUG_BANNER', 'themestarter_banner' );

/**
 * CUSTOM POST AND TAXOS
 */
define( 'THEMESTARTER_CUSTOM_POST_EXAMPLE_SLUG', 'themestarter_cp_example' );