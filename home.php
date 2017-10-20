<?php
include "config.php";

require_once("./logout.php");
$webAccess = new WebAccess();
if(isset($_POST['logout']))
{
    $webAccess->logout();
}

if(isset($_SESSION['fb_access_token'])){
    $accessToken = $_SESSION['fb_access_token'];
    try {
        $response = $fb->get('/me?fields=id,name,first_name,last_name,email,link,gender,locale,picture', $accessToken);
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
      
    $user = $response->getGraphUser();
      
    $id = $user['id'];
    $name = $user['name'];
    $first_name = $user['first_name'];
    $last_name = $user['last_name'];
    $email = $user['email'];
    $link = $user['link'];
    $gender = $user['gender'];
    $locale = $user['locale'];
    $picture = $user['picture']['url'];
    $provider = 'facebook';
    $created = date("Y-m-d H:i:s");
    $modified = date("Y-m-d H:i:s");

    $stmt = $db->prepare("select * from users where oauth_uid=?");
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $datas = $stmt->fetch();
    if($datas['oauth_uid'] != $id){
        $stat = $db->prepare("insert into users values('',?,?,?,?,?,?,?,?,?,?,?)");
        $stat->bindParam(1, $provider);
        $stat->bindParam(2, $id);
        $stat->bindParam(3, $first_name);
        $stat->bindParam(4, $last_name);
        $stat->bindParam(5, $email);
        $stat->bindParam(6, $gender);
        $stat->bindParam(7, $locale);
        $stat->bindParam(8, $picture);
        $stat->bindParam(9, $link);
        $stat->bindParam(10, $created);
        $stat->bindParam(11, $modified);
        $stat->execute();
    } else{
        $stat = $db->prepare("update users set oauth_provider=?, first_name=?, last_name=?, email=?, gender=?, locale?, picture=?, link=?, modified=? where oauth_uid=?");
        $stat->bindParam(1, $provider);
        $stat->bindParam(2, $first_name);
        $stat->bindParam(3, $last_name);
        $stat->bindParam(4, $email);
        $stat->bindParam(5, $gender);
        $stat->bindParam(6, $locale);
        $stat->bindParam(7, $picture);
        $stat->bindParam(8, $link);
        $stat->bindParam(9, $modified);
        $stat->bindParam(10, $id);
        $stat->execute();
    }
    $stmt2 = $db->prepare("select * from users where oauth_uid=?");
    $stmt2->bindParam(1, $id);
    $stmt2->execute();
	$row2 = $stmt2->fetch();
} else{
    header('Location: index.php');
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
									<li class="current"><a href="home.php">Welcome</a></li>									
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

			<!-- Banner -->
				<div id="banner-wrapper">
					<div id="banner" class="box container">
						<div class="row">
							<div class="7u 12u(medium)">
							<img class="home-user-avatar" src="<?php echo $picture ?>" class="card-img-top"/>
								<p>Welcome <?php echo $row2['first_name'] ?></p>
								<p>to Kansas City Cars</p>
								<h3>Check our latest huge collection of used cars</h3>
							</div>
							<div class="5u 12u(medium)">
								<ul>
									<li><a href="./buycars.php" class="button big icon fa-arrow-circle-right">Buy Cars</a></li>
									<li><a href="#" class="button big icon fa-arrow-circle-right" style="background: #E91E63;">Sell Cars</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

			<!-- Features -->
				<div id="features-wrapper">
					<div class="container">
						<div class="row">
							<div class="4u 12u(medium)">
								<!-- Box -->
									<section class="box feature">
										<a href="singlecar.php" class="image featured"><img src="images/car1.png" alt="" /></a>
										<div class="inner">
											<header>
												<h2>Ford Ecosport</h2>
												<h3 class="cost">$3900</h3>
												<h4>Diesel, 32,000 Miles</h4>
											</header>
											<a href="singlecar.php" class="btn ">Buy</a>
										</div>
									</section>
							</div>
							<div class="4u 12u(medium)">
								<!-- Box -->
									<section class="box feature">
										<a href="singlecar.php" class="image featured"><img src="images/car1.png" alt="" /></a>
										<div class="inner">
											<header>
												<h2>Ford Ecosport</h2>
												<h3 class="cost">$3900</h3>
												<h4>Diesel, 32,000 Miles</h4>
											</header>
											<a href="singlecar.php" class="btn ">Buy</a>
										</div>
									</section>
							</div>
							<div class="4u 12u(medium)">
								<!-- Box -->
									<section class="box feature">
										<a href="singlecar.php" class="image featured"><img src="images/car1.png" alt="" /></a>
										<div class="inner">
											<header>
												<h2>Ford Ecosport</h2>
												<h3 class="cost">$3900</h3>
												<h4>Diesel, 32,000 Miles</h4>
											</header>
											<a href="singlecar.php" class="btn ">Buy</a>
										</div>
									</section>
							</div>

						</div>
					</div>
				</div>

			<!-- Main -->
				<div id="main-wrapper">
					<div class="container">
						<div class="row 200%">
							<div class="4u 12u(medium)">

								<!-- Sidebar -->
									<div id="sidebar">
										<section class="widget thumbnails">
											<!--<h3>Read more interesting stuff</h3>-->
											<div class="grid">
												<iframe width="300" height="180" src="https://www.youtube.com/embed/XoXHwhADS4k?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
											</div>
											<!--<a href="#" class="button icon fa-file-text-o">Read our blog</a>-->
										</section>
									</div>

							</div>
							<div class="8u 12u(medium) important(medium)">

								<!-- Content -->
									<div id="content">
										<section class="last">
											<!--<h2>So what's this all about?</h2>-->
											<h2>Audi A4 2016 review</h2>
											<p>An all-new Audi A4 is always big news, because the German executive saloon is a direct rival to the likes of the BMW 3 Series and Mercedes C-Class, two of the world's best cars. Now, it even has new competition from Britain and the Jaguar XE.</p>
											<a href="#" class="button icon fa-arrow-circle-right">Read our blog</a>
										</section>
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