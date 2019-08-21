<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */


define('WP_USE_THEMES', true);


define( 'ABSPATH', dirname( __FILE__ ) . '/wordpress/' );
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/wp-content' );

/** Loads the WordPress Environment and Template */
require( ABSPATH . 'wp-blog-header.php' );
