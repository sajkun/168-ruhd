<?php

if ( ! defined( 'ABSPATH' ) ) {
  die( '-1' );
}

class WPBakeryShortCode_popular_treatments extends WPBakeryShortCode {
   protected function content( $atts, $content = null ) {
    global $theme_init;
    extract( shortcode_atts( array(
      'ids' => false,
      'link' => false,
    ), $atts ) );

    $post_ids = explode(',', $ids);


  $treatments = get_posts(array(
    'posts_per_page' => -1,
    'post_type' => 'theme_treatment',
    'post__in' =>  $post_ids,
  ));

  $categories = array();


  foreach ($treatments as $id => $t) {
    $image_id = get_post_thumbnail_id($t->ID);

    $treatments[$id]->url = get_permalink($t);

    $text = ($t->post_excerpt)?:  strip_shortcodes(strip_tags($t->post_content));

    $text = strlen($text) > 100? substr($text,0, 100).'...' : $text;

    $treatments[$id]->text = $text;

    $treatments[$id]->images = array(
      'lg' => wp_get_attachment_image_url( $image_id, 'trt_lg'),
      'sm' => wp_get_attachment_image_url( $image_id,  'trt_sm'),
    );

    $category = wp_get_post_terms($t->ID, 'treatments_cat', array('fields' => 'all'));

    if(isset($category[0])){
      $treatments[$id]->term    = $category[0]->name;
      $treatments[$id]->term_id = $category[0]->term_id;
    }

    if(isset($category[0]) && !isset($categories[$category[0]->term_id])){
      $categories[$category[0]->term_id] = array(
        'items' => array(),
        'term' => $category[0],
      );
    }

    $categories[$category[0]->term_id]['items'][] = $treatments[$id];
  }

    $link_data = vc_build_link($link);

    $link_data['href'] =  $link_data['url'];

    unset( $link_data['url'] );

    $args = array(
      'items' => array_slice($treatments, 0 , 3),
      'categories' => $categories,
      'link_data' => $link_data,
    );

    // wp_localize_script( $theme_init->main_script_slug, 'treatments', $treatments );
    wp_localize_script( $theme_init->main_script_slug, 'treatments_categories', $categories );

    ob_start();

    echo print_theme_template_part('popular-treatment', 'wpbackery', $args);
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
   }
}


add_action('vc_before_init', 'vc_before_init_popular_treatments');

function vc_before_init_popular_treatments(){

  $treatments = get_posts(array(
    'posts_per_page' => -1,
    'post_type' => 'theme_treatment'
  ));

  $choices = array();

  foreach ($treatments as $t) {
     $choices[$t->post_title] = $t->ID;
  }

  vc_map( array(
      'base'        => 'popular_treatments',
      'name'        => __( 'Popular treatments', 'theme-translation' ), // translated
      'class'       => 'marked',
      'category'    => __( 'Theme Shortcodes' ),
      'icon'        => THEME_URL.'/assets/images/icons/tooth.svg',
      'show_settings_on_create' => true,

      'params' => array(
        array(
          'type' => 'dropdown_multi',
          "heading" => __('Select treatments', 'theme-translation'),
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