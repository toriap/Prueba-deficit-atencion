<?php
include 'mainphp.php';
seguridad();
if (isset($_POST['cedula']))
{
	$p=$_POST['cedula'];
}
else
{
	$p=$_SESSION['paciente'];
}
$m=$_SESSION['usuario'];
$q=diagnostico($p,$m);
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
		<div class="box">
			<div class='table-responsive'>
				<table class='table table-bordered table-hover'>
					<thead>
						<tr class="info">
							<th colspan="5" class="text-center">Datos del paciente</th>
						</tr>
						<tr>
							<th class='text-center' colspan="1">Nombre</th>
							<th class='text-center' colspan="1">Cédula</th>
							<th class='text-center' colspan="1">Correo</th>
							<th class='text-center' colspan="1">Teléfono</th>
							<th class='text-center' colspan="1">Dirección</th>
						</tr>
					</thead>

					<?php  
					while ($row = $q->fetch_array())
					{
						$nombre=$row['pnombre']." ".$row['papellido'];
						$cedula=$row['pcedula'];
						$correo=$row['pcorreo'];
						$telefono=$row['ptelefono'];
						$direccion=$row['pdireccion'];
						echo "<tbody>
						<tr>
						<td class='text-center'>$nombre</td>
						<td class='text-center'>$cedula</td>
						<td class='text-center'>$correo</td>
						<td class='text-center'>$telefono</td>
						<td class='text-center'>$direccion</td>
						</tr>
						</tbody>
						<thead>
						<tr class='info'>
						<th colspan='5' class='text-center'>Datos del médico</th>
						</tr>
						<tr>
						<th class='text-center' colspan='3'>Nombre</th>
						<th class='text-center' colspan='2'>Cédula</th>
						</tr>
						</thead>";
						$nombre=$row['mnombre']." ".$row['mapellido'];
						$cedula=$row['mcedula'];
						echo "<tbody>
						<tr>
						<td colspan='3' class='text-center middle'>$nombre</td>
						<td colspan='2' class='text-center'>$cedula</td>
						</tr>
						</tbody>";
						$diagnostico=$row['descripcion'];
						$observacion=$row['observacion'];
						echo "<thead>
						<tr class='info'>
						<th colspan='5' class='text-center'>Diagnóstico</th>
						</tr>
						</thead>
						<tbody>
						<tr>
						<td colspan='5' class='text-center'>$diagnostico</td>
						</tr>
						</tbody>
						<thead>
						<tr class='info'>
						<th colspan='5' class='text-center'>Observación</th>
						</tr>
						</thead>
						<tbody>
						<tr>
						<td colspan='5' class='text-center'>$observacion</td>
						</tr>
						</tbody>";
					}
					?>
				</table>
			</div>
			<center>
				<input type="text" id="cont" name="cont" value="0" hidden>
				<button class="btn btn-success"  onclick="imprime()">Imprimir</button>
				<input type="button" class="btn btn-danger" name="" value="Retornar" onclick="main()">
			</center>
		</div>
	</div>
</body>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function()
	{
		var ct = $("#cont1").val();

		<?php  

		for($i = 1; $i <= $ct; $i++)
		{
			echo '$("#mycheckbox'.$i.'").change(function()
			{
				var valor = $("#cont").val();
				if($("#mycheckbox'.$i.'").is(":checked"))
				{
					var suma = parseInt(valor) + parseInt("1");
					$("#cont").val(suma);
				}
				else
				{
					var suma = parseInt(valor) - parseInt("1");
					$("#cont").val(suma);
				}
			});';
		}
		?>    	
	});
	function main()
	{
		window.location = "menu.php";
	}
	function imprime()
	{
		window.print();
	}
</script>
</html>