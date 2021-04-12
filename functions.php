<?php

define('CUSTOM_SEARCH_HEADER', true);

add_filter('shp/custom_post_types', function($custom_post_types){
  $custom_post_types[] = 'job_offer';
  return $custom_post_types;
});
