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
if (isset($_SESSION["login"]) && isset($_POST["date"]) && isset($_POST["time"]) && isset($_POST["pet"]) && isset($_POST["service"])) {
    //Storing the form values
    $login = $_SESSION["login"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $pet = $_POST["pet"];
    $services = $_POST["service"];
    //Checking the service type
    if (count($services) == 1) {
        $srv = $services[0];
    } else if(count($services) == 2){
        $srv = "Both";
    }else{
        header("refresh:2;url = PgReservation.php?state=2"); //If the user doesn't choose a service, he goes back to the form
    }
    //Connecting to the database
    include '../database/basedados.h';
    //INSERT Query
    $sql = "INSERT INTO reservation (idClient, date, time, pet, serviceType) VALUES ('$login', '$date', '$time', '$pet', '$srv')";
    $retval = mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) == 1) {
        header("refresh:2;url = homePage.php");
    }
} else {
    header("refresh:2;url = PgReservation.php?state=1"); //If the form is not filled, goes back to the reservation page
}