<?php
class meta extends DB{
	
	public function __construc(){
		parent::__construct();
	}		
	
	public function add($data){
		$name = mysql_real_escape_string($data['name']);
		$code = ($data['code']=="OTHER")? $data['newcode'] : $data['code'];
		 
		$sql = "INSERT INTO `meta` (`name`,`code`) VALUES ('$name','$code');";
		parent::query($sql);
		
		if($data['code']=="OTHER"){
			$column = "meta_" . str_replace(" ", "_", strtolower($data['newcode']));		
			$sql = "ALTER TABLE `products` ADD COLUMN `$column` BIGINT(10) NOT NULL COMMENT 'auto gen for meta table code' AFTER `timestamp`;";
			parent::query($sql);
		}
		return TRUE;
	}
	
	public function getCode($code=""){
		$code = trim($code);
		if($code == ""){
			$sql = "SELECT DISTINCT `code` FROM `meta`;";
		} else {
			$sql = "SELECT `id`, `code` FROM `meta` WHERE `code` = '$code';";
		}
		return parent::query($sql);
	}
	
	public function getByCode($code=""){
		$code = trim($code);
		$sql = "SELECT `id`, `name` FROM `meta` WHERE `code` = '$code' ORDER BY `name` DESC;";
		return parent::query($sql);
	}
	
	
	
/* my
 */		
	public function getByperdetails($mobilphone=""){
		$mobilphone = trim($mobilphone);
		$sql = "SELECT * FROM `profile_per_details` WHERE `mobilphone` = '$mobilphone' ORDER BY `mobilphone` DESC;";
		return parent::query($sql);
	}
	
	/* my
 */	
 
 public function get($id){
		if($id == ""){
			$sql = "SELECT * FROM `meta`;";
		} else {
			$sql = "SELECT * FROM `meta` WHERE `id` = '$id';";
		}
		return parent::query($sql);
	}
	
	public function getValue($id){
		$sql = "SELECT * FROM `meta` WHERE `id` = '$id';";
		$row = parent::query($sql);
		return (object)$row[0];
	}
	
	public function pagination($next){
		$sql = "SELECT * FROM `meta` LIMIT $next," . MAX_ITEMS_PER_PAGE . ";";
		return parent::query($sql);
	}
	
	public function total(){
		$sql = "SELECT * FROM `meta`;";
		parent::query($sql);
		return parent::getAffectedRows();
	}
	
	
	
	public function edit($data){
		$id = $data['id'];
		$name = $data['name'];
		$code = $data['code'];
		
		$sql  = "UPDATE `meta` SET `name`= '$name', `code`='$code' 
					WHERE `id`='$id';";
		parent::query($sql);
		return TRUE;
	}
	
	public function deleteName($id){
		$sql = "DELETE FROM `meta` WHERE `id` = '$id';";
		parent::query($sql);
		return TRUE;
	}
	
	public function deleteCode($id){
		$sql = "SELECT * FROM `meta` WHERE `id` = '$id';";
		$row = parent::query($sql);
		$code = $row[0]['code'];
		$column = "meta_" . str_replace(" ", "_", strtolower($row[0]['code']));
		$sql = "ALTER TABLE `products` DROP COLUMN `$column`;";
		parent::query($sql);
		$sql = "DELETE FROM `meta` WHERE `code` = '$code';";
		parent::query($sql);
		return TRUE;
	}
	
	public function encodeURL($url){
		return str_replace(" ","-",strtolower($url));
	}
	
	public function decodeURL($url){
		return str_replace("-"," ",strtolower($url));
	}
	
