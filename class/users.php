<?php
class users extends DB{
	public function __construct(){
		parent::__construct();
	}
	
	public function add($data){
		$fullname = $data['fullname'];
		$username = $data['username'];
		$password = md5($data['password']);
		$accountrype = $data['accountrype'];

		$sql = "INSERT INTO `users` (`fullname`,`username`,`password`,`account_type`) 
				VALUES ('$fullname', '$username', '$password', '$accountrype');";
		parent::query($sql);
		return TRUE;
	}

	public function get($data){
		$id = $_REQUEST['id'];
		if($id==""){		
			$sql = "SELECT * FROM `users`;";
			return parent::query($sql);
		} else if($id != "") {
			$sql = "SELECT * FROM `users` WHERE `id` = '$id';";
			$rows = parent::query($sql);
			return $rows[0];
			
		}
	}
	
	public function pagination($next){
		$sql = "SELECT * FROM `users` LIMIT $next, ". MAX_ITEMS_PER_PAGE .";";
		return parent::query($sql);
	}
	
	public function total(){
		$sql = "SELECT * FROM `users`;";
		parent::query($sql);
		return parent::getAffectedRows();
	}
	
	public function edit($data){
		$fullname 		= mysql_real_escape_string($data['fullname']);
		$username 		= mysql_real_escape_string($data['username']);
		$password 		= $data['password'];
		$accounttype 	= mysql_real_escape_string($data['accountrype']);
		$id 	  		= $data['id'];
		
		if($password!=""){
			$password = md5($password);
			$sql = "UPDATE `users` SET 	`fullname` = '$fullname',
										`username` = '$username',
										`password` = '$password',
										`account_type` = '$accounttype'
					WHERE `id` = '$id';";
		} else {
			$sql = "UPDATE `users` SET 	`fullname` = '$fullname',
										`username` = '$username',
										`account_type` = '$accounttype'
					WHERE `id` = '$id';";
		}
		parent::query($sql);
		return TRUE;
	}
	
	public function isLogin(){
		if($_SESSION['SLOGINUSER'] == ""){
			return FALSE;
		} else {
			return TRUE;
		}
	}
	
	public function login($data){
		$username = mysql_real_escape_string($data['username']);
		$password = mysql_real_escape_string($data['password']);
		
		$sql = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = MD5('$password')
					AND `account_type` !='NOLOG';";
		$row = parent::query($sql);
		if(parent::getRowCount() > 0){
			$_SESSION['SLOGINUSER'] =  $username;
			$_SESSION['SUSERNAME'] = $row[0]['fullname'];
			$_SESSION['SUSERTYPE'] =   $row[0]['account_type'];
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	public function logOut(){
		unset($_SESSION['SLOGINUSER']);
		unset($_SESSION['SUSERTYPE']);
		return TRUE;
	}
}
?>
