<?php
session_start();
function principal($m)
{
  include 'db.php';
  $db=connect();
  mysqli_set_charset($db,"utf8");
  $query = $db->query("SELECT * from sintoma where tipo_pregunta='$m' order by id");
  return $query;
}
function diagnostico($p,$m)
{
 include 'db.php';
 $db=connect();
 mysqli_set_charset($db,"utf8");
 $query = $db->query("SELECT * from v_resultado where pcedula='$p' and mcedula = '$m'");
 return $query;
}

function seguridad()
{
  if (empty($_SESSION['usuario']) )
  {
   session_destroy();
   header("Location: index.php");
 }

}

function ltn($n)
{
  if ($n == 1)
  {
    $b= 'B';
  }
  if ($n == 2)
  {
   $b= 'C';
 }
 if ($n == 3)
 {
   $b= 'D';
 }
 if ($n == 4)
 {
   $b= 'E';
 }
 return $b;
}
?>