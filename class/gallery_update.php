<?php
class gallery_update extends DB{
	public function __construct(){
		parent::__construct();
	}
/* ////////////////////////////////////////////////////////// */
	
	/*  update product from database*/
	public function update($data){
		
		$data = $data['data'];
		$productid =$data['editproductid'];
		
	 	$gallery_name =	$data['name'];
	 	
	 	$sql = "UPDATE `gallery` SET `name`='$gallery_name'
				WHERE `id`= '$productid';";
		
		$this->product_images(array('editproductid'=>$productid, 'data'=>$data));
		$this->deleteimage($data);
		parent::query($sql);
		return TRUE;
	}
	
	/* add image to db */
	public function  product_images($datas){
		$productid = $datas['editproductid'];
		$data = $datas['data'];
		foreach ($data['images'] as $key=>$m){
			$image_description = $data['image_description'][$key];
			$image = $m;
			 
			$sql = "INSERT INTO `gallery_image` (`gallery_id`,`image`,`description`)
			VALUES  ('$productid', '$image', '$image_description');";
			parent::query($sql);
		}
		return TRUE;
	}
	
	/* Delete image from databse */
	public function deleteimage($data){
			
		$deleteimage = $data['update_delete'];
		$imagedescriptioin = mysql_real_escape_string($data['update_description']);
	
		$item_id = $data['editproductid'];
		foreach ($deleteimage as $key=>$m){
			$sql = "SELECT * FROM `gallery_image` WHERE `id`='$key' AND `gallery_id` = '$item_id';";
			$row = parent::query2($sql);
			unlink(UPLOAD_FILE_THUMB_FULL_PATH.'250-250-'.$row['image']);
			unlink(UPLOAD_FILE_FULL_PATH.'500-500-'.$row['image']);
			$sql = "DELETE FROM `gallery_image` WHERE `id`='$key' AND `gallery_id` = '$item_id';";
			parent::query($sql);
		}
	}
	
}
?>