<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>

  <div class="job-image">
    <div class="parallax-wrapper">
      <?php
        $job_offer_image = get_field('job_offer_image', 'option');
        echo wp_get_attachment_image($job_offer_image, 'large', false, ['class' => 'parallax']);
      ?>
    </div>
  </div>

  <div class="container">
    <div class="job-header">
      <h1 class="job-header-title"><?php the_title(); ?></h1>
      <?php
        $locations = get_the_terms($post->ID, 'job_offer_location');
        $location = array_pop($locations);
      ?>
      <?php if (!empty($location)): ?>
        <div class="mt-1">
          <i class="fas fa-map-marker-alt mr-1"></i><?= $location->name ?>
        </div>
      <?php endif; ?>
      <div class="mt-4">
        <a href="#apply" class="btn btn-secondary btn-lg"><?php _e('Mám zájem', 'shoptet-career'); ?><i class="fas fa-arrow-right ml-2"></i></a>
      </div>
    </div>
  </div>

  <div class="container container-narrow pb-4">
    <div class="job-content">
      <?php the_content(); ?>
      <?php
        $requirements = get_post_meta($post->ID, 'job_offer_requirements', true);
        if (!empty($requirements)) {
          echo esc_html($requirements);
        }
      ?>
    </div>
  </div>

  <div class="container container-narrow pb-5" id="apply">
    <div class="block bg-gray box-shadow">
      <div class="text-center">
        <h2 class="display-2 mb-1"><?php _e('Odpovědět na inzerát', 'shoptet-career'); ?></h2>
        <p class="lead"><?php _e('Obratem se ozveme zpět', 'shoptet-career'); ?></p>
      </div>
      <?php do_action('shoptet_jobs_form'); ?>
    </div>
  </div>

<?php endwhile; ?>

<?php get_footer(); ?>
