<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo THEMESTARTER_URL_IMAGES; ?>/favicon.ico">

    <title><?php echo get_bloginfo( 'name' ) . ' - ' . get_bloginfo( 'description' ); ?></title>

    <?php wp_head(); ?>

  </head>

  <body>
