<?php if($_SESSION['SUSERTYPE'] != 'ADMIN'){  exit("<h3 style='background:red; color:white; padding:4px; font-size:11px;'>Your are not authorized to access this page.</h3>");}?>

		<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            User Managment <small><?php echo STATIC_COMPANY_NAME;?></small>
                        </h1>
                    </div>
        </div>
        
<form role="form" class="form-group-sm" style="width:450px;" method="post" name="adduser">
  <div class="form-group">
    <?php echo $ui->input_text(array('name'=>'fullname','hint'=>'User Full Name','class'=>'required form-control'));?>
  </div>
  <div class="form-group">
    <?php echo $ui->input_text(array('name'=>'username','hint'=>'User Name','class'=>'required form-control'));?>
  </div>
  <div class="form-group">
    <?php echo $ui->input_text(array('name'=>'password','hint'=>'Password','class'=>'required form-control'));?>
  </div>
  <div class="form-group">
  	<label for="exampleInputEmail1">Account Type</label>
  </div>
  <div class="checkbox">
    <label>
      <input type="radio" value="ADMIN" name="accountrype"> Administrator
    </label>
    <label>
      <input type="radio" value="USER" name="accountrype"> User
    </label>
    <label>
      <input type="radio" value="NOLOG" name="accountrype"> No Access
    </label>
  </div>
  <?php echo $ui->input_button_primary(array('name'=>'AddUser','type'=>'Submit','value'=>'Add User'));?>
</form>
<?php echo $ajax->submitForm(array('form'=>'adduser','get'=>'#sys_message', 'do'=>'do_adduser.php'));?>

<hr />

<div class="pagination"></div>
<div class="pagecontent"></div>
<?php echo $ajax->twbsPagination(array('content'=>'.pagecontent','pagination'=> '.pagination', 'do'=>'ui_users.php','total'=> $fw->users()->total()));?>