<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Form.css">
    <title>Register</title>
</head>

<body>
    <div id="frm">
        <img src="./loading_images.gif">
    </div>
</body>

</html>

<?php
session_start();

if (isset($_SESSION["login"]) && isset($_GET["id"]) && isset($_SESSION["function"])) {

    if($_SESSION["function"] != 4){
        //Storing the form values
        $id = $_GET["id"];

        //Connecting to the database
        include '../database/basedados.h';

        $sqli = "DELETE FROM reservation WHERE idReservation ='$id'";

        $retval = mysqli_query($conn, $sqli);
        if (!$retval) {
            die('Could not get data: ' . mysqli_error($conn)); //Gives an error if it doesn't work 
        }
        #$num = mysqli_num_rows($retval); //Checking how many rows are selected
        if ($_SESSION["function"] == 1) {
            header("refresh:2; url = AdminReservationsManagement.php?state=2"); // If the user is an Admin, it will go back to the personal 
        } else if($_SESSION["function"] == 2){
            header("refresh:2; url = EmployeeReservationsManagament.php?state=2");
        } elseif($_SESSION["function"] == 3) {
            header("refresh:2; url = personalReservationManagement.php?state=2");
        }
    } else {
        header("refresh:2; url = homePage.php?state=1");
    }
    
} else {
    if ($_SESSION["function"] == 1) {
        header("refresh:2; url = AdminReservationsManagement.php?state=3");
    } else {
        header("refresh:2; url = homePage.php?state=3");
    }
}