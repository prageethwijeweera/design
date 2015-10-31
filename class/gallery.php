<?php
class gallery extends DB{
	public function __construct(){
		parent::__construct();
	}

	/*  add gallery to database*/
	public function add($data){
	 	
	 	$gallery_name	=	$data['name'];
	 	
	 	$sql = "INSERT INTO `gallery` (`name`)
	 						   VALUES ('$gallery_name');";
		parent::query($sql);
		
		$id = parent::getLastId();
		$data = array('data'=>$data, 'id'=> $id);
		$this->gallery_images($data);
		return true;
	}
	
	/* add image to db */
	public function  gallery_images($data){
		$gallery_id = $data['id'];
		$data = $data['data'];
		foreach ($data['images'] as $key=>$m){
			$image_description = $data['image_description'][$key];
			$image = $m;
			 
			$sql = "INSERT INTO `gallery_image` (`gallery_id`,`image`,`description`)
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
		$sql = "SELECT * FROM `gallery` WHERE 1 $whereText;";
		return parent::query($sql);
	}
	
	public function getbyid($id){
		$sql = "SELECT * FROM `gallery` WHERE `id` = '$id' ORDER BY `id` DESC;";
		return parent::query2($sql);
	}
	
	public function get_items_details(){
		$sql = "SELECT * FROM `product` ORDER  BY `id` DESC;";
		return parent::query($sql);
	}
	
	/* Company active and deactive */
	public function  approve($id){
		global $fw;
	
		$sql = "SELECT * FROM `gallery` WHERE `id` = '$id';";
		$status = parent::query2($sql);
	
		if($status['statues'] == "ACTIVE"){
			$set_status = "DEACTIVE";
		} else {
			$set_status = "ACTIVE";
		}
		$sql = "UPDATE `gallery` SET `statues` = '$set_status' WHERE `id` = '$id';";
		parent::query($sql);
		return TRUE;
	}
	
	public function getProductImages($id){
		$sql = "SELECT * FROM `gallery_image` WHERE `gallery_id` = '$id';";
		return parent::query($sql);
	}
	
	/*  detele product from database and sent data to product_update class */
	public function delete($id){
		global $fw;
		$deleteitem = $id['delete'];
	
		foreach ($deleteitem as $key=>$m){
			$sql = "SELECT * FROM `gallery` WHERE `id`='$key';";
			$row = parent::query2($sql);
			$sql = "DELETE FROM `gallery` WHERE `id`='$key';";
			parent::query($sql);
		}
		$fw->gallery_update()->update(array('data'=>$id));
		return TRUE;
	}
	
	
	
	
	
	
	public function get(){
		$sql = "SELECT * FROM `company` ORDER BY DESC;";
		return parent::query($sql);
	}
	
	

	
	
}
?>