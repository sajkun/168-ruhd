<a <?php foreach ($link_data as $key => $param):
if(!$param) continue;
printf('%s="%s"', $key, trim($param));
 endforeach; ?> class="discover-link" <?php if ($trigger_form): ?>
   onclick="show_popup('<?php echo $form_id; ?>')"
 <?php endif ?>><?php echo $text; ?></a>