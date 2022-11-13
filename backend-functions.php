<?php
/*
 * All Back-End Helper Functions for Fame Theme
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/* Validate px entered in field */
if( ! function_exists( 'fame_check_px' ) ) {
  function fame_check_px( $num ) {
    return ( is_numeric( $num ) ) ? $num . 'px' : $num;
  }
}

/* Escape Strings */
if( ! function_exists( 'fame_vt_esc_string' ) ) {
  function fame_vt_esc_string( $num ) {
    return preg_replace('/\D/', '', $num);
  }
}

/* Escape Numbers */
if( ! function_exists( 'fame_vt_esc_number' ) ) {
  function fame_vt_esc_number( $num ) {
    return preg_replace('/[^a-zA-Z]/', '', $num);
  }
}

/* Compress CSS */
if ( ! function_exists( 'fame_compress_css_lines' ) ) {
  function fame_compress_css_lines( $css ) {
    $css  = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css );
    $css  = str_replace( ': ', ':', $css );
    $css  = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $css );
    return $css;
  }
}

/* Inline Style */
global $all_inline_styles;
$all_inline_styles = array();
if( ! function_exists( 'fame_add_inline_style' ) ) {
  function fame_add_inline_style( $style ) {
    global $all_inline_styles;
    array_push( $all_inline_styles, $style );
  }
}

/* HEX to RGB */
if( ! function_exists( 'fame_vt_hex2rgb' ) ) {
  function fame_vt_hex2rgb( $hexcolor, $opacity = 1 ) {

    if( preg_match( '/^#[a-fA-F0-9]{6}|#[a-fA-F0-9]{3}$/i', $hexcolor ) ) {

      $hex    = str_replace( '#', '', $hexcolor );

      if( strlen( $hex ) == 3 ) {
        $r    = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
        $g    = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
        $b    = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
      } else {
        $r    = hexdec( substr( $hex, 0, 2 ) );
        $g    = hexdec( substr( $hex, 2, 2 ) );
        $b    = hexdec( substr( $hex, 4, 2 ) );
      }

      return ( isset( $opacity ) && $opacity != 1 ) ? 'rgba('. $r .', '. $g .', '. $b .', '. $opacity .')' : ' ' . $hexcolor;

    } else {

      return $hexcolor;

    }

  }
}

/* Yoast Plugin Metabox Low */
if( ! function_exists( 'fame_vt_yoast_metabox' ) ) {
  function fame_vt_yoast_metabox() {
    return 'low';
  }
  add_filter( 'wpseo_metabox_prio', 'fame_vt_yoast_metabox' );
}

if( ! function_exists( 'fame_is_post_type' ) ) {
  function fame_is_post_type($type){
    global $wp_query;
    if($type == get_post_type($wp_query->post->ID)) return true;
    return false;
  }
}

/**
 * If WooCommerce Plugin Activated
 */
if ( ! function_exists( 'fame_is_woocommerce_activated' ) ) {
  function fame_is_woocommerce_activated() {
    if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
  }
}

/**
 * If is WooCommerce Shop
 */
if ( ! function_exists( 'fame_is_woocommerce_shop' ) ) {
  function fame_is_woocommerce_shop() {
    if ( fame_is_woocommerce_activated() && is_shop() ) { return true; } else { return false; }
  }
}

/**
 * If is WPML is active
 */
if ( ! function_exists( 'fame_is_wpml_activated' ) ) {
  function fame_is_wpml_activated() {
    if ( class_exists( 'SitePress' ) ) { return true; } else { return false; }
  }
}

/**
 * Remove Rev Slider Metabox
 */
if ( is_admin() ) {
  if( ! function_exists( 'fame_remove_rev_slider_meta_boxes' ) ) {
    function fame_remove_rev_slider_meta_boxes() {
      remove_meta_box( 'mymetabox_revslider_0', 'page', 'normal' );
      remove_meta_box( 'mymetabox_revslider_0', 'post', 'normal' );
      remove_meta_box( 'mymetabox_revslider_0', 'team', 'normal' );
      remove_meta_box( 'mymetabox_revslider_0', 'testimonial', 'normal' );
      remove_meta_box( 'mymetabox_revslider_0', 'portfolio', 'normal' );
    }
    add_action( 'do_meta_boxes', 'fame_remove_rev_slider_meta_boxes' );
  }
}

/* Custom Styles */
if( ! function_exists( 'fame_vt_custom_css' ) ) {
  function fame_vt_custom_css() {
    wp_enqueue_style('fame-default-style', get_template_directory_uri() . '/style.css');
    $output = fame_dynamic_styles();
    $custom_css = fame_compress_css_lines( $output );

    wp_add_inline_style( 'fame-default-style', $custom_css );
  }
}

/**
 * Check if Codestar Framework is Active or Not!
 */
if ( ! function_exists( 'fame_framework_active' ) ) {
  function fame_framework_active() {
    return ( class_exists( 'CSF' ) ) ? true : false;
  }
}

// A Custom function for Fame Options
if ( ! function_exists( 'cs_get_option' ) ) {
  function cs_get_option( $option = '', $default = null ) {
    $options = get_option( 'fame_csf_theme_options' ); // Attention: Set your unique id of the framework
    return ( isset( $options[$option] ) ) ? $options[$option] : $default;
  }
}

// A Custom function for Fame Customizer Options
if ( ! function_exists( 'cs_get_customize_option' ) ) {
  function cs_get_customize_option( $option = '', $default = null ) {
    $options = get_option( 'fame_csf_customizer' ); // Attention: Set your unique id of the framework
    return ( isset( $options[$option] ) ) ? $options[$option] : $default;
  }
}

