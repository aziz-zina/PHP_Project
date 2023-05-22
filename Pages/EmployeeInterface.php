<?php
session_start();
if (isset($_SESSION["login"]) && isset($_SESSION["function"])) {
  if ($_SESSION["function"] > 2) {
    header("location:homePage.php?state=3");
  }
} else {
  header("localtion: PgLogin.php?state=2");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Form.css">
  <title>Employee Interface</title>
  <style>
    #frminterface {

      border: solid gray 1px;
      width: 60%;
      border-radius: 80px;
      margin: 80px auto;
      background: #c3a48f;
      padding: 90px;

    }

    .button-container {
      display: flex;
      /* set display to flex */
      justify-content: center;
      /* horizontally center items */
      align-items: center;
      /* vertically center items */
    }

    .button {
      background-color: #E5C49D;
      /* set background color */
      border: 1px solid #000000;
      /* set border */
      color: #010101;
      /* set text color */
      font-weight: bold;

      padding: 40px 60px;
      /* set padding */
      margin: 50px;
      /* add margin between buttons */
    }

    img {
      width: 60px;
      height: 60px;
      display: flex;
    }
  </style>
</head>

<body>
  <div id="frminterface">
    <form name="f1">
      <div class="button-container">
        <a href="EmployeeReservationsManagament.php"><button class="button" type="button">MANAGEMENT OF PERSONAL
            RESERVATION</button></a>
        <button class="button" type="submit" formaction="Pgpersonal_info.php"> MANAGEMENT PERSONAL ACCOUNT</button>
      </div>
      <a href="./homePage.php"><img src="./home.png" alt="home.png"></a>

    </form>
  </div>
</body>

</html>