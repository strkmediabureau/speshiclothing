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
define('DB_NAME', 'wordpress_e');

/** MySQL database username */
define('DB_USER', 'wordpress_a');

/** MySQL database password */
define('DB_PASSWORD', '78c#LlPKy1');

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
define('AUTH_KEY',         'g@&Cn4SS*@mtdTj6O)#2VyTvaAnaaJdZK%yHhflCDl&4M7vb1tQ^ye3f3Ie%7cCs');
define('SECURE_AUTH_KEY',  'I)!3^lb&Ag(6MPn*8TpQLK0!JVYveB0(42QotQsXFW6UszZNod!Xmg50eXVoaHM)');
define('LOGGED_IN_KEY',    'um9QnHo^VA#rxexUfka6S@c!!dt*uJk&2tIPSyZlAOHTgOd^MVQ^6ZKK0N#Bp)@U');
define('NONCE_KEY',        '70KFRoSh*bhc(1!5)@oAxez9sM^ZC8r9^XqZFqU4p3IB^lWUgCJtVXDG9zZQju47');
define('AUTH_SALT',        'vv5FSKKaYQcQ&&*ECt@#sG%O)*BgvnKRQ6#CEu6x%pdi30T8Cl9&1fQT4D8HN9q#');
define('SECURE_AUTH_SALT', 'n89gb0l^pRH8fR*m@hi@5yIpknr&G8(7avW84lqCVot@r!YncoBvGqpsn(DwAUpu');
define('LOGGED_IN_SALT',   'tLKJDkaS(ASPjK^6h)crkDFTPIzoMgJ4iFNvR&UR08ws(eFmfqoXjnjF0Q0slc!y');
define('NONCE_SALT',       '6%(S@)9@2&lqCVgv*Q!QXShZd3sHQm*I9MS^E&HwTp%47kiz4O%O2(9^S@cNz@mS');
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
