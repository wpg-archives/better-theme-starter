<?php

// WIDGETS CLASSES
require_once THEMESTARTER_DIR_INCLUDE . '/widgets/widget-text-no-container.php';

/**
 * Setup the Theme Sidebar
 * 
 * @link https://codex.wordpress.org/Sidebars
 */
if ( ! function_exists( 'themestarter_init_sidebar' ) ) :
	function themestarter_init_sidebar () {

	    register_sidebar( array(
	        'name' => THEMESTARTER_SIDEBAR_NAME,
	        'id' => THEMESTARTER_SIDEBAR_SLUG,
	        'description' => THEMESTARTER_SIDEBAR_DESC,
	        'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
	    ) );

	}
	add_action( 'widgets_init' , 'themestarter_init_sidebar');
endif; // themestarter_init_sidebar


/**
 * Setup the Theme Widgets
 * 
 * @link https://codex.wordpress.org/Function_Reference/register_widget
 */
if ( ! function_exists( 'themestarter_init_widgets' ) ) :

	function themestarter_init_widgets () {

		if ( class_exists( 'THEMESTARTER_Widget_Text_No_Container' ) ) {
			unregister_widget( 'WP_Widget_Text' );
			register_widget( 'THEMESTARTER_Widget_Text_No_Container' );
		}

		if ( class_exists( 'THEMESTARTER_Widget_Glossary' ) ) {
			register_widget( 'THEMESTARTER_Widget_Glossary' );
		}

	}
	add_action( 'widgets_init' , 'themestarter_init_widgets' );

endif; // themestarter_init_widgets
