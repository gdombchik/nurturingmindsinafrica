<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
#define('WP_CACHE', true); //Added by WP-Cache Manager
#define( 'WPCACHEHOME', '/home3/seganm/public_html/wordpress/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'seganm_wrdp2');

/** MySQL database username */
//define('DB_USER', 'seganm_wrdp2');
define('DB_USER', 'root');

/** MySQL database password */
//define('DB_PASSWORD', 's0igCx4zkxhV48');
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'ap(QS1!95?rCFh|b^8);1CEO~aKRyA@*ql7MjYo26pe20JI!J5UVID@3eZ|fDG#4');
define('SECURE_AUTH_KEY',  'JJhAB:2KfRbW_h<7>>I(zAe7CE1sq2H7VF8T@yKatB;z>mqb;2zLUlL=xfW-6zdjW5Vs6<');
define('LOGGED_IN_KEY',    '?xsliY*vfA*fD3/;4Dv|_*TGP*;eWYpaAhRh7wyLb2IS_8I8j$p*O4~sfWHU5OqDEFD*1ScCc;d79lW');
define('NONCE_KEY',        'f5dDK5i5#pGBy5#n9ZtD\`E1G=g2w6?uWW_5tRm^l*^=aQFBFz3:5U6VxBst/#Df;2FJ1q\`9n_v');
define('AUTH_SALT',        '8o_0LLVu|9?17PWtbYI*XGTye56UC^0T(ISOd6C3~V_(N;bOy5@19c_:d^6zH-~IXQL4></dE>LF?\`EE');
define('SECURE_AUTH_SALT', 'lXEz<WE>:?MxH\`4hrkgb:*F7qhR53EiU<U|g#j<0U;vlcvZ=5qXD3$rOyitIfVI!LG4#Z/');
define('LOGGED_IN_SALT',   'MGs!=SBUsvYp_idw6)<!tW\`>_\`Epqg1O|=|MHkU:^i3io^kz!D<f#nB~zrq<141^)pR/maB||s0)x');
define('NONCE_SALT',       '|mQF@RANQDSjiTc9BLBz-2;1d1qQ8c*u(tI/;|AM~ANb@1Y3SOaB((YQCf-e_9)xJ4I$G');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
