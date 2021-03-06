<?php
include('db.php');

if (!isset($_POST["email"])) {
	$_POST["email"] = "";
} else {
	$email = $_POST["email"];
	if (!empty($email) && $email !== "") {
		$sql = "INSERT INTO subscribe (sub_email) VALUES ('" . $email . "')";
		$conn->query($sql);
	}
}
?>
<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>About Us - LetsGo</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

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
	<link rel="stylesheet" href="css/custom.css">

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

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-2">
							<div id="colorlib-logo"><a href="index.php"><img src="images/logoo.png" alt="logo" height="100" width="100" /></a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li><a href="index.php"><?= _Home ?></a></li>
								<li><a href="hotels.php"><?= _Hotels ?></a></li>
								<?php if (isset($_SESSION["user"])) {
									echo "<li><a href='profile.php'>" . _Profile . "</a></li>";
								} else {
									echo "<li><a href='join.php'>" . _JoinUs . "</a></li>";
								}
								?>
								<li class="active"><a href="about.php"><?= _About ?></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
					<li style="background-image: url(images/cover-img-5.jpg);">
						<div class="overlay"></div>
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
									<div class="slider-text-inner text-center">
										<h2><?= _ByLetsGocom ?></h2>
										<h1><?= _AboutUs ?></h1>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</aside>

		<div id="colorlib-about">
			<div class="container">
				<div class="row">
					<div class="about-flex">
						<div class="col-one-forth aside-stretch animate-box">
							<div class="row">
								<div class="col-md-12 about">
									<h2><?= _About ?></h2>
									<ul>
										<li><a href="#history"><?= _History ?></a></li>
										<li><a href="#staff"><?= _Staff ?></a></li>
										<li><a href="terms.php#terms"><?= _Terms ?></a></li>
									</ul>
								</div>
							</div>
						</div>
						<div id="history" class="col-three-forth animate-box">
							<h2><?= _History ?></h2>
							<div class="row">
								<div class="col-md-12">
									<p><?= _D1 ?></p>

									<p><?= _D2 ?></p>

									<p><?= _D3 ?></p>

									<div class="row row-pb-sm">
										<div class="col-md-6">
											<img class="img-responsive" src="images/hotel-7.jpg" alt="">
										</div>
										<div class="col-md-6">
											<p><?= _D4 ?></p>
											<p><?= _D5 ?></p>
										</div>
									</div>


									<p><?= _D6 ?></p>

									<p><?= _D7 ?></p>

									<p><?= _D8 ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="colorlib-testimony" class="colorlib-light-grey">
			<div id="staff" class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<h2><?= _OurStaffs ?></h2>
						<p><?= _MeetOurLovelyMembers ?>!</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8 col-md-offset-2 animate-box">
						<div class="owl-carousel2">
							<div class="item">
								<div class="testimony text-center">
									<span class="img-user" style="background-image: url(images/kliang.jpg);"></span>
									<span class="user">Lim Kai Liang</span>
									<small>Selangor, Malaysia</small>
									<blockquote>
										<p><?= _FrontEndDeveloper ?><ul class="colorlib-social-icons">
												<li class="code-icon1"><img src="images/html.png" /></li>
												<li class="code-icon1"><img src="images/css.png" /></li>
												<li class="code-icon1"><img src="images/js.png" /></li>
											</ul>
										</p>
									</blockquote>
								</div>
							</div>
							<div class="item">
								<div class="testimony text-center">
									<span class="img-user" style="background-image: url(images/yh.jpg);"></span>
									<span class="user">Tam Yu Heng</span>
									<small>Johor, Malaysia</small>
									<blockquote>
										<p><?= _ReportWriter ?><ul class="colorlib-social-icons">
												<li class="code-icon2"><img src="images/report.png" /></li>
											</ul>
										</p>
									</blockquote>
								</div>
							</div>
							<div class="item">
								<div class="testimony text-center">
									<span class="img-user" style="background-image: url(images/kelly.jpg);"></span>
									<span class="user">Yew Kai Li</span>
									<small>Johor, Malaysia</small>
									<blockquote>
										<p><?= _ReportWriter ?><ul class="colorlib-social-icons">
												<li class="code-icon2"><img src="images/report.png" /></li>
											</ul>
										</p>
									</blockquote>
								</div>
							</div>
							<div class="item">
								<div class="testimony text-center">
									<span class="img-user" style="background-image: url(images/darren.jpg);"></span>
									<span class="user">Darren Teo</span>
									<small>Johor, Malaysia</small>
									<blockquote>
										<p><?= _BackEndDeveloper ?><ul class="colorlib-social-icons">
												<li class="code-icon"><img src="images/php.png" /></li>
												<li class="code-icon"><img src="images/phpmyadmin.png" /></li>
											</ul>
										</p>
									</blockquote>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="colorlib-subscribe" style="background-image: url(images/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box form_box">
						<h2 class="signuptitle"><?= _SignUpForALetter ?></h2>
						<p class="signupmsg"><?= _SignUpForOurMailingListToGetLatestUpdatesAndOffers ?></p>
						<form method="post" id="sub_form" class="form-inline qbstp-header-subscribe">
							<div class="row">
								<div class="col-md-12 col-md-offset-0">
									<div class="form-group">
										<input type="email" class="form-control" name="email" id="email" placeholder="<?= _EnterEmail ?>">
										<button id="btnSubmit" name="subscribe" type="submit" class="btn btn-primary"><?= _Subscribe ?></button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<footer id="colorlib-footer" role="contentinfo">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-3 colorlib-widget">
						<h4><?= _LetsGoAgenecy ?></h4>
						<p><?= _S1 ?></p>
						<p>
							<ul class="colorlib-social-icons">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-dribbble"></i></a></li>
							</ul>
						</p>
					</div>
					<div class="col-md-3 col-md-push-1">
						<h4><?= _ContactInformation ?></h4>
						<ul class="colorlib-footer-links">
							<li>291, 21th Street, <br> Kuala Lumpur, Malaysia</li>
							<li><a href="tel://072075413">+072075413</a></li>
							<li><a href="mailto:letsgo@travel.com">letsgo@travel.com</a></li>
							<li><a href="#">letsgo.com</a></li>
						</ul>
					</div>
					<div class="col-md-3 col-md-push-3">
						<div class="dropdown">
							<a class="dropdown-toggle" href="#" role="button" id="languageSelect" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<label><i class="icon-earth"></i>
									<?php
									switch ($_SESSION["lang"]) {
										case "en":
											echo _English;
											break;
										case "bm":
											echo _Malay;
											break;
										case "cn":
											echo _Chinese;
											break;
										default:
											echo _English;
											break;
									}
									?></label>
							</a>
							<div class="dropdown-menu langSelect" aria-labelledby="languageSelect">
								<ul>
									<?php
									if ($_SESSION["lang"] == "en") {
										echo "<li><a href='?lang=bm'>" . _Malay . "</a></li><br><li><a href='?lang=cn'>" . _Chinese . "</a></li><br>";
									} elseif ($_SESSION["lang"] == "bm") {
										echo "<li><a href='?lang=en'>" . _English . "</a></li><br><li><a href='?lang=cn'>" . _Chinese . "</a></li><br>";
									} elseif ($_SESSION["lang"] == "cn") {
										echo "<li><a href='?lang=en'>" . _English . "</a></li><br><li><a href='?lang=bm'>" . _Malay . "</a></li><br>";
									}
									?>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 text-center">
						<p>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;<script>
								document.write(new Date().getFullYear());
							</script> All rights reserved | Let's Go
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>

						</p>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
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
	<script>
		$('.qbstp-header-subscribe').on('submit', function(event) {
			event.preventDefault(); //prevent form from submitting
			var email = $.trim($("input[type=email][name=email]").val());
			if (email == '') {
				$(".signuptitle").text("<?= _SignUpFailed ?>").fadeIn(2000, function() {
					$("p, .signupmsg").text("<?= _SignUpFailedmsg ?>").fadeIn(2000, function() {})
					$("#sub_form").fadeOut(2000, function() {})
					setTimeout(location.reload.bind(location), 2500);
				})
			} else {
				$(".signuptitle").text("<?= _SignUpSuccess ?>").fadeIn(2000, function() {
					$("p, #sub_form").fadeOut(2000, function() {})
					$.ajax({
						type: 'POST',
						url: 'about.php',
						data: $('#sub_form').serialize(),
						success: function() {
							console.log("Signup was successful");
						},
						error: function() {
							console.log("Signup was unsuccessful");
						}
					});
					setTimeout(location.reload.bind(location), 2500);
				});
			};
		});
	</script>
</body>

</html>