<form method="post" id="jobApplicationForm">

  <input type="hidden" name="action" value="job_application">
  <input type="hidden" name="id" value="<?= $post->ID ?>">

  <div class="form-group">
    <label class="sr-only" for="jobApplicationName">Vaše jméno*</label>
    <input type="text" class="form-control" name="name" id="jobApplicationName" placeholder="Celé jméno*" required>
  </div>

  <div class="form-group">
    <label class="sr-only" for="jobApplicationEmail">Váš e-mail*</label>
    <input type="email" class="form-control" name="email" id="jobApplicationEmail" placeholder="E-mail*" required>
  </div>

  <div class="form-group">
    <label class="sr-only" for="jobApplicationPhone">Váš telefon*</label>
    <input type="tel" class="form-control" name="phone" id="jobApplicationPhone" placeholder="Telefon*"  required>
  </div>

  <div class="form-group">
    <label class="sr-only" for="jobApplicationCoverLetter">Průvodní dopis</label>
    <textarea class="form-control" name="cover_letter" id="jobApplicationCoverLetter" rows="6" placeholder="Zpráva"></textarea>
  </div>

  <div class="form-group">
    <label class="sr-only" for="jobApplicationLinkedIn">LinkedIn profil</label>
    <input type="url" class="form-control" name="linkedin" id="jobApplicationLinkedIn" placeholder="Odkaz na LinkedIn profil">
  </div>

  <div class="form-group mb-3">
    <label for="jobApplicationCV">Vaše CV</label>
    <input type="file" class="form-control-file" name="cv" id="jobApplicationCV" aria-describedby="jobApplicationCVHelp">
    <small id="jobApplicationCVHelp" class="form-text text-muted">Nahrajte prosím soubor typu PDF, DOC(X) nebo ODT</small>
  </div>

  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="gdpr" value="1" id="jobApplicationGDPR" required>
      <label class="form-check-label" for="jobApplicationGDPR">
        Vložením svého jména, kontaktního e-mailu a CV souhlasím se <a href="https://www.shoptet.cz/podminky-ochrany-osobnich-udaju/" target="_blank">zpracováním osobních údajů</a> společností Shoptet s.r.o. pro účely výběrového řízení.
      </label>
    </div>
  </div>

  <button type="submit" class="btn btn-secondary btn-block btn-lg" data-toggle-text="<?php _e('Odesílám...'); ?>">Odeslat odpověď<i class="fas fa-arrow-right ml-2"></i></button>

</form>