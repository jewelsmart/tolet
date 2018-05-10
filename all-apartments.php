<?php include('server.php') ?>
<?php 
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login-register.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login-register.php");
  }
?>
<!DOCTYPE html>

<head>

<!-- Basic Page Needs
================================================== -->
<title>Findeo</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/colors/main.css" id="colors">

</head>

<body>
	
<!-- Wrapper -->
<div id="wrapper">

	<!-- Header -->
	<div id="header">
		<div class="container">
			
			<!-- Left Side Content -->
			<div class="left-side">
				
				<!-- Logo -->
				<div id="logo">
					<a href="index.php"><img src="images/logo.png" alt=""></a>
				</div>


				<!-- Mobile Navigation -->
				<div class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>


				<!-- Main Navigation -->
				<nav id="navigation" class="style-1">
					<ul id="responsive">
						<li><a href="index.php">Home</a>	
						</li>
						<li><a class="current" href="all-apartments.php">All Apartments</a>
						</li>
						<li><a href="my-profile.php">My Profile</a>
						</li>
						<li><a href="index.php?logout='1'">Logout</a>
						</li>
					</ul>
				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->
				
			</div>
			<!-- Left Side Content / End -->

			<!-- Right Side Content / End -->
			<div class="right-side">
				<!-- Header Widget -->
				<div class="header-widget">
					<a href="my-Profile.php" class="sign-in"><p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p></a>
				</div>
				<!-- Header Widget / End -->
			</div>
			<!-- Right Side Content / End -->

		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->
<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>All Apartments</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li>All Apartments</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row fullwidth-layout">

		<div class="col-md-12">
		
			<!-- Listings -->
			<div class="listings-container list-layout">
			
			<?php $results = mysqli_query($db, "SELECT * FROM apartments"); ?>
			<?php $row = mysqli_fetch_array($results); ?>
			<?php
				$json = mysqli_fetch_all ($results, MYSQLI_ASSOC);
				echo $json;
			?>
				<?php
				 for( $i = 0; $i<5; $i++ ) { ?>
					<!-- Listing Item -->
				<div class="listing-item">

					<a href="single-property-page-1.html" class="listing-img-container">
						<div class="listing-img-content">
							<span class="listing-price">$275,000/Month</span>
						</div>

						<div class="listing-carousel">
							<div><img src="images/listing-01.jpg" alt=""></div>
							<div><img src="images/listing-01b.jpg" alt=""></div>
							<div><img src="images/listing-01c.jpg" alt=""></div>
						</div>
					</a>
					
					<div class="listing-content">

						<div class="listing-title">
							<h4><a href="single-property-page-1.html">Eagle Apartments</a></h4>
							<a href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&amp;hl=en&amp;t=v&amp;hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom" class="listing-address popup-gmaps">
								<i class="fa fa-map-marker"></i>
								9364 School St. Lynchburg, NY
							</a>

							<a href="single-property-page-1.html" class="details button border">Details</a>
						</div>

						<ul class="listing-details">
							<li>530 sq ft</li>
							<li>1 Bedroom</li>
							<li>3 Rooms</li>
							<li>1 Bathroom</li>
						</ul>

						<div class="listing-footer">
							<a href="#"><i class="fa fa-user"></i>Posted By David Strozier</a>
							<span><i class="fa fa-calendar-o"></i> 1 day ago</span>
						</div>

					</div>

				</div>
				<!-- Listing Item / End -->
					
				<?php } ?>
				

			</div>
			<!-- Listings Container / End -->

		</div>

	</div>
</div>


<!-- Flip banner -->
<a href="listings-half-map-grid-standard.html" class="flip-banner parallax" data-background="images/flip-banner-bg.jpg" data-color="#274abb" data-color-opacity="0.9" data-img-width="2500" data-img-height="1600">
	<div class="flip-banner-content">
		<h2 class="flip-visible">We help people and homes find each other</h2>
		<h2 class="flip-hidden">Browse Properties <i class="sl sl-icon-arrow-right"></i></h2>
	</div>
</a>
<!-- Flip banner / End -->




<!-- Footer
================================================== -->
<div id="footer" class="sticky-footer">
	<!-- Main -->
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-6">
				<img class="footer-logo" src="images/logo.png" alt="">
				<br><br>
				<p>Morbi convallis bibendum urna ut viverra. Maecenas quis consequat libero, a feugiat eros. Nunc ut lacinia tortor morbi ultricies laoreet ullamcorper phasellus semper.</p>
			</div>

			<div class="col-md-4 col-sm-6 ">
				<h4>Helpful Links</h4>
				<ul class="footer-links">
					<li><a href="#">Login</a></li>
					<li><a href="#">Sign Up</a></li>
					<li><a href="#">My Account</a></li>
					<li><a href="#">Add Property</a></li>
					<li><a href="#">Pricing</a></li>
					<li><a href="#">Privacy Policy</a></li>
				</ul>

				<ul class="footer-links">
					<li><a href="#">FAQ</a></li>
					<li><a href="#">Blog</a></li>
					<li><a href="#">Our Agents</a></li>
					<li><a href="#">How It Works</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
				<div class="clearfix"></div>
			</div>		

			<div class="col-md-3  col-sm-12">
				<h4>Contact Us</h4>
				<div class="text-widget">
					<span>12345 Little Lonsdale St, Melbourne</span> <br>
					Phone: <span>(123) 123-456 </span><br>
					E-Mail:<span> <a href="#"><span class="__cf_email__" data-cfemail="462920202f252306233e272b362a236825292b">[email&#160;protected]</span></a> </span><br>
				</div>

				<ul class="social-icons margin-top-20">
					<li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
					<li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
					<li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
					<li><a class="vimeo" href="#"><i class="icon-vimeo"></i></a></li>
				</ul>

			</div>

		</div>
		
		<!-- Copyright -->
		<div class="row">
			<div class="col-md-12">
				<div class="copyrights">© 2016 Findeo. All Rights Reserved.</div>
			</div>
		</div>

	</div>

</div>
<!-- Footer / End -->


<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>


<!-- Scripts
================================================== -->
<script data-cfasync="false" src="../../cdn-cgi/scripts/d07b1474/cloudflare-static/email-decode.min.js"></script><script type="text/javascript" src="scripts/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="scripts/chosen.min.js"></script>
<script type="text/javascript" src="scripts/magnific-popup.min.js"></script>
<script type="text/javascript" src="scripts/owl.carousel.min.js"></script>
<script type="text/javascript" src="scripts/rangeSlider.js"></script>
<script type="text/javascript" src="scripts/sticky-kit.min.js"></script>
<script type="text/javascript" src="scripts/slick.min.js"></script>
<script type="text/javascript" src="scripts/masonry.min.js"></script>
<script type="text/javascript" src="scripts/mmenu.min.js"></script>
<script type="text/javascript" src="scripts/tooltips.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>


</div>
<!-- Wrapper / End -->


</body>

</html>