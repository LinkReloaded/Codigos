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