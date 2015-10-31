<?php if($_SESSION['SUSERTYPE'] == 'ADMIN'){?>

<div class="col-lg-12">
        <h1 class="page-header">
           Search Company <small><?php echo STATIC_COMPANY_NAME;?></small>
        </h1>
     </div>
<form method="post" action="search-product.html" name="productsearch" class="">
		<div class="col-lg-6">
		<h4>Search by Product Name</h4>
	 		<div class="form-group">
			  		<input type="text" name="product_name" value="" placeholder="Product Name" class=" form-control" />
	    	</div>
	    	
		  <p><?php echo $ui->input_button_primary(array('name'=>'Search','value'=>'Search','type'=>'submit'));?></p></div>
   <?php if($_REQUEST['Search'])?>
	<table class="table">
		<thead>
		  	<tr>
		  		<th>Product Name</th>
		  		<th>Description</th>
		  		<th>Price</th>
		  		<th>date</th>
		  		<th></th>
		  		<th></th>
		  	</tr>
		</thead>
		<tbody>
			<?php foreach($fw->product()->search($_REQUEST) as $i){?>
		  		<tr>
		  			<td><?php echo $i['product_name'];?></td>
		  			<td><?php echo $i['description'];?></td>
		  			<td><?php echo $i['product_act_price'];?></td>
		  			<td><?php echo $i['date'];?></td>
		  			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
	        		<td><a  class="btn btn-success"  href="/lpanel/edit-product.html?id=<?php echo $i['id'];?>"> Edit</a></td>
	        		
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
 		url  : '<?php echo AJAX_PATH;?>do_approve_product.php',
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