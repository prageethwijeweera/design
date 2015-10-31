<?php include ('../../../system/main.php');?>
<?php if($_SESSION['SUSERTYPE'] != 'ADMIN'){  exit("<h3 style='background:red; color:white; padding:4px; font-size:11px;'>Your are not authorized to access this page.</h3>");}?>
<?php 
$action = $_REQUEST['action'];
switch($action){
	case 'deletename':	$fw->meta()->deleteName($id); break;
	case 'deletecode':	$fw->meta()->deleteCode($id); break;
}
?>