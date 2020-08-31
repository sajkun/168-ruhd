<?php

if ( ! defined( 'ABSPATH' ) ) {
  die( '-1' );
}

class WPBakeryShortCode_marked_text extends WPBakeryShortCode {
   protected function content( $atts, $content = null ) {
    extract( shortcode_atts( array(
      'text' => '',
      'marked' => '',
      'marker' => '',
      'color' => '',
      'style' => 'section-title',
    ), $atts ) );

    $style .= ' ' . 'section-title';

    $replace = sprintf('<span class="%s">%s</span>', $marker, $marked);

    $args = array(
      'text'   =>  str_replace($marked, $replace, $text),
      'color'  => $color,
      'style'  => $style,
    );

    ob_start();
    echo print_theme_template_part('marked-text', 'wpbackery', $args);
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
   }
}


add_action('vc_before_init', 'vc_before_init_marked_text');

function vc_before_init_marked_text(){
  vc_map( array(
      'base'        => 'marked_text',
      'name'        => __( 'Marked Text', 'theme-translation' ), // translated
      'class'       => 'marked',
      'category'    => __( 'Theme Shortcodes' ),
      'icon'        => THEME_URL.'/assets/images/icons/marked.png',
      'description' => __('Displays text with custom underline', 'theme-translation', 'theme-translations'), // translated

    'custom_markup' =>
       '
       <input type="hidden" class="wpb_vc_param_value image attach_image " name="image" value="">

       <h4 class="wpb_element_title">
        '.__( 'Marked Text', 'theme-translation' ). '
        <img src="'.THEME_URL.'/assets/images/icons/marked.png" style="width:48px; height:auto" class="attachment-thumbnail vc_general vc_element-icon" data-name="image" alt="" title="" style="display:none">
       </h4>
         <div style="height: 10px"></div>
         <span class="vc_admin_label admin_label_text" style="display: inline;">
           <label> Text </label>
          </span> <br>
          ',

      'show_settings_on_create' => true,

      'params' => array(
        array(
          'type' => 'textarea',
          "heading" => __('Text', 'theme-translation'),// translate
          'param_name' => 'text',
        ),

        array(
          'type' => 'textarea',
          "heading" => __('Marked Part of a text', 'theme-translation'),// translate
          "description" => __('Place a text part that you want to be marked. This text should be a part of text from field "text". Case sensetive.', 'theme-translation'),// translate
          'param_name' => 'marked',
        ),

        array(
          'type' => 'textfield',
          "heading" => __('Additional Style', 'theme-translation'),// translate
          'param_name' => 'style',
        ),

        array(
          'type' => 'dropdown',
          "heading" => __('Marker', 'theme-translation'),// translate
          'param_name' => 'marker',
          'value'  => array(
            __('None') => '',
            __('White') => 'marked',
            __('Gold')  => 'marked2',
          ),
        ),

        array(
          'type' => 'colorpicker',
          "heading" => __('Text Color', 'theme-translation'),// translate
          'param_name' => 'color',
          'value' => '#000',
        ),


      ),
  ));
}