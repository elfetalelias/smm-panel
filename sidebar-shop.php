<?php
/*
 * The sidebar only for WooCommerce pages.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

$fame_woo_widget = cs_get_option('woo_widget');
$sidebar_type = cs_get_option('woo_sidebar_type');
if ($sidebar_type === 'bar-sticky') {
	$sidebar_class = ' fame-sticky-sidebar';
} elseif ($sidebar_type === 'bar-float') {
	$sidebar_class = ' fame-floating-sidebar';
} else {
	$sidebar_class = '';
}

?>
<div class="fame-secondary<?php echo esc_attr($sidebar_class); ?>">
	<?php if ($fame_woo_widget) {
		if (is_active_sidebar($fame_woo_widget)) {
			dynamic_sidebar($fame_woo_widget);
		}
	} else {
		if (is_active_sidebar( 'shop' )) {
			dynamic_sidebar( 'shop' );
		}
	} ?>
</div>
<?php
