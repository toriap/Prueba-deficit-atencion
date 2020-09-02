<?php
  require 'db.php';
  $db=connect();
  $usuario = $_POST['usuario'];
  $pass = $_POST['pass'];
  $salt = md5($pass);
  $pasword_encriptado = crypt($pass,$salt);
  $salida=0;
  if(empty($usuario) || empty($pass))
  {
    $salida =1;
  }


  $result = $db->query("SELECT * from usuario where cedula='$usuario'"); 

  if($row = $result->fetch_array())
  {
    if($row['contrasena'] ==  $pasword_encriptado)
    {
	    session_start();
	    $_SESSION['usuario'] = $usuario;
       $_SESSION['actualizado'] = 0;
      $_SESSION['login'] = 1;
      header("Location: menu.php");
	  }
	  else
	  {
	    $salida =1;
	  }
  }
  else
  {
	  $salida =1;
  }
    if($salida==1)
    {
	    printf("<script type='text/javascript'>alert('Usuario o Clave Invalida'); </script>");
      printf("<script> window.location.href='login.php';</script>");
    } 

?>