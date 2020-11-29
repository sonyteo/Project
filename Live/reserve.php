<?php
include('db.php');
ob_start();
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
        input[type="text"],
        input[type="email"] {
            height: 54px;
        }

        .panel-body.remarks_panel {
            padding-bottom: 14px;
        }

        .submitbtn {
            margin-left: 40px;
        }

        #bookingtitle {
            font-weight: bold;
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
                    <li style="background-image: url(images/cover-img-1.jpg);">
                        <div class="overlay"></div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                                    <div class="slider-text-inner text-center">
                                        <h1><?= _Reservation ?></h1>
                                        <h2><?= _ReserveAtLetsGocom ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="colorlib-tour reserve-tour colorlib-light-grey">
            <div class="container">
                <?php
                if (isset($_SESSION["user"])) {
                    if (!isset($_POST["submit"])) {
                ?>
                        <div class="row">
                            <div class="col-md-2 col-sm-2"></div>
                            <div class="col-md-8 col-sm-8 animate-box" align="center">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        Reserving as <strong><?= $_SESSION["user"]; ?></strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2"></div>
                        </div>
                        <form class="reserve_form" name="reserveform" method="post">
                            <div class="row">
                                <!-- Reservation Information -->
                                <div class="col-md-2 col-sm-2"></div>
                                <div class="col-md-8 col-sm-8 animate-box">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <?= _ReservationInformation ?>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <label><?= _ChosenHotel ?> *</label>
                                                    <select name="hotel" class="form-control" required>
                                                        <?php
                                                        if (isset($_GET["hotel"])) {
                                                            echo "<option value></option>";
                                                            $result = $conn->query("SELECT * FROM hotels ORDER BY hotel_name ASC");
                                                            while ($hotels = $result->fetch_assoc()) { ?>
                                                                <option value="<?= $hotels["hotel_id"]; ?>" <?php if ($_GET["hotel"] == $hotels["hotel_name"]) {
                                                                                                                echo "selected";
                                                                                                            } ?>><?= $hotels["hotel_name"]; ?></option>
                                                        <?php }
                                                            $result->data_seek(0);
                                                        } else {
                                                            echo "<option value selected></option>";
                                                            $result = $conn->query("SELECT * FROM hotels ORDER BY hotel_name ASC");
                                                            while ($hotels = $result->fetch_assoc()) {
                                                                echo "<option value='" . $hotels["hotel_id"] . "'>" . $hotels["hotel_name"] . "</option>";
                                                            }
                                                            $result->data_seek(0);
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label><?= _TypeOfRoom ?> *</label>
                                                    <select name="room" class="form-control" required>
                                                        <?php
                                                        if (isset($_GET["room"])) {
                                                            echo "<option value></option>";
                                                            $result = $conn->query("SELECT * FROM rooms ORDER BY room_type ASC");
                                                            while ($rooms = $result->fetch_assoc()) {
                                                                $room_id = $rooms["room_id"]; ?>
                                                                <option value="<?= $room_id; ?>" <?php if ($_GET["room"] == $rooms["room_type"]) {
                                                                                                        echo "selected";
                                                                                                    } ?>><?= $rooms["room_type"]; ?></option>
                                                        <?php }
                                                            $result->data_seek(0);
                                                        } else {
                                                            echo "<option value selected></option>";
                                                            $result = $conn->query("SELECT * FROM rooms ORDER BY room_type ASC");
                                                            while ($rooms = $result->fetch_assoc()) {
                                                                echo "<option value='" . $rooms["room_type"] . "'>" . $rooms["room_type"] . "</option>";
                                                            }
                                                            $result->data_seek(0);
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 form-group">
                                                    <label><?= _BeddingType ?></label>
                                                    <select name="bed" class="form-control" required>
                                                        <option value selected></option>
                                                        <option value="Single">Single</option>
                                                        <option value="Double">Double</option>
                                                        <option value="Triple">Triple</option>
                                                        <option value="Quad">Quad</option>
                                                        <option value="None">None</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label><?= _NoOfRooms ?> *</label>
                                                    <select name="nroom" class="form-control" required>
                                                        <option value selected></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label><?= _MealPlan ?></label>
                                                    <select name="meal" class="form-control" required>
                                                        <option value selected></option>
                                                        <option value="Room only">Room only</option>
                                                        <option value="Breakfast">Breakfast</option>
                                                        <option value="Half Board">Half Board</option>
                                                        <option value="Full Board">Full Board</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <label><?= _Checkin ?></label>
                                                    <input name="cin" type="date" class="form-control" required>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label><?= _Checkout ?></label>
                                                    <input name="cout" type="date" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12 form-group">
                                                <label><?= _Remarks ?></label>
                                                <textarea name="remarks" class="form-control" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 col-sm-2"></div>
                                <div class="col-md-8 col-sm-8 animate-box">
                                    <div class="well">
                                        <label><?= _HUMANVERIFICATION; ?></label>
                                        <p><?= _EnterThisCode; ?>
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
                                            echo "<strong>" . $Random_code . "</strong>"; ?></p>
                                        <input type="text" name="code1" title="random code" required />
                                        <input type="hidden" name="code" value="<?php echo $Random_code; ?>" />
                                        <input type="submit" name="submit" value="<?= _Submit; ?>" class="submitbtn btn btn-primary">
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2"></div>
                            </div>
                        </form>
                        <?php } else {
                        $sql = "INSERT INTO booking (booking_id, user_id, hotel_id, room_id, bedding, noOfRoom, meal, cin_date, cout_date, remarks) 
                            VALUES ('" . $_POST["code1"] . "', '" . $_SESSION["id"] . "', '" . $_POST["hotel"] . "', '" . $_POST["room"] . "', '" . $_POST["bed"] . "', '" . $_POST["nroom"] . "', '" . $_POST["meal"] . "', '" . $_POST["cin"] . "', '" . $_POST["cout"] . "', '" . $_POST["remarks"] . "')";
                        if ($conn->query($sql) === TRUE) { ?>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 animate-box">
                                    <div id="booking-panel" class="panel panel-success">
                                        <div class="panel-body" align="center">
                                            <h2 id="bookingtitle"><?= _BookingSuccessful; ?></h2>
                                            <h4 id="bookingmsg"><?= _BookingSuccessfulmsg; ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php header("refresh:2;url=reserve.php");
                        } else { ?>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 animate-box">
                                    <div id="booking-panel" class="panel panel-success">
                                        <div class="panel-body" align="center">
                                            <h2 id="bookingtitle"><?= _BookingFailed; ?></h2>
                                            <h4 id="bookingmsg"><?= _BookingFailedmsg; ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php header("refresh:2;url=reserve.php");
                        }
                    }
                } else {
                    if (!isset($_POST["submit"])) {
                        ?>
                        <form class="reserve_form" name="reserveform" method="post">
                            <div class="row">
                                <!-- Personal Information -->
                                <div class="col-md-4 col-sm-4 animate-box">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading"><?= _PersonalInformation ?></div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-4 form-group">
                                                    <label><?= _Title ?> *</label>
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
                                                <div class="col-sm-4 form-group">
                                                    <label><?= _FirstName ?></label>
                                                    <input name="fname" type="text" class="form-control" placeholder="John" required>
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label><?= _LastName ?></label>
                                                    <input name="lname" type="text" class="form-control" placeholder="Doe" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <label><?= _PhoneNumber ?></label>
                                                    <input name="phone" type="text" class="form-control" placeholder="0123456789" required>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label><?= _Email ?></label>
                                                    <input name="email" type="email" class="form-control" placeholder="example@email.com" required>
                                                </div>
                                            </div>
                                            <?php $countries = array(
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
                                            ); ?>
                                            <div class="form-group">
                                                <label><?= _PassportCountry ?> *</label>
                                                <select name="country" class="form-control" required>
                                                    <option value selected></option>
                                                    <?php
                                                    foreach ($countries as $key => $value) :
                                                        echo '<option value="' . $value . '">' . $value . '</option>';
                                                    endforeach;
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Reservation Information -->
                                <div class="col-md-8 col-sm-8 animate-box">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <?= _ReservationInformation ?>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <label><?= _ChosenHotel ?> *</label>
                                                    <select name="hotel" class="form-control" required>
                                                        <?php
                                                        if (isset($_GET["hotel"])) {
                                                            echo "<option value></option>";
                                                            $result = $conn->query("SELECT * FROM hotels ORDER BY hotel_name ASC");
                                                            while ($hotels = $result->fetch_assoc()) { ?>
                                                                <option value="<?= $hotels["hotel_id"]; ?>" <?php if ($_GET["hotel"] == $hotels["hotel_name"]) {
                                                                                                                echo "selected";
                                                                                                            } ?>><?= $hotels["hotel_name"]; ?></option>
                                                        <?php }
                                                            $result->data_seek(0);
                                                        } else {
                                                            echo "<option value selected></option>";
                                                            $result = $conn->query("SELECT * FROM hotels ORDER BY hotel_name ASC");
                                                            while ($hotels = $result->fetch_assoc()) {
                                                                echo "<option value='" . $hotels["hotel_id"] . "'>" . $hotels["hotel_name"] . "</option>";
                                                            }
                                                            $result->data_seek(0);
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label><?= _TypeOfRoom ?> *</label>
                                                    <select name="room" class="form-control" required>
                                                        <?php
                                                        if (isset($_GET["room"])) {
                                                            echo "<option value></option>";
                                                            $result = $conn->query("SELECT * FROM rooms ORDER BY room_type ASC");
                                                            while ($rooms = $result->fetch_assoc()) {
                                                                $room_id = $rooms["room_id"]; ?>
                                                                <option value="<?= $room_id; ?>" <?php if ($_GET["room"] == $rooms["room_type"]) {
                                                                                                        echo "selected";
                                                                                                    } ?>><?= $rooms["room_type"]; ?></option>
                                                        <?php }
                                                            $result->data_seek(0);
                                                        } else {
                                                            echo "<option value selected></option>";
                                                            $result = $conn->query("SELECT * FROM rooms ORDER BY room_type ASC");
                                                            while ($rooms = $result->fetch_assoc()) {
                                                                echo "<option value='" . $rooms["room_type"] . "'>" . $rooms["room_type"] . "</option>";
                                                            }
                                                            $result->data_seek(0);
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 form-group">
                                                    <label><?= _BeddingType ?></label>
                                                    <select name="bed" class="form-control" required>
                                                        <option value selected></option>
                                                        <option value="Single">Single</option>
                                                        <option value="Double">Double</option>
                                                        <option value="Triple">Triple</option>
                                                        <option value="Quad">Quad</option>
                                                        <option value="None">None</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label><?= _NoOfRooms ?> *</label>
                                                    <select name="nroom" class="form-control" required>
                                                        <option value selected></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label><?= _MealPlan ?></label>
                                                    <select name="meal" class="form-control" required>
                                                        <option value selected></option>
                                                        <option value="Room only">Room only</option>
                                                        <option value="Breakfast">Breakfast</option>
                                                        <option value="Half Board">Half Board</option>
                                                        <option value="Full Board">Full Board</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <label><?= _Checkin ?></label>
                                                    <input name="cin" type="date" class="form-control" required>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label><?= _Checkout ?></label>
                                                    <input name="cout" type="date" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-sm-8 animate-box">
                                    <div class="panel panel-primary">
                                        <div class="panel-body remarks_panel">
                                            <div class="form-group">
                                                <label><?= _Remarks ?></label>
                                                <textarea name="remarks" class="form-control" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 animate-box">
                                    <div class="well">
                                        <label><?= _HUMANVERIFICATION; ?></label>
                                        <p><?= _EnterThisCode; ?>
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
                                            echo "<strong>" . $Random_code . "</strong>"; ?></p>
                                        <input type="text" name="code1" title="random code" required />
                                        <input type="hidden" name="code" value="<?php echo $Random_code; ?>" />
                                        <input type="submit" name="submit" value="<?= _Submit; ?>" class="submitbtn btn btn-primary">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="col-md-12 col-sm-12 animate-box">
                            <p><?= _AlreadyAMember; ?><a href="login.php"> <?= _SignInHere; ?></a></p>
                        </div>
                        <?php } else {
                        $sql = "INSERT INTO booking (booking_id, user_id, hotel_id, room_id, bedding, noOfRoom, meal, cin_date, cout_date, remarks) 
                            VALUES ('" . $_POST["code1"] . "', '" . $_POST["email"] . "', '" . $_POST["hotel"] . "', '" . $_POST["room"] . "', '" . $_POST["bed"] . "', '" . $_POST["nroom"] . "', '" . $_POST["meal"] . "', '" . $_POST["cin"] . "', '" . $_POST["cout"] . "', '" . $_POST["remarks"] . "')";
                        if ($conn->query($sql) === TRUE) { ?>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 animate-box">
                                    <div id="booking-panel" class="panel panel-success">
                                        <div class="panel-body" align="center">
                                            <h2 id="bookingtitle"><?= _BookingSuccessful; ?></h2>
                                            <h4 id="bookingmsg"><?= _BookingSuccessfulmsg; ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php header("refresh:2;url=reserve.php");
                        } else { ?>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 animate-box">
                                    <div id="booking-panel" class="panel panel-success">
                                        <div class="panel-body" align="center">
                                            <h2 id="bookingtitle"><?= _BookingFailed; ?></h2>
                                            <h4 id="bookingmsg"><?= _BookingFailedmsg; ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <?php header("refresh:2;url=reserve.php");
                        }
                    }
                } ?>
            </div>
        </div>
        <footer id="colorlib-footer" role="contentinfo">
            <div class="container">
                <div class="row row-pb-md">
                    <div class="col-md-3 colorlib-widget">
                        <h4><?= _LetsGoAgenecy; ?></h4>
                        <p><?= _S1; ?></p>
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
                        <h4><?= _ContactInformation; ?></h4>
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
</body>

</html>
<?php ob_end_flush(); ?>