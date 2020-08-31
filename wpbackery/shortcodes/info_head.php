<?php

if ( ! defined( 'ABSPATH' ) ) {
  die( '-1' );
}

class WPBakeryShortCode_info_head extends WPBakeryShortCode {
   protected function content( $atts, $content = null ) {
    extract( shortcode_atts( array(
      'text' => '',
      'link' => '',
      'label' => '',
      'background' => '',
    ), $atts ) );


    $link_data = vc_build_link($link);

    $link_data['href'] =  $link_data['url'];

    unset( $link_data['url'] );

    $args = array(
      'text'       => $text,
      'link_data'  => $link_data,
      'label'      => $label,
      'background' => $background,
    );

    ob_start();
    echo print_theme_template_part('info-head', 'wpbackery', $args);
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
   }
}


add_action('vc_before_init', 'vc_before_init_info_head');

function vc_before_init_info_head(){
  vc_map( array(
      'base'        => 'info_head',
      'name'        => __( 'Advertisment Link', 'theme-translation' ), // translated
      'class'       => '',
      'category'    => __( 'Theme Shortcodes' ),
      'icon'        => THEME_URL.'/assets/images/icons/tag.png',
      'description' => __('Displays link with a tag', 'theme-translation', 'theme-translations'), // translated

    'custom_markup' =>
       '
       <input type="hidden" class="wpb_vc_param_value image attach_image " name="image" value="">

       <h4 class="wpb_element_title">
        '.__( 'Advertisment Link', 'theme-translation' ). '
        <img src="'.THEME_URL.'/assets/images/icons/tag.png" style="width:48px; height:auto" class="attachment-thumbnail vc_general vc_element-icon" data-name="image" alt="" title="" style="display:none">
       </h4>
         <div style="height: 10px"></div>
         <span class="vc_admin_label admin_label_text" style="display: inline;">
           <label> Text </label>
          </span> <br>
          ',

      'show_settings_on_create' => true,

      'params' => array(
        array(
          'type' => 'textfield',
          "heading" => __('Text', 'theme-translation'),// translate
          'param_name' => 'text',
        ),

        array(
          "type" => "vc_link",
          "heading" => __("Link", "theme-translations"),
          "param_name" => "link",
         ),

        array(
          'type' => 'textfield',
          "heading" => __('Label', 'theme-translation'),// translate
          'param_name' => 'label',
        ),

        array(
          'type' => 'colorpicker',
          "heading" => __('Tag Background Color', 'theme-translation'),// translate
          'param_name' => 'background',
        ),


      ),
  ));
}