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
define( 'DB_NAME', 'f0585302_app_wordpress_0' );

/** MySQL database username */
define( 'DB_USER', 'f0585302_app_wordpress_0' );

/** MySQL database password */
define( 'DB_PASSWORD', '1cGWdBfq82' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'D]/jL}/ok6Q)1d#`a#$AsU@#m *CGxcTp`F5_55l?YPS@Njg2;=b3@U~H20G:i3v' );
define( 'SECURE_AUTH_KEY',  'e70ZEh0:~iT]]d,*mNfbasbr/H`3x,#:G1G[w,Dw=.@Yj{S }[?Qt1,)6Bth3+L%' );
define( 'LOGGED_IN_KEY',    '5>hT4huu./Ujl|clB @EHq^V-r8p12!+t?p0cjhIC;MgF&$1MTrJS8i;([dgMy;%' );
define( 'NONCE_KEY',        'uC!UT[zSO-V.~S,8*o{g@Tf[CoI;P%6Gi66?oj_{_g-PxJ=pCOnr;F]&cUZ}u(.K' );
define( 'AUTH_SALT',        'FOR+ETGnSc~NayM90yB{Iin |eMxU Hlw;lJ80_H>d~$9M`W5nib @zZTSAcOL]~' );
define( 'SECURE_AUTH_SALT', '58TnL}|!f=V#(:l7&F0n>C~cLIi{;.J=X-zE8rr|,)rfgu*ZwvuBCT:H`Wa(&~5D' );
define( 'LOGGED_IN_SALT',   'f]qNeKJ4|O}N[TrLo,+=/) tSkPz,qZt>ltc(twLDV}dZLP5eSSPbzjhcMQ4l*]$' );
define( 'NONCE_SALT',       '3d7nCLG]a0V&RDMUQAncO=ip92j7ARQf=[yc<C TbRp}#cQxi4m8/^F6[K#rQE9L' );

/**#@-*/

/**
 * WordPress database table prefix.
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
