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