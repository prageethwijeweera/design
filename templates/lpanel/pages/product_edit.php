<?php if($_SESSION['SUSERTYPE'] == 'ADMIN'){?>
<?php 
	  $data = $fw->products()->get($id);
	  $data = $data[0];
?>
<h3>Edit Product</h3>
<form method="post" action="" name="newvehicle">
	<input type="hidden" name="id" value="<?php echo $id;?>" />
	<p>Product Name</p>
	<p><input type="text" name="name" value="<?php echo $data['name'];?>" id="name" /></p>
	
	<p>Discription (small)</p>
	<p>
		<textarea rows="4" cols="20" name="description_small"><?php echo $data['description_small'];?></textarea>
	</p>
	<hr />
	<h3>Meta</h3>
	<?php foreach($fw->db()->getFileds('products') as $f){?>
		<p><?php echo $f['label'];?></p>
		<p>
			<select name="<?php echo $f['field'];?>">
				<option value="">-select-</option>
				<?php foreach($fw->meta()->getByCode($f['label']) as $m){ ?>
					<option value="<?php echo $m['id']?>" <?php echo ($data[$f['field']]==$m['id'])? 'selected="selected"' :'';?>><?php echo $m['name'];?></option>
				<?php }?>
			</select>
		</p>
	<?php }?>	
	<hr />
	<?php foreach($fw->products()->getProductImagesByProductId($id) as $i){?>
		<ul>
			<li class="span4">
			<div class="thumbnail">
				<img src="<?php echo UPLOAD_THUMB_PATH . $i['file'];?>">
					<input type="checkbox" name="images_delete[]" value="<?php echo $i['id']?>_<?php echo $i['file']?>" /> <font color="red">Delete</font>
			</div>
			</li>
		</ul>
	<?php }?>
	
	<ul class="thumbnails" id="files"></ul>
	<p><input type="file" name="upload" id="upload" /></p>
	
	<p> <?php echo $ui->input_button_primary(array('name'=>'Submit','value'=>'Submit','type'=>'submit'));?></p>
</form>

<script type="text/javascript">
	tinyMCE.init({
		mode : "exact",
		elements : "descrption_large",
		theme : "simple"
	});
</script>
<?php echo $ajax->setAutoSize('name','200','400');?>
<?php echo $ajax->uploadify_multi_resizeimage_withwatermark('upload','files');?>
<?php echo $ajax->submitForm(array('form'=>'newvehicle','do'=>'do_edit_product.php', 'get'=>'#sys_message'));?>
<?php }?>