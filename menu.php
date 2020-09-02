<?php
include 'mainphp.php';
seguridad();
unset($_SESSION['paciente']);
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
		<div class="row">
			<div id=alerterror class="alert alert-danger fade in" hidden>
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<strong><?php echo $_SESSION['result'];  ?></strong>
			</div>
			<div id=alertsuccess class="alert alert-success fade in" hidden>
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<strong><?php echo $_SESSION['result'];  ?></strong>
			</div>
			<div id=alertwarning class="alert alert-warning fade in" hidden>
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<strong><?php echo $_SESSION['result'];  ?></strong>
			</div>
		</div>
		<div class="box">
			<div class="col-sm-12" >
				<h2 class="text-center">Sistema  Basado en Conocimiento para el Diagnóstico del Trastorno por Déficit Atencional e Hiperactividad (TDAH)</h2>
				<!--<img class="col-sm-offset-2 col-sm-8" src="images/tdah2.jpg" >-->
			</div><br>
			<div class="row">
				<a href="paciente.php"><img class="col-sm-offset-2 col-sm-2 menu" src="images/checklist.png" ></a>
				<a href="resultpaciente.php"><img class="col-sm-offset-1 col-sm-2 menu" src="images/result.png" ></a>
				<a href="#" onclick="salir()"><img class="col-sm-offset-1 col-sm-2 menu" src="images/salir.png" ></a>
			</div>
			<div class="row">
				<a class="col-sm-offset-3 col-sm-2" href="paciente.php">Aplicar Test</a>
				<a class="col-sm-offset-1 col-sm-2" href="resultpaciente.php">Resultados</a>
				<a class="col-sm-offset-1 col-sm-2" href="#" onclick="salir()">Salir</a>
			</div>
			<!--<div class="row"><br>
				<div class="col-sm-offset-5 col-sm-2">
					<button onclick="main()" class="btn btn-success">Continuar</button> 
				</div>
			</div>-->
		</div>
	</div>
</body>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootbox.min.js"></script>
<script type="text/javascript">
	$(document).ready(function()
	{
	});
	function main()
	{
		window.location = "login.php";
	}
	function salir()
	{
		bootbox.confirm(
		{
			message: "¿Está seguro de que desea salir?",
			buttons: 
			{
				confirm: 
				{
					label: 'Si',
					className: 'btn-success'
				},
				cancel: 
				{
					label: 'No',
					className: 'btn-danger'
				}
			},
			callback: function (result) 
			{
				if (result)
				{
					window.location = "index.php";
				}
			}
		});
	}
	window.onload = function(){success();}
	function success()
	{
		<?php 
		if($_SESSION['actualizado']==1)
		{
			echo "alertsuccess.hidden=0;";
			$_SESSION['actualizado']=0;
		}
		if($_SESSION['actualizado']==2)
		{
			echo "alertwarning.hidden=0;";
			$_SESSION['actualizado']=0;
		}
		if($_SESSION['actualizado']==3)
		{
			echo "alerterror.hidden=0;";
			$_SESSION['actualizado']=0;
		}
		?>
	}

</script>
</html>