<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 */
$obj = get_queried_object();
do_action('start_page');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <?php
    do_action('theme_start_page_header');
    wp_head();
   ?>
  <title><?php wp_title(' | ', 'echo', 'right'); ?><?php bloginfo('name'); ?></title>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, user-scalable=yes">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="dns-prefetch" href="//ajax.googleapis.com">
  <link rel="dns-prefetch" href="//fonts.googleapis.com">
  <link rel="dns-prefetch" href="//www.google-analytics.com">

  <?php
    global $wp;
   ?>

  <link rel="alternate" media="handheld" href="<?php echo home_url( $wp->request ); ?>" />

  <?php
   do_action('do_theme_after_head'); ?>
</head>

<?php

  add_filter( 'body_class', function( $classes ) {
    return array_merge( $classes, array( 'page' ) );
  } );



  if(function_exists('get_field') && $obj->post_type =="theme_clinics" && get_field('clinic_video_bg', $obj->ID)){

    add_filter( 'body_class', function( $classes ) {
      return array_merge( $classes, array( 'video-bg-page' ) );
    } );
  }

  if(strpos('story_bg', $obj->post_content) >=0){
    add_filter( 'body_class', function( $classes ) {
      return array_merge( $classes, array( 'video-bg-page' ) );
    } );
  }
?>

<body  <?php body_class(); ?>>



