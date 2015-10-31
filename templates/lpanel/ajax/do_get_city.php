<?php include ('../../../system/main.php'); ?>
<?php 
	echo json_encode($fw->meta()->getCities($_REQUEST['district']));
?>