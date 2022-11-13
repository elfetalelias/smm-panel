<?php
/*
 * The template for displaying 404 pages (not found).
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

// Theme Options
$fame_error_heading = cs_get_option('error_heading');
$fame_error_sub_heading = cs_get_option('error_sub_heading');
$fame_error_page_content = cs_get_option('error_page_content');
$fame_error_page_bg = cs_get_option('error_page_bg')['url'];
$fame_error_btn_text = cs_get_option('error_btn_text');
$fame_error_heading = ( $fame_error_heading ) ? $fame_error_heading : esc_html__( '404', 'fame' );
$fame_error_sub_heading = ( $fame_error_sub_heading ) ? $fame_error_sub_heading : esc_html__( 'Ooops!!! Something went Wrong', 'fame' );
$fame_error_page_content = ( $fame_error_page_content ) ? $fame_error_page_content : esc_html__( 'The page you are looking for is removed or might never existed.', 'fame' );
$fame_error_page_bg = $fame_error_page_bg ? $fame_error_page_bg : esc_url(FAME_IMAGES) . '/404.png';
$fame_error_btn_text = ( $fame_error_btn_text ) ? $fame_error_btn_text : esc_html__( 'BACK TO HOME', 'fame' );

get_header();
?>
<div class="fame-error" style="background: url(<?php echo esc_url($fame_error_page_bg); ?>);">
  <div class="container">
    <h1 class="error-title"><?php echo esc_html($fame_error_heading); ?></h1>
    <h2 class="error-subtitle"><?php echo esc_html($fame_error_sub_heading); ?></h2>
    <p><?php echo esc_html($fame_error_page_content); ?></p>
    <div class="fame-btn-wrap"><a href="<?php echo esc_url(home_url( '/' )); ?>" class="fame-btn fame-blue-btn fame-small-btn"><?php echo esc_html($fame_error_btn_text); ?></a></div>
  </div>
</div>
<?php
get_footer();
