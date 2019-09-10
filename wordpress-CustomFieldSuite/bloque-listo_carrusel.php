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
