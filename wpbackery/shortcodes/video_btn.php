<?php

if ( ! defined( 'ABSPATH' ) ) {
  die( '-1' );
}

class WPBakeryShortCode_video_btn extends WPBakeryShortCode {
   protected function content( $atts, $content = null ) {
    extract( shortcode_atts( array(
      'link' => false,
      'text' => __('Watch Video', 'theme-translations'),
    ), $atts ) );


    if(!$link) return;


    $link_data = vc_build_link($link);

    $link_data['href'] =  $link_data['url'];

    unset( $link_data['url'] );

    $args = array(
      'link_data'  => $link_data,
      'text'  => $text,
    );

    ob_start();
    echo print_theme_template_part('video-btn', 'wpbackery', $args);
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
   }
}


add_action('vc_before_init', 'vc_before_init_video_btn');

function vc_before_init_video_btn(){
  vc_map( array(
      'base'        => 'video_btn',
      'name'        => __( 'Video Link', 'theme-translation' ), // translated
      'class'       => 'marked',
      'category'    => __( 'Theme Shortcodes' ),
      'icon'        => THEME_URL.'/assets/images/svg/play.svg',
      'show_settings_on_create' => true,

      'params' => array(
        array(
          'type' => 'textfield',
          "heading" => __('Text', 'theme-translation'),// translate
          'param_name' => 'text',
          'value'      => __('Watch Video', 'theme-translations'),
        ),
        array(
          "type" => "vc_link",
          "heading" => __("Link", "theme-translations"),
          "param_name" => "link",
        ),

      ),
  ));
}