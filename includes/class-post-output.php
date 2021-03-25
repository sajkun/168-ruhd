<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

class theme_post_output{

  public static function print_welcome_screen(){

    if(!function_exists('get_field')){
      return;
    }

    $obj = get_queried_object();

    $title_pirces = explode(' ', $obj->post_title);
    $number       = ceil(count($title_pirces)/2);
    $title_pirces[$number] = '<span class="marked">'. $title_pirces[$number];
    $title_pirces[]         = '<span>';

    $args = array(
      'title'     => implode(' ', $title_pirces),
      'category'  => get_field('sub_title', $obj->ID),
      'about'     => get_field('about', $obj->ID),
      'video_url' => get_field('video_url', $obj->ID),
      'feed_name' => get_field('feed_name', $obj->ID),
      'feed_stars' => get_field('feed_stars', $obj->ID),
      'feed_rate_desc' => get_field('feed_rate_desc', $obj->ID),
    );

    $args['form_id'] = 'popup-mobile-cta';

    $args['image'] = get_field('image', $obj->ID);
    $args['image_mobile'] = get_field('image_mobile', $obj->ID);
    $args['bg_color'] = get_field('bg_color', $obj->ID);
    $args['adv'] =  array(
      'text'       => get_field('adv_text', $obj->ID),
      'adv_link'   => get_field('adv_link', $obj->ID),
      'tag'        => get_field('adv_tag', $obj->ID),
      'tag_color'  => get_field('tag_color', $obj->ID),
    );


    print_theme_template_part('welcome-screen', 'post', $args);
  }

  public static function print_content(){

    $obj = get_queried_object();

    $form_id = get_option('default_subscription_form_inclinic');
    $shortcode = sprintf('[wpforms id="%s"]',  $form_id);

    $form_online    = do_shortcode($shortcode);

    $form_id = get_option('story_clinic_subscription_form');

    $shortcode =  sprintf('[wpforms id="%s"]',  $form_id);
    $form_inclicnic    = ($form_id)? do_shortcode($shortcode): false;
        $form = str_replace('%story_source%', $obj->post_title, $form );

     $args = array(
       'obj'    => $obj,
       'form_online'    => $form_online,
       'form_inclicnic' => $form_inclicnic,
       'feed_name' => get_field('feed_name', $obj->ID),
       'feed_stars' => get_field('feed_stars', $obj->ID),
       'feed_rate_desc' => get_field('feed_rate_desc', $obj->ID),
       'feed_text' => get_field('feed_text', $obj->ID),
       'before_after_title' => get_field('before_after_title', $obj->ID),
       'before_after'      => get_field('before_after', $obj->ID),
       'before_after_items' => get_field('before_after_items', $obj->ID),
     );

     print_theme_template_part('content', 'post', $args);
  }

  public static function print_inclinic_form(){
    if(!function_exists('get_field')){return;}
    $obj = get_queried_object();
    $form_id = get_option('default_subscription_form');

    if(!$form_id ) {return;}

    $shortcode = sprintf('[wpforms id="%s"]',  $form_id);

    $form = do_shortcode($shortcode);
    $output = str_replace('%single_treatment%', $obj->post_title, $form );

    $args = array(
      'output' =>   $output ,
      'form_id'   => md5(sprintf('[wpforms id="%s"]',  $form_id)),
      'title' => 'In <span class="marked">Clinic</span> Visit',
      'comment' => 'Let’s get you booked in for a free consultation',
    );

    print_theme_template_part('register-popup', 'globals', $args);
  }


  public static function print_mobile_cta_popup(){

    if(!function_exists('get_field')) return;

    $obj = get_queried_object();

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

    $form_id = get_option('story_clinic_subscription_form');
    $shortcode =  sprintf('[wpforms id="%s"]',  $form_id);
    $form    = do_shortcode($shortcode);
    $form = str_replace('<option value="%treatments%" >%treatments%</option>', $options, $form );
    $form = str_replace('%story_source%', $obj->post_title, $form );

    $form_inclicnic = ($form_id)? str_replace('%single_treatment%', $obj->post_title, $form ): false;

    $args = array(
      'form_online'    => $form_online,
      'form_inclicnic' => $form_inclicnic,
      'text_cta'      => get_field('cta_title', $obj->ID)?:get_option('mobile_text_cta'),

      'mobile_stars'      => get_field('feed_stars', $obj->ID)?:get_option('mobile_stars'),

      'mobile_rate'      => get_field('feed_rate_desc', $obj->ID)?:get_option('mobile_rate'),

      'price'         => get_field('cta_price', $obj->ID)?:get_option('mobile_price_value'),
      'per_month'     => get_field('per_month', $obj->ID),
    );

    print_theme_template_part('popup-mobile-window', 'post', $args);
  }


  public static function print_mobile_cta(){
    $obj = get_queried_object();

    $args = array(
      'form_id'   => 'popup-mobile-cta',
      'feed_name' => get_field('feed_name', $obj->ID),
      'feed_stars' => get_field('feed_stars', $obj->ID),
      'feed_rate_desc' => get_field('feed_rate_desc', $obj->ID),
    );

    print_theme_template_part('mobile-cta', 'post', $args);
  }

}