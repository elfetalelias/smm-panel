<?php
/*
 * The template for portfolio category pages.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header();
$noneed_portfolio_post = cs_get_option('noneed_portfolio_post');

if (function_exists( 'fame_core_plugin_status' ) && (fame_is_post_type('portfolio') && !$noneed_portfolio_post)) {

  $portfolio_limit = cs_get_option('portfolio_limit');
  $fame_portfolio_orderby = cs_get_option('portfolio_orderby');
  $fame_portfolio_order = cs_get_option('portfolio_order');
  $fame_portfolio_pagination = cs_get_option('portfolio_pagination');
  $fame_categories_text = cs_get_option('categories_text');
  $portfolio_limit = $portfolio_limit ? $portfolio_limit : '9';

  $all_text = cs_get_option('all_text');
  $all_text_actual = $all_text ? $all_text : esc_html__('All', 'fame');
  $fame_categories_text = $fame_categories_text ? $fame_categories_text : esc_html__('Categories', 'fame');

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

  $portfolio_category = get_queried_object();

  $args = array(
    // other query params here,
    'paged' => $my_page,
    'post_type' => 'portfolio',
    'posts_per_page' => (int)$portfolio_limit,
    'portfolio_category' => $portfolio_category->name,
    'orderby' => $fame_portfolio_orderby,
    'order' => $fame_portfolio_order
  );

  $fame_port = new WP_Query( $args ); ?>
  <div class="fame-portfolio">
    <div class="container">
      <div class="row">

  	    <!-- Start -->
  	    <div class="col-xl-12">
          <div class="portfolio-wrap">
            <div class="fame-masonry" id="section-portfolio">
      	    	<?php
      	      if ($fame_port->have_posts()) : while ($fame_port->have_posts()) : $fame_port->the_post();
      	        get_template_part( 'layouts/post/content', 'portfolio' );
      	        endwhile;
      	      else :
      	        get_template_part( 'layouts/post/content', 'none' );
      	      endif; ?>
            </div>
          </div>
  	    </div>
  			<!-- End -->
        <?php if($fame_port->max_num_pages > 1) { ?>
        <div class="pagination-wrap">
  	    	<?php if ($fame_portfolio_pagination) { fame_paging_nav($fame_port->max_num_pages,"",$paged); } ?>
  	  	</div>
        <?php } wp_reset_postdata(); ?>

    	</div>
    </div>
  </div>

<?php }
get_footer();
