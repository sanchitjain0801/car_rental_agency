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
                <a class="navbar-brand" style='margin-right:40px;' href="index.php">Car Rental Agency</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li class="active"><a href="available_car.php">Available Car</a></li>

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
                            <li><a href="booking.php">Booked Car</a></li>
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

    <div style="margin-top: 100px;">
        <div class="row">

            <?php
            $sql_q = "SELECT * FROM vehicle_details";
            $sql_r = mysqli_query($con, $sql_q);
            while ($row_q = mysqli_fetch_assoc($sql_r)) { ?>
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