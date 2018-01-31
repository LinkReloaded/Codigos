	<!-- identificador de URL -->
	<?
		$TempDirActual = explode("/",$_SERVER['SCRIPT_NAME']);
		$urlDirActual = "http://".str_replace("http://","",$_SERVER['SERVER_NAME']).str_replace($TempDirActual[(count($TempDirActual))-1],"",$_SERVER['SCRIPT_NAME']);
		echo "url: ".$urlDirActual;
    ?>	
	
	<!-- corta una cadena en php: version corta -->
	<?= substr(get_post_meta($post->ID, 'XXX', true),0,32).'...'; ?>

	<!-- corta una cadena en php: version mediana -->
	<? 
		$datosrecopilados = get_post_meta($post->ID, 'p_desc', true); 
		$resultado = substr($datosrecopilados, 0, 100);
		echo $resultado;
	?>
	
	<!-- corta una cadena en php: version larga -->
	<? 
		$cortalacadena = get_post_meta($post->ID, 'XXX', true); //traigo los datos 
		$cortalacadena=substr($cortalacadena,0,32); // funcion de recorte
		echo $cortalacadena.'...'; //imprime y agrega 3 puntos al final
	?>
	
	<!-- corta una cadena en php: no recorta palabras -->
	<? 
		$texto = PUEDE SER UNA CADENA PHP O LO QUE DEVUELVE EL CFS //CFS()->get('esp_txt_home');
		$cantidadCaracteres = 100;
		$textoCortado = substr($texto,0,strrpos(substr($texto,0,$cantidadCaracteres)," "));
		echo $textoCortado.'...';
	?>
	
	<!-- codigo para que cambie en n tiempo mas, se ubica el tiempo en timestamp en donde se quiere que pase el cambio -->
	<?
		$fecha = new DateTime();
		$tiempo = $fecha->getTimestamp();
		if($tiempo < "1466640000"){ 
			//IMPRIME ALGO ANTES DEL CAMBIO
		}else{ 
			//IMPRIME OTRA COSA DESPUES DEL CAMBIO
		}
	?>