// Adding extra feature image for aligning content in one div in day view
if ( ! function_exists( 'fame_add_featured_image' ) ) {
  function fame_add_featured_image() {
    echo '<div class="list-featured-image">';
    echo tribe_event_featured_image( null, 'medium' );
    echo '</div>';
  }
  add_action('tribe_events_before_the_event_title','fame_add_featured_image');
}

// Adding extra feature image for aligning content in one div in day view
if ( ! function_exists( 'fame_add_event_organizer' ) ) {
  function fame_add_event_organizer() {
    $organizer_meta = get_post_meta( get_the_ID(), 'event_options', true );
    if ($organizer_meta) {
      $schedules = $organizer_meta['schedules'];
    } else {
      $schedules = '';
    }
    if ($schedules) {
    ?>
    <div class="fame-schedule">
      <h2 class="event-wrap-title">Schedule</h2>
      <div id="accordion" class="accordion collapse-others">
        <?php
        $key = 1;
        foreach ( $schedules as $schedule ) {
          if ($key == 1) {
            $opened    = ' show';
            $collapsed = '';
          } else {
            $opened    = '';
            $collapsed = 'class="collapsed"';
          }
          $uniqtab     = uniqid(); ?>

          <div class="card<?php echo esc_attr($opened); ?>">
            <div class="card-header" id="schedule<?php echo esc_attr($key.$uniqtab); ?>">
              <h4 class="accordion-title">
                <a href="javascript:void(0);" <?php echo esc_attr($collapsed); ?> data-toggle="collapse" data-target="#fameAcc-<?php echo esc_attr($key.$uniqtab); ?>" aria-expanded="true" aria-controls="fameAcc-<?php echo esc_attr($key.$uniqtab); ?>"><i class="fa fa-calendar-o" aria-hidden="true"></i>
                  <?php echo esc_html($schedule['schedule_title']); ?>
                </a>
              </h4>
            </div>
            <div id="fameAcc-<?php echo esc_attr($key.$uniqtab); ?>" class="collapse<?php echo esc_attr($opened); ?>" data-parent="#accordion">
              <div class="card-body">
                <?php foreach ( $schedule['schedule_item'] as $schedule_item ) {
                $open_tab = $schedule_item['open_tab'] ? ' target="_blank"' : '';
                ?>
                  <div class="schedule-item">
                    <?php if ($schedule_item['schedule_image']['url']) { ?>
                    <div class="fame-image"><img src="<?php echo esc_url($schedule_item['schedule_image']['url']); ?>" alt="Fame"></div>
                    <?php } ?>
                    <div class="schedule-info">
                      <?php if ($schedule_item['schedule_item_time']) { ?>
                      <h5 class="schedule-time"><?php echo esc_html($schedule_item['schedule_item_time']); ?></h5>
                      <?php }
                      if ($schedule_item['schedule_item_title_link']) { ?>
                        <h4 class="schedule-title"><a href="<?php echo esc_url($schedule_item['schedule_item_title_link']); ?>"<?php echo esc_attr($open_tab); ?>><?php echo esc_html($schedule_item['schedule_item_title']); ?></a></h4>
                      <?php } else { ?>
                        <h4 class="schedule-title"><?php echo esc_html($schedule_item['schedule_item_title']); ?></h4>
                      <?php }
                      if ($schedule_item['schedule_item_organizer']) { ?>
                        <p><?php esc_html_e('By', 'fame'); ?> <?php echo tribe_get_organizer($schedule_item['schedule_item_organizer']); ?></p>
                      <?php } ?>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
          <?php $key++;
        } ?>

      </div>
    </div>
    <?php }
    $organizer_ids = tribe_get_organizer_ids();
    $multiple = count( $organizer_ids ) > 1;
    if ( tribe_has_organizer() ) { ?>
      <div class="fame-speakers"><h2 class="event-wrap-title"><?php echo esc_html('Speakers', 'fame' ); ?></h2><div class="speakers-wrap">
      <?php foreach ( $organizer_ids as $organizer ) {
        $size = 'medium';
        $link = false;

        $organizer_meta = get_post_meta( $organizer, 'organizer_option', true );
        $organizer_role = $organizer_meta['organizer_role'];
        $organizer_socials = $organizer_meta['social_icons'];
        ?>
        <div class="speaker-item">
          <div class="fame-image"><?php echo tribe_event_featured_image( $organizer, $size, $link ); ?></div>
          <div class="speaker-info">
            <h3 class="speaker-name"><?php echo tribe_get_organizer_link( $organizer ); ?></h3>
            <?php if ($organizer_role) { ?><h5 class="speaker-designation"><?php echo esc_html($organizer_role); ?></h5><?php } ?>
            <p><?php
            $content_post = get_post(tribe_get_organizer_ID($organizer));
            $content = $content_post->post_content;
            echo esc_html($content);
            ?></p>
            <?php if ( ! empty( $organizer_socials ) ) { ?>
              <div class="fame-social">
                <?php foreach ( $organizer_socials as $social ) {
                if($social['icon_link']) { ?>
                  <a href="<?php echo esc_url($social['icon_link']); ?>"><i class="<?php echo esc_attr($social['icon']); ?>"></i></a>
                <?php } } ?>
              </div>
            <?php } ?>
          </div>
        </div>
      <?php } ?>
      </div></div>
    <?php }

  }
  add_action('tribe_events_single_event_after_the_content','fame_add_event_organizer');
}