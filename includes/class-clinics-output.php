<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

class theme_clinics_output{
  public static function print_welcome_screen(){

    if(!function_exists('get_field')){
      return;
    }

    $obj = get_queried_object();
    $phone = get_field('phone', $obj->ID);
    $phone = $phone ? preg_replace('/\D/', '', $phone) : $phone;
    $form_id = get_option('clinic_subscription_form' );

    $args = array(
      'title' => $obj->post_title,
      'category' => get_post_meta($obj->ID, 'clinic_location', true),
      'about' => get_post_meta($obj->ID, 'clinic_about', true),
      'image' => get_field('clinic_image', $obj->ID),
      'phone' => $phone,
      'form_id' => md5(sprintf('[wpforms id="%s"]',  $form_id)),
      'video_url' =>  get_field('clinic_video', $obj->ID),
      'video_url_bg' =>  get_field('clinic_video_bg', $obj->ID),
    );

    print_theme_template_part('welcome-screen', 'clinics', $args);
  }


  public static function print_content(){

    if(!function_exists('get_field')){
      return;
    }

    $obj = get_queried_object();
    $args = array(
      'open_hours' => get_field('opening_hours', $obj->ID),
      'parking'    => get_field('car_parking', $obj->ID),
      'bus_routes' => get_field('bus_routes', $obj->ID),
      'trains'     => get_field('train_tube_stations', $obj->ID),
      'image_ids'     => get_field('clinic_images', $obj->ID),
    );

    print_theme_template_part('content', 'clinics', $args);
  }



  public static function print_form(){
    if(!function_exists('get_field')){return;}
    $obj = get_queried_object();
    $first_name =  get_field('first_name', $obj->ID);
    $last_name  =  get_field('last_name', $obj->ID);
    $form_id    =  get_option('clinic_subscription_form');

    if(!$form_id ) {return;}

    $shortcode = sprintf('[wpforms id="%s"]',  $form_id);

    $form   = do_shortcode($shortcode);

    $output = str_replace('%clinic_name%',  $obj->post_title, $form );


    $args = array(
      'output' =>   $output ,
      'form_id'   => md5(sprintf('[wpforms id="%s"]',  $form_id)),
      'title'   => 'Book <span class="marked">with</span> '. $first_name ,
      'comment' => 'Let’s get you booked in for a free consultation',
    );

    print_theme_template_part('register-popup', 'globals', $args);
  }
}

new theme_clinics_output();


