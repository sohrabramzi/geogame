<?php

/**
 * Configuration
 *
 * For more info about constants please @see http://php.net/manual/en/function.define.php
 */

/**
 * Configuration for: Error reporting
 * Useful to show every little problem during development, but only show hard errors in production
 */
error_reporting(E_ALL);
ini_set("display_errors", 1);

/**
 * Configuration for: URL
 * Here we auto-detect your applications URL and the potential sub-folder. Works perfectly on most servers and in local
 * development environments (like WAMP, MAMP, etc.). Don't touch this unless you know what you do.
 *
 * URL_PUBLIC_FOLDER:
 * The folder that is visible to public, users will only have access to that folder so nobody can have a look into
 * "/application" or other folder inside your application or call any other .php file than index.php inside "/public".
 *
 * URL_PROTOCOL:
 * The protocol. Don't change unless you know exactly what you do.
 *
 * URL_DOMAIN:
 * The domain. Don't change unless you know exactly what you do.
 *
 * URL_SUB_FOLDER:
 * The sub-folder. Leave it like it is, even if you don't use a sub-folder (then this will be just "/").
 *
 * URL:
 * The final, auto-detected URL (build via the segments above). If you don't want to use auto-detection,
 * then replace this line with full URL (and sub-folder) and a trailing slash.
 */

define('URL_PUBLIC_FOLDER', 'public');
define('URL_PROTOCOL', 'http://');
define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));
define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER);

/**
 * Configuration for: Cookies
 * Please note: The COOKIE_DOMAIN needs the domain where your app is,
 * in a format like this: .mydomain.com
 * Note the . in front of the domain. No www, no http, no slash here!
 * For local development .127.0.0.1 is fine, but when deploying you should
 * change this to your real domain, like '.mydomain.com' ! The leading dot makes the cookie available for
 * sub-domains too.
 * @see http://stackoverflow.com/q/9618217/1114320
 * @see php.net/manual/en/function.setcookie.php
 */
// 1209600 seconds = 2 weeks
define('COOKIE_RUNTIME', 1209600);
// the domain where the cookie is valid for, for local development ".127.0.0.1" and ".localhost" will work
// IMPORTANT: always put a dot in front of the domain, like ".mydomain.com" !
define('COOKIE_DOMAIN', '.localhost');

/**
 * Configuration for: Hashing strength
 * This is the place where you define the strength of your password hashing/salting
 *
 * To make password encryption very safe and future-proof, the PHP 5.5 hashing/salting functions
 * come with a clever so called COST FACTOR. This number defines the base-2 logarithm of the rounds of hashing,
 * something like 2^12 if your cost factor is 12. By the way, 2^12 would be 4096 rounds of hashing, doubling the
 * round with each increase of the cost factor and therefore doubling the CPU power it needs.
 * Currently, in 2013, the developers of this functions have chosen a cost factor of 10, which fits most standard
 * server setups. When time goes by and server power becomes much more powerful, it might be useful to increase
 * the cost factor, to make the password hashing one step more secure. Have a look here
 * (@see https://github.com/panique/php-login/wiki/Which-hashing-&-salting-algorithm-should-be-used-%3F)
 * in the BLOWFISH benchmark table to get an idea how this factor behaves. For most people this is irrelevant,
 * but after some years this might be very very useful to keep the encryption of your database up to date.
 *
 * Remember: Every time a user registers or tries to log in (!) this calculation will be done.
 * Don't change this if you don't know what you do.
 *
 * To get more information about the best cost factor please have a look here
 * @see http://stackoverflow.com/q/4443476/1114320
 */

// the hash cost factor, PHP's internal default is 10. You can leave this line
// commented out until you need another factor then 10.
define("HASH_COST_FACTOR", "10");

/**
 * Configuration for: Database
 * This is the place where you define your database credentials, database type etc.
 */
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'mini');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8');

/**
 * Configuration for: Email
 *
 */
