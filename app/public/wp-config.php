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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '7yG0s>yKG 8>PN$sZURN+IV>]PSkLN1 8]52_&y*qWC:~$Q7Or2<3UUzR+cX*C|b' );
define( 'SECURE_AUTH_KEY',   '>C 1jG?t,fSC%&0QB{-fl4Y_~*OUF0=NG&vT.i]tLb,Ct38b[X~-<{p<MJ 8x3jp' );
define( 'LOGGED_IN_KEY',     'vgEgK+Kn!l;Fer&J`]%82kfeL,l-2g!]xDC!^%le+UAf}!~N0>mPFnC1BrC`MVR)' );
define( 'NONCE_KEY',         '79i@C ?jd)jvioVV|{f_#z!bQDB;zunUHF|ZfDfO:cra^>LN=Bo=?(JV>O#$7T w' );
define( 'AUTH_SALT',         'pIi,EpMU_wvOVR#J!_0h.=k$%U.V/^HCQ@f u{)YloA4p)0.dO![{ZFSiNQPX~T3' );
define( 'SECURE_AUTH_SALT',  'B4){5h2W*w@GfOwAICZxigfD+Nd}{v|:WN|4J+rxb{T?$FX;tCC:H[z09WttMU+Q' );
define( 'LOGGED_IN_SALT',    '}ErZXoUH6&M%g@hh&R1=s6B)V.Orqtd2pl`#)U%WNc%Coz`h8_8G_[h*~_GwUnEf' );
define( 'NONCE_SALT',        'PsqU#8[:Ud+YzbiNBv;H5Br~ckttYCFjRyA,R4<W0/%{x>p>E_0}@IKx3|%Ad.7o' );
define( 'WP_CACHE_KEY_SALT', 'VhD qsu:rcL(8(EDw^|lW]eJB]G9q{`(A>O`;?LgO>LQu!z)T@7<ipK5Ac</lJyy' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
