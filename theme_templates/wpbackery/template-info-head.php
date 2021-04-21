<?php

if ( ! defined( 'ABSPATH' ) ) {
  die( '-1' );
}
?>

<div class="text-center site-info"

<?php if ($action_type == 'trigger'): ?>
onclick="show_popup('<?php echo $form_id; ?>')"
<?php endif ?>
>
  <span class="site-info__tag new" <?php echo $background ? 'style="background-color:'.$background.'"' : ''; ?>><?php echo $label; ?></span>
  <?php if ($action_type == 'link'): ?>
    <a <?php foreach ($link_data as $attr => $val): printf('%s="%s"', $attr, trim($val)); endforeach; ?>
  <?php else: ?>
    <span
  <?php endif; ?>
     class="site-info__text"><?php echo $text; ?>
  <?php if ($action_type == 'link'): ?>
    </a>
  <?php else: ?>
    </span>
  <?php endif; ?>
</div>