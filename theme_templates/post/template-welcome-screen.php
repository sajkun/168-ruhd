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
         <div class="spacer-h-0 spacer-h-md-100"></div>
      </div>
      <div class="col-md-6 img">
        <?php if ($video_url): ?>
         <img src="<?php echo THEME_URL?>/assets/images/play-button.png" class=" trigger-video" onclick="play_video('<?php echo $video_url; ?>',event)" alt="">
        <?php endif ?>
        <img src="<?php echo $image_mobile; ?>" class="img  show-mobile" alt="">
      </div>
    </div>

    <div class="menu-holder hide-mobile">
      <div class="row">
        <div class="col-lg-3">
          <div class="cta-rate">
            <?php if ($feed_name): ?>

            <span class="cta-rate__title">Smile like <?php echo $feed_name ?></span>
            <?php endif ?>
            <div class="cta-rate__stars">
              <?php for ($i=0; $i < $feed_stars; $i++) { ?>
                <img src="<?php echo THEME_URL ?>/assets/images/star.jpg" alt="">
              <?php } ?>
              <?php if ($feed_rate_desc ): ?>
                <span class="cta-rate__text">
                  <?php echo $feed_rate_desc; ?>
                </span>
              <?php endif ?>
            </div>
          </div>
        </div>

        <?php if ($form_id): ?>
        <a href="javascript:void(0)" class="book-btn book-btn_dark hide-mobile" onclick="show_popup('<?php echo $form_id ?>')">
          <img src="<?php echo THEME_URL ?>/assets/images/svg/ruh.svg" alt="">
          <span>Start Free</span>
        </a>
        <?php endif ?>
      </div>
    </div>
  </div>
</div>