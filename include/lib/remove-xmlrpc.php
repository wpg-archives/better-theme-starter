<?php

remove_action( 'wp_head', 'rsd_link' );

add_filter( 'xmlrpc_enabled', '__return_false' );
