<?php
session_start();
echo "<script>alert('" . $_SESSION["login"] . "');</script>";
?>