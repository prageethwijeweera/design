<?php
class front extends DB {
	public function __construct() {
		parent::__construct ();
	}
	
	
	public function get_one_products($id){
		$sql = "SELECT * , (SELECT `image` FROM `product_images` WHERE `product_id` = `product`.`id` LIMIT 1) as `image`
		FROM  `product` WHERE `statues` = 'ACTIVE' ORDER BY `id`  DESC LIMIT 1;";
		return parent::query($sql);
	}
	
	public function get_six_products($id){
		$sql = "SELECT * , (SELECT `image` FROM `product_images` WHERE `product_id` = `product`.`id` LIMIT 1) as `image`
		FROM  `product` WHERE `statues` = 'ACTIVE' ORDER BY `id`  DESC LIMIT 6;";
		return parent::query($sql);
	}
	
	public function get_all_products($id){
		$sql = "SELECT * , (SELECT `image` FROM `product_images` WHERE `product_id` = `product`.`id` LIMIT 1) as `image`
		FROM  `product` WHERE `statues` = 'ACTIVE' ORDER BY `id`  DESC ;";
		return parent::query($sql);
	}
	
	public function get_men_products($id){
		$sql = "SELECT * , (SELECT `image` FROM `product_images` WHERE `product_id` = `product`.`id` LIMIT 1) as `image`
		FROM  `product` WHERE `statues` = 'ACTIVE' AND `category` = '1'  ORDER BY `id`  DESC ;";
		return parent::query($sql);
	}
	public function get_women_products($id){
		$sql = "SELECT * , (SELECT `image` FROM `product_images` WHERE `product_id` = `product`.`id` LIMIT 1) as `image`
		FROM  `product` WHERE `statues` = 'ACTIVE' AND `category` = '2'  ORDER BY `id`  DESC ;";
		return parent::query($sql);
	}
	public function get_childern_products($id){
		$sql = "SELECT * , (SELECT `image` FROM `product_images` WHERE `product_id` = `product`.`id` LIMIT 1) as `image`
		FROM  `product` WHERE `statues` = 'ACTIVE' AND `category` = '3'  ORDER BY `id`  DESC ;";
		return parent::query($sql);
	}
	
	
	public function get_men_women_products($id){
		$sql = "SELECT * , (SELECT `image` FROM `product_images` WHERE `product_id` = `product`.`id` LIMIT 1) as `image`
		FROM  `product` WHERE `statues` = 'ACTIVE' AND `category` != '3'  ORDER BY `id`  DESC ;";
		return parent::query($sql);
	}
	
	public function get_men_childern_products($id){
		$sql = "SELECT * , (SELECT `image` FROM `product_images` WHERE `product_id` = `product`.`id` LIMIT 1) as `image`
		FROM  `product` WHERE `statues` = 'ACTIVE' AND `category` != '2'  ORDER BY `id`  DESC ;";
		return parent::query($sql);
	}
	
	public function get_childern_women_products($id){
		$sql = "SELECT * , (SELECT `image` FROM `product_images` WHERE `product_id` = `product`.`id` LIMIT 1) as `image`
		FROM  `product` WHERE `statues` = 'ACTIVE' AND `category` != '1'  ORDER BY `id`  DESC ;";
		return parent::query($sql);
	}
	
	/* product more images */
	public function product_more_images($id){
		$sql = "SELECT *  FROM `product_images` WHERE `product_id` = '$id' ORDER BY `id` DESC;";
		return parent::query($sql);
	}
	
	public function product_more_details($id){
		$sql = "SELECT * FROM `product` WHERE `id` = '$id' ORDER BY `id` DESC;";
		$row = parent::query_json($sql);
		return (object)$row[0];
	}
	
	
	
	
	
	
	
	
	
	
	
	
	/* get for home page */
	public function get_company($id){
		$sql = "SELECT * , (SELECT `image` FROM `image` WHERE `company_id` = `company`.`id` LIMIT 1) as `image`
				FROM  `company` WHERE `statues` = 'ACTIVE' ORDER BY `id`  DESC LIMIT 20;";
		return parent::query($sql);
	}
	
