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
      background-size: 300px auto;

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
          <?php if ($adv['text']): ?>
          <div class="text-left site-info">
          <?php if ($adv['text']): ?>
            <span class="site-info__tag new" <?php echo $tag_color? 'style="color:'.$tag_color.'"': ''; ?>><?php echo $adv['tag'] ?></span>
          <?php endif ?>
            <a title="Manchester" href="<?php echo esc_url($adv_link) ?>" class="site-info__text"><?php echo $adv['text'] ?></a>
          </div>
          <div class="spacer-h-30 spacer-h-lg-50"></div>
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

         <div class="spacer-h-150 spacer-h-md-100"></div>
      </div>
      <div class="col-md-6 img">
        <img src="<?php echo $image1; ?>" class="img  show-mobile" alt="">
      </div>
    </div>

    <div class="col-12 menu-holder">
      <ul>
        <li class="active"><a href="#overview">Overview</a></li>
        <li><a href="#beforeafter">Before + Afters</a></li>
        <li><a href="#pricing">Pricing</a></li>
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