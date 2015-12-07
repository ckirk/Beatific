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
define('DB_NAME', 'wordpresstest');

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
define('AUTH_KEY',         'dn%<83xUJ5,Xag$%yN9/^`(W*b. Oa^XF{,Y2lF;eCfUK%c}-S7FrOMK*1?E1 ^3');
define('SECURE_AUTH_KEY',  'ZPVTfdBwYZSu,[I0y%^}AIl2w)Q<C6y 1iP+DmSI*7&0T};x+4,hG|:U+y:DoE9D');
define('LOGGED_IN_KEY',    '-By%ru,2d?9!#kQ~7Br5AXyL,Yk+TD64vX-/h:>gZ$,4e36W3@aqXnY;Qjt:669H');
define('NONCE_KEY',        'KOBn`oC*mmt<zV|w:Z#e06e&6@5SRB-w3zM4UPn$#$w$AH>t|TWBMLxJTr1 1Vl,');
define('AUTH_SALT',        '%WDZ{^},F E^*=P@h[-ufa`njE+tZ|t|HpLk1e--iX+6Ej,*nU-H6NEM|hCR+9Kd');
define('SECURE_AUTH_SALT', '_{7ZX 4RJC|5+G%k[ i-HffVR[7cM[&+Xr5@<O;;3Swx5vE&Sc[D7Ncf@>u9KM6g');
define('LOGGED_IN_SALT',   'O;Mh_2r<5/F_+B|k%`SR~t0%OJdG28ROFsA#zaDM+R-r}a-/ilmW@*VPCqhDDcw1');
define('NONCE_SALT',       'hJt!+ziQA*Z0T=ZZ>NZk+h~m<_+*uLzHHxfT9>|?@{E/-0++9(c8vKN2nSaQ:YbX');

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
