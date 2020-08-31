<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

add_filter( 'widget_text', 'do_shortcode' );

add_shortcode('emergency_book', 'emergency_book_cb');

function emergency_book_cb(){
   $wp_form_id = get_option('subscription_form_emergency');

  if(!$wp_form_id) return;

  global $wp_popup_forms;

  $shortcode    = sprintf('[wpforms id="%s"]',  $wp_form_id);
  $form_id   = md5( $shortcode );

   $wp_popup_forms[ $form_id ] = array(
        'title' => 'Emergency <span class="marked">Visit</span>',
        'comment' => '',
        'shortcode' => '[wpforms id="%s"]',  $wp_form_id,
      );

  $args = array(
    'form_id' =>  $form_id,
  );

  ob_start();
  echo print_theme_template_part('emergency-btn', 'globals', $args);
  $output = ob_get_contents();
  ob_end_clean();
  return $output;
}