define("PHPMAILER_DEBUG_MODE", 0);
define("EMAIL_USE_SMTP", true);
define("EMAIL_SMTP_HOST", "localhost");
define("EMAIL_SMTP_AUTH", false);
define("EMAIL_SMTP_USERNAME", "yourusername");
define("EMAIL_SMTP_PASSWORD", "yourpassword");
define("EMAIL_SMTP_PORT", 25);
define("EMAIL_SMTP_ENCRYPTION", "tls");

define("EMAIL_PASSWORD_RESET_URL", URL . "login/verifypasswordreset");
define("EMAIL_PASSWORD_RESET_FROM_EMAIL", "no-reply@example.com");
define("EMAIL_PASSWORD_RESET_FROM_NAME", "My Project");
define("EMAIL_PASSWORD_RESET_SUBJECT", "Password reset for PROJECT XY");
define("EMAIL_PASSWORD_RESET_CONTENT", "Please click this link to reset your password: ");

define("EMAIL_VERIFICATION_URL", URL . "login/verify");
define("EMAIL_VERIFICATION_FROM_EMAIL", "no-reply@example.com");
define("EMAIL_VERIFICATION_FROM_NAME", "My Project");
define("EMAIL_VERIFICATION_SUBJECT", "Account activation for PROJECT XY");
define("EMAIL_VERIFICATION_CONTENT", "Please click this link to activate your account: ");

/**
 * Configuration for: Error messages and notices
 *
 * In this project, the error messages, notices etc are all-together called "feedback".
 */


define('FEEDBACK_USERNAME_FIELD_EMPTY','Username field was empty!');
define('FEEDBACK_PASSWORD_FIELD_EMPTY','Password field was empty!');
define('FEEDBACK_LOGIN_FAILED','Login failed.');
define('FEEDBACK_PASSWORD_WRONG_3_TIMES', 'You have typed in a wrong password 3 or more times already. Please wait 30 seconds to try again.');
define('FEEDBACK_PASSWORD_REPEAT_WRONG', 'Password and password repeat are not the same.');
define('FEEDBACK_PASSWORD_TOO_SHORT', 'Password has a minimum length of 6 characters');
define('FEEDBACK_USERNAME_TOO_SHORT_OR_TOO_LONG', 'Username cannot be shorter than 2 or longer than 64 characters');
define('FEEDBACK_USERNAME_DOES_NOT_FIT_PATTERN', 'Username does not fit the name scheme: only a-Z and numbers are allowed, 2 to 64 characters.');
define('FEEDBACK_EMAIL_FIELD_EMPTY', 'Email field was empty!');
define('FEEDBACK_EMAIL_TOO_LONG', 'Email cannot be longer than 64 characters');
define('FEEDBACK_EMAIL_DOES_NOT_FIT_PATTERN', 'Sorry, your chosen email does not fit into the email naming pattern');
define('FEEDBACK_UNKOWN_ERROR', 'WTF?');
define('FEEDBACK_USERNAME_ALREADY_TAKEN', 'Sorry, that username is already taken. Please choose another one.');
define('FEEDBACK_EMAIL_ALREADY_TAKEN', 'Sorry, that email is already in use. Please choose another one.');
define('FEEDBACK_ACCOUNT_CREATION_FAILED', 'Sorry, your registration failed. Please go back and try again.');
define('FEEDBACK_ACCOUNT_SUCCESFULLY_CREATED', 'Your account has been created succesfully and we have sent you an email. Please click the VERIFICATION LINK within that mail.');
define('FEEDBACK_VERIFICATION_EMAIL_SENDING_FAILED', 'Sorry, we could not send you a verification mail. Your account has NOT been created');
define('FEEDBACK_VERIFICATION_EMAIL_SENDING_SUCCESFULL', 'A verification mail has been sent succesfully.');
define('FEEDBACK_VERIFICATION_EMAIL_SENDING_ERROR', 'Verification mail could not be sent due to: ');
