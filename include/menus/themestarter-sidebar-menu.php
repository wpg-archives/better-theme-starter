<?php

if ( ! function_exists( 'themestarter_widget_nav_menu' ) ) :
function themestarter_widget_nav_menu($nav_menu_args, $nav_menu, $args) {
	$menu_sidebar_args = array(
		'theme_location'  => THEMESTARTER_MENU_SIDEBAR_SLUG,
		'container'       => false,
		'menu_class'      => '',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => false,
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
	//	'items_wrap'      => '<h2>' . $menu->name . '</h2><ul class="nav nav-sidebar">%3$s<li></li></ul>',
		'items_wrap'      => '<ul class="nav nav-sidebar">%3$s<li></li></ul>',
		'depth'           => 0,
	);

	return $menu_sidebar_args;
}
endif;
add_filter( 'widget_nav_menu_args', 'themestarter_widget_nav_menu', 10, 3 );