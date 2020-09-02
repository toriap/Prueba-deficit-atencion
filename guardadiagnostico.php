<?php
  session_start();
  include 'db.php';
  $db=connect();
  mysqli_set_charset($db,"utf8");

  $cm=$_SESSION['usuario'];
  $cp=$_SESSION['paciente'];
  $re = $_POST['resultado'];
  $ob= $_POST['obs'];
  
  $medico=$db->query("SELECT id FROM usuario WHERE cedula ='$cm'");
  $paciente=$db->query("SELECT id FROM paciente WHERE cedula ='$cp'");

  while ($row = $medico->fetch_array())
  {
    $m=$row[0];
  }
  while ($row = $paciente->fetch_array())
  {
    $p=$row[0];
  }

  $insert=$db->query("INSERT INTO resultado (diagnostico,paciente,medico,observacion) VALUES ('$re','$p','$m','$ob')");

  $error=$db->error;

  if($insert)
  {
    header("location: resultadopaciente.php");
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
