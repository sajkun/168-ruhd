<?php
/**
 * Adds options to the customizer for theme.
 *
 * @package theme
 */
// defined( 'ABSPATH' ) || exit;

class velesh_theme_customizer{
    /**
   * Constructor.
   */
  public function __construct() {
    add_action( 'customize_register', array( $this, 'add_sections' ) );

    // add_action( 'customize_controls_enqueue_scripts', array( $this, 'add_scripts' ), 999 );
  }



  /**
   * Add settings to the customizer.
   *
   * @param WP_Customize_Manager $wp_customize Theme Customizer object.
   */
  public function add_sections( $wp_customize ) {
    $this->add_footer_section( $wp_customize );

    $plugins_active = get_option('active_plugins');


    if(in_array( 'wpforms-lite/wpforms.php',  $plugins_active) || in_array( 'wpforms/wpforms.php',  $plugins_active)){
      $this->add_forms_section( $wp_customize );
    }

    $this->add_mobile_section( $wp_customize );
  }


  /**
   * Scripts to improve our form.
   */
  public function add_scripts() {
      wp_enqueue_script('velesh_theme_customizer', THEME_URL .'/script/customizer.js', array( 'jquery','customize-preview' ), '', true );
  }


  public function add_mobile_section( $wp_customize ){
    $wp_customize->add_section(
        'theme_mobile_section',
        array(
            'title'       => 'Theme Mobile Devices Settings',
            'priority'    => 300,
            'description' => ' This section is to set mobiles options'
        )
    );

      $wp_customize->add_setting(
          'mobile_text_cta',
          array(
              'default'    => '',
              'transport'  => 'postMessage',
              'type'       => 'option'
          )
      );

      $wp_customize->add_control(
        'mobile_text_cta',
        array(
            'section'   => 'theme_mobile_section',
            'label'     => __('Call to action text on mobile bottom dashboard', 'theme-translations'),
            'type'      => 'text',
            'settings'  => 'mobile_text_cta',
         )
      );

      $wp_customize->add_setting(
          'mobile_price_value',
          array(
              'default'    => '',
              'transport'  => 'postMessage',
              'type'       => 'option'
          )
      );

      $wp_customize->add_control(
        'mobile_price_value',
        array(
            'section'   => 'theme_mobile_section',
            'label'     => __('Call to action price', 'theme-translations'),
            'description'     => __('Place only digits and separators here', 'theme-translations'),
            'type'      => 'text',
            'settings'  => 'mobile_price_value',
         )
      );
  }
  public function add_forms_section( $wp_customize ){

      $wp_customize->add_section(
          'theme_forms_section',
          array(
              'title'       => 'Theme Forms Settings',
              'priority'    => 300,
              'description' => ' This section is to design different form settings'
          )
      );

      $wpforms = get_posts(array(
        'post_type' => 'wpforms',
        'posts_per_page' => -1,
      ));

      $choices = array();

      foreach ($wpforms as $form) {
        $choices[$form->ID] = $form->post_title;
      }

      $wp_customize->add_setting(
          'default_subscription_form',
          array(
              'default'    => '',
              'transport'  => 'postMessage',
              'type'       => 'option'
          )
      );

      $wp_customize->add_control(
        'default_subscription_form',
        array(
            'section'   => 'theme_forms_section',
            'label'     => __('Default Online Visit Form', 'theme-translations'),
            'type'      => 'select',
            'settings'  => 'default_subscription_form',
             'choices' => $choices,
            'description' => 'should have a select element with a single option, value of this option should be %treatments%',
         )
      );

      $wp_customize->add_setting(
          'default_subscription_form_inclinic',
          array(
              'default'    => '',
              'transport'  => 'postMessage',
              'type'       => 'option'
          )
      );

      $wp_customize->add_control(
        'default_subscription_form_inclinic',
        array(
            'section'   => 'theme_forms_section',
            'label'     => __('Default Inclinic Visit Form', 'theme-translations'),
            'type'      => 'select',
            'settings'  => 'default_subscription_form_inclinic',
            'choices' => $choices,
            'description' => 'for booking free consultation, need to have a field  with a name of free service and class "hidden"',
         )
      );

      $wp_customize->add_setting(
          'subscription_form_emergency',
          array(
              'default'    => '',
              'transport'  => 'postMessage',
              'type'       => 'option'
          )
      );

      $wp_customize->add_control(
        'subscription_form_emergency',
        array(
            'section'   => 'theme_forms_section',
            'label'     => __('Emergency Visit Form', 'theme-translations'),
            'type'      => 'select',
            'settings'  => 'subscription_form_emergency',
            'choices' => $choices,
            'description' => 'for booking free consultation, need to have a field  with a name of free service and class "hidden"',
         )
      );

      $wp_customize->add_setting(
          'treatment_subscription_form_inclicnic',
          array(
              'default'    => '',
              'transport'  => 'postMessage',
              'type'       => 'option'
          )
      );

      $wp_customize->add_control(
        'treatment_subscription_form_inclicnic',
        array(
            'section'   => 'theme_forms_section',
            'label'     => __('Treatment in Clicnic Form', 'theme-translations'),
            'type'      => 'select',
            'settings'  => 'treatment_subscription_form_inclicnic',
             'choices' => $choices,
             'description' => 'for booking free consultation, need to have a field  with a name of free service and class "hidden"',
         )
      );
      $wp_customize->add_setting(
          'treatment_subscription_form_online',
          array(
              'default'    => '',
              'transport'  => 'postMessage',
              'type'       => 'option',
          )
      );

      $wp_customize->add_control(
        'treatment_subscription_form_online',
        array(
            'description' => 'should have a text field with value %single_treatment% and class "hidden"',
            'section'   => 'theme_forms_section',
            'label'     => __('Treatment Online Visit', 'theme-translations'),
            'type'      => 'select',
            'settings'  => 'treatment_subscription_form_online',
             'choices' => $choices
         )
      );

      $wp_customize->add_setting(
          'dentist_subscription_form_online',
          array(
              'default'    => '',
              'transport'  => 'postMessage',
              'type'       => 'option',
          )
      );

      $wp_customize->add_control(
        'dentist_subscription_form_online',
        array(
            'description' => 'should have a text field with a value = %dentist_name% and class "hidden" also should have a select element with a single option, value of this option should be %treatments%',
            'section'   => 'theme_forms_section',
            'label'     => __('Dentist Online Visit', 'theme-translations'),
            'type'      => 'select',
            'settings'  => 'dentist_subscription_form_online',
             'choices' => $choices
         )
      );


      $wp_customize->add_setting(
          'dentist_subscription_form_inclinic',
          array(
              'default'    => '',
              'transport'  => 'postMessage',
              'type'       => 'option',
          )
      );

      $wp_customize->add_control(
        'dentist_subscription_form_inclinic',
        array(
            'description' => 'should have a text field with a value =  %dentist_name% and class "hidden" , also should have a text field with a value equal to free service consultation name and class "hidden"',
            'section'   => 'theme_forms_section',
            'label'     => __('Dentist Inclinic Visit', 'theme-translations'),
            'type'      => 'select',
            'settings'  => 'dentist_subscription_form_inclinic',
             'choices' => $choices
         )
      );


      $wp_customize->add_setting(
          'clinic_subscription_form',
          array(
              'default'    => '',
              'transport'  => 'postMessage',
              'type'       => 'option',
          )
      );


      $wp_customize->add_control(
        'clinic_subscription_form',
        array(
            'description' => 'should have a text field with a value =  %clinic_name% and class "hidden"',
            'section'   => 'theme_forms_section',
            'label'     => __('Clinic Book form', 'theme-translations'),
            'type'      => 'select',
            'settings'  => 'clinic_subscription_form',
             'choices' => $choices
         )
      );
  }

