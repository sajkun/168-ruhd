<?php
if(!is_user_logged_in() || !$show){
  return;
}
?>

<div class="online-visit-popup contrast visuallyhidden" id="online-visit" v-show="show">

  <!-- ****************************************** -->
  <!-- ****************************************** -->
  <!-- ****************************************** -->
  <!-- desktop window -->
  <!-- ****************************************** -->
  <!-- ****************************************** -->
  <main class="site-inner site-inner__fullheight online-visit hide-mobile" >

    <transition
      class="container"
      name="welcome-screen"
      tag="div"
      v-bind:css="false"
      v-on:before-enter="beforeEnter"
      v-on:enter="enter_opacity"
      v-on:leave="leave_opacity"
      v-on:after-enter="enterAfter"
      v-on:after-leave="leaveAfter"
    >

    <div v-if="!is_loaded">
      <div class="header-spacer"></div>
      <div class="row">
        <div class="col-12 valign-center  text-center">
          <div class="online-visit__preview">
            <div class="spacer-h-150"></div>
            <div class="text-center">
              <img src="<?php echo THEME_URL;?>/assets/images/svg/ruh.svg" alt="" class="online-visit__preview-logo">
              <span class="icon-plus">+</span>
            </div>
            <div class="spacer-h-30"></div>
            <p class="online-visit__preview-title">GATHERING TREATMENTS</p>
            <p class="online-visit__preview-text">You’re one step closer to your dream smile.</p>
            <div class="spacer-h-25"></div>
            <div class="online-visit__preview-spinner"><img src="<?php echo THEME_URL;?>/assets/images/oval.png" alt=""></div>

            <div class="spacer-h-150"></div>
          </div><!-- online-visit__preview -->
          <div class="spacer-h-30"></div>
          <span class="online-visit__preview-text">If you’re not redirected in 5 seconds, <a href="#" v-on:click.prevent ="is_loaded = 1">click here</a></span>
          <div class="spacer-h-100"></div>
        </div>
      </div><!-- row -->
    </div>

    </transition>

    <transition
      class="container"
      name="visit-steps"
      tag="div"
      v-bind:css="false"
      v-on:before-enter="beforeEnter"
      v-on:enter="enter_opacity"
      v-on:leave="leave_opacity"
      v-on:after-enter="enterAfter"
      v-on:after-leave="leaveAfter"
    >
      <div class="online-visit__steps" v-if="is_loaded && !is_completed">
        <div class="container">
          <div class="row">
            <div class="col-6">
              <div class="header-spacer"></div>
              <div class="text-left">
               <img src="<?php echo THEME_URL;?>/assets/images/svg/ruh.svg" alt="" class="online-visit__preview-logo">
                <span class="icon-plus">+</span>
              </div><!-- text-left -->
              <div class="spacer-h-50"></div>
              <h2 class="online-visit__steps-title">Let’s start</h2>
              <p class="online-visit__preview-text">Get a 95% accurate quote from one of our treatment co-ordinators in 48 hours.</p>

              <div class="spacer-h-30"></div>
              <p class="online-visit__preview-title">HOW DOES IT WORK?</p>

              <div class="spacer-h-25"></div>


              <div class="online-visit__steps-item" :class="{'active':( step > 2)}">
                <span class="online-visit__steps-icon">
                  <svg class="icon svg-icon-smile"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-smile"></use></svg>
                </span>

                <span class="text">Select your smile goals so we can tailor your treatment plan just for you</span>
              </div>
              <div class="spacer-h-15"></div>

              <div class="online-visit__steps-item" :class="{'active':( step > 3)}">
                <span class="online-visit__steps-icon">
                  <svg class="icon svg-icon-photo"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-photo"></use></svg>
                </span>

                <span class="text">Upload a photo of your smile so we can provide an accurate assessment</span>
              </div>
              <div class="spacer-h-15"></div>

              <div class="online-visit__steps-item" :class="{'active':( step === 4 && customer_data.confidence && customer_data.had_cosmetic && customer_data.checkup && customer_data.how_ever )}">
                <span class="online-visit__steps-icon">
                  <svg class="icon svg-icon-scroll"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-scroll"></use></svg>
                </span>

                <span class="text">Finish up with some dental history and preferences.</span>
              </div>
              <div class="spacer-h-100"></div>
            </div><!-- col-6 -->
          </div><!-- row fullheight -->
        </div><!-- container fullheight -->
      </div><!-- online-visit__steps -->
    </transition>

    <transition
      class="container"
      name="visit-steps"
      tag="div"
      v-bind:css="false"
      v-on:before-enter="beforeEnter"
      v-on:enter="enter_opacity"
      v-on:leave="leave_opacity"
      v-on:after-enter="enterAfter"
      v-on:after-leave="leaveAfter"
    >
      <div class="online-visit__steps" v-if="is_completed">
        <div class="container">
          <div class="row">
            <div class="col-12 text-center">
              <div class="header-spacer"></div>
              <div class="text-left">
               <img src="<?php echo THEME_URL;?>/assets/images/svg/ruh.svg" alt="" class="online-visit__preview-logo">
                <span class="icon-plus">+</span>
              </div><!-- text-left -->
              <div class="spacer-h-50"></div>
              <h2 class="online-visit__steps-title">{{customer_data.first_name}}, <br> you’re a star</h2>
              <p class="online-visit__preview-text">Your details have been sent to our clinical team who will prepare your provisional treatment plan.</p>

              <div class="spacer-h-30"></div>
              <p class="online-visit__preview-title">WHAT HAPPENS NEXT?</p>

              <div class="spacer-h-25"></div>


              <div class="online-visit__steps-item text-left align-center">
                <span class="online-visit__steps-icon">
                  <svg class="icon svg-icon-hours"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-hours"></use></svg>
                </span>

                <span class="text">You will be contacted in the next 48 hours to arrange a digital consultation and report of your options.</span>
              </div>
              <div class="spacer-h-15"></div>

              <div class="online-visit__steps-item text-left align-center">
                <span class="online-visit__steps-icon">
                  <svg class="icon svg-icon-calendar"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-calendar"></use></svg>
                </span>

                <span class="text">You can choose to arrange a telephone or video dental consultation.</span>
              </div>
              <div class="spacer-h-100"></div>
            </div><!-- col-6 -->
          </div><!-- row fullheight -->
        </div><!-- container fullheight -->
      </div><!-- online-visit__steps -->
    </transition>
  </main><!-- site-inner -->

  <div class="steps-right-sidebar hide-mobile" :class="{shown: show_sidebar}" >
    <div class="right-sidebar__inner">
      <div class="header-spacer"></div>
      <div class="clearfix">

        <i class="back"  v-if="step > 1" v-on:click="change_step('prev')">
           <svg class="icon svg-icon-bracket"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-bracket"></use></svg>
           Back
        </i>

        <i class="icon-close"><svg class="icon svg-icon-close" v-on:click="show = 0"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-close"></use></svg></i>
      </div>

      <div class="text-left visuallyhidden">
        <img src="<?php echo THEME_URL;?>/assets/images/svg/ruh.svg" alt="" class="online-visit__preview-logo">
        <span class="icon-plus">+</span>
      </div><!-- text-left -->
      <div class="spacer-h-40"></div>

      <form action="" autocomplete="off">
        <transition
          class="container"
          name="visit-steps"
          tag="div"
          v-bind:css="false"
          v-on:before-enter="beforeEnter"
          v-on:enter="enter_height"
          v-on:leave="leave_height"
          v-on:after-enter="enterAfter"
          v-on:after-leave="leaveAfter"
        >
          <div class="right-sidebar__page" v-if="step == 1">
            <h2 class="right-sidebar__title">Start your smile journey</h2>
            <p class="right-sidebar__text">Your perfect smile, made for you. It only takes 5 minutes to complete.</p>
            <div class="spacer-h-35"></div>

            <div class="row gutters-5">
              <div class="col-6">
                <input type="text" class="right-sidebar__field" ref="first_name" autocomplete="off" placeholder="First name" v-model="customer_data.first_name" :class="{error: (!validation.first_name)}">
              </div>
              <div class="col-6">
                <input type="text" class="right-sidebar__field" ref="last_name" autocomplete="off" placeholder="Last name" v-model="customer_data.last_name" :class="{error: (!validation.last_name)}">
              </div>
            </div><!-- row -->
            <div class="spacer-h-15"></div>

            <div class="row">
              <div class="col-12">
                <input type="email" class="right-sidebar__field" ref="email" autocomplete="off" placeholder="Email" v-model="customer_data.email" :class="{error: (!validation.email)}">
              </div>
            </div><!-- row -->

            <div class="spacer-h-15"></div>

            <div class="row">
              <div class="col-12">
                <input type="tel" class="right-sidebar__field" ref="phone" autocomplete="off" placeholder="Phone" v-model="customer_data.phone" :class="{error: (!validation.phone)}">
              </div>
            </div><!-- row -->

            <div class="spacer-h-15"></div>

            <a href="#" class="right-sidebar__submit" v-on:click.prevent="change_step('next')">Get Started <svg class="icon svg-icon-bracket"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-bracket"></use></svg> </a>

            <div class="spacer-h-20"></div>


            <?php if ($privacy_url || $terms_url ): ?>
            <span class="right-sidebar__comment">By using Ruh+, you agree to our
              <?php if ( $terms_url ): ?>
              <a href="<?php echo $terms_url; ?>" target="_blank">terms and conditions</a>
              <?php endif ?>
              <?php if ( $privacy_url && $terms_url ): ?>
              and
              <?php endif ?>
              <?php if ( $privacy_url ): ?>
              <a href="<?php echo $privacy_url; ?>" target="_blank">privacy policy</a> .
              <?php endif ?>
            </span>
            <?php endif ?>

            <div class="spacer-h-30"></div>
          </div><!-- right-sidebar__page -->
        </transition>

        <transition
          class="container"
          name="visit-steps"
          tag="div"
          v-bind:css="false"
          v-on:before-enter="beforeEnter"
          v-on:enter="enter_height"
          v-on:leave="leave_height"
          v-on:after-enter="enterAfter"
          v-on:after-leave="leaveAfter"
        >
          <div class="right-sidebar__page" v-if="step == 2">
            <h2 class="right-sidebar__title">What are you looking to achieve with your smile?</h2>
            <div class="spacer-h-25"></div>

            <div class="right-sidebar__item" v-on:click="customer_data.look_to_archive = 'Straighter Teeth'">
              <i>
                <svg class="icon svg-icon-teeth"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-teeth"></use></svg>
              </i>
              <svg class="icon svg-icon-bracket"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-bracket"></use></svg>
              <h3 class="right-sidebar__item-title">Straighter Teeth <div class="tag">POPULAR</div></h3>
              <p class="right-sidebar__item-text">I want to fix the alignment of my smile</p>
            </div>

            <div class="spacer-h-15"></div>

            <div class="right-sidebar__item" v-on:click="customer_data.look_to_archive = 'Whiter Teeth'">
              <i><svg class="icon svg-icon-whiter"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-whiter"></use></svg></i>
              <svg class="icon svg-icon-bracket"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-bracket"></use></svg>
              <h3 class="right-sidebar__item-title">Whiter Teeth</h3>
              <p class="right-sidebar__item-text">I’d like my teeth to shine brighter</p>
            </div>

            <div class="spacer-h-15"></div>

            <div class="right-sidebar__item" v-on:click="customer_data.look_to_archive = 'Healthier Teeth'">
              <i><svg class="icon svg-icon-helthier"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-helthier"></use></svg></i>
              <svg class="icon svg-icon-bracket"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-bracket"></use></svg>
              <h3 class="right-sidebar__item-title">Healthier Teeth</h3>
              <p class="right-sidebar__item-text">I would like an examination and/or hygiene</p>
            </div>

            <div class="spacer-h-15"></div>

            <div class="right-sidebar__item" v-on:click="customer_data.look_to_archive = 'Complete Smile Makeover'">
              <i><svg class="icon svg-icon-smiler"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-smiler"></use></svg></i>
              <svg class="icon svg-icon-bracket"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-bracket"></use></svg>
              <h3 class="right-sidebar__item-title">Complete Smile Makeover</h3>
              <p class="right-sidebar__item-text">I want to transform my smile entirely</p>
            </div>

            <div class="spacer-h-40"></div>
          </div><!-- right-sidebar__page -->
        </transition>

        <transition
          class="container"
          name="visit-steps"
          tag="div"
          v-bind:css="false"
          v-on:before-enter="beforeEnter"
          v-on:enter="enter_height"
          v-on:leave="leave_height"
          v-on:after-enter="enterAfter"
          v-on:after-leave="leaveAfter"
        >
          <div class="right-sidebar__page" v-if="step == 3">
            <h2 class="right-sidebar__title">Let’s see your smile</h2>
            <p class="right-sidebar__text">Upload a quick photo of your current smile to help our treatment co-ordinators give you a more accurate plan.</p>
            <p class="right-sidebar__text">Need help? <a href="" v-if="!show_examples" v-on:click.prevent="hide_show_examples">See examples <svg class="icon svg-icon-squre"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-squre"></use></svg></a>

             <a href="" class="hide-samples" v-if="show_examples" v-on:click.prevent="hide_show_examples">  Hide examples
            <svg id="SVGDoc" width="10" height="10" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:avocode="https://avocode.com/" viewBox="0 0 10 10"><defs></defs><desc>Generated with Avocode.</desc><g><g><title>Path</title><path d="M9.66198,1.96966l-3.02994,3.03027v0l3.02994,3.03013c0.45069,0.45087 0.45069,1.18121 0,1.63207c-0.22518,0.22519 -0.52042,0.33787 -0.81551,0.33787c-0.29558,0 -0.59084,-0.11251 -0.81585,-0.33787l-3.03061,-3.03048v0l-3.03037,3.03045c-0.22516,0.22519 -0.52042,0.33787 -0.81577,0.33787c-0.29526,0 -0.59032,-0.11251 -0.81568,-0.33787c-0.45069,-0.45066 -0.45069,-1.18103 0,-1.63206l3.02985,-3.03014v0l-3.03002,-3.03024c-0.45069,-0.4507 -0.45069,-1.18121 0,-1.6319c0.4506,-0.45035 1.18068,-0.45035 1.63145,0l3.03052,3.03028v0l3.03028,-3.03028c0.45086,-0.45035 1.18102,-0.45035 1.63154,0c0.45086,0.45069 0.45086,1.1812 0.00017,1.6319z" fill="#e95769" fill-opacity="1"></path></g></g></svg></a>
            </p>

            <div class="spacer-h-15"></div>

            <div class="image-uploads">
              <div class="row">
                <div class="col-6">
                  <load-item
                    v-on:change_image_uploaded="change_image_uploaded_cb($event, 'photo_1')"
                    v-if="!show_examples"
                  ></load-item>
                  <div class="sample-show" v-if="show_examples">
                    <img src="<?php echo THEME_URL; ?>/assets/images/smile_closed.png" alt="">
                  </div>
                  <span class="upload-image-item__title">Close up, teeth together</span>
                  <span class="upload-image-item__status not-loaded" :class="set_status_class('photo_1', 'class')"><i></i> {{set_status_class('photo_1', 'text')}}</span>
                </div>
                <div class="col-6">
                  <load-item
                    v-on:change_image_uploaded="change_image_uploaded_cb($event, 'photo_2')"
                    v-if="!show_examples"
                  ></load-item>
                  <div class="sample-show" v-if="show_examples">
                    <img src="<?php echo THEME_URL; ?>/assets/images/smile_open.png" alt="">
                  </div>
                  <span class="upload-image-item__title">Close up, open mouth</span>
                   <span class="upload-image-item__status not-loaded" :class="set_status_class('photo_2', 'class')"><i></i> {{set_status_class('photo_2', 'text')}}</span>
                </div>
              </div>
            </div><!-- image-uploads -->

            <div class="spacer-h-25"></div>

            <div class="warning">Your photos are stored securely and aren’t shared publicly with anyone or any third party.</div>

            <div class="spacer-h-30"></div>

             <a href="#" v-on:click.prevent="change_step('next')" class="right-sidebar__submit" :class="{'not-active' : (!image_loaded.photo_1 || !image_loaded.photo_2)}">Submit Photos and continue<svg class="icon svg-icon-bracket"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-bracket"></use></svg> </a>
          </div><!-- right-sidebar__page -->
        </transition>

        <transition
          class="container"
          name="visit-steps"
          tag="div"
          v-bind:css="false"
          v-on:before-enter="beforeEnter"
          v-on:enter="enter_height"
          v-on:leave="leave_height"
          v-on:after-enter="enterAfter"
          v-on:after-leave="leaveAfter"
        >
          <div class="right-sidebar__page" v-if="step == 4">
            <h2 class="right-sidebar__title">Finally, help us get to know you a little</h2>

            <div class="spacer-h-25"></div>

            <span class="right-sidebar__label">Does your current smile affect your confidence?</span>
            <div class="spacer-h-10"></div>
            <div class="row gutters-5 ">
              <div class="col-4">
                <label class="right-sidebar__selector"><input type="radio" name="confidence" value="Not at all" v-model="customer_data.confidence"><span class="text">Not at all</span></label>
              </div>
              <div class="col-4">
                <label class="right-sidebar__selector"><input type="radio" name="confidence" value="Slightly" v-model="customer_data.confidence"><span class="text">Slightly</span></label>
              </div>
              <div class="col-4">
                <label class="right-sidebar__selector"><input type="radio" name="confidence" v-model="customer_data.confidence" value="A lot"><span class="text">A lot</span></label>
              </div>
            </div><!-- row -->
            <div class="spacer-h-20"></div>

            <span class="right-sidebar__label" :class="{'not-active':(!customer_data.confidence)}">Do you visit the dentist for regular check-ups?</span>
            <div class="spacer-h-10"></div>
            <div class="row  gutters-5" :class="{'not-active':(!customer_data.confidence)}">
              <div class="col-4">
                <label class="right-sidebar__selector"><input type="radio" name="checkup" value="Never" v-model="customer_data.checkup"><span class="text">Never</span></label>
              </div>

              <div class="col-4">
                <label class="right-sidebar__selector"><input type="radio" name="checkup" value="Occassionally" v-model="customer_data.checkup"><span class="text">Occassionally</span></label>
              </div>

              <div class="col-4">
                <label class="right-sidebar__selector"><input type="radio" name="checkup" value="Regularly" v-model="customer_data.checkup"><span class="text">Regularly</span></label>
              </div>
            </div><!-- row -->
            <div class="spacer-h-20"></div>

            <span class="right-sidebar__label"  :class="{'not-active':(!customer_data.confidence || !customer_data.checkup )}">Have you ever had orthodontic treatment?</span>
            <div class="spacer-h-10"></div>
            <div class="row gutters-5 " :class="{'not-active':(!customer_data.confidence || !customer_data.checkup )}">
              <div class="col-3">
                <label class="right-sidebar__selector"><input type="radio" name="how-ever" value="Fixed Braces" v-model="customer_data.how_ever"><span class="text">Fixed Braces</span></label>
              </div>
              <div class="col-3">
                <label class="right-sidebar__selector"><input type="radio" name="how-ever" value="Aligners" v-model="customer_data.how_ever"><span class="text">Aligners</span></label>
              </div>
              <div class="col-3">
                <label class="right-sidebar__selector"><input type="radio" name="how-ever" value="None" v-model="customer_data.how_ever"><span class="text">None</span></label>
              </div>
              <div class="col-3">
                <label class="right-sidebar__selector"><input type="radio" name="how-ever" value="Other" v-model="customer_data.how_ever"><span class="text">Other</span></label>
              </div>
            </div><!-- row -->
            <div class="spacer-h-20"></div>

            <span class="right-sidebar__label"  :class="{'not-active':(!customer_data.confidence || !customer_data.checkup || !customer_data.how_ever )}">Have you ever had dental cosmetic treatment?</span>
            <div class="spacer-h-10"></div>
            <div class="row  gutters-5 " :class="{'not-active':(!customer_data.confidence || !customer_data.checkup || !customer_data.how_ever )}">
              <div class="col-3">
                <label class="right-sidebar__selector"><input type="radio" name="had_cosmetic" value="Whitening" v-model="customer_data.had_cosmetic"><span class="text">Whitening</span></label>
              </div>
              <div class="col-3">
                <label class="right-sidebar__selector"><input type="radio" name="had_cosmetic" value="Veneers" v-model="customer_data.had_cosmetic"><span class="text">Veneers</span></label>
              </div>
              <div class="col-3">
                <label class="right-sidebar__selector"><input type="radio" name="had_cosmetic" value="Bonding" v-model="customer_data.had_cosmetic"><span class="text">Bonding</span></label>
              </div>
              <div class="col-3">
                <label class="right-sidebar__selector"><input type="radio" name="had_cosmetic" value="Other" v-model="customer_data.had_cosmetic"><span class="text">Other</span></label>
              </div>
            </div><!-- row -->
            <div class="spacer-h-30"></div>

             <a href="№" v-on:click.prevent="submit_form" class="right-sidebar__submit" :class="{'not-active':(!customer_data.confidence || !customer_data.had_cosmetic || !customer_data.checkup || !customer_data.how_ever )}">Finish & Get Results <svg class="icon svg-icon-bracket"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-bracket"></use></svg> </a>
          </div><!-- right-sidebar__page -->
        </transition>

      </form>
    </div><!-- right-sidebar__inner -->
  </div><!-- right-sidebar -->
  <div class="container footer-line">
    <div class="row">
      <div class="col-md-6">
        <span class="copyrights">© 2020 Ruh Dental. All rights reserved</span>
      </div>
      <div class="col-md-6 text-center text-right-md">
        <img src="<?php echo THEME_URL;?>/assets/images/svg/logo-contrast.svg" alt="" class="contrast">
        <img src="<?php echo THEME_URL;?>/assets/images/logo_dark.svg" alt="" class="dark">
      </div>
    </div>
  </div><!-- container -->

  <!-- ****************************************** -->
  <!-- ****************************************** -->
  <!-- ****************************************** -->
  <!-- MOBILE window -->
  <!-- ****************************************** -->
  <!-- ****************************************** -->

   <main class="site-inner site-inner__fullheight online-visit show-mobile">
      <transition
        class="container"
        name="welcome-screen"
        tag="div"
        v-bind:css="false"
        v-on:before-enter="beforeEnter"
        v-on:enter="enter_opacity"
        v-on:leave="leave_opacity"
        v-on:after-enter="enterAfter"
        v-on:after-leave="leaveAfter"
      >
        <div v-if="!is_loaded">
          <div class="container-lg no-padding">
            <div class="header-spacer"></div>
            <div class="row">
              <div class="col-12 valign-center  text-center">
                <div class="online-visit__preview">
                  <div class="spacer-h-150"></div>
                  <div class="text-center">
                    <img src="<?php echo THEME_URL;?>/assets/images/svg/ruh.svg" alt="" class="online-visit__preview-logo">
                    <span class="icon-plus">+</span>
                  </div>
                  <div class="spacer-h-30"></div>
                  <p class="online-visit__preview-title">GATHERING TREATMENTS</p>
                  <p class="online-visit__preview-text">You’re one step closer to your dream smile.</p>
                  <div class="spacer-h-25"></div>
                  <div class="online-visit__preview-spinner"><img src="<?php echo THEME_URL;?>/assets/images/oval.png" alt=""></div>

                  <div class="spacer-h-150"></div>
                </div><!-- online-visit__preview -->
                <div class="spacer-h-30"></div>
                <span class="online-visit__preview-text">If you’re not redirected in 5 seconds, <a href="#" v-on:click.prevent ="is_loaded = 1">click here</a></span>
                <div class="spacer-h-100"></div>
              </div>
            </div><!-- row -->
          </div><!-- container -->
        </div>
      </transition>

      <transition
        class="container"
        name="visit-steps"
        tag="div"
        v-bind:css="false"
        v-on:before-enter="beforeEnter"
        v-on:enter="enter_opacity"
        v-on:leave="leave_opacity"
        v-on:after-enter="enterAfter"
        v-on:after-leave="leaveAfter"
      >
        <div class="online-visit__mobile-page"  v-if="is_loaded && !is_completed">
          <div class="online-visit__mobile-page-header">
            <img src="<?php echo THEME_URL;?>/assets/images/svg/ruh.svg" alt="" class="online-visit__preview-logo">
            <span class="icon-plus">+</span>

            <i class="icon-close"><svg class="icon svg-icon-close" v-on:click="show = 0"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-close"></use></svg></i>
          </div><!-- online-visit_mobile-page-header -->

          <div class="online-visit__mobile-page-content">
            <h2 class="online-visit__steps-title">Let’s start</h2>
            <p class="online-visit__preview-text">Get a 95% accurate quote from one of our treatment co-ordinators in 48 hours.</p>
            <div class="spacer-h-40"></div>
            <p class="online-visit__preview-title">HOW DOES IT WORK?</p>
            <div class="spacer-h-25"></div>
          </div>

          <div class="horisontal-scroll">
            <div class="horisontal-scroll__inner">
                <div class="online-visit__steps-item" :class="{'active':( step > 2)}">
                  <span class="online-visit__steps-icon">
                    <svg class="icon svg-icon-smile"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-smile"></use></svg>
                  </span>

                  <span class="text">Select your smile goals so we can tailor your treatment plan just for you</span>
                </div>

                <div class="online-visit__steps-item" :class="{'active':( step > 3)}">
                  <span class="online-visit__steps-icon">
                    <svg class="icon svg-icon-photo"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-photo"></use></svg>
                  </span>

                  <span class="text">Upload a photo of your smile so we can provide an accurate assessment</span>
                </div>

                <div class="online-visit__steps-item" :class="{'active':( step === 4 && customer_data.confidence && customer_data.had_cosmetic && customer_data.checkup && customer_data.how_ever )}">
                  <span class="online-visit__steps-icon">
                    <svg class="icon svg-icon-scroll"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-scroll"></use></svg>
                  </span>

                  <span class="text">Finish up with some dental history and preferences.</span>
                </div>
            </div>
          </div><!-- horisontal-scroll -->

          <div class="bottom-holder"  :class="{shown: show_sidebar}" >
            <div class="clearfix">
              <i class="back"  v-if="step > 1" v-on:click="change_step('prev')">
                 <svg class="icon svg-icon-bracket"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-bracket"></use></svg>
                 Back
              </i>
            </div> <!-- clearfix -->
            <div class="spacer-h-25"></div>

           <transition
              class="container"
              name="visit-steps"
              tag="div"
              v-bind:css="false"
              v-on:before-enter="beforeEnter"
              v-on:enter="enter_height"
              v-on:leave="leave_height"
              v-on:after-enter="enterAfter"
              v-on:after-leave="leaveAfter"
           >
             <div class="bottom-holder__page"  v-if="step == 1">
               <h2 class="right-sidebar__title">Get started, it takes only 5 minutes</h2>

              <div class="spacer-h-35"></div>

              <div class="row gutters-5">
                <div class="col-6">
                  <input type="text" class="right-sidebar__field" ref="first_name" autocomplete="off" placeholder="First name" v-model="customer_data.first_name" :class="{error: (!validation.first_name)}">
                </div>
                <div class="col-6">
                  <input type="text" class="right-sidebar__field" ref="last_name" autocomplete="off" placeholder="Last name" v-model="customer_data.last_name" :class="{error: (!validation.last_name)}">
                </div>
              </div><!-- row -->
              <div class="spacer-h-15"></div>

              <div class="row">
                <div class="col-12">
                  <input type="email" class="right-sidebar__field" ref="email" autocomplete="off" placeholder="Email" v-model="customer_data.email" :class="{error: (!validation.email)}">
                </div>
              </div><!-- row -->

              <div class="spacer-h-15"></div>

              <div class="row">
                <div class="col-12">
                  <input type="tel" class="right-sidebar__field" ref="phone" autocomplete="off" placeholder="Phone" v-model="customer_data.phone" :class="{error: (!validation.phone)}">
                </div>
              </div><!-- row -->

              <div class="spacer-h-15"></div>

              <a href="#" class="right-sidebar__submit" v-on:click.prevent="change_step('next')">Get Started <svg class="icon svg-icon-bracket"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-bracket"></use></svg> </a>

              <div class="spacer-h-20"></div>

            </div><!-- bottom-holder__page -->
            </transition>

            <transition
              class="container"
              name="visit-steps"
              tag="div"
              v-bind:css="false"
              v-on:before-enter="beforeEnter"
              v-on:enter="enter_height"
              v-on:leave="leave_height"
              v-on:after-enter="enterAfter"
              v-on:after-leave="leaveAfter"
            >
              <div class="bottom-holder__page"  v-if="step == 2">
                <h2 class="right-sidebar__title">What are you looking to achieve with your smile?</h2>
                <div class="spacer-h-25"></div>

                <div class="right-sidebar__item" v-on:click="customer_data.look_to_archive = 'Straighter Teeth'">
                  <i>
                    <svg class="icon svg-icon-teeth"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-teeth"></use></svg>
                  </i>
                  <svg class="icon svg-icon-bracket"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-bracket"></use></svg>
                  <h3 class="right-sidebar__item-title">Straighter Teeth <div class="tag">POPULAR</div></h3>
                  <p class="right-sidebar__item-text">I want to fix the alignment of my smile</p>
                </div>

                <div class="spacer-h-15"></div>

                <div class="right-sidebar__item" v-on:click="customer_data.look_to_archive = 'Whiter Teeth'">
                  <i><svg class="icon svg-icon-whiter"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-whiter"></use></svg></i>
                  <svg class="icon svg-icon-bracket"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-bracket"></use></svg>
                  <h3 class="right-sidebar__item-title">Whiter Teeth</h3>
                  <p class="right-sidebar__item-text">I’d like my teeth to shine brighter</p>
                </div>

                <div class="spacer-h-15"></div>

                <div class="right-sidebar__item" v-on:click="customer_data.look_to_archive = 'Healthier Teeth'">
                  <i><svg class="icon svg-icon-helthier"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-helthier"></use></svg></i>
                  <svg class="icon svg-icon-bracket"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-bracket"></use></svg>
                  <h3 class="right-sidebar__item-title">Healthier Teeth</h3>
                  <p class="right-sidebar__item-text">I would like an examination and/or hygiene</p>
                </div>

                <div class="spacer-h-15"></div>

                <div class="right-sidebar__item" v-on:click="customer_data.look_to_archive = 'Complete Smile Makeover'">
                  <i><svg class="icon svg-icon-smiler"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-smiler"></use></svg></i>
                  <svg class="icon svg-icon-bracket"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-bracket"></use></svg>
                  <h3 class="right-sidebar__item-title">Complete Smile Makeover</h3>
                  <p class="right-sidebar__item-text">I want to transform my smile entirely</p>
                </div>

                <div class="spacer-h-40"></div>
               </div><!-- bottom-holder__page -->
           </transition>

            <transition
              class="container"
              name="visit-steps"
              tag="div"
              v-bind:css="false"
              v-on:before-enter="beforeEnter"
              v-on:enter="enter_height"
              v-on:leave="leave_height"
              v-on:after-enter="enterAfter"
              v-on:after-leave="leaveAfter"
            >
              <div class="bottom-holder__page"  v-if="step == 3">
                <h2 class="right-sidebar__title">Let’s see your smile</h2>
                <p class="right-sidebar__text">Upload a quick photo of your current smile to help our treatment co-ordinators give you a more accurate plan.</p>
                <p class="right-sidebar__text">Need help? <a href="">See examples <svg class="icon svg-icon-squre"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-squre"></use></svg></a></p>

                <div class="spacer-h-15"></div>

                <div class="image-uploads">
                  <div class="row">
                    <div class="col-6">
                      <load-item
                        v-on:change_image_uploaded="change_image_uploaded_cb($event, 'photo_1')"
                      ></load-item>
                      <span class="upload-image-item__title">Close up, teeth together</span>
                      <span class="upload-image-item__status not-loaded" :class="set_status_class('photo_1', 'class')"><i></i> {{set_status_class('photo_1', 'text')}}</span>
                    </div>
                    <div class="col-6">
                      <load-item
                        v-on:change_image_uploaded="change_image_uploaded_cb($event, 'photo_2')"
                      ></load-item>
                      <span class="upload-image-item__title">Close up, open mouth</span>
                       <span class="upload-image-item__status not-loaded" :class="set_status_class('photo_2', 'class')"><i></i> {{set_status_class('photo_2', 'text')}}</span>
                    </div>
                  </div>
                </div><!-- image-uploads -->

                <div class="spacer-h-25"></div>

                <div class="warning">Your photos are stored securely and aren’t shared publicly with anyone or any third party.</div>

                <div class="spacer-h-30"></div>

                 <a href="#" v-on:click.prevent="change_step('next')" class="right-sidebar__submit" :class="{'not-active' : (!image_loaded.photo_1 || !image_loaded.photo_2)}">Submit Photos and continue<svg class="icon svg-icon-bracket"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-bracket"></use></svg> </a>
              </div><!-- bottom-holder__page -->
           </transition>


            <transition
              class="container"
              name="visit-steps"
              tag="div"
              v-bind:css="false"
              v-on:before-enter="beforeEnter"
              v-on:enter="enter_height"
              v-on:leave="leave_height"
              v-on:after-enter="enterAfter"
              v-on:after-leave="leaveAfter"
            >
              <div class="bottom-holder__page"  v-if="step == 4">
                <h2 class="right-sidebar__title">Finally, help us get to know you a little</h2>

                <div class="spacer-h-25"></div>

                <span class="right-sidebar__label">Does your current smile affect your confidence?</span>
                <div class="spacer-h-10"></div>
                <div class="row gutters-5 ">
                  <div class="col-4">
                    <label class="right-sidebar__selector"><input type="radio" name="confidence" value="Not at all" v-model="customer_data.confidence"><span class="text">Not at all</span></label>
                  </div>
                  <div class="col-4">
                    <label class="right-sidebar__selector"><input type="radio" name="confidence" value="Slightly" v-model="customer_data.confidence"><span class="text">Slightly</span></label>
                  </div>
                  <div class="col-4">
                    <label class="right-sidebar__selector"><input type="radio" name="confidence" v-model="customer_data.confidence" value="Alot"><span class="text">Alot</span></label>
                  </div>
                </div><!-- row -->
                <div class="spacer-h-20"></div>

                <span class="right-sidebar__label" :class="{'not-active':(!customer_data.confidence)}">Do you visit the dentist for regular check-ups?</span>
                <div class="spacer-h-10"></div>
                <div class="row  gutters-5" :class="{'not-active':(!customer_data.confidence)}">
                  <div class="col-4">
                    <label class="right-sidebar__selector"><input type="radio" name="checkup" value="Never" v-model="customer_data.checkup"><span class="text">Never</span></label>
                  </div>

                  <div class="col-4">
                    <label class="right-sidebar__selector"><input type="radio" name="checkup" value="Occassionally" v-model="customer_data.checkup"><span class="text">Occassionally</span></label>
                  </div>

                  <div class="col-4">
                    <label class="right-sidebar__selector"><input type="radio" name="checkup" value="Regularly" v-model="customer_data.checkup"><span class="text">Regularly</span></label>
                  </div>
                </div><!-- row -->
                <div class="spacer-h-20"></div>

                <span class="right-sidebar__label"  :class="{'not-active':(!customer_data.confidence || !customer_data.checkup )}">Have you ever had orthodontic treatment?</span>
                <div class="spacer-h-10"></div>
                <div class="row gutters-5 " :class="{'not-active':(!customer_data.confidence || !customer_data.checkup )}">
                  <div class="col-3">
                    <label class="right-sidebar__selector"><input type="radio" name="how-ever" value="Fixed Braces" v-model="customer_data.how_ever"><span class="text">Fixed Braces</span></label>
                  </div>
                  <div class="col-3">
                    <label class="right-sidebar__selector"><input type="radio" name="how-ever" value="Aligners" v-model="customer_data.how_ever"><span class="text">Aligners</span></label>
                  </div>
                  <div class="col-3">
                    <label class="right-sidebar__selector"><input type="radio" name="how-ever" value="None" v-model="customer_data.how_ever"><span class="text">None</span></label>
                  </div>
                  <div class="col-3">
                    <label class="right-sidebar__selector"><input type="radio" name="how-ever" value="Other" v-model="customer_data.how_ever"><span class="text">Other</span></label>
                  </div>
                </div><!-- row -->
                <div class="spacer-h-20"></div>

                <span class="right-sidebar__label"  :class="{'not-active':(!customer_data.confidence || !customer_data.checkup || !customer_data.how_ever )}">Have you ever had dental cosmetic treatment?</span>
                <div class="spacer-h-10"></div>
                <div class="row  gutters-5 " :class="{'not-active':(!customer_data.confidence || !customer_data.checkup || !customer_data.how_ever )}">
                  <div class="col-3">
                    <label class="right-sidebar__selector"><input type="radio" name="had_cosmetic" value="Whitening" v-model="customer_data.had_cosmetic"><span class="text">Whitening</span></label>
                  </div>
                  <div class="col-3">
                    <label class="right-sidebar__selector"><input type="radio" name="had_cosmetic" value="Veneers" v-model="customer_data.had_cosmetic"><span class="text">Veneers</span></label>
                  </div>
                  <div class="col-3">
                    <label class="right-sidebar__selector"><input type="radio" name="had_cosmetic" value="Bonding" v-model="customer_data.had_cosmetic"><span class="text">Bonding</span></label>
                  </div>
                  <div class="col-3">
                    <label class="right-sidebar__selector"><input type="radio" name="had_cosmetic" value="Other" v-model="customer_data.had_cosmetic"><span class="text">Other</span></label>
                  </div>
                </div><!-- row -->
                <div class="spacer-h-30"></div>

                 <a href="№" v-on:click.prevent="submit_form" class="right-sidebar__submit" :class="{'not-active':(!customer_data.confidence || !customer_data.had_cosmetic || !customer_data.checkup || !customer_data.how_ever )}">Finish & Get Results <svg class="icon svg-icon-bracket"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-bracket"></use></svg> </a>
              </div><!-- bottom-holder__page -->
             </transition>
          </div>
        </div><!-- online-visit_mobile-page -->
      </transition>


      <div class="container"  v-if="is_completed">
        <div class="row">
          <div class="col-12 text-center">
            <div class="header-spacer"></div>
            <div class="text-left">
             <img src="<?php echo THEME_URL;?>/assets/images/svg/ruh.svg" alt="" class="online-visit__preview-logo">
              <span class="icon-plus">+</span>
            </div><!-- text-left -->
            <div class="spacer-h-50"></div>
            <h2 class="online-visit__steps-title">{{customer_data.first_name}}, <br> you’re a star</h2>
            <p class="online-visit__preview-text">Your details have been sent to our clinical team who will prepare your provisional treatment plan.</p>

            <div class="spacer-h-30"></div>
            <p class="online-visit__preview-title">WHAT HAPPENS NEXT?</p>

            <div class="spacer-h-25"></div>


            <div class="online-visit__steps-item text-left align-center">
              <span class="online-visit__steps-icon">
                <svg class="icon svg-icon-hours"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-hours"></use></svg>
              </span>

              <span class="text">You will be contacted in the next 48 hours to arrange a digital consultation and report of your options.</span>
            </div>
            <div class="spacer-h-15"></div>

            <div class="online-visit__steps-item text-left align-center">
              <span class="online-visit__steps-icon">
                <svg class="icon svg-icon-calendar"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-calendar"></use></svg>
              </span>

              <span class="text">You can choose to arrange a telephone or video dental consultation.</span>
            </div>
            <div class="spacer-h-100"></div>
          </div><!-- col-6 -->
        </div><!-- row fullheight -->
      </div><!-- container fullheight -->
   </main><!-- site-inner -->
</div>