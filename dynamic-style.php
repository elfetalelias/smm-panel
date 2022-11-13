<?php
/*
* ---------------------------------------------------------------------
* VictorThemes Dynamic Style
* ---------------------------------------------------------------------
*/

header("Content-type: text/css;");
$absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
$wp_load = $absolute_path[0] . 'wp-load.php';
require_once($wp_load);

/* Custom Color */
$all_element_color  = cs_get_customize_option( 'all_element_colors' );
$all_element_secondary_colors = cs_get_customize_option('all_element_secondary_colors');

if($all_element_color) { ?>
  .no-class {}
  .subscribe-style-two .subscribe-form button[type="submit"]:hover, .subscribe-style-two .subscribe-form input[type="submit"]:hover, .trail-style-two .fame-blue-btn:hover, .trail-style-two .fame-blue-btn:focus, .subscribe-style-three .subscribe-form button[type="submit"]:hover, .subscribe-style-three .subscribe-form input[type="submit"]:hover, .event-time, .event-widget .widget-title, .fame-process.process-style-two, .tribe-events-back a, .tribe-events-sub-nav li a, #tribe-events .tribe-events-button, .fame-red-btn, .fame-status, .location-tooltip, .fame-testimonial, .fame-get-started {
    background-color: <?php echo esc_attr($all_element_color); ?>;
  }

  .error-subtitle, a:hover, a:focus, .fame-navigation > ul > li:hover > a, .fame-navigation > ul > li.current-menu-ancestor > a, .fame-navigation > ul > li.active > a, .dropdown-nav > li:hover > a, .dropdown-nav > li.active > a, .search-link a:hover, .footer-widget ul li a:hover, .contact-info a:hover, .fame-copyright a, .fame-social a:hover, .process-title a:hover, .portfolio-meta p a:hover, .schedule-info p a:hover, .fame-widget ul li a:hover, .post-title a:hover, .meta-tag a:hover, .fame-comments-area .comments-reply a:hover {
    color: <?php echo esc_attr($all_element_color); ?>;
  }

  .fame-navigation .nav-text .nav-dots, .fame-navigation .nav-text .nav-dots:before, .fame-navigation .nav-text .nav-dots:after { border-color: <?php echo esc_attr($all_element_color); ?>; }

  ::selection {background: <?php echo esc_attr($all_element_color); ?>;}
  ::-webkit-selection {background: <?php echo esc_attr($all_element_color); ?>;}
  ::-moz-selection {background: <?php echo esc_attr($all_element_color); ?>;}
  ::-o-selection {background: <?php echo esc_attr($all_element_color); ?>;}
  ::-ms-selection {background: <?php echo esc_attr($all_element_color); ?>;}

<?php } if($all_element_secondary_colors) { ?>
  .no-class {}
  .nav-tabs a.nav-link:hover, .nav-tabs a.nav-link:focus, .nav-tabs a.nav-link.active, .nav-tabs a.nav-link.active:hover, .nav-tabs a.nav-link.active:focus, .swiper-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active, .masonry-filters ul li a.active, .wp-link-pages a, .wp-pagenavi > span.current, .wp-pagenavi > a:hover, .fame-pagination ul li a:hover, .fame-pagination ul li a.current, .fame-pagination ul li span.current, .fame-btn:hover, .fame-btn:focus, .fame-form input[type="submit"], .fame-form button[type="submit"], .fame-form button[type="submit"], .fame-blue-btn, .fame-social.rounded a:hover, .fame-banner, .plan-item.fame-hover .fame-btn, .fame-trail .fame-video-btn-wrap:hover .fame-video-btn, .subscribe-style-two .subscribe-form button[type="submit"], .subscribe-style-two .subscribe-form input[type="submit"], .feature-item.fame-hover .feature-link, .fame-subscribe.subscribe-style-three, .price-item.fame-hover .fame-btn, .tribe-events-sub-nav li a, #tribe-bar-form .tribe-bar-submit input[type=submit], .tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-], #tribe-events-content .tribe-events-calendar td:hover a, #tribe-events-content .tribe-events-calendar td:hover, .single-tribe_events .tribe-events-schedule .tribe-events-cost, .fame-schedule .accordion-title a, .news-meta h5 a:before, .fame-share-link.fame-hover > a {
    background-color: <?php echo esc_attr($all_element_secondary_colors); ?>;
  }

  .post-widget .nav-tabs a.nav-link:hover, .post-widget .nav-tabs a.nav-link:focus, .post-widget .nav-tabs a.nav-link.active, .post-widget .nav-tabs a.nav-link.active:hover, .post-widget .nav-tabs a.nav-link.active:focus, .post-widget .nav-tabs a.nav-link:hover, .post-widget .nav-tabs a.nav-link.active, .bullets-list li:before, .event-item.fame-hover .fame-link a, .event-meta ul li a:hover, .news-item.fame-hover .fame-link a, .news-meta h5 a:hover, .fame-related-posts .fame-link a, .fame-comments-area .comments-reply a {
    color: <?php echo esc_attr($all_element_secondary_colors); ?>;
  }

  .wp-link-pages a, .post-widget .nav-tabs a.nav-link.active {
    border-color: <?php echo esc_attr($all_element_secondary_colors); ?>;
  }
<?php }

// Menu
$header_link_color  = cs_get_customize_option( 'header_link_color' );
$submenu_bg_color  = cs_get_customize_option( 'submenu_bg_color' );
$submenu_link_color  = cs_get_customize_option( 'submenu_link_color' );
$button_link_color  = cs_get_customize_option( 'button_link_color' );
$button_bg_color  = cs_get_customize_option( 'button_bg_color' );
$button_border_color  = cs_get_customize_option( 'button_border_color' );
$right_link_color  = cs_get_customize_option( 'right_link_color' );

