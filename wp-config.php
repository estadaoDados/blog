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
if (isset($_SERVER["DATABASE_URL"])) {
   $db = parse_url($_SERVER["DATABASE_URL"]);
   define("DB_NAME", trim($db["path"],"/"));
   define("DB_USER", $db["user"]);
   define("DB_PASSWORD", $db["pass"]);
   define("DB_HOST", $db["host"]);
}
else {
   die("Your heroku DATABASE_URL does not appear to be correctly specified.");
}
/** The name of the database for WordPress */
//define('DB_NAME', 'blog');
/** MySQL database username */
//define('DB_USER', 'estadao');
/** MySQL database password */
//define('DB_PASSWORD', 'estadao');
/** MySQL hostname */
//define('DB_HOST', 'localhost');
/** Database Charset to use in creating database tables. */
//define('DB_CHARSET', 'utf8');
/** The Database Collate type. Don't change this if in doubt. */
//define('DB_COLLATE', '');


define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME'] );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'AX|z-a9;b#hT&rBf#r^].)cwKN1-e<cOSS-|U;4(Hcz}B([>?IGr#P.Ia~pgEG0I');
define('SECURE_AUTH_KEY',  'fr-C]x;)&P&nck@.(CXqS|rX)c7$OKUj40{1{|9sgs-V$&5meQ?Om,9d&R[18x0g');
define('LOGGED_IN_KEY',    'l$|u-ybqK82(hdCW/Z[}qs|AG-n@kD}(s<;x<~4(PX*Qsqm:F.A[=`M]v|pG|K/;');
define('NONCE_KEY',        '>m$BM-[)iD1`AzE|d=x[d(psVBG5BuYI1Ct`;v:!2AI>; R70NQsJ^ElJV0*vZo-');
define('AUTH_SALT',        '!+sSV, !O)*q|BZ!>O+yc+=)vfmmD<sRD<Tc_b30v5DqSU7OIMb&KWi>fDkx5yW3');
define('SECURE_AUTH_SALT', 'd]#LV*HTK}z*Dx|Di3HO&_?r(fGoQnkL3rPDW0YeodDge2@L=+9kAO+OJaxrVe&Y');
define('LOGGED_IN_SALT',   '~50ldu4*OKFE-x*{MyoypElt: 9+RJcEa5:%2ty@o[iyn5%.,.smrS&X%O6kGW6x');
define('NONCE_SALT',       '0p;92@ligGg3(yc>O1%;t<%~F}(@E8S@4)r.9Huw:Bv2<oFU?iMs;YD^^ b~LOCq');

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
define('WPLANG', 'pt_BR');

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
