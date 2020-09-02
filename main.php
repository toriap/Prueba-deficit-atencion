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
		<div class="box">
			<form method="post" action="maindb.php">
				<div class='table-responsive'>
					<table class='table table-bordered table-hover'>
						<thead>
							<tr class="info">
								<th>#</th>
								<th class="text-center">Pregunta</th>
								<th>¿Aplica?</th>
							</tr>
						</thead>

						<?php  
						while ($row = $q->fetch_array())
						{
							$ct++;
							$pregunta=$row['pregunta'];
							echo "<tbody>
							<tr>
							<td class='text-center middle'>$ct</td>
							<td class='text-justify'>$pregunta</td>
							<td class='text-center middle'><input type='checkbox' id='mycheckbox$ct' name='mycheckbox$ct'></td>
							</tr>
							</tbody>";			
						}
						?>
					</table>
				</div>
				<center>
					<input type="text" id="cont" name="cont" value="0" hidden>
					<input type="submit" class="btn btn-success" name="" value="Continuar">
					<input type="button" class="btn btn-danger" name="" value="Retornar" onclick="main()">
				</center>
			</form>
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
</script>
</html>