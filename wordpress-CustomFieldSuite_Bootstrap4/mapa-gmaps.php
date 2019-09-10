<? //CODIGO CFS ?>
[{"post_title":"Mapa","post_name":"mapa","cfs_fields":[{"id":"25","name":"","label":"Mapa simple (v.20180604)","type":"tab","notes":"","parent_id":0,"weight":0,"options":[]},{"id":"22","name":"cfs_map_latitud","label":"Latitud","type":"text","notes":"Escriba la latitud del mapa","parent_id":0,"weight":1,"options":{"default_value":"","required":"0"}},{"id":"23","name":"cfs_map_longitud","label":"Longitud","type":"text","notes":"Escriba la longitud del mapa","parent_id":0,"weight":2,"options":{"default_value":"","required":"0"}},{"id":"28","name":"cfs_map_title","label":"T\u00edtulo del PIN","type":"text","notes":"Escriba el t\u00edtulo que aparecer\u00e1 al hacer mouseover en el pin.","parent_id":0,"weight":3,"options":{"default_value":"","required":"0"}},{"id":"24","name":"cfs_map_label","label":"Leyenda","type":"text","notes":"Escriba el texto que aparecer\u00e1 en el pin.","parent_id":0,"weight":4,"options":{"default_value":"","required":"0"}}],"cfs_rules":{"page_templates":{"operator":"==","values":["page-templates\/page-mapa.php"]}},"cfs_extras":{"order":"0","context":"normal","hide_editor":"0"}}]

<? //CONFIGURAR EL MAPA ?>
<script>
	var map1;
	jQuery(document).ready(function(){
		map1 = new GMaps({
			div: '#mapalugar',
			lat: <? echo CFS()->get('cfs_map_latitud'); ?>, lng: <? echo CFS()->get('cfs_map_longitud'); ?>
		});
		map1.addMarker({
			lat: <? echo CFS()->get('cfs_map_latitud'); ?>, lng: <? echo CFS()->get('cfs_map_longitud'); ?>,
			title: "<? echo CFS()->get('cfs_map_title'); ?>",
			infoWindow: {
				content: "<? $leyenda = CFS()->get('cfs_map_label');  echo addslashes($leyenda);; ?>"
			}
		});
	});
</script>
<div id="mapalugar" style="width:100%; height:500px;"></div>

<? //CARGAR LA API DE GOOGLE, CON LA API KEY ?>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=PONERACALACLAVEDEGOOGLE"></script>

<? //CARGAR EL JS DE GMAPS (TRAER DESDE UN PROYECTO ANTERIOR) ?>
<script src="<? bloginfo('template_url'); ?>/js/gmaps.js"></script>
