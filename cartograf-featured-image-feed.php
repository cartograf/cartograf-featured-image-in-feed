<?php
/*
Plugin Name: Cartograf Featured Image in Feed
Description: Add the featured image to your WordPress site feeds, so that you can enhance the reading experience of your subscribers.
Version: 0.1
License: GPL
Author: Cartograf | Jose Alcántara
Author URI: http://www.cartograf.net
*/

// thumbnail para newsletter
add_image_size( 'newsletter', 550, 412, false );


function rss_post_thumbnail($content) {
  global $post;
  //$content = preg_replace( '/<iframe(.*)\/iframe>/is', '', $content );
  if(has_post_thumbnail($post->ID)) {
    $content = '<div style="display: block; margin-right: 10px; text-align:left;"><a title="See content in '. bloginfo('name'). '" href="'.get_permalink($post->ID).'">'. get_the_post_thumbnail($post->ID, 'newsletter') .
    '</a></div>' . $content;
    }
  return $content;
  }

add_filter('the_excerpt_rss', 'rss_post_thumbnail');
add_filter('the_content_feed', 'rss_post_thumbnail');



?>
