<?php

if ( ! defined( 'ABSPATH' ) ) {
  die( '-1' );
}

class WPBakeryShortCode_theme_clinics extends WPBakeryShortCode {
   protected function content( $atts, $content = null ) {
    global $theme_init;
    extract( shortcode_atts( array(
      'ids' => false,
    ), $atts ) );

    $post_ids = explode(',', $ids);


  $clinics = get_posts(array(
    'posts_per_page' => -1,
    'post_type' => 'theme_clinics',
    'post__in' =>  $post_ids,
  ));

  foreach ($clinics as $id => $t) {
    $image_id = get_post_thumbnail_id($t->ID);

    $clinics[$id]->url = get_permalink($t);

    $text = ($t->post_excerpt)?:  strip_shortcodes(strip_tags($t->post_content));

    $text = strlen($text) > 100? substr($text,0, 100).'...' : $text;

    $clinics[$id]->text = $text;

    $clinics[$id]->images = array(
      'lg' => wp_get_attachment_image_url( $image_id, 'trt_lg'),
      'sm' => wp_get_attachment_image_url( $image_id,  'trt_sm'),
    );

    $category = get_field('clinic_location', $t->ID);

    if(isset($category)){
      $clinics[$id]->term    =  $category;
    }
  }

    unset( $link_data['url'] );

    $args = array(
      'items' => array_slice($clinics, 0 , 3),
    );

    ob_start();

    echo print_theme_template_part('clinics', 'wpbackery', $args);
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
   }
}


add_action('vc_before_init', 'vc_before_init_theme_clinics');

function vc_before_init_theme_clinics(){

  $treatments = get_posts(array(
    'posts_per_page' => -1,
    'post_type' => 'theme_clinics'
  ));

  $choices = array();

  foreach ($treatments as $t) {
     $choices[$t->post_title] = $t->ID;
  }

  vc_map( array(
      'base'        => 'theme_clinics',
      'name'        => __( 'Our Clinics', 'theme-translation' ), // translated
      'class'       => 'marked',
      'category'    => __( 'Theme Shortcodes' ),
      'icon'        => THEME_URL.'/assets/images/icons/house.svg',
      'show_settings_on_create' => true,

      'params' => array(
        array(
          'type' => 'dropdown_multi',
          "heading" => __('Select clinics', 'theme-translation'),
          'param_name' => 'ids',
          'value' => $choices,
        ),

        array(
          "type" => "vc_link",
          "heading" => __("View All Link", "theme-translations"),
          "param_name" => "link",
        ),

      ),
  ));
}