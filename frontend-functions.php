<?php
/*
 * All Front-End Helper Functions
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/* Exclude category from blog */
if( ! function_exists( 'fame_vt_excludeCat' ) ) {
  function fame_vt_excludeCat($query) {
  	if ( $query->is_home ) {
  		$exclude_cat_ids = cs_get_option('theme_exclude_categories');
  		if($exclude_cat_ids) {
  			foreach( $exclude_cat_ids as $exclude_cat_id ) {
  				$exclude_from_blog[] = '-'. $exclude_cat_id;
  			}
  			$query->set('cat', implode(',', $exclude_from_blog));
  		}
  	}
  	return $query;
  }
  add_filter('pre_get_posts', 'fame_vt_excludeCat');
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function fame_pingback_header() {
  if ( is_singular() && pings_open() ) {
    echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
  }
}
add_action( 'wp_head', 'fame_pingback_header' );

/* Include Default value for dropdown in contact form7*/
function fame_wpcf7_form_elements($html) {
    $text = 'Choose';
    $html = str_replace('---',  $text , $html);
    return $html;
}
add_filter('wpcf7_form_elements', 'fame_wpcf7_form_elements');

/* Excerpt Length */
class FameExcerpt {

  // Default length (by WordPress)
  public static $length = 55;

  // Output: fame_excerpt('short');
  public static $types = array(
    'short' => 25,
    'regular' => 55,
    'long' => 100
  );

  /**
   * Sets the length for the excerpt,
   * then it adds the WP filter
   * And automatically calls the_excerpt();
   *
   * @param string $new_length
   * @return void
   * @author Baylor Rae'
   */
  public static function length($new_length = 55) {
    FameExcerpt::$length = $new_length;
    add_filter('excerpt_length', 'FameExcerpt::new_length');
    FameExcerpt::output();
  }

  // Tells WP the new length
  public static function new_length() {
    if( isset(FameExcerpt::$types[FameExcerpt::$length]) )
      return FameExcerpt::$types[FameExcerpt::$length];
    else
      return FameExcerpt::$length;
  }

  // Echoes out the excerpt
  public static function output() {
    the_excerpt();
  }

}

// Custom Excerpt Length
if( ! function_exists( 'fame_excerpt' ) ) {
  function fame_excerpt($length = 55) {
    FameExcerpt::length($length);
  }
}

if ( ! function_exists( 'fame_new_excerpt_more' ) ) {
  function fame_new_excerpt_more( $more ) {
    return '...';
  }
  add_filter('excerpt_more', 'fame_new_excerpt_more');
}

/* Tag Cloud Widget - Remove Inline Font Size */
if( ! function_exists( 'fame_vt_tag_cloud' ) ) {
  function fame_vt_tag_cloud($tag_string){
    return preg_replace("/style='font-size:.+pt;'/", '', $tag_string);
  }
  add_filter('wp_generate_tag_cloud', 'fame_vt_tag_cloud', 10, 3);
}

/* Password Form */
if( ! function_exists( 'fame_vt_password_form' ) ) {
  function fame_vt_password_form( $output ) {
    $output = str_replace( 'type="submit"', 'type="submit" class=""', $output );
    return $output;
  }
  add_filter('the_password_form' , 'fame_vt_password_form');
}

/* Maintenance Mode */
if( ! function_exists( 'fame_vt_maintenance_mode' ) ) {
  function fame_vt_maintenance_mode(){

    $maintenance_mode_page = cs_get_option( 'maintenance_mode_page' );
    $enable_maintenance_mode = cs_get_option( 'enable_maintenance_mode' );

    if ( isset($enable_maintenance_mode) && ! empty( $maintenance_mode_page ) && ! is_user_logged_in() ) {
      get_template_part('layouts/post/content', 'maintenance');
      exit;
    }

  }
  add_action( 'wp', 'fame_vt_maintenance_mode', 1 );
}

/* Widget Layouts */
if ( ! function_exists( 'fame_vt_footer_widgets' ) ) {
  function fame_vt_footer_widgets() {

    $output = '';
    $footer_widget_layout = cs_get_option('footer_widget_layout');

    if( $footer_widget_layout ) {

      switch ( $footer_widget_layout ) {
        case 1: $widget = array('piece' => 1, 'class' => 'col-md-12'); break;
        case 2: $widget = array('piece' => 2, 'class' => 'col-md-6'); break;
        case 3: $widget = array('piece' => 3, 'class' => 'col-md-4'); break;
        case 4: $widget = array('piece' => 4, 'class' => 'col-md-3 col-sm-6'); break;
        case 5: $widget = array('piece' => 3, 'class' => 'col-md-3', 'layout' => 'col-md-6', 'queue' => 1); break;
        case 6: $widget = array('piece' => 3, 'class' => 'col-md-3', 'layout' => 'col-md-6', 'queue' => 2); break;
        case 7: $widget = array('piece' => 3, 'class' => 'col-md-3', 'layout' => 'col-md-6', 'queue' => 3); break;
        case 8: $widget = array('piece' => 4, 'class' => 'col-lg-2 col-md-4', 'layout' => 'col-lg-6 col-md-12', 'queue' => 1); break;
        case 9: $widget = array('piece' => 4, 'class' => 'col-md-2', 'layout' => 'col-md-6', 'queue' => 4); break;
        case 10: $widget = array('piece' => 5, 'class' => 'col-xl-2 col-md-4', 'layout' => 'col-xl-3 col-md-4', 'queue' => 2, 'layout_two' => 'col-xl-3 col-md-4', 'queue_two' => 5); break;
        default : $widget = array('piece' => 4, 'class' => 'col-md-3'); break;
      }

      for( $i = 1; $i < $widget["piece"]+1; $i++ ) {
        if(isset( $widget["queue_two"] ) && $widget["queue_two"] == $i ){
          $widget_cls = ( isset( $widget["queue_two"] ) && $widget["queue_two"] == $i ) ? $widget["layout_two"] : '';
          $widget_class = '';
        } else {
          $widget_class = ( isset( $widget["queue"] ) && $widget["queue"] == $i ) ? $widget["layout"] : $widget["class"];
          $widget_cls = '';
        }
        $output .= '<div class="'. $widget_class .' fame-item '.$widget_cls.'">';
        ob_start();
        if (is_active_sidebar('footer-'. $i)) {
          dynamic_sidebar( 'footer-'. $i );
        }
        $output .= ob_get_clean();
        $output .= '</div>';
      }
    }
    return $output;
  }
}

if( ! function_exists( 'fame_vt_top_bar' ) ) {
  function fame_vt_top_bar() {

    $out     = '';
    if ( ( cs_get_option( 'top_left' ) || cs_get_option( 'top_right' ) ) ) {
      $out .= '<div class="fame-topbar"><div class="container"><div class="row">';
      $out .= fame_vt_top_bar_modules( 'left' );
      $out .= fame_vt_top_bar_modules( 'right' );
      $out .= '</div></div></div>';
    }
    return $out;
  }
}

/* WP Link Pages */
if ( ! function_exists( 'fame_wp_link_pages' ) ) {
  function fame_wp_link_pages() {
    $defaults = array(
      'before'           => '<div class="wp-link-pages">' . esc_html__( 'Pages:', 'fame' ),
      'after'            => '</div>',
      'link_before'      => '<span>',
      'link_after'       => '</span>',
      'next_or_number'   => 'number',
      'separator'        => ' ',
      'pagelink'         => '%',
      'echo'             => 1
    );
    wp_link_pages( $defaults );
  }
}

/* Author Info */
if ( ! function_exists( 'fame_author_info' ) ) {
  function fame_author_info() {

    if (get_the_author_meta( 'url' )) {
      $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $website_url = get_the_author_meta( 'url' );
      $target = 'target="_blank"';
    } else {
      $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $website_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $target = '';
    }

    // variables
    $author_content = get_the_author_meta( 'description' );
if ($author_content) {
?>
  <div class="fame-author-info">
    <div class="author-avatar">
      <a href="<?php echo esc_url($website_url); ?>" <?php echo esc_attr($target); ?>>
        <?php echo get_avatar( get_the_author_meta( 'ID' ), 72 ); ?>
      </a>
    </div>
    <div class="author-content">
      <a href="<?php echo esc_url($author_url); ?>" class="author-name"><?php echo esc_html(get_the_author_meta('first_name')).' '.esc_html(get_the_author_meta('last_name')); ?></a>
      <p><?php echo esc_html(get_the_author_meta( 'description' )); ?></p>
      <div class="fame-social">
        <?php
        if (get_the_author_meta( 'facebook' )): ?><a href="<?php echo esc_url( get_the_author_meta( 'facebook' ) ); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
        <?php endif;

        if (get_the_author_meta( 'twitter' )): ?><a href="<?php echo esc_url( get_the_author_meta( 'twitter' ) ); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
        <?php endif;

        if (get_the_author_meta( 'linkedin' )): ?><a href="<?php echo esc_url( get_the_author_meta( 'linkedin' ) ); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
        <?php endif;

        if (get_the_author_meta( 'dribbble' )): ?><a href="<?php echo esc_url( get_the_author_meta( 'dribbble' ) ); ?>" target="_blank"><i class="fa fa-dribbble"></i></a>
        <?php endif;

        if (get_the_author_meta( 'instagram' )): ?><a href="<?php echo esc_url( get_the_author_meta( 'instagram' ) ); ?>" target="_blank"><i class="fa fa-instagram"></i></a>
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php
} // if $author_content
  }
}

/* ==============================================
   Custom Comment Area Modification
=============================================== */
if ( ! function_exists( 'fame_comment_modification' ) ) {
  function fame_comment_modification($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
    if ( 'div' == $args['style'] ) {
      $tag = 'div';
      $add_below = 'comment';
    } else {
      $tag = 'li';
      $add_below = 'div-comment';
    }
    $comment_class = empty( $args['has_children'] ) ? '' : 'parent';
  ?>

  <<?php echo esc_attr($tag); ?> <?php comment_class('item ' . $comment_class .' ' ); ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-item">
    <?php endif; ?>
    <div class="comment-theme">
        <div class="comment-image">
          <?php if ( $args['avatar_size'] != 0 ) {
            echo get_avatar( $comment, 72 );
          } ?>
        </div>
    </div>
    <div class="comment-main-area">
      <div class="comment-wrapper">
        <div class="fame-comments-meta">
          <h4><?php printf( '%s', get_comment_author() ); ?></h4>
          <div class="comments-reply">
          <?php
            comment_reply_link( array_merge( $args, array(
            'reply_text' => '<span class="comment-reply-link">'. esc_html__('Reply','fame') .'</span>',
            'before' => '',
            'class'  => '',
            'depth' => $depth,
            'max_depth' => $args['max_depth']
            ) ) );
          ?>
          </div>
        </div>
        <?php if ( $comment->comment_approved == '0' ) : ?>
        <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'fame' ); ?></em>
        <?php endif; ?>
        <div class="comment-area">
          <?php comment_text(); ?>
        </div>
      </div>
    </div>
  <?php if ( 'div' != $args['style'] ) : ?>
  </div>
  <?php endif;
  }
}

