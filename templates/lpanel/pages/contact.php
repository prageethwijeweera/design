<form method="post" action="" name="contactme">
	<p>Your Name</p>
	<p> <?php echo $ui->input_text(array('name'=>'name','hint'=>'Your Name','class'=>'required email'));?></p>
	<p>Email</p>
	<p> <?php echo $ui->input_text(array('name'=>'email','hint'=>'Your Email','class'=>'required email'));?></p>
	<p>Message</p>
	<p> <?php echo $ui->input_textarea(array('name'=>'message','hint'=>'Message','rows'=>5,'id'=>'message'));?></p>
	<p> <?php echo $ui->input_button_primary(array('name'=>'Submit','value'=>'Contact','type'=>'submit'));?></p>

	<p><input type="file" name="upload" id="upload" /></p>

	<p><a href="#" rel="click">Click</a></p>
</form>
<?php echo $ajax->uploadify_Auto('upload','message');?>
<?php echo $ajax->fancyBoxByRel('click');?>
<?php echo $ajax->setAutoSize('message','300','500');?>
<?php echo $ajax->submitForm(array('form'=>'contactme','get'=>'#sys_message','do_contact.php'));?>