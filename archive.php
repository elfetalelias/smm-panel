<?php
/*
 * The template for displaying archive pages.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header();
$noneed_testimonial_post = cs_get_option('noneed_testimonial_post');
$noneed_portfolio_post = cs_get_option('noneed_portfolio_post');
$noneed_case_studies_post = cs_get_option('noneed_case_studies_post');
$noneed_team_post = cs_get_option('noneed_team_post');

if(function_exists( 'fame_core_plugin_status' ) && (fame_is_post_type('testimonial') && !$noneed_testimonial_post)){

	$testimonial_style = cs_get_option('testimonial_style');
	$testimonial_limit = cs_get_option('testimonial_limit');
	$testimonial_orderby = cs_get_option('testimonial_orderby');
	$testimonial_order = cs_get_option('testimonial_order');
  $testimonial_limit = $testimonial_limit ? $testimonial_limit : '-1';

  // Query Starts Here
  // Pagination
  global $paged;
  if( get_query_var( 'paged' ) )
    $my_page = get_query_var( 'paged' );
  else {
    if( get_query_var( 'page' ) )
      $my_page = get_query_var( 'page' );
    else
      $my_page = 1;
    set_query_var( 'paged', $my_page );
    $paged = $my_page;
  }

  $args = array(
    'paged' => $my_page,
    'post_type' => 'testimonial',
    'posts_per_page' => (int)$testimonial_limit,
    'orderby' => $testimonial_orderby,
    'order' => $testimonial_order,
  );

  // Testimonial Style
  if ($testimonial_style === 'testimonial_two') {
    $testimonial_style_class = ' testimonial-style-two';
  } else {
    $testimonial_style_class = '';
  }
  // RTL
  if ( is_rtl() ) {
    $switch_rtl = ' data-rtl="true"';
  } else {
    $switch_rtl = ' data-rtl="false"';
  }

  $fame_testi = new WP_Query( $args );
  if ($fame_testi->have_posts()) :
  ?>
  <div class="fame-testimonial<?php echo esc_attr($testimonial_style_class); ?>">
    <div class="container">
    <?php  if ($testimonial_style === 'testimonial_two') { ?>
    <div class="testimonial-wrap">
      <div class="owl-carousel" data-items="1" data-margin="0" data-loop="true" data-nav="true" data-dots="true" data-autoplay="true" data-auto-height="true">
    <?php } else { ?>
      <div class="owl-carousel" data-items="3" data-margin="30" data-loop="true" data-nav="true" data-dots="true" data-autoplay="true">
    <?php }
        while ($fame_testi->have_posts()) : $fame_testi->the_post();

        // Get Meta Box Options - fame_framework_active()
        $testimonial_options = get_post_meta( get_the_ID(), 'testimonial_options', true );
        $testi_job = $testimonial_options['testi_position'];
        $testi_logo = $testimonial_options['testi_logo'];

        // Featured Image
        $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
        $large_image = $large_image[0];
        $fame_alt = get_post_meta( get_post_thumbnail_id(get_the_ID()), '_wp_attachment_image_alt', true);

        if ($testimonial_style === 'testimonial_two') { // Style Two
        ?>
          <div class="item">
            <?php if($large_image) { ?>
            <div class="fame-image"><img src="<?php echo esc_url($large_image); ?>" alt="<?php echo esc_attr($fame_alt); ?>"></div>
            <?php }
            if($testi_logo) { ?>
            <div class="fame-icon"><img src="<?php echo esc_url($testi_logo['url']); ?>" alt="<?php the_title_attribute(); ?>"></div>
            <?php } ?>
            <div class="testimonial-info">
              <p><?php the_excerpt(); ?></p>
            </div>
            <h4 class="author-name"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo get_the_title(); ?></a><?php if ($testi_job) { ?>, <span class="author-designation"><?php echo esc_html($testi_job); ?></span><?php } ?></h4>
          </div>
        <?php } else { ?>
          <div class="item">
            <div class="testimonial-item">
              <?php if($large_image) { ?>
              <div class="fame-image"><img src="<?php echo esc_url($large_image); ?>" alt="<?php echo esc_attr($fame_alt); ?>"></div>
              <?php } ?>
              <p><?php the_excerpt(); ?></p>
              <h4 class="author-name"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo get_the_title(); ?></a></h4>
            </div>
          </div>
        <?php }

        endwhile;
        wp_reset_postdata();
        ?>
    <?php if ($testimonial_style === 'testimonial_two') { ?>
      </div>
    </div>
    <?php } else { ?>
      </div>
    <?php } ?>
    </div>
  </div>

  <?php
    endif;

} elseif (function_exists( 'fame_core_plugin_status' ) && (fame_is_post_type('portfolio') && !$noneed_portfolio_post)) {

  $portfolio_limit = cs_get_option('portfolio_limit');
  $fame_portfolio_show_category = cs_get_option('portfolio_show_category');
  $fame_portfolio_orderby = cs_get_option('portfolio_orderby');
  $fame_portfolio_order = cs_get_option('portfolio_order');
  $fame_portfolio_filter = cs_get_option('portfolio_filter');
  $fame_portfolio_filter_type = cs_get_option('portfolio_filter_type');
  $fame_portfolio_pagination = cs_get_option('portfolio_pagination');
  $portfolio_limit = $portfolio_limit ? $portfolio_limit : '9';

  $all_text = cs_get_option('all_text');
  $all_text_actual = $all_text ? $all_text : esc_html__('All Projects', 'fame');

  if ($fame_portfolio_filter_type === 'ajax') {
    $filter_cls = ' ajax-filter';
  } else {
    $filter_cls = ' normal-filter';
  }

  // Pagination
  global $paged;
  if( get_query_var( 'paged' ) )
    $my_page = get_query_var( 'paged' );
  else {
    if( get_query_var( 'page' ) )
      $my_page = get_query_var( 'page' );
    else
      $my_page = 1;
    set_query_var( 'paged', $my_page );
    $paged = $my_page;
  }

  if ($fame_portfolio_show_category) {
    $args = array(
      // other query params here,
      'paged' => $my_page,
      'post_type' => 'portfolio',
      'posts_per_page' => (int)$portfolio_limit,
      'tax_query' => array(
        array(
          'taxonomy' => 'portfolio_category',
          'field' => 'ID',
          'terms' => $fame_portfolio_show_category
        )
      ),
      'orderby' => $fame_portfolio_orderby,
      'order' => $fame_portfolio_order
    );
  } else {
    $args = array(
      // other query params here,
      'paged' => $my_page,
      'post_type' => 'portfolio',
      'posts_per_page' => (int)$portfolio_limit,
      'orderby' => $fame_portfolio_orderby,
      'order' => $fame_portfolio_order
    );
  }

  $fame_port = new WP_Query( $args ); ?>
  <div class="fame-mid-wrap fame-portfolio-section">
    <div class="container">

	  	<?php if ($fame_portfolio_filter) { ?>

        <div class="masonry-filters<?php echo esc_attr($filter_cls); ?>">
          <ul>
            <li><a href="javascript:void(0);" data-filter="*" data-limit="<?php echo esc_attr($portfolio_limit); ?>" class="active"><?php echo esc_html($all_text_actual); ?></a></li>
            <?php
              if ($fame_portfolio_show_category) {
                $terms = $fame_portfolio_show_category;
                $count = count($terms);
                if ($count > 0) {
                  foreach ($terms as $term) {
                    $term_name = get_term_by('id', $term, 'portfolio_category');
                    echo '<li class="cat-'. preg_replace('/\s+/', "", strtolower($term_name->name)) .'"><a href="javascript:void(0);" data-filter=".cat-'. preg_replace('/\s+/', "", strtolower($term_name->name)) .'" data-limit="'.esc_attr($portfolio_limit).'" data-cat="'. esc_attr($term->slug) .'" title="' . str_replace('-', " ", strtolower($term_name->name)) . '">' . str_replace('-', " ", $term_name->name) . '</a></li>';
                   }
                }
              } else {
                if ( function_exists( 'ceremony_gallery_category_list' ) ) {
                echo ceremony_gallery_category_list();
                }
              }
            ?>
          </ul>
        </div>

	    <?php } ?>
	    <!-- Start -->
      <div class="fame-masonry">
	    	<?php
	      if ($fame_port->have_posts()) : while ($fame_port->have_posts()) : $fame_port->the_post();
	        get_template_part( 'layouts/post/content', 'portfolio' );
	        endwhile;
	      else :
	        get_template_part( 'layouts/post/content', 'none' );
	      endif; ?>
      </div>
			<!-- End -->
      <?php if($fame_port->max_num_pages > 1) {
        if ($fame_portfolio_pagination) { fame_paging_nav($fame_port->max_num_pages,"",$paged); }
      } wp_reset_postdata(); ?>

    </div>
  </div>

<?php } elseif (function_exists( 'fame_core_plugin_status' ) && (fame_is_post_type('casestudies') && !$noneed_case_studies_post)) {

  $case_studies_col = cs_get_option('case_studies_col');
  $case_studies_limit = cs_get_option('case_studies_limit');
  $fame_case_studies_show_category = cs_get_option('case_studies_show_category');
  $fame_case_studies_orderby = cs_get_option('case_studies_orderby');
  $fame_case_studies_order = cs_get_option('case_studies_order');
  $fame_case_studies_filter = cs_get_option('case_studies_filter');
  $fame_case_studies_filter_type = cs_get_option('case_studies_filter_type');
  $fame_case_studies_pagination = cs_get_option('case_studies_pagination');
  $case_studies_limit = $case_studies_limit ? $case_studies_limit : '9';

  $case_all_text = cs_get_option('case_all_text');
  $case_all_text_actual = $case_all_text ? $case_all_text : esc_html__('All Projects', 'fame');

  if ($case_studies_col === 'two') {
    $col_attr = ' data-item="2"';
  } else {
    $col_attr = '';
  }

  if ($fame_case_studies_filter_type === 'ajax') {
    $filter_cls = ' ajax-filter';
  } else {
    $filter_cls = ' normal-filter';
  }

  // Pagination
  global $paged;
  if( get_query_var( 'paged' ) )
    $my_page = get_query_var( 'paged' );
  else {
    if( get_query_var( 'page' ) )
      $my_page = get_query_var( 'page' );
    else
      $my_page = 1;
    set_query_var( 'paged', $my_page );
    $paged = $my_page;
  }

  if ($fame_case_studies_show_category) {
    $args = array(
      // other query params here,
      'paged' => $my_page,
      'post_type' => 'casestudies',
      'posts_per_page' => (int)$case_studies_limit,
      'tax_query' => array(
        array(
          'taxonomy' => 'casestudies_category',
          'field' => 'ID',
          'terms' => $fame_case_studies_show_category
        )
      ),
      'orderby' => $fame_case_studies_orderby,
      'order' => $fame_case_studies_order
    );
  } else {
    $args = array(
      // other query params here,
      'paged' => $my_page,
      'post_type' => 'casestudies',
      'posts_per_page' => (int)$case_studies_limit,
      'orderby' => $fame_case_studies_orderby,
      'order' => $fame_case_studies_order
    );
  }

  $fame_case = new WP_Query( $args ); ?>
  <div class="fame-mid-wrap fame-case-section">
    <div class="container">

      <?php if ($fame_case_studies_filter) { ?>

        <div class="masonry-filters<?php echo esc_attr($filter_cls); ?>">
          <ul>
            <li><a href="javascript:void(0);" data-filter="*" data-limit="<?php echo esc_attr($case_studies_limit); ?>" class="active"><?php echo esc_html($case_all_text_actual); ?></a></li>
            <?php
              if ($fame_case_studies_show_category) {
                $terms = $fame_case_studies_show_category;
                $count = count($terms);
                if ($count > 0) {
                  foreach ($terms as $term) {
                    $term_name = get_term_by('id', $term, 'casestudies_category');
                    echo '<li class="cat-'. preg_replace('/\s+/', "", strtolower($term_name->name)) .'"><a href="javascript:void(0);" data-filter=".cat-'. preg_replace('/\s+/', "", strtolower($term_name->name)) .'" data-limit="'.esc_attr($case_studies_limit).'" data-cat="'. esc_attr($term->slug) .'" title="' . str_replace('-', " ", strtolower($term_name->name)) . '">' . str_replace('-', " ", $term_name->name) . '</a></li>';
                   }
                }
              } else {
                if ( function_exists( 'fame_casestudies_category_list' ) ) {
                echo fame_casestudies_category_list();
                }
              }
            ?>
          </ul>
        </div>

      <?php } ?>
      <!-- Start -->
      <div class="fame-masonry" data-space="15"<?php echo esc_attr($col_attr); ?>>
        <?php
        if ($fame_case->have_posts()) : while ($fame_case->have_posts()) : $fame_case->the_post();
          get_template_part( 'layouts/post/content', 'casestudies' );
          endwhile;
        else :
          get_template_part( 'layouts/post/content', 'none' );
        endif; ?>
      </div>
      <!-- End -->
      <?php if($fame_case->max_num_pages > 1) {
        if ($fame_case_studies_pagination) { fame_paging_nav($fame_case->max_num_pages,"",$paged); }
      } wp_reset_postdata(); ?>

    </div>
  </div>

<?php } elseif (function_exists( 'fame_core_plugin_status' ) && (fame_is_post_type('team') && !$noneed_team_post)) {

  $team_limit = cs_get_option('team_limit');
  $team_orderby = cs_get_option('team_orderby');
  $team_order = cs_get_option('team_order');
  $fame_team_aqr = cs_get_option('team_aqr');
  $fame_team_pagination = cs_get_option('team_pagination');

  $team_limit = $team_limit ? $team_limit : '8';
  // Query Starts Here
  // Pagination
  global $paged;
  if( get_query_var( 'paged' ) )
    $my_page = get_query_var( 'paged' );
  else {
    if( get_query_var( 'page' ) )
      $my_page = get_query_var( 'page' );
    else
      $my_page = 1;
    set_query_var( 'paged', $my_page );
    $paged = $my_page;
  }

  $args = array(
    'paged' => $my_page,
    'post_type' => 'team',
    'posts_per_page' => (int)$team_limit,
    'orderby' => $team_orderby,
    'order' => $team_order,
  );

  $fame_team_qury = new WP_Query( $args );
  if ($fame_team_qury->have_posts()) :
  ?>

  <div class="fame-mid-wrap">
    <div class="container">
      <div class="fame-team">
        <div class="row">
        <?php
        while ($fame_team_qury->have_posts()) : $fame_team_qury->the_post();
        // Featured Image
    		$large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
    		$large_image = $large_image[0];
    		$abt_title = get_the_title();
        if ($fame_team_aqr) {
          $team_featured_img = $large_image;
        } else {
      		if(class_exists('Aq_Resize')) {
      			$team_img = aq_resize( $large_image, '380', '380', true );
      		} else {$team_img = $large_image;}
      		$team_featured_img = ( $team_img ) ? $team_img : esc_url(FAME_IMAGES) . '/holders/380x380.png';
        }
        // Link
        $team_options = get_post_meta( get_the_ID(), 'team_options', true );
        $team_pro = $team_options['team_job_position'];
        $team_socials = $team_options['social_icons'];
        ?>
        <div class="col-lg-6 col-md-12">
          <div class="mate-item fame-item">
            <?php if ($large_image) { ?>
            <div class="fame-image"><a href="<?php echo esc_url( get_permalink() ); ?>"><img src="<?php echo esc_url($team_featured_img); ?>" alt="<?php echo esc_attr($abt_title); ?>"></a></div>
            <?php } ?>
            <div class="mate-info">
              <h3 class="mate-name"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html($abt_title); ?></a></h3>
              <h5 class="mate-designation"><?php echo esc_html($team_pro); ?></h5>
              <p><?php the_excerpt(); ?></p>
              <?php if ( ! empty( $team_socials ) ) { ?>
                <div class="fame-social">
                  <?php foreach ( $team_socials as $social ) {
                  if($social['icon_link']) { ?>
                    <a href="<?php echo esc_url($social['icon_link']); ?>"><i class="<?php echo esc_attr($social['icon']); ?>"></i></a>
                  <?php } } ?>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
        </div>
        <?php if($fame_team_qury->max_num_pages > 1) {
          if ($fame_team_pagination) { fame_paging_nav($fame_team_qury->max_num_pages,"",$paged); }
        } wp_reset_postdata(); ?>
      </div>
    </div>
  </div> <!-- Team End -->

  <?php
  endif;

} else {
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
$fame_sidebar_position = cs_get_option('blog_sidebar_position');
$fame_blog_widget = cs_get_option('blog_widget');

if ($fame_blog_widget) {
  $widget_select = $fame_blog_widget;
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
<div class="fame-mid-wrap fame-post-listing <?php echo esc_attr($fame_content_padding .' '. $fame_sidebar_class); ?>" style="<?php echo esc_attr($fame_custom_padding); ?>">
  <div class="container">
    <div class="row">
      <div class="<?php echo esc_attr($layout_class); ?>">
        <?php
        if ( have_posts() ) :
          /* Start the Loop */
          while ( have_posts() ) : the_post();
            get_template_part( 'layouts/post/content' );
          endwhile;
        else :
          get_template_part( 'layouts/post/content', 'none' );
        endif; ?>
        <?php
          fame_default_paging_nav();
          wp_reset_postdata();  // avoid errors further down the page
        ?>
      </div><!-- row -->
      <?php if ($fame_sidebar_position !== 'sidebar-hide') { get_sidebar(); } ?>
    </div>
  </div>
</div>
<?php }
get_footer();