	public function search_company($data){
		$where = array();
		foreach ($data as $key=>$v){
			if($key !=  'p' && $key != 't' && $key != 'Search' && $key !="PHPSESSID"){
				if ($v != ""){
					$whereText .= " AND `$key` LIKE '$v%'";
				}
			}
		}
		$sql = "SELECT * FROM `company` WHERE 1 $whereText;";
		return parent::query($sql);
	}
	
	public function search($data) {
		
		$search = $data ['search'];
		$district = $data ['district'];
		$city = $data ['city'];
		$sub_category = $data ['sub_category'];
		$where = array ();
	
		if ($district != "") {
			$district = mysql_real_escape_string ( $district );
				if ($district != "Select your districts") {
					$where [0] = " AND `district_id` = '$district' ";
				}
		}
		if ($city != "") {
			$city = mysql_real_escape_string ( $city );
				if ($city != "Select your city") {
					$where [1] = " AND `city_id` = '$city' ";
				}
		}
		if ($sub_category != "") {
			$sub_category = mysql_real_escape_string ( $sub_category );
				if ($sub_category != "Select your Gift Shop") {
					$where [2] = " AND `sub_category` = '$sub_category' ";
				}
		}
		
			$where = implode ( " ", $where );
			  $sql = "SELECT *, (SELECT image FROM `image` WHERE `company_id` = `company`.`id` LIMIT 1) as `image`  From `company` WHERE 1 $where AND `statues` = 'ACTIVE' ORDER BY `id` DESC;";
			return parent::query ( $sql );
	}
	
	public function company_more($id){
		$sql = "SELECT *  FROM `image` WHERE `company_id` = '$id' ORDER BY `id` DESC;";
		return parent::query($sql);
	}
	public function company_more_details($id){
		$sql = "SELECT * FROM `company` WHERE `id` = '$id' ORDER BY `id` DESC;";
		$row = parent::query_json($sql);
		return (object)$row[0];
	}
	
	public function company_more_related($id){
		$sql = "SELECT *  FROM `company` WHERE `id` = '$id' ORDER BY `id` DESC;";
		$row = parent::query2($sql);
		if($row['district_id'] > 0){
			$distric = $row['district_id'];
			
			$sql = "SELECT * , (SELECT `image` FROM `image` WHERE `company_id` = `company`.`id` LIMIT 1) as `image`
			FROM  `company` WHERE `district_id` = '$distric' AND `statues` = 'ACTIVE' ORDER BY `id` DESC LIMIT 5;";
			return parent::query($sql);
		}
	}
	
	public function company_related_catogory($id){
		$sql = "SELECT *  FROM `company` WHERE `id` = '$id' ORDER BY `id` DESC;";
		$row = parent::query2($sql);
		if($row['district_id'] > 0){
			$distric 		= $row['district_id'];
			$sub_category	= $row['sub_category'];
			
			$sql = "SELECT * , (SELECT `image` FROM `image` WHERE `company_id` = `company`.`id` LIMIT 1) as `image`
			FROM  `company` WHERE `district_id` = '$distric' AND `sub_category` = '$sub_category' AND `statues` = 'ACTIVE' ORDER BY `id` DESC LIMIT 5;";
			return parent::query($sql);
		}
	}
	
	public function country(){
		$sql = "SELECT *  FROM `countries` ORDER BY `id` ASC;";
		return parent::query($sql);
	}
	
	public function msg($data){
		$sql = "SELECT *  FROM `countries` ORDER BY `id` ASC;";
		return parent::query($sql);
	}
	
