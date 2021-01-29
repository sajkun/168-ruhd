<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
?>

<div class="post-preview" <?php echo 'style="background-image:url('.$bg_img.')"'; ?>>

  <div class="post-preview__info">
    <p class="post-preview__category"><?php echo $category ?></p>

    <a href="<?php echo $permalink; ?>"  class="post-preview__title"><?php echo $title ?></a>


    <?php if ($video_url): ?>
     <a href="javascript:void(0)" class=" trigger-video-link" onclick="play_video('<?php echo $video_url; ?>', event)" alt="">
        Play Video
     </a>

     <a href="<?php echo $permalink; ?>" class="post-preview__read">Learn more about <?php echo $name? $name.'’s ' : '' ?>smile makeover</a>
    <?php endif ?>
  </div>
</div>