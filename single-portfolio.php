<?php
/*
 * The template for displaying all single portfolio.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header();

// Metabox
$fame_id    = ( isset( $post ) ) ? $post->ID : 0;
$fame_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $fame_id;
$fame_id    = ( fame_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $fame_id;
$fame_meta  = get_post_meta( $fame_id, 'page_type_metabox', true );
$portfolio_meta  = get_post_meta( $fame_id, 'portfolio_options', true );

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
$noneed_portfolio_post = cs_get_option('noneed_portfolio_post');

if (!$noneed_portfolio_post) {

  if($portfolio_meta) {
  	$portfolio_client = $portfolio_meta['portfolio_client'];
  	$portfolio_client_link = $portfolio_meta['portfolio_client_link'];
  	$portfolio_banner = $portfolio_meta['portfolio_banner'];
  } else {
    $portfolio_client = '';
    $portfolio_client_link = '';
    $portfolio_banner = '';
  }

	$date_format = cs_get_option('portfolio_date_format');
	$date_format_actual = $date_format ? $date_format : '';

	$fame_portfolio_need_related = cs_get_option('portfolio_need_related');
	$fame_portfolio_related_title = cs_get_option('portfolio_related_title');
	$fame_portfolio_related_title = $fame_portfolio_related_title ? $fame_portfolio_related_title : esc_html__('Related Links', 'fame');

	
	if ( $portfolio_banner ) {
	?>
	<div class="fame-banner banner-style-three">
    <div class="container">
      <div class="fame-image"><img src="<?php echo esc_url( $portfolio_banner['url'] ); ?>" alt="Portfolio"></div>
    </div>
  </div>
	<?php } ?>
	<div class="fame-portfolio-info <?php echo esc_attr($fame_content_padding); ?>" style="<?php echo esc_attr($fame_custom_padding); ?>">
	  <div class="container">
	  	<div class="portfolio-info-wrap">
        <div class="row">
          <div class="col-md-6">
            <h2 class="portfolio-info-title"><?php echo esc_html(the_title()); ?></h2>
          </div>
          <div class="col-md-6">
            <div class="portfolio-meta">
              <div class="row">
                <div class="col-sm-4">
                  <h3 class="portfolio-meta-title"><?php esc_html_e('Date', 'fame'); ?></h3>
                  <p><?php echo get_the_date($date_format_actual); ?></p>
                </div>
                <div class="col-sm-4">
                  <h3 class="portfolio-meta-title"><?php esc_html_e('Categories', 'fame'); ?></h3>
                  <p>
                  	<?php
						          $category_list = wp_get_post_terms($post->ID, 'portfolio_category');
						          foreach ($category_list as $term) {
						          $portfolio_term_link = get_term_link( $term );
						            echo '<span><a href="'. esc_url($portfolio_term_link) .'">'. esc_html($term->name) .'</a></span> ';
						          }
						        ?>
                  </p>
                </div>
                <div class="col-sm-4">
                  <h3 class="portfolio-meta-title"><?php esc_html_e('Client', 'fame'); ?></h3>
                  <?php if ($portfolio_client) { ?><p><?php if ($portfolio_client_link) { ?><a href="<?php echo esc_url( $portfolio_client_link ); ?>"><?php echo esc_html( $portfolio_client ); ?></a><?php } else { echo esc_html( $portfolio_client ); } ?></p><?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
			<?php
			if (have_posts()) : while (have_posts()) : the_post();
				the_content();
			endwhile;
			endif;
			wp_reset_postdata(); ?>
		</div>
	</div>
<?php }
get_footer();
