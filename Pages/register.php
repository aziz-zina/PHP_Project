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
if (isset($_POST["login"]) && isset($_POST["pass"]) && isset($_POST["tel"]) && isset($_POST["name"]) && isset($_POST["email"])) {
    //Storing the form values
    $login = $_POST["login"];
    $name = $_POST["name"];
    $tel = $_POST["tel"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    //Connecting to the database
    include '../database/basedados.h';
    $sql = "SELECT * FROM user WHERE Login = '$login'";
    $retval = mysqli_query($conn, $sql);
    if (!$retval) {
        die('Could not get data: ' . mysqli_error($conn)); //Gives an error if it doesn't work 
    }
    $num = mysqli_num_rows($retval); //Checking how many rows are selected
    if ($num < 1) { //checks if the user does exist in the database before the insert
        //INSERT Query
        $sql = "INSERT INTO user (Login, Password, Name, Email, Telephone, Type) VALUES ('$login', '$pass', '$name', '$email', '$tel', 4)";
        $retval = mysqli_query($conn, $sql);

        if (mysqli_affected_rows($conn) == 1) {
            $_SESSION["login"] = $row["nomeUtilizador"];
            $_SESSION["function"] = $row["Type"];
            header("refresh:2;url = PgLogin.php");
        }
    } else {
        header("refresh:2;url = PgRegister.php?state=1");
    }
} else {
    session_destroy();
    header("refresh:2;url = PgRegister.php?state=2"); //If the form is not filled, goes back to the register page
}