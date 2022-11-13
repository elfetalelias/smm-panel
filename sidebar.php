<?php
/*
 * The sidebar containing the main widget area.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

$fame_blog_widget = cs_get_option('blog_widget');
$fame_single_blog_widget = cs_get_option('single_blog_widget');

if (is_page()) {
	// Page Layout Options
	$fame_page_layout = get_post_meta( get_the_ID(), 'page_layout_options', true );	
}

$sidebar_type = cs_get_option('sidebar_type');
if ($sidebar_type === 'bar-sticky') {
	$sidebar_class = ' fame-sticky-sidebar';
} elseif ($sidebar_type === 'bar-float') {
	$sidebar_class = ' fame-floating-sidebar';
} else {
	$sidebar_class = '';
}

if (is_single()) {
	$single_sidebar_type = cs_get_option('single_sidebar_type');
	if ($single_sidebar_type === 'bar-sticky') {
		$sidebar_class = ' fame-sticky-sidebar';
	} elseif ($single_sidebar_type === 'bar-float') {
		$sidebar_class = ' fame-floating-sidebar';
	} else {
		$sidebar_class = '';
	}
}

?>
<div class="fame-secondary<?php echo esc_attr($sidebar_class); ?>">
	<?php do_action( 'fame_before_sidebar_action' ); // Fame Action ?>
	<?php if (is_page() && $fame_page_layout['page_sidebar_widget']) {
		if (is_active_sidebar($fame_page_layout['page_sidebar_widget'])) {
			dynamic_sidebar($fame_page_layout['page_sidebar_widget']);
		}
	} elseif (!is_page() && $fame_blog_widget && !is_single()) {
		if (is_active_sidebar($fame_blog_widget)) {
			dynamic_sidebar($fame_blog_widget);
		}
	} elseif (is_single() && $fame_single_blog_widget) {
		if (is_active_sidebar($fame_single_blog_widget)) {
			dynamic_sidebar($fame_single_blog_widget);
		}
	} else {
		if (is_active_sidebar('sidebar-1')) {
			dynamic_sidebar( 'sidebar-1' );
		}
	} ?>
	<?php do_action( 'fame_after_sidebar_action' ); // Fame Action ?>
</div><!-- #secondary -->
<?php
