<?php

if ( ! defined( 'ABSPATH' ) ) {
  die( '-1' );
}

class WPBakeryShortCode_live_chat_btn extends WPBakeryShortCode {
   protected function content( $atts, $content = null ) {
    extract( shortcode_atts( array(
      'color' => '#7c4e26',
    ), $atts ) );


    $args = array(
       'color' => $color,
    );

    ob_start();
    echo print_theme_template_part('chat-btn', 'wpbackery', $args);
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
   }
}


add_action('vc_before_init', 'vc_before_init_live_chat_btn');

function vc_before_init_live_chat_btn(){
  vc_map( array(
      'base'        => 'live_chat_btn',
      'name'        => __( 'Live', 'theme-translation' ), // translated
      'class'       => 'marked',
      'category'    => __( 'Theme Shortcodes' ),
      'icon'        => THEME_URL.'/assets/images/icons/live.png',

      'show_settings_on_create' => false,

      'params' => array(

        array(
          'type' => 'colorpicker',
          "heading" => __('Text Color', 'theme-translation'),// translate
          'param_name' => 'color',
          'value' => '#7c4e26',
        ),

      ),
  ));
}