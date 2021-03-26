<?php
class theme_ajax{
  public function __construct(){

    add_action('wp_ajax_get_journey_count', array($this, 'get_journey_count_cb'));
    add_action('wp_ajax_nopriv_get_journey_count', array($this, 'get_journey_count_cb'));

    add_action('wp_ajax_send_create_journey_request', array($this, 'send_create_journey_request_cb'));
    add_action('wp_ajax_nopriv_send_create_journey_request', array($this, 'send_create_journey_request_cb'));
  }


  public static function get_journey_count_cb(){
    $count = get_option('journey_count')? get_option('journey_count') : -1;
    $count++;
    // update_option('journey_count', $count);

    wp_send_json( array(
      'count' => $count,
    ) );
  }


  public static function send_create_journey_request_cb(){

    $online_journey_settings = get_option('online_journey_settings');

    $data = $_POST['send_data'];

    wp_send_json( array(
      'count' => $count,
    ));
  }
}

new theme_ajax();