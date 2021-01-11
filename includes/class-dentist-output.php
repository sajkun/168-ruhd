
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
class theme_dentist_output{
 public static function print_welcome_screen(){
    if(!function_exists('get_field')){return;}
    $obj = get_queried_object();
    $category = wp_get_post_terms($obj->ID, 'category_doc', array('fields' => 'all'));
    $cat      = array();

    foreach ($category as $key => $c) {
      $cat[] = $c->name;
    }


    $title_pirces = explode(' ', $obj->post_title);
    $number       = ceil(count($title_pirces)/2);
    $title_pirces[$number] = '<span class="marked">'. $title_pirces[$number];
    $title_pirces[]         = '<span>';

    $image_id = get_post_thumbnail_id($obj->ID);

    $prefix = get_field('prefix', $obj->ID)?: '';

    $args = array(
      'title'         =>    $prefix . get_field('first_name', $obj->ID) . ' '.get_field('last_name', $obj->ID),
      'category'      => implode(', ', $cat),
      'bg_color'      => '#f8e8d8',
      'grade'         => get_field('grades', $obj->ID),
      'doctor_post'   => get_field('doctor_post', $obj->ID),
      'about'         => get_field('about', $obj->ID),
      'name'          => get_field('first_name', $obj->ID) ,
      'insta_url'     => get_field('insta_url', $obj->ID) ,
      'image'         =>wp_get_attachment_image_url( $image_id, 'full'),
      'smile_stories' => get_field('smile_stories', $obj->ID),
    );

    $form_id    = get_option('dentist_subscription_form_inclinic');


    $shortcode  = sprintf('[wpforms id="%s"]',  $form_id);

    $args['form_id'] =($form_id)? md5(sprintf('[wpforms id="%s"]',  $form_id)) : false;

    print_theme_template_part('welcome-screen', 'dentist', $args);
 }

  public static function print_content(){
   if(!function_exists('get_field')){return;}

    global $wp_popup_forms;
    $obj = get_queried_object();
    $first_name =  get_field('first_name', $obj->ID);
    $last_name  =  get_field('last_name', $obj->ID);

    if(function_exists('get_field')){

    $form_id = get_option('dentist_subscription_form_online');
    $shortcode = sprintf('[wpforms id="%s"]',  $form_id);

    unset($wp_popup_forms[md5( $shortcode)]);

    $form    = do_shortcode($shortcode);


    $treatments = get_posts(array(
      'posts_per_page' => -1,
      'post_type' => 'theme_treatment'
    ));

    $treatments     = get_field('dentists_treatments', $obj->ID)?: $treatments;


    $options = '';

    foreach ($treatments as $t) {
      $selected = ($t->post_title === $obj->post_title)? 'selected="selected"' : '';
      $options .= sprintf('<option value="%1$s" %2$s >%1$s</option>', $t->post_title, $selected );
    }

    $dentist_clinic = get_field('dentist_clinic', $obj->ID);
    $clinics = '';

    foreach ($dentist_clinic as $t) {
      $clinics .= sprintf('<option value="%1$s" >%1$s</option>', $t->post_title );
    }

    $output          = str_replace('<option value="%treatments%" >%treatments%</option>', $options, $form );
    $output          = str_replace('%dentist_name%',  $first_name.' '.$last_name, $output );
    $output          = str_replace('%dentist_first_name%', $first_name, $output );

    $output          = str_replace('<option value="%theme_clinics%" >%theme_clinics%</option>', $clinics, $output );

    $form_online = ($form_id)?   $output : false;
    $form_id   = get_option('dentist_subscription_form_inclinic');
    $shortcode =  sprintf('[wpforms id="%s"]',  $form_id);
    unset($wp_popup_forms[md5( $shortcode)]);
    $form      = do_shortcode($shortcode);
    $output    = str_replace('%dentist_name%',  $first_name.' '.$last_name, $form );
    $output    = str_replace('%dentist_first_name%', $first_name, $output );


    $output          = str_replace('<option value="%theme_clinics%" >%theme_clinics%</option>', $clinics, $output );


    $form_inclicnic    = ($form_id)?    $output : false;

    $smile_stories = get_field('smile_stories', $obj->ID);

    $smile_stories_data = array();

    if($smile_stories){
      foreach ($smile_stories as $story) {
        $smile_stories_data[] = array(
          'title' => $story->post_title,
          'video_url' => get_field('video_url', $story->ID),
          'category'  => get_field('sub_title', $story->ID),
          'url'       => get_permalink($story),
          'bg_img'    => get_the_post_thumbnail_url($story, 'full'),
        );
      }
    }

    $first_name =  get_field('first_name', $obj->ID);
    $last_name  =  get_field('last_name', $obj->ID);

     $args = array(
       'form_online'    => $form_online,
       'form_inclicnic' => $form_inclicnic,
       'first_name'     => $first_name,
       'pages' => array(
         'smile' => array(
            "show"    => true,
            'display' => 'none',
            'title'   => get_field('smile_stories_title', $obj->ID),
            'smile_stories'   => $smile_stories_data,
         ),
         'about'    => array(
            "show"    => true,
            'display' => 'block',
            'title'   => get_field('what_is_title', $obj->ID),
            'text'    => apply_filters('the_content', get_field('what_is', $obj->ID)),
         ),
       ),
     );

     print_theme_template_part('content', 'dentist', $args);
    }
  }


