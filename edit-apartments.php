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
  $aprt_id = $_GET['aprt_id'];
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
						<li><a class="current" href="#">Home</a>	
						</li>
						<li><a href="all-apartments.php">All Apartments</a>
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
<div id="titlebar" class="submit-page">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2><i class="fa fa-plus-circle"></i> Add Property</h2>
			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
<div class="row">

	<!-- Submit Page -->
	<div class="col-md-12">
		<div class="submit-page">
		<!-- Section -->
		<h3>Basic Information</h3>
		<?php $results = mysqli_query($db, "SELECT * FROM apartments WHERE aprt_id=$aprt_id"); ?>
		<div class="submit-section">
			<form method="post" action="add-apartment.php">
			<?php  if (count($errors) > 0) : ?>
			  <div class="error">
				<?php foreach ($errors as $error) : ?>
				  <p style="color:red"><?php echo $error ?></p>
				<?php endforeach ?>
			  </div>
			<?php  endif ?>
			<?php $row = mysqli_fetch_array($results); ?>
			<input type="hidden" name="aprt_id" value="<?php echo $row['aprt_id']; ?>"/>
			<!-- Title -->
			<div class="form">
				<h5>Title</h5>
				<input class="search-field" type="text" name="title" value="<?php echo $row['title']; ?>"/>
			</div>
			
			<!-- Row -->
			<div class="row with-forms">
				<!-- Rooms -->			
				<div class="col-md-4">
					<h5>Bedrooms:</h5>
					<input class="search-field" type="text" name="bedrooms" value="<?php echo $row['bedrooms']; ?>"/>
				</div>
				<div class="col-md-4">
					<h5>Bathrooms:</h5>
					<input class="search-field" type="text" name="bathrooms" value="<?php echo $row['bathrooms']; ?>"/>
				</div>
				<div class="col-md-4">
					<h5>Belcony:</h5>
					<input class="search-field" type="text" name="belcony" value="<?php echo $row['belcony']; ?>"/>
				</div>
			</div>
			<!-- Row / End -->
			
			<!-- Section -->
		<h3>Location</h3>
		<div class="submit-section">
			<!-- Row -->
			<div class="row with-forms">
				<!-- Address -->
				<div class="col-md-6">
					<h5>Address</h5>
					<input type="text" name="address" value="<?php echo $row['address']; ?>">
				</div>
				<!-- City -->
				<div class="col-md-6">
					<h5>City</h5>
					<input type="text" name="city" value="<?php echo $row['city']; ?>">
				</div>
				<!-- City -->
				<div class="col-md-6">
					<h5>Area</h5>
					<input type="text" name="area" value="<?php echo $row['area']; ?>">
				</div>
				<!-- Zip-Code -->
				<div class="col-md-6">
					<h5>Post Code</h5>
					<input type="text" name="post_code" value="<?php echo $row['post_code']; ?>">
				</div>
			</div>
			<!-- Row / End -->
		</div>
		<!-- Section / End -->
		
		<h3>Price</h3>
		<!-- Row -->
		<div class="submit-section">
			<div class="row with-forms">
				<!-- Price -->
				<div class="col-md-4">
					<h5>Price/Month</h5>
					<div class="select-input disabled-first-option">
						<input type="text" data-unit="BDT" name="price" value="<?php echo $row['price']; ?>">
					</div>
				</div>
			</div>
			<!-- Row / End -->
		</div>
		<!-- Section / End -->
		
		<!-- Section -->
		<h3>Detailed Information</h3>
		<div class="submit-section">
			<!-- Description -->
			<div class="form">
				<h5>Description</h5>
				<input type="text" name="description" value="<?php echo $row['description']; ?>">
			</div>
		</div>
		<!-- Section / End -->

		<!-- Submit / Start -->
		<div class="input-group">
			<button class="button preview margin-top-5" type="submit" name="edit_apartment" >Edit Apartment <i class="fa fa-arrow-circle-right"></i></button>
		</div>
		<!-- Submit / End -->

		</div>
		</form>
	</div>

</div>
</div>
</div>


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