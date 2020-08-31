<a <?php foreach ($link_data as $key => $param):
if(!$param) continue;
printf('%s="%s"', $key, trim($param));
 endforeach; ?>

class="video-link"><?php echo $text; ?></a>