  public static function print_inclinic_form(){
    if(!function_exists('get_field')){return;}
    $obj = get_queried_object();
    $first_name =  get_field('first_name', $obj->ID);
    $last_name  =  get_field('last_name', $obj->ID);
    $form_id    =  get_option('dentist_subscription_form_inclinic');

    $dentist_clinic = get_field('dentist_clinic', $obj->ID);
    $clinics = '';

    foreach ($dentist_clinic as $t) {
      $clinics .= sprintf('<option value="%1$s" >%1$s</option>', $t->post_title );
    }

    if(!$form_id ) {return;}

    $shortcode = sprintf('[wpforms id="%s"]',  $form_id);

    $form   = do_shortcode($shortcode);

    $output = str_replace('%dentist_name%',  $first_name.' '.$last_name, $form );

    $output = str_replace('%dentist_first_name%', $first_name, $output );

    $output          = str_replace('<option value="%theme_clinics%" >%theme_clinics%</option>', $clinics, $output );

    $args = array(
      'output' =>   $output ,
      'form_id'   => md5(sprintf('[wpforms id="%s"]',  $form_id)),
      'title'   => 'Book <span class="marked">with</span> '. $first_name ,
      'comment' => 'Let’s get you booked in for a free consultation',
    );

    print_theme_template_part('register-popup', 'globals', $args);
  }

  public static function print_mobile_cta(){
    if(!function_exists('get_field')) return;

    $form_id = get_option('dentist_subscription_form_online');
    $shortcode = sprintf('[wpforms id="%s"]',  $form_id);
    $form    = do_shortcode($shortcode);
    $first_name =  get_field('first_name', $obj->ID);

    $treatments     = get_field('dentists_treatments', $obj->ID)?: $treatments;

    $options = '';

    foreach ($treatments as $t) {
      $selected = ($t->post_title === $obj->post_title)? 'selected="selected"' : '';
      $options .= sprintf('<option value="%1$s" %2$s >%1$s</option>', $t->post_title, $selected );
    }


    $dentist_clinic = get_field('dentist_clinic', $obj->ID);
    $clinics = '';

    foreach ($dentist_clinic as $t) {
      $clinics .= sprintf('<option value="%1$s" >%1$s</option>', $t->post_title );
    }

    $form = str_replace('<option value="%treatments%" >%treatments%</option>', $options, $form );

    $form          = str_replace('<option value="%theme_clinics%" >%theme_clinics%</option>', $clinics, $form );


    $form_online = ($form_id)? str_replace('%single_treatment%', $obj->post_title, $form ): false;

    $form_id = get_option('dentist_subscription_form_inclinic');
    $shortcode =  sprintf('[wpforms id="%s"]',  $form_id);
    $form    = do_shortcode($shortcode);
    $form = str_replace('<option value="%treatments%" >%treatments%</option>', $options, $form );

    $form          = str_replace('<option value="%theme_clinics%" >%theme_clinics%</option>', $clinics, $form );

    $form_inclicnic = ($form_id)? str_replace('%single_treatment%', $obj->post_title, $form ): false;

    $args = array(
      'form_online'    => $form_online,
      'first_name'     => $first_name,
      'form_inclicnic' => $form_inclicnic,
      'text_cta'      => get_field('cta_title', $obj->ID)?:get_option('mobile_text_cta'),

      'mobile_stars'      => get_field('feed_stars', $obj->ID)?:get_option('mobile_stars'),

      'mobile_rate'      => get_field('feed_rate_desc', $obj->ID)?:get_option('mobile_rate'),

      'price'         => get_field('cta_price', $obj->ID)?:get_option('mobile_price_value'),

      'per_month'     => get_field('per_month', $obj->ID),
    );

    print_theme_template_part('mobile-cta', 'dentist', $args);
  }

}