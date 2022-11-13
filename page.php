<?php
/*
 * The template for displaying all pages.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

// Metabox
$fame_id    = ( isset( $post ) ) ? $post->ID : 0;
$fame_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $fame_id;
$fame_id    = ( fame_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $fame_id;
$fame_meta  = get_post_meta( $fame_id, 'page_type_metabox', true );
$fame_layout_meta  = get_post_meta( $fame_id, 'page_layout_options', true );

if ($fame_meta) {
	$fame_content_padding = $fame_meta['content_spacings'];
} else {
	$fame_content_padding = '';
}
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

// Page Layout Options
if ($fame_layout_meta) {
	$fame_page_layout = $fame_layout_meta['page_layout'];
	if($fame_page_layout === 'left-sidebar' || $fame_page_layout === 'right-sidebar') {
		$fame_column_class = 'fame-primary';
		$fame_layout_class = 'container';
	} elseif($fame_page_layout === 'full-width') {
    $fame_column_class = 'col-md-12';
    $fame_layout_class = 'container-fluid';
  } else {
		$fame_column_class = 'col-md-12';
		$fame_layout_class = 'container';
	}

	// Page Layout Class
	if ($fame_page_layout === 'left-sidebar') {
		$fame_sidebar_class = 'left-sidebar';
	} elseif ($fame_page_layout === 'right-sidebar') {
		$fame_sidebar_class = 'right-sidebar';
	} else {
		$fame_sidebar_class = 'full-width';
	}
} else {
	$fame_page_layout = '';
	$fame_column_class = 'col-md-12';
	$fame_layout_class = 'container';
	$fame_sidebar_class = 'fame-full-width';
}

get_header();
?>
<div class="fame-mid-wrap fame-page-wrap <?php echo esc_attr($fame_content_padding .' '. $fame_sidebar_class); ?>" style="<?php echo esc_attr($fame_custom_padding); ?>">
	<div class="<?php echo esc_attr($fame_layout_class); ?>">
		<div class="row">
			<div class="<?php echo esc_attr($fame_column_class); ?>">
      <?php do_action( 'fame_before_content_action' ); // Fame Action ?>
				<?php
				while ( have_posts() ) : the_post();
					the_content();
					echo fame_wp_link_pages();
					// If comments are open or we have at least one comment, load up the comment template.
					if (comments_open() || get_comments_number()) :
						comments_template();
					endif;
				endwhile;
				?>
      <?php do_action( 'fame_after_content_action' ); // Fame Action ?>
			</div><!-- Content Area -->
			<?php
			// Right Sidebar
			if($fame_page_layout === 'left-sidebar' || $fame_page_layout === 'right-sidebar') {
				get_sidebar();
			}
			?>
		</div>
	</div>
</div>
<?php
get_footer();