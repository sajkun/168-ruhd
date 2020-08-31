<?php

if ( ! defined( 'ABSPATH' ) ) {
  die( '-1' );
}
?>

<div class="text-center site-info">
  <span class="site-info__tag new" <?php echo $background ? 'style="background-color:'.$background.'"' : ''; ?>><?php echo $label; ?></span>
  <a <?php foreach ($link_data as $attr => $val): printf('%s="%s"', $attr, trim($val)); endforeach; ?>
     class="site-info__text"><?php echo $text; ?></a>
</div>