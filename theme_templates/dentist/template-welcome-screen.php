<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
?>

<style type="text/css">
    .carousel{
      <?php if ($bg_color): ?>
        background-color:<?php echo $bg_color; ?>;
      <?php endif ?>
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
      <div class="col-md-6 img valign-bottom">
        <img src="<?php echo $image; ?>" class="img  hide-mobile" alt="">
      </div>
    </div>

    <div class="col-12 menu-holder">
      <ul>
        <li class="active"><a href="#about">About <?php echo $name ?></a></li>
        <li><a href="#smile">Smile Stories</a></li>
        <li><a href="#insta">Instagram</a></li>
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