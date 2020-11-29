<?php
include('db.php');
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home - LetsGo</title>
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
    <style>
        #colorlib-reservation .search-wrap {
            margin-top: 0em !important;
        }
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
                            <div id="colorlib-logo">
                                <a href="index.php"><img src="images/logoo.png" alt="logo" height="100" width="100" /></a>
                            </div>
                        </div>
                        <div class="col-xs-10 text-right menu-1">
                            <ul>
                                <li class="active"><a href="index.php">Home</a></li>
                                <li><a href="hotels.php">Hotels</a></li>
                                <?php if (isset($_SESSION["user"])) {
                                    echo "<li><a href='profile.php'>Profile</a></li>";
                                } else {
                                    echo "<li><a href='join.php'>Join Us</a></li>";
                                }
                                ?>
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
                    <li style="background-image: url(images/img_bg_1.jpg);">
                        <div class="overlay"></div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                                    <div class="slider-text-inner text-center">
                                        <h2>Take memories</h2>
                                        <h1>Leave footprints</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li style="background-image: url(images/img_bg_2.jpg);">
                        <div class="overlay"></div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                                    <div class="slider-text-inner text-center">
                                        <h2>Always say</h2>
                                        <h1> YES to new adventure</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li style="background-image: url(images/img_bg_5.jpg);">
                        <div class="overlay"></div>
                        <div class="container-fluids">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                                    <div class="slider-text-inner text-center">
                                        <h2>Explore our most tavel agency</h2>
                                        <h1>Let's Go</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li style="background-image: url(images/img_bg_4.jpg);">
                        <div class="overlay"></div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                                    <div class="slider-text-inner text-center">
                                        <h2>Experience the</h2>
                                        <h1>Best Trip Ever</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </aside>
        <div id="colorlib-reservation">
            <div class="row">
                <div class="search-wrap">
                    <div class="tab-content">
                        <div id="flight" class="tab-pane fade in active">
                            <form method="get" class="colorlib-form" action="hotels.php">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="date">Where:</label>
                                            <div class="form-field">
                                                <input type="hidden" placeholder="Search Location" />
                                                <select id="location" class="form-control" name="location">
                                                    <option>Cameron Highlands</option>
                                                    <option>Kuala Lumpur</option>
                                                    <option>Kuantan</option>
                                                    <option>Malacca</option>
                                                    <option>Penang</option>
                                                    <option>Perlis</option>
                                                    <option>Port Dickson</option>
                                                    <option>Sarawak</option>
                                                    <option>Seremban</option>
                                                    <option>Tioman Island</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="date">Check-in:</label>
                                            <div class="form-field">
                                                <i class="icon icon-calendar2"></i>
                                                <input type="text" id="date" class="form-control date" placeholder="Check-in date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="date">Check-out:</label>
                                            <div class="form-field">
                                                <i class="icon icon-calendar2"></i>
                                                <input type="text" id="date" class="form-control date" placeholder="Check-out date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="guests">Guest</label>
                                            <div class="form-field">
                                                <i class="icon icon-arrow-down3"></i>
                                                <select id="people" class="form-control">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5+</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" id="submit" class="btn btn-primary btn-block">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="colorlib-tour colorlib-light-grey">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
                    <h2>Popular Destination</h2>
                    <p>My new routine: Journey. Explore. Discover. Repeat. </p>
                </div>
            </div>
        </div>
        <div class="tour-wrap">
            <a href="hotels.php?location=Kuala Lumpur" class="tour-entry animate-box">
                <div class="tour-img" style="background-image: url(images/kl.jpg);">
                </div>
                <span class="desc">
                    <p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
                    <h2>Kuala Lumpur</h2>
                    <span class="city">Malaysia</span>
                    <span class="price">RM276</span>
                </span>
            </a>
            <a href="hotels.php?location=Penang" class="tour-entry animate-box">
                <div class="tour-img" style="background-image: url(images/penang.jpg);">
                </div>
                <span class="desc">
                    <p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
                    <h2>Penang</h2>
                    <span class="city">Malaysia</span>
                    <span class="price">RM413</span>
                </span>
            </a>
            <a href="hotels.php?location=Malacca" class="tour-entry animate-box">
                <div class="tour-img" style="background-image: url(images/malacca.jpg);">
                </div>
                <span class="desc">
                    <p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
                    <h2>Malacca</h2>
                    <span class="city">Malaysia</span>
                    <span class="price">RM173</span>
                </span>
            </a>
            <a href="hotels.php?location=Seremban" class="tour-entry animate-box">
                <div class="tour-img" style="background-image: url(images/seremban.jpg);">
                </div>
                <span class="desc">
                    <p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
                    <h2>Seremban</h2>
                    <span class="city">Malaysia</span>
                    <span class="price">RM161</span>
                </span>
            </a>
            <a href="hotels.php?location=Kuantan" class="tour-entry animate-box">
                <div class="tour-img" style="background-image: url(images/kuantan.jpg);">
                </div>
                <span class="desc">
                    <p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
                    <h2>Kuantan</h2>
                    <span class="city">Malaysia</span>
                    <span class="price">RM181</span>
                </span>
            </a>
            <a href="hotels.php?location=Cameron Highlands" class="tour-entry animate-box">
                <div class="tour-img" style="background-image: url(images/Cameron.jpg);">
                </div>
                <span class="desc">
                    <p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
                    <h2>Cameron Highlands</h2>
                    <span class="city">Malaysia</span>
                    <span class="price">RM137</span>
                </span>
            </a>
            <a href="hotels.php?location=Perlis" class="tour-entry animate-box">
                <div class="tour-img" style="background-image: url(images/perlis.jpg);">
                </div>
                <span class="desc">
                    <p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
                    <h2>Perlis</h2>
                    <span class="city">Malaysia</span>
                    <span class="price">RM126</span>
                </span>
            </a>
            <a href="hotels.php?location=Port Dickson" class="tour-entry animate-box">
                <div class="tour-img" style="background-image: url(images/pd.jpg);">
                </div>
                <span class="desc">
                    <p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
                    <h2>Port Dickson</h2>
                    <span class="city">Malaysia</span>
                    <span class="price">RM648</span>
                </span>
            </a>
        </div>
    </div>
    <div id="colorlib-hotel">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
                    <h2>Recommended Hotels</h2>
                    <p>When I'm exploring the world is when I feel most at home</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 animate-box">
                    <div class="owl-carousel">
                        <?php
                        $sql = "SELECT * FROM hotels LIMIT 4";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <div class="item">
                                <div class="hotel-entry">
                                    <a href="rooms.php?hotel=<?= $row["hotel_name"] ?>" class="hotel-img" style="background-image: url(images/<?= $row["hotel_img"]; ?>);">
                                        <p class="price"><span>RM<?= $row["price"]; ?></span><small> /night</small></p>
                                    </a>
                                    <div class="desc">
                                        <p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
                                        <h3><a href="rooms.php?hotel=<?= $row["hotel_name"] ?>"><?= $row["hotel_name"]; ?></a></h3>
                                        <span class="place"><?= $row["location"]; ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="colorlib-testimony" class="colorlib-light-grey">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
                    <h2>Our Satisfied Guests says</h2>
                    <p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2 animate-box">
                    <div class="owl-carousel2">
                        <div class="item">
                            <div class="testimony text-center">
                                <span class="img-user" style="background-image: url(images/person1.jpg);"></span>
                                <span class="user">Alysha Myers</span>
                                <small>Miami Florida, USA</small>
                                <blockquote>
                                    <p>" A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                                </blockquote>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony text-center">
                                <span class="img-user" style="background-image: url(images/person2.jpg);"></span>
                                <span class="user">James Fisher</span>
                                <small>New York, USA</small>
                                <blockquote>
                                    <p>One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                                </blockquote>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony text-center">
                                <span class="img-user" style="background-image: url(images/person3.jpg);"></span>
                                <span class="user">Jacob Webb</span>
                                <small>Athens, Greece</small>
                                <blockquote>
                                    <p>Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
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
                <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
                    <h2>Sign Up for a Newsletter</h2>
                    <p>Sign up for our mailing list to get latest updates and offers.</p>
                    <form method="post" class="form-inline qbstp-header-subscribe">
                        <div class="row">
                            <div class="col-md-12 col-md-offset-0">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter your email">
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
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | Let's Go
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </span>

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