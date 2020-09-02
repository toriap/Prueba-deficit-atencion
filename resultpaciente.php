<?php
include 'mainphp.php';
seguridad();
$q=principal('a');
$ct=0;
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
			<form method="post" action="resultadopaciente.php">
				<h3 style="text-align: center;">Ingresa los datos del paciente</h3>
				<div class="form-group row">
					<div class="col-sm-offset-5 col-sm-3">
						<label for= "cedula" float>Cédula</label>
						<input type="text" class="form-control" name="cedula" id="cedula" placeholder="Cédula"  required autocomplete="off" onKeyUp="buscar();">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-offset-3 col-sm-3">
						<label for= "nombre" float>Nombre</label>
						<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" readonly required>
					</div>
					<div class="col-sm-offset-0 col-sm-3">
						<label for= "apellido" float>Apellido</label>
						<input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido" readonly required>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-offset-3 col-sm-3">
						<label for= "correo" float>Correo</label>
						<input type="text" class="form-control" name="correo" id="correo" placeholder="Correo" readonly required>
					</div>
					<div class="col-sm-offset-0 col-sm-3">
						<label for= "telefono" float>Teléfono</label>
						<input type="text" class="form-control" name="telefono" id="telefono" placeholder="Teléfono" readonly required>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-offset-3 col-sm-6">
						<label for= "direccion" float>Dirección</label>
						<input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección" readonly required>
					</div>
				</div>
				<center>
					<input class="btn btn-success" type="submit" name="aceptar" id="aceptar" value="Buscar">
					<button class="btn btn-danger" onclick="volver()">Regresar</button>  
				</center>
				<br>
			</form>
		</div>
	</div>
</body>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootbox.min.js"></script>
<script src="js/jquery.mask.min.js"></script>
<script type="text/javascript">
	$(document).ready(function()
	{
		$('#telefono').mask('(0000)000-0000');
	});
	function main()
	{
		window.location = "login.php";
	}
	function volver()
	{
		window.location = "menu.php";
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
					label: 'Yes',
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

	function buscar()
    {
      var textoBusqueda = $("input#cedula").val(); 
      if (textoBusqueda != "")
      {
        $.post("busquedanombre.php", {valorBusqueda: textoBusqueda}, function(mensaje)
        {
          nombre.value=(mensaje);
        }); 
        $.post("busquedaapellido.php", {valorBusqueda: textoBusqueda}, function(mensaje)
        {
          apellido.value=(mensaje);
        });
        $.post("busquedacorreo.php", {valorBusqueda: textoBusqueda}, function(mensaje)
        {
          correo.value=(mensaje);
        });
        $.post("busquedatelefono.php", {valorBusqueda: textoBusqueda}, function(mensaje)
        {
          telefono.value=(mensaje);
        }); 
        $.post("busquedadireccion.php", {valorBusqueda: textoBusqueda}, function(mensaje)
        {
          direccion.value=(mensaje);
        }); 
      } 
      else
      { 
        modnb.value='Ingrese Cédula';
        modap.value='Ingrese Cédula';
      };
    };
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