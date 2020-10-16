<?php

if ( ! defined( 'ABSPATH' ) ) {
  die( '-1' );
}
?>

<div class="page-item" id="london_price" data-display="block">

  <div class="row">
    <div class="col-lg-7">
      <span class="table-title">Consultations</span>
    </div>

    <div class="col-lg-5 text-right  hide-mobile">
      <span class="table-comment">Prices from £</span>
    </div>
  </div>
  <div class="spacer-h-30"></div>
  <?php foreach ($treatments['Consultations'] as $t):
    if(!isset($t['pricing']['London']) ) {continue;}
    ?>
    <div class="row line-item">
      <div class="col-lg-6">
        <span class="pricing-item__title"><?php echo $t['name']; ?>

        </span>
        <span class="pricing-item__text">
          <?php echo isset($t['pricing']['London'])? $t['pricing']['London'][0]['description']: ''; ?>
        </span>

      </div>
      <div class="col-lg-6 text-right-lg">
        <?php
        if (isset($t['pricing']['London'])) {
          $price = PHP_INT_MAX;

          foreach ($t['pricing']['London'] as $p) {
            $price = min($price, (int)$p['starting_price']);
          }

          echo "<span class=\"pricing-item__val\">£{$price}<span>";
        }
         ?>
      </div>
    </div>

  <?php endforeach ?>

  <div class="spacer-h-30"></div>

  <div class="row">
    <div class="col-lg-7">
      <span class="table-title">Treatments</span>
    </div>
  </div>
  <div class="spacer-h-30"></div>
  <?php foreach ($treatments['Treatments'] as $t):
    if (!isset($t['pricing']['London'])){continue;}
    ?>
    <div class="row line-item">
      <div class="col-lg-6">
        <span class="pricing-item__title"><?php echo $t['name']; ?>

        </span>
        <span class="pricing-item__text">
          <?php echo isset($t['pricing']['London'])? $t['pricing']['London'][0]['description']: ''; ?>
        </span>

      </div>
      <div class="col-lg-6 text-right-lg">
        <?php
        if (isset($t['pricing']['London'])) {
          $price = PHP_INT_MAX;

          foreach ($t['pricing']['London'] as $p) {
            $price = min($price, (int)$p['starting_price']);
          }

          echo "£<span class=\"pricing-item__val\">{$price}<span>";
        }
         ?>
      </div>
    </div>

  <?php endforeach ?>
</div>

<div class="page-item" id="manchester_price" data-display="none">
  <div class="row">
    <div class="col-lg-7">
      <span class="table-title">Consultations</span>
    </div>

    <div class="col-lg-5 text-right  hide-mobile">
      <span class="table-comment">Prices from £</span>
    </div>
  </div>
  <div class="spacer-h-30"></div>
  <?php foreach ($treatments['Consultations'] as $t):
    if (!isset($t['pricing']['Manchester'])){continue;}
   ?>
    <div class="row line-item">
      <div class="col-lg-6">
        <span class="pricing-item__title"><?php echo $t['name']; ?>

        </span>
        <span class="pricing-item__text">
          <?php echo isset($t['pricing']['Manchester'])? $t['pricing']['Manchester'][0]['description']: ''; ?>
        </span>

      </div>
      <div class="col-lg-6 text-right-lg">
        <?php
        if (isset($t['pricing']['Manchester'])) {
          $price = PHP_INT_MAX;

          foreach ($t['pricing']['Manchester'] as $p) {
            $price = min($price, (int)$p['starting_price']);
          }

          echo "<span class=\"pricing-item__val\">£{$price}<span>";
        }
         ?>
      </div>
    </div>

  <?php endforeach ?>
  <div class="spacer-h-30"></div>
  <div class="row">
    <div class="col-lg-7">
      <span class="table-title">Treatments</span>
    </div>
  </div>
  <div class="spacer-h-30"></div>
  <?php foreach ($treatments['Treatments'] as $t):
    if (!isset($t['pricing']['Manchester'])){continue;}
    ?>
    <div class="row">
      <div class="col-lg-6">
        <span class="pricing-item__title"><?php echo $t['name']; ?>

        </span>
        <span class="pricing-item__text">
          <?php echo isset($t['pricing']['Manchester'])? $t['pricing']['Manchester'][0]['description']: ''; ?>
        </span>

      </div>
      <div class="col-lg-6 text-right-lg">
        <?php
        if (isset($t['pricing']['Manchester'])) {
          $price = PHP_INT_MAX;

          foreach ($t['pricing']['Manchester'] as $p) {
            $price = min($price, (int)$p['starting_price']);
          }

          echo "£<span class=\"pricing-item__val\">{$price}<span>";
        }
         ?>
      </div>
    </div>

  <?php endforeach ?>
</div>