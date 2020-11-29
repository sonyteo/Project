<?php
include('db.php');
?>
<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sign In - LetsGo</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

	<link rel="stylesheet" href="joinusnow/fonts/material-icon/css/material-design-iconic-font.min.css">
	<!-- Main css -->
	<link rel="stylesheet" href="joinusnow/css/style.css">
	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content="" />
	<meta property="og:image" content="" />
	<meta property="og:url" content="" />
	<meta property="og:site_name" content="" />
	<meta property="og:description" content="" />
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />
	<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Date Picker -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<div class="colorlib-loader"></div>
	<div id="page"></div>
	<nav class="colorlib-nav" role="navigation">
		<div class="top-menu">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-2">
						<div id="colorlib-logo"><a href="index.php"><img src="images/logoo.png" alt="logo" height="100" width="100" /></a></div>
					</div>
					<div class="col-xs-10 text-right menu-1">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="hotels.php">Hotels</a></li>
							<li class="active"><a href="join.php">Join Us</a></li>
							<li><a href="about.php">About</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</nav>
	<aside id="colorlib-hero">
		<div class="flexslider">
			<ul class="slides">
				<li style="background-image: url(images/cover-img-2.jpg);">
					<div class="overlay"></div>
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
								<div class="slider-text-inner text-center">
									<h1>Sign in</h1>
									<h2>Enjoy more benefits now!</h2>
								</div>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</aside>
	<div id="colorlib-blog">
		<section class="sign-in">
			<div class="container">
				<div class="signin-content">
					<?php
					if (!isset($_POST["signin"])) { ?>
						<div class="signin-image">
							<figure><img src="images/hotel.png" alt="sing up image"></figure>
							<a href="join.php" class="signup-image-link">Create an account</a>
						</div>
						<div class="signin-form">
							<h2 class="form-title">Sign in</h2>
							<form method="POST" class="register-form" id="login-form">
								<div class="form-group">
									<label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
									<input type="email" name="email" id="your_name" placeholder="Your Email" required />
								</div>
								<div class="form-group">
									<label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
									<input type="password" name="pass" id="your_pass" placeholder="Password" required />
								</div>
								<div class="form-group">
									<input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
									<label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
								</div>
								<div class="form-group form-button">
									<input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
								</div>
							</form>
						</div>
					<?php } else {
						$email = trim($_POST["email"]);
						$password = trim($_POST["pass"]);

						$sql = "SELECT * FROM users";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							$count = 0;
							while ($row = $result->fetch_assoc()) {
								if ($row['email'] == $email && password_verify($password, $row['PASSWORD'])) {
									$count++;
									$username = $row['username'];
									$userid = $row['user_id'];
								}
							}
							if ($count == 1) {
								echo "<div class='col-md-12 col-sm-12 animate-box signin-form' style='text-align:center;'><p style='margin-top:20px;'>Login completed! Please wait... </p></div>";
								$_SESSION["email"] = $email;
								$_SESSION["user"] = $username;
								$_SESSION["id"] = $userid;
								header("refresh:2;url=index.php");
							} else {
								echo "<div class='col-md-12 col-sm-12 animate-box signin-form' style='text-align:center;'><p style='margin-top:20px;'>No such username! Consider registering or try again! </p></div>";
								header("refresh:2;url=login.php");
							}
						}
					} ?>
				</div>
			</div>
		</section>
	</div>
	</div>
	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="js/bootstrap-datepicker.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>

	<!-- Main -->
	<script src="js/main.js"></script>
</body>

</html>