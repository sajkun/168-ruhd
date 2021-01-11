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

  <?php if ($video_url): ?>
    @media(max-width: 768px){
      .treatment__info-text{
        padding-bottom: 0 !important;
      }
    }
  <?php endif ?>
</style>

<div class="container-xxl no-padding">

  <div class="carousel treatment no-bg">
  <?php if (wp_is_mobile()): ?>
   <div class="spacer-h-20"></div>
  <div class="clearfix mobile-menu-wrapper__row">
    <a href="tel:<?php echo $phone?>" class="book-btn book-btn_light2">
      <svg class="icon svg-icon-phone2"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-phone2"></use></svg>
      <span>Call Us</span>
    </a>

    <div class="spacer-w-15"></div>

    <a href="javascript:void(0)" class="book-btn book-btn_light2 " onclick="Intercom('show')">
      <img src="<?php echo THEME_URL?>/assets/images/svg/chat.svg" alt="" class="chat-icon">
      <span> Live Chat </span>
      <span class="status online">Online</span>
    </a>

  </div>
  <div class="spacer-h-10"></div>
  <?php endif ?>
    <div class="row">
      <div class="col-12 col-md-6 valign-center-md">
        <div class="spacer-h-20 spacer-h-md-40"></div>
        <div class="info__content">
          <?php if ($adv['text']): ?>
          <div class="text-left site-info">
          <?php if ($adv['text']): ?>
            <span class="site-info__tag new" <?php echo $tag_color? 'style="color:'.$tag_color.'"': ''; ?>><?php echo $adv['tag'] ?></span>
          <?php endif ?>
            <a title="Manchester" href="<?php echo esc_url($adv_link) ?>" class="site-info__text"><?php echo $adv['text'] ?></a>
          </div>
          <div class="spacer-h-20 spacer-h-lg-50"></div>
          <?php endif ?>

          <?php if ($category): ?>
            <p class="info__category"><?php echo $category ?></p>
          <?php endif ?>

          <h2 class="treatment__info-title"><?php echo $title; ?></h2>
          <div class="spacer-h-30"></div>
          <?php if ($about): ?>
            <p class="treatment__info-text"><?php echo $about; ?></p>
          <?php endif ?>
          <div class="spacer-h-lg-50"></div>
        </div>
         <?php if ($video_url): ?>
           <div class="spacer-h-20 spacer-h-md-100"></div>
         <?php else: ?>
           <div class="spacer-h-150 spacer-h-md-100"></div>
         <?php endif ?>
      </div>
      <div class="col-md-6 img">
        <?php if ($video_url): ?>
          <img src="<?php echo THEME_URL?>/assets/images/play-button.png" class=" trigger-video" onclick="play_video('<?php echo $video_url; ?>')" alt="">
          <div class="spacer-h-100 spacer-h-md-0"></div>
        <?php endif ?>

        <?php if ($image1): ?>
        <img src="<?php echo $image1; ?>" class="img  show-mobile" alt="">
        <?php endif ?>
      </div>
    </div>

    <div class="col-12 menu-holder">
      <ul>
        <li class="active"><a href="#overview">Overview</a></li>
        <li><a href="#beforeafter">Before + Afters</a></li>
        <li><a href="#pricing">Pricing</a></li>
        <?php if ($has_faq): ?>
        <li><a href="#f_a_q">F.A.Q.</a></li>
        <?php endif ?>
      </ul>


      <?php if ($form_id): ?>
      <a href="javascript:void(0)" class="book-btn book-btn_dark hide-mobile" onclick="show_popup('<?php echo $form_id ?>')">
        <img src="<?php echo THEME_URL ?>/assets/images/svg/ruh.svg" alt="">
        <span>Book</span>
      </a>
      <?php endif ?>
    </div>
  </div>
</div>