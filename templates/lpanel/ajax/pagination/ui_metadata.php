<?php include ('../../../../system/main.php');?>
<table class="table table-bordered table-hover">
		<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Code</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
		</thead>
		<tbody>
			<?php foreach($fw->meta()->pagination($next) as $d){?>
			<tr>
				<td><?php echo $d['id'];?></td>
				<td><?php echo $d['name'];?></td>
				<td><?php echo $d['code'];?></td>
				<td><span class="label label-success"><a class="editmeta fancybox.ajax" style="color:white;" href="<?php echo AJAX_PATH;?>ui_do_editmeta.php?id=<?php echo $d['id'];?>">Edit</a></span></td>
				<td><span class="label label-important"><a class="editmeta fancybox.ajax" style="color:white;" href="<?php echo AJAX_PATH;?>do_meta_action.php?id=<?php echo $d['id'];?>&action=deletename">Delete Name</a></span></td>
				<td><span class="label label-important"><a class="editmeta fancybox.ajax" style="color:white;" href="<?php echo AJAX_PATH;?>do_meta_action.php?id=<?php echo $d['id'];?>&action=deletecode">Delete Code</a></span></td>
			</tr>
			<?php }?>
		</tbody>
</table>
<?php echo $ajax->fancyBoxByClass('editmeta');?>