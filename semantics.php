<?php
// Purpose of these functions is to further enhance control of semantic
// markup in WordPress

/**
 * Gets attributes.
 *
 * Retrieves attributes associated with what a particular tag surrounds.
 *
 * @since 0.1.0
 * @param type string $id The type of tag, for example, body or post.
 * @param type array $class Optional. Array of attributes
 * @return type Array of attributes.
 */
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
		/**
		 * Filter the list of attributes.
		 *
		 * @since 0.1.0
		 *
		 * @param array  $classes An array of attributes.
		 * @param string $id The type of tag
		 */
		$classes = apply_filters( "attributes", $classes, $id );
		$classes = apply_filters( "attributes_{$id}", $classes);
		return $classes;
	}
}

/**
 * Echoes attributes.
 *
 * Echos the output of get_attributes attributes
 *
 * @since 0.1.0
 * @param type string $id The type of tag, for example, body or post.
 * @param type array $class Optional. Array of attributes
 */

if (!function_exists('the_attributes')) {
	function the_attributes($id, $class = null) {
		$classes = get_the_attributes($id, $class);
		if (!$classes) {
			return;
		}
		foreach ( $classes as $key => $value ) {
			echo ' ' . esc_attr( $key ) . '="' . esc_attr( join( ' ', array_unique($value) ) ) . '"';
		}
	}
}


