<?php
/*
 * The template for displaying all single casestudies.
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
// Translation
$noneed_case_studies_post = cs_get_option('noneed_case_studies_post');

if (!$noneed_case_studies_post) {

	$case_studies_single_pagination = cs_get_option('case_studies_single_pagination');
  $case_studies_single_url = cs_get_option('case_studies_single_url');
  $fame_prev_case_studies = cs_get_option('prev_case_studies');
  $fame_next_case_studies = cs_get_option('next_case_studies');
  $fame_prev_case_studies = ($fame_prev_case_studies) ? $fame_prev_case_studies : esc_html__('Prev Project', 'fame');
  $fame_next_case_studies = ($fame_next_case_studies) ? $fame_next_case_studies : esc_html__('Next Project', 'fame');

	?>
	<div class="fame-mid-wrap fame-case-single <?php echo esc_attr($fame_content_padding); ?>" style="<?php echo esc_attr($fame_custom_padding); ?>">
	  <div class="container">
			<?php
			if (have_posts()) : while (have_posts()) : the_post();
				the_content();
			endwhile;
			endif;
			wp_reset_postdata(); ?>
		</div>
    <?php
    if ( function_exists( 'fame_case_share_option' ) ) {
      fame_case_share_option();
    }
    if ($case_studies_single_pagination) { ?>
    <!-- Next and Prev Navigation -->
    <div class="fame-more-posts">
      <?php
        $fame_prev_post = get_previous_post();
        $fame_next_post = get_next_post();
      ?>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-4 col-sm-4">
            <?php if ($fame_prev_post) { ?>
            <a href="<?php echo esc_url(get_permalink($fame_prev_post->ID)); ?>" class="more-posts-link">
              <span><?php echo esc_attr($fame_prev_case_studies); ?></span>
            </a>
            <?php } ?>
          </div>
          <div class="col-md-4 col-sm-4 text-center">
            <?php if ($case_studies_single_url) { ?>
            <a href="<?php echo esc_url($case_studies_single_url); ?>" class="post-grid-view"><i class="ti-layout-grid2"></i></a>
            <?php } ?>
          </div>
          <div class="col-md-4 col-sm-4 text-right">
            <?php if ($fame_next_post) { ?>
            <a href="<?php echo esc_url(get_permalink($fame_next_post->ID)); ?>" class="more-posts-link">
              <span><?php echo esc_attr($fame_next_case_studies); ?>
            </a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
	</div>
<?php }
get_footer();
