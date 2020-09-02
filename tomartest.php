<?php
  session_start();
  include 'db.php';
  $db=connect();

  $cd = $_POST['cedula'];

  $_SESSION['paciente'] = $cd; 
  header("location: main.php");

?>
