<?php

if ( ! defined( 'ABSPATH' ) ) {
  die( '-1' );
}

class WPBakeryShortCode_read_more_btn extends WPBakeryShortCode {
   protected function content( $atts, $content = null ) {
    extract( shortcode_atts( array(
      'link' => false,
      'alternate_action' => 'basic',
      'text' => __('Discover More', 'theme-translations'),
    ), $atts ) );


    // if(!$link && !$trigger_form) return;


    $link_data = vc_build_link($link);

    $link_data['href'] =  $link_data['url'];

    $trigger_form = false;

    if($alternate_action != 'basic'){
      $wp_form_id = get_option($alternate_action);
      $form_id    =   md5(sprintf('[wpforms id="%s"]',  $wp_form_id));
      $trigger_form = true;
    }

    unset( $link_data['url'] );

    $args = array(
      'link_data'  => ($trigger_form)? array('href' =>'javascript:void(0)') : $link_data,
      'trigger_form'  => $trigger_form && $alternate_action != 'online_journey',
      'alternate_action'  => $alternate_action,
      'text'          => $text,
      'form_id'       => $form_id,
    );

    ob_start();
    echo print_theme_template_part('read-more-btn', 'wpbackery', $args);
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
   }
}


add_action('vc_before_init', 'vc_before_init_read_more_btn');

function vc_before_init_read_more_btn(){
  vc_map( array(
      'base'        => 'read_more_btn',
      'name'        => __( 'Read More Link', 'theme-translation' ), // translated
      'class'       => 'marked',
      'category'    => __( 'Theme Shortcodes' ),
      'icon'        => THEME_URL.'/assets/images/svg/arrow.svg',
      'show_settings_on_create' => true,

      'params' => array(
        array(
          'type' => 'textfield',
          "heading" => __('Text', 'theme-translation'),// translate
          'param_name' => 'text',
          'value'      => __('Discover More', 'theme-translations'),
        ),
        array(
          "type" => "vc_link",
          "heading" => __("Link", "theme-translations"),
          "param_name" => "link",
        ),

       array(
          "type" => "dropdown",
          "heading" => __("Alternative Action", "theme-translations"),
          "param_name" => "alternate_action",
          'value' => array(
            'Simple Link' => 'basic',
            'Show Inclinic Visit Form' => 'default_subscription_form_inclinic',
            'Show Online Visit Form'   => 'default_subscription_form',
            'Online Journey'   => 'online_journey',
          ),
        ),
      ),
  ));
}