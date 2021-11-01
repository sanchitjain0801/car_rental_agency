<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <?php

    session_start();



    include "connection.php";
    if (isset($_REQUEST['number_of_days'])) {
        $vehicle_number = $_SESSION['vehicle_number'];

        $booking_date = stripslashes($_REQUEST['booking_date']);
        $booking_date = mysqli_real_escape_string($con, $booking_date);
        $number_of_days = stripslashes($_REQUEST['number_of_days']);
        $number_of_days = mysqli_real_escape_string($con, $number_of_days);
        $booked_by = $_SESSION["username"];
        $sql_query = "SELECT * from `vehicle_details` Where vehicle_number = '$vehicle_number'";
        $result = mysqli_query($con, $sql_query);
        $row_q = mysqli_fetch_assoc($result);
        $rent =  $row_q['rent_per_day'];

        $total_rent = $rent * $number_of_days;

        $query = "INSERT INTO `car_rental_agency`.`bookings`(`vehicle_number`, `total_rent`, `booked_by`, `start_date`, `number_of_days`) VALUES ('$vehicle_number','$total_rent','$booked_by','$booking_date','$number_of_days')";
        if ($con->query($query) == true) {

            echo "<div class='form'>
                              <h3>Inserted successfully.</h3>
                             <br/>Click here to <a href='add_new_car.php'>Add another</a></div>";
        } else {
            echo $con->error . "<div class='form'>
                        <h3>Something Went Wrong</h3>
                        <br/>Click here to <a href='add_new_car.php'>Go back</a></div>";
        }
    } else if (isset($_POST['vehicle_number'])) {
        $vehicle_number = $_POST['vehicle_number'];
    ?>
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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="available_car.php">Available Car</a></li>

                        <?php

                        if (isset($_SESSION["username"])) {
                            $email_id = $_SESSION["username"];
                            $sql_query = "SELECT type from `users` Where email = '$email_id'";
                            $result = mysqli_query($con, $sql_query);
                            $user_type = mysqli_fetch_assoc($result);
                            $list_names = implode(', ', $user_type);
                            if ($list_names == 'agency') {
                        ?>
                                <li class="active"><a href="add_new_car.php">Add New Car</a></li>
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

        <div class="form">

            <h1 style="margin-top:100px">Add New Car</h1>
            <form name="car_booking" action="" method="post">
                <input type="date" name="booking_date" required />
                <input type="number" name="number_of_days" placeholder="Enter No. of Days" required />
                <input type="submit" name="submit" value="Confirm Booking" />
                <?php $_SESSION['vehicle_number'] =  $vehicle_number; ?>
            </form>
        </div>

        <footer style="margin-top:100px;" class="site-footer">
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
    <?php } else {
    } ?>
</body>

</html>