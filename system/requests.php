<?php
$template_parameter = explode("/",$_SERVER['PHP_SELF']); 
$template = strip_tags(($_REQUEST['t']=="") ? $template_parameter[2] : $_REQUEST['t']);
$page = strip_tags($_REQUEST['p']);
$id   = (int)strip_tags($_REQUEST['id']);
$title = ucwords(strip_tags($_REQUEST['title']));
$n		= (int)$_REQUEST['next'];
//output_add_rewrite_var('previus', base64_encode(  ));
$next 	= (int)$_REQUEST['next'];
$primaryid = (int)strip_tags($_REQUEST['primaryid']);
$node = strip_tags($_REQUEST['node']);




?>