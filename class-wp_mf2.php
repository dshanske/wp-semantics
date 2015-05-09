<?php
// Microformats 2 Support

add_action( 'init' , array( 'wp_mf2' , 'init' ), 12 );

class wp_mf2 {
	/**
 	* Adds class functions to the various filters.
 	* @since 0.1.0
 	*/
	public static function init() {
			add_filter( 'post_class' , array( 'wp_mf2' , 'post_class' ), 99 );
			add_filter( 'body_class' , array( 'wp_mf2' , 'body_class' ) );
			add_filter( 'comment_class' , array( 'wp_mf2' , 'comment_class' ) );
			add_filter( 'get_comment_author_link' , array( 'wp_mf2' , 'get_comment_author_link' ) );
			add_filter('pre_get_avatar_data', array( 'wp_mf2', 'pre_get_avatar_data' ), 11 , 5 );
			// add_filter( 'get_avatar' , array( 'wp_mf2' , 'get_avatar' ) );
			// Enqueue Scripts as Needed
			// add_action('wp_enqueue_scripts' , array( 'wp_mf2' , 'enqueue_scripts' ) );
  }

/**
 * Filters the array of classes for the post div.
 *
 * Adds microformats2 classes for the post div.
 *
 * @since 0.1.0
 * @param type string|array $class One or more classes to add to the class list.
 * @return type array Array of classes.
 */
	public static function post_class($classes) {
		$classes = array_diff( $classes, array( 'hentry' ) );
		if ( ! is_singular() ) {
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

/**
 * Filters the array of classes for the body div.
 *
 * Adds microformats2 classes for the body div.
 *
 * @since 0.1.0
 * @param type string|array $class One or more classes to add to the class list.
 * @return type array Array of classes.
 */
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

/**
 * Filters the array of classes for the comments div.
 *
 * Adds microformats2 classes for the comments div.
 *
 * @since 0.1.0
 * @param type string|array $class One or more classes to add to the class list.
 * @return type array Array of classes.
 */
	public static function comment_class($classes) {
  	$classes[] = "p-comment";
  	$classes[] = "h-entry";
    return $classes;
  }

/**
 * Filter the comment author's link for display.
 *
 * @since 0.1.0
 *
 * @param string $return     The HTML-formatted comment author link.
 *                           Empty for an invalid URL.
 * @param string $author     The comment author's username.
 * @param int    $comment_ID The comment ID.
 */
  public static function get_comment_author_link( $return, $author, $comment_ID ) {
		$url = get_comment_author_url( $comment_ID );
		if ( empty( $url ) || 'http://' == $url )
			$return = $author;
		else
			$return = "<a href='$url' rel='external nofollow' class='url u-url'>$author</a>";
		return $return;
  }

/**
 * adds classes to get_avatar
 *
 * @param array $args Arguments passed to get_avatar_data(), after processing.
 * @param int|string|object $id_or_email A user ID, email address, or comment object
 * @return array $args
 */
	public static function pre_get_avatar_data($args, $id_or_email) {
    if(!isset($args['class']) ) {
      $args['class']=array('u-photo');
    }
    else {
      $args['class'][]='u-photo';
    }
		$args['class']=array_unique($args['class']);  
    return $args;
  }
  
  public static function enqueue_scripts() {
  }

}
