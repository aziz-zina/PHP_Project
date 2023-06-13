<?php
session_start();
if ((isset($_SESSION["login"]) && isset($_SESSION["function"]))) {
    if (($_SESSION["function"] != 1) || (empty($_GET['val']))) {
        header("location:homePage.php?state=3");
    }
    include '../database/basedados.h';
    $val = $_GET['val'];
    $retval = mysqli_query($conn, "SELECT * FROM user WHERE Login='$val'");
    if (!$retval) {
        die('Could not get data: ' . mysqli_error($conn)); //Gives an error if it doesn't work 
    }
    while ($row = mysqli_fetch_array($retval)) {
        $login = $row['Login'];
        $mail = $row['Email'];
        $name = $row['Name'];
        $phone = $row['Telephone'];
        $type = $row['Type'];
    }
} else {
    header("location:userManagement.php");
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
    <title>Register</title>
</head>

<body>
    <div id="frm2">
        <form name="f1" action="loading.php" method="POST">
            <center>
                <label> Login: </label><br>
                <input type="text" id="login" readonly name="login" required placeholder="Login"
                    value="<?php echo $login ?>" /><br><br>

                <label> Email: </label><br>
                <input type="email" id="email" name="email" required placeholder="E-mail"
                    value="<?php echo $mail ?>" /><br><br>

                <label> Name: </label><br>
                <input type="text" id="name" name="name" required placeholder="Name"
                    value="<?php echo $name ?>" /><br><br>

                <label style="margin-left: -120px;"> Telephone: </label><br>
                <input type="tel" id="tel" name="tel" required placeholder="Telephone number"
                    value="<?php echo $phone ?>" /><br><br>

                <label style="margin-left: -126px;"> Type: </label><br>
                <input type="number" id="type" name="type" required placeholder="Type" value="<?php echo $type ?>" min="1" max="4"/><br><br>

                <label style="margin-left: -126px;"> Password: </label><br>
                <input type="password" id="pass" name="pass" required placeholder="Password" /><br><br>


                <button type="submit" class="btn btn-primary">EDIT</button><br><br>
                <a href="userManagement.php">Go Back.</a><br>
            </center>
        </form>
    </div>
</body>

</html>