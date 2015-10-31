<!-- footer -->
<div class="footer">
	 <div class="container">
		 <div class="footer-grids">
			 <div class="col-md-6 ftr-grid1">
				 <h4>About</h4>
				 <p>Nam ac interdum dui, eget iaculis augue. Cras sagittis orci leo, quis luctus diam sollicitudin in. Nullam in convallis sem. Aliquam erat felis, iaculis ac semper et, congue feugiat nibh. Nullam commodo fermentum venenatis.</p>
				 <div class="social">
					<ul>
						<li><a href="#"><i class="facebok"> </i></a></li>
						<li><a href="#"><i class="twiter"> </i></a></li>
						<li><a href="#"><i class="in"> </i></a></li>
						<li><a href="#"><i class="goog"> </i></a></li>						
							<div class="clearfix"></div>	
					</ul>
				 </div>
			 </div>
			 <div class="col-md-6 news-ltr">
				 <h4>Newsletter</h4>
				 <p>Aenean sagittis est eget elit pulvinar cursus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus non purus at risus consequat finibus.</p>
				 <form>					 
					  <input type="text" class="text" value="Enter Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Email';}">
					 <input type="submit" value="Subscribe">
					 <div class="clearfix"></div>
				 </form>
			</div>
			 <div class="clearfix"></div>
		 </div>		 
	 </div>
</div>
<div class="copywrite">
	 <div class="container">
			 <p> © 2015 Flooring. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
	 </div>
</div>
<!---->
<script type="text/javascript">
		$(document).ready(function() {
				/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
				*/
		$().UItoTop({ easingType: 'easeOutQuart' });
});
</script>
<a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!----> 
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo JS_PATH?>bootstrap.js"></script>	  
</body>
</html>