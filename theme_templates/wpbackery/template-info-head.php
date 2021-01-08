<?php

if ( ! defined( 'ABSPATH' ) ) {
  die( '-1' );
}
?>

<div class="text-center site-info" onclick="show_popup('<?php echo $form_id; ?>')">
  <span class="site-info__tag new" <?php echo $background ? 'style="background-color:'.$background.'"' : ''; ?>><?php echo $label; ?></span>
  <?php /* <a <?php foreach ($link_data as $attr => $val): printf('%s="%s"', $attr, trim($val)); endforeach; ?> */ ?>
  <span
     class="site-info__text"><?php echo $text; ?></span>
</div>