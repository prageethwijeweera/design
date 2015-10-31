<?php include ('../../../system/main.php'); ?>
<?php if($_SESSION['SUSERTYPE'] != 'ADMIN'  && $_SESSION['SUSERTYPE'] != "DATAENTRY"){  echo json_encode(array('status'=>FALSE,'message'=> 'Please use Administrative Login.')); exit();}?>
<?php 
	if($fw->product()->add($_REQUEST)){
		$fw->set_session_message(array('text'=> 'Added New Product !.', 'type'=>TRUE));
		echo json_encode(array('status'=>TRUE,'message'=> 'Done !','jredirect'=> true, 'jredirecturl'=> HTTP_PATH . $template . '/add-product.html'));
	} else {
		echo json_encode(array('status'=>TRUE,'message'=> 'Fail !','jredirect'=> true, 'jredirecturl'=> HTTP_PATH . $template . '/add-product.html'));
	}
?>