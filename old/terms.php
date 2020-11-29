<?php
include('db.php');
?>
<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Terms of Service - LetsGo</title>
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
								<li><a href="index.php">Home</a></li>
								<li><a href="hotels.php">Hotels</a></li>
								<?php if (isset($_SESSION["user"])) {
									echo "<li><a href='profile.php'>Profile</a></li>";
								} else {
									echo "<li><a href='join.php'>Join Us</a></li>";
								}
								?>
								<li class="active"><a href="about.php">About</a></li>
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
										<h1>Terms of Service</h1>
										<h2>for LetsGo.com</h2>
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
									<h2>Terms</h2>
									<ul>
										<li><a href="about.php#history">History</a></li>
										<li><a href="about.php#staff">Staff</a></li>
										<li><a href="#">Connect with us</a></li>
										<li><a href="#terms">Terms</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div id="terms" class="col-three-forth animate-box">
							<h1>Terms and Conditions of Use</h1>

							<h2>1. Terms</h2>

							<p>By accessing this Website, accessible from letsgo.com, you are agreeing to be bound by these Website Terms and Conditions of Use and agree that you are responsible for the agreement with any applicable local laws. If you disagree with any of these terms, you are prohibited from accessing this site. The materials contained in this Website are protected by copyright and trade mark law.</p>

							<h2>2. Use License</h2>

							<p>Permission is granted to temporarily download one copy of the materials on LetsGo's Website for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:</p>

							<ul>
								<li>modify or copy the materials;</li>
								<li>use the materials for any commercial purpose or for any public display;</li>
								<li>attempt to reverse engineer any software contained on LetsGo's Website;</li>
								<li>remove any copyright or other proprietary notations from the materials; or</li>
								<li>transferring the materials to another person or "mirror" the materials on any other server.</li>
							</ul>

							<p>This will let LetsGo to terminate upon violations of any of these restrictions. Upon termination, your viewing right will also be terminated and you should destroy any downloaded materials in your possession whether it is printed or electronic format. These Terms of Service has been created with the help of the <a href="https://www.termsofservicegenerator.net">Terms Of Service Generator</a> and the <a href="https://www.generateprivacypolicy.com">Privacy Policy Generator</a>.</p>

							<h2>3. Disclaimer</h2>

							<p>All the materials on LetsGo’s Website are provided "as is". LetsGo makes no warranties, may it be expressed or implied, therefore negates all other warranties. Furthermore, LetsGo does not make any representations concerning the accuracy or reliability of the use of the materials on its Website or otherwise relating to such materials or any sites linked to this Website.</p>

							<h2>4. Limitations</h2>

							<p>LetsGo or its suppliers will not be hold accountable for any damages that will arise with the use or inability to use the materials on LetsGo’s Website, even if LetsGo or an authorize representative of this Website has been notified, orally or written, of the possibility of such damage. Some jurisdiction does not allow limitations on implied warranties or limitations of liability for incidental damages, these limitations may not apply to you.</p>

							<h2>5. Revisions and Errata</h2>

							<p>The materials appearing on LetsGo’s Website may include technical, typographical, or photographic errors. LetsGo will not promise that any of the materials in this Website are accurate, complete, or current. LetsGo may change the materials contained on its Website at any time without notice. LetsGo does not make any commitment to update the materials.</p>

							<h2>6. Links</h2>

							<p>LetsGo has not reviewed all of the sites linked to its Website and is not responsible for the contents of any such linked site. The presence of any link does not imply endorsement by LetsGo of the site. The use of any linked website is at the user’s own risk.</p>

							<h2>7. Site Terms of Use Modifications</h2>

							<p>LetsGo may revise these Terms of Use for its Website at any time without prior notice. By using this Website, you are agreeing to be bound by the current version of these Terms and Conditions of Use.</p>

							<h2>8. Your Privacy</h2>

							<p>Please read our Privacy Policy.</p>

							<h2>9. Governing Law</h2>

							<p>Any claim related to LetsGo's Website shall be governed by the laws of my without regards to its conflict of law provisions.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="colorlib-subscribe" style="background-image: url(images/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<h2>Sign Up for a Newsletter</h2>
						<p>Sign up for our mailing list to get latest updates and offers.</p>
						<form method="post" class="form-inline qbstp-header-subscribe">
							<div class="row">
								<div class="col-md-12 col-md-offset-0">
									<div class="form-group">
										<input type="text" class="form-control" id="email" name="email" placeholder="Enter your email">
										<button id="btnSubmit" type="submit" class="btn btn-primary">Subscribe</button>
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
						<h4>Let's Go Agency</h4>
						<p>To provide genuine heartfelt hospitality, that will engrave a unique experience in the heart and mind of every guest.</p>
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
						<h4>Contact Information</h4>
						<ul class="colorlib-footer-links">
							<li>291, 21th Street, <br> Kuala Lumpur, Malaysia</li>
							<li><a href="tel://072075413">+072075413</a></li>
							<li><a href="mailto:letsgo@travel.com">letsgo@travel.com</a></li>
							<li><a href="#">letsgo.com</a></li>
						</ul>
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
		$('#btnSubmit').click(function() {
			var emailval = $('input#email').val();
			if (emailval !== "") {
				$.ajax({
					url: 'send_email.php',
					type: 'POST',
					dataType: 'json',
					data: {
						email: emailval
					},
					success: function(msg) {
						alert('Successfull subscribed!');
					}
				});
			} else {
				alert('Please insert your email!');
			}
		});
	</script>
	<?php
	if (isset($_POST["email"])) {
		$email = trim($_POST["email"]);
		if (($email !== "") && (filter_var($email, FILTER_VALIDATE_EMAIL))) {
			$sql = "INSERT INTO subscribe (sub_email) VALUES ('" . $_POST["email"] . "')";
			$conn->query($sql);
		}
	}
	?>
</body>

</html>