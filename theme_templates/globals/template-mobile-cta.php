<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

?>

<div class="mobile-trigger-popup <?php if (is_home() || theme_construct_page::is_page_type('clinics')){ echo ' dark ' ;} ?>">
  <div class="container-md">
    <div class="row no-gutters">
      <div class="col valign-center">
        <div class="cta-rate">

          <?php if ($text_cta): ?>
          <span class="cta-rate__title">
            <?php echo $text_cta; ?>
          </span>
          <?php endif ?>
          <div class="cta-rate__stars">

            <?php for($i = 0; $i < $mobile_stars; $i++){?>
               <img src="<?php echo THEME_URL?>/assets/images/star.jpg" alt="">
            <?php
             }
            ?>

            <?php if ($mobile_rate): ?>
              <span class="cta-rate__text">
                  <?php echo $mobile_rate; ?>
              </span>
            <?php endif ?>
          </div>
        </div>
      </div>

        <a href="javascript:void(0)" class="book-btn valign-center <?php if (is_home() || theme_construct_page::is_page_type('clinics')){ echo ' book-btn_light  ' ;}else{ echo ' book-btn_dark  '; } ?>" onclick="show_popup('popup-mobile-cta')">
          <img src="<?php echo THEME_URL;?>/assets/images/svg/ruh.svg" alt="">
          <span>Book</span>
        </a>
    </div>
  </div>
</div>

<div class="popup" id="popup-mobile-cta">
  <div class="popup-inner cta">
       <div class="clearfix">
          <div class="popup-header cta__category">
                  <img src="<?php echo THEME_URL ?>/assets/images/svg/ruh.svg" class="cta__img" alt="">
                  <span>VISIT</span>
            <i class="icon-close">×</i>

          </div>

          <div class="cta__section" id="_cta1">
            <p class="cta__title">Start <span class="marked">your</span> journey</p>

            <p class="cta__text">Visit us online or pop into one of our clinics.</p>

            <div class="cta__item active" data-target="form-inclinic-2">
              <svg class="svg-icon-house"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-house"></use></svg>

              <h4 class="cta__item-title">In Clinic Visit</h4>
              <p class="cta__item-text">Book a free appointment at either of our London or Manchester clinics.</p>

              <b class="cta__item-info">Same-day appointments available</b>
            </div>

            <div class="cta__item not-active" data-target="form-online-2">
              <svg class="svg-icon-phone"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-phone"></use></svg>

              <h4 class="cta__item-title">Online Visit (Comming Soon)</h4>
              <p class="cta__item-text">Tell our dentists about your teeth and get a free treatment plan.</p>
            </div>

          </div><!-- cta__section -->

          <div class="cta__section hidden" id="_cta2">

            <?php if ( $form_online): ?>
            <div class="form-online-2 book-form-holder">
              <p class="cta__title"><span class="marked">Online</span> Visit</p>
              <p class="cta__text">Tell our dentists about your teeth and get a free treatment plan</p>
              <?php echo $form_online ?>
            </div>
            <?php endif ?>

            <?php if ( $form_inclicnic): ?>
            <div class="form-inclinic-2 book-form-holder">
              <p class="cta__title">In <span class="marked">Clinic</span> Visit</p>
              <p class="cta__text">Let’s get you booked in for a free consultation</p>
              <?php echo $form_inclicnic ?>
            </div>
            <?php endif ?>


            <div class="spacer-h-20"></div>
          </div><!-- cta__section -->

          <div class="cta__section hidden" id="_cta3">
            <p class="cta__title">Thank you, <span class="marked">Omar</span></p>
            <p class="cta__text">One of our Treatment Co-ordinator’s will be in touch with you shortly to confirm your appointment.</p>
          </div><!-- cta__section -->

          <div class="cta__separator"></div>

          <div class="cta__contact">
            <h4 class="cta__contact-title">Got a Question?</h4>
            <p class="cta__contact-text" onclick="Intercom('show')">Speak live with one of our expert dental care team members.
              <i class="icon-talk"><span></span></i>
            </p>
          </div>
        </div>
     </div>
  </div>
</div>