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
if (isset($_SESSION["login"])) {
    
    if ($_SESSION["function"]==1) {    
        //Storing the form values
    
    $val = $_GET["val"];
    //Connecting to the database
    include '../database/basedados.h';
    //SQL Query
    $sql="UPDATE user SET type = 3 WHERE Login ='$val' ";

    $update = mysqli_query($conn, $sql);
    header("refresh:2;url = userManagement.php");

    }
    else
    {
        header("refresh:5;url = homePage.php?state=3"); //If the form is not filled, it goes back to the login page
    }
    
}   else {
    header("refresh:2;url = PgLogin.php?state=2"); //If the form is not filled, it goes back to the login page
}