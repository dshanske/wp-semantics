<?php

add_action('init', array('wp_mf2', 'init'), 12);


class wp_mf2 {
  /**
   * Initialize the plugin.
   */
  public static function init() {
    if( current_theme_supports('microformats2') ) {
      add_filter( 'post_class', array('wp_mf2', 'post_class'), 99 );
      add_filter( 'body_class', array('wp_mf2', 'body_class') );
      add_filter( 'comment_class', array('wp_mf2', 'comment_class') );
      add_filter( 'get_comment_author_link', array('wp_mf2', 'get_comment_author_link') );
 //     add_filter( 'get_avatar', array('wp_mf2', 'get_avatar') );
    // Enqueue Scripts as Needed
    add_action('wp_enqueue_scripts', array('wp_mf2', 'enqueue_scripts') );
    }
  }
  public static function post_class($classes) {
    $classes = array_diff($classes, array('hentry'));
    if (!is_singular()) {
     // Adds a class for microformats v2
     $classes[] = 'h-entry';
     // add hentry to the same tag as h-entry
     $classes[] = 'hentry';
     // adds microformats 2 activity-stream support
     // for pages
     if ( get_post_type() == "page" ) {
      $classes[] = "h-as-page";
     } 
   }
  return $classes;
  }
  public static function body_class($classes) {
    if (!is_singular()) {
      $classes[] = "hfeed";
      $classes[] = "h-feed";
      $classes[] = "feed";
    } 
    else {
      // Adds a class for microformats v2
      $classes[] = 'h-entry';
      // add hentry to the same tag as h-entry
      $classes[] = 'hentry';
    }
    return $classes;
  }
  public static function comment_class($classes) {
    return $classes;
  }
  public static function get_comment_author_link($link) {
    return $link;
  }
  
  public static function enqueue_scripts() {
  }

}
