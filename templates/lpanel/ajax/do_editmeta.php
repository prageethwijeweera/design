<?php include ('../../../system/main.php');?>
<?php if($_SESSION['SUSERTYPE'] != 'ADMIN'){  exit("<h3 style='background:red; color:white; padding:4px; font-size:11px;'>Your are not authorized to access this page.</h3>");}?>
<?php 
	if($fw->meta()->edit($_REQUEST)){
		$fw->set_session_message(array('text'=> 'Edited !.', 'type'=>TRUE));
			echo json_encode(array('status'=>TRUE,'message'=> 'Done !','jredirect'=> true, 'jredirecturl'=> HTTP_PATH . $template . '/meta.html'));
	} else {
			echo json_encode(array('status'=>TRUE,'message'=> 'Fail !','jredirect'=> true, 'jredirecturl'=> HTTP_PATH . $template . '/meta.html'));
	}
?>