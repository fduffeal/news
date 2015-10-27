<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Le script de création wp-config.php utilise ce fichier lors de l'installation.
 * Vous n'avez pas à utiliser l'interface web, vous pouvez directement
 * renommer ce fichier en "wp-config.php" et remplir les variables à la main.
 * 
 * Ce fichier contient les configurations suivantes :
 * 
 * * réglages MySQL ;
 * * clefs secrètes ;
 * * préfixe de tables de la base de données ;
 * * ABSPATH.
 * 
 * @link https://codex.wordpress.org/Editing_wp-config.php 
 * 
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'wordpress');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'wordpress');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'Lumens83560');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données. 
  * N'y touchez que si vous savez ce que vous faites. 
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant 
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Oz[A;|NRT|DN|sZ<x*NxdyzD$VdyM-{ali_WxS>T)>,sXt-0idmUm&E65zwRf6mz');
define('SECURE_AUTH_KEY',  'CYi3dl-XK+SyQl%xXu|y2|#w7{N$=E8C*s0}VT+?~w~+Z.C}Xo!B`&Gg?s&hB|-A');
define('LOGGED_IN_KEY',    'nP91(BB$*ms62dq651;*|vQe:0q*xifY$Jk2H(L915sk-j:-1 [F2`|GUAZ??eYE');
define('NONCE_KEY',        'a7>P)skbIHT)E`t[$_UHEgVF%**GeHvHWoI*TC~m|D=O7Uyz3gmi8>s+w-y]3TGt');
define('AUTH_SALT',        'b.*J1.SGQcYw+97-.5u!IMcZ!GbPrkd~C{Nw/L{A-ZyDR)vMym~Ml>,Yx-m@]99E');
define('SECURE_AUTH_SALT', 'UdUVhE[qI$Mv:7qge?auyu&i6he.G{gz}Nn!P-r]RA~!Mxokf9`A)(+n/[!P3>IY');
define('LOGGED_IN_SALT',   'j+N)^nx@%[ZZc^;+_a-KUb EEP@|U+Op=v~Y|/Qa- _RaqZT)bQRc4!+nsbj54T?');
define('NONCE_SALT',       'D.|VIeW=+} (A~T$27Zt>`l+/UDyTII+ G/Dd0UM+WvN5L|C] q`s2]9+#@rmFsK');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique. 
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'wp_';

/** 
 * Pour les développeurs : le mode déboguage de WordPress.
 * 
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant votre essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de 
 * développement.
 * 
 * Pour obtenir plus d'information sur les constantes 
 * qui peuvent être utilisée pour le déboguage, consultez le Codex.
 * 
 * @link https://codex.wordpress.org/Debugging_in_WordPress 
 */ 
define('WP_DEBUG', false); 

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');

define( 'FS_METHOD', 'direct' );
define( 'FS_CHMOD_DIR', 0751 ); 

define('FTP_BASE', '/home/esbattle/news/wordpress/');
define('FTP_CONTENT_DIR', '/home/esbattle/news/wordpress/wp-content/');
define('FTP_PLUGIN_DIR ', '/home/esbattle/news/wordpress/wp-content/plugins/');
