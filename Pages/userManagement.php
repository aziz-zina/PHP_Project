<?php
session_start();
if (isset($_GET["state"])) {
    switch ($_GET["state"]) {
        case 1:
            echo "<script>alert('User edited.');</script>";
            break;
        case 2:
            echo "<script>alert('User has been deleted.');</script>";
            break;
        case 3:
            echo '<script>alert("You need to fill the form first!");</script>';
            break;
        case 4:
            echo '<script>alert("User has been validated");</script>';
            break;
    }
}
?>
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
    <a href="PgRegister.php"><img src="./add-user.png" alt="home.png" class="button2"></a>
    <div class="table-div">
        <table class="table table-hover">
            <thead style="background-color: #c3a48f;">
                <tr>
                    <th scope="col" style="color: black;">Login</th>
                    <th scope="col" style="color: black;">E-mail</th>
                    <th scope="col" style="color: black;">tel</th>
                    <th scope="col" style="color: black;">Type</th>
                    <th scope="col" style="color: black;">Validate</th>
                    <th scope="col" style="color: black;">Edit</th>
                    <th scope="col" style="color: black;">Remove</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_SESSION["login"]) && ($_SESSION["function"] == 1)) {
                    if ($_SESSION["function"] ==1) {
                    include '../database/basedados.h';
                    $sql = "SELECT * FROM user";
                    $retval = mysqli_query($conn, $sql);
                    if (!$retval) {
                        die('Could not get data: ' . mysqli_error($conn)); //Gives an error if it doesn't work 
                    }
                    while ($row = mysqli_fetch_array($retval)) {
                        echo "<tr class='table-secondary'><td>" . $row['Login'] . "</td>";
                        echo "<td>" . $row['Email'] . "</td>";
                        echo "<td>" . $row['Telephone'] . "</td>";
                        switch ($row['Type']) {
                            case 1:
                                echo "<td>Administrator</td>";
                                break;
                            case 2:
                                echo "<td>Employee</td>";
                                break;
                            case 3:
                                echo "<td>Validated client</td>";
                                break;
                            case 4:
                                echo "<td>Client not validated</td>";
                                break;
                        }
                        if ($row['Type'] != 1) {
                            if ($row['Type'] == 4) {
                                echo "<td><a href='validate.php?val=" . $row['Login'] . "'><img src='check-mark.png' class='management-icon'></a></td>";
                            } else {
                                echo "<td><a href='delete_user.php?val=" . $row['Login'] . "'></a></td>";
                            }
                            echo "<td><a href='Pgedit_user.php?val=" . $row['Login'] . "'><img src='edit.png' class='management-icon'></a></td>";
                            echo "<td><a href='delete_user.php?val=" . $row['Login'] . "'><img src='remove.png' class='management-icon'></a></td>";
                        } else {
                            echo "<td></td>";
                            echo "<td><a href='Pgedit_user.php?val=" . $row['Login'] . "'><img src='edit.png' class='management-icon'></a></td>";
                            echo "<td></td>";
                        }
                        echo "</tr>";
                    }
                    mysqli_close($conn);
                }
            }else {
                    header("location:homePage.php?state=3");
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>