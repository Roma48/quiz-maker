<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи и ABSPATH. Дополнительную информацию можно найти на странице
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется скриптом для создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения вручную.
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'quiz-maker');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '|L=,5Pi&{LsiZkbjq#RI:uNZJXRjZi!C}-6&o88fDB2[M1HEM&Mmm>-*>R-I6GT)');
define('SECURE_AUTH_KEY',  '#/~~<N6isJo|_PaJ,u$JL~a}Bo++rT/}]L[pEWn>CcGSvS:-I--(Kc5HFYK^t(MC');
define('LOGGED_IN_KEY',    'k1u{`t/<|0-i~^4-_l9|UVO_nic6Q=hJj6?0;1,xW+zmp~rJ(.qZMAA2%7OuOb|n');
define('NONCE_KEY',        'not!fvPj)=Y6Q [PX&j]jAm<mBLmV9+G)~{5BN+uCWUe#n{RC|mnU._|RXrxEn}n');
define('AUTH_SALT',        '(C/81re@+RXzD;~qNO&N3kE:=lK!5}TZ(b,F15M/;cOtH)):L-[lI>S@m; ys-`+');
define('SECURE_AUTH_SALT', 'B:td*yR+L+}(y9iFA-WsG+x_s[QfMh?KMW2x*1OvS|%com;iczR+2Zc 3m-/Ql V');
define('LOGGED_IN_SALT',   'C5-A!ons|N564CiN]:VBKG!pX%iLH^%_30Q[;~TC:a6es:dp+gFyyLvkfsJm!(M.');
define('NONCE_SALT',       'xs<(kr]tj-6$S$f}V/&c$N_#?08mSm!52894a0`V2><:m4hx-/PgzHDy{DU:(?6^');

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
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
