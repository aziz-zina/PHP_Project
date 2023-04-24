<?php
  session_start();
    if (isset($_SESSION["login"]) && isset($_SESSION["function"])) {
      include '../database/basedados.h';
      $val=$_GET['val'];
      
      $retval = mysqli_query($conn,"SELECT * FROM user WHERE Login='$val'");
      if (!$retval) {
          die('Could not get data: ' . mysqli_error($conn)); //Gives an error if it doesn't work 
      }
      $row = mysqli_fetch_array($retval);
}
#now update
$sqli="UPDATE user SET Email = ".$row['Email']." , Name = ".$row['Name']." , Telephone = ".$row['Telephone']."  WHERE Login =".$val." ";
$update = mysqli_query($conn,$sqli);

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
        <form name="f1" action="edit_user.php" method="POST">
            <center>
                <label> Login: </label><br>
                <input type="text" id="login" readonly name="login" required placeholder="Login" value="<?php echo $row["Login"] ?>" /><br><br>
                
                <label> Email: </label><br>
                <input type="email" id="email" name="email" required placeholder="E-mail" value="<?php echo $row["Email"] ?>"/><br><br>

                <label> Name: </label><br>
                <input type="text" id="name" name="name" required placeholder="Name" value="<?php echo $row["Name"] ?>"/><br><br>

                <label style="margin-left: -120px;"> Telephone: </label><br>
                <input type="tel" id="tel" name="tel" required placeholder="Telephone number" value="<?php echo $row["Telephone"] ?>"/><br><br>

              

                <button type="submit" class="btn btn-primary">EDIT</button><br><br>
                <a href="userManagemenet.php">Go Back.</a><br>
            </center>
        </form>
    </div>
</body>

</html>