<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

/**
 * The main output class
 *
 * @package theme/output
 *
 * @since v1.0
 */
class theme_content_output{

  /**
  * prints header
  *
  * @hookedto
  */
  public static function print_header(){

    $main_menu = wp_nav_menu( array(
      'theme_location'  => 'main_menu',
      'menu'            => '',
      'container'       => '',
      'container_class' => '',
      'container_id'    => '',
      'menu_class'      => 'about-menu',
      'menu_id'         => '',
      'echo'            => false,
      'fallback_cb'     => '',
      'before'          => '',
      'after'           => '',
      'link_before'     => '',
      'link_after'      => '',
      'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
      'depth'           => 1,
    ) );

    $clinics_menu = wp_nav_menu( array(
      'theme_location'  => 'clinics_menu',
      'menu'            => '',
      'container'       => '',
      'container_class' => '',
      'container_id'    => '',
      'menu_class'      => 'clinics-menu',
      'menu_id'         => '',
      'echo'            => false,
      'fallback_cb'     => '',
      'before'          => '',
      'after'           => '',
      'link_before'     => '',
      'link_after'      => '',
      'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
      'depth'           => 1,
    ) );

    $plugins_active = get_option('active_plugins');

    $args = array(
      'show_intercom' => in_array('intercom/bootstrap.php', $plugins_active ),
      'main_menu'   => $main_menu,
      'clinics_menu' => $clinics_menu,
    );
    print_theme_template_part('header', 'globals', $args);
  }


  /**
  * Prints page content
  *
  * @hookedto do_theme_header 10
  *
  * @see  [theme_folder]/includes/class-page-constructor.php line 22
  */
  public static function print_page_content(){}


  /**
  * Prints page footer
  *
  * @hookedto do_theme_footer 10
  *
* @see  [theme_folder]/includes/class-page-constructor.php line 23
  */
  public static function print_footer(){

    $clinic_args = array(
      'post_type' => 'theme_clinics',
      'posts_per_page' => -1,
    );

    $clinics = get_posts( $clinic_args );

    if(function_exists('get_field')){
      foreach ($clinics as $id => $clinic) {
        $clinics[$id]->email = get_field('email', $clinic->ID);
        $clinics[$id]->phone = get_field('phone', $clinic->ID);
        $clinics[$id]->city = get_field('city', $clinic->ID);
        $clinics[$id]->address = get_field('address', $clinic->ID);
      }
    }


    $copyrights      = get_option('theme_footer_copyrights');
    $footer_partners = get_option('theme_footer_partners');
    $date       = new DateTime();
    $year       = $date->format('Y');
    $plugins_active = get_option('active_plugins');
        $default_form_id = get_option('default_subscription_form');
    $args = array(
      'copyrights'  => str_replace('{year}', $year, $copyrights),
      'footer_partners' =>$footer_partners?explode(',',$footer_partners): false,
      'clinics'  => $clinics,
      'cta_text'  => get_option('theme_footer_cta_text'),
      'book_url'  => 'http://',
      'show_intercom' => in_array('intercom/bootstrap.php', $plugins_active ),
       'form_id'   => md5(sprintf('[wpforms id="%s"]',  $default_form_id)),
    );

    print_theme_template_part('footer', 'globals', $args);
  }



  /**
  * Prints contentof a page
  *
  * @hookedto do_theme_content 10
  *
  * @see  [theme_folder]/includes/class-page-constructor.php line 24
  */
  public static function print_content_page(){
    if ( have_posts() ) :
      while ( have_posts() ) : the_post();
        echo '<div class="container-lg">';
        the_content();
        echo '</div>';
      endwhile;
    endif;
  }

  public static function print_wp_forms_popup(){
    if(!function_exists('get_field')){return;}

    global $wp_popup_forms;

    $forms = array(
      'default_subscription_form' => array(
        'title' => 'Online <span class="marked">Visit</span>',
        'comment' => 'Tell our dentists about your teeth and get a free treatment plan',
      ),

      'subscription_form_emergency' => array(
        'title' => 'Emergency <span class="marked">Visit</span>',
        'comment' => '',
      ),

      'default_subscription_form_inclinic' => array(
        'title' => 'In <span class="marked">Clinic</span> Visit',
        'comment' => 'Book a free appointment at either of our London or Manchester clinics.',
      ),
    );

    foreach ($forms as $option_name => $data) {

      $wp_form_id = get_option($option_name);
      if(!$wp_form_id) continue;

      $shortcode    = sprintf('[wpforms id="%s"]',  $wp_form_id);
      $form_id   = md5( $shortcode );
      $output  = do_shortcode($shortcode);

      $treatments = get_posts(array(
        'posts_per_page' => -1,
        'post_type' => 'theme_treatment'
      ));
      $options = '';

      foreach ($treatments as $t) {
        $options .= sprintf('<option value="%1$s" >%1$s</option>', $t->post_title);
      }

      $output    = str_replace('<option value="%treatments%" >%treatments%</option>', $options, $output );

      unset($wp_popup_forms[$form_id]);
      $args = array(
        'form_id' =>  $form_id,
        'output' =>  $output,
        'title' =>    $data['title'],
        'comment' =>  $data['comment'],
      );

      print_theme_template_part('register-popup','globals', $args);
    }

    foreach ($wp_popup_forms as $form_id => $data) {
      $output    = do_shortcode($data['shortcode']);
      $output    = str_replace('<option value="%treatments%" >%treatments%</option>', $options, $output );

      $args = array(
        'form_id' =>  $form_id,
        'output' =>   $output ,
        'title' =>    $data['title'],
        'comment' =>  $data['comment'],
      );

      print_theme_template_part('register-popup','globals', $args);
    }


  }


