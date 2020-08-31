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

    $form_id = get_option('default_subscription_form');

    $shortcode = sprintf('[wpforms id="%s"]',  $form_id);
    $form    = do_shortcode($shortcode);

    $treatments = get_posts(array(
      'posts_per_page' => -1,
      'post_type' => 'theme_treatment'
    ));
    $options = '';

    foreach ($treatments as $t) {
      $options .= sprintf('<option value="%1$s" >%1$s</option>', $t->post_title);
    }

    $form = str_replace('<option value="%treatments%" >%treatments%</option>', $options, $form );

    unset($wp_popup_forms[$form_id]);

    $form_online = ($form_id)? str_replace('%single_treatment%', $obj->post_title, $form ): false;

    $form_id = get_option('default_subscription_form_inclinic');
    $shortcode =  sprintf('[wpforms id="%s"]',  $form_id);
    $form    = do_shortcode($shortcode);
    $form = str_replace('<option value="%treatments%" >%treatments%</option>', $options, $form );
    $form_inclicnic = ($form_id)? str_replace('%single_treatment%', $obj->post_title, $form ): false;

    unset($wp_popup_forms[$form_id]);

    $args = array(
      'title' => $obj->post_title,
      'form_inclicnic' => $form_inclicnic,
      'form_online'    => $form_online,
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