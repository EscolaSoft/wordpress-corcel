<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress');

/** MySQL database username */
define( 'DB_USER', 'wordpress');

/** MySQL database password */
define( 'DB_PASSWORD', 'wordpress');

/** MySQL hostname */
define( 'DB_HOST', 'db');

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'ePQW?4F]qX$]K%uM}vI %GNsi`mh>E 3-]>^{.h*lBAiF@6mS[|&2p?A&&J#!,(*');
define('SECURE_AUTH_KEY',  'zy33b)c}bGa0Sf-(4-VK~e&G6?x7$s5)rn!lWA#nT8noVOjqF3*&^h~H U$Iyrov');
define('LOGGED_IN_KEY',    'J^NTjHA+JKy3?-e1w2Szpc>a9-8=R!-wU;J_, |QJ]Vi,BB--}edJ7dH4^$f{gI5');
define('NONCE_KEY',        '@VtfQjv[~%hEC=*/.z*DQgDCr=[+}o>}x5l*SDzkC>f<2b9UL#R#J[#tf5(5w<Y-');
define('AUTH_SALT',        'K&+n!8B&zWb[ITJ#o.8a>@!O(.(U@{-&k_D2en^p+!%/DG^WP99$!( -,i:-/c:^');
define('SECURE_AUTH_SALT', 'x#Esh17mRt-|5O}qP/8sA;MVuxEL@~sPF8kccyEaK6?~[1+k{vE}?|Wr6+tP[Z~Z');
define('LOGGED_IN_SALT',   '@n~#i!3Qe~=+_v++dQ7&z|2uUS`jr2>3Ybm2!o-.B(H1Ons{`s:N{Y-7):?s|:QT');
define('NONCE_SALT',       'au2-)S0[$??`ZR@mj-: g4TmfA4-+sw|&NAK|)_w_@mTT[`PD3sTLB`;+a=rQOGV');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */




/* That's all, stop editing! Happy blogging. */
if (!defined('WP_CONTENT_DIR')) {
    define('WP_CONTENT_DIR', dirname(__FILE__) . '/wp-content');
}
if (!defined('WP_CONTENT_URL')) {
    define('WP_CONTENT_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/wp-content');
}


if (!defined('WP_SITEURL')) {
    define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME'] . '/');
}
if (!defined('WP_HOME')) {
    define('WP_HOME',    'http://' . $_SERVER['SERVER_NAME'] . '');
}

if ( !defined( 'ABSPATH' ) )
    define( 'ABSPATH', dirname( __FILE__ ) . '/' );
require_once( ABSPATH . 'wp-settings.php' );