<form method="post" id="jobApplicationForm">

  <input type="hidden" name="action" value="job_application">
  <input type="hidden" name="id" value="<?= $post->ID ?>">

  <div class="form-group">
    <label class="sr-only" for="jobApplicationName"><?php _e('Vaše jméno*', 'shoptet-career'); ?></label>
    <input type="text" class="form-control" name="name" id="jobApplicationName" placeholder="<?php _e('Celé jméno*', 'shoptet-career'); ?>" required>
  </div>

  <div class="form-group">
    <label class="sr-only" for="jobApplicationEmail"><?php _e('Váš e-mail*', 'shoptet-career'); ?></label>
    <input type="email" class="form-control" name="email" id="jobApplicationEmail" placeholder="<?php _e('E-mail*', 'shoptet-career'); ?>" required>
  </div>

  <div class="form-group">
    <label class="sr-only" for="jobApplicationPhone"><?php _e('Váš telefon*', 'shoptet-career'); ?></label>
    <input type="tel" class="form-control" name="phone" id="jobApplicationPhone" placeholder="<?php _e('Telefon*', 'shoptet-career'); ?>"  required>
  </div>

  <div class="form-group">
    <label class="sr-only" for="jobApplicationCoverLetter"><?php _e('Průvodní dopis', 'shoptet-career'); ?></label>
    <textarea class="form-control" name="cover_letter" id="jobApplicationCoverLetter" rows="6" placeholder="<?php _e('Zpráva', 'shoptet-career'); ?>"></textarea>
  </div>

  <div class="form-group">
    <label class="sr-only" for="jobApplicationLinkedIn"><?php _e('LinkedIn profil', 'shoptet-career'); ?></label>
    <input type="url" class="form-control" name="linkedin" id="jobApplicationLinkedIn" placeholder="<?php _e('Odkaz na LinkedIn profil', 'shoptet-career'); ?>">
  </div>

  <div class="form-group mb-3">
    <label for="jobApplicationCV"><?php _e('Vaše CV', 'shoptet-career'); ?></label>
    <input type="file" class="form-control-file" name="cv" id="jobApplicationCV" aria-describedby="jobApplicationCVHelp">
    <small id="jobApplicationCVHelp" class="form-text text-muted"><?php _e('Nahrajte prosím soubor typu PDF, DOC(X) nebo ODT', 'shoptet-career'); ?></small>
  </div>

  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="gdpr" value="1" id="jobApplicationGDPR" required>
      <label class="form-check-label" for="jobApplicationGDPR">
        <?php
          printf(
            __('Vložením svého jména, kontaktního e-mailu a CV souhlasím se <a href="%s" target="_blank">zpracováním osobních údajů</a> společností Shoptet s.r.o. pro účely výběrového řízení.', 'shoptet-career'),
            'https://www.shoptet.cz/podminky-ochrany-osobnich-udaju/'
          );
        ?>
      </label>
    </div>
  </div>

  <button type="submit" class="btn btn-secondary btn-block btn-lg" data-toggle-text="<?php _e('Odesílám...', 'shoptet-career'); ?>"><?php _e('Odeslat odpověď', 'shoptet-career'); ?><i class="fas fa-arrow-right ml-2"></i></button>

</form>