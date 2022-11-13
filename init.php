<?php
/*
 * All Fame Theme Related Functions Files are Linked here
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/* Theme All Basic Setup */
require_once( FAME_FRAMEWORK . '/theme-support.php' );
require_once( FAME_FRAMEWORK . '/backend-functions.php' );
require_once( FAME_FRAMEWORK . '/frontend-functions.php' );
require_once( FAME_FRAMEWORK . '/enqueue-files.php' );
require_once( FAME_FRAMEWORK . '/case-ajax-post.php' );
require_once( FAME_FRAMEWORK . '/portfolio-ajax-post.php' );
require_once( FAME_CS_FRAMEWORK . '/config.php' );

/* Bootstrap Menu Walker */
require_once( FAME_FRAMEWORK . '/core/vt-mmenu/wp_bootstrap_navwalker.php' );

/* Install Plugins */
require_once( FAME_FRAMEWORK . '/plugins/notify/activation.php' );

/* Sidebars */
require_once( FAME_FRAMEWORK . '/core/sidebars.php' );
