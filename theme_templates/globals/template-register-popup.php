<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
?>
<div class="popup" id="<?php echo $form_id ?>">
  <div class="popup-inner">
    <div class="popup-header">
      <img src="<?php echo THEME_URL?>/assets/images/svg/ruh.svg" alt="">
        <span>  Visit</span>
      <i class="icon-close">×</i>
    </div>
    <div class="spacer-h-20"></div>
    <h3><?php echo $title ?></h3>
    <span class=""><?php echo $comment ?></span>
     <div class="spacer-h-20"></div>
    <?php echo $output; ?>
  </div>
</div>