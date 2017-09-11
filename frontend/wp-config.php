<?php

/** VVV box */
define( 'DB_NAME',     'cases' );
define( 'DB_USER',     'root' );
define( 'DB_PASSWORD', 'root' );
define( 'DB_HOST',     'localhost' );
define( 'WP_DEBUG',    true );

/** Redis Object Cache */
define( 'WP_CACHE_KEY_SALT', DB_NAME );

/** WP Constants */
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );
define( 'WP_DEFAULT_THEME', 'company-x' );

/** Custom wp-content dir */
define( 'WP_CONTENT_DIR', __DIR__ . '/wp-content' );
define( 'WP_CONTENT_URL', 'https://' . getenv( 'HTTP_HOST' ) . '/wp-content' );

/** Salts */
define( 'AUTH_KEY',         '7-muJ.+i;nBm%`*/,pc?L(5{JKJ(*!9#Sv1A>ri#Md.#sJkb(O#s0Z4_e;aoVRgm' );
define( 'SECURE_AUTH_KEY',  'b1y|}b)`x`p.]-NTjl? n95{_ynouZiO28dYVq@w_R#^VvaFnd[>v|t`v4TgacI`' );
define( 'LOGGED_IN_KEY',    'fzicMv_+e@`Rg-OY[yxB:e)Bog1LL3b56GH-Nn-<6<8 YOU&4eU1Z/|OY[_*Crig' );
define( 'NONCE_KEY',        'v=ju$b.RU+zG9+0EjdIE$8mpQza`;@5Cjk).+F=xz2!e`b2cb4?T2G!#-FJ&nVHp' );
define( 'AUTH_SALT',        'bWH%6z)k?P/?/So }TWcAuouf+A!b;mS@EKxMB&|Z{1+^_26?%%3`gqmgeDgN+ei' );
define( 'SECURE_AUTH_SALT', 'l&m.{^px5JEuo=7(}!ccWL0tQ8PI-+l{90C1=|LrF/uA*]sSu#=3H+?!B}JbWRR#' );
define( 'LOGGED_IN_SALT',   '^k]s|T}O/2Z`R$c9h:&C;cf96#Cz|4Q-*>x<6|AKErkS9:I+)n9g[f>0+4aAHrD_' );
define( 'NONCE_SALT',       '.X0Ewff+;5|l*#>@hRdgh79L`=NcbE[=Fb/5AqiE4|bLZ0!E&]L$e5Fd+tLB{D89' );

/** Table prefix */
$table_prefix = 'cas_';

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/wp/' );
}

/** Sets up Composer autoload. */
require_once( dirname( __DIR__ ) . '/vendor/autoload.php' );

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
