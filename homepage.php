<?php /* Template Name: Homepage */ ?>
<?php get_header(); ?>

<div class="text-center py-5">
  <div class="container">
    <h1 class="heading come-in"><?= get_field('hero_title', 'option'); ?></h1>
    <p class="lead mb-3 come-in"><?= get_field('hero_subtitle', 'option'); ?></p>
    <a href="#open-positions" class="btn btn-secondary btn-lg"><?php _e('Všechna volná místa', 'shoptet-career'); ?><span class="icon-container ml-2"><i class="fas fa-arrow-right"></i></span></a>
  </div>
</div>

<div class="container-media">
  <div class="parallax-wrapper">
    <?php
      $hero_image = get_field('hero_image', 'option');
      echo wp_get_attachment_image($hero_image, 'large', false, ['class' => 'parallax', 'sizes' => '(max-width: 1199px) 100vw, 1200px']);
    ?>
  </div>
</div>

<div class="text-center py-5" id="our-mission">
  <div class="container">
    <h2 class="display-2 mb-4"><?= get_field('mission_title', 'option'); ?></h2>
  </div>
  <div class="container container-narrow">
    <p class="lead">
      <?= get_field('mission_subtitle', 'option'); ?>
    </p>
  </div>
</div>

<div class="text-center" id="work-in-shoptet">

  <div class="container-media">
    <div class="billboard">
      <div class="billboard-img">
        <div class="parallax-wrapper">
          <?php
            $mission_image = get_field('mission_image', 'option');
            echo wp_get_attachment_image($mission_image, 'large', false, ['class' => 'parallax']);
          ?>
        </div>
      </div>
      <div class="billboard-body mt-4 mt-md-0">
        <h2 class="display-2 mb-0"><?= get_field('work_title', 'option'); ?></h2>
      </div>
    </div>
  </div>

  <div class="container container-narrow pt-4 pb-5">
    <p class="lead">
      <?= get_field('work_subtitle', 'option'); ?>
    </p>
  </div>

</div>

<div class="container">
  <h2 class="display-2 text-center mb-0"><?php _e('Shoptet tvoříme dohromady', 'shoptet-career'); ?></h2>
</div>

<div class="container py-3 mb-5">
  <div class="splide full overflow">
    <div class="splide__track">
      <div class="splide__list">
		
        <?php while (have_rows('testimonials', 'option')): the_row(); ?>
          <div class="splide__slide">
            
            <div class="bg-white h-100 rounded box-shadow">
              <div class="row align-items-center no-gutters">
                <div class="col-lg-6">
                  <div class="display-img display-img-fix-vertical display-img-4-by-3">
                    <?php
                      $image = get_sub_field('image');
                      echo wp_get_attachment_image($image, 'large');
                    ?>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="p-2 pt-3 p-sm-3">
                    <h2><?php the_sub_field('name'); ?></h2>
                    <p class="font-weight-bold text-muted"><?php the_sub_field('position'); ?></p>
                    <div class="fs-xl-125">
                      <p><?php the_sub_field('text'); ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        <?php endwhile; ?>

      </div>
    </div>
  </div>
</div>
<?php if ($blog_posts = Shoptet\ShoptetExternal::get_blog_posts(['_embed' => 1, 'categories' => 864, 'exclude' => '21262,24824'])): ?>
  <div class="container">
    <h2 class="display-2 text-center mb-0"><?php _e('Co je u nás nového?', 'shoptet-career'); ?></h2>
  </div>
  <div class="container py-3 mb-5">
    <div class="splide blog overflow">
      <div class="splide__track">
        <div class="splide__list">
          <?php foreach($blog_posts as $post_array): ?>
            <div class="splide__slide">
              <div class="card card-hover">
                <a href="<?= $post_array['link'] ?>" target="_blank">
                  <div class="display-img display-img-fix-vertical display-img-4-by-3 bg-gray-dark">
                    <?php if( isset($post_array['_embedded']['wp:featuredmedia'][0]['media_details']) ): ?>
                      <img src="<?= $post_array['_embedded']['wp:featuredmedia'][0]['media_details']['sizes']['medium_large']['source_url'] ?>" alt="<?= $post_array['_embedded']['wp:featuredmedia'][0]['alt_text'] ?>">
                    <?php endif; ?>
                  </div>
                </a>
                <div class="p-2 p-sm-2 m-sm-1">
                  <div class="card-more">
                    <p class="mb-1"><?= date_i18n(get_option('date_format'), strtotime($post_array['date'])); ?></p>
                    <a href="<?= $post_array['link'] ?>" class="link-body" target="_blank"><h3 class="h5 mt-0 mb-2"><?= $post_array['title']['rendered'] ?></h3></a>
                    <div>
                      <?= $post_array['excerpt']['rendered'] ?>
                    </div>
                    <div class="card-more-button text-center">
                      <a href="<?= $post_array['link'] ?>" class="link-body" target="_blank"><?php _e('Celý článek', 'shoptet-career'); ?><i class="fas fa-arrow-right ml-2"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

