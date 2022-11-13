<?php
/*
 * All theme related setups here.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/* Set content width */
if ( ! isset( $content_width ) ) $content_width = 1170;

/* Register menu */
register_nav_menus( array(
	'primary' => esc_html__( 'Main Navigation', 'fame' )
) );

/* Thumbnails */
add_theme_support( 'post-thumbnails' );

/* Post formats */
add_theme_support( 'post-formats', array( 'quote' ) );

/* Feeds */
add_theme_support( 'automatic-feed-links' );

/* Add support for Title Tag. */
add_theme_support( 'title-tag' );

/* WooCommerce */
add_theme_support( 'woocommerce' );

/* HTML5 */
add_theme_support( 'html5', array( 'gallery', 'caption' ) );

/* Add Featured Image support in event organizer */
add_post_type_support( 'tribe_organizer', 'thumbnail' );

/* Extend wp_title */
if( ! function_exists( 'fame_theme_wp_title' ) ) {
	function fame_theme_wp_title( $title, $sep ) {
	 global $paged, $page;

	 if ( is_feed() )
	  return $title;

	 // Add the site name.
	 $site_name = get_bloginfo( 'name' );

	 // Add the site description for the home/front page.
	 $site_description = get_bloginfo( 'description', 'display' );
	 if ( $site_description && ( is_front_page() ) )
	  $title = "$site_name $sep $site_description";

	 // Add a page number if necessary.
	 if ( $paged >= 2 || $page >= 2 )
	  $title = "$site_name $sep" . sprintf( esc_html__( ' Page %s', 'fame' ), max( $paged, $page ) );

	 return $title;
	}
	add_filter( 'wp_title', 'fame_theme_wp_title', 10, 2 );
}

/* Languages */
if( ! function_exists( 'fame_theme_language_setup' ) ) {
	function fame_theme_language_setup(){
	  load_theme_textdomain( 'fame', get_template_directory() . '/languages' );
	}
	add_action('after_setup_theme', 'fame_theme_language_setup');
}

/* Slider Revolution Theme Mode */
if(function_exists( 'set_revslider_as_theme' )){
	add_action( 'init', 'fame_theme_revslider' );
	function fame_theme_revslider() {
		set_revslider_as_theme();
	}
}

// Single Product Single/Gallery Script
add_action( 'after_setup_theme', 'fame_single_product_gallery_image' );
function fame_single_product_gallery_image() {
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}