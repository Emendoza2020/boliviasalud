<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'saludbolivia_db');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'T){^@F0RG_]?lP*mpxjUpC~EBLYjJ_&Bw>,BvKazipG}4wJdR6rA#S5]xV/$in46');
define('SECURE_AUTH_KEY', 'TCB~;bsZIKGYDI3]g`$0|%ax)O;JX/u8&~AGBfC91`YK*MH%!TO+qk{jcG|x)#D8');
define('LOGGED_IN_KEY', '>X/6D5Z+{];m[x2&(^gQ31RlSk,pQqY->jYb;H:!Om&k2c$-7/VUIf_:5kAWr<Nx');
define('NONCE_KEY', '5:C={]_TjElwz*HU{$(qcj3xpTjcI54nYVA1:9-RO#e<a~+HW?8}y$Ufp<eE}gf&');
define('AUTH_SALT', 'Qwm]~J>(rB aki6yx~@lt15O!djsYb>@MQruz6Qlk,iA1,+gv_gEC;k61J+8dJZu');
define('SECURE_AUTH_SALT', 'xP.kFpkaJvFj_%VN%x5sf2_VPI1Qf_46/O&{AK}h()a;${Doh^! H}[rJV.nM<eE');
define('LOGGED_IN_SALT', 'MZ#)NP->i!<s1B|wG;wHyy^#]mN[/(uk>yJ>=3@q|U7a}|f3XT#P3Sk_jt3QicZC');
define('NONCE_SALT', '!MwJ9 v:+a9{]G4kIW/eGdnU5W?K!}&Y-Jrt`nb2c10y BMg2%g y}G4&OOg1I?,');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

