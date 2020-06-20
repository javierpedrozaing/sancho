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
define( 'DB_NAME', 'sancho_2020' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '12345678' );

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
define( 'AUTH_KEY',         'K=puiG~9zSAJ@Y--/43PPVB,[eYz@OLXyBC(TjX~]jE0,$:Zh?beE60#rG4f`u}/' );
define( 'SECURE_AUTH_KEY',  'zSh5Zetc)J[Jg<X2gYfuNsfc~TiwV_T`ITFMV{yGrdlbf~17dred#Za}AIkR(LHv' );
define( 'LOGGED_IN_KEY',    'D^>xy; e!I&Q$+fylvOT42#:|<51A;311;}Igj@Xc-jFuh=IeKj|i%zgbcI(4pX7' );
define( 'NONCE_KEY',        'pAqlF9Ya>pe)hgND)X+it]JctO362 []H16F(*P@L&k^#x9_MbW6,1NSjKah3xPv' );
define( 'AUTH_SALT',        'Np+[vChvu-U/ne0kML]h%mfbn3q)I~!p&H68DVEcJ:CpRvmJQlg>G OkoNDZ0<^#' );
define( 'SECURE_AUTH_SALT', '1gl *E&YW`Z;]s0)~ i,RUEckpj?;!B~XUA1h+`{VpjKDGM{D%:..veT^YXp]9CC' );
define( 'LOGGED_IN_SALT',   'dIZ{!(Wn7RcGbu|zum,N%@]nOzMAt0wtUJRwc$f49f+2~)TTyfqffvMvm<LXm4,&' );
define( 'NONCE_SALT',       'jNgWfEmH9iu_[s!N~NE%j({u-{,6bj[%#(A WuMp0,%0||CmI=,1Ki9K0VSHYQ9`' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'san_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