	public function add_shop($data){
		$sub_category 		=	$data['sub_category'];
		$company_name		=	$data['company_name'];
		$owner_name 		=	$data['owner_name'];
		$email 				=	$data['email'];
		$nic 				=	$data['nic'];
		$contact_one		=	$data['contact_one'];
		$contact_two 		=	$data['contact_two'];
		$address 			=	$data['address'];
		$description 		=	mysql_real_escape_string($data['description']);
		$product_one 		=	mysql_real_escape_string($data['product_one']);
		$product_two 		=	mysql_real_escape_string($data['product_two']);
		$product_three 		=	mysql_real_escape_string($data['product_three']);
		$product_four 		=	mysql_real_escape_string($data['product_four']);
		$product_five 		=	mysql_real_escape_string($data['product_five']);
		$discount		 	=	mysql_real_escape_string($data['discount']);
		$start		 		=	mysql_real_escape_string($data['start']);
		$end		 		=	mysql_real_escape_string($data['end']);
		$districts 			=	mysql_real_escape_string($data['district']);
		$city 				=	mysql_real_escape_string($data['city']);
	
		 $sql = "INSERT INTO `company`
					(`sub_category`,`company_name`,`owner_name`,`email`,`nic`,`contact_one`,`contact_two`,`address`,`description`,
					`product_one`,`product_two`,`product_three`,`product_four`,`product_five`,`discount`,`district_id`,`city_id`,`start`,`end`)
					VALUES ('$sub_category','$company_name','$owner_name','$email','$nic','$contact_one','$contact_two','$address','$description',
					'$product_one','$product_two','$product_three','$product_four','$product_five','$discount','$districts','$city','$start','$end');";
		parent::query($sql);
	
	
		$id = parent::getLastId();
		$data = array('data'=>$data, 'productid'=> $id);
		$this->product_images($data);
		return true;
	}
	
	/* add image to db */
	public function  product_images($data){

		$productid = $data['productid'];
		$data = $data['data'];
			foreach ($data['images'] as $key=>$m){
			$image_description = $data['image_description'][$key];
			$image = $m;
			
			$sql = "INSERT INTO `image` (`company_id`,`image`,`description`)
			VALUES  ('$productid', '$image', '$image_description');";
			
			parent::query($sql);
			}
		return TRUE;
	}
	
	public function getall_company($id){
		$sql = "SELECT * FROM  `company` WHERE `statues` != 'DEACTIVE' ORDER BY `id` DESC;";
		return parent::query($sql);
	}
	
	public function getbyid($id){
		$sql = "SELECT * FROM `company` WHERE `id` = '$id' ORDER BY `id` DESC;";
		return parent::query2($sql);
	}
	
	/*  detele product from database and sent data to product_update class */
	public function edit_shop($id){
	global $fw;
	
		$fw->front_update()->update(array('data'=>$id));
		return TRUE;
	}
	
	public function request($data){
		
		$company_name		=	$data['company_name'];
		$owner_name 		=	$data['owner_name'];
		$email 				=	$data['email'];
		$nic 				=	$data['nic'];
		$contact_one		=	$data['contact_one'];
		$description 		=	mysql_real_escape_string($data['description']);
		
		$sql = "INSERT INTO `request`
				(`company_name`,`owner_name`,`email`,`nic`,`contact_one`,`description`)
				VALUES ('$company_name','$owner_name','$email','$nic','$contact_one','$description');";

		parent::query($sql);
		return true;
	}
	public function history_more_related($id){
		$sql = "SELECT *  FROM `company` WHERE `id` = '$id' ORDER BY `id` DESC;";
		$row = parent::query2($sql);
		if($row['district_id'] > 0){
			$distric = $row['district_id'];
				
		 	$sql = "SELECT * , (SELECT `image` FROM `location_image` WHERE `location_id` = `locations`.`id` LIMIT 1) as `image`
			FROM  `locations` WHERE `district_id` = '$distric' AND `statues` = 'ACTIVE' ORDER BY `id` DESC LIMIT 5;";
			return parent::query($sql);
		}
	}
	
	public function get_product($id){
		$sql = "SELECT * , (SELECT `image` FROM `item_images` WHERE `item_id` = `item`.`id` LIMIT 1) as `image`
		FROM  `item` WHERE `company_id`= '$id' AND `statues` = 'ACTIVE' ORDER BY `id`  DESC LIMIT 20;";
		return parent::query($sql);
	}
	
	
	
}
?>