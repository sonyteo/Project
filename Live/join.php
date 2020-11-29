<?php
include('db.php');
ob_start();
?>
<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Join Us - LetsGo</title>
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
									echo "<li class='active'><a href='profile.php'>" . _Profile . "</a></li>";
								} else {
									echo "<li class='active'><a href='join.php'>" . _JoinUs . "</a></li>";
								}
								?>
								<li><a href="about.php"><?= _About ?></a></li>
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

										<h1><?= _JoinUs ?></h1>
										<h2><?= _BecomeOurMember ?></h2>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</aside>
		<div id="colorlib-blog">
			<section class="signup">
				<div class="container">
					<div class="signup-content">
						<?php if (!isset($_POST["signup"])) { ?>
							<div class="signup-form">
								<h2 class="form-title"><?= _SignUp ?></h2>
								<form method="post" class="register-form" id="register-form">
									<div class="form-group">
										<label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
										<input type="text" name="name" id="name" placeholder="<?= _YourName ?>" required />
									</div>
									<div class="form-group">
										<label for="email"><i class="zmdi zmdi-email"></i></label>
										<input type="email" name="email" id="email" placeholder="<?= _YourEmail ?>" required />
									</div>
									<div class="form-group">
										<label for="pass"><i class="zmdi zmdi-lock"></i></label>
										<input type="password" name="pass" id="pass" class="required" placeholder="<?= _Password ?>" required />
									</div>
									<div class="form-group">
										<label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
										<input type="password" name="re_pass" id="re_pass" placeholder="<?= _RepeatYourPassword ?>" required />
									</div>
									<div id="pswd_info">
										<h5><strong><?= _PasswordMustMeetTheFollowingRequirements ?>:</strong></h5>
										<ul>
											<li id="letter" class="invalid"><?= _AtLeast ?> <strong><?= _OneLetter ?></strong></li>
											<li id="capital" class="invalid"><?= _AtLeast ?> <strong><?= _OneCapitalLetter ?></strong></li>
											<li id="number" class="invalid"><?= _AtLeast ?> <strong><?= _OneNumber ?></strong></li>
											<li id="length" class="invalid"><?= _AtLeast ?> <strong><?= _8Characters ?></strong></li>
										</ul>
									</div>
									<div class="form-group">
										<div class="passmsg" style="color:red;font-weight:bold;" hidden></div>
										<div class="termsmsg" style="color:red;font-weight:bold;" hidden></div>
										<input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
										<label for="agree-term" class="label-agree-term"><span><span></span></span><?= _IAgreeAllStatementsIn ?> <a href="terms.php" class="term-service"><?= _TermsOfService ?></a></label>
									</div>
									<div class="form-group form-button">
										<input type="submit" name="signup" id="signup" class="form-submit" value="<?= _Register ?>" />
									</div>
								</form>
							</div>
							<div class="signup-image">
								<figure><img src="joinusnow/images/hotel2.png" alt="sing up image" height="100" weight="100"></figure>
								<a href="login.php" class="signup-image-link"><?= _IAmAlreadyMember ?></a>
							</div>
						<?php } else {
							$email = trim($_POST["email"]);
							$password = trim($_POST["pass"]);
							$repassword = trim($_POST["re_pass"]);

							$sql = "SELECT * FROM users";
							$result = $conn->query($sql);
							if ($password != $repassword) {
								echo "<div class='col-md-12 col-sm-12 animate-box signup-form' style='text-align:center;'><p style='margin-top:20px;;'>Password doesn't match! Please enter the same password!</p></div>";
								header("refresh:2.5;url=join.php");
							} else {
								if ($result->num_rows > 0) {
									$count = 0;
									while ($row = $result->fetch_assoc()) {
										if ($row['email'] == $email) {
											$count++;
										}
									}
									if ($count == 1) {
										echo "<div class='col-md-12 col-sm-12 animate-box signup-form' style='text-align:center;'><p style='margin-top:20px;;'>Email already register! Please try login instead or register with a new email.</p></div>";
										header("refresh:2.5;url=join.php");
									} else {
										$sql = "INSERT INTO users (username, password, email) VALUES ('" . $email . "', '" . password_hash($password, PASSWORD_BCRYPT) . "', '" . $email . "')";
										if ($conn->query($sql) === TRUE) {
											echo "<div class='col-md-12 col-sm-12 animate-box signup-form' style='text-align:center;'><p style='margin-top:20px;;'>Sign Up Successfully! Please wait for redirection...</p></div>";
											header("refresh:2.5;url=login.php");
										} else {
											echo "<div class='col-md-12 col-sm-12 animate-box signup-form' style='text-align:center;'><p style='margin-top:20px;;'>Error registering! Please try again.</p></div>";
											header("refresh:2.5;url=join.php");
										}
									}
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
		$(document).ready(function() {
			$("#register-form").submit(function() {
				if ($('#pass').val() == $('#re_pass').val()) {
					$(".passmsg").hide();
				} else {
					$(".passmsg").show();
					$(".passmsg").text("* Password doesn\'t match!");
				}

				if ($('input:checkbox', this).length == $('input:checked', this).length) {
					$(".termsmsg").hide();
				} else {
					$(".termsmsg").show();
					$(".termsmsg").text("* Please agree to our terms!");
					return false;
				}
			});
			$('input[type="checkbox"]').click(function() {
				if ($(this).prop("checked") == true) {
					$(".termsmsg").hide();
				}
			});
			$('#pass, #re_pass').on('keyup', function() {
				if ($('#pass').val() == $('#re_pass').val()) {
					$(".passmsg").hide();
				} else {
					$(".passmsg").show();
					$(".passmsg").text("* Password doesn\'t match!");
				}
			});
		});

		$('input[type=password]').keyup(function() {
			var pswd = $(this).val();
			if (pswd.length < 8) {
				$('#length').removeClass('valid').addClass('invalid');
			} else {
				$('#length').removeClass('invalid').addClass('valid');
			}
			if (pswd.match(/[A-z]/)) {
				$('#letter').removeClass('invalid').addClass('valid');
			} else {
				$('#letter').removeClass('valid').addClass('invalid');
			}
			if (pswd.match(/[A-Z]/)) {
				$('#capital').removeClass('invalid').addClass('valid');
			} else {
				$('#capital').removeClass('valid').addClass('invalid');
			}
			if (pswd.match(/\d/)) {
				$('#number').removeClass('invalid').addClass('valid');
			} else {
				$('#number').removeClass('valid').addClass('invalid');
			}
		}).focus(function() {
			$('#pswd_info').show();
		}).blur(function() {
			$('#pswd_info').hide();
		});
	</script>
</body>

</html>
<?php ob_end_flush(); ?>