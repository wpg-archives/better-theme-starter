<?php

// SECTION

$wp_customize->add_section( THEMESTARTER_OPTION_SLUG , array(
	'title'      => THEMESTARTER_OPTION_LABEL,
	'priority'   => 20,
) );

// COPYRIGHT

$wp_customize->add_setting( THEMESTARTER_OPTION_SLUG_COPYRIGHT, array(
	'default'    => get_option( THEMESTARTER_OPTION_SLUG_COPYRIGHT, '' ),
	'type'       => 'option',
	'capability' => 'manage_options',
) );

$wp_customize->add_control( THEMESTARTER_OPTION_SLUG_COPYRIGHT, array(
	'label'      => __( THEMESTARTER_OPTION_LABEL_COPYRIGHT ),
	'section'    => THEMESTARTER_OPTION_SLUG,
) );

// BANNER

$wp_customize->add_setting( THEMESTARTER_OPTION_SLUG_BANNER, array(
        'default'    => get_option( THEMESTARTER_OPTION_SLUG_BANNER, '' ),
        'type'       => 'option',
        'capability' => 'manage_options',
) );

$wp_customize->add_control(
     new WP_Customize_Image_Control(
         $wp_customize,
         THEMESTARTER_OPTION_SLUG_BANNER,
         array(
             'label'          => THEMESTARTER_OPTION_LABEL_BANNER,
             'section'        => THEMESTARTER_OPTION_SLUG,
             'settings'       => THEMESTARTER_OPTION_SLUG_BANNER
         )
     )
);