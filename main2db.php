<?php
  session_start();
  include 'db.php';
  $db=connect();
  mysqli_set_charset($db,"utf8");

  $cp=$_SESSION['paciente'];
  $re = $_POST['cont'];
  
  $paciente=$db->query("SELECT id FROM paciente WHERE cedula ='$cp'");

  while ($row = $paciente->fetch_array())
  {
    $p=$row[0];
  }

  $update=$db->query("UPDATE hechos SET res_b ='$re' WHERE paciente ='$p'");

  $error=$db->error;

  if($update)
  {
    header("location: main3.php");
  }
  elseif (substr($error, 0,15)=='Duplicate entry')
  {
    $_SESSION['result'] = "El paciente ya había sido diagnosticado con anterioridad"; 
    $_SESSION['actualizado'] = '3';
    header("location: menu.php");
  }
  else
  {
    die($error);
  }
?>
