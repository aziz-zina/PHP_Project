<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Form.css">
    <title>Login</title>
</head>

<body>
    <div id="frm">
        <img src="./loading_images.gif">
    </div>
</body>

</html>

<?php
session_start();
if (isset($_POST["login"]) && isset($_POST["pass"])) {
    //Storing the form values
    $login = $_POST["login"];
    $pass = $_POST["pass"];
    //Connecting to the database
    include '../database/basedados.h';
    //SQL Query
    $sql = "SELECT * FROM user WHERE Login = '$login' AND Password ='$pass'";
    $retval = mysqli_query($conn, $sql);
    if (!$retval) {
        die('Could not get data: ' . mysqli_error($conn)); //Gives an error if it doesn't work 
    }
    $num = mysqli_num_rows($retval); //Checking how many rows are selected
    if ($num < 1) {
        header("refresh:2;url = PgLogin.php?state=1"); //If there is no row selected, goes back to the login page
        die();
    } else {
        $row = mysqli_fetch_array($retval);
        //Storing the login and the function in session variables
        $_SESSION["login"] = $login;
        $_SESSION["function"] = $row["Type"];
        if ($_SESSION["function"] == 4) {
            header("Refresh:2; url=homePage.php?state=1");
        } else {
            header("Refresh:2; url=homePage.php");
        }
    }
} else {
    session_destroy();
    header("refresh:2;url = PgLogin.php?state=2"); //If the form is not filled, it goes back to the login page
}