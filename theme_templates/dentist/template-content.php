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

              <?php foreach ($pages as $id => $p):
                if (!$p['show']) {
                  continue;
                }

               ?>
              <div class="page-item" id="<?php echo $id ?>" <?php echo 'style="display: '.$p['display'].'"' ?>>
                <h3 class="paragraph-title"><?php echo $p['title'] ?></h3>
                <?php if($p['text'] ): ?>
                  <div class="regular-text colored">
                    <?php echo $p['text'] ; ?>
                  </div>
                <?php endif ?>
                <?php if($p['smile_stories'] ): ?>

                  <div class="row smile-stories-cont justify-content-between">

                    <?php
                     foreach ($p['smile_stories']  as $story) {
                       print_theme_template_part('story', 'dentist', $story);
                     }
                    ?>
                  </div>
                <?php endif ?>

                <?php if($p['notification_title'] || $p['notification_text']  ): ?>
                  <div class="info-block">
                    <svg class="svg-icon-okay"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-okay"></use></svg>
                    <p class="info-block__text">
                      <?php if ($p['notification_title'] ): ?>
                      <b> <?php echo $p['notification_title'] ; ?></b>
                      <?php endif ?>
                      <?php echo $p['notification_text'] ; ?>
                    </p>
                  </div>
                   <div class="spacer-h-30"></div>
                <?php endif ?>

                <?php if ($p['pricing_items']): ?>
                <div class="tabs">
                  <div class="tabs__header">
                    <?php
                    $active = 'active';
                    foreach ($p['pricing_items'] as $city => $value): ?>
                      <a href="#<?php echo ($city) ?>" class="tabs__header-item <?php echo $active ?>"><?php echo $city ?></a>
                    <?php
                    $active = '';
                     endforeach; ?>
                  </div>
                  <div class="tabs__body">
                    <?php
                    $style = 'style="display: block;"';
                    foreach ($p['pricing_items'] as $city => $data): ?>
                    <div class="tabs__body-item" id="<?php echo ($city) ?>" <?php echo $style ?>>

                      <?php foreach ($data as $key => $item): ?>
                      <div class="pricing-item">
                        <div class="row">
                          <div class="col-sm-7 col-lg-8">
                            <?php if ($item['title']): ?>
                            <h4 class="pricing-item__title"><?php echo $item['title'] ?></h4>
                            <?php endif ?>
                            <?php if ($item['description']): ?>
                            <p class="pricing-item__text"><?php echo $item['description'] ?></p>
                            <?php endif ?>
                          </div>
                            <?php if ($item['starting_price']): ?>
                          <div class="col-sm-5 col-lg-4 text-right-sm valign-center">
                            <span class="pricing-item__label">from £</span>
                            <span class="pricing-item__val"><?php echo $item['starting_price'] ?></span>
                          </div>
                            <?php endif ?>
                        </div>
                      </div><!-- pricing-item -->

                      <?php endforeach ?>
                    </div>
                  <?php
                    $style = 'style="display: none;"';;
                     endforeach; ?>

                  </div>
                </div>

                <?php endif ?>
              </div>
              <?php endforeach ?>
             <div class="spacer-h-40"></div>
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

                    <div class="cta__item active" data-target="form-inclinic">
                      <svg class="svg-icon-house"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-house"></use></svg>

                      <h4 class="cta__item-title">In Clinic Visit</h4>
                      <p class="cta__item-text">Book a free consultation with our treatment co-ordinator.</p>

                      <b class="cta__item-info">Same-day appointments available</b>
                    </div>

                    <div class="cta__item not-active" data-target="form-online" onclick="show_online_visit()">
                      <svg class="svg-icon-phone"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-phone"></use></svg>

                      <h4 class="cta__item-title">Online Visit(Coming Soon)</h4>
                      <p class="cta__item-text">Tell our dentists about your teeth and get a free treatment plan.</p>
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
                      <p class="cta__title">Book with <span class="marked"><?php echo $first_name; ?></span></p>
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