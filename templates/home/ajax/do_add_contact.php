<?php include ('../../../system/main.php'); ?>
<?php 
	var_dump($fw->mail()->sendMail($_REQUEST));
	if($fw->mail()->sendMail($_REQUEST)){
		//$fw->set_session_message(array('text'=> 'Sent Mail !..', 'type'=>TRUE));
		echo json_encode(array('status'=>TRUE,'message'=> 'Done !','jredirect'=> true, 'jredirecturl'=> HTTP_PATH . $template . '/product_new.html'));
	} else {
		echo json_encode(array('status'=>TRUE,'message'=> 'Fail !','jredirect'=> true, 'jredirecturl'=> HTTP_PATH . $template . '/product_new.html'));
	}
?>