<?php
if ( ! defined( 'ABSPATH' ) ) {
  die( '-1' );
}
?>


<?php
$display = 'block';
foreach ($team as $key => $list): ?>

<div class="page-item" id="<?php echo $key ?>" data-display="<?php echo $display; ?>">
  <div class="row no-gutters">
    <?php foreach ($list as $sp): if(!$sp['photo'] ) continue;?>
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
<?php
$display = 'none';
endforeach; ?>
