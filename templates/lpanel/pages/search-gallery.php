<?php if($_SESSION['SUSERTYPE'] == 'ADMIN'){?>
<?php $k = $fw->gallery()->search($id);?>

<div class="col-lg-12">
        <h1 class="page-header">
           Search gallery <small><?php echo STATIC_COMPANY_NAME;?></small>
        </h1>
     </div>
<form method="post" action="search-gallery.html" name="productsearch" class="">
		<div class="col-lg-6">
			<h4>Search by Product Name</h4>
	 		<div class="form-group">
			  		<input type="text" name="name" value="" placeholder="Product Name" class=" form-control" />
	    	</div>
	    
		 	<p><?php echo $ui->input_button_primary(array('name'=>'Search','value'=>'Search','type'=>'submit'));?></p>
		 </div>
   <?php if($_REQUEST['Search'])?>
	<table class="table">
		<thead>
		  	<tr>
		  		<th>Name</th>
		  		<th></th>
		  		<th></th>
		  	</tr>
		</thead>
		<tbody>
			<?php foreach($fw->gallery()->search($_REQUEST) as $i){?>
		  		<tr>
		  			<td><?php echo $i['name'];?></td>
		  			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
	        		<td><a  class="btn btn-success"  href="/lpanel/edit-gallery.html?id=<?php echo $i['id'];?>"> Edit</a></td>
	        		
	        		<td style="text-align:left:;"><a href="<?php echo $i['id'];?>" class="remove <?php $status = $i['statues'];?>
		  			<?php if ( $status == "ACTIVE"){
						echo " btn btn-small btn-danger";
					}else {
						echo " btn btn-success";
					} 
					?>"><?php $status = $i['statues'];?>
		  			<?php if ( $status == "DEACTIVE"){
						echo " Approved";
					}else {
						echo " Approve";
					} 
					?></a></td>
		  	<?php }?>
		</tbody>
	</table>  
</form>



<script>
$('.remove').click(function (data){
	var i = $(this).attr('href');
	$.ajax({
		type : 'post',
 		url  : '<?php echo AJAX_PATH;?>do_approve_gallery.php',
		data : 'id=' + i,
		success : function(data){
			if(data.status){
				$('#sys_message').html(data.message).removeClass("sys_message information").addClass("success").fadeIn(1000).delay(2000).fadeOut(1000);
				} else {
				$('#sys_message').html(data.message).removeClass("sys_message success").addClass("information").fadeIn(1000).delay(2000).fadeOut(1000);
			}
		}
	});
	$(this).parent().parent().slideUp(400).remove();
	return false;
});
$('.remove').click(function() {
	      location.reload();
});
</script>
<?php }?>