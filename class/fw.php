<?php
class FW{
	public $request;
	public function __construct($class){
		foreach($class as $object=>$c){
			if(is_file(SYSTEM_CLASS_PATH . $c . '.php')){
				include_once (SYSTEM_CLASS_PATH . $c . '.php');
				if(FW_REPORTS){
					echo "<h3 style='background:green; color:white; padding:4px; font-size:11px; margin-bottom:2px;'>loaded default ". SYSTEM_CLASS_PATH . $c . '.php' ." class</h3>";
				}
			}  else {
				exit("<h3 style='background:red; color:white; padding:4px; font-size:11px;'>cannot load default $c class</h3>");
			}
		}
		return;
	}
	
     public function __call($class,$args=array()){
		$classname = $class;
		if(is_file(SYSTEM_CLASS_PATH . $class . '.php')){
			include_once (SYSTEM_CLASS_PATH . $class . '.php');
				$class = new $class($args);
			if(FW_REPORTS){
					echo "<h3 style='background:green; color:white; padding:4px; font-size:11px; margin-bottom:2px;'>MANUAL loaded  ". SYSTEM_CLASS_PATH . $classname . '.php' ." class</h3>";
			}
		}  else {
			exit("<h3 style='background:red; color:white; padding:4px; font-size:11px;'>cannot call $classname class</h3>");
		}
		return $class;
	}
	
	public function set_session_message($data){
		$type = $data['type'];	
		$text = $data['text'];
		if($text != ""){	
		switch($type){
			case TRUE: $_SESSION['session_message'] = '<div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-info-circle"></i>  '.$text.'
           </div>'; 
		break;
			case FALSE:
		$_SESSION['session_message'] = '<div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-info-circle"></i>  '.$text.'
           </div>';
		break;
			}
		}
	}

	public function show_session_message($data){
		if($_SESSION['session_message']!=""){
			return $_SESSION['session_message'];
		} else {
			return FALSE;
		}
	}
	
	public function session_message_clear(){
		$_SESSION['session_message'] = "";
		session_unregister($_SESSION['session_message']);
	}
	
	public function set_form_data($data=array()){
		$result = array();
		foreach($data as $key=>$d){
			if(is_array($d)){
				foreach($d as $k=>$a){
					$result[$k] = mysql_real_escape_string($a);
				}
			} else {
				$result[$key] = mysql_real_escape_string($d); 
			}	
		}
		$this->request = (object)$result;
	}
}
?>