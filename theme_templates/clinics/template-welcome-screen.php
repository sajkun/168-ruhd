<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
?>

<div class="container-xxl no-padding">
  <div class="carousel clinics no-bg">
    <div class="row">
      <div class="col-12 col-md-6 valign-center-md">
        <div class="spacer-h-30 spacer-h-md-40"></div>
        <div class="info__content">
          <?php if ($category): ?>
            <p class="info__category"><?php echo $category ?></p>
          <?php endif ?>

          <h2 class="info__title"><?php echo $title; ?></h2>

          <?php if ($about): ?>
            <p class="info__text"><?php echo $about; ?></p>
          <?php endif ?>
          <div class="spacer-h-lg-50"></div>
        </div>

         <div class="spacer-h-0 spacer-h-md-100"></div>
      </div>
      <div class="col-md-6 img valign-bottom">
        <?php if ($video_url): ?>
        <img src="<?php echo THEME_URL?>/assets/images/play-button.png" class=" trigger-video" onclick="play_video('<?php echo $video_url; ?>')" alt="">
        <?php endif ?>
        <img src="<?php echo $image; ?>" class="img mobile-friendly" alt="">
      </div>
    </div>

    <div class="col-12 menu-holder">
      <ul>
        <li class="active"><a href="#hours">Opening Hours</a></li>
        <li><a href="#gallery">Gallery</a></li>
      </ul>

      <?php if ($phone): ?>
      <a href="tel:<?php echo $phone;?>" class="book-btn book-btn_border hide-mobile">
        <svg class="icon svg-icon-phone2"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-phone2"></use></svg>
        <span>Call Us<?php echo $name ?></span>
      </a>
      <?php endif ?>

      <?php if ($form_id): ?>
      <a href="javascript:void(0)" class="book-btn book-btn_border hide-mobile" onclick="show_popup('<?php echo $form_id ?>')">
        <img src="<?php echo THEME_URL ?>/assets/images/svg/ruh.svg" alt="">
        <span>Book Appointment <?php echo $name ?></span>
      </a>
      <?php endif ?>
    </div>
  </div>
</div>