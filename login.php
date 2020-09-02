<?php
?>
<!DOCTYPE html>
<html>
<head>
	<title>TDAH</title>
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="icon" type="image/jpg" href="images/tdah1.jpg">
</head>
<body>
	<div class="container">
		<div>
			<div class="row">
				<img class="col-sm-4" src="images/tdah.png" >
				<!--<img class="col-sm-offset-4 col-sm-4" src="images/tdah1.png" height="200px;">-->
			</div>
		</div><br><br>
		<div class="box col-sm-offset-4 col-sm-4">
			<form method="post" action="validar.php">
				<h3 style="text-align: center;">Ingresa tus datos</h3>
				<div class="form-group row">
					<div class="col-sm-offset-3 col-sm-6">
						<label for= "usuario" float><span class="glyphicon glyphicon-user"></span>Usuario</label>
						<input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario" required>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-offset-3 col-sm-6">
						<label for= "pass" float><span class="glyphicon glyphicon-lock"></span>Contraseña</label>
						<input type="password" class="form-control pass" name="pass" id="pass" placeholder="Contraseña" required>
					</div>
				</div>
				<center><input class="btn btn-success" type="submit" name="aceptar" id="aceptar" value="Aceptar"></center>
				<br>
			</form>
		</div>
	</div>
</body>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function()
	{
	});
	function main()
	{
		window.location = "main.php";
	}
</script>
</html>