if($header_link_color['color'] || $header_link_color['hover']) { ?>
  .no-class {}
  .fame-navigation ul li a {
    color: <?php echo esc_attr($header_link_color['color']); ?>;
  }
  .fame-navigation ul li a:hover, .fame-navigation ul li a:focus, .fame-navigation > ul > li.current-menu-ancestor > a, .fame-navigation > ul > li.active > a, .fame-navigation > ul > li:hover > a, .dropdown-nav > li:hover > a, .dropdown-nav > li.active > a {
    color: <?php echo esc_attr($header_link_color['hover']); ?>;
  }
  .fame-navigation .nav-text .nav-dots, .fame-navigation .nav-text .nav-dots:before, .fame-navigation .nav-text .nav-dots:after {
    border-color: <?php echo esc_attr($header_link_color['hover']); ?>;
  }
<?php }
if($submenu_bg_color || $submenu_link_color['color'] || $submenu_link_color['hover']) { ?>
  .no-class {}
  .dropdown-nav {
    background-color: <?php echo esc_attr($submenu_bg_color); ?>;
  }
  .fame-navigation ul .dropdown-nav li a {
    color: <?php echo esc_attr($submenu_link_color['color']); ?>;
  }
  .fame-navigation ul .dropdown-nav > li:hover > a, .fame-navigation ul .dropdown-nav > li.active > a {
    color: <?php echo esc_attr($submenu_link_color['hover']); ?>;
  }
  .dropdown-nav:before {
    border-bottom-color: <?php echo esc_attr($submenu_bg_color); ?>;
  }
<?php }
if($button_link_color['color'] || $button_bg_color['color'] || $button_border_color['color'] || $button_link_color['hover'] || $button_bg_color['hover'] || $button_border_color['hover']) { ?>
  .no-class {}
  .header-right-btn .fame-btn {
    color: <?php echo esc_attr($button_link_color['color']); ?>;
    background-color: <?php echo esc_attr($button_bg_color['color']); ?>;
    border-color: <?php echo esc_attr($button_border_color['color']); ?>;
  }
  .header-right-btn .fame-btn:hover, .header-right-btn .fame-btn:focus {
    color: <?php echo esc_attr($button_link_color['hover']); ?>;
    background-color: <?php echo esc_attr($button_bg_color['hover']); ?>;
    border-color: <?php echo esc_attr($button_border_color['hover']); ?>;
  }
<?php }
if($right_link_color['color'] || $right_link_color['hover']) { ?>
  .no-class {}
  .search-link a, .fame-default-link {
    color: <?php echo esc_attr($right_link_color['color']); ?>;
  }
  .search-link a:hover, .fame-default-link:hover, .search-link a:focus, .fame-default-link:focus {
    color: <?php echo esc_attr($right_link_color['hover']); ?>;
  }
<?php }
$titlebar_title_color = cs_get_customize_option('titlebar_title_color');
if($titlebar_title_color) { ?>
  .no-class {}
  .fame-page-title h2 {
    color: <?php echo esc_attr($titlebar_title_color); ?>;
  }
<?php }
// Mobile Menu
$mobile_menu_color  = cs_get_customize_option( 'mobile_menu_color' );
$mobile_menu_link_color  = cs_get_customize_option( 'mobile_menu_link_color' );
$mobile_menu_expand_color  = cs_get_customize_option( 'mobile_menu_expand_color' );
$mobile_menu_expand_bg_color  = cs_get_customize_option( 'mobile_menu_expand_bg_color' );

if($mobile_menu_color['toggle_color'] || $mobile_menu_color['bg_color'] || $mobile_menu_color['border_color']){ ?>
  .no-class {}
  .mean-container a.meanmenu-reveal span,
  .mean-container a.meanmenu-reveal span:before,
  .mean-container a.meanmenu-reveal span:after,
  .mean-container a.meanmenu-reveal.meanclose span:before {
    background: <?php echo esc_attr($mobile_menu_color['toggle_color']); ?>;
  }
  .mean-container a.meanmenu-reveal {border-color: <?php echo esc_attr($mobile_menu_color['toggle_color']); ?>;}
  .mean-container .mean-nav {
    background-color: <?php echo esc_attr($mobile_menu_color['bg_color']); ?>;
  }
  .mean-container .dropdown-nav.normal-style .current-menu-parent > a, .mean-container .mean-nav ul li li a, .mean-nav .dropdown-nav li.active > a, .mean-container .mean-nav ul > li a {
    border-color: <?php echo esc_attr($mobile_menu_color['border_color']); ?>;
  }
<?php }
if($mobile_menu_link_color['color'] || $mobile_menu_link_color['hover']) { ?>
  .no-class {}
  .mean-container .mean-nav ul li a {
    color: <?php echo esc_attr($mobile_menu_link_color['color']); ?>;
  }
  .mean-container .mean-nav > ul > li:hover > a, 
  .mean-container .mean-nav > ul > li.current-menu-ancestor > a, 
  .mean-container .mean-nav > ul > li.active > a, 
  .mean-container .mean-nav .dropdown-nav > li:hover > a, 
  .mean-container .mean-nav .dropdown-nav > li.active > a {
    color: <?php echo esc_attr($mobile_menu_link_color['hover']); ?>;
  }
<?php }
if($mobile_menu_expand_color['color'] || $mobile_menu_expand_color['hover']) { ?>
  .no-class {}
  .mean-container .mean-nav ul li a.mean-expand {
    color: <?php echo esc_attr($mobile_menu_expand_color['color']); ?>;
  }
  .mean-container .mean-nav ul li a.mean-expand:hover,
  .mean-container .mean-nav ul li a.mean-expand:focus,
  .mean-container .mean-nav ul li:hover > a.mean-expand,
  .mean-container .mean-nav ul li:focus > a.mean-expand,
  .fame-header .mean-container .dropdown-nav > li:hover > a.mean-expand,
  .fame-header .mean-container .dropdown-nav > li:focus > a.mean-expand {
    color: <?php echo esc_attr($mobile_menu_expand_color['hover']); ?>;
  }
<?php }
if($mobile_menu_expand_bg_color['color'] || $mobile_menu_expand_bg_color['hover']) { ?>
  .no-class {}
  .mean-container .mean-nav ul li a.mean-expand {
    background-color: <?php echo esc_attr($mobile_menu_expand_bg_color['color']); ?>;
  }
  .mean-container .mean-nav ul li a.mean-expand:hover,
  .mean-container .mean-nav ul li a.mean-expand:focus,
  .mean-container .mean-nav ul li:hover > a.mean-expand,
  .mean-container .mean-nav ul li:focus > a.mean-expand,
  .fame-header .mean-container .dropdown-nav > li:hover > a.mean-expand,
  .fame-header .mean-container .dropdown-nav > li:focus > a.mean-expand {
    background-color: <?php echo esc_attr($mobile_menu_expand_bg_color['hover']); ?>;
  }
<?php }

