<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
?>
<?php if (wp_is_mobile()): ?>
<div class="clearfix mobile-menu-wrapper__row dark-bg">
  <a href="tel:<?php echo $phone?>" class="book-btn book-btn_border">
    <svg class="icon svg-icon-phone2"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-phone2"></use></svg>
    <span>Call Us</span>
  </a>

  <a href="javascript:void(0)" class="book-btn book-btn_border" onclick="Intercom('show')">
    <img src="<?php echo THEME_URL?>/assets/images/svg/chat.svg" alt="" class="chat-icon">
    <span> Live Chat </span>
    <span class="status online">Online</span>
  </a>
</div>
<?php endif ?>

<div class="container-xxl no-padding clinics-welcome-screen">
  <?php if ($video_url_bg && !wp_is_mobile()):
    $video_url_bg_ = explode('/', $video_url_bg);
    $id = $video_url_bg_[ count($video_url_bg_) - 1];
   ?>
    <div class="clinics-welcome-screen__overlay"></div>
    <div class="iframe-holder">
      <iframe allow="autoplay" allowautoplay frameborder="0" allowfullscreen id="bg-iframe" src="https://www.youtube.com/embed/<?php echo trim($id); ?>?enablejsapi=1&autoplay=1&loop=1&rel=0&controls=0&wmode=transparent&mute=1&playlist=<?php echo trim($id); ?>" ></iframe>
    </div>

    <script>
      jQuery(document).ready(function(){
        resize_iframe();
      })

      jQuery(window).resize(function(){
        resize_iframe();
      });

      function resize_iframe(){
        var window_width = jQuery(window).width();
        var window_height = jQuery(window).height();

        if((window_height/window_width).toFixed(2) > 0.56){
          jQuery('#bg-iframe').width(window_height / 0.56);
        }else{
          jQuery('#bg-iframe').height(window_width * 0.56);
        }
      }
    </script>
  <?php endif ?>
  <div class="carousel clinics no-bg">
    <div class="row">
      <div class="col-12 col-md-6 valign-center-md">
        <div class="spacer-h-30 spacer-h-md-150"></div>
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
        <img src="<?php echo THEME_URL?>/assets/images/play-button.png" class=" trigger-video" onclick="play_video('<?php echo $video_url; ?>', event)" alt="">
        <?php endif ?>
        <img src="<?php echo $image; ?>" class="img mobile-friendly" alt="">
      </div>
    </div>
    <div class="spacer-h-50 spacer-h-md-0"></div>

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