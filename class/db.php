<?php
class db
{
	public $cn;
	private  $rc;
	public function __construct()
	{
		try{	
			$this->cn = mysql_connect(HOST,USER,PASS)or die($this->messageSystem('Mysql Error','alert',mysql_error()));
			mysql_select_db(DB,$this->cn)or die($this->messageSystem('Mysql Error','alert',mysql_error()));
			throw new Exception($this->messageSystem('Mysql Error','alert',mysql_error()),0);
		}
		catch (Exception $exc) {
			//echo $exc->getLine();	
		}
	}

	public function query($sql)
	{	$result = array();
		$statement = explode(' ',strtoupper($sql));
		switch ($statement[0]){			
			case 'SELECT':
				if(is_resource($this->cn)) {
					$this->rc = mysql_query($sql,$this->cn)or die(mysql_error());
					while($rw = mysql_fetch_array($this->rc)){
							$result[] =$rw;
					}
					return $result;
				} else {
					return FALSE;
				}
				break;
			default:
				$this->rc = mysql_query($sql,$this->cn);
				return TRUE;
				break;
		}
	}
	
	public function query_beta($sql)
	{
		$result = array();
		$statement = explode(' ',strtoupper($sql));
		switch ($statement[0]){
			case 'SELECT':
				if(is_resource($this->cn)) {
					$this->rc = mysql_query($sql,$this->cn)or die(mysql_error());
					if($this->getRowCount() > 1){
						while($rw = mysql_fetch_array($this->rc)){
							$result[] =$rw;
						}
					} else {
						return mysql_fetch_array($this->rc);
					}
					return $result;
				} else {
					return FALSE;
				}
				break;
			default:
				$this->rc = mysql_query($sql,$this->cn);
				return TRUE;
				break;
		}
	}
	
	public function query_json($sql)
	{	$result = array();
		$statement = explode(' ',strtoupper($sql));
		switch ($statement[0]){			
			case 'SELECT':
				if(is_resource($this->cn)) {
					$this->rc = mysql_query($sql,$this->cn)or die(mysql_error());
					while($rw = mysql_fetch_array($this->rc,MYSQL_ASSOC)){
						$result[] =$rw;
					}
					return $result;
				} else {
					return FALSE;
				}
				break;
			default:
				$this->rc = mysql_query($sql,$this->cn);
				return TRUE;
				break;
		}
	}
	
	public function query2($sql){
		$result = array();
		$statement = explode(' ',strtoupper($sql));
		switch ($statement[0]){			
			case 'SELECT':
				if(is_resource($this->cn)) {
					$this->rc = mysql_query($sql,$this->cn) or die(mysql_error());
					while($rw = mysql_fetch_array($this->rc)){
						$result[] = $rw;
					}
					if(sizeof($result)>1){
						return $reslut;
					} else {
						return $result[0];
					}
				}
			default:
				$this->rc = mysql_query($sql,$this->cn); break;
				return TRUE;
		}
	}
	
	public function getAffectedRows(){
		return mysql_affected_rows($this->cn);
	}
	
	public function getLastId(){
		return mysql_insert_id($this->cn);
	}
	
	public function getRowCount(){
		return mysql_num_rows($this->rc);
	}
	
