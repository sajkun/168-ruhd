<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
?>
<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
?>
<div class="spacer-h-50"></div>
  <section class="tab-target">
    <div class="container">

      <div class="row">
        <div class="col-md-7">
          <?php if ($feed_name): ?>
          <h3 class="paragraph-title"><?php echo $feed_name; ?> Said</h3>
          <?php endif ?>

          <?php if ($feed_text): ?>
            <div class="spacer-h-20"></div>
            <blackquote class="feedback-text">
              <?php echo $feed_text ?>
            </blackquote>
            <div class="spacer-h-40"></div>
          <?php endif ?>


          <?php if ($before_after_title): ?>
            <h3 class="paragraph-title"><?php echo $before_after_title; ?></h3>
          <?php endif ?>

          <?php if ($before_after): ?>
            <div class="regular-text colored">
              <?php echo $before_after; ?>
            </div>
          <?php endif ?>

          <?php if ($before_after_items): ?>
            <?php foreach ($before_after_items as $slide):
              $image_before = wp_get_attachment_image_url($slide['image_before'], 'before_after');
              $image_after = wp_get_attachment_image_url($slide['image_after'], 'before_after');

              $dentist_name = trim(get_field('first_name', $slide['dentist']->ID) . ' ' .get_field('last_name', $slide['dentist']->ID))  ;
             ?>
              <div class="ba_wrapper">
                <div class="ba_data">
                  <div class="row">

                    <div class="col-6 valign-top">Dr. <?php echo $dentist_name ?></div>
                    <div class="col-6 text-right valign-top"><?php echo $slide['treatment']->post_title ?></div>
                  </div>
                </div>
                <div class="ba-slider">
                  <img src="<?php echo $image_after; ?>" alt="">
                  <div class="resize">
                    <img src="<?php echo $image_before ; ?>" alt="">
                  </div>
                  <span class="handle"></span>
                </div>
              </div>

            <?php endforeach ?>
          <?php endif ?>
        </div><!-- col-md-7 -->

        <?php if(!wp_is_mobile()): ?>
        <div class="col-md-5 left-gap">
          <div class="cta clearfix">

            <span class="cta__category">
              <img src="<?php echo THEME_URL ?>/assets/images/svg/ruh.svg" class="cta__img" alt="">
              <span>VISIT</span>
            </span>

            <div class="cta__section" id="cta1">
              <p class="cta__title">Start <span class="marked">your</span> journey</p>

              <p class="cta__text">Visit us online or pop into one of our clinics.</p>

              <div class="cta__item active" data-target="form-online">
                <svg class="svg-icon-phone"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-phone"></use></svg>

                <h4 class="cta__item-title">Online Visit</h4>
                <p class="cta__item-text">Tell our dentists about your teeth and get a free treatment plan.</p>
              </div>

              <div class="cta__item" data-target="form-inclinic">
                <svg class="svg-icon-house"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-house"></use></svg>

                <h4 class="cta__item-title">In Clinic Visit</h4>
                <p class="cta__item-text">Book a free appointment at either of our London or Manchester clinics.</p>

                <b class="cta__item-info">Same-day appointments available</b>
              </div>
            </div><!-- cta__section -->

            <div class="cta__section hidden" id="cta2">

              <?php if ( $form_online): ?>
              <div class="form-online book-form-holder">
                <p class="cta__title"><span class="marked">Online</span> Visit</p>
                <p class="cta__text">Tell our dentists about your teeth and get a free treatment plan</p>
                <?php echo $form_online ?>
              </div>
              <?php endif ?>

              <?php if ( $form_inclicnic): ?>
              <div class="form-inclinic book-form-holder">
                <p class="cta__title">In <span class="marked">Clinic</span> Visit</p>
                <p class="cta__text">Let’s get you booked in for a free consultation</p>
                <?php echo $form_inclicnic ?>
              </div>
              <?php endif ?>


              <div class="spacer-h-20"></div>
            </div><!-- cta__section -->

            <div class="cta__section hidden" id="cta3">
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
        <?php endif ?>
      </div>

    </div>
  </section>
<div class="spacer-h-30 spacer-h-lg-60"></div>