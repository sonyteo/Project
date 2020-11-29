<?php
include('db.php');
if (isset($_POST["saveReview"])) {
    $sql = "UPDATE rating SET review_title='" . $_POST["reviewtitle"] . "', review='" . $_POST["reviewmsg"] . "', rate='" . $_POST["rate"] . "' WHERE rate_id='" . $_GET["rateid"] . "'";
    if ($conn->query($sql) === TRUE) {
        header("refresh:0;url=review.php");
    }
}
if (isset($_POST["back"])) {
    header("refresh:0;url=review.php");
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Profile - LetsGo</title>
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
        #edit_review a {
            cursor: pointer;
        }

        #edit_review a,
        #edit_review a:active,
        #edit_review a:hover,
        #edit_review a:visited {
            color: #595959;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }

        table {
            border-collapse: collapse;
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
                    <li style="background-image: url(images/cover-img-4.jpg);">
                        <div class="overlay"></div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                                    <div class="slider-text-inner text-center">
                                        <h1><?= _YourReviews ?></h1>
                                        <h2><?= _CustomizeYourReviews ?></h2>
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
                                    <h2 class="pgtitle"><?= _Reviews ?></h2>
                                    <ul>
                                        <li class="info"><a href="profile.php#information"><?= _YourInfo ?></a></li>
                                        <li class="book"><a href="booking.php#booking"><?= _YourBookings ?></a></li>
                                        <li class="rev"><a href="#review"><?= _YourReviews ?></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-three-forth animate-box" id="review">
                            <div>
                                <h2><?= _YourReviews ?></h2>
                                <br /><br />
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <?php if (!isset($_GET["rateid"])) { ?>
                                            <form method="get">
                                                <table id="review_table">
                                                    <tr>
                                                        <th><?= _Hotels ?></th>
                                                        <th><?= _ReviewTitle ?></th>
                                                        <th colspan="2"><?= _Reviews ?></th>
                                                        <th><?= _Rate ?></th>
                                                        <th><?= _RatingDate ?></th>
                                                        <th><?= _Action ?></th>
                                                    </tr>
                                                    <?php
                                                    $sql = "SELECT rating.*, hotels.hotel_name FROM rating
													INNER JOIN hotels ON hotels.hotel_id = rating.hotel_id WHERE user_id='" . $_SESSION["id"] . "'";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) { ?>
                                                            <tr>
                                                                <td><?= $row["hotel_name"]; ?></td>
                                                                <td><?= $row["review_title"]; ?></td>
                                                                <td colspan="2"><?= $row["review"]; ?></td>
                                                                <td><?= $row["rate"]; ?></td>
                                                                <td><?= $row["rate_date"]; ?></td>
                                                                <td>
                                                                    <button id="edit_review" name="editReview" value="Edit"><a href="?rateid=<?= $row["rate_id"]; ?>"><?= _Edit; ?></a></button>
                                                                    <button id="delete_review" name="deleteReview" value="Delete"><?= _Delete; ?></button>
                                                                </td>
                                                            </tr>
                                                        <?php }
                                                    } else { ?>
                                                        <tr>
                                                            <td colspan="7"><?= _NoData; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </table>
                                            </form>
                                        <?php } else { ?>
                                            <form method="post" id="reviewform">
                                                <table>
                                                    <tr>
                                                        <th>Hotel Room</th>
                                                        <th>Review Title</th>
                                                        <th colspan="2">Review</th>
                                                        <th>Rate</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                    <?php
                                                    $sql = "SELECT rating.*, hotels.hotel_name FROM rating
                                                    INNER JOIN hotels ON hotels.hotel_id = rating.hotel_id WHERE rate_id='" . $_GET["rateid"] . "'";
                                                    $result = $conn->query($sql);
                                                    while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                        <tr>
                                                            <td><?= $row["hotel_name"]; ?></td>
                                                            <td><input class="form-control" type="text" name="reviewtitle" placeholder="<?= $row["review_title"]; ?>" /></td>
                                                            <td colspan="2"><textarea class="form-control" type="text" name="reviewmsg" placeholder="<?= $row["review"]; ?>"></textarea></td>
                                                            <td><input class="form-control" type="number" name="rate" min="1" max="5" placeholder="<?= $row["rate"]; ?>" /></td>
                                                            <td>
                                                                <button id="save_review" name="saveReview" value="Save"><?= _Save; ?></button>
                                                                <button id="back" name="back" value="Back"><?= _Back; ?></button>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </table>
                                            </form>
                                        <?php } ?>
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
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | Let's Go
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
        // $('#edit_review').click(function() {
        //     $("#review_table").css("display", "none");
        // });
    </script>
</body>

</html>