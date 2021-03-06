<?php

if ( ! defined( 'ABSPATH' ) ) {
  die( '-1' );
}
add_action('vc_before_init', 'vc_before_init_pricing_elements');

function vc_before_init_pricing_elements(){
  vc_map( array(
      'base'        => 'pricing_elements',
      'name'        => __( 'Pricing', 'theme-translation' ), //
      'category'    => __( 'Theme Shortcodes' ),
      'icon'        => THEME_URL.'/assets/images/icons/pound.png',
      'show_settings_on_create' => false,
      'params' => array(),
  ));
}


class WPBakeryShortCode_pricing_elements extends WPBakeryShortCode {
   protected function content( $atts, $content = null ) {

    $args = array(
      'posts_per_page' => -1,
      'post_type' => 'theme_treatment',
    );

    $treatments = get_posts($args);

    $treatments_group = array();

    $pricing_count = array(
      'London' => array(
        'Consultations' => 0,
        'Treatments' => 0,
      ),
      'Manchester' => array(
        'Consultations' => 0,
        'Treatments' => 0,
      ),
    );

    foreach ($treatments as $t) {
      $type = get_field('treatment_type', $t->ID);
      $type = $type?: 'Treatments';

      if(!$treatments_group[$type]){
        $treatments_group[$type]  = array();
      }

      $pricing =  get_field('pricing_items', $t->ID);

      $pricing_data = array();

      if($pricing){
        $cities = array();
        foreach ($pricing as $p) {
          if(!$pricing_data[$p['city']]){
            $pricing_data[$p['city']]  = array();
          }

           $pricing_data[$p['city']][] = $p;


          if(!in_array($p['city'], $cities)){
            $pricing_count[$p['city']][$type]++;
            $cities[] = $p['city'];
          }

        }
      }

      $treatments_group[$type][] = array(
        'name' => $t->post_title,
        'pricing' => $pricing_data,
      );
    }

    $args = array(
      'pricing_count' => $pricing_count,
      'treatments' => $treatments_group,
    );

    ob_start();

    echo print_theme_template_part('treatments-pricing', 'wpbackery', $args);

    $output = ob_get_contents();
    ob_end_clean();

    return $output;
  }
}