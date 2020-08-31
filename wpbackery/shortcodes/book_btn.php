<?php

if ( ! defined( 'ABSPATH' ) ) {
  die( '-1' );
}

class WPBakeryShortCode_book_btn extends WPBakeryShortCode {
   protected function content( $atts, $content = null ) {
    extract( shortcode_atts( array(
      'color' => '',
      'wp_form_id' => false,

    ), $atts ) );

    $replace = sprintf('<span class="%s">%s</span>', $marker, $marked);

    $default_subscription_form = get_option('default_subscription_form');

    $form_id    = ($wp_form_id)? md5(sprintf('[wpforms id="%s"]',  $wp_form_id)) : md5(sprintf('[wpforms id="%s"]',  $default_subscription_form));

    global $wp_popup_forms;

    if(!isset($wp_popup_forms[$form_id])){
      $wp_popup_forms[$form_id] = array(
        'title' => '',
        'comment' => '',
        'shortcode' => '[wpforms id="%s"]',  $wp_form_id,
      );
    }

    $args = array(
      'color'  => $color,
      'form_id' => $form_id,
    );

    ob_start();
    echo print_theme_template_part('book-btn', 'wpbackery', $args);
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
   }
}

add_action('vc_before_init', 'vc_before_init_book_btn');

function vc_before_init_book_btn(){
    $wpforms = get_posts(array(
      'post_type' => 'wpforms',
      'posts_per_page' => -1,
    ));
    $choices = array();
    foreach ($wpforms as $form) {
      $choices[$form->post_title] = $form->ID;
    }

  vc_map( array(
      'base'        => 'book_btn',
      'name'        => __( 'Book', 'theme-translation' ), // translated
      'class'       => 'marked',
      'category'    => __( 'Theme Shortcodes' ),
      'icon'        => THEME_URL.'/assets/images/icons/book.png',
      'show_settings_on_create' => true,
      'params' => array(

        array(
          'type' => 'dropdown',
          "heading" => __('Color', 'theme-translation'),// translate
          'param_name' => 'color',
          'value'  => array(
            __('None') => '',
            __('Black') => 'black',
            __('Gold')  => 'gold',
          ),
        ),

        array(
          'type' => 'dropdown',
          "heading" => __('Form to use', 'theme-translation'),// translate
          'param_name' => 'wp_form_id',
          'value'  => $choices,
        ),
      ),
  ));
}