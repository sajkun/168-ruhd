 <?php

if ( ! defined( 'ABSPATH' ) ) {
  die( '-1' );
}

class WPBakeryShortCode_video_btn_round extends WPBakeryShortCode {
   protected function content( $atts, $content = null ) {
    extract( shortcode_atts( array(
      'link' => false,
      'class' => false,
    ), $atts ) );


    if(!$link) return;

    $link_data = vc_build_link($link);

    ob_start();

    printf('<img src="%3$s/assets/images/play-button.png" class=" trigger-video %2$s" onclick="play_video(\'%1$s\')" alt="">', $link_data['url'], $class, THEME_URL);

    $output = ob_get_contents();
    ob_end_clean();
    return $output;
   }
}


add_action('vc_before_init', 'vc_before_init_video_btn_round');

function vc_before_init_video_btn_round(){
  vc_map( array(
      'base'        => 'video_btn_round',
      'name'        => __( 'Video Button', 'theme-translation' ), // translated
      'category'    => __( 'Theme Shortcodes' ),
      'icon'        => THEME_URL.'/assets/images/icons/play-button.png',
      'show_settings_on_create' => true,

      'params' => array(
        array(
          'type' => 'textfield',
          "heading" => __('Additional Class', 'theme-translation'),// translate
          'param_name' => 'class',
        ),
        array(
          "type" => "vc_link",
          "heading" => __("Link", "theme-translations"),
          "param_name" => "link",
        ),
      ),
  ));
}