<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
?>

<div class="mobile-trigger-popup dark">
  <div class="container-md">
    <div class="row">
      <div class="col-6 valign-center">
        <div class="cta-rate">
          <?php if ($feed_name): ?>

          <span class="cta-rate__title">Smile like <?php echo $feed_name ?></span>
          <?php endif ?>
          <div class="cta-rate__stars">
            <?php for ($i=0; $i < $feed_stars; $i++) { ?>
              <img src="<?php echo THEME_URL ?>/assets/images/star.jpg" alt="">
            <?php } ?>
            <?php if ($feed_rate_desc ): ?>
              <span class="cta-rate__text">
                <?php echo $feed_rate_desc; ?>
              </span>
            <?php endif ?>
          </div>
        </div>
      </div>
      <div class="col-6 text-right valign-center">
        <a href="javascript:void(0)" class="book-btn book-btn_light " onclick="show_popup('<?php echo $form_id ?>')">
          <img src="<?php echo THEME_URL;?>/assets/images/svg/ruh.svg" alt="">
          <span>Book</span>
        </a>
      </div>
    </div>
  </div>
</div>