// Body
$body_color = cs_get_customize_option('body_color');
$body_links_color = cs_get_customize_option('body_links_color');
$sidebar_content_color = cs_get_customize_option('sidebar_content_color');
$sidebar_links_color = cs_get_customize_option('sidebar_links_color');
if($body_color) { ?>
  .no-class {}
  .fame-mid-wrap.full-width p, .fame-mid-wrap.full-width span, .fame-mid-wrap.full-width ul li, .news-info p, .news-detail-wrap p, .fame-post-single p, .fame-portfolio-info p, .tribe-events-content p, .bullets-list li, .speaker-info p, .tribe-events-single-section span, .tribe-events-single-section dd, .tribe-events-single-section dt {
    color: <?php echo esc_attr($body_color); ?>;
  }
<?php }
if($body_links_color['color'] || $body_links_color['hover']) { ?>
  .no-class {}
  .fame-mid-wrap.full-width a, .fame-mid-wrap.full-width ul li a, .fame-post-single a, .fame-portfolio-info a, .portfolio-meta p a, .tribe-events-content a, .bullets-list li a, .speaker-info a, .tribe-events-single-section a, .fame-mid-wrap .fame-social a {
    color: <?php echo esc_attr($body_links_color['color']); ?>;
  }
  .fame-mid-wrap.full-width a:hover, .fame-mid-wrap.full-width ul li a:hover, .fame-post-single a:hover, .fame-portfolio-info a:hover, .portfolio-meta p a:hover, .tribe-events-content a:hover, .bullets-list li a:hover, .speaker-info a:hover, .tribe-events-single-section a:hover, .fame-mid-wrap .fame-social a:hover {
    color: <?php echo esc_attr($body_links_color['hover']); ?>;
  }
<?php }
if ($sidebar_content_color) { ?>
  .no-class {}
  .fame-secondary p, .fame-secondary .fame-widget,
  .fame-secondary .widget_rss .rssSummary,
  .fame-secondary .news-time, .fame-secondary .recentcomments,
  .fame-secondary input[type="text"], .fame-secondary .nice-select, .fame-secondary caption,
  .fame-secondary table td, .fame-secondary .fame-widget input[type="search"], .fame-widget ul li {
    color: <?php echo esc_attr($sidebar_content_color); ?>;
  }
  <?php }
  if ($sidebar_links_color['color'] || $sidebar_links_color['hover']) { ?>
  .no-class {}
  .fame-secondary a,
  .fame-mid-wrap .fame-secondary a,
  .fame-secondary .fame-widget ul li a,
  .fame-widget ul li a,
  .widget_list_style ul a,
  .widget_categories ul a,
  .widget_archive ul a,
  .widget_recent_comments ul a,
  .widget_recent_entries ul a,
  .widget_meta ul a,
  .widget_pages ul a,
  .widget_rss ul a,
  .widget_nav_menu ul a,
  .widget_layered_nav ul a,
  .post-widget .nav-tabs a.nav-link,
  .widget_product_categories ul a {
    color: <?php echo esc_attr($sidebar_links_color['color']); ?>;
  }
  .fame-secondary a:hover,
  .fame-widget ul li a:hover,
  .fame-widget ul li a:focus,
  .fame-mid-wrap .fame-secondary a:hover,
  .fame-mid-wrap .fame-secondary a:focus,
  .fame-secondary .fame-widget ul li a:hover,
  .widget_list_style ul a:hover,
  .widget_list_style ul a:focus,
  .widget_categories ul a:hover,
  .widget_categories ul a:focus,
  .widget_archive ul a:hover,
  .widget_archive ul a:focus,
  .widget_recent_comments ul a:hover,
  .widget_recent_comments ul a:focus,
  .widget_recent_entries ul a:hover,
  .widget_recent_entries ul a:focus,
  .widget_meta ul a:hover,
  .widget_meta ul a:focus,
  .widget_pages ul a:hover,
  .widget_pages ul a:focus,
  .post-widget .nav-tabs a.nav-link:hover,
  .post-widget .nav-tabs a.nav-link:focus,
  .post-widget .nav-tabs a.nav-link.active,
  .post-widget .nav-tabs a.nav-link.active:hover,
  .post-widget .nav-tabs a.nav-link.active:focus,
  .widget_rss ul a:hover,
  .widget_rss ul a:focus,
  .widget_nav_menu ul a:hover,
  .widget_nav_menu ul a:focus,
  .widget_layered_nav ul a:hover,
  .widget_layered_nav ul a:focus,
  .widget_product_categories ul a:hover, .widget_product_categories ul a:focus {
    color: <?php echo esc_attr($sidebar_links_color['hover']); ?>;
  }
  .post-widget .nav-tabs a.nav-link.active {
    border-color: <?php echo esc_attr($sidebar_links_color['hover']); ?>;
  }
<?php }
$content_heading_color = cs_get_customize_option('content_heading_color');
if ($content_heading_color['content_heading_color'] || $content_heading_color['sidebar_heading_color']) { ?>
  .no-class {}
  .fame-mid-wrap.full-width h1, .fame-mid-wrap.full-width h2, .fame-mid-wrap.full-width h3, .fame-mid-wrap.full-width h4, .fame-mid-wrap.full-width h5, .fame-mid-wrap.full-width h6, .fame-primary h1, .fame-primary h2, .fame-primary h3, .fame-primary h4, .fame-primary h5, .fame-primary h6, .tribe-events-content, .meta-label, .fame-mid-wrap.full-width h2 span {
    color: <?php echo esc_attr($content_heading_color['content_heading_color']); ?>;
  }
  .fame-secondary h1, .fame-secondary h2, .fame-secondary h3, .fame-secondary h4, .fame-secondary h5, .fame-secondary h6,
  .fame-widget .widget-title {
    color: <?php echo esc_attr($content_heading_color['sidebar_heading_color']); ?>;
  }
<?php }
$footer_colors = cs_get_customize_option('footer_colors');
$footer_link_color = cs_get_customize_option('footer_link_color');
if ($footer_colors['footer_bg_color'] || $footer_colors['footer_heading_color'] || $footer_colors['footer_text_color']) { ?>
  .no-class {}
  .fame-footer {
    background: <?php echo esc_attr($footer_colors['footer_bg_color']); ?>;
  }
  .footer-widget h4, .fame-footer h1, .fame-footer h2, .fame-footer h3, .fame-footer h4, .footer-widget-title, .footer-widget .widget-title {
    color: <?php echo esc_attr($footer_colors['footer_heading_color']); ?>;
  }
  footer.fame-footer .footer-widget-area,
  footer.fame-footer .footer-widget,
  footer.fame-footer .fame-widget p,
  footer.fame-footer .fame-widget p span,
  footer.fame-footer .fame-widget span,
  footer.fame-footer .fame-widget ul li,
  footer.fame-footer .footer-widget-area,
  footer.fame-footer .fame-widget p,
  footer.fame-footer .fame-recent-blog .widget-bdate,
  .fame-footer-wrap,
  footer.fame-footer table td,
  footer.fame-footer caption, .fame-footer .footer-item p,
  footer.fame-footer .fame-widget input[type="email"],
  .footer-widget .tp_recent_tweets ul li,
  footer.fame-footer .widget_archive ul li, .footer-widget.fame-item.widget_calendar caption,
  .footer-widget .nice-select .current, .footer-widget .nice-select ul li,
  .footer-widget ul li,
  footer.fame-footer .widget_search form input[type="text"], .footer-widget p {
    color: <?php echo esc_attr($footer_colors['footer_text_color']); ?>;
  }
<?php }
if ($footer_link_color['color'] || $footer_link_color['hover']) { ?>
  .no-class {}
  footer.fame-footer a,
  footer.fame-footer .footer-widget .fame-widget ul li a,
  footer.fame-footer .fame-widget a span,
  footer.fame-footer .widget_list_style ul a,
  footer.fame-footer .widget_categories ul a,
  footer.fame-footer .widget_archive ul a,
  footer.fame-footer .widget_recent_comments ul a,
  footer.fame-footer .widget_recent_entries ul a,
  footer.fame-footer .widget_meta ul a,
  footer.fame-footer .widget_pages ul a,
  footer.fame-footer .widget_rss ul a,
  footer.fame-footer .widget_nav_menu ul a,
  footer.fame-footer table td a,
  .fame-footer ul li a, .fame-footer .footer-item a,
  footer.fame-footer .footer-widget .fame-widget ul li a,
  .footer-widget .tp_recent_tweets ul li a,
  .footer-widget.fame-item.widget_calendar a {
    color: <?php echo esc_attr($footer_link_color['color']); ?>;
  }
  footer.fame-footer a:hover,
  footer.fame-footer .footer-widget .fame-widget ul li a:hover,
  footer.fame-footer .fame-widget a:hover span,
  footer.fame-footer .widget_list_style ul a:hover,
  footer.fame-footer .widget_categories ul a:hover,
  footer.fame-footer .widget_archive ul a:hover,
  footer.fame-footer .widget_recent_comments ul a:hover,
  footer.fame-footer .widget_recent_entries ul a:hover,
  footer.fame-footer .widget_meta ul a:hover,
  footer.fame-footer .widget_pages ul a:hover,
  footer.fame-footer .widget_rss ul a:hover,
  footer.fame-footer .widget_nav_menu ul a:hover,
  footer.fame-footer table td a:hover,
  .fame-footer ul li a:hover,
  .fame-footer .footer-item a:hover,
  footer.fame-footer .footer-widget .fame-widget ul li a:hover,
  .footer-widget .tp_recent_tweets ul li a:hover,
  .footer-widget .tp_recent_tweets ul li a:focus,
  .footer-widget.fame-item.widget_calendar a:hover,
  .footer-widget.fame-item.widget_calendar a:focus {
    color: <?php echo esc_attr($footer_link_color['hover']); ?>;
  }
<?php }
$copyright_colors = cs_get_customize_option('copyright_colors');
$copyright_link_color = cs_get_customize_option('copyright_link_color');
if ($copyright_colors['copyright_border_color'] || $copyright_colors['copyright_text_color']) { ?>
  .no-class {}
  .fame-copyright {
    border-color: <?php echo esc_attr($copyright_colors['copyright_border_color']); ?>;
  }
  .fame-copyright,
  .fame-footer .fame-copyright .copyright-wrap p,
  .fame-footer .fame-copyright .copyright-links li {
    color: <?php echo esc_attr($copyright_colors['copyright_text_color']); ?>;
  }
<?php }
if ($copyright_link_color['color'] || $copyright_link_color['hover']) { ?>
  .no-class {}
  .fame-copyright a {
    color: <?php echo esc_attr($copyright_link_color['color']); ?>;
  }
  .fame-copyright a:hover {
    color: <?php echo esc_attr($copyright_link_color['hover']); ?>;
  }
<?php }

