<?php
include('db.php');

if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}

$no_of_records_per_page = 8;
$offset = ($pageno - 1) * $no_of_records_per_page;

$total_pages_sql = "SELECT COUNT(*) FROM hotels";
$result = $conn->query($total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hotels - LetsGo</title>
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
                                <li class="active"><a href="hotels.php">Hotels</a></li>
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
                    <li style="background-image: url(images/cover-img-4.jpg);">
                        <div class="overlay"></div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                                    <div class="slider-text-inner text-center">
                                        <h2>Let's Go</h2>
                                        <h1>Find Hotel</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="colorlib-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <!-- Hotels -->
                        <div class="row">
                            <div class="wrap-division">
                                <?php
                                if (isset($_GET['location'])) {
                                    $location = $_GET['location'];
                                    $sql = "SELECT * FROM hotels WHERE location='" . $location . "' ORDER BY price ASC";
                                } else {
                                    $location = "";
                                    $sql = "SELECT * FROM hotels LIMIT $offset, $no_of_records_per_page";
                                }
                                $res_data = $conn->query($sql);
                                while ($row = $res_data->fetch_assoc()) { ?>
                                    <div class="col-md-6 col-sm-6 animate-box">
                                        <div class="hotel-entry">
                                            <a href="rooms.php?hotel=<?= $row["hotel_name"] ?>" class="hotel-img" style="background-image: url(images/<?= $row["hotel_img"] ?>);">
                                                <p class="price"><span>RM<?= $row["price"] ?></span><small> /night</small></p>
                                            </a>
                                            <div class="desc">
                                                <p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
                                                <h3><a href="hotels.php"><?= $row["hotel_name"] ?></a></h3>
                                                <span class="place"><?= $row["location"] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- Pagination -->
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <ul class="pagination animate-box">
                                    <li><a href="?pageno=1">First</a></li>
                                    <li class="<?php if ($pageno <= 1) {
                                                    echo 'disabled';
                                                } ?>">
                                        <a href="<?php if ($pageno <= 1) {
                                                        echo '#';
                                                    } else {
                                                        echo "?pageno=" . ($pageno - 1);
                                                    } ?>">&laquo;</a>
                                    </li>
                                    <li class="<?php if ($pageno >= $total_pages) {
                                                    echo 'disabled';
                                                } ?>">
                                        <a href="<?php if ($pageno >= $total_pages) {
                                                        echo '#';
                                                    } else {
                                                        echo "?pageno=" . ($pageno + 1);
                                                    } ?>">&raquo;</a>
                                    </li>
                                    <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- SIDEBAR-->
                    <div class="col-md-3">
                        <div class="sidebar-wrap">
                            <div class="side search-wrap animate-box">
                                <h3 class="sidebar-heading">Find your hotel</h3>
                                <form method="post" class="colorlib-form">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="date">Check-in:</label>
                                                <div class="form-field">
                                                    <i class="icon icon-calendar2"></i>
                                                    <input type="text" id="date" class="form-control date" placeholder="Check-in date">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="date">Check-out:</label>
                                                <div class="form-field">
                                                    <i class="icon icon-calendar2"></i>
                                                    <input type="text" id="date" class="form-control date" placeholder="Check-out date">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="guests">Guest</label>
                                                <div class="form-field">
                                                    <i class="icon icon-arrow-down3"></i>
                                                    <select name="people" id="people" class="form-control">
                                                        <option value="#">1</option>
                                                        <option value="#">2</option>
                                                        <option value="#">3</option>
                                                        <option value="#">4</option>
                                                        <option value="#">5+</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="submit" name="submit" id="submit" value="Find Hotel" class="btn btn-primary btn-block">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="side animate-box">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="sidebar-heading">Location</h3>
                                        <form method="get" id="locationform" class="colorlib-form-2">
                                            <?php
                                            $sql = "SELECT DISTINCT location from hotels ORDER BY location ASC";
                                            $result = $conn->query($sql);
                                            while ($row = $result->fetch_assoc()) {
                                            ?>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input location-check" name="<?= $row["location"]; ?>" value="<?= $row["location"]; ?>">
                                                    <label class="form-check-label" for="<?= $row["location"]; ?>">
                                                        <h4 class="place"><?= $row["location"]; ?></h4>
                                                    </label>
                                                </div>
                                            <?php } ?>
                                        </form>
                                    </div>
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
        $(".location-check").change(function() {
            if (this.checked) {
                if (window.location.href.includes('?')) {
                    window.location.search = '?location=' + $(this).attr('value');
                } else {
                    var url = window.location.href + "?location=" + $(this).attr('value');
                    window.location = url;
                }
            }
        });

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