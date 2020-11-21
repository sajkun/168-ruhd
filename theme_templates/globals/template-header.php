<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}


?>

<header class="site-header <?php echo $contrast? 'contrast-header': ''; ?> <?php echo $contrast2? 'contrast': ''; ?>">
  <div class="site-header__top hide-tablet">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="row no-gutters">
            <a href="tel:+44 (0)20 3904 7655" class="call-link">
              <svg class="svg-icon-call"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-call"></use></svg>
              <span>+44 (0)20 3904 7655</span>
            </a>

            <?php if ($show_intercom): ?>
              <a href="javascript:void(0)" class="chat-button" onclick="Intercom('show')">
                <i class="icon-activity active"></i>
                <span> Live Chat </span>
              </a>
            <?php endif ?>
          </div>
        </div><!-- col-lg-6 -->

        <div class="col-lg-6 text-right-lg">
          <?php if ($clinics_menu): ?>
           <p class="menu-label">Our Clinics</p>
           <?php echo  $clinics_menu; ?>
          <?php endif ?>
        </div><!-- col-lg-6 -->
      </div><!-- row -->
    </div><!-- container -->
  </div><!-- site-header__top -->

  <div class="site-header__main">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">

          <div class="mobile-menu-toggle"><span></span></div>

          <a href="<?php echo HOME_URL; ?>" class="logo">
            <img src="<?php echo THEME_URL ?>/assets/images/svg/logo.svg" alt="" class="regular">
            <img src="<?php echo THEME_URL ?>/assets/images/svg/logo-contrast.svg" alt="" class="contrast">
          </a>

          <span class="dropdown-trigger">Treatments </span>
        </div>

        <div class="col-lg-6 text-right-lg hide-tablet">
          <?php echo  $main_menu; ?>


          <?php if ($show_intercom): ?>
          <a href="javascript:void(0)" class="chat-btn" onclick="Intercom('show')">
            <span class="live-chat__icon">
              <span class="span"></span>
            </span>
            <span class="live-chat__text">Live Chat</span>
          </a>
          <?php endif ?>
        </div>

      </div><!-- row -->
    </div><!-- container -->
  </div><!-- site-header__main -->

  <nav class="site-navigation">
    <div class="container">
      <div class="row justify-content-between">
        <?php for ($i = 1 ; $i <= 5; $i++):
          if (is_active_sidebar( 'treatment_'.$i)) {
            echo '<nav class="treatments-menu">';
              dynamic_sidebar( 'treatment_'.$i );
            echo '</nav>';
          }
        endfor;
        ?>
      </div>
    </div>
  </nav>
</header>