  public static function print_mobile_cta(){
    if(!function_exists('get_field')) return;

    if(!is_single()){
      $form_id = get_option('default_subscription_form');
      $shortcode = sprintf('[wpforms id="%s"]',  $form_id);
      $form    = do_shortcode($shortcode);
      $treatments = get_posts(array(
        'posts_per_page' => -1,
        'post_type' => 'theme_treatment'
      ));
      $options = '';

      foreach ($treatments as $t) {
        $options .= sprintf('<option value="%1$s" >%1$s</option>', $t->post_title);
      }

      $form = str_replace('<option value="%treatments%" >%treatments%</option>', $options, $form );

      $form_online = ($form_id)? str_replace('%single_treatment%', $obj->post_title, $form ): false;
      $form_id = get_option('default_subscription_form_inclinic');
      $shortcode =  sprintf('[wpforms id="%s"]',  $form_id);
      $form    = do_shortcode($shortcode);
      $form = str_replace('<option value="%treatments%" >%treatments%</option>', $options, $form );
      $form_inclicnic = ($form_id)? str_replace('%single_treatment%', $obj->post_title, $form ): false;
    }else{
      $obj = get_queried_object();

      switch ($obj->post_type) {
        case 'theme_doctor':
          $first_name =  get_field('first_name', $obj->ID);
          $last_name  =  get_field('last_name', $obj->ID);

          $form_id = get_option('dentist_subscription_form_online');
          $shortcode = sprintf('[wpforms id="%s"]',  $form_id);

          unset($wp_popup_forms[md5( $shortcode)]);


          $form    = do_shortcode($shortcode);
          $treatments = get_posts(array(
            'posts_per_page' => -1,
            'post_type' => 'theme_treatment'
          ));

          $options = '';

          foreach ($treatments as $t) {
            $selected = ($t->post_title === $obj->post_title)? 'selected="selected"' : '';
            $options .= sprintf('<option value="%1$s" %2$s >%1$s</option>', $t->post_title,$selected );
          }

          $output    = str_replace('<option value="%treatments%" >%treatments%</option>', $options, $form );
          $output    = str_replace('%dentist_name%',  $first_name.' '.$last_name, $output );
          $output    = str_replace('%dentist_first_name%', $first_name, $output );
          $form_online = ($form_id)?   $output : false;
          $form_id   = get_option('dentist_subscription_form_inclinic');
          $shortcode =  sprintf('[wpforms id="%s"]',  $form_id);
          unset($wp_popup_forms[md5( $shortcode)]);
          $form      = do_shortcode($shortcode);
          $output    = str_replace('%dentist_name%',  $first_name.' '.$last_name, $form );
          $output    = str_replace('%dentist_first_name%', $first_name, $output );
          $form_inclicnic    = ($form_id)?    $output : false;
          break;

        case 'theme_campaign':
          $form_id = get_option('treatment_subscription_form_online');

          $shortcode = sprintf('[wpforms id="%s"]',  $form_id);
          $form    = do_shortcode($shortcode);
          $form_online = ($form_id)? str_replace('%single_treatment%', $obj->post_title, $form ): false;

          $form_id = get_option('treatment_subscription_form_inclicnic');
          $shortcode =  sprintf('[wpforms id="%s"]',  $form_id);
          $form_inclicnic    = ($form_id)? do_shortcode($shortcode): false;
          break;

        default:
            $form_id = get_option('default_subscription_form');
            $shortcode = sprintf('[wpforms id="%s"]',  $form_id);
            $form    = do_shortcode($shortcode);
            $treatments = get_posts(array(
              'posts_per_page' => -1,
              'post_type' => 'theme_treatment'
            ));
            $options = '';

            foreach ($treatments as $t) {
              $options .= sprintf('<option value="%1$s" >%1$s</option>', $t->post_title);
            }

            $form = str_replace('<option value="%treatments%" >%treatments%</option>', $options, $form );

            $form_online = ($form_id)? str_replace('%single_treatment%', $obj->post_title, $form ): false;
            $form_id = get_option('default_subscription_form_inclinic');
            $shortcode =  sprintf('[wpforms id="%s"]',  $form_id);
            $form    = do_shortcode($shortcode);
            $form = str_replace('<option value="%treatments%" >%treatments%</option>', $options, $form );
            $form_inclicnic = ($form_id)? str_replace('%single_treatment%', $obj->post_title, $form ): false;
          break;
      }
    }

    $args = array(
      'form_online'    => $form_online,
      'form_inclicnic' => $form_inclicnic,
      'text_cta'      => get_option('mobile_text_cta'),
      'price'         => get_option('mobile_price_value'),
    );

    print_theme_template_part('mobile-cta', 'globals', $args);
  }
}