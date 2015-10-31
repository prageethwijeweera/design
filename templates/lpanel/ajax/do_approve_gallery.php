<?php include ('../../../system/main.php'); ?>
<?php 
	if($fw->gallery()->approve($_REQUEST['id'])){
		$fw->set_session_message(array('text'=> 'Your Details Has Been Sent!.', 'type'=>TRUE));
		echo json_encode(array('status'=>TRUE,'message'=> 'Your Message Has Been Sent!. !','jredirect'=> true, 'jredirecturl'=> "/"));
	} else {
		echo json_encode(array('status'=>FALSE,'message'=> 'Your Message Has Been Not Sent!. !','jredirect'=> false, 'jredirecturl'=> "/"));
	}
?>