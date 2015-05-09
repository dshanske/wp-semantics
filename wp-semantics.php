<?php
/**
 * Plugin Name: Semantics for WordPress
 * Plugin URI: https://github.com/dshanske/semantic-wordpress
 * Description: Enhance Semantic Markup for WordPress 
 * Version: 0.1.0
 * Author: David Shanske
 * Author URI: http://david.shanske.com
 * Text Domain: Microformats2, Semantics, Microdata
 */

function wp_semantics_activation() {
  if (version_compare(phpversion(), 5.3, '<')) {
    die("The minimum PHP version required for this plugin is 5.3");
  }
}

register_activation_hook(__FILE__, 'wp_semantics_activation');

// General Functions
require_once( plugin_dir_path( __FILE__ ) . 'semantics.php');

// Microformats2 Class
require_once( plugin_dir_path( __FILE__ ) . 'class-wp_mf2.php');

// Microdata Class
// require_once( plugin_dir_path( __FILE__ ) . 'class-wp-md.php');

