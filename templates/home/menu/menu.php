<!-- header -->
	<div class="top-header">
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="logo">
							<h1><a href="index.html"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>Flooring</a></h1>
						</div>
						<form class="navbar-form navbar-left search" role="search">						
							<div class="form-group">
								<button type="submit" class="btn btn-default" aria-label="Left Align">
									<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
								</button>
								<input type="text" class="form-control" placeholder="Search">
							</div>						
						</form>
					</div>					  
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">
							<li class="active"><a href="index.html">Home</a></li>
							<li class=""><a href="about.php">About</a></li>
							<li><a class="scroll" href="#services">Services</a></li>
							<li><a href="projects.php">News</a></li>
							<li><a class="gallery" href="gallery.php">Gallery</a></li>
							<li><a href="contact.php">Mail</a></li>
						</ul>         
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>	
		</div>
	</div>
<script src="<?php echo JS_PATH?>responsiveslides.min.js"></script>
<script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: false,
      	nav: false,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
	
</script>
	<div class="header-slider">
		<div class="slider">
			<div class="callbacks_container">
			  <ul class="rslides" id="slider">
				<div class="slid banner1">				  
				  <div class="caption">
					<h3>Donec ut turpis sit amet enim mattis commodo velit.</h3>
					<p>FOURNIER Timber carefully selects from a wide range of quality hardwoods to customers exact requirements which minimises wastage.</p>
					<a class="hvr-bounce-to-right btn-left" href="#">Click</a>	
					<a class="hvr-bounce-to-left  btn-right" href="#">learn more</a>
					</div>
				</div>
				<div class="slid banner2">				  
				  <div class="caption">
					<h3>Donec ut turpis sit amet enim mattis commodo velit.</h3>
					<p>FOURNIER Timber carefully selects from a wide range of quality hardwoods to customers exact requirements which minimises wastage.</p>
					<a class="hvr-bounce-to-right btn-left" href="#">Click</a>	
					<a class="hvr-bounce-to-left  btn-right" href="#">learn more</a>
					</div>
				</div>
				<div class="slid banner3">				  
				  <div class="caption">
					<h3>Donec ut turpis sit amet enim mattis commodo velit.</h3>
					<p>FOURNIER Timber carefully selects from a wide range of quality hardwoods to customers exact requirements which minimises wastage.</p>
					<a class="hvr-bounce-to-right btn-left" href="#">Click</a>	
					<a class="hvr-bounce-to-left  btn-right" href="#">learn more</a>
					</div>
				</div>
			</ul>
		  </div>
	  </div>
</div>	 
<!---->