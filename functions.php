<?php
/*
 * Fame Theme's Functions
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/**
 * Define - Folder Paths
 */
define( 'FAME_THEMEROOT_PATH', get_template_directory() );
define( 'FAME_THEMEROOT_URI', get_template_directory_uri() );
define( 'FAME_CSS', FAME_THEMEROOT_URI . '/assets/css' );
define( 'FAME_IMAGES', FAME_THEMEROOT_URI . '/assets/images' );
define( 'FAME_SCRIPTS', FAME_THEMEROOT_URI . '/assets/js' );
define( 'FAME_FRAMEWORK', get_template_directory() . '/inc' );
define( 'FAME_LAYOUT', get_template_directory() . '/layouts' );
define( 'FAME_CS_IMAGES', FAME_THEMEROOT_URI . '/inc/theme-options/theme-extend/images' );
define( 'FAME_CS_FRAMEWORK', get_template_directory() . '/inc/theme-options/theme-extend' ); // Called in Icons field *.json
define( 'FAME_ADMIN_PATH', get_template_directory() . '/inc/theme-options/cs-framework' ); // Called in Icons field *.json

/**
 * Define - Global Theme Info's
 */
if (is_child_theme()) { // If Child Theme Active
	$fame_theme_child = wp_get_theme();
	$fame_get_parent = $fame_theme_child->Template;
	$fame_theme = wp_get_theme($fame_get_parent);
} else { // Parent Theme Active
	$fame_theme = wp_get_theme();
}
define('FAME_NAME', $fame_theme->get( 'Name' ));
define('FAME_VERSION', $fame_theme->get( 'Version' ));
define('FAME_BRAND_URL', $fame_theme->get( 'AuthorURI' ));
define('FAME_BRAND_NAME', $fame_theme->get( 'Author' ));

/**
 * All Main Files Include
 */
require_once( FAME_FRAMEWORK . '/init.php' );
