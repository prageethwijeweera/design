<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo STATIC_COMPANY_NAME;?> - lPanel</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo CSS_PATH;?>bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo CSS_PATH;?>sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo CSS_PATH;?>plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo TEMPLATE_PATH;?>font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery Version 1.11.0 -->
    <script type="text/javascript" src="<?php echo JS_PATH;?>jquery-1.11.0.js"></script>     
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo JS_PATH;?>bootstrap.min.js"></script>    
    <script src="<?php echo JS_PATH;?>jquery.twbsPagination.js"></script>

	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="<?php echo PATH_3DPARTY;?>fancyapps/lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="<?php echo PATH_3DPARTY;?>fancyapps/source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo PATH_3DPARTY;?>fancyapps/source/jquery.fancybox.css?v=2.1.5" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="<?php echo PATH_3DPARTY;?>fancyapps/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="<?php echo PATH_3DPARTY;?>fancyapps/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
	
	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="<?php echo PATH_3DPARTY;?>fancyapps/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="<?php echo PATH_3DPARTY;?>fancyapps/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
	
	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="<?php echo PATH_3DPARTY;?>fancyapps/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
	
	<!-- uploadify -->
	<!-- <script type="text/javascript" src="<?php echo PATH_3DPARTY;?>uploadify/jquery-1.4.2.min.js"></script> -->
	<link href="<?php echo PATH_3DPARTY;?>uploadify/uploadify.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="<?php echo PATH_3DPARTY;?>uploadify/swfobject.js"></script>
	<script type="text/javascript" src="<?php echo PATH_3DPARTY;?>uploadify/jquery.uploadify.v2.1.4.js"></script>
	
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script> -->
 	<link href="<?php echo PATH_3DPARTY;?>select/selectize.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="<?php echo PATH_3DPARTY;?>select/selectize.js"></script>
  <script type="text/javascript">
  	$(document).ready(function (data){
  	  $('.customer').selectize({ create: true});
  	  $('.product').selectize({ create: false});
  	});
  </script>
  
  <!-- calender -->
	<script type="text/javascript" src="<?php echo PATH_3DPARTY;?>jsCal219/src/js/jscal2.js"></script>
	<script type="text/javascript" src="<?php echo PATH_3DPARTY;?>jsCal219/src/js/lang/en.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo PATH_3DPARTY;?>jsCal219/src/css/jscal2.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo PATH_3DPARTY;?>jsCal219/src/css/border-radius.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo PATH_3DPARTY;?>jsCal219/src/css/gold/gold.css" />
	  
	
	<link rel="stylesheet" href="<?php echo PATH_3DPARTY?>chosen/chosen.css">

	<!-- Validation Form -->
	<script src="<?php echo PATH_3DPARTY;?>validation/validation_jquery_1.11.js"></script>
</head>
<body>

<?php if($page=='logout'){ $fw->users()->logOut(); }?>
<?php if($_REQUEST['btnlogin']){?>
			<?php if($fw->users()->login($_REQUEST)){ } else {}?>
<?php }?>

