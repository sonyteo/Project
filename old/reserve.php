<?php
include('db.php');
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reservation - LetsGo</title>
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
        .colorlib-tour {
            padding-top: 3em !important;
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
                                <li><a href="index.php">Home</a></li>
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
                    <li style="background-image: url(images/cover-img-1.jpg);">
                        <div class="overlay"></div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                                    <div class="slider-text-inner text-center">
                                        <h1>Reservation</h1>
                                        <h2>Reserve at LetsGo.com</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </aside>
    </div>

    <div class="colorlib-tour colorlib-light-grey">
        <div class="container">
            <?php
            if (isset($_SESSION['user'])) {
            ?>
                <div class="row">
                    <div class="col-md-3 col-sm-3"></div>
                    <div class="col-md-6 col-sm-6 animate-box signin-form" style="text-align:center;">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Reserving as <strong><?= $_SESSION["user"]; ?></strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3"></div>
                </div>
                <div class="row">
                    <form name="form" method="post">
                        <div class="row">
                            <div class="col-md-3 col-sm-3"></div>
                            <div class="col-md-6 col-sm-6 animate-box">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        Reservation Information
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label>Type Of Room *</label>
                                            <select name="room" class="form-control" required>
                                                <?php
                                                echo "<option value selected></option>";
                                                $result = $conn->query("SELECT * FROM rooms ORDER BY room_type ASC");
                                                while ($rooms = $result->fetch_assoc()) {
                                                    $room_id = $rooms["room_id"]; ?>
                                                    <option value="<?= $rooms["room_id"]; ?>"><?= $rooms["room_type"]; ?></option>
                                                <?php }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Bedding Type</label>
                                            <select name="bed" class="form-control" required>
                                                <option value selected></option>
                                                <option value="Single">Single</option>
                                                <option value="Double">Double</option>
                                                <option value="Triple">Triple</option>
                                                <option value="Quad">Quad</option>
                                                <option value="None">None</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>No. of Rooms *</label>
                                            <select name="nroom" class="form-control" required>
                                                <option value selected></option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Meal Plan</label>
                                            <select name="meal" class="form-control" required>
                                                <option value selected></option>
                                                <option value="Room only">Room only</option>
                                                <option value="Breakfast">Breakfast</option>
                                                <option value="Half Board">Half Board</option>
                                                <option value="Full Board">Full Board</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Check-In</label>
                                            <input name="cin" type="date" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Check-Out</label>
                                            <input name="cout" type="date" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Remarks</label>
                                            <textarea name="remarks" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-3"></div>
                            <div class="col-md-6 col-sm-6 animate-box">
                                <div class="well">
                                    <h4>HUMAN VERIFICATION</h4>
                                    <p>Enter this code
                                        <?php
                                        $Random_code = rand($min = 10000, $max = 99999);
                                        $sql = "SELECT booking_id FROM booking";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            $book_id = $result->fetch_assoc();
                                            do {
                                                $Random_code = rand($min = 10000, $max = 99999);
                                            } while ($book_id == $Random_code);
                                        }
                                        echo "<strong>" . $Random_code . "</strong>"; ?> below</p>
                                    <input type="text" name="code1" title="random code" required />
                                    <input type="hidden" name="code" value="<?php echo $Random_code; ?>" />
                                    <input type="submit" name="submit" class="btn btn-primary">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3"></div>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['submit'])) {
                        $sql = "INSERT INTO booking (booking_id, user_id, room_id, bedding, no_of_room, meal, checkin_date, checkout_date, remarks) 
                        VALUES ('" . $_POST["code1"] . "', '" . $_SESSION["id"] . "', '" . $room_id . "', '" . $_POST["bed"] . "', '" . $_POST["nroom"] . "', '" . $_POST["meal"] . "', '" . $_POST["cin"] . "', '" . $_POST["cout"] . "', '" . $_POST["remarks"] . "')";

                        if ($conn->query($sql) === TRUE) { ?>
                            <div class="row">
                                <div class="col-md-3 col-sm-3"></div>
                                <div class="col-md-6 col-sm-6 animate-box" align="center">
                                    <div class="well">
                                        <p>Booking Successful!</p>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3"></div>
                            </div>
                        <?php } else { ?>
                            <div class="row">
                                <div class="col-md-3 col-sm-3"></div>
                                <div class="col-md-6 col-sm-6 animate-box" align="center">
                                    <div class="well">
                                        <p>Error Booking. Please try again!</p>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3"></div>
                            </div>
                    <?php }
                    } ?>
                </div>
            <?php
            } else {
            ?>
                <div class="row">
                    <form name="form" method="post">
                        <div class="col-md-6 col-sm-6 animate-box">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Personal Information</div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Title *</label>
                                        <select name="title" class="form-control" required>
                                            <option value selected></option>
                                            <option value="Dr.">Dr.</option>
                                            <option value="Miss.">Miss.</option>
                                            <option value="Mr.">Mr.</option>
                                            <option value="Mrs.">Mrs.</option>
                                            <option value="Prof.">Prof.</option>
                                            <option value="Rev .">Rev .</option>
                                            <option value="Rev . Fr">Rev . Fr .</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input name="fname" class="form-control" required>

                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input name="lname" class="form-control" required>

                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" type="email" class="form-control" required>
                                    </div>
                                    <?php
                                    $countries = array(
                                        "Afghanistan", "Albania", "Algeria", "American Samoa",
                                        "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda",
                                        "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan",
                                        "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium",
                                        "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina",
                                        "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory",
                                        "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia",
                                        "Cameroon", "Canada", "Cape Verde", "Cayman Islands",
                                        "Central African Republic", "Chad", "Chile", "China", "Christmas Island",
                                        "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo",
                                        "Democratic Republic of the Congo", "Cook Islands", "Costa Rica",
                                        "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic",
                                        "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor",
                                        "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia",
                                        "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland",
                                        "France", "France Metropolitan", "French Guiana", "French Polynesia",
                                        "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany",
                                        "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe",
                                        "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti",
                                        "Heard and Mc Donald Islands", "Holy See (Vatican City State)",
                                        "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia",
                                        "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy",
                                        "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati",
                                        "Democratic People's Republic of Korea", "Republic of Korea", "Kuwait",
                                        "Kyrgyzstan", "Lao People's Democratic Republic",
                                        "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya",
                                        "Liechtenstein", "Lithuania", "Luxembourg", "Macau",
                                        "Former Yugoslav Republic of Macedonia", "Madagascar", "Malawi", "Malaysia",
                                        "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania",
                                        "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of",
                                        "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco",
                                        "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands",
                                        "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua",
                                        "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands",
                                        "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea",
                                        "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal",
                                        "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation",
                                        "Rwanda", "Saint Kitts and Nevis", "Saint Lucia",
                                        "Saint Vincent and the Grenadines", "Samoa", "San Marino",
                                        "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles",
                                        "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia",
                                        "Solomon Islands", "Somalia", "South Africa",
                                        "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka",
                                        "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname",
                                        "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden",
                                        "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China",
                                        "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo",
                                        "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey",
                                        "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda",
                                        "Ukraine", "United Arab Emirates", "United Kingdom", "United States",
                                        "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu",
                                        "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)",
                                        "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe"
                                    );
                                    ?>
                                    <div class="form-group">
                                        <label>Passport Country *</label>
                                        <select name="country" class="form-control" required>
                                            <option value selected></option>
                                            <?php
                                            foreach ($countries as $key => $value) :
                                                echo '<option value="' . $value . '">' . $value . '</option>';
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input name="phone" type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 animate-box">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Reservation Information
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Type Of Room *</label>
                                        <select name="room" class="form-control" required>
                                            <?php
                                            echo "<option value selected></option>";
                                            $result = $conn->query("SELECT * FROM rooms ORDER BY room_type ASC");
                                            while ($rooms = $result->fetch_assoc()) {
                                                $room_id = $rooms["room_id"]; ?>
                                                <option value="<?= $rooms["room_id"]; ?>"><?= $rooms["room_type"]; ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Bedding Type</label>
                                        <select name="bed" class="form-control" required>
                                            <option value selected></option>
                                            <option value="Single">Single</option>
                                            <option value="Double">Double</option>
                                            <option value="Triple">Triple</option>
                                            <option value="Quad">Quad</option>
                                            <option value="None">None</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>No. of Rooms *</label>
                                        <select name="nroom" class="form-control" required>
                                            <option value selected></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Meal Plan</label>
                                        <select name="meal" class="form-control" required>
                                            <option value selected></option>
                                            <option value="Room only">Room only</option>
                                            <option value="Breakfast">Breakfast</option>
                                            <option value="Half Board">Half Board</option>
                                            <option value="Full Board">Full Board</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Check-In</label>
                                        <input name="cin" type="date" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Check-Out</label>
                                        <input name="cout" type="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 animate-box">
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Remarks</label>
                                        <textarea name="remarks" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 animate-box">
                            <div class="well">
                                <h4>HUMAN VERIFICATION</h4>
                                <p>Enter this code
                                    <?php
                                    $Random_code = rand($min = 10000, $max = 99999);
                                    $sql = "SELECT booking_id FROM booking";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        $book_id = $result->fetch_assoc();
                                        do {
                                            $Random_code = rand($min = 10000, $max = 99999);
                                        } while ($book_id == $Random_code);
                                    }
                                    echo "<strong>" . $Random_code . "</strong>"; ?> below</p>
                                <input type="text" name="code1" title="random code" />
                                <input type="hidden" name="code" value="<?php echo $Random_code; ?>" />
                                <input type="submit" name="submit" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                    <div class="col-md-12 col-sm-12 animate-box">
                        <p>Already a member? <a href="login.php">Sign in here!</a></p>
                    </div>
                </div>
                <?php
                if (isset($_POST['submit'])) {
                    $sql = "INSERT INTO booking (booking_id, user_id, room_id, bedding, no_of_room, meal, checkin_date, checkout_date, remarks) 
                        VALUES ('" . $_POST["code1"] . "', '" . $_POST["email"] . "', '" . $room_id . "', '" . $_POST["bed"] . "', '" . $_POST["nroom"] . "', '" . $_POST["meal"] . "', '" . $_POST["cin"] . "', '" . $_POST["cout"] . "', '" . $_POST["remarks"] . "')";

                    if ($conn->query($sql) === TRUE) { ?>
                        <div class="row">
                            <div class="col-md-3 col-sm-3"></div>
                            <div class="col-md-6 col-sm-6 animate-box" align="center">
                                <div class="well">
                                    <p>Booking Successful!</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3"></div>
                        </div>
                    <?php } else { ?>
                        <div class="row">
                            <div class="col-md-3 col-sm-3"></div>
                            <div class="col-md-6 col-sm-6 animate-box" align="center">
                                <div class="well">
                                    <p>Error Booking. Please try again!</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3"></div>
                        </div>
            <?php }
                }
            } ?>
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
</body>

</html>