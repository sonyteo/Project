<?php
include('db.php');

if (isset($_GET['hotel'])) {
	$hotel_name = $_GET['hotel'];
	$sql = "SELECT hotels.location_id, location.location, hotels.hotel_id, hotels.hotel_name 
	FROM hotels LEFT JOIN location ON location.location_id = hotels.location_id 
	WHERE hotels.hotel_name = '" . $hotel_name . "'";
	$result = $conn->query($sql);
	// echo $sql;
	while ($row = $result->fetch_assoc()) {
		$_SESSION["hotel_id"] = $row["hotel_id"];
	}
} else {
	header("refresh:0;url=hotels.php");
}

if (!isset($_POST["raterating"]) && !isset($_POST["rateremark"])) {
	//
} else {
	if (isset($_SESSION["id"])) {
		$rateuser = $_SESSION["id"];
	} else {
		$rateuser = $_POST["rateemail"];
	}
	$sql = "INSERT INTO rating (user_id, hotel_id, rate, review_title, review) 
	VALUES ('" . $rateuser . "', '" . $_SESSION["hotel_id"] . "', '" . $_POST["raterating"] . "', '" . $_POST["ratetitle"] . "', '" . $_POST["rateremark"] . "')";
	$conn->query($sql);
}

?>
<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Rooms - LetsGo</title>
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
	<style>
	</style>
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
								<li class="active"><a href="hotels.php"><?= _Hotels ?></a></li>
								<?php if (isset($_SESSION["user"])) {
									echo "<li><a href='profile.php'>" . _Profile . "</a></li>";
								} else {
									echo "<li><a href='join.php'>" . _JoinUs . "</a></li>";
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
					<li style="background-image: url(images/cover-img-4.jpg);">
						<div class="overlay"></div>
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
									<div class="slider-text-inner text-center">
										<h2>Let's Go</h2>
										<h1><?= _HotelOverview ?></h1>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</aside>
		<!-- Hotel Rooms -->
		<div class="colorlib-wrap">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="wrap-division">
							<div class="col-md-12 col-md-offset-0 heading2 animate-box">
								<h2><?= $hotel_name ?></h2>
								<div>
									<div class="star">
										<?php
										$star = "<span class='rate icon-star' style='font-size:20px;'></span>";
										$halfstar = "<span class='rate icon-star-half' style='font-size:20px;'></span>";
										$fullstar = "<span class='rate icon-star-full' style='font-size:20px;'></span>";

										$sql = "SELECT COUNT(rate), AVG(rate) FROM rating WHERE hotel_id='" . $_SESSION["hotel_id"] . "'";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											while ($row = $result->fetch_assoc()) {
												$min_stars = 1;
												$max_stars = 5;

												$average_stars = $row["AVG(rate)"];
												$temp_stars = $average_stars;

												for ($i = $min_stars; $i <= $max_stars; $i++) {
													if ($temp_stars >= 1) {
														echo $fullstar;
														$temp_stars--;
													} else {
														if ($temp_stars >= 0.5) {
															echo $halfstar;
															$temp_stars -= 0.5;
														} else {
															echo $star;
														}
													}
												}
											}
										} else {
											echo "<script>console.log('No');</script>";
										}
										?>
									</div>
								</div>
								<br />
								<p><?php
									$result = $conn->query("SELECT description FROM hotels WHERE hotel_name='" . $hotel_name . "'");
									$desc = $result->fetch_assoc();
									echo $desc["description"]; ?></p>
							</div>
							<div class="row">
								<?php
								$sql = "SELECT * from rooms ORDER BY price ASC";
								$result = $conn->query($sql);
								while ($row = $result->fetch_assoc()) {
								?>
									<div class="col-md-12 animate-box">
										<div class="room-wrap">
											<div class="row">
												<div class="col-md-6 col-sm-6">
													<div class="room-img" style="background-image: url(images/<?= $row["room_img"]; ?>);"></div>
												</div>
												<div class="col-md-6 col-sm-6">
													<div class="desc">
														<h2><?= $row["room_type"]; ?></h2>
														<p class="price"><span>RM<?= $row["price"]; ?></span> <small>/ <?= _night ?></small></p>
														<p><?= $row["description"]; ?></p>
														<p><a href="reserve.php?hotel=<?= $hotel_name; ?>&room=<?= $row["room_type"]; ?>" class="btn btn-primary"><?= _BookNow ?>!</a></p>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php } ?>
							</div>
							<div class="row">
								<div class="col-md-12 animate-box">
									<div class="panel panel-warning">
										<div class="panel-heading rating-title">
											<?= _RatingAnd . " " . _Reviews; ?>
										</div>
										<div class="panel-body">
											<div class="row">
												<div class="col-md-6">
													<div class="row">
														<?php
														$result = $conn->query("SELECT * FROM rating WHERE hotel_id = '" . $_SESSION["hotel_id"] . "'");

														if ($result->num_rows > 0) {
															$row = $result->fetch_assoc();

															$count = $conn->query("SELECT COUNT(rate) FROM rating WHERE hotel_id = '" . $_SESSION["hotel_id"] . "'");
															$count = $count->fetch_row();

															$ratingcount = 0;
															$total = 0;

															$result->data_seek(0);
															while ($row = $result->fetch_assoc()) {
																$ratingcount += $row['rate'];
															}
															$avgstars = round($ratingcount / $count[0], 1);
														?>
															<div class="col-md-12" align="center">
																<h2><span class="rating-title"><?= $avgstars; ?></span> <span class="icon-star-full" style="font-size:25px;"></span></h2>
																<h4><?= $count[0] . " " . _RatingAnd . " " . $count[0] . " " . _Reviews; ?></h4>
																<hr />
															</div>
														<?php } else { ?>
															<div class="col-md-12" align="center">
																<h2><span class="rating-title">0</span> <span class="icon-star-full" style="font-size:25px;"></span></h2>
																<h4><?= "0" . _RatingAnd . "0" . _Reviews; ?></h4>
																<hr />
															</div>
														<?php } ?>
														<div class="col-md-12">
															<form method="post" name="reviewform" id="review_form" class="review-form">
																<div class="row">
																	<div class="col-md-12 col-sm-12">
																		<h3 class="rating-title"><?= _WriteYourReview ?></h3>
																	</div>
																	<?php if (!isset($_SESSION["user"])) { ?>
																		<div class="col-md-12 col-sm-12">
																			<a href="login.php" style="display:grid;"><button class="btn btn-default btn-sm btn-info"><?= _SignInReview ?></button></a>
																		</div>
																		<hr />
																	<?php } else { ?>
																		<div class="col-md-12 col-sm-12">
																			<div id="rating_div">
																				<div class="star-rating">
																					<span class="rate icon-star" data-rating="1" style="font-size:25px;"></span>
																					<span class="rate icon-star" data-rating="2" style="font-size:25px;"></span>
																					<span class="rate icon-star" data-rating="3" style="font-size:25px;"></span>
																					<span class="rate icon-star" data-rating="4" style="font-size:25px;"></span>
																					<span class="rate icon-star" data-rating="5" style="font-size:25px;"></span>
																					<input type="hidden" name="raterating" class="rating-value" value="1">
																				</div>
																			</div>
																		</div>
																		<hr />
																		<div class="col-md-12 col-sm-12">
																			<br />
																			<input type="text" class="form-control" name="ratetitle" placeholder="Review Title" required /><br />
																			<textarea class="form-control" rows="5" placeholder="Write your review here..." name="rateremark" id="remark" required></textarea>
																			<p class="submitas"><?= _ReviewingAs; ?> <span class="rating-title"><?= $_SESSION["user"]; ?></span></p>
																			<p><button type="submit" name="ratesubmit" class="btn btn-default btn-sm btn-info" id="srr_rating"><?= _Submit ?></button></p>
																		</div>
																	<?php } ?>
																</div>
															</form>
														</div>
														<div class="col-md-12">
															<div class="row">
																<div class="reviewbox">
																	<div class="col-md-12 col-sm-12">
																		<h3 class="rating-title reviewtitle"><?= _ReviewSuccessful; ?></h3>
																	</div>
																	<div class="col-md-12 col-sm-12">
																		<p class="rating-title reviewmsg"><?= _ReviewSuccessfulmsg; ?></p>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="row">
														<div class="col-md-12">
															<h3 class="rating-title"><?= _CustomerReviews ?></h3>
															<?php
															$sql = "SELECT rating.*, users.user_id, users.username, hotels.hotel_name FROM rating 
															INNER JOIN users ON rating.user_id = users.user_id 
															INNER JOIN hotels ON rating.hotel_id = hotels.hotel_id 
															WHERE hotels.hotel_id='" . $_SESSION["hotel_id"] . "'";
															$result = $conn->query($sql);
															if (!empty($result) && $result->num_rows > 0) {
																while ($row = $result->fetch_assoc()) { ?>
																	<div class="row">
																		<div class="col-md-12">
																			<p class="rate-user"><?= $row["username"]; ?></p>
																			<h4 class="rating-title reviewhead">
																				<?= $row["rate"]; ?> <span class="icon-star-full" style="font-size:15px;"></span>
																				&nbsp;<?= $row["review_title"]; ?>
																			</h4>
																			<p class="ratingmsg"><?= $row["review"]; ?></p>
																			<hr>
																		</div>
																	</div>
																<?php }
															} else { ?>
																<div class="row">
																	<div class="col-md-12">
																		<h4 class="rating-title reviewhead" align="center">0 Result</h4>
																	</div>
																</div>
															<?php } ?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
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
										echo "<li><a href='?hotel=" . $hotel_name . "&lang=bm'>" . _Malay . "</a></li><br><li><a href='?hotel=" . $hotel_name . "&lang=cn'>" . _Chinese . "</a></li><br>";
									} elseif ($_SESSION["lang"] == "bm") {
										echo "<li><a href='?hotel=" . $hotel_name . "&lang=en'>" . _English . "</a></li><br><li><a href='?hotel=" . $hotel_name . "&lang=cn'>" . _Chinese . "</a></li><br>";
									} elseif ($_SESSION["lang"] == "cn") {
										echo "<li><a href='?hotel=" . $hotel_name . "&lang=en'>" . _English . "</a></li><br><li><a href='?hotel=" . $hotel_name . "&lang=bm'>" . _Malay . "</a></li><br>";
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
		// Review Form
		$('.review-form').on('submit', function(event) {
			event.preventDefault(); //prevent form from submitting
			var rating = $('.rating-value, #remark').val();
			if (rating == '') {
				$(".review-form").fadeOut(1000, function() {
					$(".reviewbox").fadeIn(1000, function() {})
					$(".reviewtitle").text("<?= _ReviewFailed ?>");
					$(".reviewmsg").text("<?= _ReviewFailedmsg ?>");
					setTimeout(location.reload.bind(location), 2000);
				})
			} else {
				$(".review-form").fadeOut(1000, function() {
					$(".reviewbox").fadeIn(1000, function() {})
					$.ajax({
						type: 'POST',
						url: 'rooms.php',
						data: $('#review_form').serialize(),
						success: function() {
							console.log("Review submitted!");
						},
						error: function() {
							console.log("Review not submitted!");
						}
					});
					setTimeout(location.reload.bind(location), 2000);
				});
			};
		});

		$(function() {
			var $star_rating = $('.star-rating .rate');
			$star_rating.mouseout(mouseOutFunction);

			function mouseOutFunction() {
				$star_rating.removeClass('icon-star-full').addClass("icon-star");
			}

			$star_rating.click(function(e) {
				$(this).prevAll().andSelf().addClass('rating-star-on').removeClass("icon-star");
				$(this).nextAll().removeClass('icon-star-full').addClass("icon-star");
				$star_rating.bind("mouseout", mouseOutFunction);
				$(this).unbind("mouseout");
				$(this).siblings('input.rating-value').val($(this).data('rating'));
			});

			$star_rating.mouseenter(function() {

				$(this).prevAll().andSelf().addClass('icon-star-full').removeClass("icon-star");
				$(this).nextAll().removeClass('icon-star-full').addClass("icon-star");
			});
		});
	</script>
</body>

</html>