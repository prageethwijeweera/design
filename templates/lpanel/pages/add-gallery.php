<?php if($_SESSION['SUSERTYPE'] == 'ADMIN'){?>
     <div class="col-lg-12">
        <h1 class="page-header">
           Add New Gallery image <small><?php echo STATIC_COMPANY_NAME;?></small>
        </h1>
     </div>
<form method="post" name="traevladd" class="">
		   
        <div class="col-lg-6">
       		<br>
			<h4>Company Name</h4>
			<div class="form-group">
			   	<input type="text" name="name" value="" placeholder="Name" class="required form-control" />
			</div>
			<div class="col-lg-12">
		  		<div class="form-group input-group">
			  		<ul class="thumbnails" id="files"></ul>
			  		<div style="clear:both;"></div>
					<input type="file" name="upload" id="upload" />	
				</div>
		  	</div>
			    	<p> <?php echo $ui->input_button_primary(array('name'=>'Submit','value'=>'Submit','type'=>'submit'));?></p>
		</div>
</form>	  
<?php //echo $ajax->setAutoSize('name','200','400');?>
<?php echo $ajax->uploadify_multi_resizeimage_withwatermark('upload','files');?>
<?php echo $ajax->populateParentsChilds(array('parent'=>'district', 'child'=>'city' , 'do'=>'do_get_city.php'))?>
<?php echo $ajax->submitForm(array('form'=>'traevladd','do'=>'do_add_gallery.php', 'get'=>'#sys_message'));?>
<?php }?>