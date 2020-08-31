<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
?>

<footer class="site-footer">
  <div class="clinics">
    <div class="container">
      <div class="row no-gutters">
        <?php foreach ($clinics as $key => $clinic):
          $c = (array)$clinic;
          ?>

        <div class="col-sm-6 col-md-4">
          <div class="clinics-item">
            <p class="clinics-item__city"><?php echo $c['city'] ?></p>
            <img src="<?php echo THEME_URL ?>/assets/images/svg/logo-contrast.svg" alt="">
            <h5 class="clinics-item__title"><?php echo $c['post_title'] ?></h5>
            <address class="clinics-item__address"><?php echo $c['address'] ?></address>

            <?php if ($c['email'] ): ?>
            <a href="mailto:<?php echo $c['email'] ?>" class="clinics-item__email"><?php echo $c['email'] ?></a>
            <?php endif ?>
            <?php if ($c['phone'] ): ?>
            <a href="tel:<?php
                echo strpos( $c['phone'] , '+' ) !== false ? '+' : '';
                echo preg_replace('/\\D/', '' , $c['phone'] );
            ?>" class="clinics-item__tel"><?php echo $c['phone'] ?></a>
            <?php endif ?>
          </div>
        </div>
        <?php endforeach ?>
      </div><!-- row -->
    </div><!-- container -->
  </div><!-- clinics -->

   <div class="spacer-h-30 spacer-h-lg-50"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <p class="cta-text"><?php echo $cta_text; ?></p>
      <div class="spacer-h-lg-30"></div>
    </div>
      <div class="col-md-6 text-right-md">
        <a href="javascript:void(0)" class="book-btn" onclick="show_popup('<?php echo $form_id ?>')">
          <img src="<?php echo THEME_URL ?>/assets/images/svg/ruh.svg" alt="">
          <span>Book</span>
        </a>

        <?php if ($show_intercom): ?>
          <a href="javascript:void(0)" class="live-chat" onclick="Intercom('show')">
            <span class="live-chat__icon">
              <span class="span"></span>
            </span>
            <span class="live-chat__text">Live Chat</span>
          </a>
        <?php endif ?>
      <div class="spacer-h-md-30"></div>
    </div>
    </div>
  </div>
  <div class="spacer-h-30"></div>

  <?php if ($footer_partners): ?>
  <div class="container">
    <div class="row justify-content-between">
        <?php foreach ($footer_partners as $key => $url): ?>
           <a href="javascript:void(0)" class="parner-link"><img src="<?php echo $url ?>" alt=""></a>
        <?php endforeach ?>
    </div>
  </div>
  <div class="spacer-h-30 spacer-h-lg-70"></div>
  <?php endif ?>

  <div class="container">
    <div class="row">

    <?php if (is_active_sidebar('footer_1')):?>
      <div class="col-lg-6  text-center  text-left-md">
        <nav class="footer-menu two-columns">
            <?php dynamic_sidebar( 'footer_1' ); ?>
        </nav>
      </div>
     <?php endif ?>
        <?php for ($i = 2 ; $i <= 3; $i++):
          if (is_active_sidebar( 'treatment_'.$i)) {
            echo '<div class="col-md-6 col-lg-3 text-center  text-left-md">';
              dynamic_sidebar( 'footer_'.$i );
            echo '</div><div class="spacer-h-40"></div>';
          }
        endfor;
        ?>
    </div><!-- row -->
  </div><!-- container -->

  <div class="spacer-h-lg-20"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-6 text-center text-left-md">
        <span class="copyrights"><?php echo $copyrights; ?></span>
      </div>
      <div class="col-md-6 text-center text-right-md">
        <a href="<?php echo HOME_URL; ?>"><img src="<?php echo THEME_URL ?>/assets/images/svg/logo-contrast.svg" alt=""></a>
      </div>
    </div>
  </div><!-- container -->
  <div class="spacer-h-150 spacer-h-md-60"></div>
</footer>