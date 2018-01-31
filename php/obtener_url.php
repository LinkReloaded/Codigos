	<!-- obtener la direccion por PHP -->
	<? 	// http://www.elsitio.com/archivo.php?variable=nombredelavariable
		$pais= $_GET["nombredelavariable"]; 
		if ($pais=='elnombrecoincide') { 
			echo 'el nombre coincide'; 
		} else { 
			echo 'el nombre no coincide';
		};
	?>

	<!-- obtener la direccion por (EJEMPLO FUNCIONAL) -->
	<? 	
		$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
		if($actual_link=="http://www.haval.cl/"){ 
			echo "el contenido de la condición aquí";
		} 
	?>	