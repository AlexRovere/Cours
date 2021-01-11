<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'renaissance' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'jFjA0U9y=m)V)4(yN[XR!Te8 RrlWb=I,ZeGKMaM P/?:u[#)pkp{dS8m/{3h9/<' );
define( 'SECURE_AUTH_KEY',  'e_#BogMNnw!_OyjIqFL02S<7`JU#Yl1o#PpZ[yC=_Tx.#$4tphpdn|Uko7hH`Uo,' );
define( 'LOGGED_IN_KEY',    'MtcqnRxh+dzR8nk V#Ek/:<kR{eV=g?STVU(j>4O_=+j.?z5b^paSbfL?|10zEf4' );
define( 'NONCE_KEY',        '%=7myc|cmbj`Hg^*=Ks`b|UlOYym/ff;1Aoa5kJSn8{h6dfaFqxqcg23Rv$fj(iR' );
define( 'AUTH_SALT',        ']6>po/=#<]dwbwOl`zbe0PBI-a.O7UB DFGUA+UP4nJK&_KMZk.xFsVw><^PGZ$Z' );
define( 'SECURE_AUTH_SALT', '0o(ggK%`(ye~QNX[mwox#gewmJn`/.uP@94[MBfEHQ.+t?I_)W=czvKsG0r?3CEb' );
define( 'LOGGED_IN_SALT',   'Bd:U}$39 *FK0 ].G1?#1`J~4?M^zG1b%yFe*ZGH<367v9UK$@/TptI>EQ#Qr<l8' );
define( 'NONCE_SALT',       'k<5Y<<gup^p%XE23y.!fuPVYp|/UR[e-jP-$|4ZJA:1KKuC1nqvK9PUHV+Z}|Gl4' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
