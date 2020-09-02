<?php
  require "db.php";
  $db=connect();
  mysqli_set_charset($db,"utf8");
  $consultaBusqueda = $_POST['valorBusqueda'];
  $consultaBusqueda=str_replace('.', '',$consultaBusqueda);
  //Filtro anti-XSS
  $caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
  $caracteres_buenos = array("&lt;", "&gt;", "&quot;", "&#x27;", "&#x2F;", "&#060;", "&#062;", "&#039;", "&#047;");
  $consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);
  //Variable vacía (para evitar los E_NOTICE)
  $mensaje = "";
  //Comprueba si $consultaBusqueda está seteado
  if (isset($consultaBusqueda))
  {
  	//Selecciona todo de la tabla mmv001 
	//donde el nombre sea igual a $consultaBusqueda, 
	//o el apellido sea igual a $consultaBusqueda, 
	//o $consultaBusqueda sea igual a nombre + (espacio) + apellido
	$consulta = $db->query("SELECT * FROM diagnostico WHERE id = '$consultaBusqueda'");

  //Obtiene la cantidad de filas que hay en la consulta
	$filas = $consulta->num_rows;

	//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
	if ($filas === 0)
	{
	  $mensaje = "No Encontrado";
	} 
	else
	{

	  //La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
	  while($row = $consulta->fetch_array())
	  {
		$variable = $row['descripcion'];
		//Output
		$mensaje = $variable;
	  };//Fin while $resultados
	}; //Fin else $filas
  };//Fin isset $consultaBusqueda

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>