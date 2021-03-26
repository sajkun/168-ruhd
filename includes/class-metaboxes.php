<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
/**
* Class that adds additional metaboxes and settings to theme
*
* @package theme/settings
*/

class velesh_theme_meta_metasettings{

  /**
  * default callback
  */
  public function __construct(){
    add_action( 'save_post', array($this, 'save_custom_postdata' ), 98 );
    add_action( 'edited_category', array($this, 'save_tax_meta'), 97);
    add_action('admin_menu', array($this, 'print_metaboxes'));

    /*adds additional settings page in menu*/
    add_action('admin_menu', array($this,'add_settings_for_theme'));

  }


  /**
  * Save additional term meta
  *
  * @param #term_id - integer
  */
  public static function save_tax_meta( $term_id ){
    /**
    * to run this save an option  do_theme_save = yes  should esist in $_POST.
    */
    if( !isset($_POST['do_theme_save']) ) return;
    /**
    * an array of saving parameters
    * should have structure like: ['name' => {string}, 'unique' => {bool}],
    */
    $data     = array();

    foreach ($data as $_id => $_d) {
      if(isset($_POST[$_d['name']]) && !empty($_POST[$_d['name']])){
        $new_data = $_POST[$_d['name']];

        if(!update_term_meta($term_id, $_d['name'] , $new_data)){
          add_term_meta( $term_id, $_d['name'] , $new_data, $_d['unique'] );
        }
      }else{
        delete_term_meta( $term_id, $_d['name']);
      }
    }
  }


  /**
  * Save additional post meta
  *
  * @param #post_id - integer
  */
  public static function save_custom_postdata($post_id){
    /**
    * to run this save an option  do_theme_save = yes  should esist in $_POST.
    */
    if( !isset($_POST['do_theme_save']) ) return;

    /**
    * an array of saving parameters
    * should have structure like: ['name' => {string}, 'unique' => {bool}],
    */
    $data     = array();

    foreach ($data as $_id => $_d) {
      if(isset($_POST[$_d['name']]) && !empty($_POST[$_d['name']])){
        $new_data = $_POST[$_d['name']];

        if(!update_post_meta($post_id, $_d['name'] , $new_data)){
          add_post_meta( $post_id, $_d['name'] , $new_data, $_d['unique'] );
        }
      }else{
        delete_post_meta( $post_id, $_d['name']);
      }
    }
  }


  /**
  * Adds metaboxes to posts
  */
  public static function print_metaboxes(){
    /* should contain only add_meta_box($args) functions */
  }


  public function add_settings_for_theme(){
    add_options_page('Online Journey settings', 'Online Journey settings', 'manage_options', 'velesh_theme_online_journey_settings', array($this,'velesh_theme_settings_callback'));
  }

  public static function velesh_theme_settings_callback(){

      $slug = 'online_journey_settings';

      if(isset($_POST['do_save']) && 'yes' == $_POST['do_save']){
        $o_new = $_POST[$slug];
        update_option( $slug, $o_new );
      }


      $o = get_option($slug);
     ?>
     <form action="<?php echo admin_url('options-general.php?page=velesh_theme_online_journey_settings')?>" method="POST">

       <h3>Online Journey settings</h3>


       <h4>Tracker Endpoint</h4>
       <input type="text" class="text-large large-text" name="<?php echo $slug?>[endpoint]" value="<?php echo isset($o['endpoint'])? $o['endpoint'] : '' ?>">

       <h4>Dropbox Access Token</h4>
       <input type="text" class="text-large large-text" name="<?php echo $slug?>[token]"  value="<?php echo isset($o['token'])? $o['token'] : '' ?>">

       <h4>Name of the folder in Dropbox</h4>
       <input type="text" class="text-large large-text" name="<?php echo $slug?>[folder]"  value="<?php echo isset($o['folder'])? $o['folder'] : '' ?>">

       <input type="hidden" value="yes" name="do_save">

       <br><br>

       <input type="submit" class="btn" value=" Save Settings">
     </form>

    <?php

  }


}

new velesh_theme_meta_metasettings();