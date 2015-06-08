<?php

// CONFIG
require_once get_template_directory() . '/include/config.php';

// SETUP
require_once THEMESTARTER_DIR_INCLUDE . '/theme-setup.php';

// LANG
require_once THEMESTARTER_DIR_INCLUDE . '/lang.php';

// FUNCTIONS
require_once THEMESTARTER_DIR_INCLUDE . '/functions.php';

// STYLES
require_once THEMESTARTER_DIR_INCLUDE . '/styles.php';

// SCRIPTS
require_once THEMESTARTER_DIR_INCLUDE . '/scripts.php';

// ADMIN
require_once THEMESTARTER_DIR_INCLUDE . '/admin.php';

// WIDGETS
require_once THEMESTARTER_DIR_INCLUDE . '/widgets/widgets.php';

// THEME CUSTOMIZATION API
require_once THEMESTARTER_DIR_INCLUDE . '/theme-customization-api/theme-customization-api.php';

// MENUS
require_once THEMESTARTER_DIR_INCLUDE . '/menus/menus.php';

// SHORTCODES
require_once THEMESTARTER_DIR_INCLUDE . '/shortcodes.php';

// CUSTOM POST TYPE : EXAMPLE
require_once THEMESTARTER_DIR_INCLUDE . '/custom-post-types/themestarter_cp_example.php';

// HIDE WORDPRESS VERSION
require_once THEMESTARTER_DIR_LIB . '/hide-wordpress-version.php';

// DISABLE EMOJIS
require_once THEMESTARTER_DIR_LIB . '/disable-emojis.php';

// REMOVE WLWMANIFEST
require_once THEMESTARTER_DIR_LIB . '/remove-wlwmanifest.php';

// REMOVE XMLRPC
require_once THEMESTARTER_DIR_LIB . '/remove-xmlrpc.php';
