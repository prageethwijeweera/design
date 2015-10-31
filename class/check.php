<?php
class Check extends DB{
	public function __construct(){
		parent::__construct();
	}
	
	public function available($data){
		$startDate = $data['startdate'];
		$endDate   = $data['enddate'];
		$sql = "SELECT *  
				FROM t  
				WHERE FROM_UNIXTIME(start_date,'%Y-%m-%d') >= '$startDate' 
				AND FROM_UNIXTIME(end_date,'%Y-%m-%d') <= '$endDate'";
		parent::query($sql);
		
		if(parent::getRowCount() == 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	public function testing(){
		return 'TESTING';
	}
}
?>