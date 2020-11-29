<?php
include('db.php');
// ob_start();

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
                            <div id="colorlib-logo">
                                <a href="index.php"><img src="images/logoo.png" alt="logo" height="100" width="100" /></a>
                            </div>
                        </div>
                        <div class="col-xs-10 text-right menu-1">
                            <ul>
                                <li class="active"><a href="index.php"><?= _Home ?></a></li>
                                <li><a href="hotels.php"><?= _Hotels ?></a></li>
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
                    <li style="background-image: url(images/img_bg_1.jpg);">
                        <div class="overlay"></div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                                    <div class="slider-text-inner text-center">
                                        <h2><?= _TakeMemories ?></h2>
                                        <h1><?= _LeaveFootPrints ?></h1>
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
                                        <h2><?= _AlwaysSay ?></h2>
                                        <h1><?= _YestoNewAdv ?></h1>
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
                                        <h2><?= _ExploreOurTA ?></h2>
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
                                        <h2><?= _ExperienceThe ?></h2>
                                        <h1><?= _BestTripEver ?></h1>
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
                                            <label for="date"><?= _Where ?>:</label>
                                            <div class="form-field">
                                                <input type="hidden" placeholder="Search Location" />
                                                <select id="location" class="form-control" name="location">
                                                    <option><?= _CameronHighland ?></option>
                                                    <option><?= _KualaLumpur ?></option>
                                                    <option><?= _Kuantan ?></option>
                                                    <option><?= _Malacca ?></option>
                                                    <option><?= _Penang ?></option>
                                                    <option><?= _Perlis ?></option>
                                                    <option><?= _PortDickson ?></option>
                                                    <option><?= _Sarawak ?></option>
                                                    <option><?= _Seremban ?></option>
                                                    <option><?= _TiomanIsland ?></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="date"><?= _Checkin ?>:</label>
                                            <div class="form-field">
                                                <i class="icon icon-calendar2"></i>
                                                <input type="text" id="date" class="form-control date" placeholder="<?= _Checkin ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="date"><?= _Checkout ?>:</label>
                                            <div class="form-field">
                                                <i class="icon icon-calendar2"></i>
                                                <input type="text" id="date" class="form-control date" placeholder="<?= _Checkout ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="guests"><?= _Guest ?>:</label>
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
                                        <input type="submit" id="submit" value="<?= _Submit ?>" class="btn btn-primary btn-block">
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
                    <h2><?= _PopularDestination ?></h2>
                    <p><?= _MyNewRoutine ?></p>
                </div>
            </div>
        </div>
        <div class="tour-wrap">
            <?php
            $sql = "SELECT location.location, location.location_img, hotels.location_id, ROUND(AVG(hotels.price),0), COUNT(hotels.location_id) FROM location 
            RIGHT JOIN hotels ON location.location_id = hotels.location_id GROUP BY hotels.location_id HAVING 
            COUNT(hotels.location_id) >= 1 ORDER BY COUNT(hotels.location_id) DESC LIMIT 8";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) { ?>
                <a href="hotels.php?location=<?= $row["location"]; ?>" class="tour-entry animate-box">
                    <div class="tour-img" style="background-image: url(images/<?= $row["location_img"]; ?>);">
                    </div>
                    <span class="desc">
                        <p class="star">
                            <?php
                            $star = "<span class='rate icon-star' style='font-size:12px;'></span>";
                            $halfstar = "<span class='rate icon-star-half' style='font-size:12px;'></span>";
                            $fullstar = "<span class='rate icon-star-full' style='font-size:12px;'></span>";

                            $ratingsql = "SELECT hotels.hotel_id, hotels.hotel_name, location.location, AVG(rate), COUNT(rate) FROM hotels 
                            INNER JOIN location ON location.location_id = hotels.location_id 
                            INNER JOIN rating ON rating.hotel_id = hotels.hotel_id 
                            WHERE location.location = '" . $row["location"] . "'
                            GROUP BY location.location";
                            $ratingqry = $conn->query($ratingsql);

                            if ($ratingqry->num_rows > 0) {
                                while ($locationratings = $ratingqry->fetch_assoc()) {
                                    $min_stars = 1;
                                    $max_stars = 5;

                                    $average_stars = $locationratings["AVG(rate)"];
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
                                    echo " " . $locationratings["COUNT(rate)"];
                                }
                            }
                            ?> <?= _Reviews ?>
                        </p>
                        <h2><?= $row["location"]; ?></h2>
                        <span class="city">Malaysia</span>
                        <span class="price">RM<?= $row["ROUND(AVG(hotels.price),0)"] ?></span>
                    </span>
                </a>
            <?php } ?>
        </div>
    </div>
    <div id="colorlib-hotel">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
                    <h2><?= _RecommendedHotels ?></h2>
                    <p><?= _WhenExploring ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 animate-box">
                    <div class="owl-carousel">
                        <?php
                        $sql = "SELECT hotels.*, location.location FROM hotels 
                        LEFT JOIN location ON location.location_id = hotels.location_id 
                        LIMIT 6";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <div class="item">
                                <div class="hotel-entry">
                                    <a href="rooms.php?hotel=<?= $row["hotel_name"] ?>" class="hotel-img" style="background-image: url(images/<?= $row["hotel_img"]; ?>);">
                                        <p class="price"><span>RM<?= $row["price"]; ?></span><small> /<?= _night ?></small></p>
                                    </a>
                                    <div class="desc">
                                        <p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 <?= _Reviews ?></p>
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
                    <h2><?= _OurSatisfiedGuestssays ?></h2>
                    <p><?= _WeLoveToTell ?></p>
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
                    <p>Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All Rights Reserved | Let's Go
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
                        url: 'index.php',
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
<?php // ob_end_flush(); 
?>