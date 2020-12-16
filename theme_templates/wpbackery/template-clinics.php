<div class="container">
  <div class="row padding-8 no-gutters-mob treatments-target">
    <div class="col-md-6">
      <a href="<?php echo get_permalink($items[0]) ?>" class="treatment-preview treatment-preview_lg">

        <div class="treatment-preview__overlay" <?php echo $items[0]->images["lg"]? 'style="background-image: url('.$items[0]->images["lg"].') "' : '' ; ?>></div>
        <?php if ($items[0]->term): ?>
        <span class="treatment-preview__category"><?php echo $items[0]->term;  ?></span>
        <?php endif ?>

        <div class="treatment-preview__info">
          <h3 class="treatment-preview__title"><?php echo $items[0]->post_title;  ?></h3>
          <?php if ($items[0]->text): ?>
             <p class="treatment-preview__text">
            <span> <?php echo $items[0]->text; ?> <svg class="svg-icon-arrow-w"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-arrow-w"></use></svg></span>
          <?php endif ?>
        </div>
      </a><!-- treatment-preview  -->
    </div><!-- col-md-6 -->

    <div class="col-md-6">

      <?php for($i=1; $i < 3; $i++):
          if(!isset($items[$i])){continue;}
       ?>
     <a href="<?php echo get_permalink($items[$i]) ?>" class="treatment-preview">
      <div class="treatment-preview__overlay" <?php echo $items[$i]->images["sm"]? 'style="background-image: url('.$items[$i]->images["sm"].') "' : '' ; ?>></div>
        <?php if ($items[$i]->term): ?>
        <span class="treatment-preview__category"><?php echo $items[$i]->term;  ?></span>
        <?php endif ?>
        <div class="treatment-preview__info">
          <h3 class="treatment-preview__title"><?php echo $items[$i]->post_title;  ?></h3>
          <?php if ($items[$i]->text): ?>
             <p class="treatment-preview__text">
            <span> <?php echo $items[$i]->text; ?> <svg class="svg-icon-arrow-w"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-arrow-w"></use></svg></span>
          <?php endif ?>
          </p>
        </div>
      </a><!-- treatment-preview  -->
      <?php endfor; ?>
    </div><!-- col-md-6 -->
  </div><!-- row -->
</div>