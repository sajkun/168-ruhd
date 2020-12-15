<?php

if ( ! defined( 'ABSPATH' ) ) {
  die( '-1' );
}
add_action('vc_before_init', 'vc_before_init_pricing_container');

function vc_before_init_pricing_container(){
  vc_map( array(
      'base'        => 'pricing_container',
      'name'        => __( 'Pricing container', 'theme-translation' ), //
      'category'    => __( 'Theme Shortcodes' ),
      'icon'        => THEME_URL.'/assets/images/icons/pound.png',
      "as_parent" => array('only' => 'pricing_item'),
      "content_element" => true,
      "show_settings_on_create" => true,
      "is_container" => true,
      "js_view" => 'VcColumnView',
      'params' => array(

        array(
          "type" => "textfield",
          "heading" => __("Field Id to pair with tabs", "theme-translations"),
          "param_name" => "field_id",
         ),

        array(
          'type' => 'dropdown',
          "heading" => __('Visible by default', 'theme-translation'),// translate
          'param_name' => 'visibility',
          'value'  => array(
            __('No')  => 'none',
            __('Yes') => 'block',
          ),
        ),
     ),
  ));
}


class WPBakeryShortCode_pricing_container extends WPBakeryShortCodesContainer {
  protected function content( $atts, $content = null ) {
    extract( shortcode_atts( array(
      'field_id' => '',
      'visibility' => 'none',
    ), $atts ) );

    $data      = explode('][', $content);
    $elements = array();

    ob_start();
    foreach ($data as $_data) {
      $shortcode  = str_replace(array('[',']') ,'', $_data);
      $shortcode  = '['. $shortcode . ']';

      echo do_shortcode($shortcode);
    }

    $output = ob_get_contents();

    $show_class = '';

    $data_display = $visibility;

    $template =  sprintf('<div class="page-item" id="%2$s" data-display="%3$s"><div class="row">%1$s</div></div>', $output,   $field_id, $data_display);
    ob_end_clean();

    return $template;
  }
}