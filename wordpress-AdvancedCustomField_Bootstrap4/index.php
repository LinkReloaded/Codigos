<!-- imprimir texto plano -->
<?php the_field( 'NOMBREDELCAMPO' ); ?>

<!-- si existen datos a mostrar, los imprime -->
<?php $dato_txt = get_field( 'NOMBREDELCAMPO' ); if($dato_txt){ ?>
	<?php echo $dato_txt; ?>
<?php } ?>

<!-- Si existe la imagen lo imprime -->
<?php
	/* PONER ID DE IMAGEN */
	$image = get_field('NOMBREDELCAMPO');
	$size = 'full';
	if($image){
		echo "<figure class=\"CLASE-IMAGEN\">";
		echo wp_get_attachment_image( $image, $size );
		echo "</figure>";
	};
?>

<!-- Campo Variable -->
<?php
	$rango = get_field('NOMBREDELCAMPO');
	if($rango){
		echo "<style type=\"text/css\">";
		echo "h2 {font-size: ".$rango."px;}";
		echo "</style>";
	};
?>
