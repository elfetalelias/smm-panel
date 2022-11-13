<?php
/*
 * The template for displaying all single elementor library.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header();
?>
<div class="fame-mid-wrap elementor-single-page">
	<div class="container ">
		<div class="row">
      <div class="col-lg-12">
				<?php
				if (have_posts()) : while (have_posts()) : the_post();
					the_content();
				endwhile;
				endif;
				?>
			</div>
		</div>			
	</div>
	<?php wp_reset_postdata(); ?>
</div>
<?php
get_footer();
