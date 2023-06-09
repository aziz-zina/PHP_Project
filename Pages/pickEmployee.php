<?php
session_start();
if (isset($_SESSION["login"]) && isset($_POST["user"]) && isset($_POST["date"]) && isset($_POST["time"]) && isset($_POST["pet"]) && isset($_POST["service"])) {

    $user = $_POST["user"];
    echo $user;
    if ($_SESSION["function"] == 4) {
        header("location:homePage.php?state=1");
    }
    $date = $_POST["date"];
    echo $date;
    $time = $_POST["time"];
    echo $time;
    $pet = $_POST["pet"];
    echo $pet;
    $services = $_POST["service"];
    echo $services;
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
            <form name="f1" action="Reservation.php" method="POST">
                <?php
                if (isset($_POST["idReservation"])) {
                    $id = $_POST["idReservation"];
                    echo "<input type='hidden' name='idReservation' value='" . $id . "' />";
                }
                ?>
                <center>
                    <label> User: </label><br>
                    <input type="text" name="user" value="<?php echo $user ?>" readonly><br><br>

                    <label> Pet: </label><br>
                    <input type="text" name="pet" value="<?php echo $pet ?>" readonly><br><br>

                    <label style="margin-left: -140px;"> Service: </label><br>
                    <input type="text" name="service" value="<?php echo $services ?>" readonly><br><br>

                    <label> Date: </label><br>
                    <input type="date" id="date" name="date" required placeholder="date" value="<?php echo $date ?>"
                        readonly /><br><br>

                    <label> Time: </label><br>
                    <input type="time" id="time" name="time" value="<?php echo $time ?>" readonly /><br><br>

                    <label style="margin-left: -120px;"> Pick an employee: </label><br>
                    <select name="employee">
                        <option value="">--- Choose an employee ---</option>
                        <?php
                        include '../database/basedados.h';
                        if ($pet == "Dog") {
                            if ($services == "Cut") {
                                $sql = "SELECT * FROM employeeact WHERE Dog = 1 AND Cut = 1";
                            } else if ($services == "Wash") {
                                $sql = "SELECT * FROM employeeact WHERE Dog = 1 AND Wash = 1";
                            } else {
                                $sql = "SELECT * FROM employeeact WHERE Dog = 1 AND Wash = 1 AND Cut = 1";
                            }
                        } else {
                            if ($services == "Cut") {
                                $sql = "SELECT * FROM employeeact WHERE Cat = 1 AND Cut = 1";
                            } else if ($services == "Wash") {
                                $sql = "SELECT * FROM employeeact WHERE Cat = 1 AND Wash = 1";
                            } else {
                                $sql = "SELECT * FROM employeeact WHERE Cat = 1 AND Wash = 1 AND Cut = 1";
                            }
                        }
                        $retval = mysqli_query($conn, $sql);
                        if (!$retval) {
                            die('Could not get data: ' . mysqli_error($conn)); //Gives an error if it doesn't work 
                        }
                        while ($row = mysqli_fetch_array($retval)) {
                            echo "<option value='" . $row["EmployeeUser"] . "'> " . $row["EmployeeUser"] . "</option>";
                        }

                        ?>
                    </select><br><br>

                    <button type="submit" class="btn btn-primary">Submit</button><br><br>
                </center>
            </form>
        </div>
    </body>

    </html>
    <?php
} else {
    header("location: PgReservation.php?state=1");
}
?>