<div class="accordeon__item  <?php echo $expand? 'expanded': ''; ?>">
  <h3 class="accordeon__item-title"><?php echo $title ?><span class="accordeon__item-trigger"></span></h3>
  <p class="accordeon__item-text" <?php echo $expand? 'style="display:block"' : ''; ?>><?php echo $text ?></p>
</div>