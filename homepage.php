<?php /* Template Name: Homepage */ ?>
<?php get_header(); ?>

<div class="text-center py-5">
  <div class="container">
    <h1 class="heading">Přidejte se do Shoptetu</h1>
    <p class="lead mb-3">Pojďte s námi měnit svět e-commerce</p>
    <a href="#pozice" class="btn btn-secondary btn-lg">Všechny pozice<i class="fas fa-arrow-right ml-2"></i></a>
  </div>
</div>

<div class="container-media">
  <div class="display-img">
    <img src="https://images.unsplash.com/photo-1541746972996-4e0b0f43e02a?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80">
  </div>
</div>

<div class="text-center py-5" id="nase-mise">
  <div class="container">
    <h2 class="display-2 mb-4">Pomáháme lidem podnikat</h2>
  </div>
  <div class="container container-narrow">
    <p class="lead">
      Díky Shoptetu si tisíce lidí plní sny o podnikání. Pomáháme drobným prodejců i známým
      značkám uspět ve světě e-commerce. Máme smysluplný produkt a špičkovou zákaznickou péči.
    </p>
  </div>
</div>

<div class="text-center" id="prace-v-shoptetu">

  <div class="container-media">
    <div class="billboard">
      <div class="billboard-img">
        <img src="https://images.unsplash.com/photo-1541746972996-4e0b0f43e02a?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80">
      </div>
      <div class="billboard-body mt-4 mt-md-0">
        <h2 class="display-2 mb-0">Práce v Shoptetu</h2>
      </div>
    </div>
  </div>

  <div class="container container-narrow pt-4 pb-5">
    <p class="lead">
      Je nás přes 100, rychle rosteme, ale zároveň si udržujeme pružnost bez těžkopádných procesů
      a hierarchie. Flexibilní pracovní doba, home office nebo budget na vzdělávání jsou samozřejmost. 
    </p>
  </div>

</div>

<div class="container">
  <h2 class="display-2 text-center mb-0">Shoptet tvoříme dohromady</h2>
</div>

<div class="swipeable py-3 mb-4">
  <?php for ($i = 0; $i < 5; $i++): ?>
    <div class="swipeable-item">

      <div class="box-shadow bg-white rounded">
        <div class="row align-items-center no-gutters">
          <div class="col-lg-6">
            <div class="display-img display-img-fix-vertical display-img-4-by-3">
              <img src="https://images.unsplash.com/photo-1607746882042-944635dfe10e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="p-2 pt-3 p-sm-3">
              <h2>John Doe</h2>
              <p class="font-weight-bold text-muted">Customer Line Consultant</p>
              <div class="fs-xl-125">
                <p>V Shoptetu pracuji čtvrtým rokem na zákaznické lince. Skvělý kolektiv a rodinná atmosféra je důvod proč vstávám do práce každé ráno s úsměvem. Moc ráda pomáhám realizovat sny i ostatním lidem a myslím, že v Shoptetu se nám to opravdu daří.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  <?php endfor; ?>
</div>

<?php if (is_callable(['Shoptet\ShoptetExternal', 'get_blog_posts']) && $blog_posts = Shoptet\ShoptetExternal::get_blog_posts(['_embed' => 1, 'categories' => 864])): ?>
  <div class="container">
    <h2 class="display-2 text-center mb-0">Co je u nás nového?</h2>
  </div>
  <div class="swipeable py-3 mb-4">
    <?php foreach($blog_posts as $post_array): ?>
      <div class="swipeable-item swipeable-item-sm">
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
                <a href="<?= $post_array['link'] ?>" class="link-body" target="_blank">Celý článek<i class="fas fa-arrow-right ml-2"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>

<?php if (is_callable(['JobOfferService', 'get_grouped_by_tax'])): ?>
  <div class="container pb-4" id="pozice">
    <div class="block bg-gray box-shadow">
      <h2 class="display-2 text-center mb-3">Aktuální volné pozice</h2>
      <?php
        $jobs_by_department = JobOfferService::get_grouped_by_tax('job_offer_department');
      ?>
      <div class="block bg-white">
        <?php $i = 0; foreach($jobs_by_department as $dep): $i++; ?>
          <div class="<?= ($i < count($jobs_by_department) ? 'pb-3' : '') ?>">
            <h3 class="h5 mb-1"><?= $dep['term']->name ;?></h3>
            <?php $j = 0; foreach($dep['posts'] as $p): $j++; ?>
              <?php
                $locations = get_the_terms($p->ID, 'job_offer_location');
                $location = array_pop($locations);
                $departments = get_the_terms($p->ID, 'job_offer_department');
                $department = array_pop($departments);
              ?>
              <a class="job-tease <?= ($j < count($dep['posts']) ? 'mb-2' : '') ?>" href="<?= get_permalink($p); ?>">
                <div class="d-flex justify-content-between">
                  <div><h2 class="job-tease-title"><?= $p->post_title; ?></h2></div>
                  <div><i class="job-tease-title-action-btn fas fa-chevron-circle-right"></i></div>
                </div>
                <div class="d-flex justify-content-between">
                  <div class="job-tease-location">
                    <?php if (!empty($location)): ?>
                      <i class="fas fa-map-marker-alt mr-1"></i><?= $location->name ?>
                    <?php endif; ?>
                  </div>
                  <?php if (!empty($department)): ?>
                    <div><span class="badge badge-pill badge-primary"><?= $department->name ?></span></div>
                  <?php endif; ?>
                </div>
              </a>
            <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
<?php endif; ?>

<div class="text-center py-4 bg-gray">
  <div class="py-2">
    <div class="container">
      <h2 class="display-2 mb-3">Kontakt na HR</h2>
    </div>
    <div class="container container-narrow">
      <p class="lead mb-4">
        Nenašli jste svoji pozici ale máte zájem se k nám přidat? 
        Máte otázku? Napište nám, rádi vám odpovíme.
      </p>
      <a href="mailto:xxx" class="btn btn-secondary btn-lg">Napište nám<i class="fas fa-arrow-right ml-2"></i></a>
    </div>
  </div>
</div>

<?php get_footer(); ?>
