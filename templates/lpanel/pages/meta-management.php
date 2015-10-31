<?php if($_SESSION['SUSERTYPE'] != 'ADMIN'){  exit("<h3 style='background:red; color:white; padding:4px; font-size:11px;'>Your are not authorized to access this page.</h3>");}?>
<h3>Meta Data</h3>
<hr />
<form method="post" name="meta">
	<p>Name</p>
	<p> <?php echo $ui->input_text(array('name'=>'name','hint'=>'Name','class'=>'required'));?></p>
	<p>Code</p>
	<p>
		<?php foreach($fw->meta()->getCode() as $c){?>
			<input type="radio" value="<?php echo $c['code'];?>" name="code"> <?php echo $c['code'];?>  <br />
		<?php }?>
		<input type="radio" value="OTHER" name="code"> OTHER <br />
		
		<div class="other">
			<input name="newcode" type="text" value="" />
		</div>
	</p>
	<p> <?php echo $ui->input_button_primary(array('name'=>'AddMeta','type'=>'Submit','value'=>'Add Meta'));?></p>
</form>
<script language="javascript" type="text/javascript">
	$(document).ready(function (data){
		$('.other').hide();
		$('input[name=code]').click(function (data){
			if($(this).val() == "OTHER"){
				$('.other').show(400);
			} else {
				$('.other').hide(400);
			}
		});
	});
</script>
<?php echo $ajax->submitForm(array('form'=>'meta','get'=>'#sys_message', 'do'=>'do_meta.php'));?>


<hr />
<h3>Meta List</h3>

<div class="pagination"></div>
<div class="pagecontent"></div>
<?php echo $ajax->twbsPagination(array('content'=>'.pagecontent','pagination'=> '.pagination', 'do'=>'ui_metadata.php','total'=> $fw->meta()->total()));?>