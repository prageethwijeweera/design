<?php 
if($_REQUEST['delete_products']){
	$selected = $_REQUEST['selected'];
	foreach($selected as $s){
		$fw->products()->delete($s);
	}	
	echo $fw->db()->jQueryMessage('Deleted Selected Products', TRUE);
}
?>
<form method="post" action="?node=listproducts">
<table class="table table-bordered table-hover">
		<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Description Small</th>
			<th>Date Added</th>
			<th>
				<button type="submit" name="delete_products" class="btn" value="Selected Products">
					Delete Selected 
				</button>
			</th>
		</tr>
		</thead>
		<tbody>
			<?php foreach($fw->products()->get() as $p){?>
			<tr>
				<td><?php echo $p['id'];?></td>
				<td><?php echo $p['name'];?></td>
				<td><?php echo $p['description_small'];?></td>
				<td><?php echo $p['timestamp'];?></td>
				<td>
					<input name="selected[]" type="checkbox" value="<?php echo $p['id'];?>"/> - 
					<a class="editmeta" href="?node=edit_product&id=<?php echo $p['id'];?>">Edit</a>
				</td>
			</tr>
			<?php }?>
		</tbody>
</table>
</form>
<script>
	$(document).ready(function (data){
		var count=0;
		$('input[type=checkbox]').change(function (data){
			if($(this).attr('checked')){
				count++;
				$('button').text('Delete Selected (' + count + ')');
			} else {
				--count;
				$('button').text('Delete Selected (' + count + ')');
			
			}
		});
	});
</script>