// Mobile Menu Breakpoint
$mobile_breakpoint = cs_get_option('mobile_breakpoint');
$breakpoint = $mobile_breakpoint ? $mobile_breakpoint : '1199'; ?>
@media (max-width: <?php echo esc_attr($breakpoint); ?>px) {
  .no-class {}
  .fame-header .fame-navigation {
    display: none !important;
  }
  .sticky-wrapper {
    min-height: 83px;
  }
  .fame-header {
    padding: 20px 50px;
    position: relative;
  }
  .fame-brand {
    padding: 0;
  }
  .fame-header-right {
    margin-top: 10px;
    position: static;
  }
  .header-links-wrap {
    margin: 0px 30px 0 0;
  }
  .search-link {
    padding: 0 15px 0 0;
  }
  .fame-search {
    padding: 0 50px;
  }
  .fame-navigation {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    width: 100%;
    height: 250px;
    padding: 0 50px 25px;
    margin: 0 auto;
    background: #f2f2f2;
    overflow: auto;
    -webkit-box-shadow: 0 3px 4px rgba(0, 0, 0, 0.2);
    -ms-box-shadow: 0 3px 4px rgba(0, 0, 0, 0.2);
    box-shadow: 0 3px 4px rgba(0, 0, 0, 0.2);
    z-index: 2;
  }
  .fame-navigation > ul {
    display: block;
  }
  .fame-navigation > ul > li {
    float: none;
  }
  .fame-navigation > ul > li > a {
    display: block;
    padding: 12px 0;
    border-bottom: 1px solid #dddddd;
  }
  .fame-navigation > ul > li.has-dropdown > a:after, 
  .fame-navigation > ul > li.active .nav-dots, 
  .dropdown-nav:before {
    display: none;
  }
  .fame-navigation .dropdown-nav {
    display: none;
    position: static;
    min-width: 100%;
    padding: 0 0 0 20px;
    background: transparent;
    opacity: 1;
    visibility: visible;
    -webkit-box-shadow: none;
    -ms-box-shadow: none;
    box-shadow: none;
  }
  .fame-navigation .dropdown-nav li a {
    padding: 12px 0;
    border-bottom: 1px solid #dddddd;
  }
}

