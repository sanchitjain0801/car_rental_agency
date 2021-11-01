<?php
session_start();
include "connection.php";
if (isset($_SESSION['username'])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Booked Car</title>
        <style>
            body {
                background: rgb(2, 0, 36);
                background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(9, 9, 121, 1) 0%, rgba(0, 212, 255, 1) 100%);
                color: #444;
                font: 100%/30px 'Helvetica Neue', helvetica, arial, sans-serif;
                text-shadow: 0 1px 0 #fff;
            }

            strong {
                font-weight: bold;
            }

            em {
                font-style: italic;
            }



            table {
                border-radius: 10px;
                background: #f5f5f5;
                border-collapse: separate;
                box-shadow: inset 0 1px 0 #fff;
                font-size: 12px;
                line-height: 24px;
                margin: 30px auto;
                text-align: left;
                max-width: 100%;
            }


            td {
                border-radius: 10px;
                border-right: 1px solid #fff;
                border-left: 1px solid #e8e8e8;
                border-top: 1px solid #fff;
                border-bottom: 1px solid #e8e8e8;
                padding: 10px 15px;
                position: relative;
                transition: all 300ms;
                text-align: center;
                font-weight: bold;
            }

            td:first-child {
                box-shadow: inset 1px 0 0 #fff;
            }

            td:last-child {
                border-right: 1px solid #e8e8e8;
                box-shadow: inset -1px 0 0 #fff;
            }


            tr:last-of-type td {
                box-shadow: inset 0 -1px 0 #fff;
            }

            tr:last-of-type td:first-child {
                box-shadow: inset 1px -1px 0 #fff;
            }

            tr:last-of-type td:last-child {
                box-shadow: inset -1px -1px 0 #fff;
            }

            tbody:hover td {
                color: transparent;
                text-shadow: 0 0 3px #aaa;
            }

            tbody:hover tr:hover td {
                color: #444;
                text-shadow: 0 1px 0 #fff;
            }

            .head {
                background: rgb(2, 0, 36);
                background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(61, 61, 61, 1) 0%, rgba(132, 143, 162, 1) 100%);
                text-align: center;

            }

            th {
                padding: 10px;
                border-radius: 3px;
                color: white;
            }

            h3 {
                display: inline;
            }
        </style>
    </head>

    <body>

        <div>

            <?php
            $username = $_SESSION['username'];

            $sqll = "SELECT * FROM bookings where booked_by = '$username'";
            $resultt = mysqli_query($con, $sqll);
            $x = mysqli_num_rows($resultt);

            echo "<center><table style='width:80%;'>";
            echo "<tr class='head'><th>VEHICLE NUMBER</th><th>TOTAL RENT</th><th>BOOKED BY</th><th>BOOKING ID</th><th>DATE</th><th>NUMBER OF DAYS</th></tr>";
            while ($row = mysqli_fetch_assoc($resultt)) {

                echo "<tr>";

                $vehicle_number = $row["vehicle_number"];
                $total_rent = $row["total_rent"];
                $booked_by = $row["booked_by"];
                $booking_id = $row["booking_id"];
                $date = $row['start_date'];
                $number_of_days = $row['number_of_days'];

                echo "<td>" . $vehicle_number . "</td>" . "<td>" . $total_rent . "</td>" . "<td>" . $booked_by . "</td>" . "<td>" . $booking_id . "</td>" . "<td>" . $date . "</td>" . "<td>" . $number_of_days . "</td>";



                echo "</tr>";
            }
            echo "</table></center>";
            ?>

        </div>
    </body>

    </html>
<?php
} else {
}
?>