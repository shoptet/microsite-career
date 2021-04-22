<?php

require_once 'acf.php';

define('SIMPLY_HEADER', true);

add_action('acf/init', 'shoptet_acf_init');

add_filter('shp/custom_post_types', function($custom_post_types){
  $custom_post_types[] = 'job_offer';
  return $custom_post_types;
});