.fame-blue-btn:hover, 
.fame-blue-btn:focus {
  background: #ffbb00;
  color: #ffffff;
}
.fame-red-btn {
  background: #f63e42;
}
.fame-red-btn:hover, 
.fame-red-btn:focus {
  background: #ffbb00;
  -webkit-box-shadow: 0 10px 30px rgba(255, 187, 0, 0.3);
  -ms-box-shadow: 0 10px 30px rgba(255, 187, 0, 0.3);
  box-shadow: 0 10px 30px rgba(255, 187, 0, 0.3);
}
.fame-dark-blue-btn {
  background: #292e4b;
  -webkit-box-shadow: 0 10px 30px rgba(41, 46, 75, 0.3);
  -ms-box-shadow: 0 10px 30px rgba(41, 46, 75, 0.3);
  box-shadow: 0 10px 30px rgba(41, 46, 75, 0.3);
}
.plan-item .fame-btn:hover, .plan-item .fame-btn:focus {
  background: #ffbb00;
  -webkit-box-shadow: 0 10px 30px rgba(255, 187, 0, 0.3);
  -ms-box-shadow: 0 10px 30px rgba(255, 187, 0, 0.3);
  box-shadow: 0 10px 30px rgba(255, 187, 0, 0.3);
}
.fame-social a {
  color: #777777;
}

<?php
$body_font_family       = cs_get_option('theme_typo')['body_font']['font-family'];
$body_font_bkp_family   = cs_get_option('theme_typo')['body_font']['backup-font-family'];
$body_font_weight       = cs_get_option('theme_typo')['body_font']['font-weight'];
$body_font_style        = cs_get_option('theme_typo')['body_font']['font-style'];
$body_font_align        = cs_get_option('theme_typo')['body_font']['text-align'];
$body_font_variant      = cs_get_option('theme_typo')['body_font']['font-variant'];
$body_font_transform    = cs_get_option('theme_typo')['body_font']['text-transform'];
$body_font_decoration   = cs_get_option('theme_typo')['body_font']['text-decoration'];
$body_font_size         = cs_get_option('theme_typo')['body_font']['font-size'];
$body_font_height       = cs_get_option('theme_typo')['body_font']['line-height'];
$body_font_ltr_spacing  = cs_get_option('theme_typo')['body_font']['letter-spacing'];
$body_font_word_spacing = cs_get_option('theme_typo')['body_font']['word-spacing'];
$body_font_color        = cs_get_option('theme_typo')['body_font']['color'];
$body_css               = cs_get_option('theme_typo')['body_css'];
$body_css = $body_css ? ', '.$body_css : '';
// FameWP htmlspecialchars
?>
body<?php echo esc_attr($body_css); ?> {
  <?php 
  $body_font_bkp_family        = $body_font_bkp_family   ? ', '.$body_font_bkp_family : '';
  if ($body_font_family)             { ?> font-family: "<?php echo esc_attr($body_font_family);?>"<?php echo htmlspecialchars($body_font_bkp_family);?>;<?php }
  if ($body_font_weight)       { ?> font-weight:     <?php echo esc_attr($body_font_weight);?>;<?php }
  if ($body_font_style)        { ?> font-style:      <?php echo esc_attr($body_font_style);?>;<?php }
  if ($body_font_align)        { ?> text-align:      <?php echo esc_attr($body_font_align);?>;<?php }
  if ($body_font_variant)      { ?> font-variant:    <?php echo esc_attr($body_font_variant);?>;<?php }
  if ($body_font_transform)    { ?> text-transform:  <?php echo esc_attr($body_font_transform);?>;<?php }
  if ($body_font_decoration)   { ?> text-decoration: <?php echo esc_attr($body_font_decoration);?>;<?php }
  if ($body_font_size)         { ?> font-size:       <?php echo esc_attr($body_font_size);?>px;<?php }
  if ($body_font_height)       { ?> line-height:     <?php echo esc_attr($body_font_height);?>px;<?php }
  if ($body_font_ltr_spacing)  { ?> letter-spacing:  <?php echo esc_attr($body_font_ltr_spacing);?>px;<?php }
  if ($body_font_word_spacing) { ?> word-spacing:    <?php echo esc_attr($body_font_word_spacing);?>px;<?php }
  if ($body_font_color)        { ?> color:           <?php echo esc_attr($body_font_color);?>;<?php } ?>
}
<?php
$menu_font_family       = cs_get_option('theme_typo')['menu_font']['font-family'];
$menu_font_bkp_family   = cs_get_option('theme_typo')['menu_font']['backup-font-family'];
$menu_font_weight       = cs_get_option('theme_typo')['menu_font']['font-weight'];
$menu_font_style        = cs_get_option('theme_typo')['menu_font']['font-style'];
$menu_font_align        = cs_get_option('theme_typo')['menu_font']['text-align'];
$menu_font_variant      = cs_get_option('theme_typo')['menu_font']['font-variant'];
$menu_font_transform    = cs_get_option('theme_typo')['menu_font']['text-transform'];
$menu_font_decoration   = cs_get_option('theme_typo')['menu_font']['text-decoration'];
$menu_font_size         = cs_get_option('theme_typo')['menu_font']['font-size'];
$menu_font_height       = cs_get_option('theme_typo')['menu_font']['line-height'];
$menu_font_ltr_spacing  = cs_get_option('theme_typo')['menu_font']['letter-spacing'];
$menu_font_word_spacing = cs_get_option('theme_typo')['menu_font']['word-spacing'];
$menu_font_color        = cs_get_option('theme_typo')['menu_font']['color'];
$menu_css               = cs_get_option('theme_typo')['menu_css'];
$menu_css = $menu_css ? ', '.$menu_css : '';

