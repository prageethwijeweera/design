<?php
class product extends DB{
	public function __construct(){
		parent::__construct();
	}
	/* ////////////////////////////////////////////////////////// */
	public function searchall(){
		$sql = "SELECT * FROM `company` ORDER  BY `id` DESC;";
		return parent::query($sql);
	}
	
	/*  add company to database*/
	public function add($data){
	 	
	 	$category 			=	$data['category'];
	 	$product_name 		=	$data['product_name'];
	 	$description		=	$data['description'];
	 	$product_act_price 	=	$data['product_act_price'];
	 	$discount 			=	$data['discount'];
	 	$warenty 			=	$data['warenty'];
	 	$more_details 		=	$data['more_details'];
	 	
		$sql = "INSERT INTO `product`   
			   (`category`,`product_name`,`description`,`product_act_price`,`discount`,`warenty`,`more_details`)
		VALUES ('$category','$product_name','$description','$product_act_price','$discount','$warenty','$more_details');";
		parent::query($sql);
		
		$id = parent::getLastId();
		$data = array('data'=>$data, 'id'=> $id);
		$this->item_images($data);
		return true;
	}
	
	/* add image to db */
	public function  item_images($data){
		$gallery_id = $data['id'];
		$data = $data['data'];
		foreach ($data['images'] as $key=>$m){
			$image_description = $data['image_description'][$key];
			$image = $m;
			 
			$sql = "INSERT INTO `product_images` (`product_id`,`image`,`description`)
			VALUES  ('$gallery_id', '$image', '$image_description');";
	
			parent::query($sql);
		}
		return TRUE;
	}
	
	/*  search items from database*/
	public function search($data){
		$where = array();
		foreach ($data as $key=>$v){
			if($key !=  'p' && $key != 't' && $key != 'Search' && $key !="PHPSESSID"){
				if ($v != ""){
					$whereText .= " AND `$key` LIKE '$v%'";
				}
			}
		}
		$sql = "SELECT * FROM `product` WHERE 1 $whereText;";
		return parent::query($sql);
	}
	
	public function getbyid($id){
		$sql = "SELECT * FROM `product` WHERE `id` = '$id' ORDER BY `id` DESC;";
		return parent::query2($sql);
	}
	
	public function get_items_details(){
		$sql = "SELECT * FROM `product` ORDER  BY `id` DESC;";
		return parent::query($sql);
	}
	
	/* Company active and deactive */
	public function  approve($id){
		global $fw;
	
		$sql = "SELECT * FROM `product` WHERE `id` = '$id';";
		$status = parent::query2($sql);
	
		if($status['statues'] == "ACTIVE"){
			$set_status = "DEACTIVE";
		} else {
			$set_status = "ACTIVE";
		}
		$sql = "UPDATE `product` SET `statues` = '$set_status' WHERE `id` = '$id';";
		parent::query($sql);
		return TRUE;
	}
	
	public function get_item_Images($id){
		$sql = "SELECT * FROM `product_images` WHERE `product_id` = '$id';";
		return parent::query($sql);
	}
	
	/*  detele product from database and sent data to product_update class */
	public function delete($id){
		global $fw;
		$deleteitem = $id['delete'];
	
		foreach ($deleteitem as $key=>$m){
			$sql = "SELECT * FROM `product` WHERE `id`='$key';";
			$row = parent::query2($sql);
			$sql = "DELETE FROM `product` WHERE `id`='$key';";
			parent::query($sql);
		}
		$fw->product_update()->update(array('data'=>$id));
		return TRUE;
	}
	
	
	
	
	
	
	public function get(){
		$sql = "SELECT * FROM `company` ORDER BY DESC;";
		return parent::query($sql);
	}
	
	

	
	
}
?>