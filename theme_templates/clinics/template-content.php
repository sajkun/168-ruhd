<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

?>

<div class="spacer-h-50"></div>
<section class="tab-target">

  <div class="container">
    <div class="page-item" id="hours" <?php echo 'style="display:block"' ?>>
      <div class="row">
        <div class="col-lg-7 col-md-8">
         <div class="regular-text colored">
           <?php the_content(); ?>
         </div>


        <?php if ($bus_routes): ?>
         <div class="transport-data">
            <svg class="icon svg-icon-bus-rout"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-bus-rout"></use></svg>
            <span class="transport-data__title">Bus Routes</span>
            <span class="transport-data__text"><?php echo $bus_routes; ?></span>
         </div>
        <?php endif ?>

        <?php if ($trains): ?>
         <div class="transport-data">
            <svg class="icon svg-icon-train"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-train"></use></svg>

            <span class="transport-data__title">Train & Tube Stations</span>
            <span class="transport-data__text"><?php echo $trains;?></span>
         </div>
        <?php endif ?>

        <?php if ($parking): ?>
         <div class="transport-data">
            <svg class="icon svg-icon-parking"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-parking"></use></svg>
            <span class="transport-data__title">Car Parking</span>
            <span class="transport-data__text"><?php echo $parking;?></span>
         </div>
        <?php endif ?>


        </div><!-- col-md-7 -->
        <div class="col-md-4 offset-lg-1">
         <div class="regular-text colored">
           <h3>Opening Hours</h3>

         <?php if ($open_hours): ?>
          <table class="working-hours">
           <?php foreach ($open_hours as $data): ?>
              <tr>
                <td>
                  <?php echo $data['label'] ?>
                </td>
                <td>
                  <?php echo $data['is_a_working_day'] ? $data['open']. ' - ' . $data['close'] : 'Closed' ; ?>
                </td>
              </tr>
           <?php endforeach ?>
          </table>
           <?php endif ?>
         </div>
        </div>
      </div><!-- row -->
    </div>

    <div class="page-item" id="gallery" <?php echo 'style="display:block"' ;?> >

      <div class="masonry-gallery">
        <?php
        $counter = 0;
        $sizes = array(
          'size1',
          'size2',
          'size3',
          'size1',
          'size2',
          'size1',
          'size3',
          'size2',
        );
         foreach ($image_ids as $img_id):
          $img = wp_get_attachment_image_url($img_id,  $sizes[$counter]);

          printf('<div class="grid-item"><img src="%s" alt="" class="%s"></div>', $img, $sizes[$counter]);
          ?>

        <?php
        $counter++;
        $counter = $counter < 8?:0;
         endforeach ?>
      </div>
    </div>
     <div class="spacer-h-40"></div>
  </div>
</section>
<div class="spacer-h-30 spacer-h-lg-60"></div>