<?php
/*
 * The template for displaying all single testimonial.
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
// Padding - Theme Options
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

// Featured Image
$large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$large_image = $large_image[0];
$fame_alt = get_post_meta( get_post_thumbnail_id(get_the_ID()), '_wp_attachment_image_alt', true);

?>
<div class="fame-mid-wrap testimonial-single <?php echo esc_attr($fame_content_padding); ?>" style="<?php echo esc_attr($fame_custom_padding); ?>">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="fame-testimonial-wrap">
			    <div class="testimonial-info">
			      <?php if($large_image) { ?>
              <div class="fame-image"><img src="<?php echo esc_url($large_image); ?>" alt="<?php echo esc_attr($fame_alt); ?>"></div>
            <?php } ?>
			      <h5 class="author-name">- <?php echo get_the_title(); ?> -</h5>
			      <div class="testimonial-wrap">
			        <?php if (has_excerpt()) { ?><p><?php the_excerpt(); ?></p><?php } ?>
			      </div>
			    </div>
				<?php
					if (have_posts()) : while (have_posts()) : the_post();
						the_content();
					endwhile;
					endif;
				?>
				</div><!-- Blog Div -->
				<?php
		    	wp_reset_postdata();  // avoid errors further down the page
				?>
			</div><!-- Content Area -->
		</div>
	</div>
</div>
<?php
get_footer();
