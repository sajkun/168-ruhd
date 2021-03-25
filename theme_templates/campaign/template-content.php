<style>
  .page-item *{
    color: #fff;
  }
</style>

<div class="container">
 <div class="row">
   <div class="col-12 col-md-7 valign-center">
    <?php if ($tag || $text): ?>
     <div class="information">
      <?php if ($tag): ?>
       <span class="information__tag new"><?php echo $tag; ?></span>
      <?php if ($text): ?>
      <?php endif ?>
       <a href="#" class="information__text"><?php echo $text; ?></a>
      <?php endif ?>
     </div>
     <div class="spacer-h-40"></div>
    <?php endif ?>

    <?php if ($category): ?>
     <p class="section-category"><?php echo $category; ?></p>
    <?php endif ?>

     <h1 class="section-title"><?php echo $title; ?></h1>

    <?php if ($description): ?>
     <div class="regular-text">
       <?php echo $description; ?>
     </div>
     <div class="spacer-h-30"></div>
    <?php endif ?>


     <div class="row">
      <?php if ( $date ): ?>

       <div class="col-md-6">
          <span class="label-info">
             <svg class="svg-icon-calendar"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-calendar"></use></svg>
            <?php echo $date; ?>
          </span>
       </div>
      <?php endif ?>

      <?php if ( $clinic ): ?>
       <div class="col-md-6">
          <span class="label-info">
            <svg class="svg-icon-house2"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-house2"></use></svg>
            <?php  echo $clinic; ?>
          </span>
       </div>
      <?php endif ?>
     </div>

     <div class="spacer-h-40"></div>

     <?php
        $menu = array(
          'overview' => array(
            'tag' => 'The Offer',
            'content' => $offer
          ),
          'beforeafter' => array(
            'tag' => 'How It Works',
            'content' => $how
          ),
          'pricing' => array(
            'tag' => 'Terms',
            'content' => $terms
          ),
        );
      ?>
     <div class="menu-holder container">
       <ul>

        <?php $active = 'active';
          foreach ($menu as $key => $data):
            if(!$data['content']) continue;
            ?>
           <li class="<?php echo $active ?>"><a href="#<?php echo $key ?>"><?php echo $data['tag'] ?></a></li>
        <?php
        $active = '';
         endforeach ?>
       </ul>
     </div>

     <div class="spacer-h-50"></div>
      <?php $display = 'block';
          foreach ($menu as $key => $data):
            if(!$data['content']) continue;
             ?>
        <div class="page-item" id="<?php echo $key ?>" <?php echo 'style="display:'.$display.'"' ?>>

            <?php echo $data['content'] ?>
        </div>
        <?php
        $display = 'none';
         endforeach ?>

      <div class="spacer-h-50 spacer-h-md-0"></div>
    </div><!-- col-12 col-md-7 -->
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
              <p class="cta__item-text">Book a free appointment at either of our London or Manchester clinics.</p>

              <b class="cta__item-info">Same-day appointments available</b>
            </div>

            <div class="cta__item not-active" data-target="form-online" onclick="show_online_visit()">
              <svg class="svg-icon-phone"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-phone"></use></svg>

              <h4 class="cta__item-title">Online Visit (Coming Soon)</h4>
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
 </div><!-- row -->
</div>

<div class="spacer-h-100"></div>