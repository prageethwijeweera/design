<body id="<?php echo ($page=="" || $page=="home" || $page=="index")? 'page1' : 'page2';?>">
	<?php 		if($page=="" || $page=="home" || $page=="index"){
					include_once('header/header.php'); 
				}
				elseif ($page=="projects"){
					include_once('header/header_gallery.php');
				}
 				else { include_once('header/header_other.php');};?>
    <!-- / header-->
    
   <?php if($page=="" || $page=="home" || $page=="index"){
include_once('menu/menu.php'); } else { include_once('menu/menu_other.php');};?>



						<?php switch($page){
							default : include_once ('pages/home.php'); break;
							case 'about': include_once ('pages/about.php'); break;
							case 'gallery': include_once ('pages/gallery.php'); break;
							case 'projects': include_once ('pages/projects.php'); break;
							case 'contact': include_once ('pages/contact.php'); break;
						}	
						?>
<!-- / content -->
<!-- footer -->
  <?php include_once ('footer/footer.php'); ?>
<!-- footer -->
<?php exit; ?>