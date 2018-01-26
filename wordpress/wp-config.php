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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'mS`<?S0yR}M tRnZDN51jNt^oeI& 8%i(7)LG9CxKybbZ ;SXrF FX~%oLPfyj:#');
define('SECURE_AUTH_KEY',  'W.5]#OP_DJ,HzG#Y!bukq,Pt^+,u(W9}>YQ!*g VDOKm!6~J,JhDt-Fd=S;_W97]');
define('LOGGED_IN_KEY',    '!dlD9mQ%_H 3:|k%mS2X(!Q6lDXxmy,?D&[ApD.nTj&-UEaU>y($Na~icSn)^M1$');
define('NONCE_KEY',        '-SL84oSlo5GKs&xE`<uN,+=:F:m,1o[+o2lWq(&Q1<_Jz~DM*WWC&7YtCo<$M7C]');
define('AUTH_SALT',        'q[%cXCK{v8>hgte8SmpMs=2k5<aVl<6AVrqT4l26)Q)H0F5D#%w:$0qqZaHfk@Ms');
define('SECURE_AUTH_SALT', 'HP T3yXq~3t/1i*.JIj4{;RC_IEw(Q*|*xaPU-5zAu(GBIxzmu{|+c.p_lc;-L|7');
define('LOGGED_IN_SALT',   'e8+IM~{v-X8M:sZS,v~2TW[RDjE93M#,ghhY`_gqwHQ2#pB(dS<x-2}v.Bj]/Y2]');
define('NONCE_SALT',       'v%jn[la7[9{c/A.!P$]vYSRDc(Ayu|G}$Nr[f^eB%rR80LcXaN~Xs*mYT$4eG2hp');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
