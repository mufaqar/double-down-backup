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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u502850329_Demo_dev3' );

/** MySQL database username */
define( 'DB_USER', 'u502850329_DemoU3' );

/** MySQL database password */
define( 'DB_PASSWORD', '|J8qA2efdL?' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'voMdY);Gg#E6{}6s<_^ujZ,F[Vs*r6)TfLCqc.|l.QcJb.O l7/@)5%5p+*u1o@;' );
define( 'SECURE_AUTH_KEY',  '/y-=DZ%iD129Kqvfk^k?1gj(a%pN}q8/n2x+ZU2oPjTu#~jaMhA^bM3kB3LI1K.;' );
define( 'LOGGED_IN_KEY',    '`SDl0~1mu#XVoMuH ,{=F:<Eer_kL[bMo!#G^DU^lOSCo6E8 /Ck?W^GW8r>V%vO' );
define( 'NONCE_KEY',        '3ZqyFjSF@,rK=pd;,,4$]YQubb6%}TlAhb{c mdpD9naw _tLRzF_~+4t?_<>t6M' );
define( 'AUTH_SALT',        ':$h,>$@>.c-7)k}OKP.?Yu;IB4VhO,zj_Ct6vY[ V|d~Cl,Ss {&a)o9UZO(O{?~' );
define( 'SECURE_AUTH_SALT', '+g5G2Vs=Eu%s`.Vqx(Q5Q*;4xt62`$H<3Yb2!0s7X!}8VeGW3[s7#~RR5n3u`QG@' );
define( 'LOGGED_IN_SALT',   'K`^a0Qaf[2VaZKm|#v^qr#!a~sKGZQ7f~P$9lF,+pQ~oqf0V%6ku>*O}TO-T[Q)t' );
define( 'NONCE_SALT',       '>wX`?Th#q1.{IaYZ0bHrnOmC*P{f2U>&%<&!XzQ$0m/*m+=jqNu`9{cNU:O8tAQm' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'dv3_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false);


//define('DISALLOW_FILE_MODS',true);

define( 'FS_METHOD', 'direct' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
