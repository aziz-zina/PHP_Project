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
if (isset($_SESSION["login"]) && isset($_SESSION["function"])) {
    if ($_SESSION["function"] == 1) {
        if (isset($_POST["login"]) && isset($_POST["email"]) && isset($_POST["name"]) && isset($_POST["tel"]) && isset($_POST["type"]) && isset($_POST["pass"])) {
            $login = $_POST["login"];
            $email = $_POST["email"];
            $name = $_POST["name"];
            $tel = $_POST["tel"];
            $type = $_POST["type"];
            $pass = $_POST["pass"];

            include '../database/basedados.h';

            if ($_POST["type"] == 2) {
                $sqli = "UPDATE user SET Email = '$email', Name = '$name', Password = '$pass', Telephone = '$tel', Type = '$type' WHERE Login ='$login'";
                $retval = mysqli_query($conn, $sqli);
                if (!$retval) {
                    die('Could not get data: ' . mysqli_error($conn)); //Gives an error if it doesn't work 
                }
                header("refresh:2;url = PgEmpAct.php?emp=" . $login); //If the user is not an admin
            } else {
                ?>
                <center>
                    <form id="sub" action="edit_user.php" method="POST">
                        <input type="hidden" name="login" value="<?php echo $login ?>" readonly>
                        <input type="hidden" name="email" value="<?php echo $email ?>" readonly>
                        <input type="hidden" name="name" value="<?php echo $name ?>" readonly>
                        <input type="hidden" name="tel" value="<?php echo $tel ?>" readonly>
                        <input type="hidden" name="type" value="<?php echo $type ?>" readonly />
                        <input type="hidden" name="password" value="<?php echo $pass ?>" readonly />
                        <input type="submit" value="Submit" autofocus>
                    </form>
                </center>
                <?php
            }
        }
    } else {
        header("refresh:2;url = homePage.php?state=1"); //If the user is not an admin
    }
} else {
    header("refresh:2;url = PgLogin.php?state=2"); //If the user is not logged in, return to login
}
?>