/* Comments Form - Textarea next to Normal Fields */
if( ! function_exists( 'fame_move_comment_field' ) ) {
  add_filter( 'comment_form_fields', 'fame_move_comment_field' );
  function fame_move_comment_field( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
  }
}

/* Title Area */
if ( ! function_exists( 'fame_title_area' ) ) {
  function fame_title_area() {

    global $post, $wp_query;
    // Get post meta in all type of WP pages
    $fame_id    = ( isset( $post ) ) ? $post->ID : 0;
    $fame_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $fame_id;
    $fame_id    = ( fame_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $fame_id;
    $fame_meta  = get_post_meta( $fame_id, 'page_type_metabox', true );
    if ($fame_meta && (!is_archive() || fame_is_woocommerce_shop())) {
      $custom_title = $fame_meta['page_custom_title'];
      if ($custom_title) {
        $custom_title = $custom_title;
      } else {
        $custom_title = '';
      }
    } else { $custom_title = ''; }

    /**
     * For strings with necessary HTML, use the following:
     * Note that I'm only including the actual allowed HTML for this specific string.
     * More info: https://codex.wordpress.org/Function_Reference/wp_kses
     */
    $allowed_title_area_tags = array(
        'a' => array(
          'href' => array(),
        ),
        'span' => array(
          'class' => array(),
        )
    );

    if( $custom_title && !is_search()) {
      echo esc_html($custom_title);
    } elseif ( is_home() ) {
      bloginfo('description');
    } elseif( is_singular('product') ) {
      $post_type = get_post_type_object( get_post_type($post) );
      echo esc_html($post_type->label);
    } elseif( is_singular('tribe_events') ) {
      echo get_the_title($wp_query->post->ID);
    } elseif ( is_search() ) {
      printf( esc_html__( 'Search Results for %s', 'fame' ), '<span>' . get_search_query() . '</span>' );
    } elseif ( is_category() || is_tax() ){
      single_cat_title();
    } elseif ( is_tag() ){
      single_tag_title(esc_html__('Posts Tagged: ', 'fame'));
    } elseif ( is_archive() ){
      if ( is_day() ) {
        printf( wp_kses( __( 'Archive for <span>%s</span>', 'fame' ), $allowed_title_area_tags ), get_the_date());
      } elseif ( is_month() ) {
        printf( wp_kses( __( 'Archive for <span>%s</span>', 'fame' ), $allowed_title_area_tags ), get_the_date( 'F, Y' ));
      } elseif ( is_year() ) {
        printf( wp_kses( __( 'Archive for <span>%s</span>', 'fame' ), $allowed_title_area_tags ), get_the_date( 'Y' ));
      } elseif ( is_author() ) {
        printf( wp_kses( __( 'Posts by: <span>%s</span>', 'fame' ), $allowed_title_area_tags ), get_the_author_meta( 'display_name', $wp_query->post->post_author ));
      } elseif( is_shop() ) {
        esc_html_e( 'Shop', 'fame' );
      } elseif(tribe_is_month()) {
        esc_html_e( 'Events', 'fame' );
      } elseif ( is_post_type_archive() ) {
        post_type_archive_title();
      } else {
        esc_html_e( 'Archives', 'fame' );
      }
    } else {
      the_title();
    }

  }
}

// Woocommerce
if (class_exists( 'WooCommerce' )) {
  // Single Product Page - Related Products Limit & columns
  add_filter( 'woocommerce_output_related_products_args', 'fame_related_products_args' );
  function fame_related_products_args( $args ) {
    $woo_related_limit = cs_get_option('woo_related_limit');
    $columns = cs_get_option('woo_product_columns');
    if ($woo_related_limit) {
      $args['posts_per_page'] = (int)$woo_related_limit; // 4 related products
    } else {
      $args['posts_per_page'] = 3; // 4 related products
    }
    return $args;
  }
  // Related Products Title Change
  $related_title = cs_get_option('woo_related_title');
  function custom_related_products_text( $translated_text, $text, $domain ) {
  $related_title = cs_get_option('woo_related_title');
    switch ( $translated_text ) {
      case 'Related products' :
        $translated_text = $related_title;
        break;
    }
    return $translated_text;
  }
  if($related_title){
    add_filter( 'gettext', 'custom_related_products_text', 20, 3 );
  }
  // Remove You May Also Interested In section
  $woo_single_crosssell = cs_get_option('woo_single_crosssell');
  if(!$woo_single_crosssell) {
    remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
  }
  // Remove Related Products section
  $woo_single_related = cs_get_option('woo_single_related');
  if(!$woo_single_related) {
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
  }
  // Remove You May Also Like section
  $woo_single_upsell = cs_get_option('woo_single_upsell');
  if(!$woo_single_upsell) {
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
  }
}

/**
 * Pagination Function
 */
if ( ! function_exists( 'fame_default_paging_nav' ) ) {
  function fame_default_paging_nav($nav_query = NULL) {
    if ( function_exists('wp_pagenavi')) {
      echo '<div class="pagination-wrap"><div class="fame-pagination"><div class="fame-pagenavi">';
      wp_pagenavi();
      echo '</div></div></div>';
    } else {
      global $wp_query;
      $big = 999999999;
      $current = max( 1, get_query_var('paged') );
      $total = ($nav_query != NULL) ? $nav_query->max_num_pages : $wp_query->max_num_pages;

      if($wp_query->max_num_pages == '1' ) {} else {echo '';}
      echo '<div class="pagination-wrap"><div class="fame-pagination"><div class="fame-pagenavi">';
      echo paginate_links( array(
        'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
        'format' => '?paged=%#%',
        'prev_text' => '<i class="fa fa-angle-left"></i>',
        'next_text' => ' <i class="fa fa-angle-right"></i>',
        'current' => $current,
        'total' => $total,
        'type' => 'list'
      ));
      echo '</div></div></div>';
      if($wp_query->max_num_pages == '1' ) {} else {echo '';}
    }
  }
}

if ( ! function_exists( 'fame_paging_nav' ) ) {
  function fame_paging_nav($numpages = '', $pagerange = '', $paged='') {

      if (empty($pagerange)) {
        $pagerange = 2;
      }
      if (empty($paged)) {
        $paged = 1;
      } else {
        $paged = $paged;
      }
      if ($numpages == '') {
        global $wp_query;
        $numpages = $wp_query->max_num_pages;
        if(!$numpages) {
          $numpages = 1;
        }
      }
      global $wp_query;
      $big = 999999999;
      if($wp_query->max_num_pages != '1' ) { ?>
      <div class="fame-pagination">
        <?php echo paginate_links( array(
          'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
          'format' => '?paged=%#%',
          'prev_text' => '<i class="fa fa-angle-left"></i>',
          'next_text' => '<i class="fa fa-angle-right"></i>',
          'current' => $paged,
          'total' => $numpages,
          'type' => 'list'
        )); ?>
      </div>
    <?php }
  }
}

/**
 * Custom Pagination Function
 */
if ( ! function_exists( 'fame_custom_paging_nav' ) ) {
  function fame_custom_paging_nav($numpages = '', $pagerange = '', $paged='') {
    if (empty($pagerange)) {
      $pagerange = 2;
    }
    if (empty($paged)) {
      $paged = 1;
    } else {
      $paged = $paged;
    }
    if ($numpages == '') {
      global $wp_query;
      $numpages = $wp_query->max_num_pages;
      if(!$numpages) {
        $numpages = 1;
      }
    }
    $big = 999999999; ?>
    <div class="fame-pagenavi">
      <?php echo paginate_links( array(
        'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
        'format' => '?page=%#%',
        'prev_text' => '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        'next_text' => '<i class="fa fa-angle-right" aria-hidden="true"></i>',
        'current' => $paged,
        'total' => $numpages,
        'type' => 'list'
      )); ?>
  </div>
<?php
  }
}
/* Added next class to wp-pagenavi*/
add_filter('wp_pagenavi_class_nextpostslink', 'fame_pagination_nextpostslink_class');
function fame_pagination_nextpostslink_class($class_name) {
  return 'next';
}
// Custom Post Type limit
function fame_custom_posts_per_page( $query ) {
  if ( post_type_exists( 'team' ) ) {
    if ( is_post_type_archive('team') ) {
      $team_limit = cs_get_option('team_limit');
      $team_limit = $team_limit ? $team_limit : '6';
      if ( $query->query_vars['post_type'] === 'team' ) $query->query_vars['posts_per_page'] = $team_limit;
    }
  }
  if ( post_type_exists( 'portfolio' ) ) {
    if ( is_post_type_archive('portfolio') ) {
      $portfolio_limit = cs_get_option('portfolio_limit');
      $portfolio_limit = $portfolio_limit ? $portfolio_limit : '6';
      if ( $query->query_vars['post_type'] === 'portfolio' ) $query->query_vars['posts_per_page'] = $portfolio_limit;
    }
    if (is_tax('portfolio_category')) {
      $portfolio_limit = cs_get_option('portfolio_limit');
      $portfolio_limit = $portfolio_limit ? $portfolio_limit : '6';
      $query->set('posts_per_page', $portfolio_limit);
    }
  }
  if ( post_type_exists( 'casestudies' ) ) {
    if ( is_post_type_archive('casestudies') ) {
      $case_studies_limit = cs_get_option('case_studies_limit');
      $case_studies_limit = $case_studies_limit ? $case_studies_limit : '6';
      if ( $query->query_vars['post_type'] === 'casestudies' ) $query->query_vars['posts_per_page'] = $case_studies_limit;
    }
    if (is_tax('casestudies_category')) {
      $case_studies_limit = cs_get_option('case_studies_limit');
      $case_studies_limit = $case_studies_limit ? $case_studies_limit : '6';
      $query->set('posts_per_page', $case_studies_limit);
    }
  }
  return $query;
}
add_filter( 'pre_get_posts', 'fame_custom_posts_per_page' );

if( ! function_exists( 'fame_reading_time_default' ) ) {
  function fame_reading_time_default() {
    global $reading_time_post_types, $reading_time_shortcodes;
    $update_options = array(
    'label'              => 'Reading Time: ',
    'postfix'            => 'minutes',
    'postfix_singular'   => 'minute',
    'wpm'                => '300',
    'before_content'     => false,
    'before_excerpt'     => false,
    'exclude_images'     => false,
    'post_types'         => $reading_time_post_types,
    'include_shortcodes' => $reading_time_shortcodes,
  );

  update_option( 'rt_reading_time_options', $update_options );
  }
  add_action( 'after_switch_theme', 'fame_reading_time_default' );
}

if( ! function_exists( 'fame_reading_time_default_after' ) ) {
  function fame_reading_time_default_after() {
    global $reading_time_post_types, $reading_time_shortcodes;
    $update_options = array(
    'label'              => 'Reading Time: ',
    'postfix'            => 'minutes',
    'postfix_singular'   => 'minute',
    'wpm'                => '300',
    'before_content'     => false,
    'before_excerpt'     => false,
    'exclude_images'     => false,
    'post_types'         => $reading_time_post_types,
    'include_shortcodes' => $reading_time_shortcodes,
  );

  update_option( 'rt_reading_time_options', $update_options );
  }
  add_action( 'pt-ocdi/after_content_import_execution', 'fame_reading_time_default_after' );
}

if( ! function_exists( 'is_elementor' ) ) {
  function is_elementor(){
    $fame_page = get_post( cs_get_option('maintenance_mode_page') );
    if (Elementor\Plugin::instance()->db->is_built_with_elementor( $fame_page->ID )) {
      return true;
    } else {
      return null;
    }
  }
}
/*
 * Set post views count using post meta
 */
function fame_getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}
function fame_setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

/**
 * Filter the categories archive widget to add a span around post count
 */
function fame_cat_count_span( $links ) {
  $links = str_replace( '</a> (', '</a><span class="post-count">(', $links );
  $links = str_replace( ')', ')</span>', $links );
  return $links;
}
add_filter( 'wp_list_categories', 'fame_cat_count_span' );

/**
 * Filter the archives widget to add a span around post count
 */
function fame_archive_count_span( $links ) {
  $links = str_replace( '</a>&nbsp;(', '</a><span class="post-count">(', $links );
  $links = str_replace( ')', ')</span>', $links );
  return $links;
}
add_filter( 'get_archives_link', 'fame_archive_count_span' );