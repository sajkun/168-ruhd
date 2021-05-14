<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

/**
 * The main output class
 *
 * @package theme/output
 *
 * @since v1.0
 */
class theme_campaign_output{
  public static function print_content(){
    global $wp_popup_forms;
    $obj = get_queried_object();

    if(!function_exists('get_field')) return;

    $all_clinics = get_posts(array(
      'post_type' => 'theme_clinics',
      'posts_per_page' => -1,
    ));

    $may_be_clinics = get_field('campaign_clinics', $obj->ID);

    $all_clinics =  $may_be_clinics?: $all_clinics;

    $clinics = '';

    foreach ($all_clinics as $t) {
      $clinics .= sprintf('<option value="%1$s" >%1$s</option>', $t->post_title );
    }

    $form_id = get_option('campaing_subscription_form_inclinic');
    $shortcode =  sprintf('[wpforms id="%s"]',  $form_id);
    $form    = do_shortcode($shortcode);
    // $form   = str_replace('<option value="%treatments%" >%treatments%</option>', $options, $form );
    $form   = str_replace('%post_title%', $obj->post_title, $form );
    $form   = str_replace('<option value="%theme_clinics%" >%theme_clinics%</option>', $clinics, $form );

    // $form  = str_replace('<option value="%theme_clinics%" >%theme_clinics%</option>', $clinics, $form );

    /**
    * get treatment for form from settings
    */
    $single_treatment = 'Free Consultation';
    $may_be_single_treatment = get_field('campaign_treatment', $obj->ID);
    $single_treatment =  $may_be_single_treatment?  $may_be_single_treatment->post_title : $single_treatment;
    $form   = str_replace('%single_treatment%', $single_treatment, $form );


    unset($wp_popup_forms[$form_id]);

    $args = array(
      'title' => $obj->post_title,
      'form_inclicnic' =>  $form  ,
      'form_online'    => false,//@deprecated
      'tag'         => get_field('campaign_adv_tag'),
      'text'        => get_field('campaign_adv_text'),
      'category'    => get_field('campaign_adv_category'),
      'description' => get_field('campaign_adv_about')? apply_filters('the_content',get_field('campaign_adv_about')) : '',
      'date'        => get_field('campaign_adv_date'),
      'clinic'      => get_field('campaign_adv_clinic'),
      'offer'       => get_field('campaign_adv_the_offer')? apply_filters('the_content',get_field('campaign_adv_the_offer')) : '',
      'how'         => get_field('campaign_adv_how_it_works')? apply_filters('the_content',get_field('campaign_adv_how_it_works')) : '',
      'terms'       => get_field('campaign_adv_terms')? apply_filters('the_content',get_field('campaign_adv_terms')) : '',
    );

    print_theme_template_part('content', 'campaign', $args);
  }
}