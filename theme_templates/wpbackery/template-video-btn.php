<a href="javascript:void(0)"
<?php /* foreach ($link_data as $key => $param):
  if(!$param) continue;
  printf('%s="%s"', $key, trim($param));
 endforeach; */
 ?>
class="video-link"
<?php if ($link_data['href']): ?>
    onclick="play_video('<?php echo $link_data['href'];?>')"
<?php endif ?>

><?php echo $text; ?></a>