?>
.fame-navigation, .fame-navigation > ul > li, .mean-container .mean-nav ul li a<?php echo esc_attr($menu_css); ?> {
  <?php 
  $menu_font_bkp_family        = $menu_font_bkp_family   ? ', '.$menu_font_bkp_family : '';
  if ($menu_font_family)             { ?> font-family: "<?php echo esc_attr($menu_font_family);?>"<?php echo htmlspecialchars($menu_font_bkp_family);?>;<?php }
  if ($menu_font_weight)       { ?> font-weight:     <?php echo esc_attr($menu_font_weight);?>;<?php }
  if ($menu_font_style)        { ?> font-style:      <?php echo esc_attr($menu_font_style);?>;<?php }
  if ($menu_font_align)        { ?> text-align:      <?php echo esc_attr($menu_font_align);?>;<?php }
  if ($menu_font_variant)      { ?> font-variant:    <?php echo esc_attr($menu_font_variant);?>;<?php }
  if ($menu_font_transform)    { ?> text-transform:  <?php echo esc_attr($menu_font_transform);?>;<?php }
  if ($menu_font_decoration)   { ?> text-decoration: <?php echo esc_attr($menu_font_decoration);?>;<?php }
  if ($menu_font_size)         { ?> font-size:       <?php echo esc_attr($menu_font_size);?>px;<?php }
  if ($menu_font_height)       { ?> line-height:     <?php echo esc_attr($menu_font_height);?>px;<?php }
  if ($menu_font_ltr_spacing)  { ?> letter-spacing:  <?php echo esc_attr($menu_font_ltr_spacing);?>px;<?php }
  if ($menu_font_word_spacing) { ?> word-spacing:    <?php echo esc_attr($menu_font_word_spacing);?>px;<?php }
  if ($menu_font_color)        { ?> color:           <?php echo esc_attr($menu_font_color);?>;<?php } ?>
}
<?php
$sub_menu_font_family       = cs_get_option('theme_typo')['sub_menu_font']['font-family'];
$sub_menu_font_bkp_family   = cs_get_option('theme_typo')['sub_menu_font']['backup-font-family'];
$sub_menu_font_weight       = cs_get_option('theme_typo')['sub_menu_font']['font-weight'];
$sub_menu_font_style        = cs_get_option('theme_typo')['sub_menu_font']['font-style'];
$sub_menu_font_align        = cs_get_option('theme_typo')['sub_menu_font']['text-align'];
$sub_menu_font_variant      = cs_get_option('theme_typo')['sub_menu_font']['font-variant'];
$sub_menu_font_transform    = cs_get_option('theme_typo')['sub_menu_font']['text-transform'];
$sub_menu_font_decoration   = cs_get_option('theme_typo')['sub_menu_font']['text-decoration'];
$sub_menu_font_size         = cs_get_option('theme_typo')['sub_menu_font']['font-size'];
$sub_menu_font_height       = cs_get_option('theme_typo')['sub_menu_font']['line-height'];
$sub_menu_font_ltr_spacing  = cs_get_option('theme_typo')['sub_menu_font']['letter-spacing'];
$sub_menu_font_word_spacing = cs_get_option('theme_typo')['sub_menu_font']['word-spacing'];
$sub_menu_font_color        = cs_get_option('theme_typo')['sub_menu_font']['color'];
$sub_menu_css               = cs_get_option('theme_typo')['sub_menu_css'];
$sub_menu_css = $sub_menu_css ? ', '.$sub_menu_css : '';

?>
.dropdown-nav > li, .dropdown-nav, .mean-container .mean-nav ul.sub-menu li a<?php echo esc_attr($sub_menu_css); ?> {
  <?php 
  $sub_menu_font_bkp_family        = $sub_menu_font_bkp_family   ? ', '.$sub_menu_font_bkp_family : '';
  if ($sub_menu_font_family)             { ?> font-family: "<?php echo esc_attr($sub_menu_font_family);?>"<?php echo htmlspecialchars($sub_menu_font_bkp_family);?>;<?php }
  if ($sub_menu_font_weight)       { ?> font-weight:     <?php echo esc_attr($sub_menu_font_weight);?>;<?php }
  if ($sub_menu_font_style)        { ?> font-style:      <?php echo esc_attr($sub_menu_font_style);?>;<?php }
  if ($sub_menu_font_align)        { ?> text-align:      <?php echo esc_attr($sub_menu_font_align);?>;<?php }
  if ($sub_menu_font_variant)      { ?> font-variant:    <?php echo esc_attr($sub_menu_font_variant);?>;<?php }
  if ($sub_menu_font_transform)    { ?> text-transform:  <?php echo esc_attr($sub_menu_font_transform);?>;<?php }
  if ($sub_menu_font_decoration)   { ?> text-decoration: <?php echo esc_attr($sub_menu_font_decoration);?>;<?php }
  if ($sub_menu_font_size)         { ?> font-size:       <?php echo esc_attr($sub_menu_font_size);?>px;<?php }
  if ($sub_menu_font_height)       { ?> line-height:     <?php echo esc_attr($sub_menu_font_height);?>px;<?php }
  if ($sub_menu_font_ltr_spacing)  { ?> letter-spacing:  <?php echo esc_attr($sub_menu_font_ltr_spacing);?>px;<?php }
  if ($sub_menu_font_word_spacing) { ?> word-spacing:    <?php echo esc_attr($sub_menu_font_word_spacing);?>px;<?php }
  if ($sub_menu_font_color)        { ?> color:           <?php echo esc_attr($sub_menu_font_color);?>;<?php } ?>
}
<?php
$headings_font_family       = cs_get_option('theme_typo')['headings_font']['font-family'];
$headings_font_bkp_family   = cs_get_option('theme_typo')['headings_font']['backup-font-family'];
$headings_font_weight       = cs_get_option('theme_typo')['headings_font']['font-weight'];
$headings_font_style        = cs_get_option('theme_typo')['headings_font']['font-style'];
$headings_font_align        = cs_get_option('theme_typo')['headings_font']['text-align'];
$headings_font_variant      = cs_get_option('theme_typo')['headings_font']['font-variant'];
$headings_font_transform    = cs_get_option('theme_typo')['headings_font']['text-transform'];
$headings_font_decoration   = cs_get_option('theme_typo')['headings_font']['text-decoration'];
$headings_font_size         = cs_get_option('theme_typo')['headings_font']['font-size'];
$headings_font_height       = cs_get_option('theme_typo')['headings_font']['line-height'];
$headings_font_ltr_spacing  = cs_get_option('theme_typo')['headings_font']['letter-spacing'];
$headings_font_word_spacing = cs_get_option('theme_typo')['headings_font']['word-spacing'];
$headings_font_color        = cs_get_option('theme_typo')['headings_font']['color'];
$headings_css               = cs_get_option('theme_typo')['headings_css'];
$headings_css = $headings_css ? ', '.$headings_css : '';

