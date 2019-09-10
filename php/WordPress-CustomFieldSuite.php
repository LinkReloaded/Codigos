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
			<? $attachment_id = $field['NOMBREDELCAMPOIMG']; echo wp_get_attachment_image( $attachment_id, 'img200x200' ); ?>
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
		<? $subsubcampocondicional = $subsubcampo['NOMBREDELSUBCAMPO']; if(!empty($subsubcampocondicional)){ //campo simple con condicion ?><? echo $subsubcampo['NOMBREDELSUBCAMPO']; //campo simple condicinado ?><? } //fin campo simple con condicion ?>        
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

	<? $attachment_id = $cfs->get('NOMBREDELCAMPOIMAGEN'); echo wp_get_attachment_image( $attachment_id, 'img200x200' ); ?>
	<? the_title(); ?>
	<?= CFS()->get('NOMBREDELCAMPO'); ?>

<? 		endwhile; endif;  
	}
?>

<!-- Imprimir imagen de forma simple se configura en el plugin como URL -->
<img src="<?= $cfs->get('NOMBREDELCAMPO'); ?>" alt="<? the_title(); ?>">

<!-- Imprimir imagen con recorte de WP aplicado, NOTA: se requiere poner el valor de entorno como "ID del adjunto" -->
<? $attachment_id = $cfs->get( 'NOMBREDELCAMPO' ); echo wp_get_attachment_image( $attachment_id, 'img200x200' ); ?>

<!-- Si existe la imagen lo imprime -->
<? $imagen = $cfs->get( 'NOMBREDELCAMPOIMG' ); if(!empty($imagen)){ ?>
	<figure><? $attachment_id = $imagen; echo wp_get_attachment_image( $attachment_id, 'img200x200' ); ?></figure>
<? } ?> 

<!-- Imprimir imagen como fondo de los div -->
<? 	$elID = get_the_ID(); //obtenemos el ID de la pagina actual
	$recent = new WP_Query("showposts=1&page_id=".$elID); while($recent->have_posts()) : $recent->the_post(); //hacemos un loop de la misma pagina
		$imagen = $cfs->get( 'NOMBREDELCAMPOIMG' ); //llamo a la imagen
		$img_src = wp_get_attachment_image_src( $imagen, 'img1530x415'); //la aplico el recorte
	endwhile;
	if(!empty($imagen)){
?>
<div style="background-image:url(<?= $img_src[0];?>);"></div>
<? 	} ?>

<!-- Loop de datos con mapa Gmaps (se debe iniciar el mapa) -->
<? 	$contador=1; 
	$fields = CFS()->get('NOMBREDELBUCLE'); 
	foreach ($fields as $field) { 
?>		
	<script>
		var map1;
		jQuery(document).ready(function(){
			map1 = new GMaps({ 
				div: '#mapa-<?= $contador; ?>', lat: <?= $field['DATO-LATITUD']; ?>, lng: <?= $field['DATO-LONGUITUD']; ?> });
				map1.addMarker({ lat: <?= $field['DATO-LATITUD']; ?>, lng: <?= $field['DATO-LONGUITUD']; ?>,
				title: '<?= $field['ALGUN-DATO-DENTRO-DEL-LOOP']; ?>',
				infoWindow: {
					content: '<h2 style="color:#000;font-size:14px;"><?= $field['ALGUN-DATO-DENTRO-DEL-LOOP']; ?></h2>'
				}
			});                                  
		});
	</script>
	<div class="mapa" id="mapa-<?= $contador; ?>"></div>
	<?
			$contador++; 
		}
	?>
	
	<!-- imprimir texto plano -->
<?= CFS()->get('NOMBREDELCAMPO'); ?>

<!-- si existen datos a mostrar, los imprime -->
<? $campo = $cfs->get('NOMBREDELCAMPO'); if(!empty($campo)){ ?>
	<?= $campo; ?>
<? } ?>

<!-- imprimir select -->
<? $campo = $cfs->get('NOMBREDELCAMPO'); foreach ($campo as $etiqueta => $label) { echo $etiqueta; } ?>

