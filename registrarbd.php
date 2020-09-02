<?php
  session_start();
  include 'db.php';
  $db=connect();

  $nb=$_POST['nombre'];
  $ap=$_POST['apellido'];
  $cd=$_POST['cedula'];
  $dr=$_POST['direccion'];
  $tl=$_POST['telefono'];
  $cr=$_POST['correo'];


  $insert=$db->query("INSERT INTO paciente (nombre,apellido,cedula,direccion,telefono,correo) VALUES ('$nb','$ap','$cd','$dr','$tl','$cr')");

  $error=$db->error;

  if($insert)
  {
  	$_SESSION['paciente'] = $cd; 
    header("location: main.php");
  }
  elseif (substr($error, 0,15)=='Duplicate entry')
  {
  	$_SESSION['result'] = "El paciente fue registrado con anterioridad"; 
  	$_SESSION['actualizado'] = '3';
  	header("location: registrar.php");
  }
  
  



?>
