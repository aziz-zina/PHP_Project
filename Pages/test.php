<?php
if (isset($_POST['service'])) {
  $services = $_POST['service'];
  foreach ($services as $service) {
    // do something with the value, for example, save it to a database
    echo "Service: " . $service . "<br>";
  }
}
?>