  /**
   * Store site footer section.
   *
   * @param WP_Customize_Manager $wp_customize Theme Customizer object.
   */
  public function add_footer_section( $wp_customize ){

    /*footer settings*/

      $wp_customize->add_section(
          'theme_footer_section',
          array(
              'title'       => 'Theme Footer',
              'priority'    => 300,
              'description' => ' This section is designed to change displaying of footer settings'
          )
      );


      /*Journey text*/

        $wp_customize->add_setting(
            'theme_footer_cta_text',
            array(
                'default'    => '',
                'transport'  => 'postMessage',
                'type'       => 'option'
            )
        );

        $wp_customize->add_control(
          'theme_footer_cta_text',
          array(
              'section'   => 'theme_footer_section',
              'label'     => __('Call to action text', 'theme-translations'),
              'type'      => 'textarea',
              'settings'  => 'theme_footer_cta_text',
          )
        );

        $wp_customize->selective_refresh->add_partial( 'theme_footer_cta_text', array(
            'selector' => '.site-footer .cta-text',
        ) );

      /*copyrights setting*/

        $wp_customize->add_setting(
            'theme_footer_copyrights',
            array(
                'default'    => '',
                'transport'  => 'postMessage',
                'type'       => 'option'
            )
        );

        $wp_customize->add_control(
          'theme_footer_copyrights',
          array(
              'section'   => 'theme_footer_section',
              'label'     => __('Copyrights', 'theme-translations'),
              'type'      => 'textarea',
              'settings'  => 'theme_footer_copyrights',
          )
        );

        $wp_customize->selective_refresh->add_partial( 'theme_footer_copyrights', array(
            'selector' => '.site-footer .copyrights',
        ) );

        $wp_customize->add_setting(
            'theme_footer_partners',
            array(
                'default'    => '',
                'transport'  => 'postMessage',
                'type'       => 'option'
            )
        );


    $wp_customize->add_control(
      new Multi_Image_Custom_Control(
        $wp_customize,
        'theme_footer_partners',
        array(
          'label' => __('Partner Banners', 'theme-translations'), //translated
          'section' => 'theme_footer_section',
          'settings' => 'theme_footer_partners',
          'priority' => 18 )
      )
    );

    /**/
  }


}

new velesh_theme_customizer();



if (!class_exists('WP_Customize_Image_Control')) {
    return null;
}

class Multi_Image_Custom_Control extends WP_Customize_Control
{
    public function enqueue()
    {
      wp_enqueue_style('multi-image-style', THEME_URL.'/assets/css/multi-image.css');
      wp_enqueue_script('multi-image-script', THEME_URL.'/assets/script/multi-image.js', array( 'jquery' ), rand(), true);
    }

    public function render_content()

    { ?>
          <label>
            <span class='customize-control-title'><?php echo $this->label  ?></span>
          </label>
          <div>
            <ul class='images'></ul>
          </div>
          <div class='actions'>
            <a class="button-secondary upload">Add</a>
          </div>

          <input class="wp-editor-area" id="images-input" type="hidden" <?php $this->link(); ?>>
      <?php
    }
}
