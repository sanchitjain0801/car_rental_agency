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
    if (isset($_REQUEST['vehicle_number'])) {

        $vehicle_model = stripslashes($_REQUEST['vehicle_model']);
        $vehicle_model = mysqli_real_escape_string($con, $vehicle_model);
        $vehicle_number = stripslashes($_REQUEST['vehicle_number']);
        $vehicle_number = mysqli_real_escape_string($con, $vehicle_number);
        $seating_capacity = stripslashes($_REQUEST['seating_capacity']);
        $seating_capacity = mysqli_real_escape_string($con, $seating_capacity);
        $rent_per_day = stripslashes($_REQUEST['rent_per_day']);
        $rent_per_day = mysqli_real_escape_string($con, $rent_per_day);

        $added_by = $_SESSION["username"];

        $query = "INSERT into `car_rental_agency`.`vehicle_details` (vehicle_model, vehicle_number, seating_capacity, rent_per_day, added_by) VALUES ('$vehicle_model', '$vehicle_number', '$seating_capacity', '$rent_per_day','$added_by')";
        if ($con->query($query) == true) {
            echo "<div class='form'>
                              <h3>Inserted successfully.</h3>
                             <br/>Click here to <a href='add_new_car.php'>Add another</a></div>";
        } else {
            echo $con->error . "<div class='form'>
                        <h3>Something Went Wrong</h3>
                        <br/>Click here to <a href='add_new_car.php'>Go back</a></div>";
        }
    } else {
    ?>
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
                                <li><a href="booked_car.php">Booked Car</a></li>
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
            <form name="add_new_car" action="" method="post">
                <input type="text" name="vehicle_model" placeholder="Vechicle Model" required />
                <input type="text" name="vehicle_number" placeholder="Vehicle Number" required />
                <input style="width: 200px;border-radius: 2px;border: 1px solid #CCC;padding: 10px;color: #333;font-size: 14px;margin-top: 10px;" type="number" name="seating_capacity" placeholder="Seating Capacity" required />
                <input style="width: 200px;border-radius: 2px;border: 1px solid #CCC;padding: 10px;color: #333;font-size: 14px;margin-top: 10px;" type="number" name="rent_per_day" placeholder="Rent Per Day" required />

                <input type="submit" name="submit" value="Add Car" />
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
    <?php } ?>
</body>

</html>