<?php $gallery = get_field('gallery', 'option'); ?>
<?php if (is_array($gallery) && !empty($gallery)): ?>
  <div class="container pb-5" id="galerie">
    <div class="block bg-gray box-shadow">
      <h2 class="display-2 text-center mb-3"><?php _e('Život v Shoptetu', 'shoptet-career'); ?></h2>
      <div id="gallery-slider" class="splide mb-2" itemscope itemtype="http://schema.org/ImageGallery">  
        <div class="splide__track">
          <div class="splide__list">
            <?php foreach($gallery as $image): ?>
              <?php
                $attachment_id = $image['ID'];
                $image_src = wp_get_attachment_image_src($attachment_id, 'large');
                list($src, $width, $height) = $image_src;
                $gallery_image_meta = wp_get_attachment_metadata($attachment_id);
                $size_array = [absint($width), absint($height)];
              ?>
              <figure class="splide__slide rounded" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                <img
                  src="<?php echo $src; ?>"
                  srcset="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                  data-splide-lazy-srcset="<?php echo wp_calculate_image_srcset($size_array, $src, $gallery_image_meta, $attachment_id); ?>"
                  sizes="(max-width: 575px) 100vw, (max-width: 767px) 476px, (max-width: 991px) 656px, (max-width: 1199px) 760px, 940px"
                  alt="<?php echo trim(strip_tags(get_post_meta($attachment_id, '_wp_attachment_image_alt', true))); ?>"
                  itemprop="contentUrl"
                >
              </figure>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <div id="gallery-thumbnail-slider" class="splide">
        <div class="splide__track">
          <div class="splide__list">
            <?php foreach($gallery as $image): ?>
              <div class="splide__slide">
                <?php echo wp_get_attachment_image($image['ID'], 'thumbnail', false) ?>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

<?php if (is_callable(['JobOfferService', 'get_grouped_by_tax'])): ?>
  <div class="container pb-5" id="open-positions">
    <div class="block bg-gray box-shadow">
      <h2 class="display-2 text-center mb-3"><?php _e('Aktuální volná místa', 'shoptet-career'); ?></h2>
      <?php
        $jobs_by_department = JobOfferService::get_grouped_by_tax('job_offer_department');
      ?>
      <div class="row">
        <div class="col-sm-6">
          <select class="custom-select custom-select-lg mb-2 mb-sm-3" id="job-list-filter-location">
            <option value="" selected><?php _e('Všechny lokality', 'shoptet-career'); ?></option>
            <?php
              $locations_all = get_terms(['taxonomy' => 'job_offer_location']);
              foreach($locations_all as $l) {
                printf('<option value="%s">%s</option>', $l->slug, $l->name);
              }
            ?>
          </select>
        </div>
        <div class="col-sm-6">
          <select class="custom-select custom-select-lg mb-2 mb-sm-3" id="job-list-filter-department">
            <option value="" selected><?php _e('Všechna oddělení', 'shoptet-career'); ?></option>
            <?php
              $departments_all = get_terms(['taxonomy' => 'job_offer_department']);
              foreach($departments_all as $d) {
                printf('<option value="%s">%s</option>', $d->slug, $d->name);
              }
            ?>
          </select>
        </div>
      </div>
      <div class="block bg-white">
        <?php foreach($jobs_by_department as $dep): ?>
          <div class="mb-3" data-job-list data-job-list-department="<?= $dep['term']->slug ?>">
            <h3 class="h5 mb-1"><?= $dep['term']->name ;?></h3>
            <?php foreach($dep['posts'] as $p): ?>
              <?php
                $locations = get_the_terms($p->ID, 'job_offer_location');
                $location = array_pop($locations);
                $departments = get_the_terms($p->ID, 'job_offer_department');
                $department = array_pop($departments);
              ?>
              <a class="job-tease mb-2" href="<?= get_permalink($p); ?>" data-job-item data-job-item-location="<?= $location->slug ?>">
                <div class="d-flex justify-content-between">
                  <div><h2 class="job-tease-title"><?= $p->post_title; ?></h2></div>
                  <div><i class="job-tease-title-action-btn fas fa-chevron-circle-right"></i></div>
                </div>
                <div class="d-flex justify-content-between">
                  <div class="job-tease-location">
                    <?php if (!empty($location)): ?>
                      <span class="hover-opacity" data-job-filter-tax="location" data-job-filter-term="<?= $location->slug ?>" title="Filtrovat dle této lokality"><i class="fas fa-map-marker-alt mr-1"></i><?= $location->name ?></span>
                    <?php endif; ?>
                  </div>
                  <?php if (!empty($department)): ?>
                    <div><span class="badge badge-pill badge-primary hover-opacity" data-job-filter-tax="department" data-job-filter-term="<?= $department->slug ?>" title="Filtrovat dle tohoto oddělení"><?= $department->name ?></span></div>
                  <?php endif; ?>
                </div>
              </a>
            <?php endforeach; ?>
          </div>
        <?php endforeach; ?>
        <div class="text-center fs-120" data-job-message></div>
      </div>
    </div>
  </div>
<?php endif; ?>

<div class="py-4 bg-gray">
  <div class="py-2">
    <div class="container">
      <h2 class="display-2 mb-3 text-center"><?php _e('Kontakt na HR', 'shoptet-career'); ?></h2>
    </div>
    <div class="container container-narrow">
      <p class="lead mb-4 text-center">
        <?php _e('Nenašli jste svoji pozici ale máte zájem se k nám přidat? Máte otázku? Napište nám, rádi vám odpovíme.', 'shoptet-career'); ?>
      </p>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto">
          <?php echo do_shortcode(get_field('contact_form_shortcode', 'option'))?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
