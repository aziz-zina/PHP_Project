<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Form.css">
    <title>Employee Activities</title>
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
        if (isset($_POST["login"]) && isset($_POST["cat"]) && isset($_POST["dog"]) && isset($_POST["wash"]) && isset($_POST["cut"])) {
            $login = $_POST["login"];
            $cut = $_POST["cut"];
            $wash = $_POST["wash"];
            $dog = $_POST["dog"];
            $cat = $_POST["cat"];

            include '../database/basedados.h';

            $sql = "SELECT * FROM employeeact WHERE EmployeeUser = '$login'";
            $retval = mysqli_query($conn, $sql);
            if (!$retval) {
                die('Could not get data: ' . mysqli_error($conn)); //Gives an error if it doesn't work 
            }
            $num = mysqli_num_rows($retval); //Checking how many rows are selected
            if ($num >= 1) {
                $sql = "UPDATE employeeact SET Cut = '$cut', Wash = '$wash', Cat = '$cat', Dog = '$dog' WHERE EmployeeUser = '$login'";
            } else {
                $sql = "INSERT INTO employeeact (Cut, WAsh, Cat, Dog, EmployeeUser) VALUES ('$cut', '$wash', '$cat', '$dog', '$login')";
            }
            $retval = mysqli_query($conn, $sql);
            if (!$retval) {
                die('Could not get data: ' . mysqli_error($conn)); //Gives an error if it doesn't work 
            }
            if (mysqli_affected_rows($conn) == 1) {
                header("refresh:2;url = userManagement.php?state=1");
            }
        } else {
            header("location: userManagement.php?state=3"); //If the form is not filled
        }
    } else {
        header("location: homePage.php?state=1"); //If the user is not an admin
    }
} else {
    header("location: PgLogin.php?state=2"); //If the user is not logged in, return to login
}
?>