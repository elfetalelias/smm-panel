<?php
/*
 * The template for displaying all single team.
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

$large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$large_image = $large_image[0];
if(class_exists('Aq_Resize')) {
	$team_img = aq_resize( $large_image, '380', '380', true );
} else {$team_img = $large_image;}
$team_featured_img = ( $team_img ) ? $team_img : esc_url(FAME_IMAGES) . '/holders/380x380.png';

$abt_title = get_the_title();
$team_options = get_post_meta( get_the_ID(), 'team_options', true );
if($team_options) {
  $team_job_position = $team_options['team_job_position'];
	$team_socials = $team_options['social_icons'];
	$team_contact = $team_options['contact_details'];
} else {
  $team_job_position = '';
  $team_socials = '';
  $team_contact = '';
}
?>
<div class="fame-mid-wrap team-single <?php echo esc_attr($fame_content_padding); ?>" style="<?php echo esc_attr($fame_custom_padding); ?>">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="fame-team-wrap">
					<div class="row align-items-center">
						<div class="col-lg-3 col-md-12">
							<?php if ($large_image) { ?>
			        <div class="fame-image"><img src="<?php echo esc_url($team_featured_img); ?>" alt="<?php echo esc_attr($abt_title); ?>"></div>
			        <?php } ?>
						</div>
						<div class="col-lg-9 col-md-12">
							<div class="single-mate-info">
								<div class="mate-info">
				          <h5 class="mate-name"><?php echo esc_html($abt_title); ?></h5>
				          <p><?php echo esc_html($team_job_position); ?></p>
				        </div>
				        <?php if (has_excerpt()) { ?><p><?php the_excerpt(); ?></p><?php } ?>
                <?php if ( ! empty( $team_contact ) ) { ?>
				        	<ul class="mate-contact">
                    <?php foreach ( $team_contact as $contact ) {
                    if($contact['contact_link']) { ?>
                      <li><span><?php echo esc_html($contact['contact_title']); ?></span><a href="<?php echo esc_url($contact['contact_link']); ?>" target="_blank"><?php echo esc_html($contact['contact_text']); ?></a></li>
	                  <?php } else { ?>
                      <li><span><?php echo esc_html($contact['contact_title']); ?></span><?php echo esc_html($contact['contact_text']); ?></li>
	                  <?php } } ?>
                	</ul>
                <?php }
                if ( ! empty( $team_socials ) ) { ?>
				        	<div class="fame-social rounded">
                    <?php foreach ( $team_socials as $social ) {
                    if($social['icon_link']) { ?>
                    	<a href="<?php echo esc_url($social['icon_link']); ?>"><i class="<?php echo esc_attr($social['icon']); ?>"></i></a>
	                  <?php } } ?>
                	</div>
                <?php } ?>
			        </div>
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
