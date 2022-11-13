<?php

if (!function_exists('fame_portfolio_ajax_scripts')) {
  function fame_portfolio_ajax_scripts() {
    wp_enqueue_script( 'fame-more-portfolio-post', FAME_SCRIPTS . '/load-more-portfolio.js', array( 'jquery' ), FAME_VERSION, false );
    $fame_admin_url = array(
      'ajaxurl' => admin_url('admin-ajax.php'),
      'olderpost' => (cs_get_option('older_post')) ? : esc_html__( 'Prev', 'fame' ),
      'newerpost' => (cs_get_option('newer_post')) ? : esc_html__( 'Next', 'fame' ),
    );
    wp_localize_script( 'fame-more-cat-post', 'fame_admin_url', $fame_admin_url );
  }
  add_action('wp_enqueue_scripts', 'fame_portfolio_ajax_scripts');
}

if (!function_exists('fame_portfolio_ajax')) {
  function fame_portfolio_ajax(){

    $cat     = (isset($_POST['cat'])) ? $_POST['cat'] : '';
    $items   = (isset($_POST['limit'])) ? $_POST['limit'] : '5';

    if (!$items) {
      $ppp = 5;
    } else {
      $ppp = $items;
    }

    $args = array(
      'post_type'       => 'portfolio',
      'posts_per_page'  => $items,
      'portfolio_category'   => $cat,
      'post_status'     => 'publish',
    );

    $cat_query = new WP_Query($args); ?>
      <div class="fame-port-data">
        <?php if ($cat_query->have_posts()) : while ($cat_query->have_posts()) : $cat_query->the_post();
          get_template_part( 'layouts/post/content', 'portfolio' );
        endwhile;
        endif; ?>
     </div>
     <?php 
     $max_products = $cat_query->max_num_pages;
     $total_products = $cat_query->found_posts;
      if ($ppp < $total_products) {
        echo '<nav class="fame-pagination"><ul class="page-numbers ajax-page-numbers">';
          for ($i=1; $i <= $max_products; $i++) {
            $current = ($i == 1) ? 'current disabled-click' : '';
            echo '<li><a data-page="'.esc_attr($i).'" class="page-numbers '.$current.'" href="#">'.esc_html($i).'</a></li>';
          }
          if ($ppp < $total_products) { echo '<li class="last update-item"><a class="next page-numbers" data-page="2" href="#">'.esc_url($fame_admin_url).esc_html($newerpost).' <i class="fa fa-angle-right"></i></a></li>'; }
        echo '</ul></nav>';
      } ?>
     <?php wp_die();
  }
}
add_action('wp_ajax_nopriv_fame_portfolio_ajax', 'fame_portfolio_ajax');
add_action('wp_ajax_fame_portfolio_ajax', 'fame_portfolio_ajax');

if (!function_exists('fame_more_portfolio_ajax_pagi')) {
  function fame_more_portfolio_ajax_pagi(){
    $cat     = (isset($_POST['cat'])) ? $_POST['cat'] : '';
    $items   = (isset($_POST['limit'])) ? $_POST['limit'] : '5';

    if (!$items) {
      $ppp = 5;
    } else {
      $ppp = $items;
    }

    $cat     = (isset($_POST['cat'])) ? $_POST['cat'] : '';
    $offset  = (isset($_POST['offset'])) ? $_POST['offset'] : 0;
    if ($offset > 1) {
      $offset  = ($offset - 1) * $ppp;
    } else {
      $offset  = 0;
    }

    $args = array(
      'post_type'      => 'portfolio',
      'posts_per_page' => $ppp,
      'offset'         => $offset
    );
    if ($cat) {
      $args['tax_query'] = array(
        array(
          'taxonomy' => 'portfolio_category',
          'field'    => 'slug',
          'terms'    => $cat,
        ),
      );
    }

    $cat_query = new WP_Query($args); ?>
      <div class="fame-port-data">
        <?php if ($cat_query->have_posts()) : while ($cat_query->have_posts()) : $cat_query->the_post();
          get_template_part( 'layouts/post/content', 'portfolio' );
        endwhile;
        endif; ?>
     </div>
     <?php 
     $max_products = $cat_query->max_num_pages;
     $total_products = $cat_query->found_posts;
      if ($ppp < $total_products) {
        echo '<nav class="fame-pagination"><ul class="page-numbers ajax-page-numbers fame-pagination">';
          for ($i=1; $i <= $max_products; $i++) {
            // $current = ($i == 1) ? 'current disabled-click' : '';
            echo '<li><a data-page="'.esc_attr($i).'" class="page-numbers" href="#">'.esc_html($i).'</a></li>';
          }
          if ($ppp < $total_products) { echo '<li class="last update-item"><a class="next page-numbers" data-page="2" href="#">'.esc_url($fame_admin_url).esc_html($newerpost).' <i class="fa fa-angle-right"></i></a></li>'; }
        echo '</ul></nav>';
      } ?>
     <?php wp_die();
  }
}
add_action('wp_ajax_nopriv_fame_more_portfolio_ajax_pagi', 'fame_more_portfolio_ajax_pagi');
add_action('wp_ajax_fame_more_portfolio_ajax_pagi', 'fame_more_portfolio_ajax_pagi');
