<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

/**
  * Main theme class
  *
  * Inits all hooks, defines theme parameters
  *
  * @author: Kuleshov Vyacheslav
  *
  * @autho-URI: https://www.upwork.com/fl/viacheslavkuleshov
  *
  * @package theme
  *
  * @since v1.0
  */
class velesh_init_theme{

  /* main style location  */
  public $main_style = '/assets/css/main.min26.css';

  /*theme style file slug*/
  public $main_style_slug = 'theme-main-style-dev1';

  /*theme fonts file location*/
  public $font = '/assets/fonts/font.css';

  /* main script location  */
  public $main_script= '/assets/script/main14.js';

  /* main script slug */
  public $main_script_slug = 'theme-main-script-dev1';

  /* svg sprites files slug for local storage */
  public $svg_sprite_slug = 'svg_sprite_168-4';


  /**
   * theme init defauls action
   */
  public function __construct(){
    $this->define_theme_globals();
    $this->define_theme_supports();
    $this->define_image_sizes();
    $this->replace_3rd_party_pugins_hooks();
    $this->remove_actions();
    $this->init_hooks();
    $this->include_global();
    $this->ajax();

    if( $this->is_request( 'frontend' )){
      $this->include_frontend();
      add_action('wp_head', array('theme_construct_page', 'init'));
    }

    if( $this->is_request( 'admin' )){
      $this->include_admin();
    }
  }


  /**
   * defines theme globals
   */
  public function define_theme_globals(){
    define('THEME_PATH', get_stylesheet_directory());
    define('THEME_URL', get_template_directory_uri());
    define('HOME_URL', get_home_url());
    define('THEME_VERSION', '1.0');
    define('DUMMY_ADMIN', THEME_URL.'/assets/images/admin/blank.png');
    define('PROGRESS', THEME_URL.'/assets/images/admin/progress.gif');
    define('DUMMY', THEME_URL.'/assets/images/admin/blank.png');
    define('DUMMY_S', THEME_URL.'/assets/images/admin/blank_s.png');
    define('THEME_DEBUG', true);
  }


