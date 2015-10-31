<?php
error_reporting ( 0 );

define ( 'FW_REPORTS', FALSE );

session_start ();
define ( 'SYSTEM_PATH', 'C:/wamp/www/nipuna/' );
define ( 'SYSTEM_CLASS_PATH', SYSTEM_PATH . 'class/');

include_once (SYSTEM_PATH . 'system/requests.php'); // system configs
include_once (SYSTEM_PATH . 'system/conf.php'); // system configs
include_once (SYSTEM_PATH . 'class/fw.php');
//default class loader
$fw = new FW(array('db'=>'db','ui'=>'ui','ajax'=>'ajax'));
$ui = new UI();
$ajax = new Ajax();
?>