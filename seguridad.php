<?php
function seguridad()
{
  session_start();
  if (empty($_SESSION['usuario']) )
  {
     session_destroy();
     header("Location: login.php");
  }

}
function rol ()
{
  if($_SESSION['rol'] == 'adm')
  {
  	return 3;
  }
  else if($_SESSION['rol'] == 'doc')
  {
    return 1;
  }
  else
  {
  	return 0;
  }
  
}
?>