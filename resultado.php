<?php
include 'mainphp.php';
seguridad();
$diag = $_POST['diag'];
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
			<form method="post" action="guardadiagnostico.php">
				<div class="form-group row">
					<div class="col-sm-offset-2 col-sm-8">
						<label>Diagnóstico: </label>
						<input type="text" class="form-control" id="resul" name="resul" value="" readonly>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-offset-2 col-sm-8">
						<label>Observación: </label>
						<input type="text" class="form-control" id="obs" name="obs" value="" >
					</div>
				</div>
				<input type="text"  id="resultado" name="resultado" value="<?php echo $diag; ?>" hidden >
				<center><input type="submit" class="btn btn-success" name="" value="Procesar" ></center>
			</form>
		</div>
	</div>
</body>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function()
	{    
		var textoBusqueda = $("input#resultado").val(); 
		if (textoBusqueda != "")
		{
			$.post("busquedadiag.php", {valorBusqueda: textoBusqueda}, function(mensaje)
			{
				resul.value=(mensaje);
			}); 
		};	
	});

	function main()
	{
		window.location = "menu.php";
	}
</script>
</html>