?>
h1, h2, h3, h4, h5, h6, .fame-location-name, .text-logo, .fame-file-selector .fame-icon<?php echo esc_attr($headings_css); ?> {
  <?php
  $headings_font_bkp_family        = $headings_font_bkp_family   ? ', '.$headings_font_bkp_family : '';
  if ($headings_font_family)             { ?> font-family: "<?php echo esc_attr($headings_font_family);?>"<?php echo htmlspecialchars($headings_font_bkp_family);?>;<?php }
  if ($headings_font_weight)       { ?> font-weight:     <?php echo esc_attr($headings_font_weight);?>;<?php }
  if ($headings_font_style)        { ?> font-style:      <?php echo esc_attr($headings_font_style);?>;<?php }
  if ($headings_font_align)        { ?> text-align:      <?php echo esc_attr($headings_font_align);?>;<?php }
  if ($headings_font_variant)      { ?> font-variant:    <?php echo esc_attr($headings_font_variant);?>;<?php }
  if ($headings_font_transform)    { ?> text-transform:  <?php echo esc_attr($headings_font_transform);?>;<?php }
  if ($headings_font_decoration)   { ?> text-decoration: <?php echo esc_attr($headings_font_decoration);?>;<?php }
  if ($headings_font_size)         { ?> font-size:       <?php echo esc_attr($headings_font_size);?>px;<?php }
  if ($headings_font_height)       { ?> line-height:     <?php echo esc_attr($headings_font_height);?>px;<?php }
  if ($headings_font_ltr_spacing)  { ?> letter-spacing:  <?php echo esc_attr($headings_font_ltr_spacing);?>px;<?php }
  if ($headings_font_word_spacing) { ?> word-spacing:    <?php echo esc_attr($headings_font_word_spacing);?>px;<?php }
  if ($headings_font_color)        { ?> color:           <?php echo esc_attr($headings_font_color);?>;<?php } ?>
}
<?php
$shortcode_prime_font_family       = cs_get_option('theme_typo')['shortcode_prime_font']['font-family'];
$shortcode_prime_font_bkp_family   = cs_get_option('theme_typo')['shortcode_prime_font']['backup-font-family'];
$shortcode_prime_font_weight       = cs_get_option('theme_typo')['shortcode_prime_font']['font-weight'];
$shortcode_prime_font_style        = cs_get_option('theme_typo')['shortcode_prime_font']['font-style'];
$shortcode_prime_font_align        = cs_get_option('theme_typo')['shortcode_prime_font']['text-align'];
$shortcode_prime_font_variant      = cs_get_option('theme_typo')['shortcode_prime_font']['font-variant'];
$shortcode_prime_font_transform    = cs_get_option('theme_typo')['shortcode_prime_font']['text-transform'];
$shortcode_prime_font_decoration   = cs_get_option('theme_typo')['shortcode_prime_font']['text-decoration'];
$shortcode_prime_font_size         = cs_get_option('theme_typo')['shortcode_prime_font']['font-size'];
$shortcode_prime_font_height       = cs_get_option('theme_typo')['shortcode_prime_font']['line-height'];
$shortcode_prime_font_ltr_spacing  = cs_get_option('theme_typo')['shortcode_prime_font']['letter-spacing'];
$shortcode_prime_font_word_spacing = cs_get_option('theme_typo')['shortcode_prime_font']['word-spacing'];
$shortcode_prime_font_color        = cs_get_option('theme_typo')['shortcode_prime_font']['color'];
$shortcode_prime_css               = cs_get_option('theme_typo')['shortcode_prime_css'];
$shortcode_prime_css = $shortcode_prime_css ? ', '.$shortcode_prime_css : '';

?>
input[type="submit"], button[type="submit"], .fame-btn, .tooltip, .meta-label<?php echo esc_attr($shortcode_prime_css); ?> {
  <?php
  $shortcode_prime_font_bkp_family        = $shortcode_prime_font_bkp_family   ? ', '.$shortcode_prime_font_bkp_family : '';
  if ($shortcode_prime_font_family)             { ?> font-family: "<?php echo esc_attr($shortcode_prime_font_family);?>"<?php echo htmlspecialchars($shortcode_prime_font_bkp_family);?>;<?php }
  if ($shortcode_prime_font_weight)       { ?> font-weight:     <?php echo esc_attr($shortcode_prime_font_weight);?>;<?php }
  if ($shortcode_prime_font_style)        { ?> font-style:      <?php echo esc_attr($shortcode_prime_font_style);?>;<?php }
  if ($shortcode_prime_font_align)        { ?> text-align:      <?php echo esc_attr($shortcode_prime_font_align);?>;<?php }
  if ($shortcode_prime_font_variant)      { ?> font-variant:    <?php echo esc_attr($shortcode_prime_font_variant);?>;<?php }
  if ($shortcode_prime_font_transform)    { ?> text-transform:  <?php echo esc_attr($shortcode_prime_font_transform);?>;<?php }
  if ($shortcode_prime_font_decoration)   { ?> text-decoration: <?php echo esc_attr($shortcode_prime_font_decoration);?>;<?php }
  if ($shortcode_prime_font_size)         { ?> font-size:       <?php echo esc_attr($shortcode_prime_font_size);?>px;<?php }
  if ($shortcode_prime_font_height)       { ?> line-height:     <?php echo esc_attr($shortcode_prime_font_height);?>px;<?php }
  if ($shortcode_prime_font_ltr_spacing)  { ?> letter-spacing:  <?php echo esc_attr($shortcode_prime_font_ltr_spacing);?>px;<?php }
  if ($shortcode_prime_font_word_spacing) { ?> word-spacing:    <?php echo esc_attr($shortcode_prime_font_word_spacing);?>px;<?php } ?>
  <?php if ($shortcode_prime_font_color)        { ?> color:           <?php echo esc_attr($shortcode_prime_font_color);?>;<?php } ?>
}
<?php
$shortcode_secon_font_family       = cs_get_option('theme_typo')['shortcode_secon_font']['font-family'];
$shortcode_secon_font_bkp_family   = cs_get_option('theme_typo')['shortcode_secon_font']['backup-font-family'];
$shortcode_secon_font_weight       = cs_get_option('theme_typo')['shortcode_secon_font']['font-weight'];
$shortcode_secon_font_style        = cs_get_option('theme_typo')['shortcode_secon_font']['font-style'];
$shortcode_secon_font_align        = cs_get_option('theme_typo')['shortcode_secon_font']['text-align'];
$shortcode_secon_font_variant      = cs_get_option('theme_typo')['shortcode_secon_font']['font-variant'];
$shortcode_secon_font_transform    = cs_get_option('theme_typo')['shortcode_secon_font']['text-transform'];
$shortcode_secon_font_decoration   = cs_get_option('theme_typo')['shortcode_secon_font']['text-decoration'];
$shortcode_secon_font_size         = cs_get_option('theme_typo')['shortcode_secon_font']['font-size'];
$shortcode_secon_font_height       = cs_get_option('theme_typo')['shortcode_secon_font']['line-height'];
$shortcode_secon_font_ltr_spacing  = cs_get_option('theme_typo')['shortcode_secon_font']['letter-spacing'];
$shortcode_secon_font_word_spacing = cs_get_option('theme_typo')['shortcode_secon_font']['word-spacing'];
$shortcode_secon_font_color        = cs_get_option('theme_typo')['shortcode_secon_font']['color'];
$shortcode_secon_css               = cs_get_option('theme_typo')['shortcode_secon_css'];
$shortcode_secon_css = $shortcode_secon_css ? ', '.$shortcode_secon_css : '';

