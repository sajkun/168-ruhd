<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
?>
<div class="story-preview" <?php echo 'style="background-image: url('.$bg_img.')"' ?>>
  <?php if ($video_url): ?>
   <img src="<?php echo THEME_URL?>/assets/images/play-button.png" class=" trigger-video" onclick="play_video('<?php echo $video_url; ?>')" alt="">
  <?php endif ?>
  <div class="story-preview__info">
    <a href="<?php echo $url ?>"  class="story-preview__title"><?php echo $title; ?></a>
    <p class="story-preview__category"><?php echo $category; ?></p>
     <a href="<?php echo $url ?>" class="story-preview__read">→</a>
      </div>
</div>
