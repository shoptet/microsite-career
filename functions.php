<?php

require_once 'acf.php';

define('SIMPLY_HEADER', true);

add_action('acf/init', 'shoptet_acf_init');

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