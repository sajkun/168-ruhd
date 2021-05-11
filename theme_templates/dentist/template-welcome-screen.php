<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
?>

<style type="text/css">
  @media(max-width: 767px){
    .carousel{
      <?php if ($bg_color): ?>
        background-color:<?php echo $bg_color; ?>;
      <?php endif ?>

      background-repeat: no-repeat;
      background-size: 100% auto;

      background-image: url(<?php echo $image_mobile ?>);
      background-position: 100% 100%;
    }
  }

  @media(min-width: 768px){
    .carousel{
      background-image: url(<?php echo $image ?>);
      background-size: cover;
    }
  }
</style>

<div class="container-xxl no-padding">
  <div class="carousel treatment no-bg">
    <div class="row">
      <div class="col-12 col-md-6 valign-center-md">
        <div class="spacer-h-30 spacer-h-md-40"></div>
        <div class="info__content">

          <?php if ($category): ?>
            <p class="info__category"><?php echo $category ?></p>
          <?php endif ?>

          <h2 class="treatment__info-title"><?php echo $title; ?></h2>

          <?php if ($grade): ?>
          <p class="info__grade"><?php echo $grade; ?></p>
          <div class="spacer-h-20"></div>
          <?php endif ?>

          <?php if ($post): ?>
          <p class="info__about"> <?php echo $doctor_post ?> </p>
          <?php endif ?>
          <div class="spacer-h-30"></div>
          <?php if ($about): ?>
            <p class="treatment__info-text"><?php echo $about; ?></p>
          <?php endif ?>
          <div class="spacer-h-lg-50"></div>
        </div>
        <div class="spacer-h-150 spacer-h-md-100"></div>
      </div>
      <div class="col-md-6 img">
        <?php if ($video_url): ?>
          <img src="<?php echo THEME_URL?>/assets/images/play-button.png" class=" trigger-video" onclick="play_video('<?php echo $video_url; ?>', event)" alt="">
          <div class="spacer-h-100 spacer-h-md-0"></div>
        <?php endif ?>
      </div>
    </div>

    <div class="col-12 menu-holder">
      <ul>
        <li class="active"><a href="#about">About <?php echo $name ?></a></li>
        <?php if ($smile_stories): ?>
        <li><a href="#smile">Smile Stories</a></li>
        <?php endif ?>

        <?php if ($before_after): ?>
        <li><a href="#before_after">Before After</a></li>
        <?php endif ?>

        <?php if ($insta_url): ?>
        <li><a href="<?php echo esc_url($insta_url);?>" target="_blank">Instagram</a></li>
        <?php endif ?>
      </ul>

      <?php if ($form_id): ?>
      <a href="javascript:void(0)" class="book-btn book-btn_dark hide-mobile" onclick="show_popup('<?php echo $form_id ?>')">
        <img src="<?php echo THEME_URL ?>/assets/images/svg/ruh.svg" alt="">
        <span>Book with <?php echo $name ?></span>
      </a>
      <?php endif ?>
    </div>
  </div>
</div>