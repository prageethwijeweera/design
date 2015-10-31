<?php if($fw->users()->isLogin()==FALSE){?>
		<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small><?php echo STATIC_COMPANY_NAME;?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-user"></i> Login
                            </li>
                        </ol>
                    </div>
        </div>
        <div class="row">
                    <div class="col-lg-6">
                       <form method="post" action="/lpanel/index.html" name="login">
                            <div class="form-group">
                                <?php echo $ui->input_text(array('name'=>'username','hint'=>'User Name','class'=>'required form-control'));?>
                                <p class="help-block">Please enter administrative user name</p>
                            </div>
                            
                            <div class="form-group">
                            	<?php echo $ui->input_password(array('name'=>'password','hint'=>'Password','class'=>'required form-control'));?>
                            	<p class="help-block">Please enter administrative password</p>
                            </div>
                            <div class="form-group">
                                <?php echo $ui->input_button_primary(array('name'=>'btnlogin','value'=>'Login','type'=>'submit'));?>
                            </div>
                        </form>
                     </div>    
        </div>		
<?php } else {?>
	<?php //include_once('view.php');?>
<?php }?>