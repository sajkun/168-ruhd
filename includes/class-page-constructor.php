<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
//***
/**
  * Page Construct Class
  *
  * Constructs page
  *
  * @package theme/helper
  *
  * @since v1.0
  */
class theme_construct_page{

  /**
  * Adds hooks for wordpress template
  * Used templates: index.php
  *
  * @return void
  */
  public static function init(){
    add_action('do_theme_header', array('theme_content_output', 'print_header'));
    add_action('do_theme_footer', array('theme_content_output', 'print_footer'));

    if(self::is_page_type('treatment')){
      clog('treatment');
      add_action('do_theme_content', array('theme_treatment_output', 'print_welcome_screen'));
      add_action('do_theme_content', array('theme_treatment_output', 'print_content'),20);
      add_action('do_theme_after_footer', array('theme_treatment_output', 'print_inclinic_form'),20);


    } else if(self::is_page_type('dentist')){

      clog('dentist');
      add_action('do_theme_content', array('theme_dentist_output', 'print_welcome_screen'));
      add_action('do_theme_content', array('theme_dentist_output', 'print_content'),20);
      add_action('do_theme_after_footer', array('theme_dentist_output', 'print_inclinic_form'),20);

    } if(self::is_page_type('campaign')){
      clog('campaign');
      add_action('do_theme_content', array('theme_campaign_output', 'print_content'),20);

    }else{
      add_action('do_theme_content', array('theme_content_output', 'print_content_page'));
    }


    if (wp_is_mobile()) {
      add_action('do_theme_after_footer', array('theme_content_output', 'print_mobile_cta'));
    }

    add_action('do_theme_after_footer', array('theme_content_output', 'print_wp_forms_popup'), PHP_INT_MAX);
  }


  /**
  * Detects what page is currently loaded
  *
  * @return bool
  */
  public static function is_page_type( $type ){
    $obj = get_queried_object();
    switch ($type){
      case 'blog':
        return is_home();
        break;
      case 'fronted-page':
        return is_front_page();
        break;
      case 'blog-category':
        return is_category();
        break;
      case 'blog-post':
        $obj = get_queried_object();
        return (is_single() && ('post' === $obj->post_type));
        break;
      case 'post-tag':
        return is_tag();
        break;
      case 'treatment':
        return isset($obj->post_type) && 'theme_treatment' === $obj->post_type;
        break;
      case 'dentist':
        return isset($obj->post_type) && 'theme_doctor' === $obj->post_type;
        break;
      case 'campaign':
        return isset($obj->post_type) && 'theme_campaign' === $obj->post_type;
        break;
    }
  }
}