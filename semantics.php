<?php
// Purpose of these functions is to further enhance control of semantic
// markup in WordPress

if (!function_exists('get_attributes')) {
  function get_attributes($id, $class = null) {
    switch($id) {
      case 'body':
        $classes['class'] = get_body_class(;
        if (!is_singular()) {
          $classes['class'] = 'hfeed';
        }
        break;
      case 'post':
        $classes['class'] = get_post_class();
        break;
      case 'site-title':
        break;
      case 'site-description':
        break;
      case 'content':
        $classes['class'] = 'entry-content';
        break;
      case 'published':
        $classes['class'] = 'published';
        break;
      case 'updated':
        $classes['class'] = 'updated';
        break;
    }    
    array_merge($classes, array($class) );
    $classes = apply_filters( "attributes", $classes, $id );
    $classes = apply_filters( "attributes_{$id}", $classes, $id );
    return $classes;
  }
}

if (!function_exists('the_attributes')) {
  function the_attributes($id) {
    $classes = get_the_attributes($id);
    if (!$classes) {
      return;
    }
    foreach ( $classes as $key => $value ) {
      echo ' ' . esc_attr( $key ) . '="' . esc_attr( join( ' ', array_unique($value) ) ) . '"';
    }
  }
}


