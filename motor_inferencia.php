<?php
	session_start();
	include 'db.php';
	$db=connect();
	mysqli_set_charset($db,"utf8");

	$cp=$_SESSION['paciente'];
  
    $paciente=$db->query("SELECT id FROM paciente WHERE cedula ='$cp'");

    while ($row = $paciente->fetch_array())
    {
      $p=$row[0];
    }

	$resultados=$db->query("SELECT * FROM hechos WHERE paciente ='$p'");
	 while ($row = $resultados->fetch_array())
    {
      $a=$row['res_a'];
      $b=$row['res_b'];
      $c=$row['res_c'];
    }
	
	$reglas=$db->query("SELECT * FROM reglas WHERE '$a' >= min_a AND '$a' <= max_a AND '$b'>=min_b AND '$b'<=max_b AND '$c'>=min_c and '$c'<=max_c");
	 while ($row = $reglas->fetch_array())
    {
      $diagnostico=$row['diagnostico'];
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title>TDAH</title>
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
	<div class="container">
		<form id="form" method="post" action="resultado.php">
			<input type="text" name="diag" value="<?php echo $diagnostico; ?> " hidden>
		</form>
	</div>
</body>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function()
    {
      	form.submit();
	});
</script>
</html>

