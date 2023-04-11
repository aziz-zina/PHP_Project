<?php
session_start();
if (isset($_GET["state"])) {
    switch ($_GET["state"]) {
        case 1:
            echo "<script>alert('This user doesn\'t exist !!');</script>";
            break;
        case 2:
            echo "<script>alert('You need to authenticate first !');</script>";
            break;
        case 3:
            echo '<script>alert("You don\'t have access to this page.");</script>';
            break;
        case 4:
            echo '<script>alert("Disconnected");</script>';
            break;
        case 5:
            echo '<script>alert("This function doesn\'t exist.");</script>';
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
    <link rel="stylesheet" href="bootstrap.css">
    <title>Login</title>
</head>

<body>
    <div id="frm">
        <form name="f1" action="login.php" method="POST">
            <center>
                <label> Login: </label><br>
                <input type="text" id="login" name="login" required placeholder="Login" /><br><br>

                <label> Password: </label><br>
                <input type="password" id="pass" name="pass" required placeholder="Password" /><br><br>

                <button type="submit" class="btn btn-primary">Submit</button><br><br>
                <a href="PgRegister.php">Don't have an account? Register here.</a><br>
                <a href="homePage.php">Go back to home page</a>
            </center>
        </form>
    </div>
</body>

</html>