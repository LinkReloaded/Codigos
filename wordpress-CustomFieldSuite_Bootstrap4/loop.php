<!-- bucle de datos simple -->
<?
	$fields = CFS()->get('NOMBREDELBUCLE'); foreach ($fields as $field) {
		echo $field['NOMBREDELCAMPO'];
	}
?>

<!-- bucle de datos completo -->
<? $bucle1 = CFS()->get('NOMBREDELBUCLE'); if(count($bucle1)>0){ ?>
	<? $fields = $bucle1; foreach ($fields as $field) { ?>
		<? $url1 = $field['NOMBREDELCAMPOURL']; if(!empty($url1)){ ?><a href="<?= $url1; ?>"><? } ?>
			<p><? echo $field['NOMBREDELCAMPOTXT']; ?></p>
			<? $attachment_id = $field['NOMBREDELCAMPOIMG']; echo wp_get_attachment_image( $attachment_id, 'full', '', array( "alt" => get_the_title($attachment_id), "class" => "PONER_CLASE_ACA" )); ?>
		<? if(!empty($url1)){ ?></a><? } ?>
	<? } ?>
<? } ?>

<!-- bucle con otro bucle -->
<? $contador1 = 1; $campo = CFS()->get('NOMBREDELBUCLE'); foreach ($campo as $subcampo) { ?>
	<? echo $subcampo['NOMBREDELCAMPO']; //campo normal ?>
	<? echo $contador1 //imprimo el numero del loop del bucle ?>
	<? $valor = $subcampo['NOMBREDELCAMPO']; foreach ( $valor as $key => $etiqueta ) { echo $etiqueta; } //resultado del selector ?>
	<? $subcontador = 1; foreach ($subcampo['NOMBREDELSUBBUCLE'] as $subsubcampo) { ?>
		<? echo $subsubcampo['NOMBREDELSUBCAMPO']; //campo texto simple ?>
		<? echo $subcontador; //imprimmo el numero del sub loop del bucle ?>
		<? $subsubcampocondicional = $subsubcampo['NOMBREDELSUBCAMPO']; if(!empty($subsubcampocondicional)){ //campo simple con condicion ?>
			<? echo $subsubcampo['NOMBREDELSUBCAMPO']; //campo simple condicinado ?>
		<? } //fin campo simple con condicion ?>
	<? $subcontador++; } ?>
<? $contador1++; } ?>

<!-- Loop de post relacionados -->
<?
	$values = CFS()->get('NOMBREDELCAMPO');
	foreach ( $values as $post_id ) {
		$the_post = get_post( $post_id );
		$elpost = $the_post->ID;
		$args = array( 'post_type' => 'post', 'post_status' => 'publish', 'p' => $elpost );
		$my_posts = new WP_Query($args);
		if($my_posts->have_posts()) : while ( $my_posts->have_posts() ) : $my_posts->the_post();
?>
			<? $attachment_id = $cfs->get('NOMBREDELCAMPOIMAGEN'); echo wp_get_attachment_image( $attachment_id, 'full', '', array( "alt" => get_the_title($attachment_id), "class" => "PONER_CLASE_ACA" )); ?>
			<? the_title(); ?>
			<?= CFS()->get('NOMBREDELCAMPO'); ?>
<? 		endwhile; endif;
	}
?>
