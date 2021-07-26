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
	define('DB_NAME', 'winonabeachresort_db');

	/** MySQL local database username */
	define('DB_USER', 'root');

	/** MySQL local database password */
	define('DB_PASSWORD', 'root');
	break;
	// Production
	case 'production':
	/** The name of the live database for WordPress */
	define('DB_NAME', 'warthen_rv_park_db');

	/** MySQL live database username */
	define('DB_USER', 'warthen_rv_park_us');

	/** MySQL live database password */
	define('DB_PASSWORD', 'dnDl_0JrEXsdgbGV0mm2X');
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
define('AUTH_KEY',         '3WOZ,.%b!n>Pm[1/jO9jqyKReK=FXH,xTu s_wDKK%R(:;Pqp<FF)5HCE#}8Sc%[');
define('SECURE_AUTH_KEY',  'R(fNYA;yMt+,(; 6->hEKfnL7K zh.>yLLw!lhgo9:Ue7{@Mn2usF,EmEdPff/l2');
	define('LOGGED_IN_KEY',    '96)#v.BzYJ-@`wo cF7B->7YqwKT-V=wbvB}l_^Ek`5KlI0X a2lu_VN<A^:|kN>');
	define('NONCE_KEY',        '[CaH0^P^|uSABP<}]w@YbdGrUT=lSv65[,)+q=,u Z0K2^OwG5y4~.@UXcmfs<-y');
	define('AUTH_SALT',        'dIue8:3?U-`hR+:EPN8>-(t^N+J|tpd^A+UL%{-5?BtX%`W4_jV1}E57swzpeE_?');
	define('SECURE_AUTH_SALT', 'uW@8SQzh9_]h@i`32AC5rTF*g2?[|/V/k9LsJA,i7&H$867Hr@#5jZK*S{D|X Ix');
		define('LOGGED_IN_SALT',   'heje%LL0zbhl]1P-3%k^Xp/eL=WG{7j*4.iG9r-c.#.KUveGX ap~{tgP/+;gTdg');
			define('NONCE_SALT',       'S@I+4Ct.qXVS%fj,dw4$OcfU]o6 O&9OW+Iaja;N-4QSMfju+M)aFvVXZl{=T2!z');
				/**
				* WordPress Database Table prefix.
				*
				* You can have multiple installations in one database if you give each a unique
				* prefix. Only numbers, letters, and underscores please!
				*/
				$table_prefix  = 'br_';

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


				define('WP_DEBUG', true);
				define('FORCE_SSL', false);
				define('FORCE_SSL_ADMIN', false);
				/* That's all, stop editing! Happy blogging. */

				/** Absolute path to the WordPress directory. */
				if ( !defined('ABSPATH') )
				define('ABSPATH', dirname(__FILE__) . '/wp/');

				/** Sets up WordPress vars and included files. */
				require_once(ABSPATH . 'wp-settings.php');