	public function status(){
		if(mysql_affected_rows($this->cn) > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	public function getFileds($table,$filedType='meta'){
		$result = array();		
		$sql = "SELECT * FROM " . $table;
		$rc = mysql_query($sql,$this->cn)or die(mysql_error());		
		$count = 0;
		while($count < mysql_num_fields($rc)){
			$meta = mysql_fetch_field($rc,$count);
			if($meta->primary_key != 1)
				$filed = explode('_',$meta->name);
				if($filed[0] == $filedType){
						$label = ucwords(str_replace(array($filedType."_", "_"), " ",$meta->name));
				  	 	$result[] = array('field'=>$meta->name, 'label'=>$label);
				  }			   			
			$count++;
		}
		return $result;
	}
	
	public function label($name){
		return str_replace('_' , ' ',$name);
	}
	
	public function genarateInsertStatement($data=array(),$table,$otherfileds=array()){
			$otherFildNames = '';
			$otherFildValues = '';		
			for($x=0; $x!=sizeof($otherfileds); $x++){				
				foreach ($otherfileds[$x] as $key=>$value) {
					$otherFildNames .= "`$key`,";
					$otherFildValues .= "'$value',";				
				}
			}
			$sql = "INSERT INTO $table (";
				if($otherFildNames!=""){
					$sql .=$otherFildNames;
				}
				foreach($data as  $key => $filed){
						stristr($key,'ui_') ? $sql .="`$key`," : null;
				}
			$sql = trim($sql,',');
			$sql .=") VALUES(";
				if($otherFildValues!=''){
					$sql .= $otherFildValues;
				}

				foreach($data as  $key => $filed){
						stristr($key,'ui_') ? $sql .="'$filed'," : null;

				}

			$sql = trim($sql,',');		
			$sql .=");";
		return $sql;
	}	

	public function dataSoruce($table){
		$result = array();
		if($table=='countries'){
			$sql = "SELECT `id` as `id` , `printable_name` as `name` FROM `$table` ORDER BY `id` DESC;";
		} else {
			$sql = "SELECT `id` as `id` , `name` as `name` FROM `$table` ORDER BY `id` DESC;";
		}
		
		foreach($this->query($sql) as $row){
			$result[] = $row;	
		}
		return $result;		
	}
	
	public function html_FormFiled($name,$type,$style='',$value='',$datasoruce=array(),$onChange='',$dbfiled='ui'){
		switch ($type){
			case 'submit':
				$html ='<input type="submit" name="'. $name . '" value="'. $value .'" class="'. $style .'"/>';
				break;
			case 'text':
				$html ='<input type="text" name="'. $dbfiled . '_'. $type . '_' . $name . '" value="'. $value .'" class="'. $style .'"/>';
				break;
			case 'select':
				if($onChange==""){
					$html ="<select name='". $dbfiled ."_" . $type . '_' ."$name' class='$style'>";
				} else {
					$html ="<select name='". $dbfiled ."_" . $type . '_' ."$name' class='$style' onchange='$onChange'>";
				}
				
					$html .='<option>select</option>';
					if(sizeof($datasoruce)==0) {						
							$datasoruce = $this->dataSoruce($name);
							foreach($datasoruce as $option){
								$html .= "<option value='".$option['id']."'>" . $option['name'] . "</option>";
							}
					} elseif(sizeof($datasoruce) > 0) {
							foreach($datasoruce as $value){
								$html .= "<option value='".$value['id']."'>" . $value['name'] . "</option>";
							}
					}
					
				$html .="</select>";
				break;
			case 'list':
				break;
			case 'password':
				$html ='<input type="password" name="'. $dbfiled . '_' . $type . '_' . $name . '" value="'. $value .'" class="'. $style .'"/>';
				break;
			case 'textarea':
				$html ='<textarea name="'. $dbfiled . '_'. $type . '_' . $name . '" class="'. $style .'"></textarea>';
				break;
			case 'session':
				$html ='<input type="hidden" name="'. 'session_'. $type . '_' . $name . '" value="'. $_SESSION['USERID'] .'" class="'. $style .'"/>';
				break;
			case 'checkbox':
					$html = '<input type="checkbox" name="' . $name .'" value="'. $value . '">';				
				break;
			case 'radio':
				if(sizeof($datasoruce)==0) {
						$html = '<input type="radio" name="' . $name .'" value="'. $value . '">';
				} else {
					foreach($datasoruce as $key=>$value){
						$html .= '<input type="radio" name="' . $name .'" value="'. $key . '">' . $value['name'] . '<br />';
					}
				}
				break;			
			default:
				$html='undefined type';
				break;
					
		}
		return $html;
	}
	
	public function messageBox($head,$MessageBoxType,$bodyText){
		$msgBox = '<table class="formBox" width="100%" border="0" cellspacing="1" cellpadding="1">
				  <tr>
					<th colspan="2" class="agentLogin">' . $head .'</th>
				  </tr>
				  <tr>
					<td width="6%" align="center"> + </td>
					<td>'. $bodyText .'</td>
					</tr>
			</table>
			<br />';
		return $msgBox;
	}
	public function messageSystem($head,$type,$bodyText){
		$msgBox = '<table style="border:1px solid red;" width="100%" border="0" cellspacing="1" cellpadding="1">
				  <tr>
					<th colspan="2" class="agentLogin" style="background:red;"><font color="white">' . $head .'</font></th>
				  </tr>
				  <tr>
					<td width="6%" align="center"></td>
					<td><li><font size="4">'. $bodyText .'</font></li></td>
					</tr>
			</table>';
		return $msgBox;
	}

	public function newmessage($text,$type=TRUE){
		switch($type){
			case TRUE: 		return '<div id="message_show">' . $text .'</div>';	break;
			case FALSE: 	return '<div id="message_error">' . $text .'</div>';	break;
		}
	}
	
	public function flush_message($text,$type=TRUE){
		switch($type){
			case TRUE: 		return '<div style="background:#FFCCCC !important; color:#333333; z-index:9999; font-size:12px; border:1px solid #FF8282; padding:10px; font-weight: bold; text-align: center; width:100%;">' . $text .'</div>';	break;
			case FALSE: 	return '<div style="!important; color:red; z-index:9999; font-size:12px; padding:10px; font-weight: bold; text-align: center; width:100%;">' . $text .'</div>';	break;
		}
	}
	
	public function jQueryMessage($message='',$type=TRUE){
		switch($type){
			case TRUE: return '<script language="javascript" type="text/javascript">
							$(\'#sys_message\').html(\''.$message .'\').removeClass("sys_message success").addClass("information").fadeIn(1000).delay(2000).fadeOut(1000);
						</script>'; 
			break;
			case FALSE: return '<script language="javascript" type="text/javascript">
							$(\'#sys_message\').html(\''.$message .'\').removeClass("sys_message information").addClass("success").fadeIn(1000).delay(2000).fadeOut(1000);
						</script>'; 
			break;
		
		}	
	}
	
	public function bootsrapMessage($module, $message='',$type='success'){
		return '<div class="alert alert-'.$type.' alert-dismissable">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                 <i class="fa fa-info-circle"></i>  <strong>'.$module.'</strong>  '.$message.'
            </div>';
	}
}
?>
