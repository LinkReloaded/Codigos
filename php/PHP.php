<!-- Para redireccionar una pagina a todo evento -->
<?   
	header( "HTTP/1.1 301 Moved Permanently" ); 
	header("Location: http://www.web.dom/ruta_destino.php"); 
	exit;
?>

<!-- Para redireccionar una pagina dependiendo si el navegador es mobile o no (ordenar la linea de navegadores mobile) -->
<?
	$useragent=$_SERVER['HTTP_USER_AGENT'];
	if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)));
	header('Location: http://www.PONERURLDELSITIO.COM');
?>

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
	
		<!-- for -->
	<? 
		$numero_img = "14"; //este es el numero limite de vueltas al loop
		for( $i=1; $i<=$numero_img; $i++){ 
	?>
	<? echo $i; //este el numero indicador y cambia con cada vuelta ?>
	<? } ?>

	
	<!-- array for -->
	<? 
		$URLmodelos = "VARIABLE"; //esta es una variable en todo el array
		$modelosMazda = array(
			/*	dato 0, dato1 , dato2, dato3, dato4 */
			array($URLmodelos."concatenado con dato0.txt", $URLmodelos."concatenado con dato1.txt", "dato2", "dato3", "dato4" ),
			array($URLmodelos."concatenado con dato0.txt", $URLmodelos."concatenado con dato1.txt", "dato2", "dato3", "dato4" ),
		); 
		for($a=0; $a<count($modelosMazda); $a++ ){ //el indicador comienza en 0, al ejecutarse lee los valores de array 1.1, 1.2, 1.3, 1.4, cuando no encuentra mas valores, continua con 2.1, 2.2 etc.
	?>
		<?= $modelosMazda[$a][0]; ?><?= $modelosMazda[$a][1]; ?><?= $modelosMazda[$a][2]; ?><?= $modelosMazda[$a][3]; ?><?= $modelosMazda[$a][4]; ?>
	<? }  ?>
	
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