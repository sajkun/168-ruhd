<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
/**
* Class that used to add different filters to theme
*
* @package theme/helpers
*/

class theme_filter_class{

  public function __construct(){

    add_action('wp_head', array($this,'add_body_filter') );
    add_action('pre_get_posts', array($this,'all_posts') );

    add_filter('display_post_states', array($this, 'show_contact_page_state'), 10, 2);
  }

  public static function add_body_filter(){
    $obj = get_queried_object();
    if(is_single() && 'theme_campaign' ==   $obj->post_type){
      add_filter('body_class', function($classes ){return array_merge( $classes, array( 'contrast' )); });
    }

  }

  public static function all_posts($query){

    if($query->is_main_query() && (is_home() || is_category())){

      $query->set('posts_per_page', -1 );
    }

    return $query;
  }

  public static function show_contact_page_state( $states, $post ) {
      if ( 'page' == get_post_type( $post->ID )){
        switch ($post->ID) {
          case get_option('theme_page_privacy'):
              $states[] = __('Privacy Policy');
            break;
          case get_option('theme_page_terms_conditions'):
              $states[] = __('Terms and Conditions');
            break;

        }
      }
      return $states;
    }
}

new theme_filter_class();