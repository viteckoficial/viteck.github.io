<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'viteckoficial_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'jc2HhBl)(e`zA<Ca>Y60.9$=D3eG,nZ-}n:ku~Q&?4y~0m1uQ8t@~73rP44qE*ix' );
define( 'SECURE_AUTH_KEY',  '3-#{J|ya3H+grb<P-e6&kn[3Xf&X0IM.+KfAFWPS(mgp/m:zoJEYB|m>yjR<_7:2' );
define( 'LOGGED_IN_KEY',    '=&ztEu<v:HH.W<!AR3/S0bp%Ns{OR?B%i[^iw|K&5+kgb:==4-G$.)PGF1r2@~oi' );
define( 'NONCE_KEY',        'WzbelmicX3G ,/9ZW5RM|%tBJHJe3@ .}W6iZ%{9R=|7afULIl&P%/DX;d9Q0!c,' );
define( 'AUTH_SALT',        'c&@GuYRNt3[kGz]*/W$x=PPG/4S3QfioylG9m}jc~I90U_3_$/0XlG<^1| H@6rk' );
define( 'SECURE_AUTH_SALT', '7_i67heMMZ@yNsA7YK>nc.&$Eb}hy8DAQW#XujY)PuqE=d1W[KQ%4#lUC J}!S2P' );
define( 'LOGGED_IN_SALT',   'ET?zKVcWB@]}1&}jO-yP[}mBhRmi!:^B>}W^W%Qo+h~Q6~4apP&f1Cgjq_a$WX>u' );
define( 'NONCE_SALT',       '-4hkfT-[$8?L6tK`@3D1*s&9MpG6#}n|aOh(P$BYpk@$8?p pv*QaR)72i~R^WE!' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_1';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
