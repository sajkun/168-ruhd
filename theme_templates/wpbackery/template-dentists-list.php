<?php
if ( ! defined( 'ABSPATH' ) ) {
  die( '-1' );
}
?>


<?php if ($team['dentists'] && count($team['dentists']) > 0): ?>
<div class="page-item" id="dentists" data-display="block">
  <div class="row no-gutters">
    <?php foreach ($team['dentists'] as $sp):?>
     <div class="col-12 col-md-6 col-lg-4 col-xl-3 team-member">
      <a href="<?php echo $sp['url'] ?>">
       <img src="<?php echo $sp['photo'] ?>" alt="">
       <div class="team-member__overlay">
         <p class="name"><?php echo $sp['name'] ?></p>
         <p class="grades"><?php echo $sp['grades'] ?></p>
         <p class="spesilization"><?php echo $sp['spesilization'] ?></p>
       </div>
      </a>
     </div>
    <?php endforeach ?>
  </div>
</div>
<?php endif ?>
<?php if ($team['care-team'] && count($team['care-team']) > 0): ?>
<div class="page-item" id="care_team" data-display="none">
  <div class="row no-gutters">
    <?php foreach ($team['care-team'] as $sp):?>
     <div class="col-12 col-md-6 col-lg-4 col-xl-3 team-member">
      <a href="<?php echo $sp['url'] ?>">
       <img src="<?php echo $sp['photo'] ?>" alt="">
       <div class="team-member__overlay">
         <p class="name"><?php echo $sp['name'] ?></p>
         <p class="grades"><?php echo $sp['grades'] ?></p>
         <p class="spesilization"><?php echo $sp['spesilization'] ?></p>
       </div>
      </a>
     </div>
    <?php endforeach ?>
  </div>
</div>
<?php endif ?>
<?php if ($team['managment'] && count($team['managment']) > 0): ?>
<div class="page-item" id="managment" data-display="none">
  <div class="row no-gutters">
    <?php foreach ($team['managment'] as $sp):?>
     <div class="col-12 col-md-6 col-lg-4 col-xl-3 team-member">
      <a href="<?php echo $sp['url'] ?>">
       <img src="<?php echo $sp['photo'] ?>" alt="">
       <div class="team-member__overlay">
         <p class="name"><?php echo $sp['name'] ?></p>
         <p class="grades"><?php echo $sp['grades'] ?></p>
         <p class="spesilization"><?php echo $sp['spesilization'] ?></p>
       </div>
      </a>
     </div>
    <?php endforeach ?>
  </div>
</div>
<?php endif ?>