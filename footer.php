<?php
/*
 * The template for displaying the footer.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
global $post;
$fame_id    = ( isset( $post ) ) ? $post->ID : 0;
$fame_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $fame_id;
$fame_id    = ( fame_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $fame_id;
$fame_meta  = get_post_meta( $fame_id, 'page_type_metabox', true );

// Background - Type
if( $fame_meta && $fame_meta['footer_top_bg']['url'] ) {
  $image = $fame_meta['footer_top_bg']['url'] ? $fame_meta['footer_top_bg']['url'] : '';
} else {
  $image = cs_get_option('footer_top_bg') ? cs_get_option('footer_top_bg')['url'] : '';
}

// Search Icon
if ($fame_meta) {
  $fame_hide_footer_top = $fame_meta['hide_footer_top'];
} else {
  $fame_hide_footer_top = cs_get_option('hide_footer_top');
}

if($fame_meta && $fame_hide_footer_top != 'default') {
  $fame_hide_footer_top = $fame_meta['hide_footer_top'];
} else {
  $fame_hide_footer_top = cs_get_option('hide_footer_top');
}
if ($image) {
  $background_image = ( ! empty( $image ) ) ? 'background-image: url(' . $image . ');' : '';
} else {
  $background_image = '';
}

$footer_top_title = cs_get_option('footer_top_title');
$footer_top_subtitle = cs_get_option('footer_top_subtitle');
$footer_top_content = cs_get_option('footer_top_content');

if ($fame_meta) {
  $widget_style = $fame_meta['footer_top_style'];
} else {
  $widget_style = '';
}
if($widget_style === 'style-two') {
  $style_class = '';
} elseif($widget_style === 'style-three') {
  $style_class = ' subscribe-style-two';
} else {
  $style_class = ' subscribe-style-three';
}
if ( ($footer_top_title || $footer_top_subtitle || $footer_top_content) && $fame_hide_footer_top === 'show') { ?>
<!-- Fame Subscribe -->
<div class="fame-subscribe<?php echo esc_attr($style_class); ?>" style="<?php echo esc_attr($background_image); ?>">
  <div class="container">
    <div class="section-title-wrap">
      <?php if ($footer_top_title) { ?><h2 class="section-title"><?php echo esc_html($footer_top_title); ?></h2><?php } ?>
      <?php if ($footer_top_subtitle) { ?><p><?php echo esc_html($footer_top_subtitle); ?></p><?php } ?>
    </div>
    <?php echo do_shortcode($footer_top_content); ?>
  </div>
</div>
<?php } ?>
</div><!-- Main Wrap Inner -->
<?php
if ($fame_meta) {
	$fame_hide_footer  = $fame_meta['hide_footer'];
  $fame_hide_copyright = $fame_meta['hide_copyright'];
} else {
  $fame_hide_footer = '';
  $fame_hide_copyright = '';
}
$left_copyright_text = cs_get_option('copyright_text');
$right_copyright_text = cs_get_option('copyright_text_right');

if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4') || $left_copyright_text || $right_copyright_text) {
?>
<!-- Footer -->
<footer class="fame-footer">
  <div class="container">
    <?php if (!$fame_hide_footer) {
    if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4') ) { ?>
      <div class="footer-wrap">
        <?php get_template_part( 'layouts/footer/footer', 'widgets' ); ?>
      </div>
    <?php do_action( 'fame_after_footer_action' ); // Fame Action ?>
    <?php } }
    if(!$fame_hide_copyright) {
    if ($left_copyright_text || $right_copyright_text) { ?>
      <div class="fame-copyright">
        <?php
        $need_copyright = cs_get_option('need_copyright');
        if($need_copyright) {
          get_template_part( 'layouts/footer/footer', 'copyright' );
        } ?>
      </div>
    <?php do_action( 'fame_after_copyright_action' ); // Fame Action ?>
    <?php } else { ?>
      <div class="fame-copyright alt-copyright">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-12 aligncenter">
              <p>&copy; <?php echo esc_html(date('Y')); ?>. <?php esc_html_e('Designed by', 'fame') ?> <a href="<?php echo esc_url(home_url( '/' )); ?>"><?php esc_html_e('VictorThemes', 'fame') ?></a></p>
            </div>
          </div>
        </div>
      </div>
    <?php } } ?>
  </div>
</footer>
<!-- Footer -->
<?php } else {
if(!$fame_hide_copyright) { ?>
<footer class="fame-footer">
  <div class="fame-copyright alt-copyright">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-12 aligncenter">
          <p>&copy; <?php echo esc_html(date('Y')); ?>. <?php esc_html_e('Designed by', 'fame') ?> <a href="<?php echo esc_url(home_url( '/' )); ?>"><?php esc_html_e('VictorThemes', 'fame') ?></a></p>
        </div>
      </div>
    </div>
  </div>
</footer>
<?php	} } // Hide Footer Metabox ?>
</div><!-- Main Wrap -->
<?php
$theme_preloader = cs_get_option('theme_preloader');
$theme_btotop = cs_get_option('theme_btotop');
if($theme_btotop) {
?>
<!-- Hanor Back Top -->
<div class="fame-back-top">
  <a href="javascript:void(0);"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
</div>
<?php }
if ($theme_preloader) { ?>
<!-- Hanor Preloader -->
<div class="fame-preloader">
  <div class="loader-wrap">
    <div class="loader">
      <div class="loader-inner ball-triangle-path"></div>
    </div>
  </div>
</div>
<?php }
wp_footer(); ?>
</body>
</html>
<?php
