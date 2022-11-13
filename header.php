<?php
/*
 * The header for our theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php
// if the `wp_site_icon` function does not exist (ie we're on < WP 4.3)
if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
    <link rel="shortcut icon" href="<?php echo esc_url(FAME_IMAGES); ?>/favicon.ico" />
<?php }
$fame_all_element_color  = cs_get_customize_option( 'all_element_colors' );
?>
<meta name="msapplication-TileColor" content="<?php echo esc_attr($fame_all_element_color); ?>">
<meta name="theme-color" content="<?php echo esc_attr($fame_all_element_color); ?>">

<link rel="profile" href="//gmpg.org/xfn/11">

<?php
// Metabox
global $post;
$fame_id    = ( isset( $post ) ) ? $post->ID : false;
$fame_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $fame_id;
$fame_id    = ( fame_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $fame_id;
$fame_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $fame_id : false;
$fame_meta  = get_post_meta( $fame_id, 'page_type_metabox', true );

// Header Style
$fame_sticky_header      = cs_get_option('sticky_header');
$fame_sticky_footer      = cs_get_option('sticky_footer');

if ($fame_meta) {
  $one_page_menu = $fame_meta['one_page_menu'];
} else {
  $one_page_menu = '';
}
if($one_page_menu) {
  $parallax_menu_class = ' smooth-scroll';
} else {
  $parallax_menu_class = '';
}
if ($fame_sticky_footer) {
  $footer_class = ' fame-sticky-footer';
} else {
  $footer_class = '';
}
if ($fame_sticky_header) {
  $header_class = ' fame-sticky';
} else {
  $header_class = '';
}
// fullwidth Topbar
if ($fame_meta) {
  $hide_header  = $fame_meta['hide_header'];
} else {
  $hide_header = '';
}
wp_head();
?>
</head>
<body <?php body_class(); ?>>
<!-- Full Page -->
<!-- Hanor Main Wrap -->
<div class="fame-main-wrap <?php echo esc_attr($footer_class); ?>">
  <!-- Hanor Main Wrap Inner -->
  <div class="main-wrap-inner">
  <?php if(!$hide_header) { ?>
  <!-- Header -->
  <?php do_action( 'fame_before_header_action' ); // Fame Action ?>
  <header class="fame-header<?php echo esc_attr($parallax_menu_class . $header_class); ?>">
    <?php get_template_part( 'layouts/header/logo' ); ?>
    <div class="fame-header-right">
      <?php get_template_part( 'layouts/header/menu', 'bar' ); ?>
    </div>
  </header>
  <div class="fame-search">
    <div class="fame-table-wrap">
      <div class="fame-align-wrap">
        <div class="search-closer"></div>
        <div class="search-wrap">
          <form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>" class="searchform fame-form" >
            <input type="text" name="s" id="s" placeholder="<?php esc_attr_e('Search...','fame'); ?>" />
            <input type="submit" id="searchsubmit" class="button-primary" value="" />
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php do_action( 'fame_after_header_action' ); // Fame Action ?>
  <?php }
  // Title Area
  $fame_need_title_bar = cs_get_option('need_title_bar');
  
  if($fame_need_title_bar) {
  get_template_part( 'layouts/header/title', 'bar' );
  }