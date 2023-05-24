<?php
session_start();
if (isset($_SESSION["login"])) {
    if ($_SESSION["function"] == 4) {
        header("location:homePage.php?state=1");
    }
    $today = date("Y-m-d");
} else {
    header("location:PgLogin.php?state=2");
}
if (isset($_GET["state"])) {
    switch ($_GET["state"]) {
        case 1:
            echo "<script>alert('You have to fill this form first!!');</script>";
            break;
        case 2:
            echo "<script>alert('You need to choose a service first !');</script>";
            break;
        case 3:
            echo "<script>alert('You need to choose a unique time and date !');</script>";
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
    <title>Reservation</title>
    <style>
        .check-box {
            display: grid;
            text-align: center;
            margin-left: 40px;
        }
    </style>
</head>

<body>
    <div id="frm2">
        <form name="f1" action="pickEmployee.php" method="POST">
            <center>
                <?php
                if($_SESSION["function"] == 1){
                ?>
                <label style="margin-left: -95px;"> Pick the user: </label><br>
                <select name="user">
                    <option value="">--Choose a user--</option>
                    <?php
                    include '../database/basedados.h';
                    $sql = "SELECT * FROM user WHERE Type <> 4";
                    $retval = mysqli_query($conn, $sql);
                    if (!$retval) {
                        die('Could not get data: ' . mysqli_error($conn)); //Gives an error if it doesn't work 
                    }
                    while ($row = mysqli_fetch_array($retval)) {
                        echo "<option value='" . $row['Login'] . "'>" . $row['Login'] . "</option>";
                    }
                    ?>
                </select><br><br>
                <?php                    
                } else if($_SESSION["function"] == 2){
                ?>
                <label style="margin-left: -95px;"> Pick the user: </label><br>
                <select name="user">
                    <option value="">--Choose a user--</option>
                    <?php
                    include '../database/basedados.h';
                    $sql = "SELECT * FROM user WHERE type = 3 OR (type = 2 AND login = '" . $_SESSION["login"] . "');";
                    $retval = mysqli_query($conn, $sql);
                    if (!$retval) {
                        die('Could not get data: ' . mysqli_error($conn)); //Gives an error if it doesn't work 
                    }
                    while ($row = mysqli_fetch_array($retval)) {
                        echo "<option value='" . $row['Login'] . "'>" . $row['Login'] . "</option>";
                    }
                    ?>
                </select><br><br>
                <?php
                } else {
                ?>
                <label> User: </label><br>
                <input type="text" value="<?php echo $_SESSION["login"] ?>" readonly><br><br>
                <?php 
                }
                ?>
                <label> Date: </label><br>
                <input type="date" id="date" name="date" required placeholder="date"
                    min="<?php echo $today ?>" /><br><br>

                <label> Time: </label><br>
                <input type="time" id="time" name="time" required min="09:00:00" max="18:00:00" step="1800" /><br><br>

                <label style="margin-left: -120px;"> Pick a Pet: </label><br>
                <select name="pet">
                    <option value="Dog">Dog</option>
                    <option value="Cat">Cat</option>
                </select><br><br>

                <label style="margin-left: -90px;"> Pick a service: </label><br>
                <div class="check-box">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Cut" id="flexCheckDefault"
                            name="service[]">
                        <label class="form-check-label" for="flexCheckDefault">
                            Cut
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Wash" id="flexCheckChecked"
                            name="service[]">
                        <label class="form-check-label" for="flexCheckChecked">
                            Wash
                        </label>
                    </div>
                </div>
                <br>

                <button type="submit" class="btn btn-primary">Submit</button><br><br>
                <a href="homePage.php">Go back to home page</a><br><br>
            </center>
        </form>
    </div>
</body>

</html>