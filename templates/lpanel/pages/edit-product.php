<?php if($_SESSION['SUSERTYPE'] == 'ADMIN'){?>
  
  <?php $product = $fw->product()->getbyid($id);?>
      <div class="col-lg-12">
        <h1 class="page-header">
           Edit Product<small><?php echo STATIC_COMPANY_NAME;?></small>
        </h1>
     </div>
<form method="post" name="productadd" class="">
		   
		<div class="col-lg-6">
       	<br> 
       	<h3>Details of Products</h3>
       	<input type="hidden" name="editproductid" value="<?php echo $_REQUEST['id'];?>" placeholder="id" class="required form-control" />
		<div class="form-group">
			<select name="category" value="" class="form-control" >
		  		<?php foreach($fw->meta()->getByCode('CAT') as $n){?>
		  		<option value="<?php echo $n['id'];?>"<?php echo ($n['id']==$product['category'])? 'selected="selected"' :'';?>><?php echo $n['name'];?></option>
		  		<?php }?>
		 	 </select>
		</div>
		<h4>Product Name</h4>
			<div class="form-group">
			   	<input type="text" name="product_name" value="<?php echo $product['product_name'];?>" placeholder="Product Name" class="required form-control" />
			</div>
		<h4> Product Description</h4>
			<div class="form-group">
				 <textarea class="form-control" name="description"  rows="4" cols="105"><?php echo $product['description'];?></textarea>
			</div>
		<h4>Actual Price</h4>
			<div class="form-group">
			   	<input type="text" name="product_act_price" value="<?php echo $product['product_act_price'];?>" placeholder="Product Actual parice" class="required form-control" />
			</div>
		<h4>Discount</h4>
			<div class="form-group">
			   	<input type="text" name="discount" value="<?php echo $product['discount'];?>" placeholder="Discount" class="required form-control" />
			</div>
		<h4> Product Warenty Note</h4>
			<div class="form-group">
				 <textarea class="form-control" name="warenty"  rows="4" cols="105"><?php echo $product['warenty'];?></textarea>
			</div>
		<h4> Product More Details</h4>
			<div class="form-group">
				 <textarea class="form-control" name="more_details"  rows="4" cols="105"><?php echo $product['more_details'];?></textarea>
			</div>
		<div class="col-lg-12">
		  		<div class="form-group input-group">
			  		<ul class="thumbnails" id="files">
			  				<?php foreach($fw->product()->get_item_Images($id) as $image){?>		  				
			  					<li>
			  						<img src="<?php echo UPLOAD_THUMB_PATH . $image['image'];?>" /><br />
			  						<input type="text" name="update_description[<?php $image['id'];?>]" value="<?php echo $image['description'];?>" /><br />
			  						<input type="checkbox" name="update_delete[<?php echo $image['id'];?>]" /> Delete
			  					</li>
			  				<?php }?>
			  		</ul>
			  		<div style="clear:both;"></div>
					<input type="file" name="upload" id="upload" />	
				</div>
		  	</div>
		  	
	<input type="checkbox" name="delete[<?php echo $product['id'];?>]" /> Delete Product
			    	<p> <?php echo $ui->input_button_primary(array('name'=>'Submit','value'=>'Submit','type'=>'submit'));?></p>
		  </div>
</form>	  

<?php //echo $ajax->setAutoSize('name','200','400');?>
<?php echo $ajax->uploadify_multi_resizeimage_withwatermark('upload','files');?>
<?php echo $ajax->populateParentsChilds(array('parent'=>'district', 'child'=>'city' , 'do'=>'do_get_city.php'))?>
<?php echo $ajax->submitForm(array('form'=>'productadd','do'=>'do_edit_product.php', 'get'=>'#sys_message'));?>
<?php }?>