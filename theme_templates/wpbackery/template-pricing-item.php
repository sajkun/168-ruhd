<?php

if ( ! defined( 'ABSPATH' ) ) {
  die( '-1' );
}
?>
<div class="col-md-6">
  <div class="row line-item no-gutters full-height">
    <div class="col-8 col-lg-6">
      <span class="pricing-item__title"><?php echo $title; ?> </span>
      <span class="pricing-item__text"><?php echo $description; ?> </span>
    </div>
    <?php if ($price): ?>
    <div class="col-lg-6 col-4 text-right valign-center valign-top-lg">
     <?php echo $price_comment; ?>  £<span class="pricing-item__val"><?php echo $price; ?><span></span></span></div>
    <?php endif ?>
  </div>
</div>