  /**
   * defines theme supports
   */
  public function define_theme_supports(){
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'caption' ) );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo', array(
      'flex-height' => true,
      'flex-width'  => true,
      'header-text' => array( 'site-title', 'site-description' ),
    ));
  }

  /**
   * defines image sizes for attachments
   */
  public function define_image_sizes(){
    add_image_size('icon', 96, 96, true);
    add_image_size('trt_lg', 511, 560, true);
    add_image_size('trt_sm', 506, 274, true);
    add_image_size('before_after', 580, 320, true);
    add_image_size('dentist_photo', 360, 503, true);
    add_image_size('size1', 252, 352, true);
    add_image_size('size2', 252, 176, true);
    add_image_size('size3', 252, 252, true);
 }

  /**
   * enqueues javascripts and css for the frontend
   *
   * @hookedto - wp_enqueue_scripts 999
   */
  public function enqueue_scripts_styles_front(){
    wp_enqueue_style( 'before-after', THEME_URL.'/assets/libs/before-after/before-after.min.css', THEME_VERSION );
    wp_enqueue_style( 'owl-carousel', THEME_URL.'/assets/libs/owlcarousel/css/owl.carousel.min.css', THEME_VERSION );
    wp_enqueue_style( $this->main_style_slug, THEME_URL.$this->main_style, THEME_VERSION );

    wp_enqueue_script('before-after',THEME_URL.'/assets/libs/before-after/before-after.min.js', array(), THEME_VERSION, true);

    wp_enqueue_script('owl-carousel',THEME_URL.'/assets/libs/owlcarousel/js/owl.carousel.min.js', array(), THEME_VERSION, true);

    wp_enqueue_script('velocity',THEME_URL.'/assets/libs/velocity/velocity.min.js', array(), THEME_VERSION, true);

    wp_enqueue_script('vuejs',THEME_URL.'/assets/libs/vuejs/prod.js', array(), THEME_VERSION, true);

    wp_enqueue_script($this->main_script_slug, THEME_URL.$this->main_script, array('jquery'), THEME_VERSION, true);



  }


  /**
   * enqueues javascripts and css for the frontend
   *
   * @hookedto - wp_enqueue_scripts 9999
   */
  public function print_theme_inline_styles(){

    $inline_styles_4_script = array(
      // 'theme_main_style' => THEME_URL.$this->main_style,
    );

    foreach ($inline_styles_4_script as $name => $url) {
       print_inline_style($url, $name);
    }
  }


  /**
   * enqueues javascripts and css for admin dashboard
   *
   * @hookedto - to admin_enqueue_scripts 5
   */
  public function enqueue_scripts_styles_admin(){

    wp_enqueue_script('theme-script', THEME_URL.'/assets/script/admin.js', array('jquery'), THEME_VERSION, true);

    wp_enqueue_style( 'theme-admin-style', THEME_URL.'/assets/css/admin2.css', THEME_VERSION );

    $settings_pages = array(

    );

    if(isset($_GET['page'])){
      if(in_array($_GET['page'], $settings_pages)){
        wp_enqueue_media();
      }
    }


     add_svg_sprite($this->svg_sprite_slug, THEME_URL.'/assets/svg_sprite/symbol_sprite2.html');

  }



  public static function ajax(){

  }



  /**
   * adds additional theme files on frontend
   */
  public function include_frontend(){
    global $pagenow;
    // include_once(THEME_PATH.'/includes/class-content-output.php');
  }



  /**
   * adds additional theme files on admin
   */
  public function include_admin(){
  }



  /**
   * adds additional theme files on both sides
   */
  public function include_global(){
    global $pagenow;
    include_once(THEME_PATH.'/includes/helpers.php');
    include_php_from_dir(THEME_PATH.'/includes/');

    if(class_exists('WPBakeryShortCode')){
      include_php_from_dir(THEME_PATH.'/wpbackery/');
    }
  }



  /**
   * Hooks theme actions
   */
  public function init_hooks(){

    add_action('wp_enqueue_scripts',  array($this,'enqueue_scripts_styles_front') , 9991);

    add_action('wp_enqueue_scripts', array($this,'prepare_template_data'),9992);

    add_action('wp_enqueue_scripts', array($this,'inline_custom_data'), 9990);

    /* js and css hooks for the admin dashboard*/

    add_action( 'admin_enqueue_scripts', array($this,'enqueue_scripts_styles_admin'), 5 );

    add_action( 'admin_enqueue_scripts', array($this,'inline_custom_data'), 13 );

    /* theme setup actions */

    add_action( 'after_setup_theme', array($this, 'setup_theme') );

    add_filter('upload_mimes', array($this, 'cc_mime_types'), 10);

    add_action( 'widgets_init', array($this, 'register_sidebars' ));


    add_action('theme_start_page_header',array($this,'print_inline_data_body'));

    add_action('init',array($this,'add_cors_http_header'));

    add_action('wp_footer',array($this,'print_styles_in_footer'));

    add_action('admin_init', array($this,'add_reading_settings'));

    add_action('admin_menu', array($this,'add_option_pages'));

     if(THEME_DEBUG){
        add_action('wp_footer', 'exec_clog', PHP_INT_MAX);
        add_action('admin_footer', 'exec_clog', PHP_INT_MAX);
     }
  }


  /**
   * puts styles and fonts to local storage
   *
   * @hookedto - wp_enqueue_scripts 9997
   */
  public function inline_custom_data(){}


  /**
   * prepares and prints variable data for javascripts
   *
   * @prints-for-js $wc_urls - {WP_URLS}
   * @prints-for-js $user_data - {USER_DATA}
   */
  public function prepare_template_data(){
    $wc_urls = array(
      'home_url'    => HOME_URL,
      'theme_url'   => THEME_URL,
      'wp_ajax_url' => admin_url('admin-ajax.php'),
    );

    wp_localize_script($this->main_script_slug,'WP_URLS', $wc_urls);

    $online_journey_settings = get_option('online_journey_settings');
    wp_localize_script($this->main_script_slug, 'online_journey_settings', $online_journey_settings);
  }


  /**
   * prints inline data in body
   */
  public function print_inline_data_body(){
    print_inline_style(THEME_URL.'/assets/fonts/fonts.css', 'theme_fonts_170');

    add_svg_sprite($this->svg_sprite_slug, THEME_URL.'/assets/svg_sprite/symbol_sprite2.html');
  }


  /**
   * prepares and prints variable data for javascripts
   *
   * @prints-for-js $wc_urls - {WP_URLS}
   * @prints-for-js $user_data - {USER_DATA}
   */
  public function register_sidebars(){

    for($i = 1 ; $i <= 5; $i++){
      register_sidebar( array(
        'name'          => __('Treatment Widget', 'theme-translations') . ' ' . $i,
        'id'            => 'treatment_'.$i,
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<p class="treatments-menu__title">',
        'after_title'   => '</p>',
      ));
    }

    register_sidebar( array(
        'name'          => __('Footer Widget 1', 'theme-translations'),
        'id'            => 'footer_1',
        'before_widget' => '',
        'after_widget'  => '<div class="spacer-h-40"></div>',
        'before_title'  => '<b class="footer-title">',
        'after_title'   => '</b>',
      ));

    for($i = 2 ; $i <= 3; $i++){
      register_sidebar( array(
        'name'          => __('Footer Widget', 'theme-translations') . ' ' . $i,
        'id'            => 'footer_'.$i,
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<b class="footer-title">',
        'after_title'   => '</b>',
      ));
    }
  }


  /**
   * replaces 3rd party pugins to theme designed positions
   *
   */
  public function replace_3rd_party_pugins_hooks(){
  }


  /**
   * unhooks unused functions
   */
  public function remove_actions(){
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
    remove_action( 'wp_head', 'wp_oembed_add_host_js' );
  }


  /**
   * function runs on theme setup
   *
   * @hookedto - after_setup_theme
   */
  public function setup_theme(){

    /*Theme translations*/
    // load_theme_textdomain( 'theme-translations', THEME_PATH . '/languages' );

    add_theme_support('woocommerce');

    /*Menu registrations*/

    $locations = array(
      'main_menu'          => __('Menu in header', 'theme-translations'),
      'clinics_menu'          => __('Clinics in header', 'theme-translations'),
    );

    register_nav_menus($locations);
  }


  /**
   * adds additional mime types for attachments
   *
   * @hookedto - upload_mimes 10
   */
  public function cc_mime_types($mimes) {
    $mimes['avi'] = 'video/avi';
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }



  /**
   * What type of request is this?
   *
   * @param  string $type admin, ajax, cron or frontend.
   * @return bool
   */
  private function is_request( $type ) {
    switch ( $type ) {
      case 'admin':
        return is_admin();
      case 'ajax':
        return defined( 'DOING_AJAX' );
      case 'cron':
        return defined( 'DOING_CRON' );
      case 'frontend':
        return ( ! is_admin() );
    }
  }


  public function print_styles_in_footer(){
    global $footer_inline_style;
    printf('<style>%s</style>', $footer_inline_style );
  }


  /**
  * adds additional settings section
  */
  public function add_reading_settings(){
    add_settings_section('theme-pages-section', __('Custom page settings', 'theme-translations '), array($this, 'add_additional_page_settings'), 'reading');
  }


  /**
  * callback for settings section
  *
  * @data - array;
  *
  * @see $this->add_reading_settings()
  */
  public function add_additional_page_settings($data){
  }

  /**
  * adds options to reading sections
  * allow admin to define special pages
  */
  public function add_option_pages(){
    $options = array(
      // 'privacy'        => __('Privacy Policy', 'theme-translations'),
      // 'terms_conditions'          => __('Terms and Conditions', 'theme-translations'),
      // 'contact_page'         => __('Contacts Page', 'theme-translations'),
      // 'faq_page'             => __('F.A.Q Page', 'theme-translations'),
    );

    foreach ($options as $key => $name) {
      $option_name = 'theme_page_'.$key;

      register_setting( 'reading', $option_name );

      add_settings_field(
       'theme_setting_'.$key,
        $name,

        array(__CLASS__, 'page_select_callback'),

        'reading',
        'theme-pages-section',

        array(
          'id' => 'theme_setting_'.$key,
          'option_name' => $option_name,
        )
      );
    }
  }

  /**
   * callback to display a select option for page select
   *
   * @param $val - arrray
   *
   * @see $this->add_reading_settings()
   */
  public static function page_select_callback( $val ){
    $id = $val['id'];
    $option_name = $val['option_name'];
    $args = array(
      'posts_per_page' => -1,
      'limit'          => -1,
    );
    $pages = get_pages($args);
    echo ' <select name="'.$option_name .'">';
    echo '<option value="-1">— Select —</option>';

    foreach ($pages  as $id => $page) {
      $selected = (esc_attr( get_option($option_name) ) == $page->ID )? 'selected = "selected"' : '';
      ?>
        <option <?php echo $selected; ?> value="<?php echo $page->ID ?>"> <?php echo $page->post_title; ?></option>
      <?php
    }
    echo '</select>';
  }

  public static function add_cors_http_header(){
    // header("Access-Control-Allow-Origin: *");
  }
}

/* init theme*/
global $theme_init ;
$theme_init = new velesh_init_theme();




