 <?php

if ( ! defined( 'ABSPATH' ) ) {
  die( '-1' );
}

add_action('vc_before_init', 'vc_before_init_story_bg');

function vc_before_init_story_bg(){
  vc_map( array(
      'base'        => 'story_bg',
      'name'        => __( 'Hero section with background carousel from smile stories', 'theme-translation' ), // translated
      'category'    => __( 'Theme Shortcodes' ),
      // 'icon'        => THEME_URL.'/assets/images/icons/play-button.png',
      'show_settings_on_create' => true,

      'params' => array(
        array(
          'type' => 'textfield',
          "heading" => __('Tag text', 'theme-translation'),// translate
          'param_name' => 'tag_text',
        ),
        array(
          'type' => 'colorpicker',
          "heading" => __('Tag color', 'theme-translation'),// translate
          'param_name' => 'tag_color',
        ),

        array(
          'type' => 'textfield',
          "heading" => __('Advertisement', 'theme-translation'),// translate
          'param_name' => 'advertisement',
        ),
        array(
          "type" => "textfield",
          "heading" => __("Before title", "theme-translations"),
          "param_name" => "before_title",
        ),
        array(
          "type" => "textfield",
          "heading" => __("Title", "theme-translations"),
          "param_name" => "title",
        ),
        array(
          "type" => "textfield",
          "heading" => __("Text", "theme-translations"),
          "param_name" => "textarea",
        ),

        array(
          "type" => "vc_link",
          "heading" => __("Video url", "theme-translations"),
          "param_name" => "video_url",
        ),

      ),
  ));
}


class WPBakeryShortCode_story_bg extends WPBakeryShortCode {
   protected function content( $atts, $content = null ) {
    extract( shortcode_atts( array(
      'tag_text' => false,
      'tag_color' => false,
      'advertisement' => false,
      'before_title' => false,
      'title' => false,
      'text' => false,
      'video_url' => false,
    ), $atts ) );

    $link_data = vc_build_link($video_url);
    ob_start();

    $posts = get_posts(array(
      'posts_per_page' => -1,
      'posts_type'  => 'post',
    ));

    $posts_formatted = array_map(function($post){
      return array(
        'category' => get_field('sub_title', $post->ID),
        'title'    => $post->post_title,
        'bg_img'   => get_the_post_thumbnail_url($post, 'full'),
        'video_url'   => get_field('video_url', $post->ID),
        'name'   => get_field('feed_name', $post->ID),
        'permalink'   => get_permalink( $post),
      );
    }, $posts);

    $args = array(
      'stories'       => $posts_formatted,
      'tag_text'      => $tag_text,
      'tag_color'     => $tag_color,
      'advertisement' => $advertisement,
      'before_title'  => $before_title,
      'title'         => $title,
      'text'          => $text,
      'video_url'     => $link_data['url'],
    );

    echo print_theme_template_part('story-bg', 'wpbackery', $args);
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
   }
}
