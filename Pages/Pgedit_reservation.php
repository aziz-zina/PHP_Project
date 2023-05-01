<?php
session_start();
if (isset($_SESSION["login"]) && isset($_GET["id"])) {
    include '../database/basedados.h';
    $id = $_GET['id'];
    $today = date("Y-m-d");

    $retval = mysqli_query($conn, "SELECT * FROM reservation WHERE idReservation='$id'");
    if (!$retval) {
        die('Could not get data: ' . mysqli_error($conn)); //Gives an error if it doesn't work 
    }
    while ($row = mysqli_fetch_array($retval)) {
        $id = $row['idReservation'];
        $date = $row['date'];
        $time = $row['time'];
        $pet = $row['pet'];
        echo $pet;
        $services = $row['serviceType'];

    }
} else {
    header("Location: homePage.php?state=3"); //If the user doesn't choose a service, he goes back to the form
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
            <input type="hidden" name="idReservation" value="<?php echo $id ?>" />
            <center>
                <label> User: </label><br>
                <input type="text" value="<?php echo $_SESSION["login"] ?>" readonly><br><br>

                <label> Date: </label><br>
                <input type="date" id="date" name="date" required placeholder="date" min="<?php echo $today ?>"
                    value="<?php echo $date ?>" /><br><br>

                <label> Time: </label><br>
                <input type="time" id="time" name="time" required min="09:00:00" max="18:00:00"
                    value="<?php echo $time ?>" /><br><br>

                <label style="margin-left: -120px;"> Pick a Pet: </label><br>
                <select name="pet">
                    <?php
                    if ($pet == 'Dog') {
                        echo "<option value='Dog' selected>Dog</option>
                         <option value='Cat' >Cat</option>";
                    } else {
                        echo "<option value='Dog'>Dog</option>
                         <option value='Cat' selected>Cat</option>";
                    }
                    ?>
                </select><br><br>

                <label style="margin-left: -90px;"> Pick a service: </label><br>
                <div class="check-box">
                    <div class="form-check">
                        <?php
                        if ($services == 'Wash' or $services == 'Both') {
                            echo '<input class="form-check-input" type="checkbox" value="Wash" checked id="flexCheckChecked" name="service[]">';
                        } else {
                            echo '<input class="form-check-input" type="checkbox" value="Wash" id="flexCheckChecked" name="service[]">';
                        }
                        ?>
                        <label class="form-check-label" for="flexCheckDefault">
                            Wash
                        </label>
                    </div>
                    <div class="form-check">
                        <?php
                        if ($services == 'Cut' or $services == 'Both') {
                            echo '<input class="form-check-input" type="checkbox" value="Cut" checked id="flexCheckChecked" name="service[]">';
                        } else {
                            echo '<input class="form-check-input" type="checkbox" value="Cut" id="flexCheckChecked" name="service[]">';
                        }
                        ?>
                        <label class="form-check-label" for="flexCheckChecked">
                            Cut
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