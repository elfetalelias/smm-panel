<?php
/*
 * The template for displaying all single posts.
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
$fame_sidebar_position = cs_get_option('single_sidebar_position');
$fame_single_blog_widget = cs_get_option('single_blog_widget');
if ($fame_single_blog_widget) {
	$widget_select = $fame_single_blog_widget;
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
<div class="fame-mid-wrap fame-post-single <?php echo esc_attr($fame_content_padding .' '. $fame_sidebar_class); ?>" style="<?php echo esc_attr($fame_custom_padding); ?>">
	<div class="container">
    <div class="row">
      <div class="<?php echo esc_attr($layout_class); ?>">
        <div class="fame-unit-fix">
					<?php
					if ( have_posts() ) :
						/* Start the Loop */
						while ( have_posts() ) : the_post();
						fame_setPostViews(get_the_ID());

							get_template_part( 'layouts/post/content', 'single' );
							if ( comments_open() || get_comments_number() ) :
			          comments_template();
			        endif;
						endwhile;
					else :
						get_template_part( 'layouts/post/content', 'none' );
					endif; ?>
				</div><!-- unit-fix -->
			</div><!-- layout -->
			<?php
				if ($fame_sidebar_position !== 'sidebar-hide') {
					get_sidebar(); // Sidebar
				}
			?>
		</div><!-- row -->
	</div><!-- container -->
</div><!-- mid -->
<?php
get_footer();
