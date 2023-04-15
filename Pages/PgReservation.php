<?php
session_start();
if (isset($_SESSION["login"])) {
    if ($_SESSION["function"] == 4) {
        header("location:PgLogin.php?state=3");
    }
    $today = date("Y-m-d");
} else {
    session_destroy();
    header("location:PgLogin.php?state=2");
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
    <title>Reservation</title>
    <style>
        .check-box{
            display: grid;
            text-align: center;
            margin-left: 40px;
        }
    </style>
</head>

<body>
    <div id="frm2">
        <form name="f1" action="test.php" method="POST">
            <center>
                <label> User: </label><br>
                <input type="text" value="<?php echo $_SESSION["login"] ?>" readonly><br><br>

                <label> Date: </label><br>
                <input type="date" id="date" name="date" required placeholder="date"
                    min="<?php echo $today ?>" /><br><br>

                <label> Time: </label><br>
                <input type="time" id="time" name="time" required min="09:00:00" max="18:00:00" /><br><br>

                <label style="margin-left: -120px;"> Pick a Pet: </label><br>
                <select name="pet">
                    <option value="dog">Dog</option>
                    <option value="cat">Cat</option>
                </select><br><br>

                <label style="margin-left: -90px;"> Pick a service: </label><br>
                <div class="check-box">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Cut" id="flexCheckDefault" name="service[]">
                        <label class="form-check-label" for="flexCheckDefault">
                            Cut
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Wash" id="flexCheckChecked" name="service[]">
                        <label class="form-check-label" for="flexCheckChecked">
                            Wash
                        </label>
                    </div>
                </div>
                <br>

                <button type="submit" class="btn btn-primary">Submit</button><br><br>
                <a href="PgLogin.php">Login here.</a><br>
                <a href="homePage.php">Go back to home page</a><br><br>
            </center>
        </form>
    </div>
</body>

</html>