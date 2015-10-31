<?php include_once ('header/header.php');?>
<div id="sys_message" class="sys_message"></div>
<div id="wrapper">
		<?php include_once 'menu/menu.php';?>
		<div id="page-wrapper">
			<?php echo $fw->show_session_message();?>
			<?php if($_REQUEST['btnlogin']){?>
				<?php if($fw->users()->login($_REQUEST)){
							echo $fw->users()->bootsrapMessage('Login','Success !.', 'success');
					  } else {
					  		echo $fw->users()->bootsrapMessage('Login','Fail !.', 'danger');
					  }
				 ?>
			<?php }?>

			<div class="container-fluid">
				<?php if($fw->users()->isLogin() == FALSE){?>
					<?php include_once ('pages/login.php');?>
				<?php } else {?>
						<?php switch($page){
							default : 							include_once ('pages/dashboard.php'); 				break;
							case 'users': 						include_once ('pages/users.php'); 					break;
							
							case 'add-product': 				include_once ('pages/add-product.php'); 			break;
							case 'search-product':				include_once ('pages/search-product.php'); 			break;
							case 'edit-product':				include_once ('pages/edit-product.php'); 			break;
							
							case 'add-gallery': 					include_once ('pages/add-gallery.php'); 				break;
							case 'search-gallery': 				include_once ('pages/search-gallery.php');			break;
							case 'edit-gallery': 				include_once ('pages/edit-gallery.php');				break;

							case 'meta-management': include_once ('pages/meta-management.php'); break;
							}
						?>
					
				<?php }?>
			</div>
		</div>
        
</div>
<?php include_once ('footer/footer.php');?>