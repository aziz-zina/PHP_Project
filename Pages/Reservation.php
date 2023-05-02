<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Form.css">
    <title>Reservation</title>
</head>

<body>
    <div id="frm">
        <img src="./loading_images.gif">
    </div>
</body>

</html>

<?php
session_start();
if (isset($_SESSION["login"]) && isset($_POST["date"]) && isset($_POST["time"]) && isset($_POST["pet"]) && isset($_POST["service"]) && isset($_POST["employee"]) && isset($_POST["user"])) {
    //Connecting to the database
    include '../database/basedados.h';
    //Storing the form values
    $login = $_POST["user"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $pet = $_POST["pet"];
    $service = $_POST["service"];
    $employee = $_POST["employee"];
    $sql = "SELECT * FROM reservation WHERE time = '$time' AND date = '$date'";
    $retval = mysqli_query($conn, $sql);
    if (!$retval) {
        die('Could not get data: ' . mysqli_error($conn)); //Gives an error if it doesn't work 
    }
    $num = mysqli_num_rows($retval); //Checking how many rows are selected
    if ($num >= 1) {
        header("refresh:2;url = PgReservation.php?state=3"); //If there is no row selected, goes back to the login page
        die();
    } else {
        //INSERT Query
        if (isset($_POST["idReservation"])) {
            $id = $_POST["idReservation"];
            $sql = "UPDATE reservation SET 	EmployeeUser = '$employee', date = '$date', time = '$time', pet = '$pet', serviceType = '$service' WHERE idReservation = '$id'";
        } else {
            $sql = "INSERT INTO reservation (idClient, date, time, pet, serviceType, EmployeeUser) VALUES ('$login', '$date', '$time', '$pet', '$service', '$employee')";
        }
        $retval = mysqli_query($conn, $sql);

        if (mysqli_affected_rows($conn) == 1) {
            header("refresh:2;url = homePage.php");
        }
    }
} else {
    header("refresh:2;url = PgReservation.php?state=1"); //If the form is not filled, goes back to the reservation page
}