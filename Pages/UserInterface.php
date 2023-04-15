<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Form.css">
    <title>Login</title>
    <style>
        #frminterface{

border: solid gray 1px;
width: 60%;
border-radius: 80px;
margin:80px auto;
background: #c3a48f;
padding: 90px;

}

.button-container {
  display: flex; /* set display to flex */
  justify-content: center; /* horizontally center items */
  align-items: center; /* vertically center items */
}

.button {
  background-color: #E5C49D ; /* set background color */
  border: 1px solid #000000; /* set border */
  color: #010101; /* set text color */
  font-weight: bold;

  padding: 40px 60px; /* set padding */
  margin: 50px; /* add margin between buttons */
}


      
    </style>
</head>

<body>
    <div id="frminterface" >
        <form name="f1" >
                <div class="button-container" >
  <button type="submit" formaction="ManagemenetReservation.php" class="button">MANAGEMENT OF PERSONAL  RESERVATION</button>
  <button class="button" type="submit" formaction="ManagemenetPersonal.php"> MANAGEMENT PERSONAL ACCOUNT</button>
</div>


        </form>
    </div>
 
  
</body>

</html>