<?php


class mail extends PHPMailer{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function sendMail($data){
		if($data['email'] == "") { return FALSE; exit;}
		$name 		  = $data['name'];
		$email 		  = $data['email'];
		$phone 		  = $data['phone'];
		$textmessage  = nl2br($data['message']);
		$items		  = unserialize($data['items']);
	
		$this->AddReplyTo($email,$name);
		$this->SetFrom(MAIL_SETFROM,MAIL_ADMIN_NAME);
		$this->AddReplyTo(MAIL_REPLY_TO,MAIL_ADMIN_NAME);
		$this->AddAddress(MAIL_ADMIN, MAIL_ADMIN_NAME);

		$this->Subject    = 'noritakesrilanka.com - Request';
		
		$itembody 		= '<table border="4" width="100%" class="table_cart">
							<tr>
								<th>Image</th>
								<th>Name</th>
							</tr>';

							foreach($items as $c){
	                		$item  .= '<tr>
								<td><img src="'. $p['img'] .'" /> <br />' .$p['name'].'</td>
								<td>'.$p['name'].'</td>
								</tr>';
	                		 }
		$itembodyend 		.= '</table>';

		$messageBody = '<p><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="black"><b>Dear '.$name.'</b></font></p>
							<table width="636" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #CCCCCC;">
							  <tr>
							    <td height="66" colspan="3"><img src="http://antique.lk/templates/home/<?php echo CSS_PATH;?>images/innerbrand.png" /></td>
							  </tr>
							  <tr>
							    <td height="22" colspan="3" bgcolor="#003399"><font face="Verdana, Arial, Helvetica, sans-serif" size="4" color="#FFFFFF">&nbsp;Sample Request</font></td>
							  </tr>
							  
							  <tr>
							    <td width="55" height="37">&nbsp;</td>
							    <td width="160"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#333333"><b>Name</b></font></td>
							    <td width="421"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#333333">'. $name .'</font></td>
							  </tr>
							  <tr>
							    <td width="55" height="37">&nbsp;</td>
							    <td width="160"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#333333"><b>Email</b></font></td>
							    <td width="421"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#333333">'. $email .'</font></td>
							  </tr>
							  <tr>
							    <td width="55" height="37">&nbsp;</td>
							    <td width="160"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#333333"><b>Phone</b></font></td>
							    <td width="421"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#333333">'. $phone .'</font></td>
							  </tr>
							  <tr>
							    <td width="55" height="37">&nbsp;</td>
							    <td width="160"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#333333"><b>Message</b></font></td>
							    <td width="421"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#333333">'. $textmessage .'</font></td>
							  </tr>
							</table>';
		$messageBody 	.= $itembody . $item . $itembodyend;

		
		$this->MsgHTML($messageBody);
		$this->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
		$this->Send();
		return TRUE;
	}
}
?>