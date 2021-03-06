 <?php

if ( ! defined( 'ABSPATH' ) ) {
  die( '-1' );
}
?>
<div class="hero-container">
  <div class='post-wrapper'>
    <div class="owl-carousel">
      <?php foreach ($stories as $key => $post):
        print_theme_template_part('post-preview-img', 'globals', $post);
       ?>
      <?php endforeach ?>
    </div>
  </div>
  <div class="overlay"></div>

  <div class="hero-container__content clinics full-height-vh">
    <div class="container-lg">
      <div class="row">
        <div class="  valign-center-lg <?php if (!$video_url): ?> offset-md-2 col-md-8 <?php else: ?> col-md-6 <?php endif ?>">
          <div class="spacer-h-50 spacer-h-lg-100"></div>
          <div class="spacer-h-lg-70"></div>
          <div class="info__content text-center text-left-md">

            <div class="site-info"
            <?php if ($action_type == 'trigger'): ?>
               onclick="show_popup('<?php echo $form_id; ?>')"
            <?php endif ?>
             >
             <span class="site-info__tag new"><?php echo $tag_text; ?></span>
                <a
                <?php if ($action_type == 'trigger'): ?>
                   href="javascript:void(0)"
                  <?php else: ?>
                   href="<?php echo $adv_url; ?>"
                  <?php endif ?>
                   class="site-info__text light">
                  <?php echo $advertisement; ?>
                </a>
            </div>
            <div class="spacer-h-30 spacer-h-md-40"></div>
            <?php if ($before_title): ?>
            <p class="info__category"><?php echo $before_title; ?></p>
            <?php endif ?>
            <?php if ($title): ?>
            <h2 class="info__title"><?php echo $title; ?></h2>
            <?php endif ?>
            <?php if ($text): ?>
            <p class="info__text"><?php echo $text; ?></p>
            <?php endif ?>
            <div class="spacer-h-50 spacer-h-lg-100"></div>
          </div>
        </div>

        <?php if ($video_url): ?>
        <div class="col-md-6 valign-center-lg">
          <div class="spacer-h-0  spacer-h-md-20"></div>
          <img src="<?php echo THEME_URL; ?>/assets/images/play-button.png" class=" trigger-video" onclick="play_video('<?php echo $video_url; ?>', event)" alt="">
          <div class="spacer-h-150 spacer-h-md-20"></div>
        </div>
        <?php endif ?>
      </div>
    </div>
  </div>
</div>
