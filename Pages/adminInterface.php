<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Form.css">
  <title>Login</title>
  <style>
    #frminterface {

      border: solid gray 1px;
      width: 60%;
      border-radius: 80px;
      margin: 80px auto;
      background: #c3a48f;
      padding: 90px;

    }

    #box {
      position: relative;
      top: -30px;

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
      font-weight: bold;

      padding: 40px 100px;
      /* set padding */
      margin: 50px;
      /* add margin between buttons */
      cursor: pointer;
    }
  </style>
</head>

<body>
  <div id="frminterface">
    <form name="f1">
      <div class="button-container" id="box">
        <button type="submit" formaction="ManagemenetReservation.php" class="button">MANAGEMENT OF RESERVATION</button>
        <button class="button" type="submit" formaction="ManagemenetPersonal.php"> MANAGEMENT PERSONAL ACCOUNT</button>
      </div>


      <button class="button" style="margin: 0;
  position: absolute;
  top: 55%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);

  "> USER <br> MANAGEMENT</button>

    </form>
  </div>


</body>

</html>