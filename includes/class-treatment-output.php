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
class theme_treatment_output{
  public static function print_welcome_screen(){

    if(!function_exists('get_field')){return; }

    $obj = get_queried_object();

    $category = wp_get_post_terms($obj->ID, 'treatments_cat', array('fields' => 'all'));

    $cat      = array();

    foreach ($category as $key => $c) {
      $cat[] = $c->name;
    }


    $title_pirces = explode(' ', $obj->post_title);
    $number       = ceil(count($title_pirces)/2);
    $title_pirces[$number] = '<span class="marked">'. $title_pirces[$number];
    $title_pirces[]         = '<span>';

    $args = array(
      'phone'     => '+44 (0)20 3904 7655',
      'title'     => implode(' ', $title_pirces),
      'category'  => implode(', ', $cat),
      'about'     => $obj->post_excerpt,
      'video_url' =>  get_field('video_url', $obj->ID),
      'has_faq'   => get_field('questions_and_answers', $obj->ID),
    );

    $form_id    = get_option('treatment_subscription_form_inclicnic');
    $shortcode = sprintf('[wpforms id="%s"]',  $form_id);
    $args['form_id'] =($form_id)? md5(sprintf('[wpforms id="%s"]',  $form_id)) : false;
    $args['image'] = get_field('image', $obj->ID);
    $args['image_mobile'] = get_field('image_mobile', $obj->ID);
    $args['bg_color'] = get_field('bg_color', $obj->ID);
    $args['adv'] =  array(
      'text'       => get_field('adv_text', $obj->ID),
      'adv_link'   => get_field('adv_link', $obj->ID),
      'tag'        => get_field('adv_tag', $obj->ID),
      'tag_color'  => get_field('tag_color', $obj->ID),
    );


    print_theme_template_part('welcome-screen', 'treatment', $args);
  }

  public static function print_content(){
    $obj = get_queried_object();

    if(function_exists('get_field')){

      $pricing_items = get_field('pricing_items', $obj->ID);

      $pricing_items_city = array();
      if ($pricing_items) {
        foreach ($pricing_items as $key => $item) {
          if(!isset($pricing_items_city[$item['city']])){
            $pricing_items_city[$item['city']] = array();
          }
          $pricing_items_city[$item['city']][] = $item;
        }
      }

      $form_id = get_option('treatment_subscription_form_online');

      $shortcode = sprintf('[wpforms id="%s"]',  $form_id);
      $form    = do_shortcode($shortcode);
      $form_online = ($form_id)? str_replace('%single_treatment%', $obj->post_title, $form ): false;

      $form_id = get_option('treatment_subscription_form_inclicnic');
      $shortcode =  sprintf('[wpforms id="%s"]',  $form_id);
      $form_inclicnic    = ($form_id)? do_shortcode($shortcode): false;

      $args = array(
       'obj'    => $obj,
       'form_online'    => $form_online,
       'form_inclicnic' => $form_inclicnic,
       'pages' => array(
         'pricing'     => array(
            "show"    => true,
            'display' => 'none',
            'text'    => get_field('pricing_text', $obj->ID),
            'title'   => get_field('pricing_title', $obj->ID),
            'notification_title'  => get_field('notification_title', $obj->ID),
            'notification_text'   => get_field('notification_text', $obj->ID),
            'pricing_items'       =>  $pricing_items_city,
         ),
         'beforeafter' => array(
            "show"    => true,
            'display' => 'none',
            'title'   => get_field('before_after_title', $obj->ID),
            'text'   =>  apply_filters('the_content',get_field('before_after', $obj->ID)),
            'before_after_items'   => get_field('before_after_items', $obj->ID),
         ),
         'overview'    => array(
            "show"    => true,
            'display' => 'block',
            'title'   => get_field('what_is_title', $obj->ID),
            'text'    => apply_filters('the_content', get_field('what_is', $obj->ID)),
         ),

         'f_a_q'    => array(
            'title' => get_field('faq_title', $obj->ID)?: '',
            'show'  => true,
            'items' => get_field('questions_and_answers', $obj->ID),
         ),

       ),
      );
      print_theme_template_part('content', 'treatment', $args);
    }
  }

  public static function print_mobile_cta(){
    if(!function_exists('get_field')) return;

    $obj = get_queried_object();

    $form_id = get_option('treatment_subscription_form_online');

    $shortcode = sprintf('[wpforms id="%s"]',  $form_id);
    $form    = do_shortcode($shortcode);
    $form_online = ($form_id)? str_replace('%single_treatment%', $obj->post_title, $form ): false;

    $form_id = get_option('treatment_subscription_form_inclicnic');
    $shortcode =  sprintf('[wpforms id="%s"]',  $form_id);
    $form_inclicnic    = ($form_id)? do_shortcode($shortcode): false;

    $args = array(
      'form_online'    => $form_online,
      'form_inclicnic' => $form_inclicnic,
      'text_cta'      => get_field('cta_title', $obj->ID)?:get_option('mobile_text_cta'),

      'mobile_stars'      => get_field('feed_stars', $obj->ID)?:get_option('mobile_stars'),

      'mobile_rate'      => get_field('feed_rate_desc', $obj->ID)?:get_option('mobile_rate'),

      'price'         => get_field('cta_price', $obj->ID)?:get_option('mobile_price_value'),
      'per_month'     => get_field('per_month', $obj->ID),
    );

    print_theme_template_part('mobile-cta', 'globals', $args);
  }

  public static function print_inclinic_form(){
    if(!function_exists('get_field')){return;}
    $obj = get_queried_object();
    $form_id = get_option('treatment_subscription_form_inclicnic');

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
}

