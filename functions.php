<?php

require_once 'acf.php';

define('SIMPLY_HEADER', true);

add_action('acf/init', 'shoptet_acf_init');

add_action('after_setup_theme', function() {
  load_theme_textdomain('shoptet-career', get_template_directory() . '/src/languages');
});

add_filter('shp/custom_post_types', function($custom_post_types){
  $custom_post_types[] = 'job_offer';
  return $custom_post_types;
});

add_action('wp_enqueue_scripts', function() {
  $file_name = '/src/dist/css/splide.min.css';
  $file_url = get_template_directory_uri() . $file_name;
  $file_path = get_theme_file_path($file_name);
  wp_enqueue_style('splide', $file_url, [], filemtime($file_path), 'all');
});

add_filter('wpseo_opengraph_image', function($image_url) {
  $post = get_post();
  if ($post instanceof WP_Post && $post->post_type == 'job_offer') {
    $image = get_field('job_offer_og_image', 'option');
    $image_url = wp_get_attachment_url($image);
  }
  return $image_url;
});

// Remove inline styles from job_offer content
add_filter('the_content', function($content) {
  $post = get_post();
  if ($post instanceof WP_Post && $post->post_type == 'job_offer') {
    $content = preg_replace('/ style=("|\')(.*?)("|\')/','', $content);
  }
  return $content;
});

add_filter('privacy_policy_url', function($privacy_policy_url) {
  if ($url = get_field('privacy_policy_url', 'option')) {
    $privacy_policy_url = $url;
  }
  return $privacy_policy_url;
});