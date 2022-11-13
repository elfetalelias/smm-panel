<?php
/*
 * All CSS and JS files are enqueued from this file
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/**
 * Enqueue Files for FrontEnd
 */
if ( ! function_exists( 'fame_vt_scripts_styles' ) ) {
  function fame_vt_scripts_styles() {

    // Styles
    wp_enqueue_style( 'font-awesome', FAME_CSS . '/font-awesome.min.css', array(), '4.7.0', 'all' );
    wp_enqueue_style( 'animate', FAME_CSS .'/animate.min.css', array(), '3.6.0', 'all' );
    wp_enqueue_style( 'themify-icons', FAME_CSS .'/themify-icons.min.css', array(), FAME_VERSION, 'all' );
    wp_enqueue_style( 'linea', FAME_CSS .'/linea.min.css', array(), FAME_VERSION, 'all' );
    wp_enqueue_style( 'loaders', FAME_CSS .'/loaders.min.css', array(), FAME_VERSION, 'all' );
    wp_enqueue_style( 'magnific-popup', FAME_CSS .'/magnific-popup.min.css', array(), FAME_VERSION, 'all' );
    wp_enqueue_style( 'nice-select', FAME_CSS .'/nice-select.min.css', array(), FAME_VERSION, 'all' );
    wp_enqueue_style( 'owl-carousel', FAME_CSS .'/owl.carousel.min.css', array(), '2.2.1', 'all' );
    wp_enqueue_style( 'meanmenu', FAME_CSS .'/meanmenu.css', array(), '2.0.7', 'all' );
    wp_enqueue_style( 'bootstrap', FAME_CSS .'/bootstrap.min.css', array(), '4.1.3', 'all' );
    wp_enqueue_style( 'fame-style', FAME_CSS .'/styles.css', array(), FAME_VERSION, 'all' );

    // Scripts
    wp_enqueue_script( 'popper', FAME_SCRIPTS . '/popper.min.js', array( 'jquery' ), FAME_VERSION, true );
    wp_enqueue_script( 'bootstrap', FAME_SCRIPTS . '/bootstrap.min.js', array( 'jquery' ), '4.1.3', true );
    wp_enqueue_script( 'html5shiv', FAME_SCRIPTS . '/html5shiv.min.js', array( 'jquery' ), '3.7.0', true );
    wp_enqueue_script( 'respond', FAME_SCRIPTS . '/respond.min.js', array( 'jquery' ), '1.4.2', true );
    wp_enqueue_script( 'placeholders', FAME_SCRIPTS . '/placeholders.min.js', array( 'jquery' ), '4.0.1', true );
    wp_enqueue_script( 'sticky', FAME_SCRIPTS . '/jquery.sticky.min.js', array( 'jquery' ), '1.0.4', true );
    wp_enqueue_script( 'nice-select', FAME_SCRIPTS . '/jquery.nice-select.min.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'sticky-sidebar', FAME_SCRIPTS . '/theia-sticky-sidebar.min.js', array( 'jquery' ), '1.5.0', true );
    wp_enqueue_script( 'matchHeight', FAME_SCRIPTS . '/jquery.matchHeight-min.js', array( 'jquery' ), '0.7.2', true );
    wp_enqueue_script( 'waypoints', FAME_SCRIPTS . '/waypoints.min.js', array( 'jquery' ), '2.0.3', true );
    wp_enqueue_script( 'page-scroll', FAME_SCRIPTS . '/page-scroll.min.js', array( 'jquery' ), '1.5.8', true );
    wp_enqueue_script( 'owl-carousel', FAME_SCRIPTS . '/owl.carousel.min.js', array( 'jquery' ), '2.1.6', true );
    wp_enqueue_script( 'isotope', FAME_SCRIPTS . '/isotope.min.js', array( 'jquery' ), '3.0.1', true );
    wp_enqueue_script( 'packery-mode', FAME_SCRIPTS . '/packery-mode.pkgd.min.js', array( 'jquery' ), '2.0.0', true );
    wp_enqueue_script( 'countdown', FAME_SCRIPTS . '/jquery.countdown.min.js', array( 'jquery' ), '1.6.2', true );
    wp_enqueue_script( 'counterup', FAME_SCRIPTS . '/jquery.counterup.min.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'magnific-popup', FAME_SCRIPTS . '/jquery.magnific-popup.min.js', array( 'jquery' ), '1.1.0', true );
    wp_enqueue_script( 'loaders', FAME_SCRIPTS . '/loaders.min.js', array( 'jquery' ), FAME_VERSION, true );
    wp_enqueue_script( 'meanmenu', FAME_SCRIPTS . '/jquery.meanmenu.js', array( 'jquery' ), '2.0.8', true );
    wp_enqueue_script( 'fame-scripts', FAME_SCRIPTS . '/scripts.js', array( 'jquery' ), FAME_VERSION, true );

    // Comments
    wp_enqueue_script( 'validate', FAME_SCRIPTS . '/jquery.validate.min.js', array( 'jquery' ), '1.9.0', true );
    wp_add_inline_script( 'validate', 'jQuery(document).ready(function($) {$("#commentform").validate({rules: {author: {required: true,minlength: 2},email: {required: true,email: true},comment: {required: true,minlength: 10}}});});' );

    // Dynamic Styles
    wp_enqueue_style( 'dynamic-style', FAME_THEMEROOT_URI . '/inc/dynamic-style.php', array(), FAME_VERSION, 'all' );

    // Responsive
    wp_enqueue_style( 'fame-responsive', FAME_CSS .'/responsive.css', array(), FAME_VERSION, 'all' );

    // Adds support for pages with threaded comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }

  }
  add_action( 'wp_enqueue_scripts', 'fame_vt_scripts_styles' );
}

/**
 * Enqueue Files for BackEnd
 */
if ( ! function_exists( 'fame_vt_admin_scripts_styles' ) ) {
  function fame_vt_admin_scripts_styles() {

    wp_enqueue_style( 'fame-admin-main', FAME_CSS . '/admin-styles.css', true );
    wp_enqueue_script( 'fame-admin-scripts', FAME_SCRIPTS . '/admin-scripts.js', true );
    wp_enqueue_style( 'themify-icons', FAME_CSS .'/themify-icons.min.css', array(), FAME_VERSION, 'all' );
    wp_enqueue_style( 'linea', FAME_CSS .'/linea.min.css', array(), FAME_VERSION, 'all' );
  }
  add_action( 'admin_enqueue_scripts', 'fame_vt_admin_scripts_styles' );
}

/* Enqueue All Styles */
if ( ! function_exists( 'fame_vt_wp_enqueue_styles' ) ) {
  function fame_vt_wp_enqueue_styles() {
    fame_vt_google_fonts();
    fame_custom_google_fonts();
  }
  add_action( 'wp_enqueue_scripts', 'fame_vt_wp_enqueue_styles' );
}

/**
 * Apply theme's stylesheet to the visual editor.
 *
 * @uses add_editor_style() Links a stylesheet to visual editor
 * @uses get_stylesheet_uri() Returns URI of theme stylesheet
 */
function fame_add_editor_styles() {
  add_editor_style( get_stylesheet_uri() );
}
add_action( 'init', 'fame_add_editor_styles' );
