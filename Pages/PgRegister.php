<?php
session_start();
if (isset($_GET["state"])) {
    switch ($_GET["state"]) {
        case 1:
            echo "<script>alert('This user already exists !!');</script>";
            break;
        case 2:
            echo "<script>alert('You need to fill out the form first !');</script>";
            break;
        case 3:
            echo '<script>alert("You don\'t have access to this page.");</script>';
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
    <link rel="stylesheet" href="Form.css">
    <title>Register</title>
</head>

<body>
    <div id="frm2">
        <form name="f1" action="register.php" method="POST">
            <center>
                <label> Login: </label><br>
                <input type="text" id="login" name="login" required placeholder="Login"/><br><br>
                
                <label> Email: </label><br>
                <input type="email" id="email" name="email" required placeholder="E-mail"/><br><br>

                <label> Name: </label><br>
                <input type="text" id="name" name="name" required placeholder="Name"/><br><br>

                <label style="margin-left: -130px;"> Telephone: </label><br>
                <input type="tel" id="tel" name="tel" required placeholder="Telephone number"/><br><br>

                <label style="margin-left: -126px;"> Password: </label><br>
                <input type="password" id="pass" name="pass" required placeholder="Password"/><br><br>

                <input type="submit" id="btn" value="Register" /><br>
                <a href="PgLogin.php">Login here.</a>
            </center>
        </form>
    </div>
</body>

</html>