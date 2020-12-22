<?php

if ( ! defined( 'ABSPATH' ) ) {
  die( '-1' );
}

add_action('vc_before_init', 'vc_before_init_dentists_list');

function vc_before_init_dentists_list(){
  vc_map( array(
      'base'        => 'dentists_list',
      'name'        => __( 'Team', 'theme-translation' ), //
      'category'    => __( 'Theme Shortcodes' ),
      'icon'        => THEME_URL.'/assets/images/icons/dentist_black.svg',
      'show_settings_on_create' => false,
      'params' => array(),
  ));
}


class WPBakeryShortCode_dentists_list extends WPBakeryShortCode {
   protected function content( $atts, $content = null ) {

    if(!function_exists('get_field')){return '';}

    $args = array(
      'posts_per_page' => -1,
      'post_type' => 'theme_doctor',
    );

    $team = get_posts($args);

    $formatted = array();

    foreach ($team as $t) {
      $image_id = (int)get_field('foto_for_dentists_list', $t->ID);

      $category = wp_get_post_terms($t->ID, 'category_doc', array('field' => 'all'));

      $prefix = '';

      $prefix = get_field('prefix', $t->ID)?: '';;

      $category_doc = wp_get_post_terms($t->ID, 'category_doc' , array('fields'=>'names'));


      $category_doc = array_map(function($el){
        return strtolower($el);
       }, $category_doc );

      $is_dentist = in_array('dentist', $category_doc) ||  in_array('dentists', $category_doc) || in_array('doctor', $category_doc);

      $temp = array(
        'name' => $prefix . trim(get_field('first_name', $t->ID) . ' ' . get_field('last_name', $t->ID)),
        'grades' => get_field('grades', $t->ID),
        'spesilization' => get_field('specialization', $t->ID),
        'photo'  => wp_get_attachment_image_url( $image_id, 'dentist_photo'),
        'url'    => $is_dentist? get_permalink($t) : 'javascript:void(0)',
      );

      foreach ($category as $c) {

        if(!isset($formatted[$c->slug])){
          $formatted[$c->slug] = array();
        }

        $formatted[$c->slug][] =  $temp;
      }
    }

    $args = array(
      'team' => $formatted,
    );
    clog($args);
    ob_start();

    echo print_theme_template_part('dentists-list', 'wpbackery', $args);

    $output = ob_get_contents();
    ob_end_clean();

    return $output;

   }
}