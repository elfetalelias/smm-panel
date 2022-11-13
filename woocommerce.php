<?php
/*
 * The template for displaying all pages.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

// Metabox
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
$fame_sidebar_position = cs_get_option('woo_sidebar_position');
$fame_woo_widget = cs_get_option('woo_widget');

if (!empty($fame_woo_widget)) {
	$widget_select = $fame_woo_widget;
} else {
	if (is_active_sidebar('shop')) {
		$widget_select = 'shop';
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
get_header(); ?>
<div class="fame-mid-wrap <?php echo esc_attr($fame_content_padding); ?>" style="<?php echo esc_attr($fame_custom_padding); ?>">
  <div class="container">
    <div class="woocommerce woocommerce-page">
      <div class="row">
			<?php do_action('fame_woocommerce_before_shop_loop'); ?>
				<div class="container fame-content-area <?php echo esc_attr($fame_sidebar_class); ?>">
					<div class="row">
						<div class="woo-content-side <?php echo esc_attr($layout_class); ?>">
							<?php
								if ( have_posts() ) :
									woocommerce_content();
								endif; // End of the loop.
							?>
						</div><!-- Content Area -->
						<?php
						// Right Sidebar
						if($fame_sidebar_position !== 'sidebar-hide') { get_sidebar('shop'); } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