	public function metaTag(){
		$data = $_REQUEST;
		global $fw;
		$result = array();
		$page = $data['p'];
		$id = $data['id'];
		switch($page){
			default:
					$result = array('title'=> 'SiriLanka - Tarvel & Tourism Industries In Sri Lanka',
									'description'=> 'The Best Place to Tarvel & Tourism Industries In Sri Lanka, welcome to the Sri Lanka Tourism Development Authority  Approved Shops, Historical Places, Tour Packages. Tour Adventures. Official Site.',
									'keywords'=> 'price, sri lanka, wedding, Travel, Tourism, Historical Places, official site , Tour Packages, Tour Adventures, holiday, Sri Lanka, Siri Lanka, siri lanka.');
			break;
				
			case 'shop_home':
							$result = array('body'=> 'Shops',
									'title'=> STATIC_COMPANY_NAME. ' - Shops in sri lanka',
									'description'=> 'The Best Shops to Tarvel & Tourism Industries In Sri Lanka, welcome to the Sri Lanka Tourism Development Authority  Approved Shops, Gift Shops. Official Site.',
									'keywords'=> 'price, sri lanka, Shops, shops, Gift Shops, Travel, Tourism, official site , gem and jewellery, gem, antique shops, shopping,
												 Sri Lanka, Siri Lanka, siri lanka, best shops in srilanka.');	
			break;
			case 'shop_about':
							$result = array('body'=> 'about',
											'title'=> STATIC_COMPANY_NAME . ' - About',
											'description'=> 'SiriLanka is Asia&#39;s and Sri Lankan&#39;s leading and fastest growing online shop finding service, focused on providing the lowest available shop&#39;s products in every destination worldwide.',
											'keywords'=> 'about sirilanka, find shops service, online shopping, details about gem and jewellery, gem, antique shops, shops ');
			break;
			case 'shop_contact':
							$result = array('body'=> 'contact us',
							'title'=> STATIC_COMPANY_NAME . ' - ContactUus',
							'description'=> 'SiriLanka is Asia&#39;s and Sri Lankan&#39;s leading and fastest growing online shop finding service, focused on providing the lowest available shop&#39;s products in every destination worldwide.',
							'keywords'=> 'contact sirilanka, find shops service, online shopping, details contact gem and jewellery, gem, antique shops, shops contact, contact us ');
			break;
			case 'shop_request':
							$result = array('body'=> 'Request for New Shop',
							'title'=> STATIC_COMPANY_NAME . ' - Request for New Shop',
							'description'=> 'SiriLanka is Asia&#39;s and Sri Lankan&#39;s leading and fastest growing online shop finding service, focused on providing the lowest available shop&#39;s products in every destination worldwide.',
							'keywords'=> 'Request for New Shop in sirilanka, Request for New shops service, online shopping, Request for New Shop gem and jewellery, gem, antique shops, shops request, request. ');
			break;
			case 'shop_more':
							$pd = $fw->products()->getSellProduct($id);
							$result = array('body'=> 'shop_more',
											'title'=> STATIC_COMPANY_NAME . '-' . $pd['company_name'],
											'description'=> $pd['company_name'] . ' official website information',
											'keywords'=> $pd['company_name'] .', shop in sri lanka, gift shop in sri lanka, the best shop, rates, contacts, photos, deals, product photos, price, promotion, offers');
			break; 
			case 'shop_product_more':
							$pd = $fw->products()->getmetaProduct($id);
							$result = array('body'=> 'shop_product_more',
											'title'=> STATIC_COMPANY_NAME . '-' . $pd['product_name'],
											'description'=> $pd['product_name'] . ' official website information',
											'keywords'=> $pd['product_name'] .', product in sri lanka, gift shop product in sri lanka, the best products, rates, contacts, photos, deals, product photos, price, promotion, discount, offers');
			break; 
			
/* historical places */			
			case 'history_home':
							$result = array('body'=> 'history_home',
									'title'=> STATIC_COMPANY_NAME. ' - historical places in sri lanka',
									'description'=> 'The historical places to Tarvel & Tourism Industries In Sri Lanka, welcome to the Sri Lanka historical places. Official Site.',
									'keywords'=> 'historical places in sri lanka, historical places, sri lanka, History,history, Gift Shops related to historical places, Travel, Tourism, official site , temple, mosque, waterfall, gem, antique shops, shopping, Sri Lanka, Siri Lanka, siri lanka, best places in srilanka.');	
			break;
			case 'history_about':
							$result = array('body'=> 'history_about',
											'title'=> STATIC_COMPANY_NAME . ' - About',
											'description'=> 'SiriLanka is Asia&#39;s and Sri Lankan&#39;s leading and fastest growing online historical places finding service in sri lanka, focused on best historical places available in sri lanka and  best shops near by the location in every destination sri lanka.',
											'keywords'=> 'about sirilanka, find historical places service, online historical places find, details about historical places in sri lanka, best places, antique shops, shops, wedding, Travel, Tourism, holiday ');
			break;
			case 'history_contact':
							$result = array('body'=> 'history_contact',
							'title'=> STATIC_COMPANY_NAME . ' - ContactUus',
							'description'=> 'SiriLanka is Asia&#39;s and Sri Lankan&#39;s leading and fastest growing online historical places finding service in sri lanka, focused on best historical places available in sri lanka and  best shops near by the location in every destination sri lanka.',
							'keywords'=> 'contact sirilanka, find historical places service, online historical places find, details, contact historical places, history, antique, antique shops, shops contact, contact us ');
			break;
			
			/* case 'shop_contact':
							$pd = $fw->product()->getSellProduct($id);
							$result = array('body'=> 'product-detail',
											'title'=> STATIC_COMPANY_NAME . ' - ',
											'description'=> $pd->product_detail,
											'keywords'=> $pd->product_specifications);
							break; */
			
			case 'travel_home':
						$result = array('body'=> 'travel',
						'title'=> STATIC_COMPANY_NAME. ' - Tarvel & Tourism in sri lanka',
						'description'=> 'The Best Packages to Tarvel & Tourism Industries In Sri Lanka, welcome to the Sri Lanka Tourism Development Authority  Approved Tarvel Package, Tarvel Package. Official Site.',
						'keywords'=> 'price, sri lanka, Tarvel Package, tarvel package, Tarvel and Tourism in sri lanka, Travel, Tourism, official site , travelling, vehicle,travel service,
						Sri Lanka, Siri Lanka, siri lanka, best travel package in srilanka.');
			break;
			case 'travel_about':
						$result = array('body'=> 'about',
						'title'=> STATIC_COMPANY_NAME . ' - About',
						'description'=> 'SiriLanka is Asia&#39;s and Sri Lankan&#39;s leading and fastest growing online travel package finding service, focused on providing the lowest available Tarvel Packages in every destination worldwide.',
						'keywords'=> 'about sirilanka, find tarvel service, online travel package, details about Tarvel & Tourism in sri lanka, travel, best travel, best travelling ');
			break;
			case 'travel_contact':
						$result = array('body'=> 'contact us',
						'title'=> STATIC_COMPANY_NAME . ' - ContactUus',
						'description'=> 'SiriLanka is Asia&#39;s and Sri Lankan&#39;s leading and fastest growing online travel package finding service, focused on providing the lowest available Tarvel Packages in every destination worldwide.',
						'keywords'=> 'contact sirilanka, find travel package finding service, online travel package, details contact Tarvel & Tourism in sri lanka, travel, best travel, best travelling, travel contact, contact us ');
			break;
			case 'travel_request':
						$result = array('body'=> 'Request for New Shop',
						'title'=> STATIC_COMPANY_NAME . ' - Request for New Shop',
						'description'=> 'SiriLanka is Asia&#39;s and Sri Lankan&#39;s leading and fastest growing online travel package finding service, focused on providing the lowest available Tarvel Packages in every destination worldwide.',
						'keywords'=> 'Request for New travel package service in sirilanka, Request for New travel package service, online travel package finding, Request for New travel package finding service,  travel, best travel, best travelling, travel request, request. ');
			break;
			case 'travel_more':
				$pd = $fw->products()->getSelltravel($id);
				$result = array('body'=> 'shop_more',
						'title'=> STATIC_COMPANY_NAME . '-' . $pd['company_name'],
						'description'=> $pd['company_name'] . ' official website information',
						'keywords'=> $pd['company_name'] .', shop in sri lanka, gift shop in sri lanka, the best travel package service, travel package rates, rates, contacts, photos, deals, travel photos, price, promotion, offers');
			break;
			case 'travel_product_more':
				$pd = $fw->products()->getmetatravel($id);
				$result = array('body'=> 'shop_product_more',
						'title'=> STATIC_COMPANY_NAME . '-' . $pd['product_name'],
						'description'=> $pd['product_name'] . ' package official website information',
						'keywords'=> $pd['product_name'] .', package in sri lanka, '.$pd['product_name'].' travel package in sri lanka, the best travel packages, rates, contacts, photos, deals, product photos, price, promotion, discount, offers');
			break;
			
			
			case 'adventure_home':
				$result = array('body'=> 'adventure',
						'title'=> STATIC_COMPANY_NAME. ' - Adventure & Tourism in sri lanka',
						'description'=> 'The Best Package to adventure & Tourism Industries In Sri Lanka, welcome to the Sri Lanka Tourism Development Authority  Approved Adventure Package, Adventure Package. Official Site.',
						'keywords'=> 'price, sri lanka, Adventure Package, adventure package, Adventure and Tourism in sri lanka, Adventure, Tourism, official site , travelling and Adventure, vehicle, adventure service,
						Sri Lanka, Siri Lanka, siri lanka, best adventure package in srilanka.');
			break;
			case 'adventure_about':
						$result = array('body'=> 'about',
						'title'=> STATIC_COMPANY_NAME . ' - About',
						'description'=> 'SiriLanka is Asia&#39;s and Sri Lankan&#39;s leading and fastest growing online adventure package finding service, focused on providing the lowest available  Adventure in every destination worldwide.',
						'keywords'=> 'about sirilanka, find adventure service, online adventure package, details about Adventure & Tourism in sri lanka, adventure, best adventure, best adventure and travelling ');
			break;
			case 'adventure_contact':
						$result = array('body'=> 'contact us',
						'title'=> STATIC_COMPANY_NAME . ' - ContactUus',
						'description'=> 'SiriLanka is Asia&#39;s and Sri Lankan&#39;s leading and fastest growing online adventure package finding service, focused on providing the lowest available Adventure in every destination worldwide.',
						'keywords'=> 'contact sirilanka, find adventure package finding service, online adventure package, details contact Adventure & Tourism in sri lanka, adventure, best adventure, best adventure and travelling, adventure contact, contact us ');
			break;
			case 'adventure_request':
						$result = array('body'=> 'Request for New Shop',
						'title'=> STATIC_COMPANY_NAME . ' - Request for New Shop',
						'description'=> 'SiriLanka is Asia&#39;s and Sri Lankan&#39;s leading and fastest growing online adventure package finding service, focused on providing the lowest available Adventure in every destination worldwide.',
						'keywords'=> 'Request for New adventure package service in sirilanka, Request for New adventure package service, online adventure package finding, Request for New adventure package finding service,  adventure, best adventure, best adventure, adventure request, request. ');
			break;
			case 'adventure_more':
				$pd = $fw->products()->getSelladventure($id);
				$result = array('body'=> 'shop_more',
						'title'=> STATIC_COMPANY_NAME . '-' . $pd['company_name'],
						'description'=> $pd['company_name'] . ' official website information',
						'keywords'=> $pd['company_name'] .', adventure in sri lanka, adventure package in sri lanka, the best adventure package service, adventure package rates, rates, contacts, photos, deals, adventure photos, price, promotion, offers');
			break;
			case 'adventure_product_more':
				$pd = $fw->products()->getmetaadventure($id);
				$result = array('body'=> 'shop_product_more',
						'title'=> STATIC_COMPANY_NAME . '-' . $pd['product_name'],
						'description'=> $pd['product_name'] . ' adventure package official website information',
						'keywords'=> $pd['product_name'] .', adventure package in sri lanka, '.$pd['product_name'].' adventure package in sri lanka, the best adventure packages, rates, contacts, photos, deals, product photos, price, promotion, discount, offers');
			break;
			
	case 'logout':
							$result = array('body'=> 'home',
										'title'=> COMPANY_NAME,
										'description'=> 'The Best Place to buyll or exchange vehicles.',
										'keywords'=> 'price, sri lanka, David Pieris Motor Company Limited, Sri Lanka.');
							break; 
					
		}
		return (object)$result;
	}
	
	
	
	public function getDistrict(){
		$sql = "SELECT `dname` AS `name`, `did` as `id` FROM `district`;";
		return parent::query($sql);
	}
	
	public function getCities($districtid){
		$sql = "SELECT `cname` AS `name`, `cid` as `id` FROM `city` WHERE `did` = '$districtid';";
		return parent::query_json($sql);
	}
	
	public function getCitiyNameById($id){
		$sql = "SELECT `cname` AS `name`, `cid` as `id` FROM `city` WHERE `cid` = '$id';";
		return (object) parent::query2($sql);
	}
	
	public function getDistrictNameById($id){
		$sql = "SELECT `dname` AS `name`, `did` as `id` FROM `district` WHERE `did` = '$id';";
		return (object) parent::query2($sql);
	}
	
	
	
	
	public function updateStatusById($data){
		
		$id = $data['id'];

		$sql  = "UPDATE `profile_per_details` SET `status`= '$name'
		WHERE `id`='$id';";
		parent::query($sql);
		return TRUE;
		
		
	}
	
	
}
?>