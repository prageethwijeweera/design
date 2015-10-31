<?php if($_SESSION['SUSERTYPE'] == 'ADMIN'){?>
 <?php $i = $fw->gallery()->getbyid($id);?>
     
         <div class="col-lg-12">
        <h1 class="page-header">
           Edit Company <small><?php echo STATIC_COMPANY_NAME;?></small>
        </h1>
     </div>
<form method="post" name="traveledit" class="">
   
          <div class="col-lg-6">
       <br> 
		<h4>Edit Product</h4>
		 <p>  
     
		<input type="hidden" name="editproductid" value="<?php echo $_REQUEST['id'];?>" placeholder="id" class="required form-control" />
		
		<h4>Company Name</h4>
			<div class="form-group">
			   	<input type="text" name="name" value="<?php echo $i['name'];?>" placeholder="Shop Name" class="required form-control" />
			</div>
		
			<div class="col-lg-12">
		  		<div class="form-group input-group">
			  		<ul class="thumbnails" id="files">
			  				<?php foreach($fw->gallery()->getProductImages($id) as $image){?>		  				
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
		  	
	<input type="checkbox" name="delete[<?php echo $i['id'];?>]" /> Delete Product
			    	<p> <?php echo $ui->input_button_primary(array('name'=>'Submit','value'=>'Submit','type'=>'submit'));?></p>
		  </div>
</form>	  

<?php //echo $ajax->setAutoSize('name','200','400');?>
<?php echo $ajax->uploadify_multi_resizeimage_withwatermark('upload','files');?>
<?php echo $ajax->populateParentsChilds(array('parent'=>'district', 'child'=>'city' , 'do'=>'do_get_city.php'))?>
<?php echo $ajax->submitForm(array('form'=>'traveledit','do'=>'do_edit_gallery.php', 'get'=>'#sys_message'));?>
<?php }?>