<!DOCTYPE html>
<html lang="en">


<head>
    <title>RentUs</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style='margin-right:40px;' href="#">Car Rental Agency</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="available_car.php">Available Car</a></li>

                    <?php
                    session_start();
                    include "connection.php";
                    if (isset($_SESSION["username"])) {
                        $email_id = $_SESSION["username"];
                        $sql_query = "SELECT type from `users` Where email = '$email_id'";
                        $result = mysqli_query($con, $sql_query);
                        $user_type = mysqli_fetch_assoc($result);
                        $list_names = implode(', ', $user_type);
                        if ($list_names == 'agency') {
                    ?>
                            <li><a href="add_new_car.php">Add New Car</a></li>
                            <li><a href="booked_car.php">Booked Car</a></li>
                    <?php }
                    } ?>
                    <?php


                    if (isset($_SESSION["username"])) {
                        $email_id = $_SESSION["username"];
                        $sql_query = "SELECT type from `users` Where email = '$email_id'";
                        $result = mysqli_query($con, $sql_query);
                        $user_type = mysqli_fetch_assoc($result);
                        $list_names = implode(', ', $user_type);
                        if ($list_names == 'customer') {
                    ?>
                            <li><a href="my_bookings.php">My Bookings</a></li>
                    <?php }
                    } ?>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php

                    if (!isset($_SESSION["username"])) {
                    ?>
                        <li><a href="registration.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <?php }
                    if (isset($_SESSION["username"])) {
                    ?>
                        <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> Log out</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>



    <center>
        <div class="site-body">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="images/bg2.jpg" alt="Los Angeles" style="width:100%;">
                        <div class="carousel-caption">


                        </div>
                    </div>
                    <div class="item">
                        <img src="images/bg2.jpg" alt="Chicago" style="width:100%;">
                        <div class="carousel-caption">


                        </div>
                    </div>
                    <div class="item">
                        <img src="images/bg2.jpg" alt="New York" style="width:100%;">
                        <div class="carousel-caption">


                        </div>
                    </div>
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <hr>
        <div class="company container">
            <div class="company-left">
                <h1 class="company-head"><b> Car Rental Agency</b></h1>
                <p class="company-phara">
                    2017 has been a great year for Team Savaari. We witnessed some important milestones including - completing 12 years of service, extending our footprint to 98 cities and covering over 265 million kilometers of road travel across India!
                    In 2018, our focus will remain on continuously creating differentaited value for the inter-city traveler. We have several exciting offerings lined up, the most prominent being 'Package Offers' to key tourist and buisness destinations. With your support, these initiatives will transform road travel into even more memorable and exciting journeys.
                </p>
            </div>

        </div>
        <center>
            <hr style="width:80%; margin:0">
        </center>
    </center>

    <div>
        <div class="row">

            <?php
            $sql_q = "SELECT * FROM vehicle_details";
            $sql_r = mysqli_query($con, $sql_q);
            $x = 4;
            while ($x != 0) {
                $row_q = mysqli_fetch_assoc($sql_r);
                $x = $x - 1; ?>

                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <center>
                                <h5 class="card-title">VEHICLE MODEL : <?php echo $row_q['vehicle_model']; ?></h5>
                                <h5 class="card-title">VEHICLE NUMBER : <?php echo $row_q['vehicle_number']; ?></h5>
                                <h5 class="card-title">SEATING CAPACITY : <?php echo $row_q['seating_capacity']; ?></h5>
                                <h5 class="card-title">RENT PER DAY : <?php echo $row_q['rent_per_day']; ?></h5>

                                <?php if (isset($_SESSION["username"])) {
                                    $email_id = $_SESSION["username"];
                                    $sql_query = "SELECT type from `users` Where email = '$email_id'";
                                    $result = mysqli_query($con, $sql_query);
                                    $user_type = mysqli_fetch_assoc($result);
                                    $list_names = implode(', ', $user_type);
                                    if ($list_names == 'agency') {
                                ?>

                                        <a href="#" class="btn btn-primary disabled">Book Now</a>


                                    <?php }
                                    if ($list_names == 'customer') {
                                        $vehicle = $row_q['vehicle_number'];
                                    ?>
                                        <form action="booking.php" method="post" id="form1">
                                            <input type="hidden" name="vehicle_number" value="<?php echo $vehicle; ?>" />
                                            <input type="submit" value="Book Now">
                                        </form>


                                    <?php }
                                } else if (!isset($_SESSION["username"])) {
                                    ?>

                                    <a href="login.php" class="btn btn-primary">Book Now</a>


                                <?php } else {
                                } ?>





                            </center>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>



        </div>
    </div>


    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12  col-md-6 ">
                    <center>
                        <h6>HEAD OFFICE</h6>
                        <ul class="footer-links">
                            <li>
                                <a href="#"><b> Gurgaon (Scholiverse Educare Pvt. Ltd. B-610, Unitech Business Zone, Nirvana Country, South City 2, Gurgaon, India - 122018)</b></a>
                            </li>
                        </ul>
                    </center>

                </div>
                <div class="col-sm-12  col-md-6 ">
                    <center>
                        <h6>Quick Links</h6>
                        <ul class="footer-links">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="available_car.php">Pick a Car</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </center>
                </div>
            </div>
            <hr>
        </div>
    </footer>

</body>

</html>