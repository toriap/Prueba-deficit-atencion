<?php
session_start();
session_destroy();
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
		</div>
		<div class="box">
			<div class="col-sm-12" >
				<h2 class="text-center">Sistema Basado en Conocimiento para el Diagnóstico del Trastorno por Déficit Atencional e Hiperactividad (TDAH)</h2>
				<!--<img class="col-sm-offset-2 col-sm-8" src="images/tdah2.jpg" >-->
			</div>
			<div class="row">
				<img class="col-sm-offset-3 col-sm-6 pequeno" src="images/tdah1.jpg" >
				<h4 class="col-sm-3">
					<ul class="fld">
						<li>Crespo, Rafael</li>
						<li>Hurtado, Diana</li>
						<li>Mergudijian, Hagop</li>
						<li>Medina, Miguel</li>
						<li>Rodríguez, Isaac</li>
					</ul>
				</h4>
			</div>
			<div class="row">
				<div class="col-sm-offset-5 col-sm-2">
					<button onclick="main()" class="btn btn-success">Continuar</button> 
				</div>
			</div>
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
		window.location = "login.php";
	}
</script>
</html>