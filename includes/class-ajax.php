<?php
class theme_ajax{
  public function __construct(){

    add_action('wp_ajax_get_journey_count', array($this, 'get_journey_count_cb'));
    add_action('wp_ajax_nopriv_get_journey_count', array($this, 'get_journey_count_cb'));

    add_action('wp_ajax_send_create_journey_request', array($this, 'send_create_journey_request_cb'));
    add_action('wp_ajax_nopriv_send_create_journey_request', array($this, 'send_create_journey_request_cb'));
  }


  public static function get_journey_count_cb(){
    $count = get_option('journey_count')? (int)get_option('journey_count') : 0;
    $count++;

    if(!update_option('journey_count', $count)){
      add_option('journey_count', $count);
    }

    wp_send_json( array(
      'count' => $count,
    ) );
  }


  public static function send_create_journey_request_cb(){

    $online_journey_settings = get_option('online_journey_settings');

    $url = $online_journey_settings['endpoint'];

    $data = $_POST['send_data'];

    $args = array(
      'body' => $data,
      'blocking'    => true,
      'headers' => array(),
      'cookies' => array()
    );

   $res =  wp_remote_post( $url, $args );

    wp_send_json( array(
      'data' => $data,
      'responce' => $res,
      'responce_code' => $res['response']['code'],
      'responce_message' => $res['response']['message'],
      'responce_body' => json_decode($res['body']),
    ));
  }
}

new theme_ajax();