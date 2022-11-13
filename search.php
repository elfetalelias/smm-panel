<?php
/*
 * The template for displaying archive pages.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header();
// Metabox
$fame_id    = ( isset( $post ) ) ? $post->ID : 0;
$fame_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $fame_id;
$fame_id    = ( fame_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $fame_id;
$fame_meta  = get_post_meta( $fame_id, 'page_type_metabox', true );

if ($fame_meta) {
  $fame_content_padding = $fame_meta['content_spacings'];
} else { $fame_content_padding = ''; }
// Padding - Metabox
if ($fame_content_padding && $fame_content_padding !== 'padding-none') {
  $fame_content_spacings_unit = $fame_meta['content_top_bottom_padding']['unit'];
  $fame_content_top_spacings = $fame_meta['content_top_bottom_padding']['top'];
  $fame_content_bottom_spacings = $fame_meta['content_top_bottom_padding']['bottom'];
  if ($fame_content_padding === 'padding-custom') {
    $fame_content_top_spacings = $fame_content_top_spacings ? 'padding-top:'.$fame_content_top_spacings.$fame_content_spacings_unit.';' : '';
    $fame_content_bottom_spacings = $fame_content_bottom_spacings ? 'padding-bottom:'.$fame_content_bottom_spacings.$fame_content_spacings_unit.';' : '';
    $fame_custom_padding = $fame_content_top_spacings . $fame_content_bottom_spacings;
  } else {
    $fame_custom_padding = '';
  }
} else {
  $fame_custom_padding = '';
}

// Theme Options
$fame_sidebar_position = cs_get_option('blog_sidebar_position');
$fame_blog_widget = cs_get_option('blog_widget');

if ($fame_blog_widget) {
  $widget_select = $fame_blog_widget;
} else {
  if (is_active_sidebar('sidebar-1')) {
    $widget_select = 'sidebar-1';
  } else {
    $widget_select = '';
  }
}

// Sidebar Position
if ($widget_select && is_active_sidebar( $widget_select )) {
  if ($fame_sidebar_position === 'sidebar-hide') {
    $layout_class = 'col-md-12';
    $fame_sidebar_class = 'hide-sidebar';
  } elseif ($fame_sidebar_position === 'sidebar-left') {
    $layout_class = 'fame-primary';
    $fame_sidebar_class = 'left-sidebar';
  } else {
    $layout_class = 'fame-primary';
    $fame_sidebar_class = 'right-sidebar';
  }
} else {
  $fame_sidebar_position = 'sidebar-hide';
  $layout_class = 'col-md-12';
  $fame_sidebar_class = 'hide-sidebar';
}
?>
<div class="fame-mid-wrap fame-post-listing <?php echo esc_attr($fame_content_padding .' '. $fame_sidebar_class); ?>" style="<?php echo esc_attr($fame_custom_padding); ?>">
  <div class="container"> 
    <div class="row">
      <div class="<?php echo esc_attr($layout_class); ?>">
        <?php do_action( 'fame_before_blog_listing_action' ); // Fame Action 
          if ( have_posts() ) :
            /* Start the Loop */
            while ( have_posts() ) : the_post();
              get_template_part( 'layouts/post/content' );
            endwhile;
          else :
            get_template_part( 'layouts/post/content', 'none' );
          endif; ?>
          <?php
          fame_default_paging_nav();
          wp_reset_postdata();  // avoid errors further down the page
        do_action( 'fame_after_blog_listing_action' ); // Fame Action ?>
      </div><!-- row -->
      <?php if ($fame_sidebar_position !== 'sidebar-hide') {  get_sidebar(); } ?>
    </div>
  </div>
</div>
<?php
get_footer();
