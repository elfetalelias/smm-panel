<?php
/*
 * Fame Theme Widgets
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

if ( ! function_exists( 'fame_vt_widget_init' ) ) {
	function fame_vt_widget_init() {
		if ( function_exists( 'register_sidebar' ) ) {

			// Main Widget Area
			register_sidebar(
				array(
					'name' => esc_html__( 'Main Widget Area', 'fame' ),
					'id' => 'sidebar-1',
					'description' => esc_html__( 'Appears on posts and pages.', 'fame' ),
					'before_widget' => '<div id="%1$s" class="fame-widget %2$s">',
					'after_widget' => '</div> <!-- end widget -->',
					'before_title' => '<h4 class="widget-title">',
					'after_title' => '</h4>',
				)
			);

		  // Footer Widgets
			$footer_widgets = cs_get_option( 'footer_widget_layout' );
	    if( $footer_widgets ) {

	      switch ( $footer_widgets ) {
	        case 5:
	        case 6:
	        case 7:
	          $length = 3;
	        break;

	        case 8:
	        case 9:
	          $length = 4;
	        break;
	        case 10:
	          $length = 5;
          break;
	        default:
	          $length = $footer_widgets;
	        break;
	      }

	      for( $i = 0; $i < $length; $i++ ) {

	        $num = ( $i+1 );

	        register_sidebar( array(
	          'id'            => 'footer-' . $num,
	          'name'          => esc_html__( 'Footer Widget ', 'fame' ). $num,
	          'description'   => esc_html__( 'Appears on footer section.', 'fame' ),
	          'before_widget' => '<div class="footer-widget %2$s">',
	          'after_widget'  => '<div class="clear"></div></div> <!-- end widget -->',
	          'before_title'  => '<h3 class="widget-title">',
	          'after_title'   => '</h3>'
	        ) );

	      }

	    }
	    // Footer Widgets

  		if (class_exists( 'WooCommerce' )) {
		    // Shop Widget
				register_sidebar(
					array(
						'name' => esc_html__( 'Shop Widget', 'fame' ),
						'id' => 'shop',
						'description' => esc_html__( 'Appears on WooCommerce Pages.', 'fame' ),
						'before_widget' => '<div id="%1$s" class="fame-widget %2$s">',
						'after_widget' => '</div> <!-- end widget -->',
						'before_title' => '<h6 class="widget-title">',
						'after_title' => '</h6>',
					)
				);
				// Shop Widget
			}

			/* Custom Sidebar */
			$custom_sidebars = cs_get_option('custom_sidebar');
			if ($custom_sidebars) {
				foreach($custom_sidebars as $custom_sidebar) :
				$heading = $custom_sidebar['sidebar_name'];
				$own_id = preg_replace('/[^a-z]/', "-", strtolower($heading));
				$desc = $custom_sidebar['sidebar_desc'];

				register_sidebar( array(
					'name' => esc_html($heading),
					'id' => $own_id,
					'description' => esc_html($desc),
					'before_widget' => '<div id="%1$s" class="fame-widget %2$s">',
					'after_widget' => '</div> <!-- end widget -->',
					'before_title' => '<h4 class="widgets-title">',
					'after_title' => '</h4>',
				) );
				endforeach;
			}
			/* Custom Sidebar */

		}
	}
	add_action( 'widgets_init', 'fame_vt_widget_init' );
}
