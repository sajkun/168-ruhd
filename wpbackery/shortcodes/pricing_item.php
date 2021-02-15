<?php

if ( ! defined( 'ABSPATH' ) ) {
  die( '-1' );
}
add_action('vc_before_init', 'vc_before_init_pricing_title');

function vc_before_init_pricing_title(){
  vc_map( array(
    'base'        => 'pricing_title',
    'name'        => __( 'Category', 'theme-translation' ), //
    'category'    => __( 'Theme Shortcodes' ),
    'icon'        => THEME_URL.'/assets/images/icons/pound.png',
    'show_settings_on_create' => true,
    'as_child' => array('only' => 'pricing_container'),

    'custom_markup' =>
         '
         <input type="hidden" class="wpb_vc_param_value image attach_image " name="image" value="">

         <h4 class="wpb_element_title">

           <span class="no_image_image_id vc_element-icon icon-image"></span>

            '.__( 'Category', 'theme-translation' ).
            '
           </h4>
           <span class="vc_admin_label admin_label_category" style="display: inline;">
              <label>  </label>
            </span>
            ',


      'params' => array(
        array(
          'type' => 'textfield',
          "heading" => __('Category', 'theme-translation'),// translate
          'param_name' => 'category',
        ),
      ),
  ));
}

add_action('vc_before_init', 'vc_before_init_pricing_item');

function vc_before_init_pricing_item(){
  vc_map( array(
    'base'        => 'pricing_item',
    'name'        => __( 'Treatment price and description', 'theme-translation' ), //
    'category'    => __( 'Theme Shortcodes' ),
    'icon'        => THEME_URL.'/assets/images/icons/pound.png',
    'show_settings_on_create' => true,
    'as_child'    => array('only' => 'pricing_container'),

    'custom_markup' =>
         '
         <input type="hidden" class="wpb_vc_param_value image attach_image " name="image" value="">

         <h4 class="wpb_element_title">

           <span class="no_image_image_id vc_element-icon icon-image"></span>

            '.__( 'Treatment', 'theme-translation' ).
            '
           </h4>
           <span class="vc_admin_label admin_label_title" style="display: inline;">
              <label>'.__('title','theme-translations').' </label>
            </span>
           <span class="vc_admin_label admin_label_price_value" style="display: inline;">
             <label>'.__('price','theme-translations').' </label>
            </span> <br>
            ',

      'params' => array(
        array(
          'type' => 'textfield',
          "heading" => __('Treatment Title', 'theme-translation'),// translate
          'param_name' => 'title',
        ),
        array(
          'type' => 'textfield',
          "heading" => __('Treatment descriptions, e.g. per tooth, etc.', 'theme-translation'),// translate
          'param_name' => 'description',
        ),
        array(
          'type' => 'textfield',
          "heading" => __('Price', 'theme-translation'),// translate
          'param_name' => 'price_value',
        ),
        array(
          'type' => 'textfield',
          "heading" => __('Price comment, e.g. starting from', 'theme-translation'),// translate
          'param_name' => 'price_comment',
        ),
        array(
          'type' => 'textfield',
          "heading" => __('Additional Classes', 'theme-translation'),// translate
          'param_name' => 'style',
        ),
      ),
  ));
}


class WPBakeryShortCode_pricing_title extends WPBakeryShortCode {
   protected function content( $atts, $content = null ) {
    extract( shortcode_atts( array(
      'category' => '',
    ), $atts ) );

    if(!$category){
      return;
    }

    return sprintf('<div class="col-12"><span class="section-title">%s</span> <div class="spacer-h-20"></div></div>', $category);
   }
}


class WPBakeryShortCode_pricing_item extends WPBakeryShortCode {
   protected function content( $atts, $content = null ) {
    extract( shortcode_atts( array(
      'title' => '',
      'description' => '',
      'price_value' => '',
      'price_comment' => '',
      'style' => '',
    ), $atts ) );

    if(!$title && !$price){
      return;
    }

    $args = array(
      'title' => $title,
      'description' => $description,
      'price' => $price_value,
      'price_comment' => $price_comment,
      'style' => $style,
    );

    ob_start();
    echo print_theme_template_part('pricing-item', 'wpbackery', $args);
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
  }
}