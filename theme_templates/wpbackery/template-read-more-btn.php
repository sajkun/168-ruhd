<a <?php foreach ($link_data as $key => $param):
if(!$param) continue;
printf('%s="%s"', $key, trim($param));
 endforeach; ?> class="discover-link"
 <?php if ($trigger_form): ?>
   onclick="show_popup('<?php echo $form_id; ?>')"
 <?php endif;
  if ($alternate_action == 'online_journey'): ?>
   onclick="show_online_visit()"
 <?php endif ?>

 ><?php echo $text; ?></a>