<?php
/* 
 * Configuration File
 * Author   : Thiwanka Lahiru | thiwankalk@gmail.com
 * Property : LionWeb.lk
*/

define ('STATIC_COMPANY_NAME', 'nipuna.lk');

define ( 'HOST', 'localhost' );
define ( 'USER', 'root' );
define ( 'PASS', '' );
define ( 'DB', 'nipuna' );

define ( 'HTTP_PATH', "http://". $_SERVER['HTTP_HOST'] . "/" );

define ( 'TEMPLATE_MANAGE_PATH', "templates/$template/" );
define ( 'TEMPLATE_HOME_PATH', "templates/$template/index.php" );
define ( 'TEMPLATE_HTTP_PAGES_PATH', HTTP_PATH . TEMPLATE_MANAGE_PATH . "pages/" );

define ( 'PATH_3DPARTY', HTTP_PATH . '3rdparty/');

define ( 'AJAX_PATH', HTTP_PATH . 'templates/'.$template.'/ajax/' );
define ( 'CSS_PATH', HTTP_PATH . 'templates/'.$template.'/css/' );
define ( 'JS_PATH', HTTP_PATH . 'templates/'.$template.'/js/' );
define ( 'IMAGE_PATH', HTTP_PATH . 'templates/'.$template. CSS_PATH.'images/' );
define ( 'TEMPLATE_PATH', HTTP_PATH . 'templates/'.$template.'/' );


define ( 'AJAX_HOME_PATH', HTTP_PATH . 'templates/'.$template.'/ajax/' );
define ( 'CSS_HOME_PATH', HTTP_PATH . 'templates/'.$template.'/css/' );
define ( 'JS_HOME_PATH', HTTP_PATH . 'templates/'.$template.'/js/' );
define ( 'IMAGE_HOME_PATH', HTTP_PATH . 'templates/'.$template.'/' . CSS_PATH .'images/' );

define ( 'UPLOAD_FILE_PATH' , "uploads/");
define ( 'UPLOAD_FILE_THUMB_PATH' , "uploads/thumb/");
define ( 'UPLOAD_FILE_FULL_PATH' , SYSTEM_PATH . "uploads/");
define ( 'UPLOAD_FILE_THUMB_FULL_PATH' , SYSTEM_PATH . "uploads/thumb/");

define ( 'UPLOAD_THUMB_PATH' , HTTP_PATH . 'uploads/thumb/250-250-');
define ( 'UPLOAD_LARGE_PATH' , HTTP_PATH . 'uploads/500-500-');

define ( 'MAX_ITEMS_PER_PAGE', 6);

define ('MAIL_REPLY_TO','prageethwije199@gmail.com');
define ('MAIL_SETFROM','prageethwije199@gmail.com');
define ('MAIL_ADDREPLYTO','prageethwije199@gmail.com');
define ('MAIL_ADMIN','prageethwije199@gmail.com');
define ('MAIL_ADMIN_NAME','Sirilanka');
?>