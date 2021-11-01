<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css" />

</head>

<body>
        <?php
        require('connection.php');
        if (isset($_REQUEST['email'])) {

                $type = stripslashes($_REQUEST['type']);
                $type = mysqli_real_escape_string($con, $type);
                $name = stripslashes($_REQUEST['name']);
                $name = mysqli_real_escape_string($con, $name);
                $email = stripslashes($_REQUEST['email']);
                $email = mysqli_real_escape_string($con, $email);
                $password = stripslashes($_REQUEST['password']);
                $password = mysqli_real_escape_string($con, $password);

                $query = "INSERT into `car_rental_agency`.`users` (name, email, password, type) VALUES ('$name', '$email', '$password', '$type')";
                if ($con->query($query) == true) {
                        echo "<div class='form'>
                              <h3>You are registered successfully.</h3>
                             <br/>Click here to <a href='login.php'>Login</a></div>";
                } else {
                        echo "<div class='form'>
                        <h3>Something Went Wrong</h3>
                        <br/>Click here to <a href='registration.php'>Register again</a></div>";
                }
        } else {

        ?>


                <div class="form">
                        <h1>Registration</h1>
                        <form name="registration" action="" method="post">
                                <input type="text" name="name" placeholder="name" required />
                                <input type="email" name="email" placeholder="Email" required />
                                <input type="password" name="password" placeholder="Password" required />
                                <select id="type" name="type">
                                        <option value="customer">Customer</option>
                                        <option value="agency">Agency</option>
                                </select>
                                <input type="submit" name="submit" value="Register" />
                        </form>
                </div>
        <?php } ?>
</body>

</html>