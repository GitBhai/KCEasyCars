<?php
include "config.php";
?>
<?php 
	$helper = $fb->getRedirectLoginHelper();
	$permissions = ['email']; // Optional permissions
	$loginUrl = $helper->getLoginUrl('http://localhost/KCEasyCars/fb-callback.php', $permissions);
	if(isset($_SESSION['fb_access_token'])){
		header('Location: home.php');
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
	<body class="homepage">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<header id="header" class="container">

						<!-- Logo -->
							<div id="logo">
								<h1><a href="index.php">KCEasyCasrs</a></h1>
								<span>Grab your car</span>
							</div>

						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li><a href="register.php">Register</a></li>
									<li><a href="#">Guidelines</a></li>
								</ul>
							</nav>

					</header>
				</div>

			<!-- Banner -->
				<div id="banner-wrapper">
					<div id="banner" class="box container">
						<div class="row">
							<div class="7u 12u(medium)">
								<h2>Welcome to Kansas City Cars</h2>
								<p>Check our latest huge collection of used cars</p>
							</div>
							<div class="5u 12u(medium)">
								<form style="margin-bottom: 1em;">
									<fieldset>
										<label>
											Enter username
										</label>
										<input type="text" style=" border-color: #0090c5; " placeholder="Enter your username">
									</fieldset>
									<fieldset>
										<label>
											Enter password
										</label>
										<input type="password" style=" border-color: #0090c5; " placeholder="Enter your password">
									</fieldset>
								</form>
								<a href="#" class="btn" style="background: #E91E63;width: 100%;">Login</a>
								<br>
								<a href="<?php echo $loginUrl ?>" class="btn" style="background:#4267b2;width:100%;margin-top: 0.5em;">Login with Facebook</a>
							</div>
						</div>
					</div>
				</div>

						<!-- Footer -->
				<div id="footer-wrapper">
					<footer id="footer" class="container">
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