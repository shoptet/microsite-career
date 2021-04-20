<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>

  <div class="display-img display-img-fluid">
    <?php
      $job_offer_image = get_field('job_offer_image', 'option');
      echo wp_get_attachment_image($job_offer_image, 'large');
    ?>
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
        <a href="#odpovedet" class="btn btn-secondary btn-lg">Mám zájem<i class="fas fa-arrow-right ml-2"></i></a>
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

  <div class="container container-narrow pb-5" id="odpovedet">
    <div class="block bg-gray box-shadow">
      <div class="text-center">
        <h2 class="display-2 mb-1">Odpovědět na inzerát</h2>
        <p class="lead">Obratem se ozveme zpět</p>
      </div>
      <?php get_template_part('src/template-parts/job_offer/content', 'application-form'); ?>
    </div>
  </div>

<?php endwhile; ?>

<?php get_footer(); ?>
