<?php include('server.php') ?>

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
					<a href="login-register.php" class="sign-in"><i class="fa fa-user"></i> Log In / Register</a>
				</div>
				<!-- Header Widget / End -->
			</div>
			<!-- Right Side Content / End -->

		</div>
	</div>
	<!-- Header / End -->

</header>

<!-- Container -->
<div class="container">

	<div class="row">
	<div class="col-md-4 col-md-offset-4">
	<!--Tab -->
	<div class="my-account style-1 margin-top-5 margin-bottom-40">

		<ul class="tabs-nav">
			<li class=""><a href="#tab1">Log In</a></li>
			<li><a href="#tab2">Register</a></li>
		</ul>

		<div class="tabs-container alt">

			<!-- Login -->
			<div class="tab-content" id="tab1" style="display: none;">
				<form method="post" action="login-register.php" class="login">
				  	<?php include('errors.php'); ?>

					<p class="form-row form-row-wide">
						<label for="username">Username:
							<i class="im im-icon-Male"></i>
							<input type="text" class="input-text" name="username" id="username" />
						</label>
					</p>

					<p class="form-row form-row-wide">
						<label for="password">Password:
							<i class="im im-icon-Lock-2"></i>
							<input class="input-text" type="password" name="password" id="password" />
						</label>
					</p>

					<p class="form-row">
						<input type="submit" class="button border margin-top-10" name="login_user" value="Login" />

						<label for="rememberme" class="rememberme">
						<input name="rememberme" type="checkbox" id="rememberme" value="forever" /> Remember Me</label>
					</p>

					<p class="lost_password">
						<a href="#" >Lost Your Password?</a>
					</p>
					
				</form>
			</div>

			<!-- Register -->
			<div class="tab-content" id="tab2" style="display: none;">

				<form method="post" action="login-re" class="register">
				  	<?php include('errors.php'); ?>
					
				<p class="form-row form-row-wide">
					<label for="username2">Username:
						<i class="im im-icon-Male"></i>
						<input type="text" class="input-text" name="username" id="username2" value="<?php echo $username; ?>" />
					</label>
				</p>
					
				<p class="form-row form-row-wide">
					<label for="email2">Valid Email:
						<i class="im im-icon-Mail"></i>
						<input type="text" class="input-text" name="email" id="email2" value="<?php echo $email; ?>" />
					</label>
				</p>
					
				<p class="form-row form-row-wide">
					<label for="email2">Full Name:
						<i class="im im-icon-Mail"></i>
						<input type="text" class="input-text" name="full_name" id="full_name" value="<?php echo $full_name; ?>" />
					</label>
				</p>
					
				<p class="form-row form-row-wide">
					<label for="email2">Phone:
						<i class="im im-icon-Mail"></i>
						<input type="text" class="input-text" name="phone" id="phone" value="<?php echo $phone; ?>" />
					</label>
				</p>

				<p class="form-row form-row-wide">
					<label for="password1">Password:
						<i class="im im-icon-Lock-2"></i>
						<input class="input-text" type="password" name="password_1" id="password_1"/>
					</label>
				</p>

				<p class="form-row form-row-wide">
					<label for="password2">Repeat Password:
						<i class="im im-icon-Lock-2"></i>
						<input class="input-text" type="password" name="password_2" id="password_2"/>
					</label>
				</p>

				<p class="form-row">
					<input type="submit" class="button border fw margin-top-10" name="reg_user" value="Register" />
				</p>

				</form>
			</div>

		</div>
	</div>



	</div>
	</div>

</div>
<!-- Container / End -->




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