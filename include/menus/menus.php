<?php

// LOAD CUSTOM WALKERS FOR THEMESTARTER MENUS
//require_once THEMESTARTER_DIR_INCLUDE . '/menus/themestarter-footer-menu.php';
//require_once THEMESTARTER_DIR_INCLUDE . '/menus/themestarter-sidebar-menu.php';

/**
 * Register Juriecole Menus
 *
 * @since 1.0.0
 *
 */
if ( ! function_exists( 'themestarter_register_menus' ) ) :
function themestarter_register_menus() {
	register_nav_menus( array(
		//THEMESTARTER_MENU_SIDEBAR_SLUG => THEMESTARTER_MENU_SIDEBAR_NAME,
		//THEMESTARTER_MENU_FOOTER_SLUG => THEMESTARTER_MENU_FOOTER_NAME,
	) );
}
endif;
add_action( 'init', 'themestarter_register_menus' );
