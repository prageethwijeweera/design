<?php include ('../../../../system/main.php'); ?>
<table class="table table-bordered table-hover">
		<thead>
		<tr>
			<th>#</th>
			<th>Full Name</th>
			<th>User Name</th>
			<th>Account Type</th>
			<th>&nbsp;</th>
		</tr>
		</thead>
		<tbody>
			<?php foreach($fw->users()->pagination($next) as $d){?>
			<tr>
				<td><?php echo $d['id'];?></td>
				<td><?php echo $d['fullname'];?></td>
				<td><?php echo $d['username'];?></td>
				<td><?php echo $d['account_type'];?></td>
				<td><a class="fancybox fancybox.ajax" href="<?php echo AJAX_PATH?>ui_do_edituser.php?id=<?php echo $d['id'];?>">Edit</a></td>
			</tr>
			<?php }?>
		</tbody>
</table>
<?php echo $ajax->fancyBoxByClass('fancybox');?>