?>
input[type="text"], input[type="email"], input[type="password"], input[type="tel"], input[type="search"], input[type="date"], input[type="time"], input[type="datetime-local"], input[type="event-month"], input[type="url"], input[type="number"], textarea, select, .service-item p, .work-process-info p, .card-body p, .choose-item p, .process-item p, .screen-info p, .testimonial-item p, .testimonial-info p, .feature-item p, .screen-info-item p, .section-title-wrap p, .news-item p, .mate-info p, form p, .footer-wrap p, .fame-post-single p, .event-wrap p, .speaker-info p, .tribe-events-content p, .fame-portfolio-info p, .caption-subtitle, .video-btn-title, .plan-item ul, .status-title, .footer-widget ul, .fame-copyright, .mate-designation, .price-item ul, .event-time .event-month, .speaker-designation, .countdown-title, blockquote:before, .fame-news-meta a<?php echo esc_attr($shortcode_secon_css); ?> {
  <?php
  $shortcode_secon_font_bkp_family        = $shortcode_secon_font_bkp_family   ? ', '.$shortcode_secon_font_bkp_family : '';
  if ($shortcode_secon_font_family)             { ?> font-family: "<?php echo esc_attr($shortcode_secon_font_family);?>"<?php echo htmlspecialchars($shortcode_secon_font_bkp_family);?>;<?php }
  if ($shortcode_secon_font_weight)       { ?> font-weight:     <?php echo esc_attr($shortcode_secon_font_weight);?>;<?php }
  if ($shortcode_secon_font_style)        { ?> font-style:      <?php echo esc_attr($shortcode_secon_font_style);?>;<?php }
  if ($shortcode_secon_font_align)        { ?> text-align:      <?php echo esc_attr($shortcode_secon_font_align);?>;<?php }
  if ($shortcode_secon_font_variant)      { ?> font-variant:    <?php echo esc_attr($shortcode_secon_font_variant);?>;<?php }
  if ($shortcode_secon_font_transform)    { ?> text-transform:  <?php echo esc_attr($shortcode_secon_font_transform);?>;<?php }
  if ($shortcode_secon_font_decoration)   { ?> text-decoration: <?php echo esc_attr($shortcode_secon_font_decoration);?>;<?php }
  if ($shortcode_secon_font_size)         { ?> font-size:       <?php echo esc_attr($shortcode_secon_font_size);?>px;<?php }
  if ($shortcode_secon_font_height)       { ?> line-height:     <?php echo esc_attr($shortcode_secon_font_height);?>px;<?php }
  if ($shortcode_secon_font_ltr_spacing)  { ?> letter-spacing:  <?php echo esc_attr($shortcode_secon_font_ltr_spacing);?>px;<?php }
  if ($shortcode_secon_font_word_spacing) { ?> word-spacing:    <?php echo esc_attr($shortcode_secon_font_word_spacing);?>px;<?php } ?>
  <?php if ($shortcode_secon_font_color)        { ?> color:           <?php echo esc_attr($shortcode_secon_font_color);?>;<?php } ?>
}
<?php
$custom_typography = cs_get_option('custom_typography');
if( ! empty( $custom_typography ) ) {
  foreach ( $custom_typography as $custom_style ) {
    $custom_css = $custom_style['custom_css'];
    $custom_typo = $custom_style['custom_typo'];

    $font_family       = $custom_typo['font-family'];
    $font_bkp_family   = $custom_typo['backup-font-family'];
    $font_weight       = $custom_typo['font-weight'];
    $font_style        = $custom_typo['font-style'];
    $font_align        = $custom_typo['text-align'];
    $font_variant      = $custom_typo['font-variant'];
    $font_transform    = $custom_typo['text-transform'];
    $font_decoration   = $custom_typo['text-decoration'];
    $font_size         = $custom_typo['font-size'];
    $font_height       = $custom_typo['line-height'];
    $font_ltr_spacing  = $custom_typo['letter-spacing'];
    $font_word_spacing = $custom_typo['word-spacing'];
    $font_color        = $custom_typo['color'];
    $font_bkp_family   = $font_bkp_family   ? ', '.$font_bkp_family : '';

    if( ! empty( $custom_css ) ) {

      echo esc_attr($custom_css) ?> { <?php
        if ($font_family)             { ?> font-family: "<?php echo esc_attr($font_family);?>"<?php echo htmlspecialchars($font_bkp_family);?>;<?php }
        if ($font_weight)       { ?> font-weight:     <?php echo esc_attr($font_weight);?>;<?php }
        if ($font_style)        { ?> font-style:      <?php echo esc_attr($font_style);?>;<?php }
        if ($font_align)        { ?> text-align:      <?php echo esc_attr($font_align);?>;<?php }
        if ($font_variant)      { ?> font-variant:    <?php echo esc_attr($font_variant);?>;<?php }
        if ($font_transform)    { ?> text-transform:  <?php echo esc_attr($font_transform);?>;<?php }
        if ($font_decoration)   { ?> text-decoration: <?php echo esc_attr($font_decoration);?>;<?php }
        if ($font_size)         { ?> font-size:       <?php echo esc_attr($font_size);?>px;<?php }
        if ($font_height)       { ?> line-height:     <?php echo esc_attr($font_height);?>px;<?php }
        if ($font_ltr_spacing)  { ?> letter-spacing:  <?php echo esc_attr($font_ltr_spacing);?>px;<?php }
        if ($font_word_spacing) { ?> word-spacing:    <?php echo esc_attr($font_word_spacing);?>px;<?php }
        if ($font_color)        { ?> color:           <?php echo esc_attr($font_color);?>;<?php } ?>
      }<?php

    }
  }
}

$font_family       = cs_get_option( 'custom_font_family' );

if( ! empty( $font_family ) ) {

  foreach ( $font_family as $font ) {
    echo '@font-face{';

    echo 'font-family: "'. $font['name'] .'";';

    if( empty( $font['css'] ) ) {
      echo 'font-style: normal;';
      echo 'font-weight: normal;';
    } else {
      echo esc_attr($font['css']);
    }

    echo ( ! empty( $font['ttf']  ) ) ? 'src: url('. esc_url($font['ttf']).');' : '';
    echo ( ! empty( $font['eot']  ) ) ? 'src: url('. esc_url($font['eot']).');' : '';
    echo ( ! empty( $font['woff'] ) ) ? 'src: url('. esc_url($font['woff']) .');' : '';
    echo ( ! empty( $font['otf']  ) ) ? 'src: url('. esc_url($font['otf']).');' : '';

    echo '}';
  }

}