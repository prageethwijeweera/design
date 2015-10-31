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
							<li><a href="index.html">Home</a></li>
							<li <?php echo ($page=="" || $page=="about")? 'class="active"' : '';?>><a href="about.php">About</a></li>
							<li <?php echo ($page=="" || $page=="projects")? 'class="active"' : '';?>><a href="projects.html">Projects</a></li>
							<li <?php echo ($page=="" || $page=="gallery")? 'class="active"' : '';?>><a href="gallery.html"  class="gallery">Gallery</a></li>
							<li <?php echo ($page=="" || $page=="contact")? 'class="active"' : '';?>><a href="contact.html">Mail</a></li>
						</ul>         
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>	
		</div>
	</div>
<div class="top-banner"></div>	 
<!---->