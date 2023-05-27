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
if (isset($_POST["login"]) && isset($_POST["tel"]) && isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["pass"]) && isset($_SESSION["function"])) {
    if($_SESSION["function"] == 1){
        //Storing the form values
        $login = $_POST["login"];
        $name = $_POST["name"];
        $tel = $_POST["tel"];
        $email = $_POST["email"];
        $password = $_POST["pass"];
        //Connecting to the database
        include '../database/basedados.h';

        $sqli = "UPDATE user 
        SET Email = '$email',
        Name = '$name',
        Password   = '$password',
        Telephone = '$tel'
        WHERE Login ='$login'";
        $retval = mysqli_query($conn, $sqli);
        if (!$retval) {
            die('Could not get data: ' . mysqli_error($conn)); //Gives an error if it doesn't work 
        }
        #$num = mysqli_num_rows($retval); //Checking how many rows are selected
        header("refresh:2;url = userManagement.php?state=1");
    }else {
        header("refresh:2;url = homePage.php?state=3");
    }

} else {
    else {
        header("refresh:2;url = userManagement.php?state=3"); //If the form is not filled, goes back to the user management page
    }

}