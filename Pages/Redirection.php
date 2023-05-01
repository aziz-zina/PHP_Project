<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Form.css">
    <title>Loading</title>
</head>

<body>
    <div id="frm">
        <img src="./loading_images.gif">
    </div>
</body>

</html>
<?php
session_start();
if (isset($_SESSION["login"]) && isset($_SESSION["function"])) {
    // Cheking the function of the current user
    if ($_SESSION["function"] == 1) {
        header("refresh:2;url = adminInterface.php"); // If the user is an admin he will go the admin page
    } else if ($_SESSION["function"] == 2) {
        header("refresh:2;url = employeeInterface.php"); // If the user is an employee he will go the employee page
    } else if ($_SESSION["function"] == 3) {
        header("refresh:2;url = userInterface.php"); // If the user is a user he will go the user page
    } else if ($_SESSION["function"] == 4) {
        header("refresh:2;url = homePage.php?state=1"); // If the user is not valid he will go to the home page
    }
} else {
    session_destroy();
    header("refresh:2;url = PgLogin.php?state=2"); //If the form is not filled, it goes back to the login page
}