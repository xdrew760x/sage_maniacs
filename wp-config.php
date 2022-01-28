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


/*
* Compression
*/
define('COMPRESS_SCRIPTS', true);
define('COMPRESS_CSS', true);
define('ENFORCE_GZIP', true);

/**
* Disable automatic update
*
* @link http://codex.wordpress.org/Configuring_Automatic_Background_Updates
*/
define('AUTOMATIC_UPDATER_DISABLED', true);

/**
* Limit number of revisions saved
*
* @link https://codex.wordpress.org/Revisions
*/
define('WP_POST_REVISIONS', 10);

/**
* Update default mem limit
*
* @link http://codex.wordpress.org/Editing_wp-config.php#Increasing_memory_allocated_to_PHP
*/
define('WP_MEMORY_LIMIT', '64M');

/**
* Disable dashboard file editing
*
* @link http://codex.wordpress.org/Hardening_WordPress#Disable_File_Editing
*/
define('DISALLOW_FILE_EDIT', true);

/**
* WordPress Environment
*
* The default usage is:
* 	development - For local development
*	production - For live site
*/
define('WP_ENV', 'development');

// Switch MySQL settings based on environment
switch(WP_ENV){
	// Development
	case 'development':
	/** The name of the local database for WordPress */
	define('DB_NAME', 'xpress_db');

	/** MySQL local database username */
	define('DB_USER', 'root');

	/** MySQL local database password */
	define('DB_PASSWORD', 'root');
	break;
	// Production
	case 'production':
	/** The name of the live database for WordPress */
	define('DB_NAME', '');

	/** MySQL live database username */
	define('DB_USER', '');

	/** MySQL live database password */
	define('DB_PASSWORD', '');
	break;
}

// ** MySQL settings - You can get this info from your web host ** //
/** MySQL hostname */
//define('DB_HOST', '10.138.183.40');
define('DB_HOST', '127.0.0.1');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', 'utf8mb4_unicode_ci');

/** Custom Content Directory **/
define('WP_CONTENT_DIR', dirname( __FILE__ ) . '/app');
define('WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/app');

/**
* Authentication Unique Keys and Salts.
*
* Change these to different unique phrases!
* You can generate these using the {@link http://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
* You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
*
* @since 2.6.0
*/
define('AUTH_KEY',         'XG;-X|ji73FFUuXv<C!9!Sv%Ny5KqeU/{|Z9EaVbkmWa:Oo<.x*`j&*JolQ~}4jy');
define('SECURE_AUTH_KEY',  ')pfBOM`2@I=Eh*lT*9&x}%C+xUV.z}D*%g-yOHxUBmWZ{U*b2K3B@OmKZBS,ss7p');
define('LOGGED_IN_KEY',    'M<AB[PP4%!e->ACfUP@G[afPYl]+}>q{Y:!FO:5&[v3,+%J[UjO$7%3U~Ddw1ia2');
define('NONCE_KEY',        '2UplDpy6Sls:IL5_sS|}WD^2*iB[`Y&=t|e[%VN]*==rA4~[aAxt.)/o42bW3D<F');
define('AUTH_SALT',        '{~<#(c5j1Kj/UbP:Xa!!1SE|)+fJf=*u!7[M(ut-R>:UYUBq[a|L$?<iq}Udl`+Y');
define('SECURE_AUTH_SALT', ')Kl}D|-W+bkX%nVPyX&^7-%!@rCKkr2BU8JtYbw1QzmGv)a]~J?$]c_Kh:#YIK(E');
define('LOGGED_IN_SALT',   '$*9G1Wq$Z7r-/iw8+#w|2;fd|3+d`&Gs}64Nagu~3BvaE+_N-v9CDM#Zz~#6-Ut+');
define('NONCE_SALT',       'X-eXG3o}@>L@ugum3$40R0MpeSBx|x3t^@P+;DvrInP<%E/0d-tDdwi&celVK(-F');
				/**
				* WordPress Database Table prefix.
				*
				* You can have multiple installations in one database if you give each a unique
				* prefix. Only numbers, letters, and underscores please!
				*/
				$table_prefix  = 'xp_';

				/**
				* WordPress Localized Language, defaults to English.
				*
				* Change this to localize WordPress. A corresponding MO file for the chosen
				* language must be installed to wp-content/languages. For example, install
				* de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
				* language support.
				*/
				define('WPLANG', '');

				/**
				* For developers: WordPress debugging mode.
				*
				* Change this to true to enable the display of notices during development.
				* It is strongly recommended that plugin and theme developers use WP_DEBUG
				* in their development environments.
				*/

				/**
				* Allow all file uploads eg: SVG
				* Only allow locally
				*/
				define('ALLOW_UNFILTERED_UPLOADS', false);


				define('WP_DEBUG', false);
				define('FORCE_SSL', false);
				define('FORCE_SSL_ADMIN', false);
				/* That's all, stop editing! Happy blogging. */

				/** Absolute path to the WordPress directory. */
				if ( !defined('ABSPATH') )
				define('ABSPATH', dirname(__FILE__) . '/wp/');

				/** Sets up WordPress vars and included files. */
				require_once(ABSPATH . 'wp-settings.php');
