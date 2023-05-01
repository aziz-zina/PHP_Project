<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <title>User management</title>
    <style>
        body {
            background: #eee;
            background-image: url("login-background-img.jpg");
            /*background-image: url("1431301.jpg");*/
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .table-div {
            margin: 5%;
            margin-top: 10px;
        }

        .management-icon {
            width: 40px;
            height: 40px;
        }

        .button {
            margin-top: 3%;
            height: 60px;
            width: 60px;
            margin-left: 1270px;
        }

        .button2 {
            margin-top: 3%;
            height: 60px;
            width: 60px;
            margin-left: 30px;
        }
    </style>

</head>

<body>
    <a href="./homePage.php"><img src="./home.png" alt="home.png" class="button"></a>
    <a href="PgReservation.php"><img src="./reservation.png" alt="reservation.png" class="button2"></a>
    <div class="table-div">
        <table class="table table-hover">
            <thead style="background-color: #c3a48f;">
                <tr>
                    <th scope="col" style="color: black;">Date</th>
                    <th scope="col" style="color: black;">Name</th>

                    <th scope="col" style="color: black;">Time</th>
                    <th scope="col" style="color: black;">Pet</th>
                    <th scope="col" style="color: black;">Service Type</th>
                    <th scope="col" style="color: black;">Employee</th>
                    <th scope="col" style="color: black;">Edit</th>
                    <th scope="col" style="color: black;">Remove</th>
                </tr>
            </thead>
            <tbody>
                <?php
                session_start();
                if (isset($_SESSION["login"])) {
                    include '../database/basedados.h';
                    $sql = "SELECT * FROM reservation ORDER BY idClient ";
                    $retval = mysqli_query($conn, $sql);
                    if (!$retval) {
                        die('Could not get data: ' . mysqli_error($conn)); //Gives an error if it doesn't work 
                    }
                    while ($row = mysqli_fetch_array($retval)) {
                        echo "<tr class='table-secondary'><td>" . $row['date'] . "</td>";
                        echo "<td>" . $row['idClient'] . "</td>";
                        echo "<td>" . $row['time'] . "</td>";
                        echo "<td>" . $row['pet'] . "</td>";
                        echo "<td>" . $row['serviceType'] . "</td>";
                        echo "<td>" . $row['EmployeeUser'] . "</td>";
                        echo "<td><a href='Pgedit_reservation.php?id=" . $row["idReservation"] . "'><img src='edit.png' class='management-icon'></a></td>";
                        echo "<td><a href='delete_reservation.php?id=" . $row["idReservation"] . "'><img src='remove.png' class='management-icon'></a></td>";
                        echo "</tr>";
                    }
                    mysqli_close($conn);
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>