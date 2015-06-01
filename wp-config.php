<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'phanngoc_saigonhoa');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
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
define('AUTH_KEY',         'c(-YJDmWzq}SP>t~9O;E._Nb|T+~a||Rq6g|wj2c/+b[j9,|/9kd2Z(gYFSe7f~%');
define('SECURE_AUTH_KEY',  'MyLS+GKeDth]8Ln.|ye);8#{yt{E~|B-+x~7-b){+C0vP^agLxR48 H>kO~Q%Mf{');
define('LOGGED_IN_KEY',    '_%e-=FX@ A]n5Z?3J<QQX3&l4ayz)8apvV0g4i7nh+::My[f)}f0+0iR9H0fkj^G');
define('NONCE_KEY',        'no}i;l*0L--8{FkDEGp&hzj7T9F)k-I>l.g*V,>m|; :=4 4z1|o<,:Goqj/d(GY');
define('AUTH_SALT',        '++aNK`y*DzjLh~EP5]?y@bVnv.+UxL- %iwN7._JGpo=N!/:61s+1*e47?36!$J8');
define('SECURE_AUTH_SALT', 'z9h4O&Us(1YnfS?-U|~[a&|ZHG#EW|gmVf-@?nJ5N!<w2mxN&w$pdXQJ6jc[em8{');
define('LOGGED_IN_SALT',   '(.R`w8pS_QyZe74K49~$HB{,kCx~W3NzX|x` 99Z#I.`VwgbA5-@M])<3iAUPNX>');
define('NONCE_SALT',       '.WOd$=ro+U3^5D@z>G[IUk41]AI<A5:{1;{g4@cAq-)BFDtbd-3c_aib_uyzdXt.');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WPLANG','vi');
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
