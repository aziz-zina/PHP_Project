<?php
session_start();
if(isset($_SESSION["login"]) && isset($_SESSION["function"])){
    if($_SESSION["function"] == 1){
        if(!isset($_GET["emp"])){
            header("location: userManagement.php?state=3"); //If the form is not filled
        }
    } else {
        header("location: homePage.php?state=1"); //If the user is not an admin
    }
}else {
    header("location: PgLogin.php?state=2"); //If the user is not logged in, return to login
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
    <title>Employee Activities</title>
</head>

<body>
    <div id="frm2">
        <form name="f1" action="EmpAct.php" method="POST">
            <center>
                <label> Login: </label><br>
                <input type="text" id="login" name="login" value="<?php echo $_GET["emp"] ?>" readonly/><br><br>

                <label style="margin-left: -170px;"> Cut: </label><br>
                <input type="number" name="cut" required min="0" max="1" value="0" /><br><br>

                <label> Wash: </label><br>
                <input type="number" name="wash" required min="0" max="1" value="0" /><br><br>

                <label> Dog: </label><br>
                <input type="number" name="dog" required min="0" max="1" value="0" /><br><br>

                <label> Cat: </label><br>
                <input type="number" name="cat" required min="0" max="1" value="0" /><br><br>

                <button type="submit" class="btn btn-primary">Submit</button><br><br>
                <a href="PgLogin.php">Login here.</a><br>
                <a href="homePage.php">Go back to home page</a><br><br>
            </center>
        </form>
    </div>
</body>

</html>