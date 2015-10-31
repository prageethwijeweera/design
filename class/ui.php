<?php
//bootstrap ui
class UI{
	
	public function input_text($attrib=array()){
		$name 	= $attrib['name'];
		$id 	= $attrib['id'];
		$value  = $attrib['value'];
		$hint	= $attrib['hint'];
		$class  = $attrib['class'];	
		return "<input type='text' id='$id' name='$name' value='$value' class='input $class'  placeholder='$hint' />";
	}
	
	public function input_password($attrib=array()){
		$name 	= $attrib['name'];
		$id 	= $attrib['id'];
		$value  = $attrib['value'];
		$hint	= $attrib['hint'];
		$class  = $attrib['class'];	
		return "<input type='password' id='$id' name='$name' value='$value' class='input $class'  placeholder='$hint' />";
	}
	
	public function input_textarea($attrib=array()){
		$name 	= $attrib['name'];
		$id 	= $attrib['id'];
		$value  = $attrib['value'];
		$hint	= $attrib['hint'];
		$rows   = $attrib['rows'];
		$cols   = $attrib['cols'];
			
		return "<textarea rows='$rows' cols='$cols' id='$id' name='$name' class='input'  placeholder='$hint'></textarea>";
	}
	
	public function input_button($attrib=array()){
		$name 	= $attrib['name'];
		$id 	= $attrib['id'];
		$value  = $attrib['value'];
		$type	= $attrib['type'];
		return "<input type='$type' id='$id' name='$name' value='$value' class='btn' />";
	}
	
	public function input_button_primary($attrib=array()){
		$name 	= $attrib['name'];
		$id 	= $attrib['id'];
		$value  = $attrib['value'];
		$type	= $attrib['type'];
		return "<input type='$type' id='$id' name='$name' value='$value' class='btn btn-primary' />";
	}
	
	public function input_button_info($attrib=array()){
		$name 	= $attrib['name'];
		$id 	= $attrib['id'];
		$value  = $attrib['value'];
		$type	= $attrib['type'];
		return "<input type='$type' id='$id' name='$name' value='$value' class='btn btn-info' />";
	}
	
	public function calender($attrib=array()){
		$name 	= $attrib['name'];
		$value  = $attrib['value'];
		$hint	= $attrib['hint'];
		$mindate = date('Ymd', mktime(0,0,0,date('m'),date('d'),date('Y')));
		$js 	= '<script type="text/javascript" language="javascript">
						var cal = Calendar.setup({
						    trigger    : "'.$name.'",
						    inputField : "'.$name.'",
						    showTime   : 0,
						    min		   : '.$mindate.',
					
						    onSelect: function(cal) { cal.hide() },
						});
						cal.manageFields("'.$name.'", "'.$name.'", "%Y-%m-%d");
				  </script>';
		return "<input type='text' id='$name' name='$name' class='input-xlarge' placeholder='$hint' />" . "\n" . $js;
	}
	
	public function calender_normal($attrib=array()){
		$name 	= $attrib['name'];
		$value  = $attrib['value'];
		$hint	= $attrib['hint'];
		$class  = $attrib['class'];
		$mindate = date('Ymd', mktime(0,0,0,date('m'),date('d'),date('Y')));
		$js 	= '<script type="text/javascript" language="javascript">
						var cal = Calendar.setup({
						    trigger    : "'.$name.'",
						    inputField : "'.$name.'",
						    showTime   : 0,
					
						    onSelect: function(cal) { cal.hide() },
						});
						cal.manageFields("'.$name.'", "'.$name.'", "%Y-%m-%d");
				  </script>';
		return "<input type='text' id='$name' name='$name' value='$value' class='input-small $class' placeholder='$hint' />" . "\n" . $js;
	}
}
?>
