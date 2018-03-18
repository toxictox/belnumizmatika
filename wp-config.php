<?php

// BEGIN iThemes Security - Не меняйте и не удаляйте эту строку
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Отключить редактор файлов - Безопасность > Настройки > Подстройки WordPress > Редактор файлов
// END iThemes Security - Не меняйте и не удаляйте эту строку

/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'bnm');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '121212');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '+D[BNn>H;N}-p }?W.>VH7M2HsQ2cUf%Um2$_X_I S&4f&-m3m#l,/F8Hqt9$&W>');
define('SECURE_AUTH_KEY',  '`tyAFABGW{?XkTH8(pXv.4%|>;MMO@LLLTnSK!csP3&av|uh&%3|7n<:)#u{wxEH');
define('LOGGED_IN_KEY',    '%^_i+pa+5?6Za@f.zIm~`GDR8Xh`+#N2]y/-94i962JRM29V+_7,eg6sZ_aJ+1s|');
define('NONCE_KEY',        'ZmJ.EnaGCN{|NK5G 9c:G<Q m(YLgm4CTF 3[P8@:7qZF&XlB,4%~Z}_9h7)[c7P');
define('AUTH_SALT',        'mx:zsGXoyA:G4NgECFwbS)kB_0S6w,_FzuELn;/qB%~:BB;Z,hx,H:?>sjQ4c}V=');
define('SECURE_AUTH_SALT', 'pRSh^8g^cwK|G*_LcLl@?W>RP:RkY%r1Dh|<n5,qa72pMh}DC#!u]A,_$Vn~Y?{y');
define('LOGGED_IN_SALT',   '<XlhG?iNJY@6$mTudT)Hva]Y(!d|v{Z]wQ3Kcu}s~wdr{/XHU=-NXAR!L6]S6]TN');
define('NONCE_SALT',       ',K6K8tCS`1r?>^Q>UM@CI/_C_7Tu2P|`IF?nU9g|pL}U3aKKA iIAXX88D&u5 eg');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
