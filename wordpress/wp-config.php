<?php
/** 
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
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
define('DB_NAME', 'wordpress_3');

/** MySQL database username */
define('DB_USER', 'wordpress_b');

/** MySQL database password */
define('DB_PASSWORD', 'OXv6k!8C0o');

/** MySQL hostname */
define('DB_HOST', 'localhost:3306');

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
define('AUTH_KEY',         'ZcDCessb(X@aO0RBsuE6tn8xy@r(GsXfo3yQqybu0J^fKqS0itR(SvbkC(TU(1fl');
define('SECURE_AUTH_KEY',  'Z#!so48sXuoz3VXXAQsjbai1RWGiHiifUFOg%a#GpL^gF!7fbITEsF89J2L*CKqc');
define('LOGGED_IN_KEY',    'FV45m^Yj82dPqwAMst19SsmsF*siNe4SCr0yMQfE(3cJLZHnE8tJLo5SEXVCYUPo');
define('NONCE_KEY',        'dZy#V8K46Sb9E^GrBP5S&2CgEncDR*R8j0OcJRwsRJwpgW%5*lF15JIkLrfwKKWH');
define('AUTH_SALT',        'I^0!FMAgUHsnjVtWL2FB6CJWXjYTq^ZRoE#!LryWedq4uDr2gZE5921Ik)1I3)R*');
define('SECURE_AUTH_SALT', 'Q9eq0^h3zXPgT%SHEY6vYGr&JND(mOr234m98(wmHcR0sonKLSEtvfOx7XvtVNBq');
define('LOGGED_IN_SALT',   'q(UH6KOZoUPS1c6OcM%ffqy4)84v##PXwVUyK2WHrT&QDTWTAl@QPb^Ct39tb#y0');
define('NONCE_SALT',       '#g52NZsTK&UYbbJS#BRU1iCljQjk*1e%0B*eleE6ci&d4Mr@an69hU2fNRcP*Yn#');
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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', 'en_US');

define( 'WP_ALLOW_MULTISITE', true );

define ('FS_METHOD', 'direct');

//--- disable auto upgrade
define( 'AUTOMATIC_UPDATER_DISABLED', true );
?>
