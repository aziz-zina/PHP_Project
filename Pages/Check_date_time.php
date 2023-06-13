<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Form.css">
    <title>Checking date and time</title>
    <style>
        #sub {
            margin-top: -100px;
        }
    </style>
</head>

<body>
    <div id="frm">
        <img src="./loading_images.gif">
    </div>
</body>

</html>
<?php
session_start();
if (isset($_SESSION["function"]) && isset($_SESSION["login"])) {
    if (isset($_POST["date"]) && isset($_POST["time"]) && isset($_POST["pet"]) && !empty($_POST["user"])) {
        if (isset($_POST["service"])) {
            include '../database/basedados.h';
            $user = $_POST["user"];
            $date = $_POST["date"];
            $time = $_POST["time"];
            $pet = $_POST["pet"];
            $services = $_POST["service"];
            //Checking the service type
            if (count($services) == 1) {
                $srv = $services[0];
            } else if (count($services) == 2) {
                $srv = "Both";
            }
            if (isset($_POST["idReservation"])) {
                $id = $_POST["idReservation"];
                echo $id;
                $sql = "SELECT * FROM reservation WHERE time = '$time' AND date = '$date' AND idReservation <> '$id';";
                $retval = mysqli_query($conn, $sql);
                if (!$retval) {
                    die('Could not get data: ' . mysqli_error($conn)); //Gives an error if it doesn't work 
                }
                $num = mysqli_num_rows($retval); //Checking how many rows are selected
                if ($num >= 1) {
                    header("refresh:2;url = PgReservation.php?state=3");
                } else {
                    ?>
                    <center>
                        <form id="sub" action="pickEmployee.php" method="POST">
                            <input type="hidden" name="idReservation" value="<?php echo $id ?>" readonly>
                            <input type="hidden" name="user" value="<?php echo $user ?>" readonly>
                            <input type="hidden" name="pet" value="<?php echo $pet ?>" readonly>
                            <input type="hidden" name="service" value="<?php echo $srv ?>" readonly>
                            <input type="hidden" id="date" name="date" required placeholder="date" value="<?php echo $date ?>" readonly />
                            <input type="hidden" id="time" name="time" value="<?php echo $time ?>" readonly />
                            <input type="submit" value="Submit" autofocus>
                        </form>
                    </center>
                    <?php
                }
            } else {
                $sql = "SELECT * FROM reservation WHERE time = '$time' AND date = '$date'";
                $retval = mysqli_query($conn, $sql);
                if (!$retval) {
                    die('Could not get data: ' . mysqli_error($conn)); //Gives an error if it doesn't work 
                }
                $num = mysqli_num_rows($retval); //Checking how many rows are selected
                if ($num >= 1) {
                    header("refresh:2;url = PgReservation.php?state=3");
                } else {
                    ?>
                    <center>
                        <form id="sub" action="pickEmployee.php" method="POST">
                            <input type="hidden" name="user" value="<?php echo $user ?>" readonly>
                            <input type="hidden" name="pet" value="<?php echo $pet ?>" readonly>
                            <input type="hidden" name="service" value="<?php echo $srv ?>" readonly>
                            <input type="hidden" id="date" name="date" required placeholder="date" value="<?php echo $date ?>" readonly />
                            <input type="hidden" id="time" name="time" value="<?php echo $time ?>" readonly />
                            <input type="submit" value="Submit" autofocus>
                        </form>
                    </center>
                    <?php
                }
            }

        } else {
            header("refresh:2;url = PgReservation.php?state=2"); //If the user doesn't choose a service, he goes back to the form
        }

    } else {
        header("refresh:2;url = PgReservation.php?state=1"); //If the form is not filled, he goes back to the form
    }

} else {
    header("refresh:2;url = PgLogin.php?state=2"); //If the user is not logged in, return to login
}
?>