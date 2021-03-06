<?php 
	include "config.php";
	if(!isset($_SESSION['fb_access_token'])){
		header('Location: index.php');
	}	
	require_once("./logout.php");
	$webAccess = new WebAccess();
	if(isset($_POST['logout']))
	{
		$webAccess->logout();
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>KCEasyCasrs</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/style.css" />

		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="left-sidebar">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<header id="header" class="container">

						<!-- Logo -->
							<div id="logo">
								<h1><a href="home.php">KCEasyCasrs</a></h1>
								<span>Grab your car</span>
							</div>

						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li><a href="home.php">Welcome</a></li>									
									<li><a href="#">Guidelines</a></li>
									<li>
										<form action="" method="post">
											<button type="submit" name="logout" class="logout" >Logout</button>
										</form >
									</li>									
								</ul>
							</nav>

					</header>
				</div>

			<!-- Main -->
				<div id="main-wrapper">
					<div class="container">
						<div class="row 200%">
							<div class="4u 12u$(medium)">
								<div id="sidebar">

									<!-- Sidebar -->
										<section>
											<img src="images/car1.png" alt="" />
											<h2 style="text-align:center;">3900$</h2>
											<footer>
												<a href="#" style=" width: 100%; text-align: center; " class="button icon fa-info-circle">Contact Seller</a>
											</footer>
										</section>

										<section>
											<h3>Related Cars</h3>
											<ul class="style2">
												<li><a href="#">Audi A4 2017</a></li>
												<li><a href="#">Volvo V40 Cross</a></li>
												<li><a href="#">Suzuki Jimny</a></li>
												<li><a href="#">Honda Jazz</a></li>
												<li><a href="#">Mercedes E-Class Estate AMG Line</a></li>
											</ul>
										</section>

								</div>
							</div>
							<div class="8u 12u$(medium) important(medium)">
								<div id="content">

									<!-- Content -->
										<article>

											<h2>Ford Ecosport</h2>

											<p>The Ford EcoSport honestly seems have delivered its value for money. It comes with many perks which include a nippy display screen indicating the distance as the car reverses. The comfort level for four passengers is excellent, the pickup and low-end pull is amazing.</p>

											<h3>Specifications</h3>
											<p><strong>Mileage (ARAI) kmpl </strong>22.77 kmpl</p>
											<p><strong>Mileage (City) kmpl	</strong>19.3 kmpl</p>
											<p><strong>Fuel Type	</strong>Diesel</p>
											<p><strong>Engine Displacement	</strong>1498 cc</p>
											<p><strong>BHP </strong>98.59bhp@3750rpm</p>
											<p><strong>Torque </strong>205Nm@1750-3250rpm</p>
											<p></p>

										</article>

								</div>
							</div>
						</div>
					</div>
				</div>

			<!-- Footer -->
				<div id="footer-wrapper">
					<footer id="footer" class="container">
						<div class="row">
							<div class="3u 6u(medium) 12u$(small)">

								<!-- Links -->
									<section class="widget links">
										<h3>Help</h3>
										<ul class="style2">
											<li><a href="#">How it Works</a></li>
											<li><a href="#">Sitemap</a></li>
											<li><a href="#">Faq</a></li>
											<li><a href="#">Feedback</a></li>
											<li><a href="#">Contact</a></li>
										</ul>
									</section>

							</div>
							<div class="3u 6u$(medium) 12u$(small)">

								<!-- Links -->
									<section class="widget links">
										<h3>Information</h3>
										<ul class="style2">
											<li><a href="#">Locations Map</a></li>
											<li><a href="#">Terms of Use</a></li>
											<li><a href="#">Popular searches</a></li>
											<li><a href="#">Privacy Policy</a></li>
										</ul>
									</section>

							</div>
							<div class="3u 6u(medium) 12u$(small)">

								<!-- Links -->
									<section class="widget links">
										<h3>From our blog</h3>
										<ul class="style2">
											<li><a href="#">Audi A4 2016 review</a></li>
											<li><a href="#">2017 Volvo V40 Cross review </a></li>
											<li><a href="#">2017 Suzuki Jimny review</a></li>
											<li><a href="#">2017 Honda Jazz Review</a></li>
											<li><a href="#">2017 Mercedes E-Class Estate AMG Line Review</a></li>
										</ul>
									</section>

							</div>
							<div class="3u 6u$(medium) 12u$(small)">

								<!-- Contact -->
									<section class="widget contact last">
										<h3>Contact Us</h3>
										<ul>
											<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
											<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
											<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
											<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
											<li><a href="#" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li>
										</ul>
										<p>KCEasyCars<br />
										My Address<br />
										324234234234234</p>
									</section>

							</div>
						</div>
						<div class="row">
							<div class="12u">
								<div id="copyright">
									<ul class="menu">
										<li>KCEasyCars</li><li>Grab your car</li>
									</ul>
								</div>
							</div>
						</div>
					</footer>
				</div>

			</div>

		<!-- Scripts -->

			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>