<!-- codigo para el CFS -->
[{"post_title":"Carrusel","post_name":"carrusel","cfs_fields":[{"id":"4","name":"carrusel01","label":"Carrusel v 1.0 [2016-12-21]","type":"loop","notes":"","parent_id":0,"weight":0,"options":{"row_display":"0","row_label":"Bucle de filas","button_label":"A\u00f1adir Fila","limit_min":"","limit_max":""}},{"id":"5","name":"carrusel01_img","label":"Imagen banner","type":"file","notes":"Suba la imagen del banner, tama\u00f1o xxx x xxx pixeles.","parent_id":4,"weight":1,"options":{"file_type":"file","return_value":"id","required":"0"}},{"id":"6","name":"carrusel01_url","label":"URL banner","type":"text","notes":"Escriba la URL del banner. ejemplo: http:\/\/www.miurlpersonalizada.com (dejar en blanco si no lleva)","parent_id":4,"weight":2,"options":{"default_value":"","required":"0"}},{"id":"7","name":"carrusel01_blank","label":"URL banner en nueva ventana?","type":"true_false","notes":"Seleccione si quiere que se abra en ventana nueva.","parent_id":4,"weight":3,"options":{"message":"","required":"0"}}],"cfs_rules":[],"cfs_extras":{"order":"0","context":"normal","hide_editor":"0"}}]

<!-- carrusel -->
<? 
	$carrusel = "myCarousel"; //nombre del carrusel
	$campocarrusel = CFS()->get('carrusel01'); if(count($campocarrusel)>0){
?>
<div id="<?= $carrusel; ?>" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<? $contador=0; $fields = CFS()->get('carrusel01'); foreach ($fields as $field) { ?>
		<li data-target='#<?= $carrusel; ?>' data-slide-to='<?= $contador; ?>' <? if($blank==1){ echo "class='active'"; }; ?>></li>
		<? $contador++; } ?>
	</ol>
	<div class="carousel-inner" role="listbox">
		<? $contador=0; $fields = CFS()->get('carrusel01'); foreach ($fields as $field) { ?>
		<div class='item <? if($contador==0){ echo "active"; }; ?>'>
			<? $link = $field['carrusel01_url']; if(!empty($link)){ ?><a href="<?= $field['carrusel01_url']; ?>" <? $blank = $field['carrusel01_blank']; if(!empty($blank)){ echo 'target="_blank"'; } ?>><? } ?>
			<? $attachment_id = $field['carrusel01_img']; echo wp_get_attachment_image( $attachment_id, 'img200x200' ); ?>
			<? $link = $field['carrusel01_url']; if(!empty($link)){ ?></a><? } ?>
		</div>
		<? $contador++; } ?>
	</div>
	<a class="left carousel-control" href="#<?= $carrusel; ?>" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#<?= $carrusel; ?>" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
<? } ?>
<!-- carrusel -->    

<!-- codigo para el CFS -->
[{"post_title":"Acorde\u00f3n","post_name":"acordeon","cfs_fields":[{"id":"1","name":"acordeon01","label":"Acorde\u00f3n v 1.0.1 [2016-12-21]","type":"loop","notes":"","parent_id":0,"weight":0,"options":{"row_display":"0","row_label":"Bucle de filas","button_label":"A\u00f1adir Fila","limit_min":"","limit_max":""}},{"id":"2","name":"acordeon01_titulo","label":"Titulo","type":"text","notes":"Escriba el t\u00edtulo","parent_id":1,"weight":1,"options":{"default_value":"","required":"0"}},{"id":"3","name":"acordeon01_contenido","label":"Contenido","type":"wysiwyg","notes":"Escriba el contenido","parent_id":1,"weight":2,"options":{"formatting":"default","required":"0"}}],"cfs_rules":[],"cfs_extras":{"order":"0","context":"normal","hide_editor":"0"}}]

<!-- acordeon -->
<? 
    $acordeon = "accordion"; //nombre del acordeon
    $campoacordeon = CFS()->get('acordeon01'); if(count($campoacordeon)>0){
?>
<div class="panel-group" id="<?= $acordeon; ?>">
    <? $contador=1; $fields = CFS()->get('acordeon01'); foreach ($fields as $field) { ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#<?= $acordeon; ?>" href="#collapse<?= $contador; ?>"><?= $field['acordeon01_titulo']; ?></a>
            </h4>
        </div>
        <div id="collapse<?= $contador; ?>" class="panel-collapse collapse <? if($contador==1){?>in<? } ?>">
            <div class="panel-body">
                <?= $field['acordeon01_contenido']; ?>
            </div>
        </div>
    </div>       
    <? $contador++; } ?>
</div>
<? } ?>
<!-- acordeon -->