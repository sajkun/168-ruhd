<?php

if ( ! defined( 'ABSPATH' ) ) {
  die( '-1' );
}

class WPBakeryShortCode_accordeon_item extends WPBakeryShortCode {
   protected function content( $atts, $content = null ) {
    extract( shortcode_atts( array(

      'title' => '',
      'expand' => false,
      'text' => '',
    ), $atts ) );


    $args = array(
      'title'  => $title,
      'text'  => $text,
      'expand'  => $expand,
    );
    ob_start();
    echo print_theme_template_part('accordeon', 'wpbackery', $args);
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
   }
}


add_action('vc_before_init', 'vc_before_init_accordeon_item');

function vc_before_init_accordeon_item(){
  vc_map( array(
      'base'        => 'accordeon_item',
      'name'        => __( 'Accordeon Element', 'theme-translation' ), // translated
      'class'       => 'marked',
      'category'    => __( 'Theme Shortcodes' ),
      'icon'        => THEME_URL.'/assets/images/icons/acc.png',
      'show_settings_on_create' => true,
    'custom_markup' =>
       '
       <input type="hidden" class="wpb_vc_param_value image attach_image " name="image" value="">

       <h4 class="wpb_element_title">
        '.__( 'Accordeon Element', 'theme-translation' ). '
        <img src="'.THEME_URL.'/assets/images/icons/acc.png" style="width:48px; height:auto" class="attachment-thumbnail vc_general vc_element-icon" data-name="image" alt="" title="" style="display:none">
       </h4>
         <div style="height: 10px"></div>
         <span class="vc_admin_label admin_label_title" style="display: inline;">
           <label> Text </label>
          </span> <br>
         <div style="height: 10px"></div>
         <span class="vc_admin_label admin_label_text" style="display: inline;">
           <label> Text </label>
          </span> <br>
          ',
      'params' => array(
        array(
          'type' => 'textfield',
          "heading" => __('Title', 'theme-translation'),// translate
          'param_name' => 'title',
        ),
        array(
          'type' => 'textarea',
          "heading" => __('Text', 'theme-translation'),// translate
          'param_name' => 'text',
        ),

        array(
          "type" => "checkbox",
          "heading" => __("Expanded block", "theme-translations"),
          "param_name" => "expand",
        ),
      ),
  ));
}