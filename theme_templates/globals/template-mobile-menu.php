<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
?>

<div class="mobile-menu-wrapper">
  <div class="clearfix mobile-menu-wrapper__row">
    <i class="close-mobile-menu">×</i>
    <img src="<?php echo THEME_URL ?>/assets/images/svg/logo-contrast.svg" alt="" class="contrast">
  </div>
  <div class="spacer-h-20"></div>

  <div class="clearfix mobile-menu-wrapper__row">
    <?php if ($phone): ?>
      <a href="tel:<?php echo $phone;?>" class="book-btn book-btn_border">
        <svg class="icon svg-icon-phone2"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-phone2"></use></svg>
        <span>Call Us</span>
      </a>
    <?php endif ?>

      <a href="javascript:void(0)" class="book-btn book-btn_border " onclick="Intercom('show')">
        <img src="<?php echo THEME_URL ?>/assets/images/svg/chat.svg" alt="" class="chat-icon">
        <span> Live Chat </span>
      </a>
  </div>
  <div class="spacer-h-20"></div>

  <div class="scroll-menues">
    <?php echo $main_menu ?>
    <div class="mobile-menu__title">OUR CLINICS</div>
    <div class="spacer-h-20"></div>
    <?php echo $clinics_menu ?>
  </div>

</div>